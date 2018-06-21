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
                <th class="p-4 w-1/6">Requested By</th>
                <th class="p-4 w-1/6">Requester's Role</th>
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
                <td class="p-4 w-1/6">{{ $booking->user->name ?? '' }}</td>
                <td class="p-4 w-1/6">
                    <span class="bg-black text-white shadow rounded text-sm py-1 px-1">
                        {{ $booking->user->role ?? '' }}
                    </span>
                </td>
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

                    <a class="bg-blue-light text-white text-sm py-1 px-1" href="{{ route('admin.bookings.show', $booking->order_id) }}"> Show </button>

		    	</td>
		    </tr>
		    @endforeach
		</tbody>
	</table>
	
	{{ $bookings->links() }}

</div>

@endsection