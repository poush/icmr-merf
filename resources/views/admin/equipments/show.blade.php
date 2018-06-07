@extends('layouts.app')

@section('content')

<div class="container my-24 mx-auto">
    <div class="flex items-center">
        <div class="md:w-1/2 md:mx-auto">
            <div class="rounded shadow">
                <div class="font-medium text-lg text-brand-darker bg-brand-lighter p-3 rounded-t">
                    Equipment Details : {{ $equipment->name }}
                </div>
                <div class="bg-white p-3 rounded-b">
                    <div class="">
                        <label>Name</label> : {{ $equipment->name }}<br/>
                        <label>Manufacturer</label> : {{ $equipment->manufacturer }}<br/>
                        <label>Model</label> : {{ $equipment->model }}<br/>
                        <label>Is Working</label> : {{ $equipment->is_working ? 'Yes' : 'No' }}<br/>
                        <label>Location</label> : {{ $equipment->not_working_since }} <br/>
                        <label>Extra</label> : {{ $equipment->extra }}<br/>
                        <label>Features</label> : {{ $equipment->features }}<br/>
                        <label>Working</label> : {{ $equipment->working }}<br/>
                        <label>Description</label> : {{ $equipment->description }}<br/>
                        <label>Operation</label> : {{ $equipment->operation }}<br/>
                        <label>Health Problems</label> : {{ $equipment->health_problems }}<br/>
                        <label>Machine Rest</label> : {{ $equipment->machine_rest }}<br/>
                        <label>Training Requirement</label> : {{ $equipment->training_requirement }}<br/>
                        <label>Location</label> : {{ $equipment->location }} <br/>
                        <label>Age of Equipment</label> : {{ $equipment->equipment_age }}<br/>
                        <label>Source of Fundng</label> : {{ $equipment->source_funding }}<br/>
                        <label>State of Art</label> : {{ $equipment->state_art }}</br/>
                        <label>Purchase Date</label> : {{ $equipment->purchase_date }}<br/>
                        <label>Latest Technology</label> : {{ $equipment->latest_technology ? 'Yes' : 'No' }}<br/>
                        <label>Created At</label> : {{ $equipment->created_at->format('Y-m-d') }}<br/>
                        <label>Created By</label> : 
                                        @if( $equipment->isCreatedByInstitute() )
                                          {{ $equipment->insitute->name }}
                                        @else
                                          {{ 'Super Admiin' }}
                                        @endif
                        <b/r>         
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

