<x-app-layout>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="font-medium text-2xl">Cuentas conectadas</h1>

            <div class="mt-6 flex flex-col gap-y-6">
              @foreach (auth()->user()->authProviders as $provider)
                <x-provider-card :$provider />
              @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
