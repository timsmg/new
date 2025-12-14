<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'name_product' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'description_product' => 'required|string',
            'price_product' => 'required|numeric|min:0',
            'image_product' => 'required|image|max:2048',
            'country_product' => 'required|string|max:100',
            'count_product' => 'required|integer|min:0',
        ];
    }

    public function messages()
    {
        return [
            'name_product.required' => 'Поле "Название продукта" обязательно для заполнения.',
            'name_product.string' => 'Поле "Название продукта" должно быть строкой.',
            'name_product.max' => 'Поле "Название продукта" не должно превышать 255 символов.',
            'description_product.string' => 'Поле "Описание продукта" должно быть строкой.',
            'price_product.numeric' => 'Поле "Цена продукта" должно быть числом.',
            'price_product.min' => 'Цена продукта не может быть отрицательной.',
            'image_product.image' => 'Поле "Изображение продукта" должно быть изображением.',
            'image_product.max' => 'Размер изображения не должен превышать 2MB.',
            'country_product.string' => 'Поле "Страна продукта" должно быть строкой.',
            'country_product.max' => 'Поле "Страна продукта" не должно превышать 100 символов.',
            'count_product.integer' => 'Поле "Количество продукта" должно быть целым числом.',
            'count_product.min' => 'Количество продукта не может быть отрицательным.',
            'required'=>'Обязательное поле для заполнения',
        ];
    }
}
