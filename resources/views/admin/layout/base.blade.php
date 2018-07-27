<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Panel - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="/css/all.css">
    <script src="https://use.fontawesome.com/e8aff9ba76.js"></script>
</head>
<body>

@include('includes.side-bar')

<div class="off-canvas-content admin_title_bar" data-off-canvas-content>
    <div class="title-bar">
        <div class="title-bar-left">
            <button class="menu-icon hide-for-large" type="button" data-open="offCanvasLeft"></button>
            <span class="title-bar-title">{{ getenv('APP_NAME')  }}</span>
        </div>
    </div>
    @yield('content')

</div>

<script src="/js/all.js" type="text/javascript"></script>
</body>
</html>