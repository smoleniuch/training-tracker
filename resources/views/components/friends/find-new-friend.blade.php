<div id="find-new-friend">
<div class="row" id="search-new-friend-input">
  <h4><strong>Find someone</strong></h4>
  <div class="col-md-4">

    <div class="input-group input-group-md">
      <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>

        <input  type="text" class="form-control" size="3" placeholder="Find new friend..."/>


    </div>

  </div>

</div>
<div class="row random-user-list">


    @include('components.friends.random-user-list')



</div>

<div class="row" id="invite-random-friend-btn">
  <p><button class="btn btn-danger" type="submit">Invite</button> random person!</p>
</div>
</div>
