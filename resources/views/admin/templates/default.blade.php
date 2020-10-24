<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Ristore - @yield('title', 'Dashboard')</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        @include('admin.templates.partials.styles')

    </head>


    <body>

        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        @include('admin.templates.partials.header')

        <div class="wrapper">

            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group float-right mb-3">
                                    {{ Breadcrumbs::render() }}
                            </div>
                            {{-- <h4 class="page-title">{{ Breadcrumbs::current()->title }}</h4> --}}
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

                @yield('content')

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->


        @include('admin.templates.partials.footer')


        @include('admin.templates.partials.scripts')

    </body>
</html>