<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Previllage;
use App\Models\School;
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
            $school->update(['approve' => true]);
            Previllage::create([
                'user_id' => $school->user_id,
                'school_id' => $school->id,
                'role' => 'owner',
            ]);
        } else {
            Storage::disk('public')->delete('school/' . basename($school->image));
            $school->delete();
        }

        return redirect()->route('admin.index');
    }
}
