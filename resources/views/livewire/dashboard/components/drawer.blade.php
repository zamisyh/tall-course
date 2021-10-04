{{-- <div class="rounded-lg shadow bg-base-200 drawer h-52">
    <input id="my-drawer" type="checkbox" class="drawer-toggle">
    <div class="flex flex-col items-center justify-center drawer-content">
      <label for="my-drawer" class="btn btn-primary drawer-button">open menu</label>
    </div>
    <div class="drawer-side">
      <label for="my-drawer" class="drawer-overlay"></label>
      <ul class="p-4 overflow-y-auto menu w-80 bg-base-100 text-base-content">
        <li>
          <a>Menu Item</a>
        </li>
        <li>
          <a>Menu Item</a>
        </li>
      </ul>
    </div>
  </div> --}}


  <div style="margin-top: -9px"
    class="fixed max-w-xs shadow-lg h-100 bg-base-200 drawer"
    x-show='drawer'
    x-transition:enter.duration.500ms
    @click.away="drawer = false"
    x-transition:leave.duration.500ms

    >
    <div class="drawer-side">
        <label for="my-drawer" class="drawer-overlay"></label>
        <ul class="p-4 overflow-y-auto menu w-80 bg-base-100 text-base-content">
          <li>
            <a href="{{ route('client.home') }}">
                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M15 13L11 9V12H2V14H11V17M22 12H20V21H4V16H6V19H18V11L12 5L7 10H4L12 2L22 12Z" />
                </svg>
                <span class="ml-3">Home</span>
            </a>
          </li>
          @role('admin')
            <li>
                <a href="">
                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M12,5.5A3.5,3.5 0 0,1 15.5,9A3.5,3.5 0 0,1 12,12.5A3.5,3.5 0 0,1 8.5,9A3.5,3.5 0 0,1 12,5.5M5,8C5.56,8 6.08,8.15 6.53,8.42C6.38,9.85 6.8,11.27 7.66,12.38C7.16,13.34 6.16,14 5,14A3,3 0 0,1 2,11A3,3 0 0,1 5,8M19,8A3,3 0 0,1 22,11A3,3 0 0,1 19,14C17.84,14 16.84,13.34 16.34,12.38C17.2,11.27 17.62,9.85 17.47,8.42C17.92,8.15 18.44,8 19,8M5.5,18.25C5.5,16.18 8.41,14.5 12,14.5C15.59,14.5 18.5,16.18 18.5,18.25V20H5.5V18.25M0,20V18.5C0,17.11 1.89,15.94 4.45,15.6C3.86,16.28 3.5,17.22 3.5,18.25V20H0M24,20H20.5V18.25C20.5,17.22 20.14,16.28 19.55,15.6C22.11,15.94 24,17.11 24,18.5V20Z" />
                    </svg>
                    <span class="ml-3">Author</span>
                </a>
            </li>
          @endrole
        </ul>
    </div>
</div>

