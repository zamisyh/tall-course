<div>

    @section('title')
        Coursemy - Sign Up Page
    @endsection
    @livewire('components.client.navbar')


    <div class="px-4 py-4 mx-auto mt-20 bg-white rounded-lg shadow-lg w-80 lg:w-1/3">
        <h1 class="mb-10 text-3xl">Coursemy Sign Up Page</h1>
        <div class="form-control">
            <input wire:model='name' type="text" class="w-full input input-bordered @error('name')
                input-error
            @enderror" placeholder="Input your name">
            @error('name')
                <span class="text-red-700">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-control">
            <input wire:model='email' type="email" class="w-full mt-4 input input-bordered @error('email')
                input-error
            @enderror" placeholder="Input your email">
            @error('email')
                <span class="text-red-700">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-control">
            <input wire:model='password' type="password" class="w-full mt-4 input input-bordered @error('password')
                input-error
            @enderror" placeholder="Input your password">
            @error('password')
                <span class="text-red-700">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-control">
            <input wire:model='confirm_password' type="password" class="w-full mt-4 input input-bordered @error('confirm_password')
                input-error
            @enderror" placeholder="Input your password again..">
            @error('confirm_password')
                <span class="text-red-700">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-control">
            <button wire:click='store' wire:loading.remove class="mt-4 btn btn-block">Sign Up</button>
            <button wire:loading wire:target='store' class="mt-4 btn btn-block loading" disabled>Sign Up</button>
        </div>
        <div class="flex items-center mt-5 text-blue-400 form-control">
            <a href="{{ route('client.auth.signin') }}">Already have any Account?</a>
        </div>
    </div>
</div>
