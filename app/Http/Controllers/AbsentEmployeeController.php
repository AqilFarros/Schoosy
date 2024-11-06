<?php

namespace App\Http\Controllers;

use App\Models\AbsentEmployee;
use App\Models\AbsentEmployeeData;
use App\Models\AbsentEmployeeNote;
use App\Models\Previllage;
use App\Models\School;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsentEmployeeController extends Controller
{
    public function index(string $slug)
    {
        $school = School::where('slug', $slug)->first();
        $absent = AbsentEmployee::where('school_id', $school->id)->latest()->get();
        $teacher = Previllage::where('role', '!=', 'student')->where('school_id', $school->id)->get();
        $previlage = Previllage::where('school_id', $school->id)->where('user_id', Auth::id())->first();

        return view('page.school.absent-employee.index', compact('absent', 'school', 'previlage', 'teacher'));
    }

    public function makeAbsent(Request $request, string $slug)
    {
        $school = School::where('slug', $slug)->first();

        $request->validate([
            'date' => 'required',
        ]);

        $formattedDate = Carbon::createFromFormat('m/d/Y', $request->date)
            ->setTimeFrom(Carbon::now())
            ->format('Y-m-d H:i:s');

        AbsentEmployee::create([
            'school_id' => $school->id,
            'date' => $formattedDate
        ]);

        return redirect()->route('previlage.absentEmployee.index', $slug)->with('success', 'Success Create Absent Employee');
    }

    public function detailAbsent(string $slug, string $id)
    {
        $school = School::where('slug', $slug)->first();
        $absent = AbsentEmployee::findOrFail($id);
        $previlage = Previllage::where('school_id', $school->id)->where('user_id', Auth::id())->first();

        return view('page.school.absent-employee.show', compact('school', 'absent', 'previlage'));
    }

    public function editStatus(string $slug, string $id)
    {
        $school = School::where('slug', $slug)->first();
        $absent = AbsentEmployee::findOrFail($id);
        $previlage = Previllage::where('school_id', $school->id)->where('user_id', Auth::id())->first();
        $teacher = Previllage::where('role', '!=', 'student')->where('school_id', $school->id)->get();

        return view('page.school.absent-employee.edit', compact('school', 'absent', 'previlage', 'teacher'));
    }

    public function updateStatus(Request $request, string $slug, string $id)
    {
        $request->validate([
            'status' => 'required',
            'employee' => 'required',
        ]);
        
        $employees = $request->input('employee');

        foreach ($employees as $key => $employee) {
            AbsentEmployeeData::create([
                'absent_employee_id' => $id,
                'previllage_id' => $employee,
                'status' => $request->status[$key]
            ]);
        }

        if ($request->note) {
            AbsentEmployeeNote::create([
                'absent_employee_id' => $id,
                'note' => $request->note,
            ]);
        }

        return redirect()->route('previlage.absentEmployee.index', $slug)->with('success', 'Success Update Status Absent Employee');
    }
}
