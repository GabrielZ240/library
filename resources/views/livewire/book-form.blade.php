<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 "> {{ __('Book') }}</h2>
    </x-slot>
    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <x-jet-form-section submit="save">
                <x-slot name="title">
                    <p class="text-gray-800">{{ __('New book') }}</p>
                </x-slot>
                <x-slot name="description">
                    <p class="text-gray-800">{{ __('Form to create a new book') }}</p>
                </x-slot>
                {{--<h1 class="text-xl font-bold capitalize ></h1>--}}
                <x-slot name="form">
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label class="text-gray-800" for="name" :value="__('Book name')" />
                        <x-jet-input wire:model=book.name id="name" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md text-gray-500 focus:border-blue-500 focus:border-blue-500 focus:outline-none focus:ring" />
                        <x-jet-input-error for="book.name" class="mt-2"  />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label class="text-gray-800" for="author" :value="__('Book author')" />
                        <x-jet-input wire:model=book.author id="author" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md text-gray-500 focus:border-blue-500 focus:border-blue-500 focus:outline-none focus:ring" />
                        <x-jet-input-error for="book.author" class="mt-2"  />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label class="" for="book.status" :value="__('Status')" />
                        <select name="book.status" id="book.status" wire:model="book.status" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" required>
                            <option value="">@lang('Select a status')</option>
                            <option value="available">@lang('Available')</option>
                            <option value="borrowed">@lang('Borrowed')</option>
                            <option value="not available">@lang('Not Available')</option>
                        </select>
                    </div>

                    @if($this->book->status == 'borrowed')
                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label class="" for="book.user_id" :value="__('User')" />
                            <select name="book.user_id" id="book.user_id" wire:model="book.user_id" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" required>
                                <option value="">@lang('Select a user')</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif

                    <div class="col-span-6 sm:col-span-4">
                        <x-date wire:model="book.published_date" :placeholder="__('Select the published date')"/>
                        <x-jet-input-error for="book.published_date" class="mt-2"  />
                    </div>


                        @foreach($categories as $id => $name)
                            <label>
                                <input type="checkbox" value={{ $id }} wire:model="cat" />
                                {{ $name }}
                            </label>
                        @endforeach
                        <x-jet-input-error for="cat" class="mt-2"  />


                    <x-slot name="actions" class="flex justify-end mt-6">
                        @if($this->book->exists)
                            <x-jet-danger-button class="mr-auto" wire:click="delete">
                                {{ __('Delete') }}
                            </x-jet-danger-button>
                        @endif
                        <x-jet-secondary-button wire:click="cancelBookForm" class="mr-2">
                            {{ __('Return') }}
                        </x-jet-secondary-button>
                        <x-jet-button class="px-6 py-2 leading-5 transition-colors duration-200 transform bg-gray-500 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-600">
                            {{ __('Save') }}
                        </x-jet-button>
                    </x-slot>
                </x-slot>
            </x-jet-form-section>
        </div>
    </div>


    <script>
        $('.detail').summernote({
            tabsize: 2,
            height: 200,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            callbacks: {
                onChange: function(contents, $editable) {
                    @this.set('book.detail', contents);
                }
            }
        });
    </script>
</div>
