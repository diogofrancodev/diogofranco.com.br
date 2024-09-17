@extends('layouts.admin.app')
@section('title', 'Criar Permissões')

@section('vendor-style')
        {{-- vendor css files --}}
        <link rel="stylesheet" href="{{ asset('vendors/css/forms/select/select2.css') }}">
@endsection
@section('css-style')
    {{-- css files --}}
    <style>
        .select2-container--classic .select2-selection--multiple .select2-selection__choice, .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #bb924f !important;
        border-color: #bb924f !important;
        color: #000;
        padding: 5px;
    }
        .select2-container--classic .select2-selection--multiple .select2-selection__choice__remove, .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        color: #000 !important;
        float: right;
        margin-left: 0.5rem;
    }
    span .select2{
        width:100%;
    }
    </style>
@endsection
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Criar Permissão</h1>
    <p class="mb-4"> </p>
    <div class="row">

        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card mb-4">
            <div class="card-header">
                    <a href="{{ route('permissions.index') }}">
                    <button type="button" class="btn btn-primary btn-sm float-left"><i class="fas fa-angle-left"></i> Voltar</button>
                    </a>
            </div>
            <div class="card-body">
                <form action="{{ route("permissions.store") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                <label for="name">Permissão*</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($permission) ? $permission->name : '') }}" required>
                                @if($errors->has('name'))
                                <em class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                </em>
                                @endif
                        </div>
                        <div>
                                <input class="btn btn-primary mr-1 mb-1" type="submit" value="Criar">
                        </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js-script')
        {{-- Page js files --}}
        
@endsection