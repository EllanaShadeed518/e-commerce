<!DOCTYPE html>
<html>
   <head>
    <base href="/public" >
     @include('Home.css')

   </head>
   <body>
    @include('Home.nav')

@yield('content')

@stack('custom-scripts')
@include('Home.js')
@include('Home.footer2')
   </body>
   </html>
