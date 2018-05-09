@extends('layouts.app')

@section('content')

<div class="container my-24 mx-auto">
    <div class="flex items-center">
        <div class="md:w-1/2 md:mx-auto">
            <div class="rounded shadow">
                <div class="font-medium text-lg text-brand-darker bg-brand-lighter p-3 rounded-t">
                    Category Details : {{ $category->name }}
                </div>
                <div class="bg-white p-3 rounded-b">
                    <div class="">
                        <label>Category Name</label> : {{ $category->name }}
                        <br/>
                        <label>Parent Category Name</label> : {{ $category->parent->name ?? '-' }}

                        <br/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

