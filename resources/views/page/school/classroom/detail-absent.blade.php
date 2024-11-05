@extends('layouts.parent')

@section('content')
    @foreach ($absent->absentClassData as $item)
        <div class="px-4 py-1 md:px-5 md:py-1">
            @if ($item->status == 'attendence')
                <div class="bg-main-color flex flex-row gap-5 items-center p-2 rounded-xl pl-3">
                    <p class="bg-slate-100 py-1 px-3 rounded-full">{{ $loop->iteration }}</p>
                    <div class="w-8 h-8 rounded-full overflow-hidden">
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
                    <p class="text-">{{ $item->previllage->name }}</p>
                    <p class="bg-green-800 font-semibold text-white rounded-lg py-1 px-3 cursor-default">Attendence</p>
                </div>
            @elseif ($item->status == 'permission')
                <div class="bg-blue-500 flex flex-row gap-5 items-center p-2 rounded-xl pl-3">
                    <p class="bg-slate-100 py-1 px-3 rounded-full">{{ $loop->iteration }}</p>
                    <div class="h-8 rounded-full overflow-hidden">
                        <img class="w-full h-full object-cover object-center rounded-full"
                            src="https://ui-avatars.com/api/?background=random&name={{ $item->previllage->name }}"
                            alt="user photo">
                    </div>
                    <input type="text" name="student[]" value="{{ $item->id }}" hidden>
                    <p class="text-">{{ $item->previllage->name }}</p>
                    <p class="bg-blue-800 font-semibold text-white rounded-lg py-1 px-3 cursor-default">Permission</p>
                </div>
            @elseif ($item->status == 'sick')
                <div class="bg-yellow-400 flex flex-row gap-5 items-center p-2 rounded-xl pl-3">
                    <p class="bg-slate-100 py-1 px-3 rounded-full">{{ $loop->iteration }}</p>
                    <div class="h-8 rounded-full overflow-hidden">
                        <img class="w-full h-full object-cover object-center rounded-full"
                            src="https://ui-avatars.com/api/?background=random&name={{ $item->previllage->name }}"
                            alt="user photo">
                    </div>
                    <input type="text" name="student[]" value="{{ $item->id }}" hidden>
                    <p class="text-">{{ $item->previllage->name }}</p>
                    <p class="bg-yellow-800 font-semibold text-white rounded-lg py-1 px-3 cursor-default">Sick</p>
                </div>
            @else
                <div class="bg-red-500 flex flex-row gap-5 items-center p-2 rounded-xl pl-3">
                    <p class="bg-slate-100 py-1 px-3 rounded-full">{{ $loop->iteration }}</p>
                    <div class="h-8 rounded-full overflow-hidden">
                        <img class="w-full h-full object-cover object-center rounded-full"
                            src="https://ui-avatars.com/api/?background=random&name={{ $item->previllage->name }}"
                            alt="user photo">
                    </div>
                    <input type="text" name="student[]" value="{{ $item->id }}" hidden>
                    <p class="text-">{{ $item->previllage->name }}</p>
                    <p class="bg-red-800 font-semibold text-white rounded-lg py-1 px-3 cursor-default">Alpha</p>
                </div>
            @endif
        </div>
    @endforeach

    @if ($absent->absentClassNote->count() !== 0)
        <p
            class="mx-4 my-1 md:mx-5 md:my-1 p-2 text-white border-zinc-900 border-[1px] rounded-xl bg-blue-500 flex flex-col">
            <span class="font-semibold bg-blue-800 size-fit py-1 px-2 rounded-lg">NOTE</span>
            {{ $absent->absentClassNote->first()->note }}</p>
    @endif
@endsection
