<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Previllage;
use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        $school = School::where('approve', false)->get();

        return view('admin.index', compact('school'));
    }

    public function statusSchool(Request $request, string $id)
    {
        $school = School::findOrFail($id);

        if ($request->status == 'approve') {
            $request->validate([
                'code' => 'required|max:10|unique:schools,code'
            ]);
            $school->update([
                'approve' => true,
                'code' => $request->code,
            ]);
            $owner = User::findOrFail($school->user_id);
            Previllage::create([
                'user_id' => $school->user_id,
                'school_id' => $school->id,
                'name' => $owner->name,
                'role' => 'owner',
            ]);
        } else {
            Storage::disk('public')->delete('school/' . basename($school->image));
            $school->delete();
        }

        return redirect()->route('admin.index');
    }
}
