@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/update_address.css') }}">
@endsection
@section('content')
    <div class="shipping-address">
        <div class="address__title">
            <h2>住所の変更</h2>
        </div>
        <div class="adress__contents">
            <form action="" class="from">
                <div class="form__gropu">
                    <div class="form__group-title">
                        <span>郵便番号</span>
                    </div>
                    <div class="form__group-input">
                        <input type="text" name="post-code" value="">
                    </div>
                    <div class="form__error">
                        <!--バリデーション機能を実装したら記述します。-->
                    </div>
                </div>
                <div class="form__gropu">
                    <div class="form__group-title">
                        <span>住所</span>
                    </div>
                    <div class="form__group-input">
                        <input type="text" name="address" value="">
                    </div>
                    <div class="form__error">
                        <!--バリデーション機能を実装したら記述します。-->
                    </div>
                </div>
                <div class="form__gropu">
                    <div class="form__group-title">
                        <span>建物名</span>
                    </div>
                    <div class="form__group-input">
                        <input type="text" name="building" value="">
                    </div>
                </div>
                <div class="update-address__button">
                    <button class="button__submit" type="submit">更新する</button>
                </div>
            </form>
        </div>
    </div>
@endsection
