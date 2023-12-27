<nav class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center bg-gray-50 px-6">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-x-4">
                        <x-application-logo class="block h-6 w-auto fill-current text-gray-800" />
                        Socialite
                    </a>
                </div>
            </div>

            <div class="flex items-center ms-6">
              <form method="POST" action="{{ route('logout') }}">
                @csrf

                <a :href="route('logout')" class="text-sm text-gray-800 cursor-pointer" onclick="event.preventDefault(); this.closest('form').submit();">
                    Cerrar Sesión
                </a>
              </form>
            </div>
        </div>
    </div>
</nav>
