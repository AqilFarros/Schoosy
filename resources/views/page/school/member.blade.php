@extends('layouts.parent')

@section('content')
    <form class="my-5 mx-5 p-2" method="GET" action="{{ route('previlage.searchPrevillage', $school->slug) }}">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm border rounded-lg "
                placeholder="Enter Name Member" name="query" required />
            <button type="submit"
                class="text-white absolute end-2.5 bottom-2.5 bg-green-700 hover:bg-green-800  font-medium rounded-lg text-sm px-4 py-2">Search</button>
        </div>
    </form>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-3 mx-7">
        <table class="w-full text-sm text-left rtl:text-right  ">
            <thead class="text-xs t uppercase bg-slate-200 ">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Member
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Role
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($school->previllage as $item)
                    <tr class="bg-slate-200 border-b ">
                        <td scope="row" class="px-6 py-4 font-medium whitespace-nowrap t">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-6 py-4 flex flex-row gap-2 items-center">
                            <div class="w-8 h-8">
                                @if (empty($item->user->image))
                                    <img class="w-full h-full rounded-full"
                                        src="https://ui-avatars.com/api/?background=random&name={{ $item->name }}"
                                        alt="Profile Image">
                                @else
                                    <img class="w-full h-full rounded-full object-center object-cover"
                                        src="{{ url('storage/profile/', $item->user->image) }}" alt="Profile Image">
                                @endif
                            </div>
                        </td>
                        <td>
                            @if ($item->role == 'owner')
                                <p>{{ $item->role }}</p>
                            @else
                                @if ($previlage->role == 'owner' || $previlage->role == 'operator')
                                    <form action="{{ route('previlage.updatePrevillage', [$school->slug, $item->id]) }}"
                                        method="post" class="flex flex-row gap-4">
                                        @csrf
                                        @method('PUT')
                                        <select name="role" id="">
                                            @if ($item->role == 'student')
                                                <option value="student" selected>student</option>
                                            @else
                                                <option value="student">student</option>
                                            @endif

                                            @if ($item->role == 'teacher')
                                                <option value="teacher" selected>teacher</option>
                                            @else
                                                <option value="teacher">teacher</option>
                                            @endif

                                            @if ($item->role == 'operator')
                                                <option value="operator" selected>operator</option>
                                            @else
                                                <option value="operator">operator</option>
                                            @endif
                                        </select>

                                        <button type="submit"
                                            class="bg-yellow-400 text-white hover:bg-white hover:text-yellow-400 px-3 py-1 rounded-lg duration-300">update</button>
                                    </form>
                                @else
                                    <p>{{ $item->role }}</p>
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
