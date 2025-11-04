@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/products.css') }}">
@endsection
@section('content')
    <div class="products">
        <div class="products_nav">
            <a href="/">おすすめ</a>
            <a href="/?tab=mylist">マイリスト</a>
        </div>
        <div class="products__list">
            @foreach ($products as $product)
                <div class="card">
                    <a href="/item">
                        <img src="{{ asset('storage/product_images/' . $product->product_image) }}" alt="商品画像">
                        <p>{{ $product->name }}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
