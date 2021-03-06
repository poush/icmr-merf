@extends('layouts.app')

@section('content')

<div class="container my-24 mx-auto">
    <div class="flex items-center">
        <div class="md:w-1/2 md:mx-auto">
            <div class="rounded shadow">
                <div class="font-medium text-lg text-brand-darker bg-brand-lighter p-3 rounded-t">
                    Create @if( $institute ) an admin for Institute: <strong>{{ $institute->name }}</strong> @else a User @endif
                </div>
                <div class="bg-white p-3 rounded-b">
                    <form class="form-horizontal" method="POST" action="{{ route('admin.users.store') }}">
                        {{ csrf_field() }}

                        <div class="flex items-stretch mb-3">
                            <label for="name" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Name</label>
                            <div class="flex flex-col w-3/4">
                                <input id="name" type="text" class="flex-grow h-8 px-2 border rounded {{ $errors->has('name') ? 'border-red-dark' : 'border-grey-light' }}" name="name" value="{{ old('name') }}" autofocus>
                                {!! $errors->first('name', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                        </div>

                        <div class="flex items-stretch mb-3">
                            <label for="email" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Email</label>
                            <div class="flex flex-col w-3/4">
                                <input id="email" type="email" class="flex-grow h-8 px-2 border rounded {{ $errors->has('email') ? 'border-red-dark' : 'border-grey-light' }}" name="email" value="{{ old('email') }}" required>
                                {!! $errors->first('email', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                        </div>

                        <div class="flex items-stretch mb-3">
                            <label for="mobile" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Mobile</label>
                            <div class="flex flex-col w-3/4">
                                <input id="mobile" type="number" class="flex-grow h-8 px-2 border rounded {{ $errors->has('mobile') ? 'border-red-dark' : 'border-grey-light' }}" name="mobile" value="{{ old('mobile') }}" required>
                                {!! $errors->first('mobile', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                        </div>

                        @if( $institutes )

                        <div class="flex items-stretch mb-3">
                            <label for="role" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Select Role</label>
                            <div class="flex flex-col w-3/4">
                                <select name="role" class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-4 py-2 pr-8 rounded shadow" onchange="if( this.value == 'institute' || this.value == 'editor' ) { document.getElementById('institute_selector').style.display = '' } else { document.getElementById('institute_selector').style.display = 'none'}" >
                                    <option value="">Select</option>
                                    @foreach( $roles as $r_value => $role_name )
                                    <option value="{{ $r_value }}">{{ $role_name }}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('role', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                        </div>

                        @else
                            <input type="hidden" name="role" value="institute">
                        @endif

                        @if( $institutes && auth()->user()->isSuperAdmin() )
                        <div class="flex items-stretch mb-3" style="display: none" id="institute_selector">
                            <label for="city" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Select Institute</label>
                            <div class="flex flex-col w-3/4">
                                <select name="institute_id" class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-4 py-2 pr-8 rounded shadow" >
                                    <option value="">Select</option>
                                    @foreach( $institutes as $institute_id => $institute )
                                    <option value="{{ $institute_id }}">{{ $institute }}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('is_working', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                        </div>
                        @else
                            <input type="hidden" name="institute_id" value="{{ $institute->id or auth()->user()->institute_id }}">
                        @endif

                        <div class="flex items-stretch mb-4">
                            <label for="password" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Password</label>
                            <div class="flex flex-col w-3/4">
                                <input id="password" type="password" class="flex-grow h-8 px-2 rounded border {{ $errors->has('password') ? 'border-red-dark' : 'border-grey-light' }}" name="password" required>
                                {!! $errors->first('password', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                        </div>

                    <div class="flex items-stretch mb-4">
                        <label for="password_confirmation" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Confirm Password</label>
                        <div class="flex flex-col w-3/4">
                            <input id="password_confirmation" type="password" class="flex-grow h-8 px-2 rounded border {{ $errors->has('password_confirmation') ? 'border-red-dark' : 'border-grey-light' }}" name="password_confirmation" required>
                            {!! $errors->first('password_confirmation', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                        </div>
                    </div>
                        <div class="flex">
                            <div class="w-3/4 ml-auto">
                                <button type="submit" class="bg-brand hover:bg-brand-dark text-white text-sm font-sembiold py-2 px-4 rounded mr-3">
                                    Create
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

