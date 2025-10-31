@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/update_profile.css') }}">
@endsection


@section('content')
    <div class="update_profile">
        <div class="profile__title">
            <h2>プロフィール設定</h2>
        </div>
        <form action="" class="form">
            <div class="profile-image">
                <img src="" alt="プロフィール画像">
                <input type="file" name='image'>
            </div>
            <div class="profile__contents">
                <div class="input__gropu">
                    <div class="input__group-title">
                        <p>ユーザー名</p>
                    </div>
                    <div class="input__group-input">
                        <input type="text" name="name" value="">
                    </div>
                    <div class="form__error">
                        <!--バリデーション機能を実装したら記述します。-->
                    </div>
                </div>
                <div class="input__gropu">
                    <div class="input__group-title">
                        <p>郵便番号</p>
                    </div>
                    <div class="input__group-input">
                        <input type="text" name="post_code" value="">
                    </div>
                    <div class="form__error">
                        <!--バリデーション機能を実装したら記述します。-->
                    </div>
                </div>
                <div class="input__gropu">
                    <div class="input__group-title">
                        <p>住所</p>
                    </div>
                    <div class="input__group-input">
                        <input type="text" name="address" value="">
                    </div>
                    <div class="form__error">
                        <!--バリデーション機能を実装したら記述します。-->
                    </div>
                </div>
                <div class="input__gropu">
                    <div class="input__group-title">
                        <p>建物名</p>
                    </div>
                    <div class="input__group-input">
                        <input type="text" name="building" value="">
                    </div>
                    <div class="form__error">
                        <!--バリデーション機能を実装したら記述します。-->
                    </div>
                </div>
                <div class="update-profile__button">
                    <button class="button__submit" type="submit">更新する</button>
                </div>
        </form>
    </div>





    </div>
@endsection
