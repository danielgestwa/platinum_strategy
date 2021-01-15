<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create/Update category
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-12">

                @if (isset($categoryValue->id) && $categoryValue->products->isEmpty())
                <div class="overflow-auto py-4">
                    <a id="show_{{ $categoryValue->id }}" class="btn btn-delete btn-small show_delete_button float-right" role="button">
                        <img src=" {{ asset('images/svg/put-trash-solid.svg') }} " class="btn-image">
                    </a>
                    <form id="delete_{{ $categoryValue->id }}" class="btn btn-delete btn-small float-right delete_table_row" action="{{ route('deleteCategory', ['category' => $categoryValue->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="reset-full-width">
                            <img src=" {{ asset('images/svg/trash-solid.svg') }} " class="btn-image">
                        </button>
                    </form>
                </div>
                @elseif (isset($categoryValue->id) && $categoryValue->products->isNotEmpty())
                    <div class="m-3 text-gray-400 text-right">
                        <span>Note: If you want to delete this category, please remove all connected products.</span>
                    </div>
                @endif
                
                <div class="mt-5 md:mt-0 md:col-span-2">

                    @if (isset($categoryValue->id))
                        <form action="{{ route('updateCategory', ['category' => $categoryValue->id]) }}" method="POST">
                        @method('PUT')
                    @else
                        <form action="{{ route('storeCategory') }}" method="POST">
                        @method('POST')
                    @endif

                        @csrf
                        <div class="shadow overflow-hidden md:rounded-md">
                            <div class="px-4 py-5 bg-white md:p-6">
                                <div class="grid grid-cols-6 md:grid-cols-12 lg:grid-cols-12 gap-6">
                                    <div class="col-span-6 md:col-span-6 lg:col-span-4">
                                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                        <input 
                                            type="text" id="name" 
                                            value="{{ $categoryValue->name ?? '' }}" 
                                            name="name" 
                                            placeholder="e.g. Food & Drinks"
                                            class="@error('name') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                        
                                        @error('name')
                                            <div class="alert error_text">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>