@extends('layouts.app')

@section('content')


<div class="container mt-3">

	<h1 class="mb-8">
		List of Users
  	</h1>

	<table class="table text-left w-full">
		<thead class="flex w-full">
		   <tr class="flex w-full mb-4">
		    	<th class="p-4 w-1/4">S.No. </th>
		      	<th class="p-4 w-1/4">Name</th>
		    	<th class="p-4 w-1/4">Email</th>
		      	<th class="p-4 w-1/4">Mobile</th>
		      	<th class="p-4 w-1/4">Role</th>
		      	<th class="p-4 w-1/4">Created On</th>
		      	<th class="p-4 w-1/4">Action(s)</th>
		    </tr>
		</thead>
		<tbody class="bg-grey-light flex flex-col items-center justify-between overflow-y-scroll w-full">
			@foreach( $users as $u => $user)
		  	<tr class="flex w-full mb-4">
		    	<th class="p-4 w-1/4">{{ $u + 1 }}</th>
		    	<td class="p-4 w-1/4"> {{ $user->name }}</td>
		    	<td class="p-4 w-1/4"> {{ $user->email }}</td>
		    	<td class="p-4 w-1/4"> {{ $user->mobile }}</td>
		    	<td class="p-4 w-1/4"> @switch( $user->role )
		    			@case('user')
		    				<span class="bg-blue text-white shadow rounded text-sm py-1 px-1">{{ config('mapping.roles.user') }}</span>
		    			    @break
		    			@case('institute')
		    				<span class="bg-blue text-white shadow rounded text-sm py-1 px-1">{{ config('mapping.roles.institue') }}</span>
		    				@break
		    			@case('editor')
		    				<span class="bg-purple text-white shadow rounded text-sm py-1 px-1">{{ config('mapping.roles.editor') }}</span>
		    				@break
		    			@case('super-admin')
		    				<span class="bg-red text-white shadow rounded text-sm py-1 px-1">{{ config('mapping.roles.super-admin') }}</span>
		    				@break
		    		 @endswitch
		    	</td>
		    	<td class="p-4 w-1/4"> {{ $user->created_at->format('d M Y H:i:s') }}</td>
		    	<td class="p-4 w-1/4">
		    		<button type="button" class="bg-blue-light text-white text-sm py-1 px-1">Edit</button>
		    		<button type="button" class="bg-blue text-white text-sm py-1 px-1">Change Role</button>
		    	</td>
		    </tr>
		    @endforeach
		</tbody>
	</table>
	
	{{ $users->links() }}

</div>

@endsection
