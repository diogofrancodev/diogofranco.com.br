@extends('layouts.admin.app')


@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Categorias de Post</h1>
    </div>
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body mb-5">
                        <form method="post" action="{{ route('post_categorias.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="title">Nome:</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" required/>
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary float-right">Criar Categoria</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card mb-4">
            <div class="card-header">
                <button type="button" class="btn btn-primary btn-sm float-right ml-3" onClick="window.location.reload()"><i class="fas fa-sync"></i></button>
                <a href="{{ route('post_categorias.create') }}">
                    <button type="button" class="btn btn-primary btn-sm float-right">Criar <i class="fas fa-plus"></i></button>
                </a>
            </div>
            <div class="card-body">
                <table class="table table-bordered display" id="dataTable" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <button type="button" class="btn btn-dark btn-sm">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                    <a class="btn btn-sm btn-primary" href="{{ route('post_categorias.edit', $category->id) }}">
                                         Editar
                                    </a>
                                    <a class="btn btn-sm btn-danger" href="/admin/post_categorias" onclick="event.preventDefault();
          document.getElementById('categories-delete').submit();"  >
                                        Remover
                                   </a>
                                    <form id="categories-delete" action="{{ route('post_categorias.destroy', $category->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                    </form>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Ações</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            </div>
        </div>
    </div>

</div>
<!-- End of Main Content -->

@endsection
