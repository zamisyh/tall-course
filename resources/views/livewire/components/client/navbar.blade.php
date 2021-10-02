<div>
    <div class="shadow-lg navbar bg-neutral text-neutral-content">
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
        <div class="flex-none">
            <button class="btn btn-square btn-ghost">
              <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                  <path fill="currentColor" d="M16,6V4H8V6M7,18A2,2 0 0,0 5,20A2,2 0 0,0 7,22A2,2 0 0,0 9,20A2,2 0 0,0 7,18M17,18A2,2 0 0,0 15,20A2,2 0 0,0 17,22A2,2 0 0,0 19,20A2,2 0 0,0 17,18M7.17,14.75L7.2,14.63L8.1,13H15.55C16.3,13 16.96,12.59 17.3,11.97L21.16,4.96L19.42,4H19.41L18.31,6L15.55,11H8.53L8.4,10.73L6.16,6L5.21,4L4.27,2H1V4H3L6.6,11.59L5.25,14.04C5.09,14.32 5,14.65 5,15A2,2 0 0,0 7,17H19V15H7.42C7.29,15 7.17,14.89 7.17,14.75Z" />
              </svg>
              <span>1+</span>
            </button>
        </div>
       <div x-data="{ search: false }">
            <div class="flex-none">
                <button @click="search = !search" class="btn btn-square btn-ghost">
                    <div class="dropdown dropdown-end">
                        <div tabindex="0">
                            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M7.07,18.28C7.5,17.38 10.12,16.5 12,16.5C13.88,16.5 16.5,17.38 16.93,18.28C15.57,19.36 13.86,20 12,20C10.14,20 8.43,19.36 7.07,18.28M18.36,16.83C16.93,15.09 13.46,14.5 12,14.5C10.54,14.5 7.07,15.09 5.64,16.83C4.62,15.5 4,13.82 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,13.82 19.38,15.5 18.36,16.83M12,6C10.06,6 8.5,7.56 8.5,9.5C8.5,11.44 10.06,13 12,13C13.94,13 15.5,11.44 15.5,9.5C15.5,7.56 13.94,6 12,6M12,11A1.5,1.5 0 0,1 10.5,9.5A1.5,1.5 0 0,1 12,8A1.5,1.5 0 0,1 13.5,9.5A1.5,1.5 0 0,1 12,11Z" />
                            </svg>
                        </div>
                        <ul x-show="search" tabindex="0" class="p-2 mt-10 text-black shadow-lg menu dropdown-content bg-base-100 rounded-box w-52">
                            <li>
                                <a href="{{ route('client.auth.signin') }}">Sign In</a>
                            </li>
                            <li>
                                <a href="{{ route('client.auth.signup') }}">Sign Up</a>
                            </li>

                        </ul>
                      </div>
                    </div>
                </button>
            </div>




            <div x-data="{ dropdown: false }" class="flex-none md:hidden">
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
                </button>
            </div>
    </div>
</div>


