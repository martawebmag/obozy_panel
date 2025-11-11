<x-app-layout>

@section('content')

<div class="flex w-screen">
     @include('koordynator.sidebar')

        <!-- Main Content -->
    <div class="w-screen bg-white p-8">


    @include('koordynator.sidebar-mobile')


        <h1 class="text-xl font-bold mb-1 mt-4">Historia obozowa</h1>
        <hr>


    </div>
</div>
 @endsection
</x-app-layout>
