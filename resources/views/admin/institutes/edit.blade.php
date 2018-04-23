@extends('layouts.app')

@section('content')

<div class="container mt-6">
    <div class="flex items-center">
        <div class="md:w-1/2 md:mx-auto">
            <div class="rounded shadow">
                <div class="font-medium text-lg text-brand-darker bg-brand-lighter p-3 rounded-t">
                    Edit An Institute : {{ $institute->name }}
                </div>
                <div class="bg-white p-3 rounded-b">
                    <form class="form-horizontal" method="POST" action="{{ route('admin.institutes.update', $institute->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="flex items-stretch mb-3">
                            <label for="name" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Name</label>
                            <div class="flex flex-col w-3/4">
                                <input id="name" type="text" class="flex-grow h-8 px-2 border rounded {{ $errors->has('name') ? 'border-red-dark' : 'border-grey-light' }}" name="name" value="{{ old('name', $institute->name) }}" autofocus>
                                {!! $errors->first('name', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                        </div>

                        <div class="flex items-stretch mb-3">
                            <label for="city" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">City</label>
                            <div class="flex flex-col w-3/4">
                                <input id="city" type="text" class="flex-grow h-8 px-2 border rounded {{ $errors->has('city') ? 'border-red-dark' : 'border-grey-light' }}" name="city" value="{{ old('city', $institute->city) }}" required>
                                {!! $errors->first('city', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                        </div>

                        <div class="flex">
                            <div class="w-3/4 ml-auto">
                                <button type="submit" class="bg-brand hover:bg-brand-dark text-white text-sm font-sembiold py-2 px-4 rounded mr-3">
                                    Edit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

