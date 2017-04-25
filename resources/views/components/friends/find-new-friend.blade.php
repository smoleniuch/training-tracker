<div id="find-new-friend">
<div class="row" id="search-new-friend-input">
  <h4><strong>Find someone  or</strong> <button class="btn btn-sm btn-danger" type="submit">Invite</button> <strong>random user</strong></h4>
  <div class="col-sm-4 col-xs-2">
    <img class="friend-search-field" id="friend-searching-gif" src="{{asset('gifs/hourglass.gif')}}">
  </div>

  <div class="col-sm-4 col-xs-8">

    <div class="input-group input-group-md">

      <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>

        <input   type="text" class="form-control friend-search-field" size="3" placeholder="Find new friend..."/>


    </div>

  </div>
  <div class="col-sm-4 col-xs-2">

  </div>

</div>


  <ul id ="searched-user-rows" class="list-group user-list">

    @include('components.friends.search-user-rows')

  </ul>

</div>
