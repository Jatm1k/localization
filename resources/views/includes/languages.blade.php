@php($languages = App\Models\Language::getActive())
<div class="dropdown">
    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
        {{ $languages->firstWhere('id', app()->getLocale())?->name }}
    </a>
    <ul class="dropdown-menu dropdown-menu-end">
        @foreach ($languages as $language)
            <li class="dropdown-item">
                <a href="{{ route('language', $language->id) }}" class="nav-link">
                    {{ $language->name }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
