<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $posts = Post::orderBy('created_at', 'desc')->paginate(3);

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $input = $request->all();

        $user = Auth::user();

        $user->posts();

        if ($file = $request->file('photo_id')) {

            $name = time() . $file->getClientOriginalName();


            $file->move('images', $name);

            $photo = Photo::create(['path' => $name]);

            $input['photo_id'] = $photo->id;


        }

        $user->posts()->create($input);

        return redirect('/admin/posts');


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        //

        $post = Post::findBySlugOrFail($slug);

        return view('admin.posts.edit', compact('post'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $post = Auth::user()->posts()->whereId($id)->first();

        $input = $request->all();


        if($post->photo->path){
        unlink(public_path() . $post->photo->path);
        }
        if ($file = $request->file('photo_id')) {

            $name = time() . $file->getClientOriginalName();


            $file->move('images', $name);

            $photo = Photo::create(['path' => $name]);

            $input['photo_id'] = $photo->id;

        }

        $post->update($input);


        return redirect('/admin/posts');

        }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::findOrFail($id);

        unlink(public_path() . $post->photo->path);

        $post->delete();

        return redirect('/admin/posts');
    }

    public function post($slug)
    {

        $post = Post::findBySlugOrFail($slug);

        return view('article', compact('post'));

    }

}
