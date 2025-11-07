@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/products.css') }}">
@endsection
@section('content')
    <div class="products">
        <div class="products_nav">
            <a href="/?tab=recommended&keyword={{ request('keyword') }}"
                class="{{ $tab == 'recommended' ? 'active' : '' }}">おすすめ</a>
            <a href="/?tab=mylist&keyword={{ request('keyword') }}" class="{{ $tab == 'mylist' ? 'active' : '' }}">マイリスト</a>
        </div>
        <div class="products__list">
            @foreach ($products as $product)
                <div class="card">
                    <a href="/item/{{ $product->id }}">
                        <img src="{{ asset('storage/product_images/' . $product->product_image) }}" alt="商品画像">
                        <p>{{ $product->name }}</p>
                        @if ($product->purchases->isNotEmpty())
                            <span class="sold-label">sold</span>
                        @endif
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
