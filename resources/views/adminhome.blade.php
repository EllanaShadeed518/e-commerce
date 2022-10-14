<!DOCTYPE html>
<html lang="en">
  <head>
    @include("ADMIN.css")
  </head>
  <body>
    <div  id ="ll"style="margin-left:1000px;">
    <x-app-layout>

    </x-app-layout> </div>
   @include('ADMIN.nav')
@yield('content')
     @include('ADMIN.js')
  </body>
</html>
