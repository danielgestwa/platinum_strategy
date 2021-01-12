<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Products list
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-12">
                <div class="py-4">
                    <a href="{{ route('createProduct') }}" class="btn btn-add">Create new product</a>
                </div>
                <div class="wait text-center">
                    <p>Loading data, please wait...</p>
                </div>
                <div class="hide">
                    <table id="data_table" class="display barcode">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Price</th>
                                <th>Comment</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->type }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->comment }}</td>
                                <td>{{ $product->created_at }}</td>
                                <td>
                                    <a href=" {{ route('editProduct', ['product' => $product->id]) }} " role="button">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>