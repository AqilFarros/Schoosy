<?php

namespace App\Http\Controllers;

use App\Models\AbsentClass;
use App\Models\AbsentClassData;
use App\Models\AbsentClassNote;
use App\Models\Classroom;
use App\Models\Previllage;
use App\Models\School;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsentClassController extends Controller
{
    public function index(string $slug)
    {
        $school = School::where('slug', $slug)->first();
        $absentClass = AbsentClass::where('school_id', $school->id)->get();

        return view('', compact('absentClass', 'school'));
    }

    public function show(string $slug, string $slugClassroom, string $id)
    {
        $school = School::where('slug', $slug)->first();
        $classroom = Classroom::where('slug', $slugClassroom)->first();
        $absentClass = AbsentClass::findOrFail($id);
        $student = Previllage::where('role', 'student')->where('classroom_id', $absentClass->classroom_id)->get();
        $previlage = Previllage::where('school_id', $school->id)->where('user_id', Auth::id())->first();

        return view('page.school.classroom.absent', compact('school', 'classroom', 'absentClass', 'student', 'previlage'));
    }

    public function detailAbsent(string $slug, string $slugClassroom, string $id)
    {
        $school = School::where('slug', $slug)->first();
        $classroom = Classroom::where('slug', $slugClassroom)->first();
        $absent = AbsentClass::findOrFail($id);
        $previlage = Previllage::where('school_id', $school->id)->where('user_id', Auth::id())->first();

        return view('page.school.classroom.detail-absent', compact('school', 'classroom', 'absent', 'previlage'));
    }

    public function store(Request $request, string $slug, string $slugClassroom)
    {
        $school = School::where('slug', $slug)->first();

        $request->validate([
            'classroom_id' => 'required',
            'date' => 'required'
        ]);

        $formattedDate = Carbon::createFromFormat('m/d/Y', $request->date)
            ->setTimeFrom(Carbon::now())
            ->format('Y-m-d H:i:s');

        AbsentClass::create([
            'school_id' => $school->id,
            'classroom_id' => $request->classroom_id,
            'date' => $formattedDate
        ]);

        return redirect()->route('previlage.classroom.show', [$slug, $slugClassroom])->with('success', 'Success Create Absent Class');
    }

    public function updateStatus(Request $request, string $slug, string $slugClassroom, string $id)
    {
        $request->validate([
            'student' => 'required',
        ]);

        $students = $request->input('student');

        foreach ($students as $key => $student) {
            AbsentClassData::create([
                'absent_class_id' => $id,
                'previllage_id' => $student,
                'status' => $request->status[$key]
            ]);
        }

        if ($request->note) {
            AbsentClassNote::create([
                'absent_class_id' => $id,
                'note' => $request->note,
            ]);
        }

        return redirect()->route('previlage.classroom.show', [$slug, $slugClassroom])->with('success', 'Success Update Status Absent Class');
    }
}
