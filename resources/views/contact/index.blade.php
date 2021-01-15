<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Contact
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-12">
                
                @if(!empty($successMsg))
                    <div class="p-10 font-bold"> {{ $successMsg }}</div>
                @endif

                <div class="mt-5 md:mt-0 md:col-span-2">

                    <form action="{{ route('sendEmail') }}" method="POST">
                        @method('POST')
                        @csrf
                        
                        <div class="shadow overflow-hidden md:rounded-md">
                            <div class="px-4 py-5 bg-white md:p-6">

                                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                    If you have any questions or you found a bug, use below form to contact us!
                                </h2>

                                <div class="grid grid-cols-6 lg:grid-cols-12 my-6">
                                    <div class="row col-span-6 lg:col-span-6">
                                        <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                                        <textarea 
                                            id="message" 
                                            name="message" 
                                            rows="6"
                                            placeholder="Hi!"
                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                                        
                                        @error('message')
                                            <div class="alert error_text">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>