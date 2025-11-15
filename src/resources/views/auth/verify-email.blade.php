@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/verify-email.css') }}">
@endsection
@section('content')
    <div class="verification">
        <p>登録していただいたメールアドレスに認証メールを送付しました。</p>
        <br>
        <p>メール認証を完了してください</p>

        <button>
            認証はこちらから
        </button>

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button>認証メールを再送する</button>
        </form>
    </div>
@endsection
