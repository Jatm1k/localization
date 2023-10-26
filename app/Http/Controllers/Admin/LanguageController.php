<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Language\SaveLanguageRequest;
use App\Models\Language;

class LanguageController extends Controller
{
    public function index()
    {
        return view('admin.languages.index', [
            'languages' => Language::query()->get(),
        ]);
    }

    public function create()
    {
        return view('admin.languages.create', [
            'language' => new Language(),
        ]);
    }

    public function store(SaveLanguageRequest $request)
    {
        Language::query()->create($request->validated());

        return to_route('admin.languages.index');
    }

    public function show(Language $language)
    {
        //
    }

    public function edit(Language $language)
    {
        return view('admin.languages.edit', [
            'language' => $language,
        ]);
    }

    public function update(SaveLanguageRequest $request, Language $language)
    {
        $language->update($request->validated() + [
            'active' => false,
            'default' => false,
            'fallback' => false,
        ]);
        return to_route('admin.languages.index');
    }

    public function destroy(Language $language)
    {
        $language->delete();
        return back();
    }
}
