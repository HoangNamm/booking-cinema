$(function () {
  chooseFilm();
  $('#select-film').change(chooseFilm);
});

function chooseFilm() {
  $("#select-film option:selected").each(function () {
    var idCinema = $(this).val();
    $.ajax({
      type: "GET",
      url: "admin/cinemas/room/"+idCinema,
      success: function( msg ) {
        let html = '';
        for (i = 0; i < msg.length; i++) { 
          html += '<option value="'+ msg[i].id +'">' + msg[i].name + '</option>';;
        }
        $('#select-room').html(html);
      }
    });
  });
}
