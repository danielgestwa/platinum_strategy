<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-12xl mx-auto py-2 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-12">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Shortcuts') }}
                </h2>
                <div class="py-2 font-bold">
                    <a href="{{ route('createProduct') }}" class="btn btn-large btn-add m-2">Create new Expense</a>
                    <a href="{{ route('createCategory') }}" class="btn btn-large btn-info m-2">Create new Category</a>
                    <a href="{{ route('contact') }}" class="btn btn-large btn-edit m-2">Contact</a>
                </div>
            </div>
        </div>

        @foreach($report as $year_month => $categories)
            <div class="max-w-12xl mx-auto py-2 sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-2">
                    <h2 class="font-bold text-xl text-gray-800 leading-tight px-6 pt-6">
                        {{ $year_month }}
                    </h2>
                    <div class="my-2">
                        <table class="sm:w-full md:text-md md:w-3/5 m-auto">
                            <thead>
                                <tr>
                                    <th>Category name</th>
                                    <th>Expenses sum</th>
                                    <th>Expenses precentage</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach($categories['categories'] as $category => $products)
                                    <tr>
                                        <td>{{ Str::limit($category, 15) }}</td>
                                        <td>{{ number_format($products['price'], 2, '.', '') }}</td>
                                        <td>{{ $products['percentage'] }}%</td>
                                        <td><button id="btn_report_{{ $products['id'] }}" class="show-products text-sm bg-indigo-500 text-white rounded-md px-2 p-1 m-1">More</button></td>
                                    </tr>
                                    <tr>
                                        <td colspan="100%" class="bg-gray-50">
                                            <table id="view_report_{{ $products['id'] }}" class="w-full text-sm italic hidden">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Price</th>
                                                        <th>Comment</th>
                                                        <th></th>
                                                    <tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($products['products'] as $product)
                                                        <tr>
                                                            <td>{{ Str::limit($product->name, 30) }}</td>
                                                            <td>{{ $product->price }}</td>
                                                            <td>{{ Str::limit($product->comment, 30) }}</td>
                                                            <td><a href=" {{ route('editProduct', ['product' => $product->id]) }} " class="text-md btn btn-edit text-white rounded-md px-2 p-1 m-1">Edit</a></td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight px-6 pb-6">
                        Total Expenses: <span class="font-bold underline">{{ number_format($categories['sum'], 2, '.', '') }}</span>
                    </h2>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
