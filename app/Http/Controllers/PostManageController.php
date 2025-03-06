<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class PostManageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        // $posts = auth()->user()->posts;
        $posts = Post::all();

        return view('member.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    
    public function create()
    {
        return view('member.posts.create');
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
            'eyecatch' => ['nullable', 'mimes:jpeg,png,gif'],
        ]);

        if ($request->hasFile('eyecatch')) {
            // 第1引数は、格納するフォルダ名
            // 第2引数は、使用するディスク名
            $data['eyecatch'] = $request->file('eyecatch')->store('posts', 'public');
        }

        auth()->user()->posts()->create($data);

        return to_route('member.posts.index')->with('status', 'ブログを新規登録しました');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        Gate::authorize('update', $post);
        $data = old() ?: $post;

        return view('member.posts.edit', compact('post', 'data'));
    }

    public function update(Request $request, Post $post)
    {
        Gate::authorize('update', $post);

        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
        ]);

        $post->update($data);

        return to_route('member.posts.edit', $post)->with('status', 'ブログを変更しました');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Gate::authorize('update', $post);

        $post->delete();

        return to_route('member.posts.index')->with('status', 'ブログを削除しました');
    }

}
