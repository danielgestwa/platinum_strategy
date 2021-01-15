<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Report') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-12">
                <div class="py-4">
                    <a href="{{ route('createCategory') }}" class="btn btn-add">Create new Category</a>
                </div>
                <div class="wait text-center">
                    <p>Loading data, please wait...</p>
                </div>
                <div class="hide">
                    <table id="data_table" class="display">
                        <thead>
                            <tr>
                                <th>Month and Year</th>
                                <th>Category</th>
                                <th>Sum of expanses</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($report as $year_month => $categories)
                                @foreach($categories as $category => $prices)
                                    <tr>
                                        <td>{{ $year_month }}</td>
                                        <td>{{ $category }}</td>
                                        <td>{{ array_sum($prices) }}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <ul>
                @foreach($report as $year_month => $categories)
                    @foreach($categories as $category => $prices)
                        <li>{{ $year_month }} {{ $category }} {{ array_sum($prices) }}</li>
                    @endforeach
                @endforeach
                </ul>
            </div>
        </div>
    </div> --}}
</x-app-layout>
