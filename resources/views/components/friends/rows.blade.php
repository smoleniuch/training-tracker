
@foreach($friends as $friend)

<div class="row">

{{dd($friend->profile)}}
  <img src="{{$friend->profile->avatars_path}}" class="avatar-mini">

  <a href="sendmessage"><span class="glyphicon glyphicon-envelope"></span></a>
  <a href="/profile/{{$friend->profile->user_id}}">{{$friend->profile->username}}</a>
  <hr>




</div>
@endforeach
