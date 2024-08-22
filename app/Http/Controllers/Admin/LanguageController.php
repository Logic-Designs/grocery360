<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLanguageRequest;
use Illuminate\Http\Request;
class LanguageController extends Controller
{
    public function index(Request $request)
    {
        $languages = config('app.available_language'); // List of supported languages
        $main_lang = config('app.main_language');
        $strings = [];

        foreach ($languages as $lang) {
            $path = resource_path("lang/$lang.json");
            $strings[$lang] = json_decode(file_get_contents($path), true);
        }

        // dd($strings[$main_lang]);

        return view('admin.language.index', compact('languages', 'strings', 'main_lang'));
    }

    public function store(StoreLanguageRequest $request)
    {
        $key = $request->key;
        $languages =config('app.available_language');  // List of supported languages

        foreach ($languages as $lang) {
            $path = resource_path("lang/$lang.json");
            $strings = json_decode(file_get_contents($path), true);
            $strings[$key] = $request->input('value-'.$lang);
            file_put_contents($path, json_encode($strings, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        }

        return redirect('/admin/languages')->with('success', 'Key added successfully.');
    }

    public function update(Request $request)
    {
        $languages = config('app.available_language');

        foreach ($languages as $lang) {
            $path = resource_path("lang/$lang.json");
            file_put_contents($path, json_encode($request->input($lang), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        }

        return back()->with('success', 'Key updated successfully.');
    }
}
