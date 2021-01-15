<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create/Update expense
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-12">

                @if (isset($productValue->id))
                <div class="overflow-auto py-4">
                    <a id="show_{{ $productValue->id }}" class="btn btn-delete btn-small show_delete_button float-right" role="button">
                        <img src=" {{ asset('images/svg/put-trash-solid.svg') }} " class="btn-image">
                    </a>
                    <form id="delete_{{ $productValue->id }}" class="btn btn-delete btn-small float-right delete_table_row" action="{{ route('deleteProduct', ['product' => $productValue->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="reset-full-width">
                            <img src=" {{ asset('images/svg/trash-solid.svg') }} " class="btn-image">
                        </button>
                    </form>
                </div>
                @endif
                
                <div class="mt-5 md:mt-0 md:col-span-5">

                    @if (isset($productValue->id))
                        <form action="{{ route('updateProduct', ['product' => $productValue->id]) }}" method="POST">
                        @method('PUT')
                    @else
                        <form action="{{ route('storeProduct') }}" method="POST">
                        @method('POST')
                    @endif

                        @csrf
                        <div class="shadow overflow-hidden md:rounded-md">
                            <div class="px-4 py-5 bg-white md:p-6">
                                <div class="grid grid-cols-6 md:grid-cols-10 lg:grid-cols-12 gap-6">

                                    <div class="col-span-6 md:col-span-5 lg:col-span-4">
                                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                        <input 
                                            type="text" id="name" 
                                            value="{{ $productValue->name ?? '' }}" 
                                            name="name" 
                                            placeholder="e.g. Breakfast at Kevin's bar"
                                            class="@error('name') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                        
                                        @error('name')
                                            <div class="alert error_text">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 md:col-span-5 lg:col-span-4">
                                        <label for="category" class="block text-sm font-medium text-gray-700">Category</label>

                                        <select 
                                            id="category_id" 
                                            name="category_id" 
                                            autocomplete="category_id" 
                                            class="@error('category_id') is-invalid @enderror mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            @foreach ($categories as $category)
                                                <option 
                                                    value="{{ $category->id }}"
                                                    @if(isset($productValue->category_id) && $productValue->category_id === $category->id)
                                                        {{ 'selected' }}
                                                    @endif > 
                                                    {{ $category->name }} 
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="col-span-6 md:col-span-5 lg:col-span-4">
                                        <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                                        <input 
                                            type="number" id="price" 
                                            value="{{ $productValue->price ?? '' }}" 
                                            name="price" 
                                            step="any"
                                            placeholder="e.g. 2.99"
                                            class="@error('price') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                        
                                        @error('price')
                                            <div class="alert error_text">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 md:col-span-5 lg:col-span-4">
                                        <label for="bought_at" class="block text-sm font-medium text-gray-700">Bought At</label>
                                        <input 
                                            type="text" id="bought_at" 
                                            value="{{ $productValue->bought_at ?? date('Y-m-d') }}" 
                                            name="bought_at" 
                                            placeholder="e.g. 10"
                                            class="@error('bought_at') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                        
                                        @error('bought_at')
                                            <div class="alert error_text">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 md:col-span-5 lg:col-span-4">
                                        <label for="comment" class="block text-sm font-medium text-gray-700">Comment</label>
                                        <input 
                                            type="text" id="comment" 
                                            value="{{ $productValue->comment ?? '' }}" 
                                            name="comment" 
                                            placeholder="e.g. Sandwich with bacon and smoked ham"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
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