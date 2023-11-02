@extends('layouts.main')

@section('main.title', trans('home.title'))
@section('main.content')
    {{ trans('home.language.current') }} {{ app()->getLocale() }}
    {{ trans('home.language.fallback') }} {{ app()->getFallbackLocale() }}
@endsection
