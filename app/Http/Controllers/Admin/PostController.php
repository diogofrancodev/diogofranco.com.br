<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\CategoryPost;
use App\Models\Setting;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function __construct(
    ){}

    public function index(): View
    {
        if (! Gate::allows('post-index')) {
            return abort(401);
        }

        try{
            $posts = Post::all();
            return view('admin.post.index', compact('posts'));
        } catch (\Throwable $throwable) {
            flash('Erro ao procurar as Posts Cadastrados!')->error();
            return redirect()->back()->withInput();
        }
    }

    public function create(): View
    {
        if (! Gate::allows('post-create')) {
            return abort(401);
        }


        try{
            $categories = CategoryPost::all();

            return view('admin.post.create', compact('categories'));
        } catch (\Throwable $throwable) {
            flash('Erro ao procurar as PostS Cadastradas!')->error();
            return redirect()->back()->withInput();
        }
    }

    public function store(
        Request $request
    ){
        if (! Gate::allows('post-store')) {
            return abort(401);
        }

        DB::beginTransaction();
        try {

            $user = Auth::user()->id;

            $image = Storage::disk('posts')->put('web', $request->file( key:'image'));

            $post = new Post;
            $post->user_id = $user;
            $post->category_posts_id = $request->category;
            $post->title = $request->title;
            $post->excerpt = $request->excerpt;
            $post->body = $request->body;
            $post->image = $image;
            $post->slug = $request->title;
            $post->meta_keywords = $request->title;
            $post->status = $request->status;
            $post->save();

            flash('Post criado com sucesso!')->success();
            DB::commit();
            return redirect('admin/posts');
        }catch (\Throwable $throwable){
            DB::rollBack();
            if($request->file){
                Storage::delete('posts', $request->file( key:'image'));
            }
            dd($throwable);
            flash('Erro Cadastrar!')->error();
            return redirect()->back()->withInput();
        }
    }

    public function show($post_id)
    {
        if (! Gate::allows('post-show')) {
            return abort(401);
        }


        try{


            return view('admin.post.show');
        } catch (\Exception $exception) {
            dd($exception);
            flash('Erro ao buscar a Capa!')->error();
            return redirect()->back()->withInput();
        }
    }

    public function edit($id): View
    {
        if (! Gate::allows('post-edit')) {
            return abort(401);
        }


        try{
            $post = Post::where('id','=', $id)->first();
            $categories = CategoryPost::all();

            return view('admin.post.edit', compact('post','categories'));
        } catch (\Throwable $throwable) {
            dd($throwable);
            flash('Erro ao procurar as PostS Cadastradas!')->error();
            return redirect()->back()->withInput();
        }
    }

    public function update(
        Request $request, $id
    ){
        if (! Gate::allows('post-update')) {
            return abort(401);
        }

        try{
            $user = Auth::user()->id;
            $post = Post::find($id);
            $post_oldimage = $post->image;
            if($request->file( key:'image')!= ''){
                $post_image = Storage::disk('posts')->put('web', $request->file( key:'image'));
                Storage::disk('posts')->delete($post_oldimage);
            }
            $post_update = Post::find($id);
            $post_update->user_id = $user;
            $post_update->category_posts_id = $request->category;
            $post_update->title = $request->title;
            $post_update->excerpt = $request->excerpt;
            $post_update->body = $request->body;
            if($request->file( key:'image') != ''){

                $post_update->image = $post_image;
            }
            $post_update->slug = $request->title;
            $post_update->meta_keywords = $request->title;
            $post_update->status = $request->status;
            $post_update->update();

            flash('Post editando com sucesso!')->success();
            DB::commit();
            return redirect('admin/posts');
        }catch (\Throwable $throwable){
            DB::rollBack();
            dd($throwable);
            flash('Erro ao editar Post!')->error();
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        if (! Gate::allows('post-destroy')) {
            return abort(401);
        }


        $post = Post::findOrFail($id);
        $post->delete();

        return redirect('/admin/posts');
    }
}
