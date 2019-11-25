@extends('layouts.app')

@section('content')

    <h1>Test</h1>

    <div class="py-4">
        @if (session('status'))
            <div class="">
                {{ session('status') }}
            </div>
        @endif
        This is a test page
    </div>
@endsection
