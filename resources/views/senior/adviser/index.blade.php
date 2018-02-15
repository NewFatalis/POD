
@extends('senior.admin.layouts.dashboard')
@section('title', 'Advisers | Prefect of Discipline Students Violation Monitoring System')
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
                        <li>Advisers</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">List of Advisers</h3>
                        </div>

                        <div class="col-lg-6 pull-right">
                            <div style="padding: 10px 5px;" class="pull-right btn-group dropdown-btn-group" >
                                <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target="#adviser-add"><i class="md md-person-add"></i> Add Adviser</button>
                            </div>
                        </div>
                        @section('modal')
                            @include('senior.adviser.includes.modal')
                        @show
                        <div class="panel-body">
                            <div class="row">
                                <div class="table-responsive col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Last Name</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php $c=1; ?>
                                        @foreach($advisers as $adviser)
                                            <tr>
                                                <td>{{$c}}</td>
                                                <td>{{$adviser->first_name}}</td>
                                                <td>{{$adviser->middle_name}}</td>
                                                <td>{{$adviser->last_name}}</td>
                                                <input type="hidden" value="{{$adviser->first_name}}" id="first_name">
                                    <input type="hidden" value="{{$adviser->middle_name}}" id="middle_name">
                                    <input type="hidden" value="{{$adviser->last_name}}" id="last_name">
                                                <td><button data-tooltip="tooltip" data-placement="top" data-original-title="" data-toggle="modal" data-target="#adviser-update" type="button" class="btn-xs btn btn-purple waves-effect waves-light m-b-5 update"><i class="md md-border-color"></i></button>
                                                     <button data-tooltip="tooltip" data-placement="top" data-original-title="Delete" data-toggle="modal" data-target="#adviser-delete" type="button" class="btn-xs btn btn-danger waves-effect waves-light m-b-5 delete" id="{{ $adviser->id }}"><i class="md md-delete"></i></button></td>
                                     <input type="hidden" value="{{$adviser->id}}"/>
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
            $('#adviser-delete .confirmation').data('id',id);
        });

        $('#adviser-delete .confirmation').on('click', function(){
            window.location.href = "/senior/adviser_delete/"+$(this).data('id');
        });

        $('.update').on('click', function(){
            var parent = $(this).parent().parent();
            var id = $(':nth-child(7)', parent).val();
            var first_name =  $(':nth-child(2)', parent).text();
            var middle_name =  $(':nth-child(3)', parent).text();
            var last_name =  $(':nth-child(4)', parent).text();
            $('#adviser-update #first_name').val(first_name);
            $('#adviser-update #middle_name').val(middle_name);
            $('#adviser-update #last_name').val(last_name);
            $('#adviser-update #hiddenAdviserId').val(id);
    });
});
</script>
@section('footer')
    @include('senior.student.includes.footer')
@show
@endsection