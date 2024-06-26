<?php

namespace App\Http\Controllers;

use App\Models\Advertise;
use App\Models\Category;
use Illuminate\Http\Request;

class AdvertiseController extends Controller
{
    public function index() {
        $advertise = Advertise::with(['category'])->orderBy('created_at', 'DESC')->get();
        return view('pages.advertise.index', compact('advertise'));
    }

    public function create() {
        $categories = Category::orderBy('created_at', 'DESC')->get();
        return view('pages.advertise.create', compact('categories'));
    }

    public function store(Request $request) {
        $request->validate([
            // 'title' => 'required',
            // 'image' => 'required',
            // 'image_phone' => 'required',
            'type' => 'required',
            'category_id' => 'required',
            'link' => 'required',
            'priority' => 'required|integer',
            // 'start_date' => 'required',
            // 'end_date' => 'required',
            // 'link' => 'required',
        ]);

        // dd($request->all());

        $data = [
            // 'title' => $request->title,
            'link' => $request->link,
            'type' => $request->type,
            'priority' => $request->priority,
            // 'image' => ,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'duration' => $request->duration ? $request->duration : 1,
            'category_id' => $request->category_id,
            'status' => $request->status ? 1 : 0,
            // 'settings' => $request->settings,
        ];

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $path = $img->move('advertise', $img->hashName());
            $data['image'] = $path;
        }
        if ($request->hasFile('image_phone')) {
            $img = $request->file('image_phone');
            $path = $img->move('advertise', $img->hashName());
            $data['image_phone'] = $path;
        }

        Advertise::create($data);

        return redirect()->route('admin.advertise.index')->with('success', 'Created successfully');
    }

    public function edit(Advertise $advertise) {
        $categories = Category::orderBy('created_at', 'DESC')->get();
        // dd($categories, $advertise);
        return view('pages.advertise.edit', compact('advertise', 'categories'));
    }

    public function update(Request $request, Advertise $advertise) {
        $request->validate([
            // 'title' => 'required',
            // 'image' => 'required',
            'type' => 'required',
            // 'start_date' => 'required',
            // 'end_date' => 'required',
            // 'image_phone' => 'required',
            'category_id' => 'required',
            'link' => 'required',
            'priority' => 'required|integer',
            // 'link' => 'required',
        ]);

        
        $data = [
            // 'title' => $request->title,
            'link' => $request->link,
            'type' => $request->type,
            
            'start_date' => $request->start_date,
            'priority' => $request->priority,
            'end_date' => $request->end_date,
            'duration' => $request->duration ? $request->duration : 1,
            // 'image' => ,
            'category_id' => $request->category_id,
            'status' => $request->status ? 1 : 0,
            // 'settings' => $request->settings,
        ];

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $path = $img->move('advertise', $img->hashName());
            $data['image'] = $path;
            if ($advertise->image && file_exists(public_path($advertise->image))) {
                unlink(public_path($advertise->image));
            }
        }
        if ($request->hasFile('image_phone')) {
            $img = $request->file('image_phone');
            $path = $img->move('advertise', $img->hashName());
            $data['image_phone'] = $path;
            if ($advertise->image_phone && file_exists(public_path($advertise->image_phone))) {
                unlink(public_path($advertise->image_phone));
            }
        }

        $advertise->update($data);

        return redirect()->route('admin.advertise.index')->with('success', 'Updated successfully');
        
    }

    public function delete(Advertise $advertise) {
        $advertise->delete($advertise);     
        return back()->with('success', 'Deleted successfully');   
    }


}
