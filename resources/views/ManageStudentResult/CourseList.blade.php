<x-app-layout>
    <div class="w-full">
        {{-- Title --}}
        <div class="font-extrabold text-xl mt-2">
            Courses List
        </div>
        
        {{-- Add New Course Button --}}
        <div class="flex justify-end w-full mb-5 relative right-0">
            @if (auth()->user()->role == 'admin' || auth()->user()->role == 'teacher')
            <a href="{{ route('ManageStudentResult.newCourse') }}">
                <button class="btn bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                    Add New Course
                </button>
            </a>
            @endif
        </div>
        
        {{-- Course Table --}}
        <div class="bg-white border border-slate-300 rounded-xl w-full p-3">
            <div class="table-responsive">
                <table class="table-auto w-full">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-2 w-2/5">Course</th>
                            <th class="px-4 py-2 w-2/5">Exam Date</th>
                            <th class="px-4 py-2 w-1/5">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subjects as $subject)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $subject->subjectName }}</td>
                            <td class="px-4 py-2">{{ $subject->subjectExamDate }}</td>
                            <td class="px-4 py-2 flex items-center space-x-4">
                                @if (auth()->user()->role == 'admin' || auth()->user()->role == 'teacher')
                                <a href="{{ route('ManageStudentResult.viewStudentList', ['subjectID' => $subject->subjectID]) }}" class="text-blue-500 hover:text-blue-700">
                                    <box-icon type='solid' name='user-plus'></box-icon>
                                </a>
                                <a href="{{ route('ManageStudentResult.editResult', ['subjectID' => $subject->subjectID]) }}" class="text-yellow-500 hover:text-yellow-700">
                                    <box-icon type='solid' name='pencil'></box-icon>
                                </a>
                                <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this course?')) { document.getElementById('delete-form-{{ $subject->subjectID }}').submit(); }" class="text-red-500 hover:text-red-700">
                                    <box-icon type='solid' name='trash'></box-icon>
                                </a>
                                <form id="delete-form-{{ $subject->subjectID }}" action="{{ route('ManageStudentResult.deleteCourse', ['id' => $subject->subjectID]) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Success and Failure Messages --}}
        <div style="position: fixed; left: 50%; transform: translate(-50%, -50%);">
            @if (session('failure'))
            <div class="bg-red-500 p-1 mx-1 mb-3 rounded-xl text-white text-center">
                {{ session('failure') }}
            </div>
            @endif

            @if (session('success'))
            <div class="bg-green-500 p-1 mx-1 mb-3 rounded-xl text-white text-center">
                {{ session('success') }}
            </div>
            @endif
        </div>
    </div>
</x-app-layout>
