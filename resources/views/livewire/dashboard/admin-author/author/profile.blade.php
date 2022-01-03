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
                    <h1 class="text-4xl font-bold">Profile</h1>
                    <h3 class="mt-3 text-xl font-thin">This is page for manajement your Profile</h3>
                </div>
                <div class="text-sm breadcrumbs">
                    <ul>
                      <li>
                        <a>Home</a>
                      </li>
                      <li>
                        <a>{{ ucwords(Auth::user()->getRoleNames()[0]) }}</a>
                      </li>
                      <li>Profile</li>
                    </ul>
                  </div>
            </div>

           <div class="mt-10 mb-5">
                <div class="form-control">
                    <label class="mb-1 text-md">Name</label>
                    <input wire:model='name' type="text" class="w-full input input-bordered @error('name')
                            input-error
                    @enderror" placeholder="Input your name">
                    @error('name')
                        <span class="text-red-700">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-control">
                    <label class="mb-1 text-md">About Me</label>
                    <textarea wire:model='about' rows="3" class="w-full textarea textarea-bordered @error('about')
                            input-error
                    @enderror"></textarea>
                    @error('about')
                        <span class="text-red-700">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-control">
                    <label class="mb-1 text-md">Work at / Experience</label>
                    <textarea wire:model='work' rows="3" class="w-full textarea textarea-bordered @error('work')
                            input-error
                    @enderror"></textarea>
                    @error('work')
                        <span class="text-red-700">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-control">
                    <label class="mb-1 text-md">Image</label>
                    <input wire:model='img' type="file" class="w-full @error('img')
                            input-error
                    @enderror" placeholder="Input your name">
                    @error('img')
                        <span class="text-red-700">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-3 mb-2">
                    @if (is_null($image))
                        <img style="width: 100px; height:100px;" src="{{ asset('500.jpeg') }}" alt="image">
                    @else
                        <img style="width: 100px; height:100px;" src="{{ asset('storage/images/author/profile/' . $image) }}" alt="image">
                    @endif
                </div>

                <div class="mt-5 mb-3">
                    <button wire:loading.remove wire:click='updateProfile' class="btn btn-primary">Update</button>
                    <button wire:loading wire:target='updateProfile' class="btn btn-primary" disabled>Updating...</button>
                </div>
           </div>
       </div>

    </div>
</div>
