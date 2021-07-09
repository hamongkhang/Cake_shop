<!DOCTYPE html>
<html>
@include('admin.layouts.header')
<body>
@include('admin.modules.top-nav')
@include('admin.modules.left-nav')
	@yield('content')
@include('admin.layouts.footer')
</body>
</html>