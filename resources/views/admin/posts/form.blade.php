<form action="{{ $action }}" method="POST" x-data="{ language: 'ru' }">
    @php($languages = App\Models\Language::all())
    @csrf
    @method($method)
    <div class="mb-3">
        <lavel class="form-label">Выберите язык</lavel>
        <select class="form-select" x-model="language">
            @foreach ($languages as $language)
                <option value="{{ $language->id }}">{{ $language->name }}</option>
            @endforeach
        </select>
        @foreach ($languages as $language)
            <div class="mb-3" x-show="language == '{{ $language->id }}'">
                <lavel class="form-label">Заголовок({{ $language->name }})</lavel>
                <input type="text" name="title[{{ $language->id }}]"
                    value="{{ old("title.{$language->id}", $post->getTranslation('title', $language->id, false) ?? '') }}"
                    class="form-control">
            </div>
        @endforeach
        <lavel class="form-label">Публиковать на:</lavel>
        @foreach ($languages as $language)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="languages[]" value="{{ $language->id }}"
                    @checked(in_array($language->id, $post->languages ?: [])) id="languages-{{ $language->id }}">
                <label class="form-check-label" for="languages-{{ $language->id }}">
                    {{ $language->name }}
                </label>
            </div>
        @endforeach

    </div>
    <button class="btn btn-primary">Сохранить</button>
</form>
