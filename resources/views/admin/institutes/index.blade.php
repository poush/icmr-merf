@extends('layouts.app')

@section('content')


<div class="container mt-3">

    <h1 class="mb-8">
        List of institutes

        <a href="{{ route('admin.institutes.create') }}" class="text-right bg-blue-light text-white text-sm py-1 px-1">
            Create
        </a>
    </h1>

    <table class="table text-left w-full">
        <thead class="flex w-full">
           <tr class="flex w-full mb-4">
                <th class="p-4 w-1/4">S.No. </th>
                <th class="p-4 w-1/4">Name</th>
                <th class="p-4 w-1/4">City</th>
                <th class="p-4 w-1/4">Created On</th>
                <th class="p-4 w-1/4">Action(s)</th>
            </tr>
        </thead>
        <tbody class="bg-grey-light flex flex-col items-center justify-between overflow-y-scroll w-full">
            @foreach( $institutes as $u => $institute)
            <tr class="flex w-full mb-4">
                <th class="p-4 w-1/4">{{ $u + 1 }}</th>
                <td class="p-4 w-1/4"> {{ $institute->name }}</td>
                <td class="p-4 w-1/4"> {{ $institute->city }}</td>
                <td class="p-4 w-1/4"> {{ $institute->created_at->format('d M Y H:i:s') }}</td>
                <td class="p-4 w-1/4">
                    <a href="{{ route('admin.institutes.edit', $institute->id) }}" class="bg-blue-light text-white text-sm py-1 px-1">Edit</a>
                    <a href="{{ route('admin.institutes.show', $institute->id) }}" class="bg-blue text-white text-sm py-1 px-1">Show</a>
                    <a href="{{ route('admin.users.create-admin', $institute->id) }}" class="bg-blue text-white text-sm py-1 px-1">Add Admin</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    {{ $institutes->links() }}

</div>

@endsection
