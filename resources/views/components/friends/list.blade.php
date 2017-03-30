<h4 id="friends-header">Friends</h4>

<div class="row" id="friends-search-panel">




  <label for="friend-group">Group</label>

      <div class="btn-group" role="group">

          <button id="friend-group" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              All
              <span class="caret"></span>
            </button>


           <ul id="friends-group-list" class="dropdown-menu">
            @foreach($groups as $group)

              <li>{{$group}}</li>

            @endforeach
          </ul>

        </div>



    <div class="input-group input-group-md">
      <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
        <input id='search-friend' type="text" class="form-control" size="1" placeholder="Filter list...">


  </div>



</div>
<div id="friends-list">


    @include('components.friends.rows')


  </div>
