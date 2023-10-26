<form action="{{ $action }}" method="POST">
    @csrf
    @method($method)
    <div class="row">
        <div class="col-12 col-sm-6 mb-3">
            <lavel class="form-label">ID языка</lavel>
            <input type="text" name="id" value="{{ old('id', $language->id) }}" class="form-control" autofocus>
        </div>
        <div class="col-12 col-sm-6 mb-3">
            <lavel class="form-label">Название языка</lavel>
            <input type="text" name="name" value="{{ old('name', $language->name) }}" class="form-control">
        </div>
    </div>
    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" value="1" @checked(old('active', $language->active)) name="active"
            id="active">
        <label class="form-check-label" for="active">
            Показывать на сайте
        </label>
    </div>
    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" value="1" @checked(old('default', $language->default)) name="default"
            id="default">
        <label class="form-check-label" for="default">
            По умолчанию
        </label>
    </div>
    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" value="1" @checked(old('fallback', $language->fallback)) name="fallback"
            id="fallback">
        <label class="form-check-label" for="fallback">
            Резервный
        </label>
    </div>
    <button class="btn btn-primary">Сохранить</button>
</form>
