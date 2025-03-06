<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>タイトル</title>
</head>
<body>
    @if($errors->any())
    <ul style = "color: red">
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif

    <form method="post">
        @csrf
        名前：<input type = "text" name="name" value="{{old('name')}}"><br>
        メールアドレス：<input type = "text" name="email" value="{{old('email')}}">
        <input type ="submit" value = "送信する">
    </form>
</body>
</html>
