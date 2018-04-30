@extends('layouts.app')

@section('content')


<div class="container my-12 mx-auto">

	<h1 class="mb-8">
		List of Users
		<a href="{{ route('admin.users.create') }}" class="text-right bg-blue-light text-white text-sm py-1 px-1 ml-8">
            Create New User
        </a>
  	</h1>

	<table class="table text-left w-full">
		<thead class="flex w-full">
		   <tr class="flex w-full mb-4">
		    	<th class="p-4">S.No. </th>
		      	<th class="p-4 w-1/6">Name</th>
		    	<th class="p-4 w-1/6">Email</th>
		      	<th class="p-4 w-1/6 text-center">Mobile</th>
		      	<th class="p-4 w-1/6 text-center">Role</th>
		      	<th class="p-4 w-1/6">Created On</th>
		      	<th class="p-4">Action(s)</th>
		    </tr>
		</thead>
		<tbody class="flex flex-col items-center justify-between overflow-y-scroll w-full">
			@foreach( $users as $u => $user)
		  	<tr class="flex w-full mb-4 border-b border-grey-light">
		    	<th class="p-4">{{ $u + 1 }}</th>
		    	<td class="p-4 w-1/6"> {{ $user->name }}</td>
		    	<td class="p-4 w-1/6"> {{ $user->email }}</td>
		    	<td class="p-4 w-1/6 text-right"> {{ $user->mobile }}</td>
				<td class="p-4 w-1/6 text-right"> 
					@switch( $user->role )
		    			@case('user')
		    				<span class="bg-blue text-white shadow rounded text-sm py-1 px-1">{{ config('mapping.roles.user') }}</span>
		    			    @break
		    			@case('institute')
		    				<span class="bg-blue text-white shadow rounded text-sm py-1 px-1">{{ config('mapping.roles.institute') }}</span>
		    				@break
		    			@case('editor')
		    				<span class="bg-purple text-white shadow rounded text-sm py-1 px-1">{{ config('mapping.roles.editor') }}</span>
		    				@break
		    			@case('super-admin')
		    				<span class="bg-red text-white shadow rounded text-sm py-1 px-1">{{ config('mapping.roles.super-admin') }}</span>
		    				@break
		    		 @endswitch
		    	</td>
		    	<td class="p-4 w-1/5"> {{ $user->created_at->format('d M Y H:i:s') }}</td>
		    	<td class="p-4">
		    		 <a href="{{ route('admin.users.edit', $user->id) }}" class="bg-blue-light text-white text-sm py-1 px-1">Edit</a>
		    	</td>
		    </tr>
		    @endforeach
		</tbody>
	</table>
	
	{{ $users->links() }}

</div>

@endsection
