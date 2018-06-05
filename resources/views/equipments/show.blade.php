@extends('layouts.app')

@section('content')

    <booking-view auth="{{ Auth::check() }}" :equipment="{{ $equipment }}"></booking-view>
@endsection
