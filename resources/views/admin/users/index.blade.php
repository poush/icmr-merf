@extends('layouts.app')

@section('content')


<div class="container my-12 mx-auto">

	<h1 class="mb-8">
		List of Users
		<a href="{{ route('admin.users.create') }}" class="text-right bg-blue-light text-white text-sm py-1 px-1 ml-8">
            Create New User
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
  					<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-2 px-4 leading-tight" id="grid-last-name" type="text" name="institute_name" value="{{ request('institute_name') }}" placeholder="Institute Name">
  				</div>
  				@endif
  				<div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
					<div class="w-2/4 ml-auto">
                        <button type="submit" class="bg-brand hover:bg-brand-dark text-white text-sm font-sembiold py-2 my-6 px-4 rounded mr-3">
                            Search
                        </button>
                        <a href="{{ route('admin.users.index') }}" class="bg-grey hover:bg-brand-grey text-white text-sm font-sembiold py-2 my-6 px-4 rounded mr-3">
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
		    				<span class="bg-blue text-white shadow rounded text-sm py-1 px-1">{{ config('mapping.roles.institute')}}</span>
		    				<br/>
		    				<span class="bg-green text-white shadow rounded text-sm py-1 px-1">{{ $user->institute()->first()->name}}
		    				</span>
		    				@break
		    			@case('editor')
		    				<span class="bg-purple text-white shadow rounded text-sm py-1 px-1">{{ config('mapping.roles.editor') }}</span>
		    				<br/>
		    				<span class="bg-green text-white shadow rounded text-sm py-1 px-1">{{ $user->institute()->first()->name}}
		    				</span>
		    				@break
		    			@case('super-admin')
		    				<span class="bg-red text-white shadow rounded text-sm py-1 px-1">{{ config('mapping.roles.super-admin') }}</span>
		    				@break
		    			@case('internal')
		    				<span class="bg-blue-light text-white shadow rounded text-sm py-1 px-1">{{ config('mapping.roles.internal') }}</span>
		    				@break
		    		 @endswitch
		    	</td>
		    	<td class="p-4 w-1/5"> {{ $user->created_at->format('d M Y H:i:s') }}</td>
		    	<td class="p-4 pr-2">
		    		 <a href="{{ route('admin.users.edit', $user->id) }}" class="bg-blue-light text-white text-sm py-1 px-1">Edit</a>
		    	</td>
		    	<td class="p-4 pl-2">
		    			<a href="{{ route('admin.users.show', $user->id) }}" class="bg-blue text-white text-sm py-1 px-1">Show</a>
		    	</td>

		    </tr>
		    @endforeach
		</tbody>
	</table>
	
	{{ $users->links() }}

</div>

@endsection
