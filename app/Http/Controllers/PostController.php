<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        //GET
        $data['posts'] = Post::orderBy('id', 'desc')->paginate(5);

        return view('posts.index', $data);

       // return view('/recipes/image-upload');

    }

    public function create()
    {
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

       // $validatedData = $request->validate([
       //     'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
       // ]);

       // $name = $request->file('image')->getClientOriginalName();
       // $path = $request->file('image')->store('public/images');

       // $save = new Image;

       // $save->name = $name;
       // $save->path = $path;

       // $save->save();

       // return redirect('upload.image.index')->with('status', 'Image has been uploaded successfully with validation.');
    }

    public function show(Post $post)
    {
        //GET
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)

        //GET
    {
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
                'image' => 'required|image|mimes;jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $path = $request->file('image')->stor('public/images');
            $post->image = $path;
        }
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();

        return redirect()->route('posts.index')
                        ->with('success','Post updated successfully.');
    }

    public function destroy(Post $post)

    //DELETE
{
    $post->delete();

    return redirect()->route('posts.index')
                    ->with('success', 'Post has been deleted successfully.');
}

}
