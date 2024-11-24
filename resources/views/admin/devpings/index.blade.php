@extends('layouts.admin.app')


@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">DevPings</h1>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card mb-4">
            <div class="card-header">
                <button type="button" class="btn btn-primary btn-sm float-right ml-3" onClick="window.location.reload()"><i class="fas fa-sync"></i></button>
                <a href="{{ route('devpings.create') }}">
                    <button type="button" class="btn btn-primary btn-sm float-right">Criar <i class="fas fa-plus"></i></button>
                </a>
            </div>
            <div class="card-body">
                <table class="table table-bordered display" id="dataTable" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <td>User</td>
                            <th>Texto</th>
                            <th>Data</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                        <tbody>
                            @foreach ($devpings as $devping)
                            <tr>
                                <td>{{ $devping->id }}</td>
                                <td>{{ $devping->user->name }}</td>
                                <td>{!! $devping->body !!}</td>
                                <td>{{ $devping->created_at }}</td>
                                <td>

                                    <button type="button" class="btn btn-dark btn-sm">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                    <a class="btn btn-sm btn-danger" href="/admin/devpings" onclick="event.preventDefault();
          document.getElementById('devpings-delete').submit();"  >
                                        Remover
                                   </a>
                                    <form id="devpings-delete" action="{{ route('devpings.destroy', $devping->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                    </form>
                                    <a class="btn btn-sm btn-primary" href="{{ route('devpings.edit', $devping->id) }}">
                                         Editar
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <td>User</td>
                            <th>Texto</th>
                            <th>Data</th>
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
