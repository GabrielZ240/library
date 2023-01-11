<div class="m-auto py-3">
    <br>
    <div class="m-auto col-10 bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6 flex justify-between">
            <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
                <div class="inline-flex rounded-md shadow">
                    <a data-tooltip-target="tooltip-default-return" href="{{ route('home') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-900 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                        <i class="fa-solid fa-rotate-left"></i>
                    </a>
                    <div id="tooltip-default-return" role="tooltip" class="inline-block absolute invisible z-10 py-1 px-2 text-xs font-small text-white bg-gray-900 rounded-lg shadow-sm opacity-50 transition-opacity duration-300 tooltip dark:bg-gray-700">
                        @lang('Return')
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </div>
                @if(Auth::user())
                    <div class="inline-flex rounded-md shadow">
                        <a data-tooltip-target="tooltip-default-edit" href="{{ route('books.edit', $book) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-900 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                        </a>
                        <div id="tooltip-default-edit" role="tooltip" class="inline-block absolute invisible z-10 py-1 px-2 text-xs font-small text-white bg-gray-900 rounded-lg shadow-sm opacity-50 transition-opacity duration-300 tooltip dark:bg-gray-700">
                            @lang('Edit')
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </div>
                @endif
            </div>
            <h1 class="text-lg leading-6 font-large text-orange-900">
                <p class="text-md xl:text-6xl "><b>{{ $book->name }}</b></p>
            </h1>
        </div>
        <div class="border-t border-gray-200">
            <dl>
                <div class="bg-orange-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-orange-500">
                        @lang('Author')
                    </dt>
                    <dd class="mt-1 text-sm text-orange-900 text-2xl sm:mt-0 sm:col-span-2">
                        {{ $book->author }}
                    </dd>
                </div>
                <div class="bg-orange-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-orange-500">
                        @lang('Published Date')
                    </dt>
                    <dd class="mt-1 text-sm text-orange-900 sm:mt-0 sm:col-span-2">
                        {{ date('d-M-Y',strtotime($book->published_date)) }}
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-orange-500">
                        @lang('Status')
                    </dt>
                    <dd class="mt-1 text-sm text-orange-900 sm:mt-0 sm:col-span-2">
                        <span>{{ $book->status }}</span>
                    </dd>
                </div>

                <div class="bg-orange-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-orange-500">
                        @lang('Categories')
                    </dt>
                    <dd class="mt-1 text-sm text-orange-900 sm:mt-0 sm:col-span-2">
                        <div class="text-sm text-center font-medium text-gray-900">
                            @foreach($book->categories as $cat)
                                <span>{{ $cat->name }}</span><br>
                            @endforeach
                        </div>
                    </dd>
                </div>
            </dl>
        </div>
    </div>
</div>

