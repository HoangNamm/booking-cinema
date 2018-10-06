$(document).ready(function(){
	if (!localStorage.getItem('login-token')) {
        window.location.href = 'http://' + window.location.hostname;
	}
	
  showProfile();
  
  // if (localStorage.getItem('user_booking')) {
  //   showBooking();
  // }
});

function showProfile() {
	var userProfile = JSON.parse(localStorage.getItem('user'));
	// var role;
	// if (userProfile.role === 1) {
	// 	role = "Admin";
	// } else {
	// 	role = "User";
	// }
	// $('.teddy-text h4').text(userProfile.full_name);
	// $('.teddy-text p').text(role);
	$('#full_name').text(userProfile.full_name);
	$('#email').text(userProfile.email);
	$('#phone').text(userProfile.phone);
	$('#address').text(userProfile.address);
}

function showBooking() {
	var booking = JSON.parse(localStorage.getItem('user_booking'));
	var todayDate = new Date();
	var today = todayDate.toJSON().slice(0,10);
	if (Date.parse(booking.date) >= Date.parse(today)) {
		html = '<ul class="icon-navigation">\
              <li><a id="name_film">' + booking.name_film + '</a></li>\
              <li><a id="date_film">' + booking.date + '</a></li>\
              <li><a id="time_name">' + booking.time + '</a></li>\
              <li><a id="seat_name">' + booking.seat_name + '</a></li>\
              <li><a id="price_film">' + booking.price + '</a></li>\
            </ul>'
    $('#booking_schedule').html(html);
	} else {
    localStorage.removeItem('user_booking');
  }
}
