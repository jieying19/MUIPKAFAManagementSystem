<x-app-layout>
    {{-- Title --}}
    <div class="font-extrabold text-xl mt-2">
        View KAFA Activity
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Activity Name:</label>
                        <p>{{ $kafaActivity->activity_name }}</p>
                    </div>
                    <div class="mb-4">
                        <label for="desc" class="block text-gray-700 text-sm font-bold mb-2">Activity Description:</label>
                        <p>{{ $kafaActivity->activity_desc }}</p>
                    </div>
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Activity Datetime:</label>
                        <p>{{ \Carbon\Carbon::parse($kafaActivity->activity_dateTime)->format('Y-m-d H:i') }}</p>
                    </div>
                    <div class="mb-4">
                        <label for="age" class="block text-gray-700 text-sm font-bold mb-2">Activity Suitable Age for Student:</label>
                        <p>{{ $kafaActivity->activity_studentAge }}</p>
                    </div>                        
                    <div class="mb-4">
                        <label for="comment" class="block text-gray-700 text-sm font-bold mb-2">Activity Comment:</label>
                        <p>{{ $kafaActivity->activity_comment }}</p>
                    </div>
                    <div>
                    @if (auth()->user()->role == 'parent')
                    <table class="table-auto w-full text-center">
                        <thead>
                            <tr class="bg-gray-200 border-y-8 border-gray">
                                <td class="py-2 px-4">Child Number</td>
                                <td class="py-2 px-4">Child Name</td>
                                <td class="py-2 px-4">Child Age</td>
                                <td class="py-2 px-4">Button</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                            <tr class="bg-gray-200 border-y-8 border-white">
                                <td class="py-2 px-4">{{ $student->student_id }}</td>
                                <td class="py-2 px-4">{{ $student->student_name }}</td>
                                <td class="py-2 px-4">{{ $student->student_age }}</td>
                                <td class="py-2 px-4">
                                    @if ($attendances->where('student_id', $student->student_id)->isEmpty())
                                    <form action="{{ route('storeAttendance', $kafaActivity->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="student_id" value="{{ $student->student_id }}">
                                        <input type="hidden" name="activity_id" value="{{ $kafaActivity->id }}">
                                        <input type="submit" value="Attend" class="btn bg-emerald-500/80 px-3 py-2 rounded-xl hover:bg-emerald-400/80">
                                    </form>
                                    @else
                                    <button class="btn bg-gray-400 px-3 py-2 rounded-xl cursor-not-allowed" disabled>Participate</button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    @elseif (auth()->user()->role == 'KAFAadmin')
                    <table class="table-auto w-full text-center">
                        <thead>
                            <tr class="bg-gray-200 border-y-8 border-gray">
                                <td class="py-2 px-4">Child Name</td>
                                <td class="py-2 px-4">Child Age</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendances as $attendance)

                    <tr class="bg-gray-200 border-y-8 border-white">
                        <td class="py-2 px-4">{{ $attendance->student->student_name }}</td>
                        <td class="py-2 px-4">{{ $attendance->student->student_age }}</td>
                    </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
                
                <div class="flex justify-center px-4 py-2">
                    <div class="px-4">
                        <a href="{{ route('kafaActivity') }}" class="btn border border-slate-400 bg-red-400 px-6 py-2 rounded-xl hover:bg-gray-300 w-full">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
