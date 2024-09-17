<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryPost;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Gate;


class CategoryPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (! Gate::allows('categorypost-index')) {
            return abort(401);
        }

        try{
            $categories = CategoryPost::all();
            return view('admin.post_category.index', compact('categories'));
        } catch (\Throwable $throwable) {
            dd($throwable);
            flash('Erro ao buscar Categorias!')->error();
            return redirect()->back()->withInput();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (! Gate::allows('categorypost-create')) {
            return abort(401);
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (! Gate::allows('categorypost-store')) {
            return abort(401);
        }

        DB::beginTransaction();
        try{


            $category = new CategoryPost;
            $category->name = $request->name;
            $category->save();

            DB::commit();
            flash('Categoria cadastrada!',);
            return redirect('admin/post_categorias');
        } catch (\Throwable $throwable) {
            DB::rollBack();
            dd($throwable);
            flash('Erro ao cadastrar Categorias!',)->error();
            return redirect()->back()->withInput();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (! Gate::allows('categorypost-show')) {
            return abort(401);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (! Gate::allows('categorypost-edit')) {
            return abort(401);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $category)
    {
        if (! Gate::allows('categorypost-update')) {
            return abort(401);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (! Gate::allows('categorypost-destroy')) {
            return abort(401);
        }

        $user = CategoryPost::findOrFail($id);
        $user->delete();

        return redirect('/admin/post_categorias');

    }
}
