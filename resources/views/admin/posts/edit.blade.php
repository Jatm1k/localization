@extends('layouts.admin')

@section('admin.title', 'Посты')
@section('admin.content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Редактирование поста</h5>
            @include('admin.posts.form', [
                'action' => route('admin.posts.update', $post),
                'method' => 'put',
            ])
        </div>
    </div>
@endsection
