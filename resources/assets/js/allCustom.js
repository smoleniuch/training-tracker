
$(document).ready(function () {
  /**
   * Friends View Page
   */

  // load chosen group into the friends list.
  $('#friends-group-list > li').click(function () {
    var friendGroup = $(this).html()

    $.get('friends/group/' + friendGroup, function (data, status) {
      if (status === 'success') {
        $('#friends-list').html(data)

        $('#current-group-header').html(friendGroup)
      } else {
        alert('Something went wrong!')
      }
    })
  })

  // filter current friend-list
  $('#filter-friend-list').bind('input propertychange keyup', function () {
    var inputText = $(this).val().trim()

    $('#friends-list .row').each(function () {
      var username = $(this).find('a').last().text()
      var matchInputRegexp = new RegExp(inputText, 'i')

         // if username doesnt match regexp hide it.
      if (!matchInputRegexp.test(username)) {
        $(this).hide()
      }
         //
      else {
        $(this).show()
      }
    })
  })

  /**
   * Friends Find Page
   */
  $('#search-new-friend-input').bind('input propertychange keyup click', function () {
    var inputText = $(this).val()
    
  })
})

// Let only one gender to be available to choose in profile settings.
$(document).ready(function () {
  $("input[name='gender']").click(function () {
    var thisCheckStatus = $(this).prop('checked')

    $("input[name='gender']").prop('checked', false)

    if (thisCheckStatus) {
      $(this).prop('checked', true)
    } else {
      $(this).prop('checked', false)
    }
  })
})
