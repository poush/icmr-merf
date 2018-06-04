@extends('layouts.app')

@section('content')

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

<div class="container my-24 mx-auto">
    <div class="flex items-center">
        <div class="md:w-1/2 md:mx-auto">
            <div class="rounded shadow">
                <div class="font-medium text-lg text-brand-darker bg-brand-lighter p-3 rounded-t">
                    Add Equipment
                </div>
                <div class="bg-white p-3 rounded-b">
                    <form class="form-horizontal" method="POST" action="{{ route('admin.institute-equipments.store') }}">
                        {{ csrf_field() }}

                        <div class="flex items-stretch mb-3">
                            <label for="name" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Name</label>
                            <div class="flex flex-col w-3/4">
                                <select name="equipment_name" id="equipment_name" class="equipment_dropdown_name block appearance-none w-full bg-white border border-grey-light hover:border-grey px-4 py-2 pr-8 rounded shadow" required>
                                </select>
                                {!! $errors->first('equipment_name', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}

                            </div>
                        </div>


                        <div class="flex items-stretch mb-3">
                            <label for="name" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Manufacturer</label>
                            <div class="flex flex-col w-3/4">
                                <select name="equipment_manufacturer" id="equipment_manufacturer" class="equipment_dropdown_manufacturer block appearance-none w-full bg-white border border-grey-light hover:border-grey px-4 py-2 pr-8 rounded shadow" required>
                                </select>
                                {!! $errors->first('equipment_manufacturer', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}

                            </div>
                        </div>


                        <div class="flex items-stretch mb-3">
                            <label for="model" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Model</label>
                            <div class="flex flex-col w-3/4">
                                <select name="equipment_model" id="equipment_model" class="equipment_dropdown_model block appearance-none w-full bg-white border border-grey-light hover:border-grey px-4 py-2 pr-8 rounded shadow" required>
                                </select>
                                {!! $errors->first('equipment_model', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}

                            </div>
                        </div>




                        <div class="flex items-stretch mb-3">
                            <label for="lab" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">Lab</label>
                            <div class="flex flex-col w-3/4">
                                <input id="lab" type="text" class="flex-grow h-8 px-2 border rounded {{ $errors->has('lab') ? 'border-red-dark' : 'border-grey-light' }}" name="lab" value="{{ old('lab') }}" required>
                                {!! $errors->first('lab', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                        </div>

                        <div class="flex">
                            <div class="w-3/4 ml-auto">
                                <button type="submit" class="bg-brand hover:bg-brand-dark text-white text-sm font-sembiold py-2 px-4 rounded mr-3">
                                    Add Equipment
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('after-script')

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script type="text/javascript">
    
    $('.equipment_dropdown_name').select2({
        placeholder: 'Enter Name',
        tags: true,
        ajax: {
            url: "{{ route('admin.api.equipments.search') }}",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    name: params.term,
                    type: 'name'
                };
            },
            processResults: function (data, params) {
              return {
                results: data
              };
            },
            cache: false
          },
          escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
          templateResult: function (repo) {
              if (repo.loading) return repo.name;
              var markup = "<div class='select2-result-repository clearfix'>" + repo.name + "</div>";
                return markup;
            }, 
          templateSelection: function (repo) {
                return repo.name || repo.name;
            } ,
            createTag: function (params) {
            var term = $.trim(params.term);

            if (term === '') {
              return null;
            }

            return {
              id: term,
              name: term,
              manufacturer: term,
              model: term
            }
          }
        });

    $('.equipment_dropdown_manufacturer').select2({
          placeholder: 'Enter Name',
          tags: true,
          ajax: {
            url: "{{ route('admin.api.equipments.search')}}",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    manufacturer: params.term,
                    type: 'manufacturer',
                    name: $('#equipment_name').select2('data')[0].name
                };
            },
            processResults: function (data, params) {
              return {
                results: data
              };
            },
            cache: false
          },
          escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
          templateResult: function (repo) {
              if (repo.loading) return repo.manufacturer;
              var markup = "<div class='select2-result-repository clearfix'>" + repo.manufacturer + "</div>";
                return markup;
            }, 
          templateSelection: function (repo) {
                return repo.manufacturer || repo.manufacturer;
            } ,
            createTag: function (params) {
            var term = $.trim(params.term);

            if (term === '') {
              return null;
            }

            return {
              id: term,
              name: term,
              manufacturer: term,
              model: term
            }
          }
    });

    $('.equipment_dropdown_model').select2({
          placeholder: 'Enter Modele No.',
          tags: true,
          ajax: {
            url: "{{ route('admin.api.equipments.search')}}",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    model_no: params.term,
                    type: 'model',
                    name: $('#equipment_name').select2('data')[0].name,
                    manufacturer: $('#equipment_manufacturer').select2('data')[0].name,

                };
            },
            processResults: function (data, params) {
              return {
                results: data
              };
            },
            cache: false
          },
          // id: function (item) { return item.id },
        // text: function (item) { return item.model },
          escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
          templateResult: function (repo) {
              if (repo.loading) return repo.model;
              var markup = "<div class='select2-result-repository clearfix'>" + repo.model + "</div>";
                return markup;
            }, 
          templateSelection: function (repo) {
                return repo.model || repo.model;
            } ,
            createTag: function (params) {
              console.log(params);
            var term = $.trim(params.term);

            if (term === '') {
              return null;
            }

            return {
              id: term,
              name: term,
              manufacturer: term,
              model: term
            }
          }
    });
</script>

@endsection
