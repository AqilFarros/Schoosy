<?php

namespace App\Http\Controllers;

use App\Models\AbsentEmployee;
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
        $absentEmployee = AbsentEmployee::where('school_id', $school->id)->latest()->get();
        $previlage = Previllage::where('school_id', $school->id)->where('user_id', Auth::id())->first();

        return view('page.school.absent-employee.index', compact('absentEmployee', 'school', 'previlage'));
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

        return view('page.school.absent-employee.edit', compact('school', 'absent', 'previlage'));
    }

    public function updateStatus(Request $request, string $slug, string $id)
    {
        $request->validate([
            'employee' => 'required',
        ]);

        $employees = $request->input('employee');

        foreach ($employees as $key => $employee) {
            AbsentEmployee::create([
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
