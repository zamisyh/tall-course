<div class="shadow-lg card bg-base-100">
    <div class="card-body">
        <h2 class="my-4 font-bold text-1xl card-title">Tambah Section</h2>
        <input type="text" wire:model='form_add_new_section' placeholder="Add new section" class="input input-bordered @error('')
            input-error
        @enderror">
        @error('form_add_new_section')
            <span class="text-error">{{ $message }}</span>
        @enderror

        <div class="mt-2 mb-2">
            <button wire:click='saveSection' wire:loading.remove class="btn btn-primary">Save</button>
            <button wire:loading wire:target='saveSection' class="btn btn-primary" disabled>Saving..</button>
        </div>
    </div>
</div>
