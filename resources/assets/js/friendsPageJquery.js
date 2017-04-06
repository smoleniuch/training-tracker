$(document).ready(function() {

    /**
     * Friends View Page
     */

    //load chosen group into the friends list.
    $('#friends-group-list > li').click(function() {

        var friendGroup = $(this).html();

        $.get('friends/group/' + friendGroup, function(data, status) {

            if (status === 'success') {

                $('#friends-list').html(data);

                $('#current-group-header').html(friendGroup);
            } else {

                alert('Something went wrong!');

            }


        })

    })

    //filter current friend-list
    $('#filter-friend-list').bind('input propertychange keyup', function() {

        var inputText = $(this).val().trim();

        $('#friends-list .row').each(function() {

            var username = $(this).find('a').last().text();
            var matchInputRegexp = new RegExp(inputText, 'i');

            //if username doesnt match regexp hide it.
            if (!matchInputRegexp.test(username)) {

                $(this).hide();

            }
            //
            else {

                $(this).show();

            }


        });

    });


    /**
     * Friends Find Page
     */


    (function() {

        var inputElement = $('#search-new-friend-input input');
        var csrfTokenValue = $('[name="csrf_token"]').attr('content');
        var currentUsers = $('#searched-user-rows');
        var skipRecords = 0;
        var amountOfRecords = 15;

        inputElement.bind('input propertychange', function() {

            var inputText = inputElement.val().trim();

            if (inputText.length !== 0) {

                var ajaxUsersRowsRequest = getUsersRowsRequest(inputText, skipRecords, amountOfRecords, csrfTokenValue);
                //replace users after fetch from server
                ajaxUsersRowsRequest.done(function(data, status, request) {

                  if(status === 'success'){

                    data = data.length > 0?data:"<p>No user were found</p>";
                    currentUsers.hide().html(data).fadeIn('slow');
                    skipRecords = 0;
                    currentUsers.scrollTop(0);

                  }


                });
            }
        });

        //if you scroll to the bottom fetch another max 15 records and append them.
        // console.log($('.scroll-test'));
        currentUsers.scroll(function() {

            if ($(this).scrollTop() + $(this).height() == $(this)[0].scrollHeight) {
                var inputText = inputElement.val().trim();

                skipRecords += amountOfRecords;

                var ajaxUsersRowsRequest = getUsersRowsRequest(inputText, skipRecords, amountOfRecords, csrfTokenValue);

                ajaxUsersRowsRequest.done(function(data, status, request) {

                    if (status == 'success') {

                        currentUsers.append(data);

                    }


                });

            }

        });

        function getUsersRowsRequest(searchValue, offset, amount, csrfToken) {


            return $.ajax({

                type: 'POST',
                data: {

                    searchValue: searchValue,
                    offset: offset,
                    amount: amount

                },
                headers: {

                    'X-CSRF-TOKEN': csrfToken

                }

            });


        }

    })();



});
