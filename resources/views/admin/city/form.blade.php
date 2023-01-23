@extends('admin.layouts.master')
@section('title', 'City')
@push('css')
    <link rel="stylesheet" href="{{ asset('dashboard/css/select2/select2.min.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row">



            <div class="card">
                <div class="card-header card-header-tabs" data-background-color="red">
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            <span class="nav-tabs-title">City:</span>
                            <ul class="nav nav-tabs" data-tabs="tabs">
                                <li class="active">
                                    <a href="#panel1" data-toggle="tab" aria-expanded="false">
                                        <i class="material-icons">add</i>Add City
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#panel2" data-toggle="tab" aria-expanded="false">
                                        <i class="material-icons">travel_explore</i>SEO
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    @if (isset($city->id))
                        <form method="post" action="{{ route('city.update', $city->id) }}" class="form-horizontal"
                            enctype="multipart/form-data">
                            @method('PATCH')
                        @else
                            <form method="post" action="{{ route('city.store') }}" class="form-horizontal"
                                enctype="multipart/form-data">
                    @endif
                    @csrf
                    <div class="tab-content">
                        <div class="tab-pane active" id="panel1">
                            <x-image :value="$city->image" />
                            <div class="form-group col-md-6" style="margin-top:10px;">
                                <label class="label-style" for="city_id">Select Province </label>
                                <select class="form-control select2 select2-hidden-accessible" id="province_id"
                                    name="province_id" data-placeholder="Select City" style="width: 100%;" tabindex="-1"
                                    aria-hidden="true" required>
                                    <option value="0">Select Province</option>

                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->id }}"
                                            {{ $province->id == $city->province_id ? 'selected' : null }}>
                                            {{ $province->eng_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6" style="margin-top:10px;">
                                <label class="label-style" for="dis">Select District </label>
                                <select class="form-control select2 select2-hidden-accessible" id="district" name="district"
                                    data-placeholder="Select District" style="width: 100%;" tabindex="-1" aria-hidden="true"
                                    required>
                                </select>
                            </div>


                            <div class="form-group col-md-6">
                                <label class="control-label">Enter City Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $city->name }}">
                                @if ($errors->has('name'))
                                    <span class="error-message">
                                        *{{ $errors->first('name') }}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label class="control-label">Slug</label>
                                <input type="text" name="slug" id="slug" class="form-control" value="{{ $city->slug }}">
                                @if ($errors->has('slug'))
                                    <span class="error-message">
                                        *{{ $errors->first('slug') }}
                                    </span>
                                @endif
                            </div>

                        </div>
                        <div class="tab-pane" id="panel2">

                            <div class="row seo">
                                <div class="form-group margin-style col-md-12">
                                    <label>Keywords</label>
                                    <textarea name="meta_keyword" id="" cols="30" rows="3"
                                        class="form-control">{{ $city->meta_keyword }}</textarea>
                                    @if ($errors->has('meta_keyword'))
                                        <span class="error-message">
                                            *{{ $errors->first('meta_keyword') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group margin-style col-md-12" style="margin-top: 20px">
                                    <label>Description</label>
                                    <textarea name="meta_description" id="" cols="30" rows="3"
                                        class="form-control">{{ $city->meta_description }}</textarea>
                                    @if ($errors->has('meta_description'))
                                        <span class="error-message">
                                            *{{ $errors->first('meta_description') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-footer text-right">
                        <div class="checkbox pull-left">
                        </div>
                        <button type="submit" class="btn btn-fill btn-success float-right">Submit</button>
                    </div>
                    </form>
                </div>
            </div>




        </div>

    </div>
@endsection

@push('script')

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script>


        function convertToSlug(title) {
            return title
                .toLowerCase()
                .replace(/ /g, '-')
                .replace(/&/g, 'and')
                .replace(/[^\w-]+/g, '');

        }

        $('#name').on('keyup', function() {
            var title = $(this).val();
            var slug = convertToSlug(title);
            $('#slug').val(slug);
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatables').DataTable({
                //            "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records",
                }

            });


            var table = $('#datatables').DataTable();





        });
    </script>

    <script src="{{ asset('dashboard/js/select2/select2.full.min.js') }}"></script>

    <script>
        $(function() {
            $('#province_id').change(function() {
                var provinceId = $(this).children("option:selected").val();



                getDistricts(provinceId);
            })
            $(document).ready(function() {
                $(".select2").select2();
                getDistricts({{ $city->province_id ?? 0 }});
            });

            function districtSelect(districts) {
                document.getElementById("district").innerHTML =
                    districts.reduce((tmp, x) =>
                        `${tmp}<option value='${x.id}'>${x.en_name}</option>`, '');
            }

            function getDistricts(provinceId) {
                var uri = "{{ route('getDistricts', ':provinceId') }}"
                uri = uri.replace(":provinceId", provinceId);
                $.ajax({
                    url: uri,
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        var districts = response.districts;
                        districtSelect(districts);
                    }
                });
            }

        });
    </script>

@endpush
