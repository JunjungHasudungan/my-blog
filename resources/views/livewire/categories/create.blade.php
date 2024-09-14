<?php

use Livewire\Attributes\Validate;
use App\Models\Category;
use Livewire\Volt\Component;
use Livewire\Attributes\On;

new class extends Component {

    public $isVisible = false;

    #[Validate('required|string|min:5|max:15|unique:categories,name')]
    public $name;

    public function showCreateField()
    {
        $this->isVisible = true;
    }

    public function closeForm()
    {
        if (!empty($this->name)) {
            $this->js("alert('yakin untuk menutup form?')");
        } else {
            $this->dispatch('close-form-create');
        }
    }

    public function store()
    {
        $validated = $this->validate();

        Category::create([
            'name'      => $validated['name'],
            'created_by'    => auth()->user()->name
        ]);

        $this->dispatch('close-form-create');

        $this->dispatch('category-created');

        $this->name = '';



    }

}; ?>

<div>
    <form
        wire:submit.prevent="store"
        class="max-w-sm mx-auto">
        <div class="mb-5">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Kategori</label>
            <input
                type="text"
                id="text"
                wire:model.debounce.0ms="name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
            />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <button
            wire:click="store"
            type="button"
            class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
            <div class="flex">
                Submit
            </div>
        </button>
        <button
            wire:click="closeForm()"
            type="button"
            class="px-3 py-2 text-xs font-medium text-center text-white bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
            Cancel
        </button>
    </form>
</div>
