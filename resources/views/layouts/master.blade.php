<!DOCTYPE html>
<html lang="en">
    @include('../partials._head')
    <body>
        <div id="app">
            @include('../partials._header')
            <div class="content-wrapper">
                <div class="container-fluid">
                    <div class="page-content">
                        @yield('content')
                    </div>
                </div>
                @include('../partials._footer')
            </div>
        </div>
            @include('../partials._scripts')
    </body>
</html>    