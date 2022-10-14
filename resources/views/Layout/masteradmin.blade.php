<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public" >
    @include("ADMIN.css")
@stack('styles')
  </head>
  <body>
    <div  id ="ll"style="margin-left:1000px;">
    <x-app-layout>

    </x-app-layout> </div>
   @include('ADMIN.nav')
@yield('content')
@stack('scripts')
     @include('ADMIN.js')
  </body>
</html>
