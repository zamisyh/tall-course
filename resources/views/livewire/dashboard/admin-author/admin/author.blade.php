<div>

    @section('title')
        Dashboard | {{ ucwords(Auth::user()->getRoleNames()[0]) }} - Author & Admin Page
    @endsection

    <div class="drawer-content" x-data="{ drawer: false }">

        @livewire('dashboard.components.navbar')
        @include('livewire.dashboard.components.drawer')


       <div class="px-5 mt-10" :class="{ 'lg:ml-80 lg:p-5 md:ml-80 md:p-5': drawer }">
            <div class="flex flex-wrap justify-between">
                <div>
                    <h1 class="text-4xl font-bold">Page Author & Admin</h1>
                    <h3 class="mt-3 text-xl font-thin">This is page for manajement users</h3>
                </div>
                <div class="text-sm breadcrumbs">
                    <ul>
                      <li>
                        <a>Home</a>
                      </li>
                      <li>
                        <a>{{ ucwords(Auth::user()->getRoleNames()[0]) }}</a>
                      </li>
                      <li>Author</li>
                    </ul>
                  </div>
            </div>

           <div class="mt-10 mb-5">

            <div class="flex flex-wrap justify-between">
                <div>
                   <div class="flex">
                    <input wire:model='search' type="text" class="mb-4 input input-bordered" placeholder="Searching..">
                    <div wire:loading wire:target='search' class="w-12 h-12 ml-5 border-t-2 border-b-2 border-purple-500 rounded-full animate-spin"></div>

                </div>

                    <select wire:model='rows' class="mb-2 select select-bordered">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                        <option value="25">25</option>



                    </select>
                </div>
                <div>
                    <label for="my-modal-2" class="mb-4 btn btn-primary modal-button">Create Users</label>
                    <input type="checkbox" id="my-modal-2" class="modal-toggle">
                    <div class="modal">
                        <div class="modal-box">
                            <div class="title-modal">
                                <h2 class="mb-5 text-2xl font-bold">Create User</h2>
                            </div>
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
                                <label class="mt-1 mb-1 text-md">Email</label>
                                <input wire:model='email' type="email" class="w-full input input-bordered @error('email')
                                    input-error
                                @enderror" placeholder="Input your email">
                                @error('email')
                                    <span class="text-red-700">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-control">
                                <label class="mt-1 mb-1 text-md">Role</label>
                                <select wire:model='role' class="w-full select select-bordered @error('role')
                                    select-error
                                @enderror">
                                    @foreach ($data['getRole'] as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <span class="text-red-700">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-control">
                                <label class="mt-1 mb-1 text-md">Password</label>
                                <input wire:model='password' type="password" class="w-full input input-bordered @error('password')
                                    input-error
                                @enderror" placeholder="Input your password">
                                @error('password')
                                    <span class="text-red-700">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-control">
                                <label class="mt-1 mb-1 text-md">Confirm Password</label>
                                <input wire:model='confirm_password' type="password" class="w-full input input-bordered @error('confirm_password')
                                    input-error
                                @enderror" placeholder="Input your confirm password">
                                @error('confirm_password')
                                    <span class="text-red-700">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="modal-action">
                                <label wire:loading.remove wire:click='saveAuthor' class="btn btn-primary">Save</label>
                                <label wire:loading wire:target='saveAuthor' class="btn btn-primary" disabled>Saving..</label>

                                <label for="my-modal-2" class="btn">Close</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <div class="container h-auto shadow-xl">
                    <div class="mt-3 overflow-x-auto">
                        <table class="table w-full rounded-lg table-zebra">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Role</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            @forelse ($data['dataUser'] as $key => $user)
                                <tr>
                                    <td>{{ $data['dataUser']->firstItem() + $key }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->getRoleNames()[0] }}</td>
                                    <td>
                                        {{-- <button class="btn btn-info btn-sm">
                                            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                                <path fill="currentColor" d="M4 6H2V20C2 21.11 2.9 22 4 22H18V20H4V6M18.7 7.35L17.7 8.35L15.65 6.3L16.65 5.3C16.86 5.08 17.21 5.08 17.42 5.3L18.7 6.58C18.92 6.79 18.92 7.14 18.7 7.35M9 12.94L15.06 6.88L17.12 8.94L11.06 15H9V12.94M20 4L20 4L20 16L8 16L8 4H20M20 2H8C6.9 2 6 2.9 6 4V16C6 17.1 6.9 18 8 18H20C21.1 18 22 17.1 22 16V4C22 2.9 21.1 2 20 2Z" />
                                            </svg>
                                        </button> --}}
                                        <label wire:click='edit({{ $user->id }})' for="edit({{ $user->id }})" class="btn btn-info btn-sm modal-button">
                                            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                                <path fill="currentColor" d="M4 6H2V20C2 21.11 2.9 22 4 22H18V20H4V6M18.7 7.35L17.7 8.35L15.65 6.3L16.65 5.3C16.86 5.08 17.21 5.08 17.42 5.3L18.7 6.58C18.92 6.79 18.92 7.14 18.7 7.35M9 12.94L15.06 6.88L17.12 8.94L11.06 15H9V12.94M20 4L20 4L20 16L8 16L8 4H20M20 2H8C6.9 2 6 2.9 6 4V16C6 17.1 6.9 18 8 18H20C21.1 18 22 17.1 22 16V4C22 2.9 21.1 2 20 2Z" />
                                            </svg>
                                        </label>
                                        <input type="checkbox" id="edit({{ $user->id }})" class="modal-toggle">
                                        <div class="modal">
                                            <div class="modal-box">
                                                <div class="title-modal">
                                                    <h2 class="mb-5 text-2xl font-bold">Edit User </h2>
                                                </div>
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
                                                    <label class="mt-1 mb-1 text-md">Email</label>
                                                    <input wire:model='email' type="email" class="w-full input input-bordered @error('email')
                                                        input-error
                                                    @enderror" placeholder="Input your email">
                                                    @error('email')
                                                        <span class="text-red-700">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-control">
                                                    <label class="mt-1 mb-1 text-md">Role</label>
                                                    <select wire:model='role' class="w-full select select-bordered @error('role')
                                                        select-error
                                                    @enderror">
                                                        @foreach ($data['getRole'] as $role)
                                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('role')
                                                        <span class="text-red-700">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="modal-action">
                                                    <label wire:click='update({{ $user->id }})' class="btn btn-primary">Accept</label>
                                                    <label for="edit({{ $user->id }})" class="btn">Close</label>
                                                </div>
                                            </div>
                                        </div>
                                        <button wire:click='delete({{ $user->id }})' class="btn btn-error btn-sm">
                                            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                                <path fill="currentColor" d="M9,3V4H4V6H5V19A2,2 0 0,0 7,21H17A2,2 0 0,0 19,19V6H20V4H15V3H9M7,6H17V19H7V6M9,8V17H11V8H9M13,8V17H15V8H13Z" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td>No Data Found</td>
                                </tr>
                            @endforelse
                          </tbody>
                        </table>
                      </div>
                </div>
                <div class="justify-center mt-5">
                    {{ $data['dataUser']->links() }}
                </div>
           </div>

       </div>

    </div>
</div>
