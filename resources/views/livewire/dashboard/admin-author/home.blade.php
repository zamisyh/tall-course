<div>

    @section('title')
        Dashboard | Admin - Home
    @endsection

    <div class="drawer-content" x-data="{ drawer: false }">

        @livewire('dashboard.components.navbar')
        @include('livewire.dashboard.components.drawer')


       <div class="px-5" :class="{ 'lg:mx-80 lg:p-5': drawer }">
          Home Admin
       </div>

    </div>
</div>
