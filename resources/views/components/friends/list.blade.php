<h4 id="friends-header">Friends</h4>

<div class="row" id="friends-search-panel">




  <label for="friend-group">Group</label>

      <div class="btn-group" role="group">

          <button id="friend-group" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              All
              <span class="caret"></span>
            </button>


           <ul class="dropdown-menu">
            <li><a href="#">All</a></li>
            <li><a href="#">Family</a></li>
          </ul>

        </div>



    <div class="input-group input-group-md">
      <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
        <input id='search-friend' type="text" class="form-control" size="1" placeholder="Filter list...">


  </div>



</div>
<div id="friends-list">

    @include('components.friends.friend-row')
    @include('components.friends.friend-row')
    @include('components.friends.friend-row')
    @include('components.friends.friend-row')
    @include('components.friends.friend-row')
    @include('components.friends.friend-row')
    @include('components.friends.friend-row')


  </div>
