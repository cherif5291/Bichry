<!DOCTYPE html>

<html lang="en" class="light">
    <!-- BEGIN: Head -->
    <head>
        @include('layouts.entreprise.required.meta')
        <!-- BEGIN: CSS Assets-->
        @include('layouts.entreprise.required.styles')
        @yield('styles')
        @livewireStyles
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="main">
        <!-- BEGIN: Mobile Menu -->
        <div class="mobile-menu md:hidden">
          @include('layouts.entreprise.required.includes.mobilemenu')
        </div>
        <!-- END: Mobile Menu -->
        <!-- BEGIN: Top Bar -->
        <div class="top-bar-boxed border-b border-theme-2 -mt-7 md:-mt-5 -mx-3 sm:-mx-8 px-3 sm:px-8 md:pt-0 mb-12">
           @include('layouts.entreprise.required.includes.topbar')
        </div>
        <!-- END: Top Bar -->
        <div class="wrapper">
            <div class="wrapper-box">
                <!-- BEGIN: Side Menu -->
                <nav class="side-nav">
                    @include('layouts.entreprise.required.includes.navbar')
                </nav>
                <!-- END: Side Menu -->
                <!-- BEGIN: Content -->
                <div class="content">
                   @yield('content')
                </div>
                <!-- END: Content -->
            </div>
        </div>
        <!-- BEGIN: JS Assets-->
        @include('layouts.entreprise.required.scripts')
        @yield('scripts')

    @livewireScripts
        <!-- END: JS Assets-->
    </body>
</html>
