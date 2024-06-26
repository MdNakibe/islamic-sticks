<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuranController extends Controller
{
    public function quran() {
        $edition = file_get_contents(storage_path('app/quran/edition.json'));
        $suras = file_get_contents(storage_path('app/suras.json'));
        $suras = collect(json_decode($suras));
        $editions = collect(json_decode($edition));
        return view('frontend.quran', compact('editions', 'suras'));
    }

    public function getSura($edition, $index) {
        if ($edition && $index) {
            $edition_list = file_get_contents(storage_path('app/quran/edition.json'));
            $edition_list = collect(json_decode($edition_list));

            $sura_list = file_get_contents(storage_path('app/quran/sura.json'));
            $sura_list = collect(json_decode($sura_list));
            if (!file_exists(storage_path('app/quran/'.$edition.'.json'))) {
                abort(404);
            }
            $content = file_get_contents(storage_path('app/quran/'.$edition.'.json'));
            $content = json_decode($content)[$index-1];

            $arabic_content = file_get_contents(storage_path('app/arabic/'.$index.'.json'));
            $arabic_content = json_decode($arabic_content);
            // return view('frontend.quran.render', compact('content'));
            $edition_info = collect($edition_list)->filter(function($item) use($edition) {
                                return $item->identifier == $edition;
                            })->first();
            if (!$edition_info) {
                abort(404);
            }
            return view('frontend.quran', compact('edition_list', 'sura_list', 'content', 'arabic_content', 'edition', 'index', 'edition_info'));
            // return ;
        }
    }
}
