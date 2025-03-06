<x-layouts.member>

    <a href="{{ route('member.posts.create') }}">新規作成</a>
    <x-status />

    <table>
        <thead>
            <tr>
            <th style="text-align:center">タイトル</th>
            <th style="text-align:center">変更</th>
            <th style="text-align:center">削除</th>
            </tr>
        </thead>
        <tbody>

    @foreach($posts as $post)
        <tr>
            <td>{{ $post->title }}
                @if($post->eyecatch)
                    <img src="{{ Storage::url($post->eyecatch) }}" style="width:100px">
                @endif
            </td>
            <td style="text-align:center"><a href="{{ route('member.posts.edit', $post) }}">変更</a></td>
        <td style="text-align:center">
            <form method="post" action="{{ route('member.posts.destroy', $post) }}">
                @csrf @method('delete') <input type="button" value="削除" onclick="deleteConfirm(this.form)">
            </form>
        </td>
        </tr>
    @endforeach

        </tbody>
    </table>

</x-layouts.member>
