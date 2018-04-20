@extends('layouts.app')

@section('content')


    <div class="">
        <img src="{{ asset('/img/bg.jpg') }}" class="max-h-sm-m w-full" />
    </div>

    <div class="bg-white p-6">
        <form class="w-1/2 max-w-sm">
            <div class="flex items-center border-b border-b-2 border-teal py-2">
                <input class="appearance-none bg-transparent border-none w-full text-grey-darker mr-3 py-1 px-2" type="text" placeholder="Jane Doe" aria-label="Full name">
            </div>
        </form>
    </div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
