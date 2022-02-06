<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class DownloadedInfoController extends Controller
{
    //Have to change the code from PostController to DownloadedInfoController
    public function index()
    {
        //GET
        $data['posts'] = Post::orderBy('id', 'desc')->paginate(5);

        return view('posts.index', $data);
    }

    public function create()
    {
        //GET
        return view('posts.create');
    }

    public function store(Request $request)
    {
        //POST

        //validate requests
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpg,pnp,jpeg,gif,svg|max:2048',
            'description' => 'required'
        ]);

        $path = $request->file('image')->store('public/images');
        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->image = $path;
        $post->save();

        return redirect()->route('posts.index')
                        ->with('success', 'Post has been created successfully.');
    }

    public function show(Post $post)
    {
        //GET
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        //GET
        return view('posts.edit',compact('post'));
    }


    public function update(Request $request, $id)
    {
        //POST

        //validate requests
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $post = Post::find($id);
        if($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $path = $request->file('image')->store('public/images');
            $post->image = $path;
        }
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();

        return redirect()->route('posts.index')
                        ->with('success','Post updated successfully.');
    }

    public function destroy(Post $post)  
    {
        //DELETE
        $post->delete();

        return redirect()->route('posts.index')
                        ->with('success', 'Post has been deleted successfully.');
    }
}
