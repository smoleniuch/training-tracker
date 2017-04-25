<ul id="friends-list" class="list-group user-list">

@if(!empty($friends))

  @foreach($friends as $friend)

    <li class="list-group-item">

      <a href="sendmessage"><span class="glyphicon glyphicon-envelope"></span></a>

      <img src="{{asset('uploads/images/avatars/default-avatar.jpeg')}}" class="avatar-mini">

      <a class="username" href="/profile/{{$friend->profile->id}}/">{{$friend->profile->username}}</a>

    </li>

  @endforeach

@endif

  </ul>
