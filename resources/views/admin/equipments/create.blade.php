@extends('layouts.app')

@section('content')

<div class="container mt-6">
    <div class="flex items-center">
        <div class="md:w-1/2 md:mx-auto">
            <div class="rounded shadow">
                <div class="font-medium text-lg text-brand-darker bg-brand-lighter p-3 rounded-t">
                    Create An Equipment
                </div>
                <div class="bg-white p-3 rounded-b">
                    <form class="form-horizontal" method="POST" action="{{ route('admin.equipments.store') }}">
                        {{ csrf_field() }}

                        <div class="flex items-stretch mb-3">
                            <label for="name" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Name</label>
                            <div class="flex flex-col w-3/4">
                                <input id="name" type="text" class="flex-grow h-8 px-2 border rounded {{ $errors->has('name') ? 'border-red-dark' : 'border-grey-light' }}" name="name" value="{{ old('name') }}" autofocus required>
                                {!! $errors->first('name', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                        </div>

                        <div class="flex items-stretch mb-3">
                            <label for="manufacturer" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Manufacturer</label>
                            <div class="flex flex-col w-3/4">
                                <input id="manufacturer" type="text" class="flex-grow h-8 px-2 border rounded {{ $errors->has('manufacturer') ? 'border-red-dark' : 'border-grey-light' }}" name="manufacturer" value="{{ old('manufacturer') }}" >
                                {!! $errors->first('manufacturer', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                        </div>

                        <div class="flex items-stretch mb-3">
                            <label for="model" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Model</label>
                            <div class="flex flex-col w-3/4">
                                <input id="model" type="text" class="flex-grow h-8 px-2 border rounded {{ $errors->has('model') ? 'border-red-dark' : 'border-grey-light' }}" name="model" value="{{ old('model') }}" >
                                {!! $errors->first('model', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                        </div>

                        <div class="flex items-stretch mb-3">
                            <label for="quantity" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Quantity</label>
                            <div class="flex flex-col w-3/4">
                                <input id="quantity" type="number" class="flex-grow h-8 px-2 border rounded {{ $errors->has('quantity') ? 'border-red-dark' : 'border-grey-light' }}" name="quantity" value="{{ old('quantity') }}" >
                                {!! $errors->first('quantity', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                        </div>

                        <div class="flex items-stretch mb-3">
                            <label for="quantity" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Is Working ?</label>
                            <div class="flex flex-col w-3/4">
                                <select name="is_working" class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-4 py-2 pr-8 rounded shadow" >
                                    <option value="">Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                {!! $errors->first('is_working', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                        </div>

                        <div class="flex items-stretch mb-3">
                            <label for="extra" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Extra</label>
                            <div class="flex flex-col w-3/4">
                                <input id="extra" type="text" class="flex-grow h-8 px-2 border rounded {{ $errors->has('extra') ? 'border-red-dark' : 'border-grey-light' }}" name="extra" value="{{ old('extra') }}" >
                                {!! $errors->first('extra', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                        </div>

                        <div class="flex items-stretch mb-3">
                            <label for="features" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Features</label>
                            <div class="flex flex-col w-3/4">
                                <input id="features" type="text" class="flex-grow h-8 px-2 border rounded {{ $errors->has('features') ? 'border-red-dark' : 'border-grey-light' }}" name="features" value="{{ old('features') }}" >
                                {!! $errors->first('features', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                        </div>

                        <div class="flex items-stretch mb-3">
                            <label for="working" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Working</label>
                            <div class="flex flex-col w-3/4">
                                <input id="working" type="text" class="flex-grow h-8 px-2 border rounded {{ $errors->has('working') ? 'border-red-dark' : 'border-grey-light' }}" name="working" value="{{ old('working') }}" >
                                {!! $errors->first('working', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                        </div>

                        <div class="flex items-stretch mb-3">
                            <label for="operation" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Operation</label>
                            <div class="flex flex-col w-3/4">
                                <input id="operation" type="text" class="flex-grow h-8 px-2 border rounded {{ $errors->has('operation') ? 'border-red-dark' : 'border-grey-light' }}" name="operation" value="{{ old('operation') }}" >
                                {!! $errors->first('operation', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                        </div>

                        <div class="flex items-stretch mb-3">
                            <label for="description" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Description</label>
                            <div class="flex flex-col w-3/4">
                                <input id="description" type="text" class="flex-grow h-8 px-2 border rounded {{ $errors->has('description') ? 'border-red-dark' : 'border-grey-light' }}" name="description" value="{{ old('description') }}" >
                                {!! $errors->first('description', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                        </div>

                        <div class="flex items-stretch mb-3">
                            <label for="health_problems" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Health Problems</label>
                            <div class="flex flex-col w-3/4">
                                <input id="health_problems" type="text" class="flex-grow h-8 px-2 border rounded {{ $errors->has('health_problems') ? 'border-red-dark' : 'border-grey-light' }}" name="health_problems" value="{{ old('health_problems') }}" >
                                {!! $errors->first('health_problems', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                        </div>

                        <div class="flex items-stretch mb-3">
                            <label for="training_requirement" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Training Requirement</label>
                            <div class="flex flex-col w-3/4">
                                <input id="training_requirement" type="text" class="flex-grow h-8 px-2 border rounded {{ $errors->has('training_requirement') ? 'border-red-dark' : 'border-grey-light' }}" name="training_requirement" value="{{ old('training_requirement') }}" >
                                {!! $errors->first('training_requirement', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                        </div>

                         <div class="flex items-stretch mb-3">
                            <label for="machine_rest" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Machine Test</label>
                            <div class="flex flex-col w-3/4">
                                <input id="machine_rest" type="text" class="flex-grow h-8 px-2 border rounded {{ $errors->has('machine_rest') ? 'border-red-dark' : 'border-grey-light' }}" name="machine_rest" value="{{ old('machine_rest') }}" >
                                {!! $errors->first('machine_rest', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                        </div>

                        <div class="flex items-stretch mb-3">
                            <label for="location" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Location</label>
                            <div class="flex flex-col w-3/4">
                                <input id="location" type="text" class="flex-grow h-8 px-2 border rounded {{ $errors->has('location') ? 'border-red-dark' : 'border-grey-light' }}" name="location" value="{{ old('location') }}" >
                                {!! $errors->first('location', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
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

