<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Console\Command;
use Intervention\Image\Facades\Image;

class ImageGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'image:make';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    private function getFileList() {
        $fileList = array();
        $directory = __DIR__.'/BG';
        $files = scandir($directory);
        // Iterate over each file/directory
            foreach ($files as $file) {
                // Exclude current directory (.)
                // Exclude parent directory (..)
                if ($file != '.' && $file != '..') {
                    // Check if the current item is a file
                    if (is_file($directory . '/' . $file)) {
                        // Add the file to the array
                        $fileList[] = $file;
                    }
                }
            }

            // Print the file list
            return $fileList;
    }
    public function handle()
    {
        $cat = Category::where('slug', '99-names-of-allah')->first();
        $posts = Post::where('category_id', $cat->id)->get();
        $dir = __DIR__.'/BG/';
        $opdir = __DIR__.'/op/';
        $bg = $this->getFileList();
        $textFont = __DIR__.'/font/static/Jost-SemiBold.ttf';
        foreach($posts as $key => $post) {
            $image = Image::make($dir.'/'.$bg[array_rand($bg)]);
            $image->text($post->title, $image->width() / 2, $image->height() / 2, function ($font) use($textFont, $post) {
                $font->file($textFont);
                if ($post->title == 'DHUL-JALAALI WAL-IKRAAM') {
                    $font->size(60);
                } else {
                    $font->size(100);
                }
                $font->color('#000000');
                $font->align('center');
                $font->valign('center');
            });
            $image->save(public_path('posts/'.pathinfo($post->image)['basename']), 36, 'webp', true);
            echo $key;
        }
        // print_r($this->getFileList());
        return 0;
    }
}
