<?php

namespace App\Http\Controllers;

use App\Models\AbsentClass;
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
        $previlage = Previllage::where('school_id', $school->id)->where('user_id', Auth::id())->first();
        $classroom = Classroom::where('slug', $slugClassroom)->first();
        $classmate = Previllage::where('role', 'student')->where('classroom_id', $classroom->id)->orderBy('name')->get();
        $homeroom = Previllage::where('role', 'teacher')->where('classroom_id', $classroom->id)->first();
        $absent = AbsentClass::where('classroom_id', $classroom->id)->get();

        return view('page.school.classroom.show', compact('school', 'classroom', 'classmate', 'homeroom', 'previlage', 'absent'));
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

    public function update(Request $request, string $slug, string $slugClassroom)
    {
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

    public function destroy(string $slug, string $slugClassroom)
    {
        $classroom = Classroom::where('slug', $slugClassroom)->first();

        Storage::disk('public')->delete('classroom/' . basename($classroom->image));
        $classroom->delete();

        return redirect()->route('previlage.classroom.index', $slug)->with('success', 'Success Delete Classroom');
    }

    public function editMember(Request $request, string $slug, string $slugClassroom)
    {
        $school = School::where('slug', $slug)->first();
        $previlage = Previllage::where('school_id', $school->id)->where('user_id', Auth::id())->first();
        $classroom = Classroom::where('slug', $slugClassroom)->first();
        $classmate = Previllage::where('role', 'student')->where('classroom_id', $classroom->id)->orderBy('name')->get();
        $homeroom = Previllage::where('role', 'teacher')->where('classroom_id', $classroom->id)->first();
        $teacher = Previllage::where('role', 'teacher')->where('classroom_id', null)->get();
        $student = Previllage::where('role', 'student')->where('classroom_id', null)->get();

        return view('page.school.classroom.edit-member', compact('school', 'classroom', 'classmate', 'homeroom', 'student', 'previlage', 'teacher'));
    }

    public function addMember(Request $request, string $slug, string $slugClassroom)
    {
        $classroom = Classroom::where('slug', $slugClassroom)->first();
        $members = $request->input('member');

        foreach ($members as $member) {
            $new = Previllage::where('user_id', $member)->where('school_id', $classroom->school_id)->first();

            $new->update(['classroom_id' => $classroom->id]);
        }

        return redirect()->route('previlage.classroom.show', [$slug, $slugClassroom])->with('success', 'Success Add Member');
    }

    public function deleteMember(Request $request, string $slug, string $slugClassroom)
    {
        $classroom = Classroom::where('slug', $slugClassroom)->first();
        $members = $request->input('member');

        foreach ($members as $member) {
            $student = Previllage::where('user_id', $member)->where('school_id', $classroom->school_id)->first();

            $student->update(['classroom_id' => null]);
        }

        return redirect()->route('previlage.classroom.show', [$slug, $slugClassroom])->with('success', 'Success Delete Member');
    }

    public function addHomeroom(Request $request, string $slug, string $slugClassroom)
    {
        $request->validate([
            'teacher' => 'required'
        ]);

        $school = School::where('slug', $slug)->first();
        $classroom = Classroom::where('slug', $slugClassroom)->first();

        $teacher = Previllage::where('school_id', $school->id)->where('user_id', $request->teacher)->first();

        $teacher->update([
            'classroom_id' => $classroom->id
        ]);

        return redirect()->route('previlage.classroom.show', [$slug, $slugClassroom])->with('success', 'Success Add New Homeroom Teacher');
    }

    public function removeHomeroom(Request $request, string $slug, string $slugClassroom)
    {
        $teacher = Previllage::findOrFail($request->teacher);

        $teacher->update([
            'classroom_id' => null,
        ]);

        return redirect()->route('previlage.classroom.show', [$slug, $slugClassroom])->with('success', 'Success Remove Homeroom Teacher');
    }
}
