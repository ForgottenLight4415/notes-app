<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            New note
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container mx-auto">
                <div class="bg-gray-800 text-white p-6 rounded-lg shadow-md p-4 overflow-auto">
                    <form method="post" action="{{ route('note.store') }}" class="mt-6 space-y-6">
                        @csrf
                        <div>
                            <x-input-label for="title" value="Title" />
                            <x-text-input id="title" name="title" type="text" class="mt-2 block w-full" required autofocus />
                            {{-- <x-input-error class="mt-2" :messages="$errors->get('name')" /> --}}
                        </div>
                
                        <div>
                            <x-input-label for="note" value="Note" />
                            <textarea id="note" name="note" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full mt-2" rows="8" required></textarea>
                            {{-- <x-input-error class="mt-2" :messages="$errors->get('email')" /> --}}
                        </div>
                
                        <div class="flex items-center gap-4">
                            <x-primary-button>Create</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>        
    </div>

    <div class="py-12">
        <section>
    
            
        </section>
        
    </div>
</x-app-layout>
