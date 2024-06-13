<nav class="relative w-1/6 px-4 pt-8 pb-4 left-0 top-0 overflow-auto" style="background-color: #0C1446;">
    <ul class="space-y-3">
        {{-- Dashboard --}}
        @if (Auth::user()->role != 'KAFAadmin')
        <a href="{{ route('announcementList') }}">
            <x-nav-item>
                <div class="self-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                </div>
                <div>
                    HOME
                </div>
            </x-nav-item>
        </a>
        @endif

        {{-- Edit Announcement --}}
        @if (Auth::user()->role == 'KAFAadmin'|| Auth::user()->role == 'MUIPadmin'|| Auth::user()->role == 'teacher')
        <a href="{{ route('announcement') }}">
            <x-nav-item>
                <div class="self-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                </div>
                <div>
                    HOME
                </div>
            </x-nav-item>
        </a>
        @endif

        {{-- Kafa Activity --}}
        @if (Auth::user()->role == 'KAFAadmin'|| Auth::user()->role == 'MUIPadmin'|| Auth::user()->role == 'teacher')
        <a href="{{ route('kafaActivity') }}">
            <x-nav-item>
                <div class="self-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                </div>
                <div>
                    Kafa Activity
                </div>
            </x-nav-item>
        </a>
        @endif

        {{-- User List --}}
        {{-- Only KAFA Admin can access this module --}}
        @if (Auth::user()->role == 'KAFAadmin')
        <a href="{{ route('user') }}">
            <x-nav-item>
                <div class="self-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                </div>
                <div>
                    USER LIST
                </div>
            </x-nav-item>
        </a>
        @endif

        {{-- Check Payment --}}
        {{-- Only KAFA Admin and MUIP Admin can access this module --}}
        @if (Auth::user()->role == 'KAFAadmin' || Auth::user()->role == 'MUIPadmin')
        <a href="{{ route('payment.index') }}">
            <x-nav-item>
                <div class="self-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                </div>
                <div>
                    PAYMENTS
                </div>
            </x-nav-item>
        </a>
        @endif

        {{-- Check Payment --}}
        {{-- Only Parent can access this module --}}
        @if (Auth::user()->role == 'parent')
        <a href="{{ route('payment.userIndex') }}">
            <x-nav-item>
                <div class="self-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                </div>
                <div>
                    VIEW BILL
                </div>
            </x-nav-item>
        </a>
        @endif

        {{-- Report --}}
        {{-- Only KAFA Admin and MUIP Admin can access this module --}}
        @if (Auth::user()->role == 'KAFAadmin' || Auth::user()->role == 'MUIPadmin'|| Auth::user()->role == 'teacher')
        <a href="{{ route('report') }}">
            <x-nav-item>
                <div class="self-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                </div>
                <div>
                    REPORT
                </div>
            </x-nav-item>
        </a>
        @endif
    </ul>
</nav>
