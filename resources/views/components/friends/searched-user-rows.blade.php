


  @foreach($users as $user)
    <div class="col-xs-12">


      <img src="{{asset($user->profile->avatars_path)}}" class="avatar-mini">
      <button class="btn btn-success btn-xs" type="submit">Invite</button>
      <a href="/profile/1/">{{$user->profile->username}}</a>
      <hr>




    </div>
  @endforeach
