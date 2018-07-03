@extends('layouts.app')

@section('content')


<div class="container my-16 mx-auto">

	<h1 class="mb-8">
		List of equipments

        @if( auth()->user()->isSuperAdmin() )
		<a href="{{ route('admin.equipments.create') }}" class="text-right bg-blue-light text-white text-sm py-1 px-1">
            Create
        </a>
        @endif

        @if( auth()->user()->isInstituteAdmin() || auth()->user()->isInstituteEditor() )

        <a href="{{ route('admin.institute-equipments.create') }}" class="text-right bg-blue-light text-white text-sm py-1 px-1">
            Add Equipment
        </a>
        @endif

        <a href="{{ route('equipments.index') }}" class="text-right bg-purple-light text-white text-sm py-1 px-1 float-right">
            View Equipments
        </a>
  	</h1>

    <div class="bg-white p-3 rounded-b">
        <form class="w-full">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                        Name
                    </label>
                    <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-2 px-4 mb-3 leading-tight" id="grid-first-name" value="{{ request('name') }}" type="text" name="name" placeholder="Name">
                </div>

                @if( auth()->user()->isSuperAdmin() )
                <div class="w-full md:w-1/3 px-3">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
                        Institute Name
                    </label>
                    <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-2 px-4 leading-tight" id="grid-last-name" type="text" name="institute_name" value="{{ request('institute_name') }}" placeholder="Created By Institute">
                </div>
                @endif
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <div class="w-2/4 ml-auto">
                        <button type="submit" class="bg-brand hover:bg-brand-dark text-white text-sm font-sembiold py-2 my-6 px-4 rounded mr-3">
                            Search
                        </button>
                        <a href="{{ route('admin.equipments.index') }}" class="bg-grey hover:bg-brand-grey text-white text-sm font-sembiold py-2 my-6 px-4 rounded mr-3">
                            Reset
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
	<table class="table text-left w-full">
		<thead class="flex w-full">
           <tr class="flex w-full mb-4">
                <th class="p-4">S.No. </th>
                <th class="p-4 w-1/6">Name</th>
                <th class="p-4 w-1/6">Manufacturer</th>
                <th class="p-4 w-1/6">Model</th>
                <th class="p-4 w-1/6">Quantity</th>
                <th class="p-4 w-1/6">Is Working</th>
                <th class="p-4 w-1/6">Location</th>
                <th class="p-4 w-1/6">Created On</th>
                <th class="p-4 w-1/6">Action(s)</th>
            </tr>
        </thead>
        <tbody class="flex flex-col items-center justify-between overflow-y-scroll w-full">
            @foreach( $equipments as $u => $equipment)
            <tr class="flex w-full mb-4 border-b border-grey-light">
                <th class="p-4">{{ $u + 1 }}</th>
                <td class="p-4 w-1/6"> {{ $equipment->name }} <br/>
                                        @if( $equipment->institute)
                                        <span class="bg-green text-white shadow rounded text-sm py-1 my-1 px-1">{{ $equipment->institute->name ?? ''}}
                                        </span>
                                        @endif</td>
                <td class="p-4 w-1/6"> {{ $equipment->manufacturer }}</td>
                <td class="p-4 w-1/6"> {{ $equipment->model }}</td>
                <td class="p-4 w-1/6"> {{ $equipment->quantity }}</td>
                <td class="p-4 w-1/6"> {{ $equipment->is_working ? 'Yes': 'No' }}</td>
                <td class="p-4 w-1/6"> {{ $equipment->location }}</td>

		    	<td class="p-4 w-1/6"> {{ $equipment->created_at->format('d M Y H:i:s') }}</td>
		    	<td class="p-4 w-1/6">
                    @if( auth()->user()->isSuperAdmin() )
		    		<a href="{{ route('admin.equipments.edit', $equipment->id) }}" class="bg-blue-light text-white text-sm py-1 px-1">Edit</a>
                    @endif

                    <a href="{{ route('admin.equipments.show', $equipment->id) }}" class="bg-blue text-white text-sm py-1 px-1">Show</a>

                    @if( auth()->user()->isInstituteAdmin() || auth()->user()->isInstituteEditor() )
                        <a href="{{ route('admin.institute-equipments.edit', $equipment->id) }}" class="bg-blue-dark text-white text-sm py-1 px-1">Update</a>
                    @endif

                    @can( 'manage-bookings' )
                        <a href="{{ route('admin.bookings.index', [ 'equipment_id' => $equipment->id ]) }}" class="bg-purple text-white text-xs py-1 px-1">Show Bookings</a>
                    @endif

                    @if( auth()->user()->isInstituteAdmin() )
                        <button class="bg-red text-white text-xs py-1 px-1" onclick="performAction( 'remove' , {{ $equipment->id }})"> Remove </button>
                    @endif

		    	</td>
		    </tr>
		    @endforeach
		</tbody>
	</table>
	
	{{ $equipments->links() }}

</div>

@endsection


@section('after-script')

<script type="text/javascript">
    
    function post(path, params, method) {
        method = method || "post"; // Set method to post by default if not specified.

        // The rest of this code assumes you are not using a library.
        // It can be made less wordy if you use one.
        var form = document.createElement("form");
        form.setAttribute("method", method);
        form.setAttribute("action", path);

        for(var key in params) {
            if(params.hasOwnProperty(key)) {
                var hiddenField = document.createElement("input");
                hiddenField.setAttribute("type", "hidden");
                hiddenField.setAttribute("name", key);
                hiddenField.setAttribute("value", params[key]);

                form.appendChild(hiddenField);
            }
        }

        document.body.appendChild(form);
        form.submit();
    }

    function performAction( type, equipmentId)
    {        
        var $response = 0;

        switch( type )
        {
            case 'remove' :
                $response = confirm('Are you sure you want to remove');
                break;
        }

        if( $response )
        {
            var URL = "{{ route('admin.institute-equipments.store') }}" + '/' + equipmentId ;
            post( URL, { 'action' : type, '_token' : '{{ csrf_token() }}' , '_method' : 'DELETE'}, 'post');
        }

    }
</script>

@endsection