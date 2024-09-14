<x-app-layout>
    <title> {{ $pageTitle }} | {{ config('app.name') }}</title>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @include('partials._table-article')
                </div>
            </div>
        </div>
    </div>

</x-app-layout>