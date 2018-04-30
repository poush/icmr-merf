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
  	</h1>

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
                <td class="p-4 w-1/6"> {{ $equipment->name }}</td>
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

		    	</td>
		    </tr>
		    @endforeach
		</tbody>
	</table>
	
	{{ $equipments->links() }}

</div>

@endsection
