@extends('layouts.admin.app')

@section('title', 'Regras')

@section('css-style')
        {{-- css files --}}
        <!-- Custom styles for this page -->
        <link href="{{ url('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">
@endsection
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Regras</h1>
    <p class="mb-4"> </p>
    <div class="row">

        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card mb-4">
            <div class="card-header">
            <button type="button" class="btn btn-primary btn-sm float-right ml-3" onClick="window.location.reload()"><i class="fas fa-sync"></i></button>
                    <a href="{{ route('roles.create') }}">
                    <button type="button" class="btn btn-primary btn-sm float-right">Criar <i class="fas fa-plus"></i></button>
                    </a>
            </div>
            <div class="card-body">
                <table class="table table-bordered display" id="dataTable" width="100%">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Regra</th>
                        <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $key => $role)
                                <tr data-entry-id="{{ $role->id }}">
                                
                                <td>
                                        {{ $role->id ?? '' }}
                                </td>
                                <td>
                                        {{ $role->name ?? '' }}
                                </td>
                                <td>

                                        <a class="btn btn-sm btn-primary" href="{{ route('roles.edit', $role->id) }}">
                                        <!-- {{ trans('global.edit') }} --> Editar
                                        </a>

                                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-sm btn-outline-warning " value="Deletar">
                                        </form>
                                </td>

                                </tr>
                        @endforeach
                        </tbody>
                    <tfoot>
                        <tr>
                        <th>ID</th>
                        <th>Regra</th>
                        <th>Ações</th>
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
        <!-- Page level plugins -->
        <script src="{{ url('vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ url('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="{{ url('js/demo/datatables-demo.js') }}"></script>

        <script>
        $('#dataTable').DataTable({
            dom: 'Bfrtip',
            buttons: {
                buttons: [ 'copy', 'csv', 'pdf' ]
            },
            "language": {
                "sProcessing":    "Procesando...",
                "sLengthMenu":    "Mostrar _MENU_ registros",
                "sZeroRecords":   "Não encontramos resultados",
                "sEmptyTable":    "Nenhum dado disponível nesta tabela",
                "sInfo":          "Mostrando registros de _START_ a _END_ do total de _TOTAL_ registros",
                "sInfoEmpty":     "Mostrando registros de 0 a 0 do total de 0 registros",
                "sInfoFiltered":  "(filtrado do total de _MAX_ registros)",
                "sInfoPostFix":   "",
                "sSearch":        "Buscar:",
                "sUrl":           "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Carregando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":    "Último",
                    "sNext":    "Seguinte",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Ativar para ordenar a coluna de maneira ascendente",
                    "sSortDescending": ": Ativar para ordenar a coluna de maneira descendente"
                }
            }
        });
        
        </script>
@endsection