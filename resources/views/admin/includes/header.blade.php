<div class="mb-3 d-flex justify-content-between align-items-center">
    <h3 class="mb-0">@yield('admin.title')</h3>
    @hasSection('admin.create')
        <a href="@yield('admin.create')" class="btn btn-primary btn-sm">Создать</a>
    @endif
</div>
