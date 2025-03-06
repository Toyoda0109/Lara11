<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>ログイン画面</title>
</head>
<body>
    <h1>ログイン画面</h1>

    <form method="post">
    @csrf

    {{-- エラーメッセージ --}}
    @if($errors->any())
        <ul style="color: red">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif

    {{-- 普通のメッセージ --}}
    @session('status')
    <p style="color: green">
        {{ $value }}
    </p>
    @endsession

    <p>
        <label>メールアドレス</label>
        <input type="text" name="email" value="{{ old('email') }}">
    </p>
    <p>
        <label>パスワード</label>
        <input type="password" name="password">
    </p>

    <input type="submit" value="送信する">

    </form>

</body>
</html>

