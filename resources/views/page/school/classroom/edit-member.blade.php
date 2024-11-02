@extends('layouts.parent')

@section('content')
    <div>


        <div class="mb-4 border-b border-gray-200">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-styled-tab"
                data-tabs-toggle="#default-styled-tab-content"
                data-tabs-active-classes="text-green-600 hover:text-green-600 border-green-600"
                data-tabs-inactive-classes="text-gray-500 hover:text-gray-600 border-gray-100 hover:border-gray-300"
                role="tablist">
                <li class="me-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-styled-tab"
                        data-tabs-target="#styled-profile" type="button" role="tab" aria-controls="profile"
                        aria-selected="false">Add Student</button>
                </li>
                <li class="me-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 "
                        id="dashboard-styled-tab" data-tabs-target="#styled-dashboard" type="button" role="tab"
                        aria-controls="dashboard" aria-selected="false">Delete Student</button>
                </li>
                <li class="me-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 "
                        id="settings-styled-tab" data-tabs-target="#styled-settings" type="button" role="tab"
                        aria-controls="settings" aria-selected="false">Homeroom</button>
                </li>
                <li role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 "
                        id="contacts-styled-tab" data-tabs-target="#styled-contacts" type="button" role="tab"
                        aria-controls="contacts" aria-selected="false">Contacts</button>
                </li>
            </ul>
        </div>
        <div id="default-styled-tab-content">
            {{-- Add Student --}}
            <div class="hidden p-4 rounded-lg " id="styled-profile" role="tabpanel" aria-labelledby="profile-tab">

                <form action="{{ route('previlage.classroom.addMember', [$school->slug, $classroom->slug]) }}"
                    method="post">
                    @csrf
                    @method('PUT')
                    <div class="flex">
                        <h2 class=" text-2xl font-bold text-green-800 mr-5 ">ADD STUDENT</h2>
                        <button class="bg-green-600 px-3 font-medium rounded-md text-white hover:bg-opacity-70"
                            type="submit">ADD <i class="fa-solid fa-plus"></i></button>
                    </div>
                    @foreach ($student as $item)
                        <div class="flex items-center mt-3 space-x-16">
                            <img class="w-11 h-11 rounded-full"
                                src="https://ui-avatars.com/api/?background=0D8ABC&color=fff" alt="Foto Profile">
                            <p class="bg-green-100 text-green-800 text-lg font-medium px-3 py-1 rounded-lg ">
                                {{ $item->name }}
                            </p>
                            <input class=" w-5 h-5 cursor-pointer" type="checkbox" name="member[]"
                                value="{{ $item->user_id }}">
                        </div>
                    @endforeach

                </form>
            </div>
            {{-- Delete Student --}}
            <div class="hidden p-4 rounded-lg " id="styled-dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                <form action="{{ route('previlage.classroom.deleteMember', [$school->slug, $classroom->slug]) }}"
                    method="post">
                    @csrf
                    @method('PUT')
                    <div class="flex">
                        <h2 class=" text-2xl font-bold text-green-800 mr-5 ">REMOVE STUDENT</h2>
                        <button class="bg-red-600 px-3 font-medium rounded-md text-white hover:bg-opacity-70"
                            type="submit">REMOVE <i class="fa-solid fa-trash"></i></button>
                    </div>
                    @foreach ($classmate as $item)
                        <div class="flex items-center mt-3 space-x-16">
                            <img class="w-11 h-11 rounded-full"
                                src="https://ui-avatars.com/api/?background=0D8ABC&color=fff" alt="Foto Profile">
                            <p class="bg-green-100 text-green-800 text-lg font-medium px-3 py-1 rounded-lg ">
                                {{ $item->name }}
                            </p>
                            <input class=" w-5 h-5 cursor-pointer" type="checkbox" name="member[]" id=""
                                value="{{ $item->user_id }}">
                        </div>
                    @endforeach
                </form>
            </div>
            <div class="hidden p-4 rounded-lg " id="styled-settings" role="tabpanel" aria-labelledby="settings-tab">
                <form action="{{ route('previlage.classroom.addHomeroom', [$school->slug, $classroom->slug]) }}"
                    method="post">
                    @csrf
                    @method('PUT')
                    <h2 class=" text-2xl font-bold text-green-800 mr-5 ">ADD NEW HOMEROOM</h2>
                    <div class="flex items-center mt-3 space-x-8">
                        <select class="bg-blue-100 text-blue-800 text-lg font-medium px-3 py-1 rounded-lg ">
                            <option selected>Choose a country</option>
                            <option value="US">United States</option>
                            <option value="CA">Canada</option>
                            <option value="FR">France</option>
                            <option value="DE">Germany</option>

                        </select>
                        <button type="submit"
                            class="px-3 text-sm font-medium text-center bg-green-600 rounded-md text-white py-2 hover:bg-opacity-70 duration-300">ADD <i class="fa-solid fa-plus"></i></button>
                    </div>
                </form>
            </div>
            <div class="hidden p-4 rounded-lg " id="styled-contacts" role="tabpanel" aria-labelledby="contacts-tab">
                <form action="{{ route('previlage.classroom.removeHomeroom', [$school->slug, $classroom->slug]) }}"
                    method="post">
                    @csrf
                    @method('PUT')
                    <h2 class=" text-2xl font-bold text-green-800 mr-5 ">REMOVE HOMEROOM</h2>
                    <div class="flex items-center mt-3 space-x-8">
                        <img class="w-11 h-11 rounded-full" src="https://ui-avatars.com/api/?background=0D8ABC&color=fff"
                            alt="Foto Profile">
                        <p class="bg-blue-100 text-blue-800 text-lg font-medium px-3 py-1 rounded-lg ">
                            ACIM
                        </p>
                        <button type="submit"
                            class="px-3 text-sm font-medium text-center bg-red-600 rounded-md text-white py-2 hover:bg-opacity-70 duration-300">REMOVE
                            <i class="fa-solid fa-trash"></i></button>
                    </div>
                </form>
            </div>
        </div>

        {{-- <form action="{{ route('previlage.classroom.addMember', [$school->slug, $classroom->slug]) }}" method="post">
            @csrf
            @method('PUT')
            @foreach ($student as $item)
                <input type="checkbox" name="member[]" id="" value="{{ $item->user_id }}">
                <p>{{ $item->name }}</p>
            @endforeach

            <button type="submit">add</button>
        </form> --}}

        {{-- <form action="{{ route('previlage.classroom.deleteMember', [$school->slug, $classroom->slug]) }}" method="post">
            @csrf
            @method('PUT')
            @foreach ($classmate as $item)
                <input type="checkbox" name="member[]" id="" value="{{ $item->user_id }}">
                <p>{{ $item->name }}</p>
            @endforeach

            <button type="submit">delete</button>
        </form> --}}

        {{-- <form action="{{ route('previlage.classroom.addHomeroom', [$school->slug, $classroom->slug]) }}" method="post">
            @csrf
            @method('PUT')
            <label for="">teacher</label>
            <select name="teacher" id="">
                @foreach ($teacher as $item)
                    <option value="{{ $item->user_id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </form> --}}

        {{-- <form action="{{ route('previlage.classroom.removeHomeroom', [$school->slug, $classroom->slug]) }}" method="post">
            @csrf
            @method('PUT')
            <label for="">{{ $homeroom->name }}</label>
            <input type="text" value="{{ $homeroom->id }}" name="teacher" hidden>
            <button type="submit">remove</button>
        </form> --}}
    </div>
@endsection
