
@if(!empty($users))

  @foreach($users as $user)

    <li class="list-group-item">

      <button class="btn btn-success btn-xs" type="submit">Invite</button>

      <a href="sendmessage"><span class="glyphicon glyphicon-envelope"></span></a>

      <img src="{{asset('uploads/images/avatars/default-avatar.jpeg')}}" class="avatar-mini">

      <a class="username" href="/profile/{{$user->profile->id}}/">{{$user->profile->username}}</a>

    </li>

  @endforeach

@endif
