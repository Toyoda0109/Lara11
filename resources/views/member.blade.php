<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員画面</title>
</head>
<body>
    ようこそ、{{$user->name}}さん

    <form method="post" action="{{route('logout')}}">
        @csrf
        <input type = "submit" value="ログアウト">
    </form>
</body>
</html>
