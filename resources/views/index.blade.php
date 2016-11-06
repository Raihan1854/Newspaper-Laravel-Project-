
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

    <title>@yield('title')</title>
    <link rel="icon" href="{URL::asset('Image/Heading.jpg')}" type="image/x-icon">

    <link href="{{ URL::asset('css/index.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('js/bootstrap.min.js') }}" rel="script">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/cc9e45a82f.js"></script>
</head>

<body>
    @include('website_layout.Header');
    @include('website_layout.Menubar');
    @include('website_layout.Breaking_news');
    @yield('Heading_News_content')
    @include('website_layout.Fotter');
</body>
</html>
