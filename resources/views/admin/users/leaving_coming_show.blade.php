@extends('layouts.app')

@section('content')
    <div id="app" class="container">
        <example-component></example-component>
    </div>
@endsection


@section('javascript')
    <script src="{{asset('js/app.js')}}"></script>
@endsection