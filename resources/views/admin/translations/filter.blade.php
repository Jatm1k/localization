<div class="bg-light rounded p-3">
    <form action="{{ route('admin.translations.index') }}" method="GET">
        <div class="row mb-3">
            <div class="col-6 col-md-3">
                <select name="group" class="form-select form-select-sm">
                    <option value="">Все группы</option>
                    @foreach ($groups as $group)
                        <option value="{{ $group }}" {{ request('group') === $group ? 'selected' : '' }}>
                            {{ $group }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-6 col-md-3">
                <input type="text" value="{{ request('key') }}" name="key" class="form-control form-control-sm"
                    placeholder="Ключ">
            </div>
            <div class="col-6 col-md-3">
                <input type="text" value="{{ request('text') }}" name="text" class="form-control form-control-sm"
                    placeholder="Поиск">
            </div>
        </div>
        <div class="row">
            <div class="col-6 col-md-3">
                <button type="submit" class="btn btn-primary btn-sm w-100">Применить</button>
            </div>
            <div class="col-6 col-md-3">
                <a href="{{ route('admin.translations.index') }}" class="btn btn-secondary btn-sm w-100">Очистить</a>
            </div>
        </div>
    </form>
</div>
