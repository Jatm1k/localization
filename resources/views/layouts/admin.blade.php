@extends('layouts.base')

@section('content')
@include('admin.includes.navbar')
    <section>
        <div class="container">
            <h3>@yield('admin.title')</h3>
            @yield('admin.content')
        </div>
    </section>
@endsection