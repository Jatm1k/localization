@extends('layouts.admin')

@section('admin.title', 'Посты')
@section('admin.create', route('admin.posts.create'))
@section('admin.content')
    @include('admin.posts.table')
@endsection
