<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                My Notes
            </h2>
            <div class="container">
                <a href="{{ route('note.create') }}" class="inline-block bg-white text-black py-2 px-4 rounded-full border border-black float-right">CREATE</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-4 h-full w-full">
            
                @foreach ($notes as $note)
                    <div class="bg-gray-800 text-white p-6 rounded-lg shadow-md p-4 overflow-auto" style="min-height: 50vh; max-height: 50vh;">
                        <div class="grid grid-cols-12">
                            <div class="col-span-10 text-ellipsis">
                                <h2 class="text-xl font-semibold mb-2">{{ $note['title'] }}</h2>
                            </div>
                            <div class="col-span-1">
                                <a href="{{ route('note.delete', ['note' => $note->id ]) }}"><i class="fas fa-trash"></i></a>
                            </div>
                            <div class="col-span-1">
                                <a href="{{ route('note.edit', ['id' => $note->id]) }}"><i class="fas fa-pen-to-square"></i></a>
                            </div>
                        </div>
                        <h6>{{ $note['created_at'] }}</h6>
                        <p class="mt-2">{{ $note['note'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>        
    </div>
</x-app-layout>
