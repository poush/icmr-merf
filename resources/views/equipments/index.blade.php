@extends('layouts.app')

@section('content')

    <equipment-search 
        :categories="{{ $categories }}"
        :institutes="{{ $institutes }}"
        ></equipment-search>
@endsection
