@extends('layouts.app')

@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

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

                        @if( $equipment->institute_id == auth()->user()->institute_id )

                            {{ csrf_field() }}
                        {{ method_field('PUT') }}


                        <div class="flex items-stretch mb-3">
                            <label for="name" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Select Category</label>
                            <div class="flex flex-col w-3/4">
                                <select name="category_id" class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-4 py-2 pr-8 rounded shadow" required>
                                    <option value="">Select</option>

                                    @foreach( $categories as $r_value => $name )
                                    <option value="{{ $r_value }}" @if(old( 'category_id', $equipment->category_id) == $r_value ) selected @endif >{{ $name }}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('category_id', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                        </div>

                        <div class="flex items-stretch mb-3">
                            <label for="name" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Name</label>
                            <div class="flex flex-col w-3/4">
                                <input id="name" type="text" class="flex-grow h-8 px-2 border rounded {{ $errors->has('name') ? 'border-red-dark' : 'border-grey-light' }}" name="name" value="{{ old('name', $equipment->name) }}" autofocus required>
                                {!! $errors->first('name', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                        </div>

                        <div class="flex items-stretch mb-3">
                            <label for="manufacturer" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Manufacturer</label>
                            <div class="flex flex-col w-3/4">
                                <input id="manufacturer" type="text" class="flex-grow h-8 px-2 border rounded {{ $errors->has('manufacturer') ? 'border-red-dark' : 'border-grey-light' }}" name="manufacturer" value="{{ old('manufacturer',$equipment->manufacturer) }}" >
                                {!! $errors->first('manufacturer', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                        </div>

                        <div class="flex items-stretch mb-3">
                            <label for="model" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Model</label>
                            <div class="flex flex-col w-3/4">
                                <input id="model" type="text" class="flex-grow h-8 px-2 border rounded {{ $errors->has('model') ? 'border-red-dark' : 'border-grey-light' }}" name="model" value="{{ old('model', $equipment->model) }}" >
                                {!! $errors->first('model', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                        </div>

                        <div class="flex items-stretch mb-3">
                            <label for="quantity" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Quantity</label>
                            <div class="flex flex-col w-3/4">
                                <input id="quantity" type="number" class="flex-grow h-8 px-2 border rounded {{ $errors->has('quantity') ? 'border-red-dark' : 'border-grey-light' }}" name="quantity" value="{{ old('quantity', $equipment->quantity) }}" >
                                {!! $errors->first('quantity', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                        </div>

                        <div class="flex items-stretch mb-3">
                            <label for="quantity" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Is Working ?</label>
                            <div class="flex flex-col w-3/4">
                                <select name="is_working" class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-4 py-2 pr-8 rounded shadow" >
                                    <option value="">Select</option>
                                    <option value="1" @if(old('is_working', $equipment->is_working) == 1 ) selected @endif >Yes</option>
                                    <option value="0" @if(old('is_working', $equipment->is_working) === 0 ) selected @endif >No</option>
                                </select>
                                {!! $errors->first('is_working', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                        </div>

                         <div class="flex items-stretch mb-3">
                            <label for="not_working_since" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Not Working Since</label>
                            <div class="flex flex-col w-3/4">
                                <input id="not_working_since" type="text" class="flex-grow h-8 px-2 border rounded {{ $errors->has('not_working_since') ? 'border-red-dark' : 'border-grey-light' }}" name="not_working_since" value="{{ old('not_working_since', $equipment->not_working_since) }}">
                                {!! $errors->first('not_working_since', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                        </div>

                        <div class="flex items-stretch mb-3">
                            <label for="purchase_date" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Purchase Date</label>
                            <div class="flex flex-col w-3/4">
                                <input id="purchase_date" type="text" class="flex-grow h-8 px-2 border rounded {{ $errors->has('purchase_date') ? 'border-red-dark' : 'border-grey-light' }}" name="purchase_date" value="{{ old('purchase_date', $equipment->purchase_date) }}">
                                {!! $errors->first('purchase_date', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                        </div>

                        <div class="flex items-stretch mb-3">
                            <label for="extra" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Extra</label>
                            <div class="flex flex-col w-3/4">
                                <input id="extra" type="text" class="flex-grow h-8 px-2 border rounded {{ $errors->has('extra') ? 'border-red-dark' : 'border-grey-light' }}" name="extra" value="{{ old('extra', $equipment->extra) }}" >
                                {!! $errors->first('extra', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                        </div>

                        <div class="flex items-stretch mb-3">
                            <label for="features" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Features</label>
                            <div class="flex flex-col w-3/4">
                                <input id="features" type="text" class="flex-grow h-8 px-2 border rounded {{ $errors->has('features') ? 'border-red-dark' : 'border-grey-light' }}" name="features" value="{{ old('features', $equipment->features) }}" >
                                {!! $errors->first('features', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                        </div>

                        <div class="flex items-stretch mb-3">
                            <label for="working" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Working</label>
                            <div class="flex flex-col w-3/4">
                                <input id="working" type="text" class="flex-grow h-8 px-2 border rounded {{ $errors->has('working') ? 'border-red-dark' : 'border-grey-light' }}" name="working" value="{{ old('working', $equipment->working) }}" >
                                {!! $errors->first('working', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                        </div>

                        <div class="flex items-stretch mb-3">
                            <label for="operation" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Operation</label>
                            <div class="flex flex-col w-3/4">
                                <input id="operation" type="text" class="flex-grow h-8 px-2 border rounded {{ $errors->has('operation') ? 'border-red-dark' : 'border-grey-light' }}" name="operation" value="{{ old('operation', $equipment->operation) }}" >
                                {!! $errors->first('operation', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                        </div>

                        <div class="flex items-stretch mb-3">
                            <label for="description" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Description</label>
                            <div class="flex flex-col w-3/4">
                                <input id="description" type="text" class="flex-grow h-8 px-2 border rounded {{ $errors->has('description') ? 'border-red-dark' : 'border-grey-light' }}" name="description" value="{{ old('description', $equipment->description) }}" >
                                {!! $errors->first('description', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                        </div>

                        <div class="flex items-stretch mb-3">
                            <label for="health_problems" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Health Problems</label>
                            <div class="flex flex-col w-3/4">
                                <input id="health_problems" type="text" class="flex-grow h-8 px-2 border rounded {{ $errors->has('health_problems') ? 'border-red-dark' : 'border-grey-light' }}" name="health_problems" value="{{ old('health_problems', $equipment->health_problems) }}" >
                                {!! $errors->first('health_problems', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                        </div>

                        <div class="flex items-stretch mb-3">
                            <label for="training_requirement" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Training Requirement</label>
                            <div class="flex flex-col w-3/4">
                                <input id="training_requirement" type="text" class="flex-grow h-8 px-2 border rounded {{ $errors->has('training_requirement') ? 'border-red-dark' : 'border-grey-light' }}" name="training_requirement" value="{{ old('training_requirement', $equipment->training_requirement) }}" >
                                {!! $errors->first('training_requirement', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                        </div>

                         <div class="flex items-stretch mb-3">
                            <label for="machine_rest" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Machine Test</label>
                            <div class="flex flex-col w-3/4">
                                <input id="machine_rest" type="text" class="flex-grow h-8 px-2 border rounded {{ $errors->has('machine_rest') ? 'border-red-dark' : 'border-grey-light' }}" name="machine_rest" value="{{ old('machine_rest', $equipment->machine_rest) }}" >
                                {!! $errors->first('machine_rest', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                        </div>

                        <div class="flex items-stretch mb-3">
                            <label for="location" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Location</label>
                            <div class="flex flex-col w-3/4">
                                <input id="location" type="text" class="flex-grow h-8 px-2 border rounded {{ $errors->has('location') ? 'border-red-dark' : 'border-grey-light' }}" name="location" value="{{ old('location', $equipment->location) }}" >
                                {!! $errors->first('location', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                        </div>

                              <div class="flex items-stretch mb-3">
                            <label for="equipment_age" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Age of Equipment</label>
                            <div class="flex flex-col w-3/4">
                                <input id="equipment_age" type="number" class="flex-grow h-8 px-2 border rounded {{ $errors->has('equipment_age') ? 'border-red-dark' : 'border-grey-light' }}" name="equipment_age" value="{{ old('equipment_age', $equipment->equipment_age) }}" >
                                {!! $errors->first('equipment_age', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                        </div>

                        <div class="flex items-stretch mb-3">
                            <label for="source_funding" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Source of Funding</label>
                            <div class="flex flex-col w-3/4">
                                <input id="source_funding" type="text" class="flex-grow h-8 px-2 border rounded {{ $errors->has('source_funding') ? 'border-red-dark' : 'border-grey-light' }}" name="source_funding" value="{{ old('source_funding', $equipment->source_funding) }}" >
                                {!! $errors->first('source_funding', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                        </div>

                        <div class="flex items-stretch mb-3">
                            <label for="state_art" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">State of Art</label>
                            <div class="flex flex-col w-3/4">
                                <input id="state_art" type="text" class="flex-grow h-8 px-2 border rounded {{ $errors->has('state_art') ? 'border-red-dark' : 'border-grey-light' }}" name="state_art" value="{{ old('state_art', $equipment->state_art) }}" >
                                {!! $errors->first('state_art', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                        </div>

                        <div class="flex items-stretch mb-3">
                            <label for="latest_technology" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Is Latest Technology ?</label>
                            <div class="flex flex-col w-3/4">
                                <select name="latest_technology" class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-4 py-2 pr-8 rounded shadow" >
                                    <option value="">Select</option>
                                    <option value="1" @if(old('latest_technology', $equipment->latest_technology) == 1 ) selected @endif >Yes</option>
                                    <option value="0" @if(old('latest_technology', $equipment->latest_technology) === 0 ) selected @endif >No</option>
                                </select>
                                {!! $errors->first('latest_technology', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                        </div>

                        @else
                             <div class="flex items-stretch mb-3">
                            <label for="name" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Name</label>
                            <div class="flex flex-col w-3/4">
                                <select name="equipment_id" class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-4 py-2 pr-8 rounded shadow" disabled>
                                    <option value="">Select</option>

                                    @foreach( $equipments as $r_value => $equip )
                                    <option value="{{ $equip->id }}" @if(old( 'equipment_id', $equipment->id ) == $equip->id ) selected @endif >{{ $equip->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            </div>
                        @endif

                        <div class="flex items-stretch mb-3">
                            <label for="lab" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Lab</label>
                            <div class="flex flex-col w-3/4">
                                <input id="lab" type="text" class="flex-grow h-8 px-2 border rounded {{ $errors->has('lab') ? 'border-red-dark' : 'border-grey-light' }}" name="lab" value="{{ old('lab', $equipment->pivot->lab) }}" required>
                                {!! $errors->first('lab', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                        </div>

                        <label class="bg-blue text-white text-sm font-sembiold py-2 px-4 mr-3">
                            Availability
                        </label>
                        <br/><br/>
                        <div id="availibility_div">

                            @foreach( $equipmentAvailability as $e => $eA )
                            
                            <div class="flex items-stretch mb-3">
                            <label for="from" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">{{ $e + 1 }} From</label>
                            <div class="flex flex-col w-3/4">
                                <input id="from_date_exist.{{$eA->id}}" type="text" class="flex-grow h-8 px-2 border rounded {{ $errors->has('from_date_exist') ? 'border-red-dark' : 'border-grey-light' }}" name="from_date_exist[{{$eA->id}}]" value="{{ old('from', $eA->from ) }}">
                                {!! $errors->first('from_date_exist[]', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                            
                            <label for="to" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">To</label>
                            <div class="flex flex-col w-3/4">
                                <input id="to_date_exist.{{ $eA->id }}" type="text" class="flex-grow h-8 px-2 border rounded {{ $errors->has('to') ? 'border-red-dark' : 'border-grey-light' }}" name="to_date_exist[{{$eA->id}}]" value="{{ old('to', $eA->to) }}">
                                {!! $errors->first('to_date_exist[]', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                            </div>
                            @endforeach
                            <br/>
                        </div>
                        <button type="button" class="bg-blue text-white text-sm font-sembiold py-2 px-4 mr-3" onclick="addMoreAvailability()">
                            + more
                        </button>
                        <div class="flex">
                            <div class="w-3/4 ml-auto">
                                <button type="submit" class="bg-brand hover:bg-brand-dark text-white text-sm font-sembiold py-2 px-4 rounded mr-3">
                                    Update
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


@section('after-script')

<script type="text/javascript">
    function addMoreAvailability()
    {
        var $cloneHtml = '<div class="flex items-stretch mb-3"><label for="from" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">From</label><div class="flex flex-col w-3/4"><input id="from" type="text" class="flex-grow h-8 px-2 border rounded" name="from[]" value="" /></div>'
                        + '<label for="to" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">To</label><div class="flex flex-col w-3/4"><input id="to" type="text" class="flex-grow h-8 px-2 border rounded" name="to[]" value="" /></div><span onclick="$(this).parent().remove();" class="p-1 text-sm bg-red text-white font-bold" style="cursor:pointer">X</span></div>';

        document.getElementById('availibility_div').innerHTML += $cloneHtml;

         $('#availibility_div input').daterangepicker({
            timePicker: true,
            singleDatePicker: true,
            locale: {
              format: 'YYYY-MM-DD hh:mm A'
            }
          });      
    }

</script>


<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script>

$(function() {
   $('#not_working_since').daterangepicker({
    timePicker: true,
    singleDatePicker: true,
    autoUpdateInput: false,
    timePicker24Hour: true,
    timePickerIncrement: 30,
    locale: {
      format: 'YYYY-MM-DD H:mm:ss'
    }
  },  function(chosen_date) {
        $('#not_working_since').val(chosen_date.format('YYYY-MM-DD H:mm:ss'));
    });

  $('#purchase_date').daterangepicker({
    timePicker: false,
    singleDatePicker: true,
    autoUpdateInput: false,
    locale: {
      format: 'YYYY-MM-DD'
    }
  }, function(chosen_date) {
        $('#purchase_date').val(chosen_date.format('YYYY-MM-DD'));
    });
});
</script>

@endsection
