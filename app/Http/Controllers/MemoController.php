<?php

namespace App\Http\Controllers;

use App\Models\Post;

class MemoController extends Controller
{
    /**
     * 投稿一覧を表示
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('memo.index', compact('posts'));
    }
}
