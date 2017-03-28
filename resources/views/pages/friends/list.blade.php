@extends('master')

  @section('left_panel')

    @include('components.misc.menu-panel')

  @endsection

  @section('content')



  <div class="row row-eq-height">


    <div class="col-sm-12 col-md-8">

      @include('components.friends.list')

    </div>

    <div class="col-sm-12 col-md-4">

      @include('components.friends.find-new-friend')

    </div>

  </div>




  @endsection
