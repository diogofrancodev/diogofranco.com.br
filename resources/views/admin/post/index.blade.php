@extends('layouts.admin.app')


@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Postagens</h1>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card mb-4">
            <div class="card-header">
                <button type="button" class="btn btn-primary btn-sm float-right ml-3" onClick="window.location.reload()"><i class="fas fa-sync"></i></button>
                <a href="{{ route('posts.create') }}">
                    <button type="button" class="btn btn-primary btn-sm float-right">Criar <i class="fas fa-plus"></i></button>
                </a>
            </div>
            <div class="card-body">
                <table class="table table-bordered display" id="dataTable" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <td>Título</td>
                            <th>Categoria</th>
                            <th>User</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->category->name }}</td>
                                <td>{{ $post->user->name }}</td>
                                <td>
                                    <i class="fa-solid fa-circle-xmark fa-lg" style="color: #c5111a;" {{ $post->status != 'DRAFT' ? 'hidden' : '' }}></i>
                                    <i class="fa-solid fa-circle-exclamation fa-lg" style="color: #e9d02f;" {{ $post->status != 'PENDING' ? 'hidden' : '' }}></i>
                                    <i class="fa-solid fa-circle-check fa-lg" style="color: #38941e;" {{ $post->status != 'PUBLISHED' ? 'hidden' : '' }}></i>
                                </td>
                                <td>

                                    <button type="button" class="btn btn-dark btn-sm">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                    <a class="btn btn-sm btn-danger" href="/admin/posts" onclick="event.preventDefault();
          document.getElementById('posts-delete').submit();"  >
                                        Remover
                                   </a>
                                    <form id="posts-delete" action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                    </form>
                                    <a class="btn btn-sm btn-primary" href="{{ route('posts.edit', $post->id) }}">
                                         Editar
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <td>Título</td>
                            <th>Categoria</th>
                            <th>User</th>
                            <th>Status</th>
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
