<!DOCTYPE HTML>
<html ng-app="blog">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Rachid Laasri</title>
    <meta name="description" content="Yet another web developer.">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
</head>
<body id="top">

<header id="header">
    <a ui-sref="home" class="image avatar">
        <img src="https://pbs.twimg.com/profile_images/601776860821762048/Gx_rYrND.jpg" alt="Rachid Laasri" />
    </a>
    <h1>
        I am <strong>Rachid Laasri</strong>, <br />
        PHP developer, Open Source enthusiast <br />
        I mostly write about <a href="http://laravel.com" target="_blank">Laravel</a>.
    </h1>
</header>

<div id="main">
    <div ui-view></div>
</div>

<footer id="footer">
    <ul class="icons">
        <li>
            <a href="https://twitter.com/RashidLaasri" class="icon fa-twitter" target="_blank">
                <span class="label">Twitter</span>
            </a>
        </li>
        <li>
            <a href="https://github.com/RachidLaasri" class="icon fa-github" target="_blank">
                <span class="label">Github</span>
            </a>
        </li>
    </ul>
    <ul class="copyright">
        <li><a href="https://github.com/RachidLaasri/Blog" target="_blank">Source Code</a></li>
        <li><a href="http://html5up.net" target="_blank">Design</a></li>
    </ul>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.15/angular-resource.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.2.15/angular-ui-router.js"></script>

<!-- Custom Angular JavaScript -->
<script src="{{ asset('js/app.js')}}"></script>
<script src="{{ asset('js/controllers.js')}}"></script>
<script src="{{ asset('js/services.js')}}"></script>
<script src="{{ asset('js/filters.js')}}"></script>

</body>
</html>