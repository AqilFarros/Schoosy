<?php

namespace App\Http\Controllers;

use App\Models\Previllage;
use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $previlage = Previllage::where('user_id', Auth::id());

        return view('page.user.index', compact('previlage'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        $previlage = Previllage::where('user_id', Auth::id())->get();

        return view('page.user.index', compact('user', 'previlage'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($user->image == null) {
            } else Storage::disk('public')->delete('profile/' . basename($user->image));

            $request->validate([
                "image" => 'image|mimes:png,jpg|max:2048'
            ]);

            $image = $request->file('image');
            Storage::disk('public')->putFileAs('profile', $image, $image->hashName());

            $user->update(['image' => $image->hashName()]);
        } else {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
            ]);
        }

        return redirect()->route('user.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
