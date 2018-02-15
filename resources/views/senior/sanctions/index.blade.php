
@extends('senior.admin.layouts.dashboard')
@section('title', 'Sanctions | Prefect of Discipline Students Violation Monitoring System')
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
                        <li>Sanction</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">List of Sanctions</h3>
                        </div>

                        <div class="col-lg-6 pull-right">
                            <div style="padding: 10px 5px;" class="pull-right btn-group dropdown-btn-group" >
                                <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target="#sanction-add"><i class="md md-person-add"></i> Add Sanction</button>
                            </div>
                        </div>
                        @section('modal')
                            @include('senior.sanctions.includes.modal')
                        @show
                        <div class="panel-body">
                            <div class="row">
                                <div class="table-responsive col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Sanction</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                      	<?php $c=1; ?>
                            			@foreach($sanctions as $sanction)
                                            <tr>
                                                <td>{{$c}}</td>
                                                 <td id="violation-{{ $sanction->id }}">{{ $sanction->sanction }}</td>
                                               
                                                <td><button data-tooltip="tooltip" data-placement="top" data-original-title="Update" data-toggle="modal" data-target="#sanction-update" type="button" class="btn-xs btn btn-purple waves-effect waves-light m-b-5 update"><i class="md md-border-color" id="{{ $sanction->id }}"></i></button>
                                                 <button data-tooltip="tooltip" data-placement="top" data-original-title="Delete" data-toggle="modal" data-target="#sanction-delete" type="button" class="btn-xs btn btn-danger waves-effect waves-light m-b-5 delete" id="{{ $sanction->id }}"><i class="md md-delete"></i></button></td>
                                                 <input type="hidden" id="sanc_id" value="{{ $sanction->sanction }}">
                                  		</tr>
                                  		<?php $c++; ?>
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
            window.location.href = "/senior/sanction/delete/"+$(this).data('id');
        });

        $('.update').on('click', function(){
            var updateId = $(this).attr('id');
        
            $('textarea[name=sanction]').text($('#sanction-'+updateId).text());
            $('input[name=id]').val(updateId);
        });

        $('.close, .close2').on('click', function(){
            removeInputs();
        });

    });
    function removeInputs() {
        
        $('textarea[name=sanction]').text("");
        $('input[name=id]').val("");
    }
</script>
@section('footer')
    @include('senior.student.includes.footer')
@show
@endsection