@extends('senior.admin.layouts.dashboard')
@section('title', 'Contacts | Prefect of Discipline Students Violation Monitoring System')
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
                        <li><a href="#">Dashboard</a></li>
                        <li>Contacts</li>
                    </ol>
                </div>
            </div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">List of Contacts</h3>
            </div>

        <div class="col-lg-6 pull-right">
            <div style="padding: 10px 5px;" class="pull-right btn-group dropdown-btn-group" >
                <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target="#contacts-add"><i class="md-contacts"></i> Add Contacts</button>
            </div>
        </div>
        @section('modal')
            @include('senior.sms.includes.modal')
        @show
            <div class="panel-body">
                <div class="row">
                    <div class="table-responsive col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <table id="datatable" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Contact no.</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                             <?php $c=1; ?>
                                @foreach($contacts as $contact)
                                    <tr>
                                        <td>{{$c}}</td>
                                        <td>{{$contact->name}}</td>
                                        <td>{{$contact->contact_no}}</td>
                                        <td><button data-tooltip="tooltip" data-placement="top" data-original-title="Update" data-toggle="modal" data-target="#contacts-update" type="button" class="btn-xs btn btn-purple waves-effect waves-light m-b-5 update"><i class="md md-border-color"></i></button>
                                            <button data-tooltip="tooltip" data-placement="top" data-original-title="Delete" data-toggle="modal" data-target="#contacts-delete" type="button" class="btn-xs btn btn-danger waves-effect waves-light m-b-5 delete" id="{{$contact->id}}"><i class="md md-delete"></i></button></td>
                                        <input type="hidden" value="{{$contact->id}}"/>
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
</div>
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
            $('#contacts-delete .confirmation').data('id',id);
        });

        $('#contacts-delete .confirmation').on('click', function(){
            window.location.href = "/senior/contact_delete/"+$(this).data('id');
        });



        $('.update').on('click', function(){
            var parent = $(this).parent().parent();
            var id = $(':nth-child(5)', parent).val();
            var name = $(':nth-child(2)', parent).html();
            var number = $(':nth-child(3)', parent).text();
            $('#contacts-update #name').val(name);
            $('#contacts-update #contact_no').val(number);
            $('#contacts-update #hiddenContact').val(id);
        });
    });
</script>
@section('footer')
    @include('senior.student.includes.footer')
@show
@endsection
