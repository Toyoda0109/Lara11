<x-layouts.member>

<form method="post" action="{{ route('member.posts.update', $post) }}">
    @csrf
    @method('PUT')

    <x-error />
    <x-status />

    <p>
        <label>タイトル</label>
        <input type="text" name="title" style="width:400px" value="{{ data_get($data, 'title') }}">
    </p>

    <p>
        <label>本文</label>
        <textarea name="body" style="width:600px; height:200px;">{{ data_get($data, 'body') }}</textarea>
    </p>

    <input type="submit" value="変更する">

</form>

</x-layouts.member>
