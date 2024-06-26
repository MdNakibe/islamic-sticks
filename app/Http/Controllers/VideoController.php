<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
{
    public function index() {
        $videos = Video::orderBy('priority', 'ASC')->get();
        return view('pages.video.index', compact('videos'));
    }
    public function create() {
        return view('pages.video.create');
    }
    public function edit(Video $video) {
        return view('pages.video.edit', compact('video'));
    }

    public function shortUpdate(Request $request) {
        try {
            DB::beginTransaction();
            foreach ($request->list as $item) {
                $category = Video::find($item['id']);
                if ($category) {
                    $category->update([
                        'page' => $item['index']
                    ]);
                }
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return response([
                'status' => 'error',
                'message' => $th->getMessage(),
            ]);
        }
        return response([
            'status' => 'success',
            'message' => 'Order updated successfully',
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'path' => 'required',
        ]);
        $data = [
            'path' => $request->path,
            'priority' => $request->priority,
            'status' => $request->status ? 1 : 0,
        ];
        Video::create($data);
        return redirect()->route('admin.videos.index')->with('success', 'Video created successfully');
    }
    public function update(Request $request, Video $video) {
        $request->validate([
            'path' => 'required',
        ]);
        $data = [
            'path' => $request->path,
            'priority' => $request->priority,
            'status' => $request->status ? 1 : 0,
        ];

        $video->update($data);
        return redirect()->route('admin.videos.index')->with('success', 'Video updated successfully');
    }
    public function delete(Video $video) {
        $video->delete();
        return redirect()->route('admin.videos.index')->with('success', 'Video deleted successfully');
    }
}
