<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>NITV Task</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
        @toastr_css
        @yield('page_header')
    </head>
    <body>
        @include('partials.sidebar')
          <section id="content-wrapper">

                @yield('content')
        </section>
      </div>
      <script src="{{ mix('js/app.js') }}"></script>
      {{-- @jquery --}}
      @yield('page_scripts')
      @toastr_js
      @toastr_render
    </body>
</html>
