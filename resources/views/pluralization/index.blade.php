@extends('layouts.main')

@section('main.title', trans('pluralization.title'))
@section('main.content')
    {{ trans_choice('pluralization.content', 1) }}
    {{ trans_choice('pluralization.content', 3) }}
    {{ trans_choice('pluralization.content', 5) }}
@endsection
