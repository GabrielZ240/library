<div class="mr-auto pb-8">
    {{-- Be like water. --}}
    <div class="flex flex-col w-5/6 m-auto py-2">
        <h1 class="text-4xl"><b>@lang('Categories')</b></h1>

        <div class="flex justify-between py-2">

            @if(Auth::user())
                <a href="{{ route('categories.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-900 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    @lang('New category')
                </a>
            @endif

        </div>
    </div>

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="flex flex-col w-11/12 m-auto py-2">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-orange-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-orange-200">
                        <thead class="bg-black">
                            <tr>
                                <th scope="col" class="font-bold px-6 py-3 text-center text-xs font-medium text-gray-300 uppercase tracking-wider">@lang('Category')</th>
                                <th scope="col" class="font-bold px-6 py-3 text-center text-xs font-medium text-gray-300 uppercase tracking-wider">@lang('Description')</th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only"></span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($categories as $category)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-center font-medium text-gray-900">
                                            {{ $category->id}}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-center font-medium text-gray-900">
                                            {{ $category->name}}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex text-center">
                                            <a data-tooltip-target="tooltip-default-edit" href="{{ route('categories.edit',$category) }}" class="text-orange-600 hover:text-orange-900">
                                                <i class="px-1 fa-solid fa-pencil"></i>
                                            </a>
                                            <div id="tooltip-default-edit" role="tooltip" class="inline-block absolute invisible z-10 py-1 px-2 text-xs font-small text-white bg-gray-900 rounded-lg shadow-sm opacity-50 transition-opacity duration-300 tooltip dark:bg-gray-700">
                                                @lang('Edit')
                                                <div class="tooltip-arrow" data-popper-arrow></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>
                                        <div class="text-sm text-gray-900">
                                            @lang('There are no registered categorys with those parameters')
                                        </div>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

