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
                @if ($isOpenAddEpisode)
                   <div>
                        @if ($isOpenFormAddSection)

                        @livewire('dashboard.admin-author.author.components.add-section', ['seriesId' => $data_series->id, 'authorId' => $authorId[0]])
                            <div class="mt-3 mb-2">
                                <span wire:click='$set("isOpenFormAddSection", false)' class="text-primary" role="button">Close Form Section</span>
                            </div>
                        @else
                            <div class="shadow-lg card bg-base-200">
                                <div class="card-body" x-data="{ isUploading: false, progress: 0 }"
                                x-on:livewire-upload-start="isUploading = true"
                                x-on:livewire-upload-finish="isUploading = false"
                                x-on:livewire-upload-error="isUploading = false"
                                x-on:livewire-upload-progress="progress = $event.detail.progress">
                                    <h2 class="my-4 font-bold text-1xl card-title">Tambah Episode</h2>
                                    <div class="form-control">
                                        <select wire:model='section' class="w-full select select-bordered @error('section')
                                            select-error
                                        @enderror">
                                            <option value="">Choose Section</option>
                                            @foreach ($data_section as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('section')
                                            <span class="text-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-2 form-control">
                                        <input wire:model='title_description' type="text" class="w-full input input-bordered @error('title_description')
                                            input-error
                                        @enderror" placeholder="Input your title">
                                        @error('title_description')
                                            <span class="text-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-2 form-control">
                                        <input wire:model='link' type="file" class="w-full @error('link')
                                            input-error
                                        @enderror" placeholder="Input your title">
                                        @error('link')
                                            <span class="text-error">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div style="max-width: 19%" x-show='isUploading'>
                                        <progress class="progress progress-success" x-bind:value="progress" max="100"></progress>
                                    </div>

                                    <div class="mt-2">
                                        <button wire:click='saveEpisode' wire:loading.remove class="btn btn-primary">Save</button>
                                        <button wire:loading wire:target='saveEpisode' class="btn btn-primary" disabled>Saving..</button>
                                    </div>

                                    <div class="mt-3 mb-2">
                                        <span wire:click='$set("isOpenFormAddSection", true)' class="text-primary" role="button">Add Section</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="mt-5 shadow-lg card bg-base-200">
                            <div class="card-body">
                                <h2 class="my-4 font-bold text-1xl card-title">Your Episode</h2>
                                <h2 class="font-bold mt-">Detail Series : </h2>
                                Judul : {{ $data_series->title }} <br />
                                Description : {{ $data_series->short_description }}
                                <h2 class="mt-4 mb-4 font-bold">Detail Episode :</h2>

                                @foreach ($data_section as $key => $item)
                                    <div tabindex="0" class="w-full border collapse rounded-box border-base-300 collapse-arrow">
                                        <div class="text-xl font-medium collapse-title">
                                            {{ $item->name }}
                                        </div>
                                        <div class="collapse-content">
                                            <ul>
                                                @foreach ($data_series->episode as $d)
                                                    <li>
                                                        {{-- <video width="300" height="150">
                                                            <source src="{{ asset('storage/vidio/course/' . $d->link) }}" type="video/mp4" />
                                                        </video> --}}

                                                        @if ($item->id == $d->section)

                                                            <a href="/course/vidio/{{ $data_series->id }}/{{ $d->title_slug }}" class="text-info">{{ $d->description }}</a>

                                                        @endif

                                                    </li>
                                                @endforeach
                                            </ul>

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                   </div>
                @else
                <div class="flex flex-wrap justify-between">
                    <div>
                       <div class="flex">
                        <input wire:model='search' type="text" class="mb-4 input input-bordered" placeholder="Searching..">
                        <div wire:loading wire:target='search' class="w-12 h-12 ml-5 border-t-2 border-purple-500 rounded-full border-b-2g animate-spin"></div>

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
                        <label x-on:click='$wire.clearForm' for="my-modal-2" class="mb-4 btn btn-primary modal-button">Create Series</label>
                        <input type="checkbox" id="my-modal-2" class="modal-toggle">
                        <div class="overflow-x-scroll modal">
                            <div class="modal-box">
                                <div class="title-modal">
                                    <h2 class="mb-5 text-2xl font-bold">Create New Series</h2>
                                </div>
                                @if (!$isOpenDetailForm)
                                    <div class="form-control">
                                        <label class="mb-1 text-md">Judul</label>
                                        <input wire:model='title' type="text" class="w-full input input-bordered @error('title')
                                                input-error
                                        @enderror" placeholder="Input your name">
                                        @error('title')
                                            <span class="text-red-700">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-2 form-control">
                                        <label class="mb-1 text-md">Persyaratan</label>
                                        <textarea rows="1" cols="1" wire:model='requirements' class="w-full textarea textarea-bordered @error('requirements')
                                                textarea-error
                                        @enderror" placeholder="Input your requirements"></textarea>
                                        @error('requirements')
                                            <span class="text-red-700">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-2 form-control">
                                        <label class="mb-1 text-md">Untuk Siapa Kursus Ini ?</label>
                                        <textarea rows="1" cols="1" wire:model='course_for' class="w-full textarea textarea-bordered @error('course_for')
                                                textarea-error
                                        @enderror" placeholder="Input your course for"></textarea>
                                        @error('course_for')
                                            <span class="text-red-700">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-2 form-control">
                                        <label class="mb-1 text-md">Bahasa Yang Digunakan</label>
                                        <select wire:model='language' class="w-full select select-bordered @error('language')
                                                select-error
                                        @enderror">
                                            <option value="">Choose</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="Inggris">Inggris</option>
                                            <option value="Rusia">Rusia</option>
                                            <option value="China">China</option>
                                            <option value="India">India</option>
                                            <option value="Japan">Japan</option>
                                        </select>
                                        @error('language')
                                            <span class="text-red-700">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-3 mb-2">
                                        <span wire:click='$set("isOpenDetailForm", true)' class="text-primary" role="button">Show More</span>
                                    </div>
                                @else
                                    <div class="mt-2 form-control">
                                        <label class="mb-1 text-md">Deskripsi Singkat</label>
                                        <textarea rows="2" cols="2" wire:model='short_description' class="w-full textarea textarea-bordered @error('short_description')
                                                textarea-error
                                        @enderror" placeholder="Input your short description"></textarea>
                                        @error('short_description')
                                            <span class="text-red-700">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-2 form-control">
                                        <label class="mb-1 text-md">Deskripsi</label>
                                        <textarea rows="5" cols="5" wire:model='description' class="w-full textarea textarea-bordered @error('description')
                                                textarea-error
                                        @enderror" placeholder="Input your description"></textarea>
                                        @error('description')
                                            <span class="text-red-700">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-2 form-control">
                                        <label class="mb-1 text-md">Gambar</label>
                                        <input wire:model='image' type="file" class="w-full @error('image')
                                                input-error
                                        @enderror" placeholder="Input your description">
                                        @error('image')
                                            <span class="text-red-700">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-3 mb-2">
                                        <span wire:click='$set("isOpenDetailForm", false)' class="text-primary" role="button">Close</span>
                                    </div>
                                @endif
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
                                  <th>Image</th>
                                  <th>Title</th>
                                  <th>Description</th>
                                  <th>Created At</th>
                                  <th>Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                                @forelse ($data['course'] as $key => $item)
                                    <tr>
                                        <td>{{ $data['course']->firstItem() + $key }}</td>
                                        <td><img src="{{ asset('storage/images/course/thumbnail/' . $item->image) }}" alt="image"></td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{Str::substr( $item->description, 0, 55) }} ...</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td class="flex">
                                            <span class="btn btn-primary btn-sm" wire:click='editEpisode({{ $item->id }})'>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                                </svg>
                                            </span>
                                            <label x-on:click="$wire.close" wire:click='editSeries({{ $item->id }})' for="editSeries({{ $item->id }})" class="ml-1 btn btn-info btn-sm modal-button">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                  </svg>
                                            </label>
                                            <input type="checkbox" id="editSeries({{ $item->id }})" class="modal-toggle">
                                            <div class="modal  {{ $closeModal ? 'hidden' : '' }}">
                                                <div class="modal-box">
                                                    <div class="title-modal">
                                                        <h2 class="mb-5 text-2xl font-bold">Edit Series </h2>
                                                    </div>
                                                    @if (!$isOpenDetailForm)
                                                        <div class="form-control">
                                                            <label class="mb-1 text-md">Judul</label>
                                                            <input wire:model='title' type="text" class="w-full input input-bordered @error('title')
                                                                    input-error
                                                            @enderror" placeholder="Input your name">
                                                            @error('title')
                                                                <span class="text-red-700">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="mt-2 form-control">
                                                            <label class="mb-1 text-md">Persyaratan</label>
                                                            <textarea rows="1" cols="1" wire:model='requirements' class="w-full textarea textarea-bordered @error('requirements')
                                                                    textarea-error
                                                            @enderror" placeholder="Input your requirements"></textarea>
                                                            @error('requirements')
                                                                <span class="text-red-700">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="mt-2 form-control">
                                                            <label class="mb-1 text-md">Untuk Siapa Kursus Ini ?</label>
                                                            <textarea rows="1" cols="1" wire:model='course_for' class="w-full textarea textarea-bordered @error('course_for')
                                                                    textarea-error
                                                            @enderror" placeholder="Input your course for"></textarea>
                                                            @error('course_for')
                                                                <span class="text-red-700">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="mt-2 form-control">
                                                            <label class="mb-1 text-md">Bahasa Yang Digunakan</label>
                                                            <select wire:model='language' class="w-full select select-bordered @error('language')
                                                                    select-error
                                                            @enderror">
                                                                <option value="">Choose</option>
                                                                <option value="Indonesia">Indonesia</option>
                                                                <option value="Inggris">Inggris</option>
                                                                <option value="Rusia">Rusia</option>
                                                                <option value="China">China</option>
                                                                <option value="India">India</option>
                                                                <option value="Japan">Japan</option>
                                                            </select>
                                                            @error('language')
                                                                <span class="text-red-700">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="mt-3 mb-2">
                                                            <span wire:click='$set("isOpenDetailForm", true)' class="text-primary" role="button">Show More</span>
                                                        </div>
                                                    @else
                                                        <div class="mt-2 form-control">
                                                            <label class="mb-1 text-md">Deskripsi Singkat</label>
                                                            <textarea rows="2" cols="2" wire:model='short_description' class="w-full textarea textarea-bordered @error('short_description')
                                                                    textarea-error
                                                            @enderror" placeholder="Input your short description"></textarea>
                                                            @error('short_description')
                                                                <span class="text-red-700">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="mt-2 form-control">
                                                            <label class="mb-1 text-md">Deskripsi</label>
                                                            <textarea rows="5" cols="5" wire:model='description' class="w-full textarea textarea-bordered @error('description')
                                                                    textarea-error
                                                            @enderror" placeholder="Input your description"></textarea>
                                                            @error('description')
                                                                <span class="text-red-700">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="mt-3 form-control">
                                                            <label class="mb-1 text-md">Gambar</label>
                                                            <input wire:model='img' type="file" class="w-full @error('img')
                                                                    input-error
                                                            @enderror" placeholder="Input your img">
                                                            @error('img')
                                                                <span class="text-red-700">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        <div class="mt-2 form-control">
                                                            <img height="100px" width="100px" src="{{ asset('storage/images/course/thumbnail/' . $image) }}" alt="">
                                                        </div>
                                                    @endif


                                                    <div class="modal-action">
                                                        <label wire:click='updateSeries({{ $item->id }})' class="btn btn-primary">Accept</label>
                                                        <label wire:click='$set("isOpenDetailForm", false)' for="editSeries({{ $item->id }})" class="btn">Close</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <span wire:click='removeSeries({{ $item->id }})' class="ml-1 btn btn-error btn-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </span>
                                        </td>
                                    </tr>

                                    @empty
                                    <td>Data not found</td>
                                @endforelse
                              </tbody>
                            </table>
                          </div>
                    </div>

                    <div class="mt-5">
                        {{ $data['course']->links() }}
                    </div>
                    <div class="justify-center mt-5">

                    </div>
                @endif
           </div>

           <!-- End -->

       </div>

    </div>
</div>
