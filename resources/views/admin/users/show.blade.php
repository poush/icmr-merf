@extends('layouts.app')

@section('content')

<div class="container my-24 mx-auto">
    <div class="flex items-center">
        <div class="md:w-1/2 md:mx-auto">
            <div class="rounded shadow">
                <div class="font-medium text-lg text-brand-darker bg-brand-lighter p-3 rounded-t">
                    User : {{ $user->name }}                            
                    <span class="bg-blue text-white shadow rounded text-sm py-1 px-1">
                        {{ config('mapping.roles.'.$user->role, '') }}
                    </span>

                </div>
                <div class="bg-white p-3 rounded-b">
                    <div class="">
                        <label>Name</label> : {{ $user->name }}

                        <br/>

                        <label>Email</label> : {{ $user->email }}

                        <br/>

                        <label>Mobile</label> : {{ $user->mobile }}

                        <br/>

                        <label>Institute</label> : {{ $user->institute->name ?? '' }}

                        <br/>

                        <label>Created On</label> : {{ $user->created_at->format('d M Y H:i:s') }}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

