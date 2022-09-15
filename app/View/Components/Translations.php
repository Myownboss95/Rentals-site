<?php

namespace App\View\Components;

use Illuminate\Support\Arr;
use Illuminate\View\Component;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;

class Translations extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $locale = App::getLocale();
        $translations = Cache::rememberForever("translactions_$locale", function () use ($locale) {

            $phpTranslations = [];
            $jsonTranslations = [];

            if (File::exists(lang_path($locale))) {
                $phpTranslations = collect(File::allFiles(lang_path($locale)))->filter(function ($file) {
                    return $file->getExtension() === 'php';
                })->flatMap(function ($file) {
                    return Arr::dot(File::getRequire($file->getRealPath()));
                })->toArray();
            }

            if (File::exists(lang_path("$locale.json"))) {
                $jsonTranslations = json_decode(File::get(lang_path("$locale.json")), true);
            }

            return array_merge($phpTranslations, $jsonTranslations);
        });

        return view('components.translations', [
            'translations' => $translations
        ]);
    }
}
