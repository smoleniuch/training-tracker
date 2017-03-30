

$(document).ready(function(){
  //load chosen group into the friends list.
  $('#friends-group-list > li').click(function(){

    var friendGroup = $(this).html();

    $.get('friends/' + friendGroup,function(data,status){

      if(status === 'success'){

        $('#friends-list').html(data);

      }
      else{

        alert('Something went wrong!')

      }


    })

  })

});
