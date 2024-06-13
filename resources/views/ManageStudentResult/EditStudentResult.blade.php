<x-app-layout>
    <div class="w-full">
        {{-- Title --}}
        <div class="font-extrabold text-xl mt-2">
            Edit Student Result Form
        </div>
        <div class="flex justify-end w-full mb-5 relative right-0">
        </div>
        
        <div class="bg-white border border-slate-300 rounded-xl w-full p-3">
            <!-- Class selection form -->
            <form action="{{ route('ManageStudentResult.editResult') }}" method="GET" class="mb-4">
                @csrf
                <table class="rounded-xl px-4 w-full p-2">
                    <tbody>
                        <tr>
                            <td class="px-6 py-2 w-2/6"><label>Subject ID</label></td>
                            <td class="px-11 py-2">
                                <input type="hidden" name="subjectID" value="{{ $subjectID }}" readonly>
                                <input type="text" class="form-control rounded-xl w-full bg-gray-200 border border-slate-400" value="{{ $subjectName }}" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-2 w-2/6"><label>Class Name</label></td>
                            <td class="px-11 py-2">
                                <select name="classID" class="form-control rounded-xl w-full bg-gray-200 border border-slate-400" onchange="this.form.submit()">
                                    <option value="">Select Student's Class Name</option>
                                    @foreach($classes->unique('className') as $class)
                                        <option value="{{ $class->className }}" {{ request('classID') == $class->className ? 'selected' : '' }}>{{ $class->className }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>

            @if(isset($filteredClass) && $filteredClass->count())
                <form action="{{ route('ManageStudentResult.uploadResult') }}" method="POST">
                    @csrf
                    <input type="hidden" name="subjectID" value="{{ $subjectID }}">
                    <input type="hidden" name="classID" value="{{ request('classID') }}">
                    <table class="rounded-xl px-4 w-full p-2">
                        <thead>
                            <tr>
                                <th class="px-6 py-2 w-1/12">No.</th>
                                <th class="px-6 py-2 w-3/12">Student Name</th>
                                <th class="px-6 py-2 w-2/12">Student Class</th>
                                <th class="px-6 py-2 w-3/12">Student Marks</th>
                                <th class="px-6 py-2 w-3/12">Student Grade</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($filteredClass as $class)
                                <tr>
                                    <td class="px-6 py-2">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-2">{{ $class->studentName }}</td>
                                    <td class="px-6 py-2">{{ $class->className }}</td>
                                    <td class="px-6 py-2">
                                        <input type="text" class="form-control rounded-xl w-full bg-gray-200 border border-slate-400" name="resultMark[{{ $class->studentID }}]" value="{{ $class->resultMark }}">
                                    </td>
                                    <td class="px-6 py-2">
                                        <input type="text" class="form-control rounded-xl w-full bg-gray-200 border border-slate-400" name="resultGrade[{{ $class->studentID }}]" value="{{ $class->resultGrade }}">
                                    </td>
                                </tr>
                                <input type="hidden" name="studentID[{{ $class->studentID }}]" value="{{ $class->studentID }}">
                                <input type="hidden" name="resultID[{{ $class->studentID }}]" value="{{ $class->resultID }}">
                            @endforeach
                        </tbody>
                    </table>
                    <div class="flex justify-end px-4 py-2">
                        @if (auth()->user()->role == 'admin' || auth()->user()->role == 'teacher')
                            <div class="px-4">
                                <button type="submit" class="btn btn-success border border-slate-300 bg-emerald-500/80 px-3 py-2 rounded-xl hover:bg-emerald-400/80">Save</button>
                            </div>
                        @endif
                    </div>
                </form>
            @else
                <p class="text-center">No Data! Please Add New!</p>
            @endif
        </div>
    </div>

    <div style="position: fixed; left: 50%; transform: translate(-50%, -50%);">
        @if (session('failure'))
            <div class="alert alert-danger">
                {{ session('failure') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
</x-app-layout>
