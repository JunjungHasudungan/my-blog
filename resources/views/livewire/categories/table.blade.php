<?php

use Livewire\Volt\Component;
use Livewire\Attributes\On;
use App\Models\Category;

new class extends Component {
    public $categories = null;
    public $isVisible = null;

    public function mount(): void
    {
        $this->categories = Category::where('created_by', auth()->user()->name)->latest()->get();

        $this->getCategories();
    }

    public function showTableCategories()
    {
        $this->isVisible = true;
    }

    public function getCategories()
    {
        $this->categories = Category::where('created_by', auth()->user()->name)->latest()->get();
    }

    public function closeTable()
    {
        $this->isVisible = false;

        $this->dispatch('close-categories-table');
    }

    public function deleteCategory(Category $category): void
    {
        $category->delete();

        $this->dispatch('close-categories-table');

    }

}; ?>

<div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <button
                data-tooltip-target="tooltip-top"
                data-tooltip-placement="top"
                wire:click='closeTable'
                type="button">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </button>
            <div id="tooltip-top" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
            Kembali
            <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr class="bg-white border-b">
                    <td class="px-6 py-1">
                        {{ $category->name }}
                    </td>
                    <td class="px-6 py-1 text-right">
                        <button
                            wire:click="deleteCategory({{ $category->id }})"
                            wire:confirm="Are you sure to delete {{$category->name}}?"
                            type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
