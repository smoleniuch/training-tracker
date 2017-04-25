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
