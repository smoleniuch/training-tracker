<?php


 ?>

<!DOCYTYPE html>
<html>

<head>
</head>

<body>
  <!-- <img class="avatar" src= /> -->
  <form action="uploads/upload-avatar.php" method="post" enctype="multipart/form-data">

    <input type="file" name="avatar-upload">
    <input type="submit" value="Upload avatar" name="Upload-avatar">

  </form>
  <span class='label label-info' id="upload-file-info"></span>
  <label class="btn btn-primary" for="my-file-selector">

    <input id="my-file-selector" type="file" style="display:none;" onchange="$('#upload-file-info').html($(this).val());">
    Button Text Here
</label>

</body>

</html>
