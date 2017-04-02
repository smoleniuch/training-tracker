@extends('master')

  @section('left_panel')

    @include('components.misc.menu-panel')

  @endsection

  @section('content')

<div class="row">

  @include('components.friends.menu-panel')

</div>


  @yield('friends-content')




  @endsection
