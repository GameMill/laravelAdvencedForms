@if (count($breadcrumbs) > 0)

    <nav class="bg-white shadow">
        <ol class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
            @for ($i = 0; $i < count($breadcrumbs); $i++)
                <li>
                    <a href="{{ $breadcrumbs[$i]['url'] }}" class="text-blue-600 hover:text-blue-900 hover:underline focus:text-blue-900 focus:underline">
                        {{ $breadcrumbs[$i]['name'] }}
                    </a>
                </li>
                @unless($i == count($breadcrumbs) - 1)
                    <li class="text-gray-500 px-2">
                        /
                    </li>
                @endunless
            
            @endfor
        </ol>
    </nav>
@endif
