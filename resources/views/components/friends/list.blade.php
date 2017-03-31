<h4 id="friends-header">Friends</h4>

<div class="row" id="friends-search-panel">






      <div class="btn-group" role="group">

          <button id="friend-group-button" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Group
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
        <input id='filter-friend-list' type="text" class="form-control" size="1" placeholder="Filter list...">


  </div>



</div>
<h4 id='current-group-header'>All</h4>
<div id="friends-list">


    @include('components.friends.rows')


  </div>
