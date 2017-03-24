

<div class="container-fluid">

  <div class="row">





          <div class="profile-show-menu">
              <ul class="nav nav-pills nav-panel-css">
              <li><a href="records"><span class="glyphicon glyphicon-star"></span> Records</a></li>
              <li><a href="statistics"><span class="glyphicon glyphicon-stats"></span> Statistics</a></li>
              <li><a href="achivements"><span class="glyphicon glyphicon-king"></span> Achivements</a></li>
              <li><a href="goals"><span class="glyphicon glyphicon-edit"></span> Goals</a></li>
            </ul>

          </div>







</div>






  <div class="row">
    <div class="col-md-3">

    </div>
    <div class="col-md-6" align="center">
      <h4><strong>{{$username}}</strong></h4>
      <img class="avatar" src='{{asset($avatars_path)}}'/><br>
      <table class="table">
          <tbody>
              <tr>
                  <td>Full name:</td>
                  <td>{{$full_name}}</td>
              </tr>
              <tr>
                  <td>Age:</td>
                  <td>{{$age}}</td>
              </tr>
              <tr>
                  <td>Gender:</td>
                  <td>{{$gender}}</td>
              </tr>
              <tr>
                  <td>Location:</td>
                  <td>{{$location}}</td>
              </tr>

          </tbody>
      </table>
    </div>

    <div class="col-md-3">

    </div>
    <div class="col-md-12">
      <h4 align="center"><strong>About me:</strong></h4>
      <pre class="pre about_me">{{$about_me}}</pre>
    </div>


  </div>
</div>
