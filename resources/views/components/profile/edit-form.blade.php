<div class="container-fluid">

<form class="" action="" method="post" enctype="multipart/form-data">
  <div class="row">
    <div class="col-sm-4">

    </div>

    <div class="col-sm-4">

      <img class="avatar" src="{{asset($loggedUserAvatarPath)}}">
      <div class="input-group">

        <input type="file" name="avatar" class="filestyle" data-size="sm" data-buttonText="Change avatar" data-badge="false">


      </div>


    </div>

    <div class="col-sm-4">

    </div>



  </div>
  <div class="row">

  <div class="col-sm-4">

  </div>
    <div class="col-sm-4">

      <div class="input-group">
        <label for="full_name">Full name:</label>
        <input type="text" class="form-control" id='full_name' name="full_name" placeholder="">

      </div>

      <div class="input-group">

        <label for="location">Location:</label>
        <input type="text" class="form-control" id="location" placeholder="">

      </div>

      <div class="input-group">

        <label for="age">Age:</label>
        <input type="text" class="form-control" id="age" size='1' placeholder="">

      </div>

      <label for="gender">Gender:</label><br>
      <div class="input-group" >

        <label class="radio-inline">
        <input type="radio"  name="gender" value="male">male
        </label>
      <label class="radio-inline">
        <input type="radio" name="gender" value="female">female
      </label>
    </div>

    </div>

  </div>

  <div class="row">

    <div class="col-sm-12">

      <div class="modal-body">
        <label for="about-me">About me:</label>
        <textarea class="form-control col-xs-12 max_full_width" id="about-me" name="name"></textarea>

      </div>

    </div>



  </div>

</div>
<button class="btn btn-default" id="profile_update_button" type="submit" name="button"><span class="glyphicon glyphicon-saved"></span>Update</button>
{{ csrf_field() }}
</form>


</div>
