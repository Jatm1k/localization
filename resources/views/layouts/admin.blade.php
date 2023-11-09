@extends('layouts.base')

@section('content')
    @include('admin.includes.navbar')
    <section>
        <div class="container">
            @include('admin.includes.header')
            @include('admin.includes.errors')
            @yield('admin.content')
        </div>
    </section>
@endsection

@push('js')
    <script src="//unpkg.com/alpinejs" defer></script>
@endpush
