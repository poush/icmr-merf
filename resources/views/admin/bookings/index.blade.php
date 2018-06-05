@extends('layouts.app')

@section('content')


<div class="container my-16 mx-auto">

	<h1 class="mb-8">
		List of bookings
  	</h1>

	<table class="table text-left w-full">
		<thead class="flex w-full">
           <tr class="flex w-full mb-4">
                <th class="p-4">S.No. </th>
                <th class="p-4 w-1/6">Equipment Name</th>
                <th class="p-4 w-1/6">Institute Name</th>
                <th class="p-4 w-1/6">Slot</th>
                <th class="p-4 w-1/6">Requested By</th>
                <th class="p-4 w-1/6">Status</th>
                <th class="p-4 w-1/6">Created On</th>
                <th class="p-4 w-1/6">Action(s)</th>
            </tr>
        </thead>
        <tbody class="flex flex-col items-center justify-between overflow-y-scroll w-full">
            @foreach( $bookings as $u => $booking)
            <tr class="flex w-full mb-4 border-b border-grey-light">
                <th class="p-4">{{ $u + 1 }}</th>
                <td class="p-4 w-1/6"> {{ $booking->equipment->name ?? '' }}</td>
                <td class="p-4 w-1/6"> {{ $booking->equipmentAvailability->institute->name ?? '' }}</td>
                <td class="p-4 w-1/6"> {{ $booking->equipmentAvailability->from . ' to ' . $booking->equipmentAvailability->to }}</td>
                <td class="p-4 w-1/6"> {{ $booking->user->name ?? '' }}</td>
                <td class="p-4 w-1/6"> 
                    
                    @switch( $booking->status )
                        @case(0)
                            <span class="bg-blue text-white shadow rounded text-sm py-1 px-1">
                                {{ config( 'mapping.booking_status.'.$booking->status, '' )}}
                            </span>
                            @break
                        @case(1)
                            <span class="bg-purple text-white shadow rounded text-sm py-1 px-1">
                                {{ config( 'mapping.booking_status.'.$booking->status, '' )}}
                            </span>
                            @break
                        @case(2)
                            <span class="bg-red text-white shadow rounded text-sm py-1 px-1">
                                {{ config( 'mapping.booking_status.'.$booking->status, '' )}}
                            </span>
                            @break
                        @case(3)
                            <span class="bg-green text-white shadow rounded text-sm py-1 px-1">
                                {{ config( 'mapping.booking_status.'.$booking->status, '' )}}
                            </span>
                            @break
                     @endswitch
                </td>
		    	<td class="p-4 w-1/6"> {{ $booking->created_at->format('d M Y H:i:s') }}</td>
		    	<td class="p-4 w-1/6">
                    
                    @if( $booking->status == 0 )
                        <button class="bg-blue-light text-white text-sm py-1 px-1" onclick="performAction( 'approve' , {{ $booking->id }})"> Approve </button>
                        <button class="bg-red text-white text-sm ml-2 py-1 px-1" onclick="performAction( 'reject' , {{ $booking->id }})"> Reject </button>
                    @elseif( $booking->status == 1 )
                        <button class="bg-blue-light text-white text-sm py-1 px-1" onclick="performAction( 'confirm' , {{ $booking->id }})"> Confirm </button>

                    @endif
		    	</td>
		    </tr>
		    @endforeach
		</tbody>
	</table>
	
	{{ $bookings->links() }}

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

    function performAction( type, bookingId)
    {        
        var $response = 0;

        switch( type )
        {
            case 'approve' :
                $response = confirm('Are you sure you want to approve');
                break;
            case 'reject' :
                $response = confirm('Are you sure you want to reject');
                break;
            case 'confirm' :
                $response = confirm('Are you sure you want to confirm');
                break;
        }

        if( $response )
        {
            var URL = "{{ route('admin.bookings.action', [ $booking->id ]) }}";
            post( URL, { 'action' : type, '_token' : '{{ csrf_token() }}' }, 'post');
        }

    }
</script>

@endsection