<x-app-layout>
    <div class="w-full">
        {{-- Title --}}
        <div class="font-extrabold text-xl mt-2">
            All Courses List
        </div>
        <div class="flex justify-end w-full mb-5 relative right-0">
            @include('components.searchbar')
        </div>
        
        {{-- Only admin and teacher can see ADD button --}}
        @if (auth()->user()->role == 'admin' || auth()->user()->role == 'teacher')
            <div class="flex justify-end w-full mb-5">
                <a href="{{ route('ManageStudentResult.newCourse') }}">
                    <button type="button" class="btn bg-blue-600 text-white py-2 px-4 rounded-xl hover:bg-blue-500">Add New Course</button>
                </a>
            </div>
        @endif

        {{-- Error and success messages --}}
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

        {{-- Table --}}
        <div class="bg-white border border-slate-300 rounded-xl w-full p-3">
            <div class="table-responsive">
                <table class="table table-striped w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2" style="width: 40%">Course</th>
                            <th class="px-4 py-2" style="width: 40%">Exam Date</th>
                            <th class="px-4 py-2" style="width: 20%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subjects as $subject)
                        <tr class="border-b" style="height: 50px; vertical-align:middle;">
                            <td class="px-4 py-2">{{ $subject->subjectName }}</td>
                            <td class="px-4 py-2">{{ $subject->subjectExamDate }}</td>
                            <td class="px-4 py-2 flex space-x-2">
                                {{-- Only accessed by admin and teacher --}}
                                @if (auth()->user()->role == 'admin' || auth()->user()->role == 'teacher')
                                    <a href="{{ route('ManageStudentResult.viewStudentList', ['subjectID' => $subject->subjectID]) }}" class="text-blue-500">
                                        <box-icon type='solid' name='user-plus'></box-icon>
                                    </a>
                                    <a href="{{ route('ManageStudentResult.editResult', ['subjectID' => $subject->subjectID]) }}" class="text-yellow-500">
                                        <box-icon type='solid' name='pencil'></box-icon>
                                    </a>
                                    <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this course?')) { document.getElementById('delete-form-{{ $subject->subjectID }}').submit(); }" class="text-red-500">
                                        <box-icon name='trash' type='solid'></box-icon>
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
    </div>
</x-app-layout>
