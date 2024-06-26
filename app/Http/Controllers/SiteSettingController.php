<?php

namespace App\Http\Controllers;

use App\Models\SiteSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class SiteSettingController extends Controller
{
    public function index(){
        $siteSetting = SiteSettings::all();
        return view('pages.site-setting.index', compact('siteSetting'));
    }

    public function edit($name){
        $setting = SiteSettings::where('name', $name)->first();

        return view('pages.site-setting.'.$name, compact('setting'));
    }

    public function update(Request $request, $id){
        $siteSetting = SiteSettings::findOrFail($id);
        $siteSetting->settings = $request->settings;
        // array_push($request->settings, ['name' => 'asdf']);
        
        foreach ($request->image as $key => $image) {
            if (is_file($image)) {
                $image = $image;
                if ($image->getSize() > 1048576) {
                    $quality = 90;
                    do {
                        $img = Image::make($image);
            
                        // Compress the image with a quality of $quality
                        $img->encode('webp', $quality);
            
                        // Get the size of the compressed image
                        $size = strlen($img->encoded);
            
                        // Decrease the quality for the next compression iteration
                        $quality -= 10;
                    } while ($size > 1000000 && $quality >= 10);
            
                    // Use the compressed image for further processing
                    $image = $img;
                }
                $filename = time().'.webp';
                $path = 'siteSettings/' . $filename;

                $settings = $siteSetting->settings;
                $settings[$key] = $path;
                $siteSetting->settings = $settings;
                $image->save(public_path($path));
            }
        }

        // dd($request->all());

        // if( $request->image['image']){
        //     $img = $request->image['image'];
        //     $name = $img->hashName();
        //     $img->move('siteSettings', $name);
        //     $siteSetting->image['image'] = 'siteSettings/'.$name;
        // }
        // return $siteSetting;

        // if( $request->settings['image']){
        //     $img = $request->settings['image'];
        //     $name = $img->hashName();
        //     $img->move('siteSettings', $name);
        //     $siteSetting->settings['image'] = 'siteSettings/'.$name;
        // }
        $siteSetting->save();
        return redirect()->route('admin.site-setting.index');
    }

    public function destroy($id){
        $siteSetting = SiteSettings::find($id);
        $siteSetting->delete();
        return back();
    }
}
