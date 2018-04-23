@extends('layouts.app')

@section('content')


<div class="container mt-3">

	<h1 class="mb-8">
		List of equipments

		 <a href="{{ route('admin.equipments.create') }}" class="text-right bg-blue-light text-white text-sm py-1 px-1">
            Create
        </a>
  	</h1>

	<table class="table text-left w-full">
		<thead class="flex w-full">
           <tr class="flex w-full mb-4">
                <th class="p-4 w-1/4">S.No. </th>
                <th class="p-4 w-1/4">Name</th>
                <th class="p-4 w-1/4">Manufacturer</th>
                <th class="p-4 w-1/4">Model</th>
                <th class="p-4 w-1/4">Quantity</th>
                <th class="p-4 w-1/4">Is Working</th>
                <th class="p-4 w-1/4">Location</th>
                <th class="p-4 w-1/4">Created On</th>
                <th class="p-4 w-1/4">Action(s)</th>
            </tr>
        </thead>
        <tbody class="bg-grey-light flex flex-col items-center justify-between overflow-y-scroll w-full">
            @foreach( $equipments as $u => $equipment)
            <tr class="flex w-full mb-4">
                <th class="p-4 w-1/4">{{ $u + 1 }}</th>
                <td class="p-4 w-1/4"> {{ $equipment->name }}</td>
                <td class="p-4 w-1/4"> {{ $equipment->manufacturer }}</td>
                <td class="p-4 w-1/4"> {{ $equipment->model }}</td>
                <td class="p-4 w-1/4"> {{ $equipment->quantity }}</td>
                <td class="p-4 w-1/4"> {{ $equipment->is_working ? 'Yes': 'No' }}</td>
                <td class="p-4 w-1/4"> {{ $equipment->location }}</td>

		    	<td class="p-4 w-1/4"> {{ $equipment->created_at->format('d M Y H:i:s') }}</td>
		    	<td class="p-4 w-1/4">
		    		 <a href="{{ route('admin.equipments.edit', $equipment->id) }}" class="bg-blue-light text-white text-sm py-1 px-1">Edit</a>
                    <a href="{{ route('admin.equipments.show', $equipment->id) }}" class="bg-blue text-white text-sm py-1 px-1">Show</a>
		    	</td>
		    </tr>
		    @endforeach
		</tbody>
	</table>
	
	{{ $equipments->links() }}

</div>

@endsection
