<?php

namespace App\Http\Controllers;

use App\Models\Previllage;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PrevillageController extends Controller
{
    public function previewSchool(string $code)
    {
        $school = School::where('code', $code)->first();

        if ($school) {
            return view('');
        } else {
            return back()->with('error', 'School not found');
        }
    }

    public function searchSchool(Request $request)
    {
        $request->validate([
            'code' => 'required'
        ]);

        $school = School::where('code', $request->code)->first();

        if ($school) {
            return redirect()->route('school.index');
        } else {
            return back()->with('error', 'School not found');
        }
    }

    public function joinSchool(string $code)
    {
        $school = School::where('code', $code)->first();
        $previllage = Previllage::where('user_id', Auth::id())->where('school_id', $school->id)->first();

        if ($school) {
            if ($previllage) {
                return redirect()->route('school.show', $school->slug)->with('error', 'You already joined this school');
            }

            Previllage::create([
                'user_id' => Auth::id(),
                'name' => Auth::user()->name,
                'school_id' => $school->id,
                'role' => 'student',
            ]);

            return redirect()->route('school.show', $school->slug)->with('success', 'You joined this school');
        } else {
            return back()->with('error', 'School not found');
        }
    }

    public function leaveSchool(string $code)
    {
        $school = School::where('code', $code)->first();
        $previllage = Previllage::where('user_id', Auth::id())->where('school_id', $school->id)->first();

        if ($school) {
            if ($previllage->role == 'owner') {
                if ($previllage->count() > 1) {
                    $operator = Previllage::where('school_id', $school->id)->where('role', 'operator')->first();
                    $teacher = Previllage::where('school_id', $school->id)->where('role', 'teacher')->first();
                    $student = Previllage::where('school_id', $school->id)->where('role', 'student')->first();

                    if ($operator) {
                        $operator->update(['role' => 'owner']);
                    } else if ($teacher) {
                        $teacher->update(['role' => 'owner']);
                    } else {
                        $student->update(['role' => 'owner']);
                    }
                } else {
                    Storage::disk('public')->delete('school/' . basename($school->image));
                    $school->delete();
                }
            }

            $previllage->delete();

            return redirect()->route('landing-page')->with('success', 'You have leave a school');
        } else {
            return back()->with('error', 'School not found');
        }
    }

    public function getPrevillage() {}

    public function searchPrevillage(string $slug, string $query)
    {
        $data = School::where('slug', $slug)->first();
        $school = School::findOrFail($data->id);
        $previllage = Previllage::where('school_id', $school->id)->where('name', 'LIKE', "%$query%")->get();

        return view('page.school.search-member', compact('school', 'previllage'));
    }

    public function updatePrevillage(Request $request, string $slug, string $prvId)
    {
        $previllage = Previllage::findOrFail($prvId);
        $previllage->update(['role' => $request->role]);

        return redirect()->route('school.show', $slug)->with('success', "Success Update Previllage Role");
    }

    public function deletePrevillage(string $slug, string $prvId) {
        $previllage = Previllage::findOrFail($prvId);
        $previllage->delete();

        return redirect()->route('school.show', $slug)->with('success', "Success Delete Member From This School");
    }
}
