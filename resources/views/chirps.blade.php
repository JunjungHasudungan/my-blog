<x-app-layout>
    <title> {{ $pageTitle }} | {{ config('app.name') }}</title>

    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <livewire:chirps.create />

        <livewire:chirps.list />
    </div>
</x-app-layout>