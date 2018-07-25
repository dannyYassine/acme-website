<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Panel - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/css/all.css">
</head>
<body>

<div class="off-canvas-wrap" data-offcanvas>
    <div class="inner-wrap">
        <nav class="tab-bar">
            <section class="left-small">
                <a class="left-off-canvas-toggle menu-icon" href="#"><span></span></a>
            </section>

            <section class="middle tab-bar-section">
                <h1 class="title">Foundation</h1>
            </section>

            <section class="right-small">
                <a class="right-off-canvas-toggle menu-icon" href="#"><span></span></a>
            </section>
        </nav>

        <aside class="left-off-canvas-menu">
            <ul class="off-canvas-list">
                <li><label>Foundation</label></li>
                <li><a href="#">The Psychohistorians</a></li>
                <li><a href="#">...</a></li>
            </ul>
        </aside>

        <aside class="right-off-canvas-menu">
            <ul class="off-canvas-list">
                <li><label>Users</label></li>
                <li><a href="#">Hari Seldon</a></li>
                <li><a href="#">...</a></li>
            </ul>
        </aside>

        <section class="main-section">
            <!-- content goes here -->
            @yield('content')

        </section>

        <a class="exit-off-canvas"></a>

    </div>
</div>

<script src="/js/all.js"></script>
</body>
</html>