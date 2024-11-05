<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Previllage;
use App\Models\School;
use App\Models\User;
use App\Models\VideoBook;
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

    public function school()
    {
        $school = School::latest()->get();

        return view('admin.school', compact('school'));
    }

    public function book()
    {
        $book = Book::latest()->get();

        return view('admin.book', compact('book'));
    }

    public function video()
    {
        $video = VideoBook::latest()->get();

        return view('admin.video', compact('video'));
    }

    public function user()
    {
        $user = User::latest()->get();

        return view('admin.user', compact('user'));
    }

    public function deleteSchool(string $id)
    {
        $school = School::findOrFail($id);

        Storage::disk('public')->delete('school/' . basename($school->image));

        $school->delete();

        return redirect()->route('admin.school');
    }

    public function deleteBook(string $id)
    {
        $book = Book::findOrFail($id);

        Storage::disk('public')->delete('book/image/' . basename($book->image));
        Storage::disk('public')->delete('book/file/' . basename($book->file));

        $book->delete();

        return redirect()->route('admin.book');
    }

    public function deleteVideo(string $id) {
        $video = VideoBook::findOrFail($id);

        $video->delete();

        return redirect()->route('admin.video');
    }

    public function deleteUser(string $id)
    {
        $user = Book::findOrFail($id);

        if ($user->image !== null) {
            Storage::disk('public')->delete('profile/' . basename($user->image));
        }

        $user->delete();

        return redirect()->route('admin.user');
    }
}
