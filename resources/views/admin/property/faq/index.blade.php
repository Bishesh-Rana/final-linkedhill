@extends('admin.layouts.master')
@section('title', 'Create Faq')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header card-header-tabs" data-background-color="red">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <span class="nav-tabs-title">FAQ:</span>
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="active">
                                        <a href="#panel1" data-toggle="tab" aria-expanded="false">
                                            <i class="material-icons">add</i>Create FAQ for {{ $property->title }} 
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('property-faqs-post', $property->id) }}" method="post"
                        enctype="multipart/form-data" id="parsleyValidationForm" data-parsley-validate="">
                        @csrf
                        <div class="card-content">

                            <div class="tab-content">

                                <div class="tab-pane active" id="panel1">

                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                            cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>S.N</th>
                                                    <th>Question</th>
                                                    <th>Answers</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody id="questionsAnswers">
                                                @foreach ($faqs as $item)
                                                    <tr>
                                                        <td class='serialNumber'></td>
                                                        <td>
                                                            <div class="form-group  label-floating">
                                                                <input class="form-control" name="questions[]" type="text"
                                                                    data-parsley-trigger="keyup"
                                                                    value="{{ $item->question }}" required />
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input class="form-control" name="answers[]" type="text"
                                                                    data-parsley-trigger="keyup"
                                                                    value="{{ $item->answer }}" required />
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <a href="#" class="btn btn-simple btn-danger btn-icon deleteRow"
                                                                rel="tooltip" data-original-title="Delete row"><i
                                                                    class="material-icons">close</i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        @error('questions')
                                                            {{ $message }}
                                                        @enderror
                                                    </td>
                                                    <td>
                                                        @error('answers')
                                                            {{ $message }}
                                                        @enderror
                                                    </td>


                                                </tr>
                                                <tr>
                                                    <td colspan="5" class="text-right">
                                                        <a href="#" class="btn btn-simple btn-danger btn-icon" id="addRow"
                                                            data-original-title="Add row"><i
                                                                class="material-icons">add</i></a>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>

                                </div>



                            </div>

                            <div class="form-footer text-right">
                                <div class="checkbox pull-left">
                                </div>
                                <button type="submit" class="btn  btn-fill btn-success float-right">Create</button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('css')
    <style>
        body {
            counter-reset: Serial;
        }

        tr td.serialNumber:first-child:before {
            counter-increment: Serial;
            /* Increment the Serial counter */
            content: counter(Serial);
            /* Display the counter */
        }

    </style>
@endpush


@push('script')
    <script>
        const template = `
                            <tr>
                            <td class='serialNumber'></td>
                            <td>
                            <div class="form-group  label-floating">
                                <input class="form-control" name="questions[]" type="text" data-parsley-trigger="keyup" required />
                            </div>
                        </td>
                      <td>
                            <div class="form-group">
                                <input class="form-control" name="answers[]" type="text"
                                    data-parsley-trigger="keyup" required />
                            </div>
                        </td>

                        <td>
                            <a href="#" class="btn btn-simple btn-danger btn-icon deleteRow" rel="tooltip" data-original-title="Delete row"><i class="material-icons">close</i></a>
                        </td>
                        </tr>`;

        $(document).ready(function() {
            if ($('#questionsAnswers tr').length == 0) {
                $('#questionsAnswers').append(template);
            }
            $('#addRow').on('click', function(e) {
                e.preventDefault();
                $('#questionsAnswers').append(template);
            });
            $(document).on('click', '.deleteRow', function(e) {
                e.preventDefault();
                $(this).parent().parent().remove();
            })
        })
    </script>
@endpush
