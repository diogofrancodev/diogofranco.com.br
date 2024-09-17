@extends('layouts.admin.app')

@section('title', 'Editar Usuário')

@section('css-style')
    {{-- css files --}}

@endsection
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Editar Usuário</h1>
    <p class="mb-4"> </p>
    <div class="row">

        <div class="col-lg-12">
            <!-- Default Card Example -->
            <div class="card mb-4">
            <div class="card-header">
                <a href="{{ route('users.index') }}">
                    <button type="button" class="btn btn-primary btn-sm float-left"><i class="fas fa-angle-left"></i> Voltar</button>
                </a>
            </div>
            <div class="card-body">
            <form action="{{ route("users.update", [$user->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">Nome*</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($user) ? $user->name : '') }}" required>
                            @if($errors->has('name'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </em>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email">E-mail*</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($user) ? $user->email : '') }}" required>
                            @if($errors->has('email'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </em>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label for="password">Senha</label>
                            <input type="password" id="password" name="password" class="form-control">
                            @if($errors->has('password'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </em>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
                            <label for="roles">Regras</label>
                            <select name="roles[]" id="select-tools" multiple="multiple" required>
                                @foreach($roles as $id => $roles)
                                <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || isset($user) && $user->roles()->pluck('name', 'id')->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
                            @endforeach
                            </select>
                            @if($errors->has('roles'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('roles') }}
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


@endsection
