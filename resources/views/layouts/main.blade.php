@extends('layouts.base')

@section('content')
    @include('includes.navbar')
    <section>
        <div class="container">
            <div class="mb-3">
                <h3 class="mb-0">@yield('main.title')</h3>
            </div>
            @yield('main.content')
        </div>
    </section>
@endsection
