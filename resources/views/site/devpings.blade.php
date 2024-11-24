@extends('layouts.site')

@section('content')

<div class="container">
<img class="d-block mx-auto my-4" src="{{ asset('build/assets/img/devping.svg') }}" alt="devping" width="120">
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <div class="d-flex text-body-secondary pt-3">
    @foreach($devPings as $devPing)
      <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
        <div class="d-flex justify-content-between">
            <strong class="text-gray-dark">
                {!! $devPing->body !!}
            </strong>
            <a href="#">
                <button type="button" class="btn btn-light btn-sm"><i class="fas fa-share"></i></button>
            </a>
        </div>
        <span class="d-block">{{ $devPing->created_at }}</span>
      </div>
      @endforeach
      <div class="row d-flex justify-content-center">
          {{ $devPings->appends(request()->query())->links() }}
      </div>
    </div>
    
  </div>
</div>



@endsection
