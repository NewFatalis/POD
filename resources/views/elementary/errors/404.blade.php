<!DOCTYPE html>
<html lang="en">

@section('title')
    <title>404 Error | Page Not Found
</title>
<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/core.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/components.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/pages.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('/404/css/style.css') }}">


<body id="particles-js">
    
<div >

      <div class="wrapper-page">
            <div class="ex-page-content text-center">
                <h1>404!</h1>
                <h2>Sorry, page not found</h2><br>
                <p style="font-size: 25px;">You better try our awesome search:</p>
               
                <a class="btn btn-purple waves-effect waves-light" href="index.html"><i class="fa fa-angle-left"></i> Back to Dashboard</a>
            </div>
        </div>
</div>


  <!-- stats.js lib -->
  <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> 
<script src="{{ asset('/404/js/main.js') }}"></script>

</body>
</html>