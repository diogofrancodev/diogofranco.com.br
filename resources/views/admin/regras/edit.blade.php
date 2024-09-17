@extends('layouts.admin.app')

@section('title', 'Regras')

@section('css-style')
    {{-- css files --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Editar Regras</h1>
    <p class="mb-4"> </p>
    <div class="row">

        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card mb-4">
            <div class="card-header">
                <a href="{{ route('roles.index') }}">
                    <button type="button" class="btn btn-primary btn-sm float-left"><i class="fas fa-angle-left"></i> Voltar</button>
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route("roles.update", [$role->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name">Nome*</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($role) ? $role->name : '') }}" required>
                        @if($errors->has('name'))
                            <em class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </em>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('permission') ? 'has-error' : '' }}">
                        <label for="select-tools">Regras</label>
                            <select name="permission[]" id="select-tools" class="form-control" multiple="multiple" required>
                            @foreach($permissions as $id => $permissions)
                                <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || isset($role) && $role->permissions()->pluck('name', 'id')->contains($id)) ? 'selected' : '' }}>{{ $permissions }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('permission'))
                            <em class="invalid-feedback">
                                {{ $errors->first('permission') }}
                            </em>
                        @endif
                    </div>
                    <div>
                        <input class="btn btn-primary mr-1 mb-1" type="submit" value="Salvar">
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>

</div>
<!-- END: Content-->
@endsection
@section('js-script')
        {{-- Page js files --}}
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
        <script>
        $(document).ready(function () {
        $('.select-all').click(function () {
            let $select2 = $(this).parent().siblings('.select2')
            $select2.find('option').prop('selected', 'selected')
            $select2.trigger('change')
        })
        $('.deselect-all').click(function () {
            let $select2 = $(this).parent().siblings('.select2')
            $select2.find('option').prop('selected', '')
            $select2.trigger('change')
        })

        $('.select2').select2()


        })
        </script>
@endsection
