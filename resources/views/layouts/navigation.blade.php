<nav x-data="{ open: false }" class="bg-user-main-color border-b border-gray-100 w-full fixed z-10" style="box-shadow: 0px 10px 10px -3px rgba(0, 0, 0, 0.1);">
    <!-- Primary Navigation Menu -->
    <div class="mx-auto px-4 sm:px-6 lg:px-6">
        <div class="flex justify-between h-10">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('shift.index') }}">
                        <div class="w-28"><img src="{{ asset('img/ShiftPilot-logo.png') }}" alt="ShiftPilot"></div>
                    </a>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-company-name />
                <x-dropdown align="right" width="auto">
                    <x-slot name="trigger">
                        <button class="bg-user-main-color inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-bold rounded-md text-white">
                            <div class="w-4"><img src="{{ asset('img/nav-user-icon.png') }}" alt="人のアイコン"></div>
                            <div>{{ Auth::user()->name }}</div>

                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            設定
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                ログアウト
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" id="navButton" class="inline-flex items-center justify-center p-2 rounded-md text-white focus:outline-none">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" id="navContent" class="hidden sm:hidden bg-white">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('shift.index')" :active="request()->routeIs('shift.index')">
                <div class="w-5 sm:block hidden"><img src="{{ asset('img/nav-calendar.png') }}" alt="カレンダーのアイコン"></div>
                <p class="sm:pl-2">シフト確認</p>
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('submit-shift.index')" :active="request()->routeIs('submit-shift.index')">
                <div class="w-5 sm:block hidden"><img src="{{ asset('img/nav-submit-shift.png') }}" alt="シフト提出"></div>
                <p class="sm:pl-2">シフト提出</p>
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('contact.index')" :active="request()->routeIs('contact.index')">
                <div class="w-5 sm:block hidden"><img src="{{ asset('img/nav-contact.png') }}" alt="お問い合わせ"></div>
                <p class="sm:pl-2">お問い合わせ</p>
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    <p class="sm:pl-2">設定</p>
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        <p class="sm:pl-2">ログアウト</p>
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
