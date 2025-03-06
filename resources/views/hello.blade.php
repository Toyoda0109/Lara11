<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
<p>ログインフォームは <a href="{{ url('/login') }}">/login</a> にあります。</p>
    <form>
        名前: <input type="text" name = "name" value="{{$name}}"><br>
        ニックネーム: <input type="text" name = "nickname">
        <input type="submit" value = "送信する">
    </form>
    @if(filled($name))
        こんにちは、{{$name}}さん！
    @else
        名前を入力してください。
    @endif
</body>
</html>
