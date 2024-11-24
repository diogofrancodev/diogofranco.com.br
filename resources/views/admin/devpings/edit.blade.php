@extends('layouts.admin.app')

<style>
    input[type="file"] {
  display: none;
}

.custom-file-upload {

  border: 1px solid #ccc;
  display: inline-block;
  padding: 6px 12px;
  cursor: pointer;
}
.btn-file{
    padding-top: 32px;
}
</style>
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar Postagem</h1>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body mb-5">
                            <form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
                                @csrf
                                {{ method_field('PUT') }}

                                <div class="form-group">
                                    <label for="title">Titulo:</label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title', isset($post) ? $post->title : '') }}"/>
                                </div>

                                <div class="form-group">
                                    <label for="excerpt">Resumo:</label>
                                    <textarea class="form-control" name="excerpt" >{{ old('excerpt', isset($post) ? $post->excerpt : '') }}</textarea>
                                </div>

                                <div class="row">
                                    <div class=" col-md-4">
                                        <label for="category">Categoria:</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="category" >
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" @if($category->id === $post->category_posts_id)  selected  @endif >{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class=" col-md-4">
                                        <label for="status">Status:</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="status" >
                                            <option value="DRAFT" @if($post->status === 'DRAFT')  selected  @endif>DRAFT</option>
                                            <option value="PENDING" @if($post->status === 'PENDING')  selected  @endif>PENDING</option>
                                            <option value="PUBLISHED" @if($post->status === 'PUBLISHED')  selected  @endif>PUBLISHED</option>
                                        </select>
                                    </div>
                                    <!-- Image -->
                                    <div class="col-md-2">
                                        <div class="d-grid btn-file gap-2">
                                        <label for="file-upload" class="btn mx-auto btn-primary">
                                            Carregar Imagem
                                        </label>
                                        <input id="file-upload" name="image" type="file" />
                                    </div>
                                </div>

                               </div>
                                <div class="my-2">
                                    <label class="control-label" for="textarea">Descrizione breve:</label>
                                    <textarea class="summernote" name="body">{{ $post->body }}</textarea>
                                </div>

                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary float-right">Editar Post</button>
                                </div>

                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- include libraries(jQuery, bootstrap) -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
   $(document).ready(function() {
        $('.summernote').summernote(
            {
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            }
        );

    });
</script>
@endsection
