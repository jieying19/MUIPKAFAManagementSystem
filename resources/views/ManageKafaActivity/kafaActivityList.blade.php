<x-app-layout>
    <div class="h-full">
        <div class="font-extrabold text-xl mt-2">
            Kafa Activity
        </div>
        <div class="flex justify-end w-full mb-5 relative right-0">
            @include('components.searchbar')
            <a href="{{ route('addKafaActivity') }}"
                class="p-2 mx-2 border border-transparent rounded-xl hover:text-gray-600"
                style="background-color: #00AEA6;">
                Add Kafa Activity
            </a>
        </div>
        <div class="bg-white border border-slate-300 rounded-xl w-full p-4 overflow-y-auto h-4/5">
            <table class="table-auto w-full text-center">
                <thead>
                    <tr>
                        <th class="py-2">ID</th>
                        <th class="py-2">TITLE</th>
                        <th class="py-2">DATETIME</th>
                        <th class="py-2">STUDENT NUMBER</th>
                        <th class="py-2">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kafaActivity as $kafaActivity)
                        <tr class="bg-gray-200 border-y-8 border-white">
                            <td class="py-2 px-4">{{ $kafaActivity->id }}</td>
                            <td class="py-2 px-4 text-center">{{ $kafaActivity->activity_name }}</td>
                            <td class="py-2 px-4">{{ $kafaActivity->activity_dateTime }}</td>
                            <td class="py-2 px-4">{{ $kafaActivity->activity_studentNum }}</td>
                            <td class="flex justify-center">
                                <a href="{{ route('editKafaActivity', $kafaActivity->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-400 m-2"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </a>
                                <script>
                                    function confirmDeleteKafaActivity() {
                                        return confirm('Are you sure you want to delete the activity?');
                                    }
                                </script>
                                <form action="{{ route('deleteKafaActivity', $kafaActivity->id) }}" method="post">
                                    @csrf
                                    <button type="submit" onclick="return confirmDeleteKafaActivity()">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-400 m-2"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
