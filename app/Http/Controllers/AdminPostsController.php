<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostsCreateRequest;
use App\Http\Requests\PostsEditRequest;
use App\Http\Requests\PostsUpdateRequest;
use App\Photo;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
    public function store(PostsCreateRequest $request)
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

        Session::flash('created_post','The post has been created!');


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
    public function update(PostsEditRequest $request, $id)
    {
        //

        $post = Post::whereId($id)->first();

        $input = $request->except('photo_id');
        $photo_id = $request->photo_id;

        if($photo_id) {


        if($post->photo->path){
        unlink(public_path() . $post->photo->path);
        }
        if ($file = $request->file('photo_id')) {

            $name = time() . $file->getClientOriginalName();


            $file->move('images', $name);

            $photo = Photo::create(['path' => $name]);

            $input['photo_id'] = $photo->id;

        }
        }

        $post->update($input);

        Session::flash('updated_post','The post has been updated!');

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

        Session::flash('deleted_post','The post has been deleted!');


        return redirect('/admin/posts');
    }

    public function post($slug)
    {

        $post = Post::findBySlugOrFail($slug);

        return view('article', compact('post'));

    }

    public function storeRumour(PostsCreateRequest $request)
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

        Session::flash('created_post','The post has been created!');


        return redirect('/admin/posts');


    }


}
