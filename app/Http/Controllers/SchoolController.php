<?php

namespace App\Http\Controllers;

use App\Models\Previllage;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $school = School::all();

        return view('page.school.index', compact('school'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('page.school.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => 'required|unique:schools',
            'description' => 'required',
            "email" => 'required|email',
            "address" => 'required',
            'phone' => 'required',
            'image' => 'required|mimes:png,jpg|max:2048',
        ]);

        $image = $request->file('image');
        Storage::disk('public')->putFileAs('school', $image, $image->hashName());
        $data = $request->all();
        $data['image'] = $image->hashName();
        $data['user_id'] = Auth::user()->id;
        $data['slug'] = Str::slug($request->name);

        School::create($data);

        return redirect()->route('user.show', Auth::id());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $data = School::where('slug', $slug)->first();
        $school = School::findOrFail($data->id);
        $previlage = Previllage::where('school_id', $school->id)->where('user_id', Auth::id())->first();

        return view('page.school.index', compact('school', 'previlage'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $data = School::where('slug', $slug)->first();
        $school = School::findOrFail($data->id);
        $previlage = Previllage::where('school_id', $school->id)->where('user_id', Auth::id())->first();

        return view('page.school.edit', compact('school', 'previlage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $data = School::where('slug', $slug)->first();
        $school = School::findOrFail($data->id);

        if ($request->hasFile('image')) {
            $request->validate([
                "image" => 'image|mimes:png,jpg|max:2048'
            ]);

            Storage::disk('public')->delete('school/' . basename($school->image));
            $image = $request->file('image');
            Storage::disk('public')->putFileAs('school', $image, $image->hashName());

            $school->update(['image' => $image->hashName()]);
        } else {
            $request->validate([
                "name" => 'required|unique:schools',
                "description" => "required",
                "email" => 'required|email',
                "address" => 'required',
                'phone' => 'required',
            ]);

            $newData = $request->all();

            $newData['slug'] = Str::slug($request->name);

            $school->update($newData);
        }

        return redirect()->route('school.show', $slug);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $data = School::where('slug', $slug)->first();
        $school = School::findOrFail($data->id);

        Storage::disk('public')->delete('school/' . basename($school->image));
        $school->delete();

        return redirect()->route('admin.index');
    }
}
