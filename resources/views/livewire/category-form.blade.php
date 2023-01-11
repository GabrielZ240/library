<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 "> {{ __('Category') }}</h2>
    </x-slot>
    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <x-jet-form-section submit="save">
                <x-slot name="title">
                    <p class="text-gray-800">{{ __('New category') }}</p>
                </x-slot>
                <x-slot name="description">
                    <p class="text-gray-800">{{ __('Form to create a new category') }}</p>
                </x-slot>
                {{--<h1 class="text-xl font-bold capitalize ></h1>--}}
                <x-slot name="form">
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label class="text-gray-800" for="name" :value="__('Category name')" />
                        <x-jet-input wire:model=category.name id="name" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md text-gray-500 focus:border-blue-500 focus:border-blue-500 focus:outline-none focus:ring" />
                        <x-jet-input-error for="category.name" class="mt-2"  />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <div wire:ignore>
                            <x-jet-label class="" for="description" :value="__('Description')" />
                            <texarea  type="text" wire:model=category.description input="category.description" id="description" class="form-control detail">{!! $category->description !!}</texarea>
                            <x-jet-input-error for="category.description" class="mt-2" />
                        </div>
                    </div>

                    <x-slot name="actions" class="flex justify-end mt-6">
                        @if($this->category->exists)
                            <x-jet-danger-button class="mr-auto" wire:click="delete">
                                {{ __('Delete') }}
                            </x-jet-danger-button>
                        @endif
                        <x-jet-secondary-button wire:click="cancelCategoryForm" class="mr-2">
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
                    @this.set('category.description', contents);
                }
            }
        });
    </script>
</div>

