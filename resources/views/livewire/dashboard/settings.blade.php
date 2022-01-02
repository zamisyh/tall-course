<div>

    @section('title')
        Dashboard | {{ ucwords(Auth::user()->getRoleNames()[0]) }} - Course
    @endsection

    <div class="drawer-content" x-data="{ drawer: false }">

        @livewire('dashboard.components.navbar')
        @include('livewire.dashboard.components.drawer')

       <div class="px-5 mt-10" :class="{ 'lg:ml-80 lg:p-5 md:ml-80 md:p-5': drawer }">
            <div class="flex flex-wrap justify-between">
                <div>
                    <h1 class="text-4xl font-bold">Settings</h1>
                    <h3 class="mt-3 text-xl font-thin">This is page for manajement your password</h3>
                </div>
                <div class="text-sm breadcrumbs">
                    <ul>
                      <li>
                        <a>Home</a>
                      </li>
                      <li>
                        <a>{{ ucwords(Auth::user()->getRoleNames()[0]) }}</a>
                      </li>
                      <li>Settings</li>
                    </ul>
                  </div>
            </div>



            <div class="mt-10 mb-5">
                <div class="form-control">
                    <label for="old_password">Old Password</label>
                    <input type="{{ $show_password ? 'text' : 'password' }}"
                        wire:model='old_password'
                        class="input input-bordered @error('old_password')
                            input-error
                        @enderror"
                        placeholder="Input old password">
                    @error('old_password')
                        <span class="text-error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-2 form-control">
                    <label for="new_password">New Password</label>
                    <input type="{{ $show_password ? 'text' : 'password' }}"
                        wire:model='new_password'
                        class="input input-bordered @error('new_password')
                            input-error
                        @enderror"
                        placeholder="Input new password">
                    @error('new_password')
                        <span class="text-error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-2 form-control">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="{{ $show_password ? 'text' : 'password' }}"
                        wire:model='confirm_password'
                        class="input input-bordered @error('confirm_password')
                            input-error
                        @enderror"
                        placeholder="Input confirm password">
                    @error('confirm_password')
                        <span class="text-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-2 mb-3">
                    @if ($show_password)
                        <div class="flex">
                            <span wire:click="$set('show_password', false)">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                  </svg>
                            </span>
                            <span class="ml-1">Close Password</span>
                        </div>
                    @else
                        <div class="flex">
                                <span wire:click="$set('show_password', true)">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </span>
                                <span class="ml-1">Show Password</span>
                        </div>
                    @endif
                </div>


                <div class="mt-2 mb-3">
                    <button
                        wire:click='updatePassword({{ $user_id }})'
                        class="btn btn-primary"
                        wire:loading.remove>
                    Save</button>
                    <button
                        class="btn btn-primary"
                        wire:loading
                        wire:target='updatePassword'
                        disabled>
                    Saving..</button>


                </div>
            </div>

       </div>
    </div>
</div>
