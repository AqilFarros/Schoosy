<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Previllage;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ClassroomController extends Controller
{
    public function index(string $slug)
    {
        $school = School::where('slug', $slug)->first();
        $classroom = Classroom::where('school_id', $school->id)->get();
        $previlage = Previllage::where('school_id', $school->id)->where('user_id', Auth::id())->first();

        return view('page.school.classroom.index', compact('classroom', 'school', 'previlage'));
    }

    public function show(string $slug, string $slugClassroom)
    {
        $school = School::where('slug', $slug)->first();
        $classroom = Classroom::where('slug', $slugClassroom)->first();

        return view('page.school.classroom.show', compact('school', 'classroom'));
    }

    public function create(string $slug)
    {
        $school = School::where('slug', $slug)->first();

        return view('page.school.classroom.create', compact('school'));
    }

    public function store(Request $request, string $slug)
    {
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

        return redirect()->route('previlage.classroom.index', $slug)->with('success', 'Success Create Classroom');
    }

    public function edit(string $slug, string $slugClassroom)
    {
        $school = School::where('slug', $slug)->first();
        $classroom = Classroom::where('slug', $slugClassroom)->first();

        return view('page.school.classroom.edit', compact(
            'classroom',
            'school',
        ));
    }

    public function update(Request $request, string $slug, string $slugClassroom) {
        $classroom = Classroom::where('slug', $slugClassroom)->first();

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|mimes:png,jpg|max:2048|image',
            ]);

            $image = $request->file('image');

            Storage::disk('public')->delete('classroom/' . basename($classroom->image));
            Storage::disk('public')->putFileAs('classroom', $image, $image->hashName());

            $classroom->update([
                'image' => $image->hashName(),
            ]);
        } else {
            $request->validate([
                'name' => 'required',
            ]);

            $classroom->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
            ]);
        }

        return redirect()->route('previlage.classroom.show', [$slug, $slugClassroom])->with('success', 'Success Update Classroom');
    }

    public function destroy(string $slug, string $slugClassroom) {
        $classroom = Classroom::where('slug', $slugClassroom)->first();

        Storage::disk('public')->delete('classroom/' . basename($classroom->image));
        $classroom->delete();

        return redirect()->route('previlage.classroom.index', $slug)->with('success', 'Success Delete Classroom');
    }

    public function addMember(Request $request, string $slug, string $slugClassroom) {
        $classroom = Classroom::where('slug', $slugClassroom)->first();
        $members = $request->input('member');

        foreach ($members as $member) {
            $new = Previllage::where('user_id', $member)->where('school_id', $classroom->school_id)->first();

            $new->update(['classroom_id' => $classroom->id]);
        }

        return redirect()->route('previlage.classroom.show', [$slug, $slugClassroom])->with('success', 'Success Add Member');
    }

    public function deleteMember(Request $request, string $slug, string $slugClassroom) {}
}
