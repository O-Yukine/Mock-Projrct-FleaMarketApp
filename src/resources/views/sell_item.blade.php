@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/sell_item.css') }}">
@endsection
@section('content')
    <div class="sell-item">
        <div class="seii-item__title">
            <h2>商品の出品</h2>
        </div>
        <div class="sell-item__contents">
            <form action="" class="form">
                <div class="form__group">
                    <div class="form__group-title"><span>商品画像</span>
                    </div>
                    <div class="form__group-image">
                        <input type="file" name="image">
                    </div>
                    <div class="form__error">
                        <!--バリデーション機能を実装したら記述します。-->
                    </div>
                </div>
                <div class="contents__subtitle">
                    <h3>商品の詳細</h3>
                </div>
                <div class="form__group">
                    <div class="form__group-title"><span>カテゴリー</span>
                    </div>
                    <div class="form__group-chips">
                        <label class="chip">
                            <input type="checkbox" name="categories[]" value="fashion">
                            <span>ファッション</span>
                        </label>
                        <label class="chip">
                            <input type="checkbox" name="categories[]" value="home">
                            <span>インテリア</span>
                        </label>
                        <label class="chip">
                            <input type="checkbox" name="categories[]" value="cosme">
                            <span>ファッション</span>
                        </label>
                        <label class="chip">
                            <input type="checkbox" name="categories[]" value="cosme">
                            <span>ファッション</span>
                        </label>
                        <label class="chip">
                            <input type="checkbox" name="categories[]" value="cosme">
                            <span>ファッション</span>
                        </label>
                        <label class="chip">
                            <input type="checkbox" name="categories[]" value="cosme">
                            <span>ファッション</span>
                        </label> <label class="chip">
                            <input type="checkbox" name="categories[]" value="cosme">
                            <span>ファッション</span>
                        </label> <label class="chip">
                            <input type="checkbox" name="categories[]" value="cosme">
                            <span>ファッション</span>
                        </label>
                    </div>
                    <div class="form__error">
                        <!--バリデーション機能を実装したら記述します。-->
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title"><span>商品の状態</span>
                    </div>
                    <div class="form__group-select">
                        <select name="condition" id="">
                            <option value="">選択してください</option>
                            <option value="">良好</option>
                            <option value="">状態が悪い</option>
                        </select>
                    </div>
                    <div class="form__error">
                        <!--バリデーション機能を実装したら記述します。-->
                    </div>
                </div>
                <div class="contents__subtitle">
                    <h3>商品名と説明</h3>
                </div>
                <div class="form__group">
                    <div class="form__group-title"><span>商品名</span>
                    </div>
                    <div class="form__group-input">
                        <input type="text" name="name">
                    </div>
                    <div class="form__error">
                        <!--バリデーション機能を実装したら記述します。-->
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title"><span>ブランド名</span>
                    </div>
                    <div class="form__group-input">
                        <input type="text" name="brand">
                    </div>
                    <div class="form__error">
                        <!--バリデーション機能を実装したら記述します。-->
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title"><span>商品の説明</span>
                    </div>
                    <div class="form__group-input">
                        <textarea name="content" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form__error">
                        <!--バリデーション機能を実装したら記述します。-->
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title"><span>販売価格</span>
                    </div>
                    <div class="form__group-input">
                        <input type="text" name="price">
                    </div>
                    <div class="form__error">
                        <!--バリデーション機能を実装したら記述します。-->
                    </div>
                </div>
                <div class="sell-item__button">
                    <button class="button__submit" type="submit">更新する</button>
                </div>
            </form>
        </div>
    </div>
@endsection
