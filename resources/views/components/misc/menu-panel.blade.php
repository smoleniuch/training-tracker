<div class="row">
    <div class="col-md-4"></div>

    <div class="col-md-4">
        <img class="avatar" src="{{asset($loggedUserAvatarPath)}}">
    </div>

    <div class="col-md-4"></div>
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills nav-stacked nav-panel-css">

                <li><a href=""><span class="glyphicon glyphicon-piggy-bank"></span> My workouts</a></li>
                <li><a href="/profile/{{auth()->user()->id}}/"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
                <li><a href="/settings/profile"><span class="glyphicon glyphicon-wrench"></span> Settings</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-heart"></span> Friends</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-envelope"></span> Messages</a></li>

            </ul>

            <form method="post" action="/logout">
              <button id="log-out-button" class="btn btn-default text-right" type="submit"><span class="glyphicon glyphicon-off"></span> Log out</a>
                {{csrf_field()}}
            </form>

        </div>

    </div>

</div>