@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/purchase.css') }}">
@endsection
@section('content')
    <div class="order">
        <div class="left-content">
            <div class="order-product">
                <div class="order-image">
                    <img src="" alt="商品画像">
                </div>
                <div class="order-information">
                    <h4>商品名</h4>
                    <p>¥price</p>
                </div>
            </div>
            <div class="payment">
                <p>支払い方法</p>
                <select id="payment-method" class="paying-option">
                    <option value="">支払い方法を選択</option>
                    <option value="convience">コンビニ払い</option>
                    <option value="credit">カード支払い</option>
                </select>
            </div>
            <div class="shipping-address">
                <span>配送先</span><span><a href="/purchase/address">変更する</a></span>
                <p>〒xxx-yyy</p>
                <p>ここに住所と建物がはいるよ</p>
            </div>
        </div>
        <div class="right-content">
            <table class="total-price">
                <tr>
                    <th>商品代金</th>
                    <td>¥total_price</td>
                </tr>
                <tr>
                    <th>支払い方法</th>
                    <td id="payment-info"></td>
                </tr>
            </table>
            <form action="/purchase" class="form">
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
