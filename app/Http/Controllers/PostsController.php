<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Posts;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    public function __construct()
    {
        // Middleware
        $this->middleware('sentinel.auth');
        $this->middleware('sentinel.access:posts.create', ['only' => ['create', 'store']]);
        $this->middleware('sentinel.access:posts.view', ['only' => ['index', 'show', 'trash']]);
        $this->middleware('sentinel.access:posts.update', ['only' => ['edit', 'update']]);
        $this->middleware('sentinel.access:posts.destroy', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::paginate(4);
        return view('Centaur::posts.index', compact('posts'));
    }

     /**
     * Display a listing of the deleted blog posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $posts = Posts::onlyTrashed()->paginate(4);
        return view('Centaur::posts.trash', compact('posts'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Centaur::posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PostRequest; $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {

        if($request->hasFile('avatar'))
       {
           $fileNameExt = $request->file('avatar')->getClientOriginalName();
           $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
           $fileExt = $request->file('avatar')->getClientOriginalExtension();
           $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
           $pathToStore = $request->file('avatar')->storeAs('avatars',$fileNameToStore);
       }else{
           $fileNameToStore = 'user.png';
       }

        $data = $request->except('_token') ;
        $data['avatar'] = $fileNameToStore;




        $post = new Posts();

        try{
            $newPost = $post->savePost($data);
        } catch(Exception $e){
            Session::flash('error', 'Nešto nije u redu molimo probajte ponovno!');
            return Redirect::back();
        }

        Session::flash('success', 'Uspješno je dodan novi blog naziva: ' . $newPost->title);

        return Redirect::route('posts.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Posts $post)
    {
        return view('Centaur::posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posts $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Posts $post)
    {
        return view('Centaur::posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PostRequest; $request
     * @param  \App\Models\Posts $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Posts $post)
    {

        if($request->hasFile('avatar'))
       {
           $fileNameExt = $request->file('avatar')->getClientOriginalName();
           $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
           $fileExt = $request->file('avatar')->getClientOriginalExtension();
           $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
           $pathToStore = $request->file('avatar')->storeAs('avatars',$fileNameToStore);
       }else{
           $fileNameToStore = $post->avatar;
       }

        $data = $request->except(['_token','_method']);
        $data['avatar'] = $fileNameToStore;


        try{
            $updatePost = $post->updatePost($data);
        } catch(Exception $e){
            Session::flash('error', 'Nešto nije u redu molimo probajte ponovno!');
            return Redirect::back();
        }
        Session::flash('success', 'Uspješno ste uredili blog naziva: ' . $post->title);

        return Redirect::route('posts.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Posts::withTrashed()->findOrFail($id);
        try{
            $post->deletePost();
        } catch(Exception $e){
            Session::flash('error', 'Nešto nije u redu molimo probajte ponovno!');
            return Redirect::back();
        }
        Session::flash('success', 'Uspješno je izbrisan blog naziva: ' . $post->title);

        return Redirect::route('posts.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {

        $post = Posts::withTrashed()->findOrFail($id);

        try{
            $post->restore();
        } catch(Exception $e){
            Session::flash('error', 'Nešto nije u redu molimo probajte ponovno!');
            return Redirect::back();
        }
        Session::flash('success', 'Uspješno je vraćen blog naziva: ' . $post->title);

        return Redirect::route('posts.index');
    }


}
