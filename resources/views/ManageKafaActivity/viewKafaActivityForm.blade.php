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
                        <label for="age" class="block text-gray-700 text-sm font-bold mb-2">Activity Age for Student:</label>
                        <p>{{ $kafaActivity->activity_studentAge }}</p>
                    </div>                        
                    <div class="mb-4">
                        <label for="comment" class="block text-gray-700 text-sm font-bold mb-2">Activity Comment:</label>
                        <p>{{ $kafaActivity->activity_comment }}</p>
                    </div>
                    <div class="mb-4">

                        @if (auth()->user()->role == 'parent')
                    <form id="participationForm"
                        action="{{ route('viewKafaActivity', $kafaActivity->id) }}" method="POST">
                        @csrf
                        <div class="form-group row m-3">
                            <label for="participate" class="col-sm-12 col-form-label"><b><u>Participation</u></b></label>
                            <select class="form-control" id="participate" name="student_id">
                                <option value="" selected disabled>Participate as</option>
                                @foreach ($students as $student)
                                    
                                        <option value="{{ $student->student_id }}">{{ $student->student_name }}</option>
                                    
                                @endforeach
                            </select>
                        </div>
                    </form>
                    @endif
                        {{-- @if (auth()->user()->role == 'KAFAadmin')
                        
                                <div class="form-group row m-3">
                                    <label for="participate" class="col-sm-12 col-form-label"><b><u>Participation</u></b></label>
                                    <select class="form-control" id="participate" name="student_id">
                                        <option value="" selected disabled>Participate as</option>
            
                                    </select>
                                </div>
                        @endif    
                    </div>
                    <div class="flex justify-center px-4 py-2">
                        {{-- <div class="px-4">
                            <a href="{{ route('editKafaActivity', $kafaActivity->id) }}" class="btn border border-slate-400 bg-emerald-500/80 px-3 py-2 rounded-xl hover:bg-emerald-400/80">Edit</a>
                        </div> --}}
                        <div class="px-4">
                            <a href="{{ route('kafaActivity') }}" class="btn border border-slate-400 bg-red-400 px-6 py-2 rounded-xl hover:bg-gray-300 w-full">    Back    </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>