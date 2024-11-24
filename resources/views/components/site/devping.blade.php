<div class="container">
    <div class="p-3 mb-2 rounded text-body-emphasis bg-body-secondary devping">
       
        <div class="col-12 d-flex justify-content-between">
            <img class="mb-2" src="{{ asset('build/assets/img/devping.svg') }}" alt="devping" width="50">
            @if(Route::is('dev.pings') )
                
            @else
                <a href="{{ route('dev.pings') }}">
                    <button type="button" class="btn btn-light btn-sm">ver <i class="fas fa-plus"></i></button>
                </a>
            @endif
        </div>
        <p class="ping"></p>
        <p class="date"></p>
       
    </div>
</div>