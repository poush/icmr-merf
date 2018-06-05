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
                <td class="p-4 w-1/6"> {{ config( 'mapping.booking_status.'.$booking->status, '' )}}</td>
		    	<td class="p-4 w-1/6"> {{ $booking->created_at->format('d M Y H:i:s') }}</td>
		    	<td class="p-4 w-1/6">
                    
                    <a href="{{ route('admin.bookings.action', [ $booking->id, 'action' => 'approve' ]) }}" class="bg-blue-light text-white text-sm py-1 px-1"> Approve </a>
                    <a href="{{ route('admin.bookings.action', [ $booking->id, 'action' => 'reject' ]) }}" class="bg-red text-white text-sm ml-2 py-1 px-1"> Reject </a>
		    	</td>
		    </tr>
		    @endforeach
		</tbody>
	</table>
	
	{{ $bookings->links() }}

</div>

@endsection
