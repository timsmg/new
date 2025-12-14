<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        $query = Portfolio::query();

        // Фильтрация по категории
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Фильтрация по статусу
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Сортировка
        switch ($request->sort) {
            case 'oldest':
                $query->oldest();
                break;
            case 'name_asc':
                $query->orderBy('title', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('title', 'desc');
                break;
            default:
                $query->latest();
                break;
        }

        $portfolios = $query->with('category', 'tags')->paginate(12);
        $categories = Category::all();

        return view('portfolio.index', compact('portfolios', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('portfolio.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'content' => 'required|string',
            'main_image' => 'nullable|image|max:2048',
            'project_url' => 'nullable|url',
            'technologies' => 'nullable|string',
            'status' => 'required|in:draft,published',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
            'additional_images.*' => 'nullable|image|max:2048'
        ]);

        // Обработка главного изображения
        if ($request->hasFile('main_image')) {
            $path = $request->file('main_image')->store('portfolio', 'public');
            $validated['main_image'] = $path;
        }

        // Преобразование строки технологий в массив
        if ($request->filled('technologies')) {
            $validated['technologies'] = array_map('trim', explode(',', $request->technologies));
        }

        $validated['user_id'] = auth()->id();

        $portfolio = Portfolio::create($validated);

        // Привязка тегов
        if ($request->filled('tags')) {
            $portfolio->tags()->sync($request->tags);
        }

        // Обработка дополнительных изображений
        if ($request->hasFile('additional_images')) {
            foreach ($request->file('additional_images') as $image) {
                $path = $image->store('portfolio/images', 'public');
                $portfolio->images()->create(['image_path' => $path]);
            }
        }

        return redirect()->route('portfolio.index')
            ->with('success', 'Проект успешно создан!');
    }

    public function show(Portfolio $portfolio)
    {
        $portfolio->load('category', 'tags', 'images');

        return view('portfolio.show', compact('portfolio'));
    }

    public function edit(Portfolio $portfolio)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('portfolio.edit', compact('portfolio', 'categories', 'tags'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'content' => 'required|string',
            'main_image' => 'nullable|image|max:2048',
            'project_url' => 'nullable|url',
            'technologies' => 'nullable|string',
            'status' => 'required|in:draft,published',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id'
        ]);

        // Обновление главного изображения
        if ($request->hasFile('main_image')) {
            // Удаляем старое изображение
            if ($portfolio->main_image) {
                Storage::disk('public')->delete($portfolio->main_image);
            }

            $path = $request->file('main_image')->store('portfolio', 'public');
            $validated['main_image'] = $path;
        }

        // Преобразование строки технологий в массив
        if ($request->filled('technologies')) {
            $validated['technologies'] = array_map('trim', explode(',', $request->technologies));
        }

        $portfolio->update($validated);

        // Обновление тегов
        $portfolio->tags()->sync($request->tags ?? []);

        return redirect()->route('portfolio.index')
            ->with('success', 'Проект успешно обновлен!');
    }

    public function destroy(Portfolio $portfolio)
    {
        // Удаляем изображения
        if ($portfolio->main_image) {
            Storage::disk('public')->delete($portfolio->main_image);
        }

        // Удаляем дополнительные изображения
        foreach ($portfolio->images as $image) {
            Storage::disk('public')->delete($image->image_path);
            $image->delete();
        }

        $portfolio->delete();

        return redirect()->route('portfolio.index')
            ->with('success', 'Проект успешно удален!');
    }
}
