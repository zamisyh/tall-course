<div>
    <div class="mb-2 shadow-lg navbar bg-neutral text-neutral-content">
        <div class="flex-none px-2 mx-2">
          <span class="text-lg font-bold">
                  Coursemy
           </span>
        </div>
        <div class="flex-1 px-2 mx-2">
          <div class="items-stretch hidden lg:flex">
            <a href="{{ route('client.home') }}" class="btn btn-ghost btn-sm rounded-btn">
                    Home
            </a>
            <a href="{{ route('client.series') }}" class="btn btn-ghost btn-sm rounded-btn">
                    Series
            </a>
            <a href="{{ route('client.topics') }}" class="btn btn-ghost btn-sm rounded-btn">
                    Topics
            </a>
            <a href="{{ route('client.popular') }}" class="btn btn-ghost btn-sm rounded-btn">
                    Popular
            </a>
          </div>
        </div>
       <div x-data="{ search: false }">
            <div
                x-show="search"
                @click.away="search = false"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-90"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-90"

                class="flex-1 lg:flex-none"
            >
                <div class="form-control">
                    <input type="text" placeholder="Search" class="input input-ghost">
                </div>

            </div>
            <div class="flex-none">
                <button @click="search = !search" class="btn btn-square btn-ghost">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
            </div>
            <div :class="{ 'hidden': search }" class="flex-none">
                <button class="btn btn-square btn-ghost">
                  <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                      <path fill="currentColor" d="M16,6V4H8V6M7,18A2,2 0 0,0 5,20A2,2 0 0,0 7,22A2,2 0 0,0 9,20A2,2 0 0,0 7,18M17,18A2,2 0 0,0 15,20A2,2 0 0,0 17,22A2,2 0 0,0 19,20A2,2 0 0,0 17,18M7.17,14.75L7.2,14.63L8.1,13H15.55C16.3,13 16.96,12.59 17.3,11.97L21.16,4.96L19.42,4H19.41L18.31,6L15.55,11H8.53L8.4,10.73L6.16,6L5.21,4L4.27,2H1V4H3L6.6,11.59L5.25,14.04C5.09,14.32 5,14.65 5,15A2,2 0 0,0 7,17H19V15H7.42C7.29,15 7.17,14.89 7.17,14.75Z" />
                  </svg>
                </button>
            </div>

            <div :class="{ 'hidden': search }" x-data="{ dropdown: false }" class="flex-none md:hidden">
                <button class="btn btn-square btn-ghost" @click="dropdown = !dropdown">


                    <svg x-show="dropdown" style="width:24px;height:24px" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" />
                    </svg>
                    <div class="dropdown dropdown-end">
                        <div tabindex="0">
                            <svg x-show="!dropdown" style="width:24px;height:24px" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z" />
                            </svg>
                        </div>
                        <ul tabindex="0" class="p-2 mt-10 text-black shadow-lg menu dropdown-content bg-base-100 rounded-box w-52">
                          <li>
                            <a href="{{ route('client.home') }}">Home</a>
                          </li>
                          <li>
                            <a href="{{ route('client.series') }}">Series</a>
                          </li>
                          <li>
                            <a href="{{ route('client.topics') }}">Topics</a>
                          </li>
                          <li>
                            <a href="{{ route('client.popular') }}">Popular</a>
                          </li>
                        </ul>
                      </div>
                    </div>



                </button>
            </div>
        </div>



      </div>
</div>


