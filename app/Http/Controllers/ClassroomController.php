<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ClassroomController extends Controller
{
    public function index(string $slug) {
        $school = School::where('slug', $slug)->first();
        $classroom = Classroom::where('school_id', $school->id)->get();

        return view('page.school.classroom.index', compact('classroom'));
    }

    public function show(string $slug, string $slugClassroom) {
        $school = School::where('slug', $slug)->first();
        $classroom = Classroom::where('slug', $slugClassroom)->first();

        return view('page.school.classroom.show', compact('school', 'classroom'));
    }

    public function create(string $slug) {
        $school = School::where('slug', $slug)->first();

        return view('page.school.classroom.create', compact('school'));
    }

    public function store(Request $request, string $slug) {
        $school = School::where('slug', $slug)->select('id')->first();

        $request->validate([
            'name' => 'required',
            'image' => 'required|mimes:png,jpg|max:2048',
        ]);

        $image = $request->file('image');
        Storage::disk('public')->putFileAs('classroom', $image, $image->hashName());

        $data = $request->all();
        $data['school_id'] = $school->id;
        $data['image'] = $image->hashName();
        $data['slug'] = Str::slug($data['name']);

        Classroom::create($data);

        return redirect()->route('school.index');
    }

    public function edit() {}

    public function update() {}

    public function destroy() {}

    public function addMember() {
        
    }

    public function deleteMember() {}
}
