
@extends('elementary.admin.layouts.dashboard')
@section('title', 'Violations & Sanctions | Prefect of Discipline Students Violation Monitoring System')
@section('content')
    <div class="content">
        @if (Session::has('message'))
            <div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissable fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ Session::get('message') }}
            </div>
        @endif
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{url('/home')}}">Dashboard</a></li>
                        <li>Violations &amp; Sanctions</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">List of Violations</h3>
                        </div>

                        <div class="col-lg-6 pull-right">
                            <div style="padding: 10px 5px;" class="pull-right btn-group dropdown-btn-group" >
                                <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target="#violation-add"><i class="md md-person-add"></i> Add Violation</button>
                            </div>
                        </div>
                        @section('modal')
                            @include('elementary.violations.includes.modal')
                        @show
                        <div class="panel-body">
                            <div class="row">
                                <div class="table-responsive col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Violation</th>
                                            {{-- <th>1st Sanction</th>
                                            <th>2nd Sanction</th>
                                            <th>3rd Sanction</th>
                                            <th>4th Sanction</th>
                                            <th>5th Sanction</th>
                                            <th>6th Sanction</th>
                                            <th>7th Sanction</th> --}}
                                            <th>Actions</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($violations as $violation)
                                            <tr>
                                                <td id="category-{{ $violation->id }}">{{Config::get('constants.violation_name.'.$violation->category)}}</td>
                                                <td id="violation-{{ $violation->id }}">{{ $violation->violation }}</td>
                                                {{-- <td id="first-{{ $violation->id }}">{{ $violation->first_sanction }}</td>
                                                <td id="second-{{ $violation->id }}">{{ $violation->second_sanction }}</td>
                                                <td id="third-{{ $violation->id }}">{{ $violation->third_sanction }}</td>
                                                <td id="fourth-{{ $violation->id }}">{{ $violation->fourth_sanction }}</td>
                                                <td id="fifth-{{ $violation->id }}">{{ $violation->fifth_sanction }}</td>
                                                <td id="sixth-{{ $violation->id }}">{{ $violation->sixth_sanction }}</td>
                                                <td id="seventh-{{ $violation->id }}">{{ $violation->seventh_sanction }}</td> --}}
                                                <td><button data-tooltip='tooltip' data-placement='top' data-original-title='Update' data-toggle='modal' data-target='#violation-update' type='button' class='btn-xs btn btn-purple waves-effect waves-light m-b-5 update' id="{{ $violation->id }}"><i class='md md-border-color'></i></button>
                                                    <button data-tooltip='tooltip' data-placement='top' data-original-title='Delete' data-toggle='modal' data-target='#violation-delete' type='button' class='btn-xs btn btn-danger waves-effect waves-light m-b-5 delete' id="{{ $violation->id }}"><i class="md md-delete"></i></button></td>
                                                <input type="hidden" id="vio_id" value="{{ $violation->category }}">
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End Row -->

            <div style="visibility: hidden;" class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Responsive Table</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Username</th>
                                            <th>Age</th>
                                            <th>City</th>
                                        </tr>
                                        </thead>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.delete').on('click', function(){
                var id = $(this).attr('id');
                $('.confirmation').data('id',id);
            });

            $('.confirmation').on('click', function(){
                window.location.href = "/elementary/delete/"+$(this).data('id');
            });

            $('.update').on('click', function(){
                var updateId = $(this).attr('id');
                $('#exampleFormControlSelect2').val($('#vio_id').val());
                $('textarea[name=violation]').text($('#violation-'+updateId).text());
                // $('input[name=first_sanction]').val($('#first-'+updateId).text());
                // $('input[name=second_sanction]').val($('#second-'+updateId).text());
                // $('input[name=third_sanction]').val($('#third-'+updateId).text());
                // $('input[name=fourth_sanction]').val($('#fourth-'+updateId).text());
                // $('input[name=fifth_sanction]').val($('#fifth-'+updateId).text());
                // $('input[name=sixth_sanction]').val($('#sixth-'+updateId).text());
                // $('input[name=seventh_sanction]').val($('#seventh-'+updateId).text());
                $('input[name=id]').val(updateId);
            });

            $('.close, .close2').on('click', function(){
                removeInputs();
            });

        });
        function removeInputs() {
            $('#exampleFormControlSelect2').val("");
            $('textarea[name=violation]').text("");
            // $('input[name=first_sanction]').val("");
            // $('input[name=second_sanction]').val("");
            // $('input[name=third_sanction]').val("");
            // $('input[name=fourth_sanction]').val("");
            // $('input[name=fifth_sanction]').val("");
            // $('input[name=sixth_sanction]').val("");
            // $('input[name=seventh_sanction]').val("");
            $('input[name=id]').val("");
        }
    </script>
@section('footer')
    @include('elementary.student.includes.footer')
@show
@endsection
