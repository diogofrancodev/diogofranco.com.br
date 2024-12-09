@extends('layouts.site')

<style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      width: 100%;
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }

    .btn-bd-primary {
      --bd-violet-bg: #712cf9;
      --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

      --bs-btn-font-weight: 600;
      --bs-btn-color: var(--bs-white);
      --bs-btn-bg: var(--bd-violet-bg);
      --bs-btn-border-color: var(--bd-violet-bg);
      --bs-btn-hover-color: var(--bs-white);
      --bs-btn-hover-bg: #6528e0;
      --bs-btn-hover-border-color: #6528e0;
      --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
      --bs-btn-active-color: var(--bs-btn-hover-color);
      --bs-btn-active-bg: #5a23c8;
      --bs-btn-active-border-color: #5a23c8;
    }

    .bd-mode-toggle {
      z-index: 1500;
    }

    .bd-mode-toggle .dropdown-menu .active .bi {
      display: block !important;
    }
  </style>
@section('content')
  @if($lastDevPing)
  <div class="p-3 mb-2 rounded text-body-emphasis bg-body-secondary devping">
      <div class="col-12 d-flex justify-content-between">
          <img class="mb-2" src="{{ asset('build/assets/img/devping.svg') }}" alt="devping" width="70">
          <a href="{{ route('dev.pings') }}">
              <button type="button" class="btn btn-light btn-sm">ver <i class="fas fa-plus"></i></button>
          </a>
      </div>
      <p class="ping">{!! $lastDevPing->body !!}</p>
      <p class="date">{{ $lastDevPing->created_at }}</p>
  </div>
  @endif
  <div class="p-4  mb-4 rounded text-body-emphasis bg-body-secondary">
    <div class="col-lg-12 px-0">
      <h1 class="display-4 fst-italic">{{ $lastPost->title }}</h1>
      <p class="lead my-3">{{ $lastPost->title }}</p>
      <p class="lead mb-0"><a href="{{ URL('/post/'.$lastPost->id ) }}" class="text-body-emphasis fw-bold">Ler</a></p>
    </div>
  </div>

  <div class="row mb-2">
    @foreach ($posts as $post)
        <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-primary-emphasis">{{ $post->category->name }}</strong>
                <h3 class="mb-0">{{ $post->title }}</h3>
                <div class="mb-1 text-body-secondary">{{ $post->created_at->format('d/m/Y') }}</div>
                <p class="card-text mb-auto">{{ $post->excerpt }}</p>
                <a href="{{ URL('/post/'.$post->id )}}" class="icon-link gap-1 icon-link-hover stretched-link">
                Ler
                <svg class="bi"><use xlink:href="#chevron-right"/></svg>
                </a>
            </div>
            <div class="col-auto d-none d-lg-block">
                <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
            </div>
            </div>
        </div>
    @endforeach



  </div>


@endsection
