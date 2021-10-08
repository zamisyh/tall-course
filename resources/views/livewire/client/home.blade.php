<div>

    @section('title')
        Coursemy
    @endsection

    @livewire('components.client.navbar')
    @include('livewire.components.client.hero')


    @livewire('client.latest-course')



    @include('livewire.components.client.footer')
</div>
