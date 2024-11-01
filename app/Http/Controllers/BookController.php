<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Previllage;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BookController extends Controller
{
    public function index(string $slug)
    {
        $school = School::where('slug', $slug)->first();
        $book = Book::where('school_id', $school->id)->get();
        $previlage = Previllage::where('user_id', Auth::id())->where('school_id', $school->id)->first();

        return view('page.book.index', compact('book', 'school', 'previlage'));
    }

    public function show(string $slug, string $bookSlug)
    {
        $school = School::where('slug', $slug)->first();
        $book = Book::where('slug', $bookSlug)->first();
        $previlage = Previllage::where('user_id', Auth::id())->where('school_id', $school->id)->first();

        return view('page.book.show', compact('school', 'book', 'previlage'));
    }

    public function create(string $slug)
    {
        $school = School::where('slug', $slug)->first();

        return view('page.book.create', compact('school'));
    }

    public function store(Request $request, string $slug)
    {
        $school = School::where('slug', $slug)->first();

        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:png,jpg|max:2048',
            'file' => 'required|mimes:pdf',
        ]);

        $image = $request->file('image');
        $file = $request->file('file');

        Storage::disk('public')->putFileAs('book/image', $image, $image->hashName());
        Storage::disk('public')->putFileAs('book/file', $file, $file->hashName());

        $data = $request->all();
        $data['school_id'] = $school->id;
        $data['image'] = $image->hashName();
        $data['file'] = $file->hashName();
        $data['slug'] = Str::slug($request->name);

        Book::create($data);

        return redirect()->route('previlage.book.index', $slug)->with('success', 'Success Create Book');
    }

    public function edit(string $slug, string $bookSlug) {
        $school = School::where('slug', $slug)->first();
        $book = Book::where('slug', $bookSlug)->first();

        return view('page.book.edit', compact('book', 'school'));
    }

    public function update(Request $request, string $slug, string $bookSlug)
    {
        $book = Book::where('slug', $bookSlug)->first();

        $request->validate([
            'name' => 'required',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);;

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|mimes:png,jpg|max:2048|image',
            ]);

            Storage::disk('public')->delete('book/image/' . basename($book->image));

            $image = $request->file('image');
            Storage::disk('public')->putFileAs('book/image', $image, $image->hashName());

            $data['image'] = $image->hashName();
        }

        if ($request->hasFile('file')) {
            $request->validate([
                'file' => 'required|mimes:pdf',
            ]);

            Storage::disk('public')->delete('book/file/' . basename($book->image));

            $file = $request->file('file');
            Storage::disk('public')->putFileAs('book/file', $file, $file->hashName());

            $data['file'] = $file->hashName();
        }

        $book->update($data);

        return redirect()->route('previlage.book.show', [$slug, $data['slug']])->with('success', 'Success Update Book');
    }

    public function destroy(string $slug, string $bookSlug)
    {
        $book = Book::where('slug', $bookSlug)->first();

        Storage::disk('public')->delete('book/image/' . basename($book->image));
        Storage::disk('public')->delete('book/file/' . basename($book->file));

        $book->delete();

        return redirect()->route('previlage.book.index', $slug)->with('success', 'Success Delete Book');
    }
}
