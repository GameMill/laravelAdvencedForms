<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            @foreach ($table->columns as $column)
                <th scope="col" class="px-6 py-3">
                    {{ $column->getName() }}
                </th>
            @endforeach
        </tr>
    </thead>
    <tbody>

        @for ($i = 0; $i < count($table->getData()); $i++)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                @foreach ($table->columns as $column)
                    <td class="px-6 py-3">
                        {{ $column->getValue($table,$i) }}
                    </td>
                @endforeach
            </tr>
        
        @endfor

    </tbody>
</table>