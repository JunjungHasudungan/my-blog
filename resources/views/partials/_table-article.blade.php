

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white">
            Atribute
        </caption>
        <thead class="text-xs text-gray-700 uppercase bg-gray-200">
            <tr>
                <th scope="col" class="text-center px-6 py-3">
                    Kategori
                </th>
                <th scope="col" class="text-center px-6 py-3">
                    Tag
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b">
                <td class="px-6 py-4 place-content-center">
                    @include('partials._categories')
                </td>
                <td class="px-6 py-4 place-content-center">
                    @include('partials._tags')
                </td>
            </tr>
        </tbody>
    </table>
</div>
