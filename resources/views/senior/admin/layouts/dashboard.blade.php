<!DOCTYPE html>
<html lang="en">
@section('htmlheader')
    @include('senior.admin.includes.htmlheader')

@show
<body class="fixed-left">
    <div id="wrapper">
        @include('senior.admin.includes.header')
        @section('sidebar')
        @include('senior.admin.includes.sidebar')
        @show
        <div class="content-page">
            @yield('content')
        </div>
        @include('senior.admin.includes.footer')
    </div>
{{-- @section('scripts')
      @include('senior.admin.includes.scripts')
@show --}}

</body>
</html>