@extends('senior.admin.layouts.dashboard')
@section('title', 'Compose Message | Prefect of Discipline Students Violation Monitoring System')
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
                    <li>Compose</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Compose your message</h3>
                    </div>
                <div class="panel-body">
                    <form action="{{ route('senior.sendSMS')}}" method="post" class="form-horizontal">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="col-sm-1 control-label">Send to:</label>
                            <div class="col-sm-11">
                                <select class="select2 form-control" name="receiver[]" multiple="multiple" data-placeholder="With Max Selection Limit 20" >
                                    <option selected disabled>Please select receiver</option>
                                    @foreach($contacts as $contact)
                                        <option value="{{$contact->contact_no}}">{{$contact->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label">Message:</label>
                            <div class="col-sm-11">
                            <textarea rows="5" name="message" class="col-sm-11 form-control" placeholder="Write your message..." required="required"></textarea>
                            </div>
                        </div>
                        <button class="pull-right btn btn-info waves-effect waves-light"><span class="fa fa-send"></span> Send Now</button>
                    </form>
                    </div> <!-- panel-body -->
                </div>
            </div>
        </div>
    </div>
</div>
@section('footer')
    @include('senior.sms.includes.footer')
@show

@endsection
