@extends('layouts.base')

@section('content')
@include('includes.navbar')
    <section>
        <div class="container">
            <h3>@yield('main.title')</h3>
            @yield('main.content')
        </div>
    </section>
@endsection