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
                    <input type="password"
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
                    <input type="password"
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
                    <input type="password"
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
