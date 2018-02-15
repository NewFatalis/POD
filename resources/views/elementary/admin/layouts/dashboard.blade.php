<!DOCTYPE html>
<html lang="en">
@section('htmlheader')
    @include('elementary.admin.includes.htmlheader')

@show
<body class="fixed-left">
    <div id="wrapper">
        @include('elementary.admin.includes.header')
        @section('sidebar')
        @include('elementary.admin.includes.sidebar')
        @show
        <div class="content-page">
            @yield('content')
        </div>
        @include('elementary.admin.includes.footer')
    </div>
{{-- @section('scripts')
      @include('elementary.admin.includes.scripts')
@show --}}
</body>
</html>