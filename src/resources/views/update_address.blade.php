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
            <form class="from" action="/purchase/address/{{ $item_id }}" method="post">
                @csrf
                <div class="form__gropu">
                    <div class="form__group-title">
                        <span>郵便番号</span>
                    </div>
                    <div class="form__group-input">
                        <input type="text" name="post_code" value="{{ $profile->post_code }}">
                    </div>
                    <div class="form__error">
                        @error('post_code')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form__gropu">
                    <div class="form__group-title">
                        <span>住所</span>
                    </div>
                    <div class="form__group-input">
                        <input type="text" name="address" value="{{ $profile->address }}">
                    </div>
                    <div class="form__error">
                        @error('address')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form__gropu">
                    <div class="form__group-title">
                        <span>建物名</span>
                    </div>
                    <div class="form__group-input">
                        <input type="text" name="building" value="{{ $profile->building }}">
                    </div>
                </div>
                <form class="form" action="/purchase/address/{{ $item_id }}">
                    <div class="update-address__button">
                        <button class="button__submit" type="submit">更新する</button>
                    </div>
                </form>
            </form>
        </div>
    </div>
@endsection
