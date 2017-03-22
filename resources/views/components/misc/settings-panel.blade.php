<div class="container-fluid">
  @if(session()->has('settingsMessage'))

    <div class="alert alert-success fade in">

        <a href="" class="close" data-dismiss="alert">&times;</a>

        {{session()->get('settingsMessage','')}}


    </div>

  @endif
  <div class="row text-center">


    <h4><strong>SETTINGS</strong></h4>


          <div id="settings-menu">
              <ul class="nav nav-pills nav-panel-css">
              <li><a href="profile"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
            </ul>

          </div>







</div>

</div>
