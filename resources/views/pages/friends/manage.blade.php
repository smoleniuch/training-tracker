@extends('pages.friends.model')

@section('friends-content')

  <div class="col-md-12">

    @include('components.friends.manage-list',[


    ])



  </div>

  <div class="col-md-12">
    <div class="col-sm-4">

    </div>

    <div class="col-sm-4">
      @include('components.friends.group-list')
    </div>

    <div class="col-sm-4">

    </div>


  </div>

@endsection
