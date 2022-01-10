@php
$adminid=session('uid');
@endphp
@if(empty($adminid))
<script>
// location.href="{{url('/login')}}";
</script>
@endif


<html>
    <head>
        <title>@yield('title')</title>
    </head>
    <body>
        <header>
            @include('nav')
            <section class="container row">
                <div class="col-sm-4">
                    @include('sidebar')
                </div>
                <div class="col-sm-8">
                    @yield('content')
                </div>
            </section>
        </header>
    </body>
</html>
