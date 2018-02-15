<!DOCTYPE html>
<html lang="en">
@section('htmlheader')
    @include('junior.admin.includes.htmlheader')

@show
<body class="fixed-left">
    <div id="wrapper">
        @include('junior.admin.includes.header')
        @section('sidebar')
        @include('junior.admin.includes.sidebar')
        @show
        <div class="content-page">
            @yield('content')
        </div>
        @include('junior.admin.includes.footer')
    </div>
{{-- @section('scripts')
      @include('junior.admin.includes.scripts')
@show --}}
</body>
</html>