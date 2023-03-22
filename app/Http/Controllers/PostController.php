<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->paginate(9)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $blog)
    {
        return view('posts.show', [
            'post' => $blog,
            'siblings' => $blog->getSiblings()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $blog)
    {
        //
    }
}
