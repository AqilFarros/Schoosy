<?php

namespace App\Http\Controllers;

use App\Models\AbsentClass;
use App\Models\School;
use Illuminate\Http\Request;

class AbsentClassController extends Controller
{
    public function index(string $slug) {
        $school = School::where('slug', $slug)->first();
        $absentClass = AbsentClass::where('school_id', $school->id)->get();

        return view('', compact('absentClass', 'school'));
    }

    public function show(string $slug, string $id) {
        $school = School::where('slug', $slug)->first();
        $absentClass = AbsentClass::findOrFail($id);

        return view('', compact('school', 'absentClass'));
    }

    public function create(Request $request, string $slug) {
        $school = School::where('slug', $slug)->first();

        $request->validate([
            'classroom_id' => 'required',
            'date' => 'required'
        ]);

        AbsentClass::create([
            'school_id' => $school->id,
            'classroom_id' => $request->classroom_id,
            'date' => $request->date
        ]);

        return redirect()->route('');
    }
}
