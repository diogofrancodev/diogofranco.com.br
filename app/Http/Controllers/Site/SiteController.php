<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\CategoryPost;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function index(): View
    {
        try{
            $lastPost = Post::latest()->first();

            $posts = Post::orderBy('created_at', 'desc')
            ->skip(1) // Pula o primeiro registro (último post)
            ->limit(4)
            ->get();

            return view('site.index', compact('posts', 'lastPost'));
        } catch (\Throwable $throwable) {
            flash('Erro ao procurar as Posts Cadastrados!')->error();
            return redirect()->back()->withInput();
        }
    }

    public function postAll(): View
    {
        try{
            $posts = Post::all()->paginate(7);
            return view('site.posts', compact('posts'));
        } catch (\Throwable $throwable) {
            flash('Erro ao procurar as Posts Cadastrados!')->error();
            return redirect()->back()->withInput();
        }
    }

    public function postCategory($category_id): View
    {
        try{
            $posts = Post::where('category_posts_id', $category_id)->paginate(7);
            return view('site.posts_categoria', compact('posts'));
        } catch (\Throwable $throwable) {
            flash('Erro ao procurar as Posts Cadastrados!')->error();
            return redirect()->back()->withInput();
        }
    }

    public function post($post_id)
    {
        try{
            $post = Post::find($post_id);
            return view('site.post', compact('post'));
        } catch (\Throwable $throwable) {
            flash('Erro ao procurar as Posts Cadastrados!')->error();
            dd($throwable);
            return redirect()->back()->withInput();
        }
    }
}
