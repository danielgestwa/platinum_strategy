<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Categories list
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-12">
                <div class="py-4">
                    <a href="{{ route('createCategory') }}" class="btn btn-size btn-info">Create new Category</a>
                </div>
                <div class="wait text-center">
                    <p>Loading data, please wait...</p>
                </div>
                <div class="hide">
                    <table id="data_table" class="display">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <a href=" {{ route('editCategory', ['category' => $category->id]) }} " class="btn btn-size btn-edit btn-small" role="button">
                                        <img src=" {{ asset('images/svg/edit-solid.svg') }} " class="btn-image">
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