<x-app-layout>
    <div class="w-full">
        {{-- Title --}}
        <div class="font-extrabold text-xl mt-2">
            Add Courses
        </div>
        <div class="flex justify-end w-full mb-5 relative right-0">
            @include('components.searchbar')
        </div>
        {{-- Error message if there is an existing course ID --}}
        @if (session('error'))
            <div class="bg-red-500 p-1 mx-1 mb-3 rounded-xl text-white text-center">
                {{ session('error') }}
            </div>
        @endif
        <div class="bg-white border border-slate-300 rounded-xl w-full p-3">
            <form action="{{ route('ManageStudentResult.storeNewCourse') }}" method="POST">
                @csrf
                <input type="hidden" name="subjectID" value="{{ request('subjectID') }}">
                <table class="rounded-xl px-4 w-full">
                    <tbody>
                        <tr>
                            <td class="px-4 py-2"><label>Course Name</label></td>
                            <td class="px-4 py-2"><input type="text" name="subjectName" class="form-control rounded-xl w-full bg-gray-200 border border-slate-400" required></td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2"><label>Exam Date</label></td>
                            <td class="px-4 py-2"><input type="date" name="subjectExamDate" class="form-control rounded-xl w-full bg-gray-200 border border-slate-400" required></td>
                        </tr>
                    </tbody>
                </table>
                <div class="flex justify-end px-4 py-2">
                    <div class="px-4">
                        <button type="button" class="btn btn-outline-dark border border-slate-400 bg-gray-400 px-3 py-2 rounded-xl hover:bg-gray-300"
                            onclick="window.history.back()">Cancel</button>
                    </div>
                    <div class="px-4">
                        <input type="submit" value="Submit" class="btn btn-success border border-slate-300 bg-emerald-500/80 px-3 py-2 rounded-xl hover:bg-emerald-400/80">
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>