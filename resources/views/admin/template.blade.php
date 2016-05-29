<html>
<head>


    {!! HTML::style('assets/css/bootstrap.min.css') !!}
    {!! HTML::style('assets/css/admin.css') !!}
</head>
<body>
<div class="wrapper">


    @include('admin.nav')


    @include('admin.messages')

    <div class="container-fluid">
        <div class="row min-height-row">
            <div class="col-md-12">
                @yield('section')
            </div>
        </div>
    </div>

</div>

{!! HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js') !!}
{!! HTML::script('assets/js/bootstrap.min.js') !!}
</body>
</html>