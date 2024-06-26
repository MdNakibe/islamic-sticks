<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Quida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuidaController extends Controller
{
    public function index() {
        $quidas = Quida::orderBy('page', 'ASC')->get();
        return view('pages.quida.index', compact('quidas'));
    }
    public function create() {
        return view('pages.quida.create');
    }
    public function edit(Quida $quida) {
        return view('pages.quida.edit', compact('quida'));
    }

    public function shortUpdate(Request $request) {
        try {
            DB::beginTransaction();
            foreach ($request->list as $item) {
                $category = Quida::find($item['id']);
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
            'image' => 'required',
            'page' => 'required',
        ]);
        $data = [
            'page' => $request->page,
        ];
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $path = $img->move('quida', $img->hashName());
            $data['image'] = $path;
        }
        Quida::create($data);
        return redirect()->route('admin.quidas.index')->with('success', 'Page created successfully');
    }
    public function update(Request $request, Quida $quida) {
        $request->validate([
            'image' => 'required',
            'page' => 'required',
        ]);
        $data = [
            'page' => $request->page,
        ];
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $path = $img->move('quida', $img->hashName());
            $data['image'] = $path;
            try {
                if ($quida->image && file_exists(public_path($quida->image))) {
                    unlink(public_path($quida->image));
                }
            } catch (\Throwable $th) {}
        }
        $quida->update($data);
        return redirect()->route('admin.quidas.index')->with('success', 'Page updated successfully');
    }
    public function delete(Quida $quida) {
        $quida->delete();
        return redirect()->route('admin.quidas.index')->with('success', 'Page deleted successfully');
    }
}
