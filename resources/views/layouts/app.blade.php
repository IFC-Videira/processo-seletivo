

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 <!--
    <link href="/Laravel/ProjetoIrineu/public/css/mui.min.css" rel="stylesheet" type="text/css" />
    <script src="/Laravel/ProjetoIrineu/public/js/mui.min.js"></script>
-->
    <link href="/css/mui.min.css" rel="stylesheet" type="text/css" />
    
    <script src="/js/mui.min.js"></script>
   
    <script src="/js/jquery-2.1.4.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>

    <script src="/js/viaCep.js"></script>

    <!-- CSRF Token -->

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'CRUD JOHN') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Styles -->
    <!-- Styles -->
    <style>
        /**
        * Body CSS
        */

        .mui-appbar {
            background-color: #1f871f;
            color: #FFF;
        }

        .mui--text-title, h3 {
            font-weight: 400;
            font-size: 20px;
            line-height: 28px;
            color: #FFF;
        }

        html,
        body {
        height: 100%;
        font-family: 'Roboto', sans-serif;
        }

        html,
        body,
        input,
        textarea,
        buttons {
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.004);
        }


        /**
        * Header CSS
        */
        header {
        position: fixed;
        background-color: #f00;
        top: 0;
        right: 0;
        left: 0;
        z-index: 2;
        font-family: 'Roboto', sans-serif;
        }

        #header {
        position: fixed;
        top: 0;
        right: 0;
        left: 0;
        z-index: 2;
        transition: left 0.2s;
        }


        #sidedrawer {
        position: fixed;
        top: 0;
        bottom: 0;
        width: 200px;
        left: -200px;
        overflow: auto;
        z-index: 2;
        background-color: #fff;
        transition: transform 0.2s;
        font-size: 12px;
        }

        #sidedrawer.active {
        transform: translate(200px);
        }

        .sidedrawer-toggle {
        color: #fff;
        cursor: pointer;
        font-size: 20px;
        line-height: 20px;
        margin-right: 10px;
        }

        .sidedrawer-toggle:hover {
        color: #fff;
        text-decoration: none;
        }

        /**
        * Side drawer CSS
        */
        #sidedrawer-brand {
        padding-left: 20px;
        }

        #sidedrawer ul {
        list-style: none;
        }

        #sidedrawer > ul {
        padding-left: 0px;
        }

        #sidedrawer > ul > li:first-child {
        padding-top: 15px;
        }

        #sidedrawer strong {
        display: block;
        padding: 15px 22px;
        cursor: pointer;
        }

        #sidedrawer strong:hover {
        background-color: #E0E0E0;
        }

        #sidedrawer strong + ul > li {
        padding: 6px 0px;
        }

        .drawertitle{
           color:#9F9FA7;
           font-size:20;
           margin-left: 20px;
           margin-top: 15px;
        }

        .dash{
           margin-top:15px;
           border-bottom: solid #E0E0E0;
           border-width: 1px;
        }<div class="mui-container-fluid">
                <form action="{{url('specialneeds/create')}}" style="margin-left: 100px; margin-bottom: -20px;">
                    <button class="mui-btn mui-btn--fab mui-btn--primary">+</button>
                </form>
            </div>

        header ul.mui-list--inline {
        margin-bottom: 0;
        }

        header a {
        color: white;
        }
        

        header table {
        width: 100%;
        }


        /**
        * Content CSS
        */
        #content-wrapper {
        min-height: 30%;

        /* sticky footer */
        box-sizing: border-box;
        margin-bottom: -100px;
        padding-bottom: 100px;
        }

        .drawer {
            width: 10px;
        }

        .logo {
            margin-left: 10px;
        }

        /**
        * Footer CSS
        */
        footer {
        box-sizing: border-box;
        height: 100px;
        background-color: #eee;
        border-top: 1px solid #e0e0e0;
        padding-top: 35px;
        }

        .fixed-action-btn {
        position: fixed;
        right: 23px;
        bottom: 23px;
        padding-top: 15px;
        margin-bottom: 0;
        z-index: 997;
        }

        .fixed-action-btn.active ul {
        visibility: visible;
        }

        .fixed-action-btn.horizontal {
        padding: 0 0 0 15px;
        }

        .fixed-action-btn.horizontal ul {
        text-align: right;
        right: 64px;
        top: 50%;
        -webkit-transform: translateY(-50%);
                transform: translateY(-50%);
        height: 100%;
        left: auto;
        width: 500px;
        /*width 100% only goes to width of button container */
        }

        .fixed-action-btn.horizontal ul li {
        display: inline-block;
        margin: 15px 15px 0 0;
        }

        .fixed-action-btn.toolbar {
        padding: 0;
        height: 56px;
        }

        .fixed-action-btn.toolbar.active > a i {
        opacity: 0;
        }

        .fixed-action-btn.toolbar ul {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        top: 0;
        bottom: 0;
        z-index: 1;
        }

        .fixed-action-btn.toolbar ul li {
        -webkit-box-flex: 1;
        -webkit-flex: 1;
            -ms-flex: 1;
                flex: 1;
        display: inline-block;
        margin: 0;
        height: 100%;
        -webkit-transition: none;
        transition: none;
        }

        .fixed-action-btn.toolbar ul li a {
        display: block;
        overflow: hidden;
        position: relative;
        width: 100%;
        height: 100%;
        background-color: transparent;
        -webkit-box-shadow: none;
                box-shadow: none;
        color: #fff;
        line-height: 56px;
        z-index: 1;
        }

        .fixed-action-btn.toolbar ul li a i {
        line-height: inherit;
        }

        .fixed-action-btn ul {
        left: 0;
        right: 0;
        text-align: center;
        position: absolute;
        bottom: 64px;
        margin: 0;
        visibility: hidden;
        }

        .fixed-action-btn ul li {
        margin-bottom: 15px;
        }

        .fixed-action-btn ul a.btn-floating {
        opacity: 0;
        }

        .fixed-action-btn .fab-backdrop {
        position: absolute;
        top: 0;
        left: 0;
        z-index: -1;
        width: 40px;
        height: 40px;
        background-color: #26a69a;
        border-radius: 50%;
        -webkit-transform: scale(0);
                transform: scale(0);
        }

        ol, ul {
            margin-top: 0;
            margin-bottom: 0px;
        }
</style>
</head>
<body>
    <div id="app">
    @guest
                                    
    @else
    <div id="sidedrawer" class="mui--no-user-select">
    <ul>
    <div class="drawertitle">Processo Seletivo</div>
    <div class="dash"></div>
        <li>
            <a href="{{url('/home') }}" style="text-decoration: none;"><strong style="color: #000; font-size:12;">Home</strong></a>
           
            @if (Auth::user()->permission)
            
            <strong style="color: #000; font-size:12;">Cadastros</strong>
            <ul>
            <li><a href="{{url('/quotas') }}" style="color:#000;">Cotas</a></li>
            <li><a href="{{url('/courses') }}" style="color:#000;">Cursos</a></li>
            <li><a href="{{url('/subscriptions') }}" style="color:#000;">Inscrição</a></li>
            <li><a href="{{url('/exemptions') }}" style="color:#000;">Isenção</a></li>
            <li><a href="{{url('/specialneeds') }}" style="color:#000;">Necessidades Especiais</a></li>
            <li><a href="{{url('/selectiveprocesses') }}" style="color:#000;">Processos Seletivos</a></li>
            <li><a href="{{url('/users') }}" style="color:#000;">Usuarios</a></li>
           
            </ul>

            @endif
        </li>
        </ul>
    @endguest
    </div>
        <header id="header" class="mui-appbar mui--z1">
        <div class="mui-appbar mui--appbar-line-height">
            <div class="mui-container-fluid">          
                <table>
                    <tr class="mui--appbar-height">
                        @guest
                        
                        @else
                        <td class = "drawer">
                            <img class="sidedrawer-toggle js-show-sidedrawer logo" src="/icon/menu.svg" height="25" width="25" style="margin-right: 15px;"/>
                        </td>
                        @endguest
                        <td>
                            <a class="logo" href="{{url('/home') }}"><img src="/img/IFClogo2.png" style="width: 30px; height: auto;"/></a>
                            <spam style="color: #fff; font: 20px roboto, sans-serif; margin-left: 15px; vertical-align: middle;">
                                @yield('title')
                            </spam>
                        </td>
                        <td class="mui--text-right">
                            <ul class="mui-list--inline mui--text-body2">
                                <!-- Authentication Links -->
                                @guest
                                    <li><a href="{{ route('login') }}">Entrar</a></li>
                                    <li><a href="{{ route('register') }}">Cadastre-se</a></li>
                                @else
                                    <li class="mui-dropdown">
                                        <a href="#" class="dropdown-toggle" data-mui-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <ul class="mui-dropdown__menu mui-dropdown__menu--right">
                                            <li>
                                                
                                                 <!--
                                                <a href="/avatar">
                                                Avatar
                                                </a>
                                                -->
                                                @if(Auth::user()->profile)
                                                    <a href="/profiles/{{ Auth::user()->profile->id }}/edit">
                                                        Meu Perfil
                                                    </a>
                                                @else
                                                    <a href="/profiles/create">
                                                        Meu Perfil
                                                    </a>
                                                @endif
                                                <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                    Sair
                                                </a>
                                            

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                @endguest
                            </ul>
                        </td>
                    </tr>
                </table>
            </div>
        </div>    
        </header>
        <br /><br /><br /><br />
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        jQuery(function($) {
        var $bodyEl = $('body'),
            $sidedrawerEl = $('#sidedrawer');


        function showSidedrawer() {
            // show overlay
            var options = {
            onclose: function() {
                $sidedrawerEl
                .removeClass('active')
                .appendTo(document.body);
            }
            };

            var $overlayEl = $(mui.overlay('on', options));

            // show element
            $sidedrawerEl.appendTo($overlayEl);
            setTimeout(function() {
            $sidedrawerEl.addClass('active');
            }, 20);
        }


        function hideSidedrawer() {
            $bodyEl.toggleClass('hide-sidedrawer');
        }


        $('.js-show-sidedrawer').on('click', showSidedrawer);
        $('.js-hide-sidedrawer').on('click', hideSidedrawer);
        });
    </script>
    <script>
        var $titleEls = $('strong', $sidedrawer);

        $titleEls
        .next()
        .hide();

        $titleEls.on('click', function() {
        $(this).next().slideToggle(200);
        });
    </script>
</body>
</html>
