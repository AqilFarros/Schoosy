@extends('layouts.parent')

@section('content')
    <div class="grid justify-center items-center">
        <div class="w-[18rem] h-64  md:w-[32rem] md:h-96 mx-auto">
            <img class="w-full h-full object-cover object-center rounded-sm"
                src="{{ url('storage/school/', $school->image) }}" alt="class photo">
        </div>
        
        <div class="my-3 flex justify-between">
            <h2 class="text-3xl font-bold ">{{ $school->name }}</h2>
            <p class="text-2xl"><i class="fa-solid fa-people-group"></i> {{ $teacher->count() }}</p>
        </div>
        
        <div class="flex justify-end items-center">
            <!-- Modal toggle -->
            <button data-modal-target="static-modal" data-modal-toggle="static-modal"
                class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5" type="button">
                See Teacher
            </button>

            <!-- Main modal -->
            <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow">
                        <!-- Modal header -->
                        <div class="flex items-center justify-end p-4 md:p-5 border-b rounded-t">
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                data-modal-hide="static-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5 space-y-4">
                            @foreach ($teacher as $item)
                                <div class="bg-slate-100 flex flex-row gap-3 items-center p-2 rounded-3xl pl-3">
                                    <p class="bg-white p-3 rounded-full">{{ $loop->iteration }}</p>
                                    <div class="w-8 h-8 rounded-full overflow-hidden">
                                        @if (empty($item->user->image))
                                            <img class="w-full h-full object-cover object-center rounded-full"
                                                src="https://ui-avatars.com/api/?background=random&name={{ $item->name }}"
                                                alt="user photo">
                                        @else
                                            <img class="w-full h-full object-cover object-center rounded-full"
                                                src="{{ url('storage/profile/', $item->user->image) }}" alt="user photo">
                                        @endif
                                    </div>
                                    <p class="text-">{{ $item->name }}</p>
                                </div>
                            @endforeach
                        </div>
                        <!-- Modal footer -->
                        <div class="flex justify-end items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                            <button data-modal-hide="static-modal" type="button"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if ($previlage->role == 'owner' || $previlage->role == 'operator')
            <button type="button" data-modal-target="timepicker-modal" data-modal-toggle="timepicker-modal"
                class="text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 font-medium rounded-lg my-3 text-sm py-2.5 ">
                <i class="fa-solid fa-clock"></i> Make Teacher Absent
            </button>

            <!-- Main modal -->
            <div id="timepicker-modal" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-[23rem] max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow ">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 border-b rounded-t ">
                            <h3 class="text-lg font-semibold text-gray-900">
                                Schedule an appointment
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center"
                                data-modal-toggle="timepicker-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 pt-0">
                            <form action="{{ route('previlage.absentEmployee.makeAbsent', [$school->slug]) }}"
                                method="post">
                                @csrf
                                @method('POST')
                                <input id="datepicker-autohide" datepicker datepicker-autohide type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block my-5 w-full ps-10 p-2.5"
                                    placeholder="Select date" name="date">
                                <div class="grid grid-cols-2 gap-2 ">
                                    <button type="submit"
                                        class="text-white bg-blue-700 hover:bg-blue-800 0 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 ">Save</button>
                                    <button type="button" data-modal-hide="timepicker-modal"
                                        class="py-2.5 px-5 mb-2 text-sm font-medium text-gray-900  bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Discard</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <p class="bg-red-100 text-red-800 text-sm font-medium px-2.5 py-2 rounded ">Absences That Have Not Been Done</p>
        <div class="shadow-md sm:rounded-lg my-3">
            <table class="w-full text-sm">
                <thead class="text-xs uppercase bg-slate-200 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Tanggal
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($absent as $item)
                        @if ($item->absentEmployeeData->count() == 0)
                            <tr class="bg-slate-200">
                                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">

                                    {{ $item->date }}

                                </th>
                                <th class="px-6 py-4">
                                    <a class="px-3 py-2 text-sm font-medium text-white bg-green-700 rounded-lg hover:bg-green-800 duration-300 transition-all"
                                        href="{{ route('previlage.absentEmployee.edit', [$school->slug, $item->id]) }}">See
                                        Detail <i class="fa-solid fa-eye"></i></a>
                                </th>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>

        <p class="bg-green-100 text-green-800 text-sm font-medium px-2.5 py-2 rounded ">Absences That Have Been Done</p>
        <div class="shadow-md sm:rounded-lg my-3">
            <table class="w-full text-sm">
                <thead class="text-xs uppercase bg-slate-200 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Tanggal
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($absent as $item)
                        @if ($item->absentEmployeeData->count() !== 0)
                            <tr class="bg-slate-200">
                                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                    {{ $item->date }}
                                </th>
                                <th class="px-6 py-4">
                                    <a class="px-3 py-2 text-sm font-medium text-white bg-green-700 rounded-lg hover:bg-green-800 duration-300 transition-all"
                                        href="{{ route('previlage.absentEmployee.detail', [$school->slug, $item->id]) }}">See
                                        Detail <i class="fa-solid fa-eye"></i></a>
                                </th>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
