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

    //Search input field,after change its value,send request for a user list

    (function() {

        var inputElement = $('#search-new-friend-input input');
        var csrfTokenValue = $('[name="csrf_token"]').attr('content');
        var currentUsers = $('#searched-user-rows');
        var loadingGif = $('#friend-searching-gif');
        var skipRecords = 0;
        var amountOfRecords = 15;
        //ajax request
        //debounce method is from lodash library
        //it prevents sending ajax request on each letter change.
        //it fires up after 1s of inactivity.

        inputElement.on('input propertychange', _.debounce(function() {

                loadingGif.fadeIn('slow');

                var inputText = inputElement.val().trim();

                if (inputText.length !== 0) {

                    var ajaxUsersRowsRequest = getUsersRowsRequest(inputText, skipRecords, amountOfRecords, csrfTokenValue);
                    //replace users after fetch from server
                    ajaxUsersRowsRequest.done(function(data, status, request) {

                        if (status === 'success') {



                            data = data.length > 0 ? data : "<p>No users were found</p>";
                            currentUsers.hide().html(data).fadeIn('slow');
                            skipRecords = 0;
                            currentUsers.scrollTop(0);

                        }


                    });
                }


                loadingGif.fadeOut('slow');
            }, 1000)


        );

        //if you scroll to the bottom fetch another max 15 records and append them.

        currentUsers.scroll(_.throttle(function() {
            //it prevents for sending request.

            if (currentUsers.find('p:contains("No more results...")').length !== 0) {

                return false;

            }
            //if scroll button reach bottom send request.
            if ($(this).scrollTop() + $(this).height() == $(this)[0].scrollHeight) {

                loadingGif.fadeIn('slow');

                var inputText = inputElement.val().trim();

                skipRecords += amountOfRecords;

                var ajaxUsersRowsRequest = getUsersRowsRequest(inputText, skipRecords, amountOfRecords, csrfTokenValue);

                ajaxUsersRowsRequest.done(function(data, status, request) {

                    if (status == 'success') {
                        loadingGif.fadeOut('slow');
                        if (data.length == 0) {


                            currentUsers.append('<p>No more results...</p>')

                        } else {

                            currentUsers.append(data);

                        }


                    }


                });

            }
        }, 500));

        /**
         * Make ajax request.
         * @param  {string} searchValue value from input field
         * @param  {int} offset      amount of skipped records
         * @param  {int} amount      amount of users to return
         * @param  {string} csrfToken   token
         * @return {object}             XMLHttpRequest
         */
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
