@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection
@section('content')
    <div class="product">
        <div class="left-content">
            <img src="{{ asset('storage/product_images/' . $product->product_image) }}" alt="商品画像">
        </div>
        <div class="right-content">
            <div class="product-detail">
                <h2 class="product-title">{{ $product->name }}</h2>
                <p>{{ $product->brand }}</p>
                <p>¥{{ $product->price }}(税込)</p>
                <form class="form" action="/purchase/{{ $product->id }}" method="get">
                    @csrf
                    <button class="order-button" type="submit">購入手続きへ</button>
                </form>
                <h3>商品説明</h3>
                <p>{{ $product->content }} </p>
                <h3>商品の情報</h3>
                <h4>カテゴリー</h4>
                @foreach ($product->categories as $category)
                    {{ $category->name }}
                @endforeach
                <h4>商品の状態</h4>{{ $product->condition->name }}
            </div>
            <div class="product__comments">
                <h3>コメント（数）</h3>
                <img src="" alt="コメントしたユーザー">
                ユーザー名
                <p>コメント一覧</p>
                <form action="" class="comments-form">
                    <p>商品へのコメント</p>
                    <textarea name="comment" id="" cols="30" rows="10">

                    </textarea>
                    <div class="comment__button">
                        <button class="comment__submit">コメントを送信する</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
