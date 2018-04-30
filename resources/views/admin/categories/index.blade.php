@extends('layouts.app')

@section('content')


<div class="container my-16 mx-auto">

    <h1 class="mb-8">
        List of categories

        <a href="{{ route('admin.categories.create') }}" class="text-right bg-blue-light text-white text-sm py-1 px-1">
            Create
        </a>
    </h1>

    <table class="table text-left w-full">
        <thead class="flex w-full">
           <tr class="flex w-full mb-4">
                <th class="p-4">S.No. </th>
                <th class="p-4 w-1/3">Name</th>
                <th class="p-4 w-1/3">Created On</th>
                <th class="p-4 w-1/3">Action(s)</th>
            </tr>
        </thead>
        <tbody class="flex flex-col items-center justify-between overflow-y-scroll w-full">
            @foreach( $categories as $u => $category)
            <tr class="flex w-full mb-4 border-b border-grey-light">
                <th class="p-4">{{ $u + 1 }}</th>
                <td class="p-4 w-1/3"> {{ $category->name }}</td>
                <td class="p-4 w-1/3"> {{ $category->created_at->format('d M Y H:i:s') }}</td>
                <td class="p-4 w-1/3">
                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="bg-blue-light text-white text-sm py-1 px-1">Edit</a>
                    <a href="{{ route('admin.categories.show', $category->id) }}" class="bg-blue text-white text-sm py-1 px-1">Show</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    {{ $categories->links() }}

</div>

@endsection
