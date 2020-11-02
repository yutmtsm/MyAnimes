<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=yes">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        
        <!-- アドレスバー等のブラウザのUIを非表示 -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <!-- default（Safariと同じ） / black（黒） / black-translucent（ステータスバーをコンテンツに含める） -->
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <!-- ホーム画面に表示されるアプリ名 -->
        <meta name="apple-mobile-web-app-title" content="Moneybike">
        <!-- ホーム画面に表示されるアプリアイコン -->
        <link rel="apple-touch-icon" href="https://yutmtsm.s3-ap-northeast-1.amazonaws.com/bikes/9LIBAh8NtLNb2GmVpa2oNQtBGpvimNUx1zhK4hfQ.jpeg">

        <title>@yield('title')</title>
        
        <!-- asset(‘ファイルパス’)は、publicディレクトリのパスを返す関数 -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src='https://api.tiles.mapbox.com/mapbox.js/v2.0.0/mapbox.js'></script>
        <link href='https://api.tiles.mapbox.com/mapbox.js/v2.0.0/mapbox.css' rel='stylesheet' />
         {{-- Laravel標準で用意されているJavascriptを読み込みます --}}
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/common.css') }}" rel="stylesheet">
        <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
        <link href="{{ asset('css/' . $__env->yieldContent('css') ) }}" rel="stylesheet">
        
        <!-- Font Awesome -->
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    </head>
    <body>
        
    </body>
</html>