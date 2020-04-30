<?php

namespace App\Http\Controllers;


use App\Events\ViewPostEvent;
use App\Http\Requests\CreatePostRequest;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('user')->get();
        return view('posts.index', compact(['posts']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $post = new Post();
       if($file = $request->file('file')){
           $name_file = $file->getClientOriginalName();
//           $file->store('public/images');
           $file->move('images', $name_file);
          $post->path = $name_file;
       }
        $post->title = $request->title;
        $post->content = $request->description;
        $post->user_id = Auth::id();
        $post->save();
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
        event(new ViewPostEvent($post));
        return view('posts.show', compact(['post']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrfail($id);
        $user = Auth::user();
        if ($user->can(('update'), $post))
        {
            return view('posts.edit', compact(['post']));
        }else{
           echo "access denied";
       }





//       if( Gate::allows('edit-post', $post))
//       {
//           return view('posts.edit', compact(['post']));
//       }
//       else{
//           echo "access denied";
//       }

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
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->content = $request->description;
        $post->save();
        return redirect('posts');
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
       return redirect('posts');
    }
}
