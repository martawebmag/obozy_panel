@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex bg-gray-200 border-t-2 border-slate-300">

        @include('biuro.sidebar')

        <main class="flex-1 p-6 bg-slate-50 shadow-inner border-l-2 border-slate-200">

            @livewire('biuro.edit-student', ['student' => $student])

        </main>
    </div>
@endsection
