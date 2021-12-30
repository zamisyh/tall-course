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
                    <h1 class="text-4xl font-bold">Course Page</h1>
                    <h3 class="mt-3 text-xl font-thin">This is page for manajement your Course</h3>
                </div>
                <div class="text-sm breadcrumbs">
                    <ul>
                      <li>
                        <a>Home</a>
                      </li>
                      <li>
                        <a>{{ ucwords(Auth::user()->getRoleNames()[0]) }}</a>
                      </li>
                      <li>Course</li>
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
                    <label for="my-modal-2" class="mb-4 btn btn-primary modal-button">Create Series</label>
                    <input type="checkbox" id="my-modal-2" class="modal-toggle">
                    <div class="modal">
                        <div class="modal-box">
                            <div class="title-modal">
                                <h2 class="mb-5 text-2xl font-bold">Create New Series</h2>
                            </div>
                            <div class="form-control">
                                <label class="mb-1 text-md">Title</label>
                                <input wire:model='title' type="text" class="w-full input input-bordered @error('title')
                                        input-error
                                @enderror" placeholder="Input your name">
                                @error('title')
                                    <span class="text-red-700">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-control">
                                <label class="mb-1 text-md">Description</label>
                                <textarea rows="5" cols="5" wire:model='description' class="w-full textarea textarea-bordered @error('description')
                                        input-error
                                @enderror" placeholder="Input your name"></textarea>
                                @error('description')
                                    <span class="text-red-700">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-control">
                                <label class="mb-1 text-md">Image</label>
                                <input wire:model='image' type="file" class="w-full @error('image')
                                        input-error
                                @enderror" placeholder="Input your name">
                                @error('image')
                                    <span class="text-red-700">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="modal-action">
                                <label wire:loading.remove wire:click='saveSeries' class="btn btn-primary">Save</label>
                                <label wire:loading wire:target='saveSeries' class="btn btn-primary" disabled>Saving..</label>

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
                              <th>Title</th>
                              <th>Description</th>
                              <th>Image</th>
                              <th>Created At</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            @forelse ($data['course'] as $key => $item)
                                <tr>
                                    <td>{{ $data['course']->firstItem() + $key }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ asset('storage/images/course/thumbnail/' . $item->image) }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td></td>
                                </tr>

                                @empty
                                <td>Data not found</td>
                            @endforelse
                          </tbody>
                        </table>
                      </div>
                </div>
                <div class="justify-center mt-5">

                </div>
           </div>

       </div>

    </div>
</div>
