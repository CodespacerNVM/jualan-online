<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('posts.index', [


            'posts' => Post::filter(request(['search', 'categories', 'sortBy']))->paginate(9)->withQueryString(),
            'categories' => \App\Models\Post\Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('posts.create', [
            'categories' => \App\Models\Post\Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|min:5|max:200',
            'body' => 'required|min:10',
            'slug' => [...explode('|', 'required|string|nullable|unique:posts'), 'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/'],
            'categories' => 'required',
        ]);

        $data['user_id'] = Auth::user()->id;
        $categories = explode(',', $data['categories']);
        $data['body'] = $this->remove_base64_images($data['body']);


        DB::beginTransaction();

        $newPost = Post::create($data);
        $newPost->categories()->sync($categories);

        DB::commit();

        session()->flash('flash.banner', "Create : $newPost->slug");
        return redirect()->route('blog.show', $newPost->slug);
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

        return
            view('posts.edit', [
                'post' => $blog,
                'categories' => \App\Models\Post\Category::all()
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $blog)
    {
        $data = $request->validate([
            'title' => 'required|min:5|max:200',
            'body' => 'required|min:10',
            'slug' => [...explode('|', 'required|string|nullable'), 'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/', Rule::unique('posts', 'slug')->ignore($blog->id)],
            'categories' => 'required',
        ]);

        $data['user_id'] = Auth::user()->id;
        $categories = explode(',', $data['categories']);
        $data['body'] = $this->remove_base64_images($data['body']);

        DB::beginTransaction();

        $blog->update($data);
        $blog->categories()->sync($categories);

        DB::commit();

        session()->flash('flash.banner', "Update Success: $blog->slug");
        return redirect()->route('blog.show', $blog->slug);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $blog)
    {
        DB::beginTransaction();

        $blog->categories()->detach();
        $blog->delete();

        DB::commit();

        session()->flash('flash.banner', "Delete Success: $blog->slug");
        return redirect()->route('blog.index');
    }

    function remove_base64_images($s)
    {
        // Define regular expression to match base64 strings
        $regex = '/data:image\/[^;]+;base64,[^"]+/';

        // Find all base64 strings in the given string
        preg_match_all($regex, $s, $matches);

        // Loop through all matches and decode them
        foreach ($matches[0] as $match) {
            // Remove the "data:image" header from the match
            $encoded_image = substr($match, strpos($match, ",") + 1);
            // Decode the base64 string
            $decoded_image = base64_decode($encoded_image);
            // Replace the base64 string with an empty string
            $s = str_replace($match, '', $s);
        }

        return $s;
    }
}
