@extends('layouts.app')

@section('content')

<div class="container mt-6">
    <div class="flex items-center">
        <div class="md:w-1/2 md:mx-auto">
            <div class="rounded shadow">
                <div class="font-medium text-lg text-brand-darker bg-brand-lighter p-3 rounded-t">
                    Institute Details : {{ $institute->name }}
                </div>
                <div class="bg-white p-3 rounded-b">
                    <div class="">
                        <label>Institue Name</label> : {{ $institute->name }}

                        <br/>

                        <label>Institue City</label> : {{ $institute->city }}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

