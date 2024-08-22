<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminLanguageController extends Controller
{
    public function index()
    {
        $enTranslations = include resource_path('lang/en/admin.php');

        $arTranslations = include resource_path('lang/ar/admin.php');

        return view('admin.admin_language.index', compact('enTranslations', 'arTranslations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required|string',
            'value-en' => 'required|string',
            'value-ar' => 'required|string',
        ]);

        $enTranslations = include resource_path('lang/en/admin.php');
        $arTranslations = include resource_path('lang/ar/admin.php');

        $enTranslations[$request->key] = $request['value-en'];
        $arTranslations[$request->key] = $request['value-ar'];

        File::put(resource_path('lang/en/admin.php'), '<?php return ' . var_export($enTranslations, true) . ';');
        File::put(resource_path('lang/ar/admin.php'), '<?php return ' . var_export($arTranslations, true) . ';');

        return redirect()->back()->with('success', __('admin.Data created successfully'));
    }

    public function update(Request $request)
    {
        try {
            // Update language files
            File::put(resource_path('lang/en/admin.php'), '<?php return ' . var_export($request->enTranslations, true) . ';');
            File::put(resource_path('lang/ar/admin.php'), '<?php return ' . var_export($request->arTranslations, true) . ';');

            // Return success message
            return response()->json(['success' => __('admin.Data updated successfully')]);
        } catch (\Exception $e) {
            // Return error message
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function updateKey(Request $request)
    {
        try {
            $lang = $request->input('lang');
            $key = $request->input('key');
            $value = $request->input('value');

            // Load existing translations
            $translations = include resource_path("lang/$lang/admin.php");

            // Update the value of the specified key
            $translations[$key] = $value;

            // Save the updated translations to the language file
            File::put(resource_path("lang/$lang/admin.php"), '<?php return ' . var_export($translations, true) . ';');

            return response()->json(['success' => __('admin.Language key updated successfully')]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
}
}
