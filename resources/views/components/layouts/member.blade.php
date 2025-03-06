<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>ブログ管理</title>
<link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
</head>
<body>
    <header style="margin-bottom:30px">
        <nav>
            <a href="{{ route('member.posts.index') }}">ブログ一覧</a>

            @auth
                <form method="post" action="{{ route('logout') }}" style="display:inline">
                    @csrf
                    <input type="submit" value="ログアウト">
                </form>
            @else
                <a href="{{ route(('login')) }}">ログイン画面</a>
            @endauth

        </nav>
    </header>

    {{ $slot }}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</body>
</html>
