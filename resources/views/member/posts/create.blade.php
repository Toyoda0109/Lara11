<x-layouts.member>

<form method="post" action="{{ route('member.posts.store') }}" enctype="multipart/form-data">
    @csrf

    <x-error />

    <p>
        <label>タイトル</label>
        <input type="text" name="title" style="width:400px" value="{{ old('title') }}">
    </p>

    <p>
        <label>本文</label>
        <textarea name="body" style="width:600px; height:200px;">{{ old('body') }}</textarea>
    </p>

    <p> 
        <label>画像</label>
        <input type="file" name="eyecatch">
    </p>

    <input type="submit" value="送信する">
</form>

</x-layouts.member>
