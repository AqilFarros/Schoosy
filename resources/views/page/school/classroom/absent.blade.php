@extends('layouts.parent')

@section('content')
    <form action="{{ route('previlage.classroom.updateAbsent', [$school->slug, $classroom->slug, $absentClass->id]) }}"
        method="post">
        @csrf
        @method('POST')
        @foreach ($student as $item)
            <div class="px-4 py-1 md:px-5 md:py-1">
                <div class="bg-white flex flex-row gap-5 items-center p-2 rounded-xl pl-3">
                    <p class="bg-slate-100 py-1 px-3 rounded-full">{{ $loop->iteration }}</p>
                    <div class="h-8 w-8 rounded-full overflow-hidden">
                        @if (empty($item->user->image))
                            <img class="w-full h-full rounded-full"
                                src="https://ui-avatars.com/api/?background=random&name={{ $item->name }}"
                                alt="Profile Image">
                        @else
                            <img class="w-full h-full rounded-full object-center object-cover"
                                src="{{ url('storage/profile/', $item->user->image) }}" alt="Profile Image">
                        @endif
                    </div>
                    <input type="text" name="student[]" value="{{ $item->id }}" hidden>
                    <p class="text-">{{ $item->name }}</p>
                    <select name="status[]" id="" class="bg-slate-100 rounded-lg p-1 cursor-pointer">
                        <option value="attendence" class="bg-main-color text-white">attendence</option>
                        <option value="permission" class="bg-blue-500 text-white">permission</option>
                        <option value="sick" class="bg-yellow-400 text-white">sick</option>
                        <option value="alpha" class="bg-red-500 text-white">alpha</option>
                    </select>
                </div>
            </div>
        @endforeach
        <div class="flex flex-col px-4 py-1 md:px-5 md:py-3">
            <label for="" class="mb-2 font-Nunito text-white font-bold bg-blue-500 size-fit py-1 px-3">Note</label>
            <textarea name="note" id="" cols="3" rows="5"></textarea>
            <button type="submit"
                class="ml-auto mt-2 bg-yellow-400 size-fit py-1 px-3 font-Nunito text-white font-bold rounded-lg hover:bg-yellow-400/80 duration-300">Update</button>
        </div>
    </form>
@endsection
