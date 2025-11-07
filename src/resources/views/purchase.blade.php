@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/purchase.css') }}">
@endsection
@section('content')
    <div class="order">
        <form class="form" action="/purchase/{{ $product->id }}" method="post">
            @csrf
            <div class="left-content">
                <div class="order-product">
                    <div class="order-image">
                        <img src="{{ asset('storage/product_images/' . $product->product_image) }}" alt="商品画像">
                    </div>
                    <div class="order-information">
                        <h4>{{ $product->name }}</h4>
                        <p>¥{{ $product->price }}</p>
                    </div>
                </div>
                <div class="payment">
                    <p>支払い方法</p>
                    <select id="payment-method" class="paying-option" name="payment_method">
                        <option value="">支払い方法を選択</option>
                        <option value="convenience">コンビニ払い</option>
                        <option value="credit">カード支払い</option>
                    </select>
                </div>
                <div class="shipping-address">
                    <span>配送先</span><span><a href="/purchase/address/{{ $product->id }}">変更する</a></span>
                    <input type="hidden" name="post_code"
                        value="{{ $shipping_address['post_code'] ?? $user->profile->post_code }}">
                    {{ $shipping_address['post_code'] ?? $user->profile->post_code }}
                    <input type="hidden" name="address"
                        value="{{ $shipping_address['address'] ?? $user->profile->address }}">
                    {{ $shipping_address['address'] ?? $user->profile->address }}
                    <input type="hidden" name="building"
                        value="{{ $shipping_address['building'] ?? ($user->profile->building ?? '') }}">
                    {{ $shipping_address['building'] ?? ($user->profile->building ?? '') }}
                </div>
            </div>
            <div class="right-content">
                <table class="total-price">
                    <tr>
                        <th>商品代金</th>
                        <td>¥{{ $product->price }}</td>
                    </tr>
                    <tr>
                        <th>支払い方法</th>
                        <td id="payment-info"></td>
                    </tr>
                </table>
                <button class="order-complete__button">
                    購入する</button>
        </form>
    </div>
    </div>

    <script>
        document.getElementById('payment-method').addEventListener('change', function() {
            const selected = this.value;
            const infoDiv = document.getElementById('payment-info');

            if (selected === 'convenience') {
                infoDiv.innerHTML = 'コンビニ払い';
            } else if (selected === 'credit') {
                infoDiv.innerHTML = 'カード支払い';
            } else {
                infoDiv.innerHTML = '';
            }
        });
    </script>
@endsection
