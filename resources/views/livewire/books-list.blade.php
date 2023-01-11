<div class="mr-auto pb-8">
    {{-- Be like water. --}}
    <div class="flex flex-col w-5/6 m-auto py-2">
        <h1 class="text-4xl"><b>@lang('Books')</b></h1>

        <div class="flex justify-between py-2">

            <div class="">
                <x-jet-input wire:model="search" autofocus class="mt-1 pl-10 block w-full shadow-sm sm:text-lg bg-gray-50 border-orange-300 focus:ring-orange-500 focus:border-orange-500 rounded-md" :error="$errors->first('search')" :placeholder="__('Search...')" type="search"/>
                <x-jet-input-error for="search" class="mt-2"  />
            </div>

            <div class="">
                <select class="mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" wire:model=status>
                    <option value="">@lang('Select a status')</option>
                    <option value="available">@lang('Available')</option>
                    <option value="borrowed">@lang('Borrowed')</option>
                    <option value="not available">@lang('Not Available')</option>
                </select>
            </div>

            <div class="">
                <select class="mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" wire:model=perPage>
                    <option value="5">@lang('5')</option>
                    <option value="10">@lang('10')</option>
                    <option value="15">@lang('15')</option>
                    <option value="20">@lang('20')</option>
                </select>
            </div>

            <div>
                @if(Auth::user())
                    <a href="{{ route('books.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-900 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        @lang('New book')
                    </a>
                @endif

                @if(Auth::user())
                    <a href="{{ route('categories.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-900 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        @lang('New category')
                    </a>
                @endif

            </div>

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
                                <th scope="col" class="font-bold px-6 py-3 text-center text-xs font-medium text-gray-300 uppercase tracking-wider">@lang('book')</th>
                                @if(Auth::user()->role == 'sa' || Auth::user()->role == 'admin' )
                                    <th scope="col" class="font-bold px-6 py-3 text-center text-xs font-medium text-gray-300 uppercase tracking-wider">@lang('User')</th>
                                @endif
                                <th scope="col" class="font-bold px-6 py-3 text-center text-xs font-medium text-gray-300 uppercase tracking-wider">@lang('Book title')</th>
                                <th scope="col" class="font-bold px-6 py-3 text-center text-xs font-medium text-gray-300 uppercase tracking-wider">@lang('Author')</th>
                                <th scope="col" class="font-bold px-6 py-3 text-center text-xs font-medium text-gray-300 uppercase tracking-wider">@lang('Status')</th>
                                <th scope="col" class="font-bold px-6 py-3 text-center text-xs font-medium text-gray-300 uppercase tracking-wider">@lang('Categories')</th>
                                <th scope="col" class="font-bold px-6 py-3 text-center text-xs font-medium text-gray-300 uppercase tracking-wider">@lang('Published Date')</th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only"></span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($books as $book)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-center font-medium text-gray-900">
                                            {{ $book->id}}
                                        </div>
                                    </td>
                                    @if($book->user !== null)
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <img class="h-10 w-10 rounded-full" src="{{ $book->user->profile_photo_url }}" alt="">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">{{ $book->user->name}}</div>
                                                    <div class="text-xs text-gray-500"><a class="underline hover:text-orange-600" href="mailto:{{ $book->user->email }}">{{ $book->user->email }}</a></div>
                                                </div>
                                            </div>
                                        </td>
                                    @else
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">

                                            </div>
                                        </td>
                                    @endif
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-center font-medium text-gray-900">
                                            <a class="text-orange-600 underline hover:text-orange-800" href="{{ route('books.show',$book) }}">
                                                {{ $book->name}}
                                            </a>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-center font-medium text-gray-900">
                                            {{ $book->author}}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-center font-medium text-gray-900">
                                            <span class="">{{ $book->status }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-center font-medium text-gray-900">
                                            @foreach($book->categories as $cat)
                                                <span>{{ $cat->name }}</span><br>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <div class="text-sm text-center font-medium text-gray-900">
                                            {{ date('d-M-Y',strtotime($book->published_date)) }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex text-center">
                                            <a data-tooltip-target="tooltip-default-see" href="{{ route('books.show',$book) }}" class="text-orange-600 hover:text-orange-900">
                                                <i class="px-1 fa-solid fa-eye"></i>
                                            </a>
                                            <div id="tooltip-default-see" role="tooltip" class="inline-block absolute invisible z-10 py-1 px-2 text-xs font-small text-white bg-gray-900 rounded-lg shadow-sm opacity-50 transition-opacity duration-300 tooltip dark:bg-gray-700">
                                                @lang('See')
                                                <div class="tooltip-arrow" data-popper-arrow></div>
                                            </div>
                                            <a data-tooltip-target="tooltip-default-edit" href="{{ route('books.edit',$book) }}" class="text-orange-600 hover:text-orange-900">
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
                                            @lang('There are no registered books with those parameters')
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
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        {{ $links->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
