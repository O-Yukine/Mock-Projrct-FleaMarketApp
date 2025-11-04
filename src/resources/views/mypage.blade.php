@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection
@section('content')
    <div class="mypage">
        <div class="mypage-title">
            <div class="mypage__profile">
                <img src="{{ $profile->profile_image ? asset('storage/profile_images/' . $profile->profile_image) : '' }}"
                    alt="プロフィール写真">
                <span>{{ $user->name }}</span>
            </div>
            <div class="mypage__modify">
                <a href="/mypage/profile">プロフィールを編集</a>
            </div>
        </div>
        <div class="mypage-list">
            <div class="products_nav">
                <a href="/">出品した商品</a>
                <a href="/?tab=mylist">購入した商品</a>
            </div>
            <div class="products__list">
                <div class="card">
                    <a href="/item">
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
    </div>
@endsection
