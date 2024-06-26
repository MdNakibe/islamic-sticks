<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index() {
        $subscribers = Subscriber::orderBy('created_at', 'DESC')->get();
        return view('pages.subscribers.index', compact('subscribers'));
    }

    public function store(Request $request) {
        $request->validate([
            'email' => 'required|email'
        ]);
        Subscriber::create([
            'email' => $request->email,
        ]);
        return back()->with('subscribed_msg', 'Thanks for joining with us');
    }
    public function delete($id) {
        $subscriber = Subscriber::findOrFail($id);
        $subscriber->delete();
        return back()->with('success', 'Item deleted successfully');
    }
}
