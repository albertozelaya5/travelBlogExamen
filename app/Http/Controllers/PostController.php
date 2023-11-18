<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();//->withTrashed()->get()
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'contenido' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validación para imágenes
        ]);
        $imagePath = $request->file('image')->store('post_image', 'public');
        Post::create([
            'titulo' => $request->input('titulo'),
            'contenido' => $request->input('contenido'),
            'image' => $imagePath,
        ]);

        return redirect()->route('posts.index')->with('success', 'Publicación creada exitosamente.');
    }
    public function show (Post $post)
    {
        return view('posts.show', compact('post'));
    }
    public function edit (Post $post)
    {
        return view('posts.edit', compact('post'));
    }
    //Realizar la actualizacioin de los datos en la BD
    /* public function update(Request $request, Post $post)
        {
            $request->validate([
                'titulo' => 'required',
                'contenido' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validación para imágenes
            ]);
            if($request->hasFile('image')){
                Storage::disk('public')->delete($post->image);
                $imagePath = $request->file('image')->store('post_images', 'public');
            }else{
                $imagePath = $post->image;
            }
            
            Post::update([
                'titulo' => $request->input('titulo'),
                'contenido' => $request->input('contenido'),
                'image' => $imagePath,
            ]);

            return redirect()->route('posts.index')->with('success', 'Publicación creada exitosamente.');
        } */
        public function update(Request $request, Post $post)
        {
            $request->validate([
                'titulo' => 'required',
                'contenido' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validación para imágenes
            ]);
            if($request->hasFile('image')){
                Storage::disk('public')->delete($post->image);
                $imagePath = $request->file('image')->store('post_images', 'public');
            }else{
                $imagePath = $post->image;
            }
            
            $post->update([
                'titulo' => $request->input('titulo'),
                'contenido' => $request->input('contenido'),
                'image' => $imagePath,
            ]);

            return redirect()->route('posts.index')->with('success', 'Publicación actualizada exitosamente.');
        }
        public function destroy(Post $post)
        {
            $post->delete();
            return redirect()->route('posts.index')->with('success', 'Publicación eliminada');
        }
}
    
