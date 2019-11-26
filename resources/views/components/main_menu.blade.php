<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{ url('/') }}">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">{{ config('app.name', 'Laravel') }}</h2>
                </a></li>

        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class=" navigation-header"><span>Menù</span>
            </li>
            <li class="nav-item "><a href=""><i class="feather icon-compass"></i><span class="menu-title" data-i18n="Email">Richieste Viaggi</span></a>
            </li>
            <li class=" nav-item "><a href=""><i class="feather icon-check-circle"></i><span class="menu-title" data-i18n="Chat">Piani - Richieste</span></a>
            </li>
            <li class=" nav-item "><a href=""><i class="feather icon-clipboard"></i><span class="menu-title" data-i18n="Todo">Piani - Palmare</span></a>
            </li>
            

        </ul>
    </div>
</div>
<!-- END: Main Menu-->
