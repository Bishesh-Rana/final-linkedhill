@extends('admin.layouts.master')
@section('title', 'Edit Advertisement')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header card-header-tabs" data-background-color="red">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <span class="nav-tabs-title">Advertisement:</span>
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="active">
                                        <a href="#panel1" data-toggle="tab" aria-expanded="false">
                                            <i class="material-icons">settings</i>Edit Advertisement
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    @if ($advertisement->id)
                        <form action="{{ route('advertisements.update', $advertisement->id) }}" method="post"
                            enctype="multipart/form-data" id="parsleyValidationForm" data-parsley-validate="">
                            @method('put')
                        @else
                            <form action="{{ route('advertisements.store') }}" method="post" enctype="multipart/form-data"
                                id="parsleyValidationForm" data-parsley-validate="">
                    @endif

                    @csrf

                    <div class="card-content">

                        <div class="tab-content">

                            <div class="tab-pane active" id="panel1">
                                <x-image value="{{ $advertisement->image }}" />

                                <div class="col-md-6">
                                    <div class="form-group  label-floating">
                                        <label class="label-style">
                                            Enter Title
                                        </label>
                                        <input class="form-control" name="title" value="{{ $advertisement->title }}"
                                            id="title" type="text" data-parsley-trigger="keyup" required />
                                        @error('title')
                                            <span class="error-message">
                                                *{{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group  label-floating">
                                        <label class="label-style">
                                            External Url
                                        </label>
                                        <input class="form-control" name="external_url"
                                            value="{{ $advertisement->external_url }}" type="text"
                                            data-parsley-trigger="keyup" required />

                                        @error('external_url')
                                            <span class="error-message">
                                                *{{ $message }}
                                            </span>
                                        @enderror

                                    </div>
                                </div>

                                <div class="form-group col-md-4" style="margin-top:10px;">
                                    <label class="label-style">Select Page Position </label>
                                    {!! Form::select('page', $advertisement::PAGE, $advertisement->page, ['class' => 'form-control select2', 'required' => true, 'placeholder' => 'Select Page', 'id' => 'pageSection']) !!}
                                    @error('page')
                                        <span class="error-message">
                                            *{{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4" style="margin-top:10px;">
                                    <label class="label-style">Select Section </label>
                                    <select class="form-control select2" name="section" id="dynamicSection"></select>
                                    @error('section')
                                        <span class="error-message">
                                            *{{ $message }}
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-group col-md-4" style="margin-top:10px;">
                                    <label class="label-style">Select Direction </label>
                                    {!! Form::select('direction', $advertisement::DIRECTION, $advertisement->direction, ['class' => 'form-control select2', 'required' => true, 'placeholder' => 'Select Advertisement Direction']) !!}
                                    @error('direction')
                                        <span class="error-message">
                                            *{{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4" style="margin-top:10px;">
                                    <label class="label-style">Show On </label>
                                    {!! Form::select('show_on', $advertisement::DISPLAY, $advertisement->show_on, ['class' => 'form-control select2', 'required' => true]) !!}
                                    @error('show_on')
                                        <span class="error-message">
                                            *{{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4" style="margin-top:10px;">
                                    <label class="label-style">Size </label>
                                    {!! Form::select('size', $advertisement::SIZEDISPLAY, $advertisement->size, ['class' => 'form-control select2', 'required' => true]) !!}
                                    @error('size')
                                        <span class="error-message">
                                            *{{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="togglebutton">
                                            <label class="lead"
                                                style="color:black;font-weight:bold;font-size:11pt;">
                                                Non Featured <input type="checkbox" name="active" value="1"
                                                    @if ($advertisement->active) checked @endif> Featured
                                            </label>
                                        </div>
                                        @error('active')
                                            <span class="error-message">
                                                *{{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="clearfix"></div>


                            </div>



                        </div>

                        <div class="form-footer text-right">
                            <div class="checkbox pull-left">
                            </div>
                            <button type="submit" class="btn  btn-fill btn-success float-right">Submit</button>
                        </div>

                    </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
@endsection

@push('script')
    <script>
        var pages = <?php echo json_encode($advertisement::SECTION); ?>;
        const section = "<?php echo $advertisement->section; ?>";
        var template = `<option value="VALUE">LIST</option>`;
        $(document).ready(function() {
            arrayOfPages = Object.keys(pages).map((key) => [(key), pages[key]]);
            $('#pageSection').on('change', function() {
                option = '';
                arr = arrayOfPages.filter((item) => item.toString().includes($(this).val()));
                arr.forEach(element => option +=
                    `<option value="${element[0]}" ${section == element[0]  ?  'selected' :  null}> ${element[1]}</option>`
                    );
                $('#dynamicSection').html(option);

            });
            $('#pageSection').trigger('change');

        })
    </script>
@endpush
