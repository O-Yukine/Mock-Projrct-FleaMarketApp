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
            <div class="card">
                <a href="">
                    <img src="" alt="商品画像">
                    <p>商品名</p>
                </a>
            </div>
            <div class="card">
                <a href="">
                    <img src="" alt="商品画像">
                    <p>商品名</p>
                </a>
            </div>
            <div class="card">
                <a href="">
                    <img src="" alt="商品画像">
                    <p>商品名</p>
                </a>
            </div>
            <div class="card">
                <a href="">
                    <img src="" alt="商品画像">
                    <p>商品名</p>
                </a>
            </div>
            <div class="card">
                <a href="">
                    <img src="" alt="商品画像">
                    <p>商品名</p>
                </a>
            </div>
            <div class="card">
                <a href="">
                    <img src="" alt="商品画像">
                    <p>商品名</p>
                </a>
            </div>

        </div>
    </div>
@endsection
