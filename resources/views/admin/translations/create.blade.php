@extends('layouts.admin')

@section('admin.title', 'Переводы')
@section('admin.content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Создать перевод</h5>
            @include('admin.translations.form', [
                'action' => route('admin.translations.store'),
                'method' => 'post',
            ])
        </div>
    </div>
@endsection
