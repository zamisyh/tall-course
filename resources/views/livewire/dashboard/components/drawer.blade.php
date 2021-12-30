<div style="margin-top: -9px"
    class="fixed shadow-lg h-50 drawer"
    x-show='drawer'
    x-transition:enter.duration.500ms
    @click.away="drawer = false"
    x-transition:leave.duration.500ms

    >
    <div class="h-screen drawer-side">
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
          <li>
            <a href="{{ route('dashboard.admin.home') }}">
                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M13,3V9H21V3M13,21H21V11H13M3,21H11V15H3M3,13H11V3H3V13Z" />
                </svg>
                <span class="ml-3">Dashboard</span>
            </a>
          </li>
          <hr>
          @role('admin')
            <li>
                <a href="{{ route('dashboard.admin.author') }}">
                    <svg style="width:24px;height:24px" vi  ewBox="0 0 24 24">
                        <path fill="currentColor" d="M12,5.5A3.5,3.5 0 0,1 15.5,9A3.5,3.5 0 0,1 12,12.5A3.5,3.5 0 0,1 8.5,9A3.5,3.5 0 0,1 12,5.5M5,8C5.56,8 6.08,8.15 6.53,8.42C6.38,9.85 6.8,11.27 7.66,12.38C7.16,13.34 6.16,14 5,14A3,3 0 0,1 2,11A3,3 0 0,1 5,8M19,8A3,3 0 0,1 22,11A3,3 0 0,1 19,14C17.84,14 16.84,13.34 16.34,12.38C17.2,11.27 17.62,9.85 17.47,8.42C17.92,8.15 18.44,8 19,8M5.5,18.25C5.5,16.18 8.41,14.5 12,14.5C15.59,14.5 18.5,16.18 18.5,18.25V20H5.5V18.25M0,20V18.5C0,17.11 1.89,15.94 4.45,15.6C3.86,16.28 3.5,17.22 3.5,18.25V20H0M24,20H20.5V18.25C20.5,17.22 20.14,16.28 19.55,15.6C22.11,15.94 24,17.11 24,18.5V20Z" />
                    </svg>
                    <span class="ml-3">Manajement Users</span>
                </a>
            </li>
          @endrole

          @role('author')
          <li>
              <a href="{{ route('dashboard.admin.author.course') }}">
                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M15 23C13.9 23 13 22.11 13 21V12C13 10.9 13.9 10 15 10H19L23 14V21C23 22.11 22.11 23 21 23H15M15 21H21V14.83L18.17 12H15V21M19 3C20.1 3 21 3.9 21 5V9.17L19.83 8H19V5H17V7H7V5H5V19H11V21H5C3.9 21 3 20.1 3 19V5C3 3.9 3.9 3 5 3H9.18C9.6 1.84 10.7 1 12 1C13.3 1 14.4 1.84 14.82 3H19M12 3C11.45 3 11 3.45 11 4C11 4.55 11.45 5 12 5C12.55 5 13 4.55 13 4C13 3.45 12.55 3 12 3Z" />
                </svg>
                  <span class="ml-3">Course</span>
              </a>
          </li>
        @endrole
        </ul>
    </div>

</div>

