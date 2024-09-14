<?php

use Livewire\Volt\Component;
use Livewire\Attributes\On;
use App\Models\Category;

new class extends Component {

    public $categories = null;

    public $isVisible = null;
    public $creating = null;
    public $viewing = null;

    public function mount(): void
    {
        $this->categories = Category::where('created_by', auth()->user()->name)->latest()->get();

        $this->getCategories();
    }

    #[On('category-created')]
    public function getCategories()
    {
        $this->categories = Category::where('created_by', auth()->user()->name)->latest()->get();
    }

    public function createCategories() {
        $this->creating = true;
    }

    public function viewCategories()
    {
        $this->viewing = true;
    }

    #[On('close-form-create')]
    public function closeFormCreateCategory() {
        $this->creating = false;
    }

    #[On('close-categories-table')]
    public function closeTableCategories()
    {
        $this->viewing = false;
    }

}; ?>

<div>
    <div class="p-2">
        @if ($creating == true)
            <livewire:categories.create />
        @elseif ($viewing == true)
            <livewire:categories.table />
        @else
            <form class="max-w-sm mx-auto">
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900">
                    Select Category
                </label>
                <div class="flex">
                    <select
                        id="category"
                        wire:model='category'
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-200 focus:border-gray-200 block w-full p-2.5"
                        >
                        @forelse ($categories as $category)
                            <option value="{{ $category->id }}"> {{ $category->name }} </option>
                        @empty
                            <option selected>
                                <span class="text-sm text-yellow-800 rounded-lg bg-yellow-50">
                                    Empty Categories, Create First.
                                </span>
                            </option>
                        @endforelse
                </select>
                @if (count($categories) > 0)
                    <button
                        wire:click="viewCategories"
                        type="button"
                        class="px-2 py-2 text-xs font-medium text-center text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="gray" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </button>
                @endif
                @if (count($categories) <= 4)
                    <button wire:click="createCategories" type="button" class="px-2 py-2 text-xs font-medium text-center text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="blue" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </button>
                @endif
                </div>
            </form>
        @endif
    

        {{-- @if ($viewCategories)
            <livewire:categories.table />
        @endif --}}
    </div>
</div>
