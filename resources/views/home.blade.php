@extends('layouts.app')

@section('content')
    <h1>Dashboard</h1>

    <div class="py-4">
        @if (session('status'))
            <div class="">
                {{ session('status') }}
            </div>
        @endif

        You are logged in!
    </div>
@endsection
