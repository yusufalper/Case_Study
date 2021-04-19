<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Enuygun Case Study') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="mt-8 text-2xl">
                        {{ $homeText ?? $homeText }}
                    </div>
                
                    <div class="mt-6 text-gray-500">
                        @if ($added)
                        <br>To add a new Provider -> "php artisan getdata --addProvider=[provider url]"<br>
                        Data type and keys must be => <br><br>
                        [  
                            {  
                            'difficulty': 3, 
                            'time': 6, 
                            'task': 'IT Task 0'  
                            }, 
                            {  
                                'difficulty': 3, 
                                'time': 6, 
                                'task': 'IT Task 0'  
                            }, 
                            {etc..}  
                        ]
                        @endif
                    </div>

                    <div class="mt-6">
                        <a class="bg-indigo-500 text-white active:bg-indigo-600 font-bold uppercase text-xl px-4 py-2 rounded-full shadow hover:shadow-md outline-none focus:outline-none mr-2 mb-2" 
                            type="button" href="{{ route('devTasks') }}">
                            See Calculated Plans
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
