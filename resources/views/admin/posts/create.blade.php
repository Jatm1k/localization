@extends('layouts.admin')

@section('admin.title', 'Посты')
@section('admin.content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Создать пост</h5>
            @include('admin.posts.form', [
                'action' => route('admin.posts.store'),
                'method' => 'post',
            ])
        </div>
    </div>
@endsection
