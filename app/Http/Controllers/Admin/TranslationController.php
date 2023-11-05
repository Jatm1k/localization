<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Translation\FilterTranslationRequest;
use App\Http\Requests\Admin\Translation\SaveTranslationRequest;
use Illuminate\Http\Request;
use Spatie\TranslationLoader\LanguageLine;

class TranslationController extends Controller
{
    public function index(FilterTranslationRequest $request)
    {
        $query = LanguageLine::query();

        if($group = $request->get('group')) {
            $query->where('group', $group);
        }

        if($key = $request->get('key')) {
            $query->where('key', $key);
        }

        if($text = $request->get('text')) {
            $query->where('text', 'like', "%{$text}%");
        }

        $translations = $query->latest('id')->paginate(15);
        return view('admin.translations.index', [
            'translations' => $translations,
            'groups' => LanguageLine::query()->distinct('group')->pluck('group'),
        ]);
    }

    public function create()
    {
        return view('admin.translations.create', [
            'translation' => new LanguageLine(),
        ]);
    }

    public function store(SaveTranslationRequest $request)
    {
        LanguageLine::query()->create($request->validated());
        return to_route('admin.translations.index');
    }

    public function edit(LanguageLine $translation)
    {
        return view('admin.translations.edit', [
            'translation' => $translation,
        ]);
    }

    public function update(SaveTranslationRequest $request, LanguageLine $translation)
    {
        $translation->update($request->validated());
        return to_route('admin.translations.index');
    }

    public function destroy(LanguageLine $translation)
    {
        $translation->delete();
        return to_route('admin.translations.index');
    }
}
