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
                            <form method="post" action="" enctype="multipart/form-data">
                                @csrf



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
  $('.summernote').summernote();
});
</script>
@endsection
