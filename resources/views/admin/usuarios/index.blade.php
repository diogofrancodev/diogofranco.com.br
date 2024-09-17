@extends('layouts.admin.app')

@section('title', 'Usuários')

@section('css-style')
        {{-- css files --}}
        <!-- Custom styles for this page -->
@endsection
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Permissão</h1>
    <p class="mb-4"> </p>
    <div class="row">

        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card mb-4">
            <div class="card-header">
            <button type="button" class="btn btn-primary btn-sm float-right ml-3" onClick="window.location.reload()"><i class="fas fa-sync"></i></button>
                    <a href="{{ route('users.create') }}">
                    <button type="button" class="btn btn-primary btn-sm float-right">Criar <i class="fas fa-plus"></i></button>
                    </a>
            </div>
            <div class="card-body">
                <table class="table table-bordered display" id="dataTable" width="100%">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Regras</th>
                        <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $key => $user)
                                <tr data-entry-id="{{ $user->id }}">
                                
                                <td>
                                        {{ $user->id ?? '' }}
                                </td>
                                <td>
                                        {{ $user->name ?? '' }}
                                </td>
                                <td>
                                        {{ $user->email ?? '' }}
                                </td>
                                <td>
                                        @foreach($user->roles()->pluck('name') as $role)
                                        <!-- <span class="badge">{{ $role }}</span> -->
                                        <span class="badge badge-dark">{{ $role }}</span>
                                        @endforeach
                                </td>
                                <td>

                                        <a class="btn btn-sm btn-primary" href="{{ route('users.edit', $user->id) }}">
                                        <!-- {{ trans('global.edit') }} --> Editar
                                        </a>

                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Tem certeza disso ?');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-sm btn-danger " value="Deletar">
                                        </form>
                                </td>

                                </tr>
                        @endforeach
                        </tbody>
                    <tfoot>
                        <tr>
                        
                        </tr>
                    </tfoot>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>


<!-- END: Content-->
@endsection
@section('js-script')
        {{-- Page js files --}}
        
        
        </script>
@endsection