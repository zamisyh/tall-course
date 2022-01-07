<div>

        <div class="h-screen">
            <div style="margin-top: -10%" class="flex flex-wrap items-start justify-start mx-10 transition duration-75 ease-in-out justify-items-start">
                @foreach ($data_series as $item)
                    <div class="m-2 my-2 rounded shadow-lg md:max-w-sm sm:max-w-lg">
                        <img class="w-full" src="{{ asset('storage/images/course/thumbnail/' . $item->image) }}" alt="Sunset in the mountains">
                        <div class="px-6 py-4">
                        <div class="mb-2 text-xl font-bold">
                            <a href="course/series/{{ Str::slug(strtolower($item->title)) }}">{{ $item->title }}</a>
                        </div>
                            <a href="" class="py-1 mr-2 text-blue-500">laravel</a>
                            <a href="" class="py-1 mr-2 text-blue-500 ">livewire</a>
                            <a href="" class="py-1 mr-2 text-blue-500">tailwind</a>
                            <a href="" class="py-1 mr-2 text-blue-500">alpinejs</a>
                        <p class="mt-5 text-base text-grey-darker">
                            {{ Str::substr($item->description, 0, 150) }} ...
                        </p>
                        </div>
                        <div class="flex justify-between px-6 py-4 text-xs text-gray-500">
                            <div>
                                <span class="font-bold">{{ $item->author->name }}</span>
                            </div>
                            <div>
                                <span class="font-bold">{{ $item->episode->count() }} Lectures</span>
                                <span class="font-bold">-</span>
                                @php
                                    $countSection = DB::table('sections')->where('series_id', $item->id)->distinct()->count();
                                @endphp
                                <span class="font-bold">{{ $countSection }} Section</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

</div>
