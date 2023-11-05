<form action="{{ $action }}" method="POST">
    @csrf
    @method($method)
    <div class="row">
        <div class="col-12 col-sm-6 mb-3">
            <lavel class="form-label">Группа</lavel>
            <input type="text" name="group" value="{{ old('group', $translation->group) }}" class="form-control"
                autofocus>
        </div>
        <div class="col-12 col-sm-6 mb-3">
            <lavel class="form-label">Ключ</lavel>
            <input type="text" name="key" value="{{ old('key', $translation->key) }}" class="form-control">
        </div>
    </div>
    @foreach (App\Models\Language::all() as $language)
        <div class="col-12 mb-3">
            <lavel class="form-label">Перевод на {{ $language->name }}</lavel>
            <textarea name="text[{{ $language->id }}]" class="form-control">{{ old("text.{$language->id}", $translation->text[$language->id] ?? '') }}</textarea>
        </div>
    @endforeach
    <button class="btn btn-primary">Сохранить</button>
</form>
