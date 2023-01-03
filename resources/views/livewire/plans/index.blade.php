<x-cards.simple_card>
    <table class="w-full">
        <thead>
            <tr
                class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                <th class="px-4 py-3">Nome</th>
                <th class="px-4 py-3">Url</th>
                <th class="px-4 py-3">Preço</th>
                <th class="px-4 py-3">Descrição</th>
                <th class="px-4 py-3">Ação</th>
            </tr>
        </thead>
        <tbody class="bg-white">
            <tr class="text-gray-700">
                <td class="px-4 py-3 border">
                    {{ $name }}
                </td>
                <td class="px-4 py-3 text-ms font-semibold border">{{ $url }}</td>
                <td class="px-4 py-3 text-xs border">{{ $price }}</td>
                <td class="px-4 py-3 text-sm border">{{ $description }}</td>
                <td class="px-4 py-3 text-sm border">Edit/Delete</td>
            </tr>

        </tbody>
    </table>
</x-cards.simple_card>
