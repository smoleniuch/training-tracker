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

      <div class="input-group {{$errors->get('Full_name')?'has-error':''}}">
        <label for="Full_name">Full name: </label>
        <span class="help-block">{{$errors->first('Full_name')}}</span>
        <input type="text" class="form-control" id='Full_name' name="Full_name" value="{{old('Full_name',$full_name)}}">

      </div>

      <div class="input-group {{$errors->has('location')?'has-error':''}}">

        <label for="location">Location:</label>
        <span class="help-block">{{$errors->first('location')}}</span>
        <input type="text" class="form-control" id="location" name="location" value="{{old('location',$location)}}">

      </div>

      <div class="input-group {{$errors->get('age')?'has-error':''}}">

        <label for="age">Age:</label>
        <span class="help-block">{{$errors->first('age')}}</span>
        <input type="text" class="form-control" id="age" name="age" size='1' value="{{old('age',$age)}}">
      </div>
    

      <div class="input-group" >
        <label for="gender">Gender:</label><br>

        <input type="checkbox"  name="gender" {{$gender == 'male'?'checked=""':''}}  value="male">male
        <input type="checkbox" name="gender" {{$gender == 'female'?'checked=""':''}} value="female">female

    </div>

    </div>

  </div>

  <div class="row">

    <div class="col-sm-12">

      <div class="form-group {{$errors->get('about_me')?'has-error':''}}">

        <label for="about_me">About me:</label>
        <span class="help-block">{{$errors->first('about_me')}}</span>

        <textarea class="form-control col-xs-12 max_width" id="about_me" rows='8' name="about_me">{{old('about_me',$about_me)}}</textarea>

      </div>

    </div>



  </div>

</div>
<button class="btn btn-default" id="profile_update_button" type="submit" name="button"><span class="glyphicon glyphicon-saved"></span>Update</button>
{{ csrf_field() }}
</form>


</div>
