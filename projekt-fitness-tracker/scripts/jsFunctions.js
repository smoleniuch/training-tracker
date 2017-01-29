
function redirect(where){

  location.replace(where);

}

function setPostData(name,value=null){

  var request;
  if(window.XMLHttpRequest){

     request = new XMLHttpRequest();

  }
  else{

    request = new ActiveXObject();

  }
  var location = window.location.href;
  $.post(location, {name:value});
// var url = "get_data.php";
// var params = "lorem=ipsum&name=binny";
// request.open("POST", location, true);
//
// //Send the proper header information along with the request
// request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
// request.setRequestHeader("Content-length", params.length);
// request.setRequestHeader("Connection", "close");
//
// request.onreadystatechange = function() {//Call a function when the state changes.
// 	if(http.readyState == 4 && http.status == 200) {
// 		alert(http.responseText);
// 	}
// }
// request.send(params);
//
// return request;
}
