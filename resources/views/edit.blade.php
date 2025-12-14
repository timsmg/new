@extends('layouts.app')

@section('title', 'Редактирование проекта')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Редактирование проекта: {{ $portfolio->title }}</h4>
                    </div>
                    <div class="card-body">
                        <!-- Та же форма, что и в create, но с action на update -->
                        <form method="POST" action="{{ route('portfolio.update', $portfolio) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <!-- ... остальная форма ... -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
