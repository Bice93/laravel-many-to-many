<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::where('user_id', Auth::id())->get();
        $posts= Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('post', 'categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate(
            [
            'title'=>['required', 'min:5', 'max:255',
            Rule::unique('posts', 'title')->ignore($data['title'], 'title')],
            'post_content' => 'required|min:10',
            'post_image'=>'required|image|max:256',
            ],
            [
            'title.required' => 'Inserisci il titolo!',
            'post_content.required' => 'Inserisci la serie!',
            'post_image.required' => 'Inserisci l\'immagine!',
            ]
        );
        $newPost = new Post();
        $newPost->title = $data['title'];
        $newPost->post_content = $data['post_content'];
        //$newPost->post_image = $data['post_image'];
        $newPost->post_image = Storage::put('uploads', $data['post_image']);
        $newPost->user_id = Auth::id();
        $newPost->post_date= new DateTime();
        $newPost->category_id = $data['category_id'];
        //dd($newPost);
        $newPost-> save();
        $newPost->tags()->sync($data['tags']);
        
        return redirect()->route('admin.posts.show', $newPost->id)->with('created', $data['title']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.show', compact('post',));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $request->validate(
            [
                'title'=>['required', 'min:5', 'max:255',
                Rule::unique('posts', 'title')->ignore($data['title'], 'title')],
                'post_content' => 'required|min:10',
                'post_image'=>'required|image|max:256',
            ],
            [
                'title.required' => 'Inserisci il titolo!',
                'post_content.required' => 'Inserisci la serie!',
                'post_image.required' => 'Inserisci l\'immagine!',
                ]
        );
        $post = Post::findOrFail($id);
        $post->title = $data['title'];
        $post->post_content = $data['post_content'];
        //$post->post_image = $data['post_image'];
        $post->post_image = Storage::put('uploads', $data['post_image']);
        $post->user_id = Auth::id();
        $post->post_date= new DateTime();
        $post->category_id = $data['category_id'];
        //dd($post);
        $post->save();
        $post->tags()->sync($data['tags']);
        return redirect()->route('admin.posts.show', $post->id)->with('edited', $data['title']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('admin.posts.index')->with('delete', $post->title);

    }
}
