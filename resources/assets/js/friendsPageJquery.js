

$(document).ready(function(){
  //load chosen group into the friends list.
  $('#friends-group-list > li').click(function(){

    var friendGroup = $(this).html();

    $.get('friends/' + friendGroup,function(data,status){

      if(status === 'success'){

        $('#friends-list').html(data);

        $('#current-group-header').html(friendGroup);
      }
      else{

        alert('Something went wrong!');

      }


    })

  })

  //filter current friend-list
  $('#filter-friend-list').bind('input propertychange keyup',function(){

    var inputText = $(this).val().trim();

     $('#friends-list .row').each(function(){

       var username = $(this).find('a').last().text();
       var matchInputRegexp = new RegExp(inputText,'i');

         //if username doesnt match regexp hide it.
         if(! matchInputRegexp.test(username) ){

           $(this).hide();

         }
         //
         else{

           $(this).show();

         }


     });

  });

});
