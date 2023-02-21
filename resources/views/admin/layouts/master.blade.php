<!DOCTYPE html>
<html lang="en">

<head>
    {{-- @php $setting =\App\Models\Setting::pluck('value','name')->toArray(); @endphp --}}
    @include('admin.partials._head')

    <link rel="stylesheet" href="{{asset('css/custom.css')}}">

    @yield('style')

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Preloader -->
        {{-- @include('admin.partials._pre_loader') --}}

        @include('admin.partials._nav_bar')

        @include('admin.partials._side_bar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="margin-left: 0">

            @yield('content')
        </div>

    </div>
    {{-- @include('admin.partials._footer') --}}

    @include('admin.partials._scripts')
    @yield('script')
</body>

</html>
