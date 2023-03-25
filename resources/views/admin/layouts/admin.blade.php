<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.layouts.head')
</head>
<body class="app sidebar-mini">
<!-- Navbar-->
<!-- Sidebar menu-->
@include('admin.layouts.header')
@include('admin.layouts.slide_bar')
<main class="app-content">
    @yield('content')
</main>
@include('admin.layouts.script')

@yield('script-after')
</body>
</html>