@extends('layouts.main')

@section('main.title', trans('blog.title'))
@section('main.content')
    @if ($posts->isEmpty())
        <div class="pt-3">{{ trans('common.empty') }}</div>
    @else
        @foreach ($posts as $post)
            <article>
                <h2 class="h5">{{ $post->title }}</h2>
                <p>{{ $post->created_at->translatedFormat('j F Y') }}</p>
            </article>
        @endforeach
        {{ $posts->appends(request()->all())->links() }}
    @endif

@endsection
