@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" type="text/css" />
@endsection

@section('content')
    <div class="product">
        <div class="left-content">
            <img src="{{ asset('storage/product_images/' . $product->product_image) }}" alt="商品画像">
        </div>
        <div class="right-content">
            <div class="product-detail">
                <h2 class="product-title">{{ $product->name }}</h2>
                {{ $product->brand }}
                <p>¥{{ $product->price }}(税込)</p>
                <form class="comments-form" action="/item/{{ $product->id }}/like" method="post">
                    @csrf
                    <button class="like__button" type="submit">
                        <i
                            class="{{ $product->likedBy->contains(auth()->id()) ? 'fa-solid' : 'fa-regular' }} fa-star fa-lg"></i>
                    </button>

                    {{-- @if ($product->likedBy->contains(auth()->id()))
                        <button><i class="fa-solid fa-star fa-lg"></i>
                        </button>
                    @else
                        <button><i class="fa-regular fa-star fa-lg"></i>
                        </button>
                    @endif --}}
                </form>

                {{ $product->likedBy->count() }}

                <i class="fa-regular fa-comment fa-lg"></i>
                {{ $product->comments->count() ?? 0 }}


                <form class="form.order" action="/purchase/{{ $product->id }}" method="get">
                    @csrf
                    <button class="order__button-submit" type="submit">購入手続きへ</button>
                </form>
                <h3>商品説明</h3>
                <p>{{ $product->content }} </p>
                <h3>商品の情報</h3>

                <span>カテゴリー</span>
                @foreach ($product->categories as $category)
                    <span class="category-chips">{{ $category->name }}</span>
                @endforeach
                <br>
                <span>商品の状態</span><span class="product-condition">{{ $product->condition->name }}</span>
            </div>
            <div class="product__comments">
                <h3>コメント({{ $product->comments->count() ?? 0 }})</h3>
                @isset($product->comments)
                    @foreach ($product->comments as $comment)
                        <div class="comment__title">
                            <img src="{{ asset('storage/profile_images/' . $comment->user->profile->profile_image) }}"
                                alt="プロフィール写真">
                            {{ $comment->user->name }}
                        </div>
                        <div class="comment__contents">
                            {{ $comment->comment }}
                        </div>
                    @endforeach
                @endisset
                <form class="comments-form" action="/item/{{ $product->id }}/comment" method="post">
                    @csrf
                    <p>商品へのコメント</p>
                    <textarea name="comment">
                    </textarea>
                    <div class="comment__button">
                        <button class="comment__button-submit">コメントを送信する</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
