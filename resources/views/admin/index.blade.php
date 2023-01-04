<!doctype html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Saphir Admin</title>
    <link rel="stylesheet" href="{{mix('css/admin.css', 'vendor/saphir')}}">
</head>
<body>

<div id="root"></div>

<script src="{{mix('js/admin.js', 'vendor/saphir')}}"></script>
</body>
</html>
