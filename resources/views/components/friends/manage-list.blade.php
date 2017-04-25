@extends('components.friends.list')

@section('user-list')

  @include('components.friends.manage-friend-rows')

  <div class="dropup">
  <button class="btn btn-default dropdown-toggle" type="button" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    With selceted
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="">
    <li><a role="button">Delete</a></li>
    <li><a role="button">Remove from group</a></li>
    <li><a role="button">Add to group</a></li>
  </ul>
</div>

@endsection
