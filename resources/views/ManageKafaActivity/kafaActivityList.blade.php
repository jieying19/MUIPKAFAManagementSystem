<x-app-layout>
    <div class="h-full">
        <div class="font-extrabold text-xl mt-2">
            KAFA Activity
        </div>
        <div class="flex justify-end w-full mb-5 relative right-0">
            @include('components.searchbar')
            @if (auth()->user()->role != 'parent' && auth()->user()->role != 'MUIPadmin')
            <a href="{{ route('addKafaActivity') }}"
                class="p-2 mx-2 border border-transparent rounded-xl hover:text-gray-600"
                style="background-color: #00AEA6;">
                Add Kafa Activity
            </a>
            @endif
        </div>
        <div class="bg-white border border-slate-300 rounded-xl w-full p-4 overflow-y-auto h-4/5">
            <table class="table-auto w-full text-center">
                <thead>
                    <tr>
                        <th class="py-2">Activity Number</th>
                        <th class="py-2">Activity Name</th>
                        <th class="py-2">Activity Date</th>
                        @if (auth()->user()->role == 'KAFAadmin' || auth()->user()->role == 'teacher')
                        <th class="py-2">Student Number</th>
                        @endif
                        <th class="py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kafaActivity as $activity)
                        <tr class="bg-gray-200 border-y-8 border-white">
                            <td class="py-2 px-4">{{ $activity->id }}</td>
                            <td class="py-2 px-4 text-center">{{ $activity->activity_name }}</td>
                            <td class="py-2 px-4">{{ $activity->activity_dateTime }}</td>
                            @if (auth()->user()->role == 'KAFAadmin' || auth()->user()->role == 'teacher')
                            <td class="py-2 px-4">{{ $studentCounts[$activity->id] }}</td> <!-- Use correct student count -->
                            @endif
                            <td class="flex justify-center">
                                @if (auth()->user()->role != 'KAFAadmin' && auth()->user()->role != 'teacher')
                                <a href="{{ route('viewKafaActivity', $activity->id) }}">
                                    <svg id="view-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-400 m-2"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-.274.977-.67 1.897-1.172 2.744-.504.848-1.112 1.64-1.81 2.334A10.992 10.992 0 0112 19c-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                                @else
                                <a href="{{ route('editKafaActivity', $activity->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-400 m-2"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </a>
                                <a href="{{ route('viewKafaActivity', $activity->id) }}">
                                    <svg id="view-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-400 m-2"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-.274.977-.67 1.897-1.172 2.744-.504.848-1.112 1.64-1.81 2.334A10.992 10.992 0 0112 19c-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                                <script>
                                    function confirmDeleteKafaActivity() {
                                        return confirm('Are you sure you want to delete the activity?');
                                    }
                                </script>
                                <form action="{{ route('deleteKafaActivity', $activity->id) }}" method="post">
                                    @csrf
                                    <button type="submit" onclick="return confirmDeleteKafaActivity()">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-400 m-2"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                
            </table>
        </div>
    </div>
</x-app-layout>
