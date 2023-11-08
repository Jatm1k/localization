<form action="{{ $action }}" method="POST">
    @csrf
    @method($method)
    <div class="mb-3">
        <lavel class="form-label">Заголовок</lavel>
        <input type="text" name="title" value="{{ old('title', $post->title) }}" class="form-control" autofocus>
    </div>
    <button class="btn btn-primary">Сохранить</button>
</form>
