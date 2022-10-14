
<nav class="navbar navbar-expand-lg custom_nav-container ">
    <a class="navbar-brand ml-3 mt-1" href="{{route('home')}}"><img width="130" height="60" src="index assets/images/logoshop.jpg" alt="#" /></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class=""> </span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
       <ul class="navbar-nav">
          <li class="nav-item active">
             <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
          </li>
         <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
             <ul class="dropdown-menu">
                <li><a href="{{url('about')}}">About</a></li>

             </ul>
          </li>
          <li class="nav-item">
             <a class="nav-link" href="{{route('viewallproduct')}}">Products</a>
          </li>

          <li class="nav-item">
             <a class="nav-link" href="{{url('contact')}}">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('show_order')}}">Order</a>
         </li>
          <li class="scroll-to-section">
            @auth
            <a href="{{route('show',['userid'=>Auth::user()->id])}}">
            Cart[{{$count}}]<!--if user not login the home page not find the count variable beacuse the count in function addcart in home controller after login(Auth) -->
        </a>
            @endauth
            @guest

                Cart[0]
            @endguest

       </li>
          @if(Route::has('login'))
          @auth
          <li class="nav-item">
            <x-app-layout>

            </x-app-layout>
          </li>
          @else
          <li class="nav-item">

            <a class="btn btn-primary" href="{{ route('login') }}" style="font-size: 15px;padding:5px;margin-right:5px">Log in</a>
         </li>
         @if(Route::has('register'))
         <li class="nav-item">
            <a class="btn btn-warning" href="{{ route('register') }}" style="font-size: 15px;padding:5px;margin-right:5px">Register</a>
         </li>
         @endif
         @endauth
         @endif




       </ul>
    </div>
    </div>
</nav>



