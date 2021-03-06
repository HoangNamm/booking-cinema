$(document).ready(function () {
  $(document).on('click', '#my_logout', function (event) {
    event.preventDefault();
    var token = localStorage.getItem('login-token');
    $.ajax({
      url: "/api/logout",
      type: "post",
      headers: {
        'Accept': 'application/json',
        'Authorization': 'Bearer ' + token
      },
      success: function (response) {
        localStorage.removeItem('login-token');
        localStorage.removeItem('user');
        window.location.href = 'http://' + window.location.hostname;
      }
    });
  });
})
