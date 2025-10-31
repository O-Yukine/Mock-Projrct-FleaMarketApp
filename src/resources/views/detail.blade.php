@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection
@section('content')
    <div class="product">
        <div class="left-content">
            <img src="" alt="商品画像">
        </div>
        <div class="right-content">
            <div class="product-detail">
                <h2 class="product-title">商品名がここに入る</h2>
                <p>brand</p>
                <p>¥プライス(税込)</p>
                <form class="form" action="">
                    <button class="order-button" type="submit">購入手続きへ</button>
                </form>
                <h3>商品説明</h3>
                <p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                    standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it
                    to make a type specimen book. It has survived not only five centuries, but also the leap into electronic
                    typesetting, remaining essentially unchanged. </p>
                <h3>商品の情報</h3>
                <h4>カテゴリー</h4>
                <h4>商品の状態（コンディション）</h4>
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
