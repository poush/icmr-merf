@extends('layouts.app')

@section('content')

<div class="container my-24 mx-auto">
    <div class="flex items-center">
        <div class="md:w-1/2 md:mx-auto">
            <div class="rounded shadow">
                <div class="font-medium text-lg text-brand-darker bg-brand-lighter p-3 rounded-t">
                    Edit Equipment
                </div>
                <div class="bg-white p-3 rounded-b">
                    <form class="form-horizontal" method="POST" action="{{ route('admin.institute-equipments.update', $equipment->id ) }}">
                        {{ csrf_field() }}
                        @method('PUT')

                        <div class="flex items-stretch mb-3">
                            <label for="name" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Name</label>
                            <div class="flex flex-col w-3/4">
                                <select name="equipment_id" class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-4 py-2 pr-8 rounded shadow" readonly>
                                    <option value="">Select</option>

                                    @foreach( $equipments as $r_value => $name )
                                    <option value="{{ $r_value }}" @if(old( 'equipment_id', $equipment->id ) == $r_value ) selected @endif >{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="flex items-stretch mb-3">
                            <label for="lab" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Lab</label>
                            <div class="flex flex-col w-3/4">
                                <input id="lab" type="text" class="flex-grow h-8 px-2 border rounded {{ $errors->has('lab') ? 'border-red-dark' : 'border-grey-light' }}" name="lab" value="{{ old('lab', $equipment->pivot->lab) }}" required>
                                {!! $errors->first('lab', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                        </div>

                        <div class="flex">
                            <div class="w-3/4 ml-auto">
                                <button type="submit" class="bg-brand hover:bg-brand-dark text-white text-sm font-sembiold py-2 px-4 rounded mr-3">
                                    Update Equipment
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

