<div>
    <div class="devButtons">
        @foreach ($devs as $dev)
        <x-jet-button wire:key="{{ $dev->id }}" class="bg-indigo-500 text-white active:bg-indigo-600 font-bold uppercase text-xs px-4 py-2 rounded-full shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1" 
            type="button" wire:click="selectDev({{ $dev }})" wire:loading.attr="disabled">
            {{ $dev->developer }}
        </x-jet-button>
        @endforeach
    </div>

    <div class="mt-8">
        @livewire('table', ['dev' => $selectedDev])
    </div>
</div>
