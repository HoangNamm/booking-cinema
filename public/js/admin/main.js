(function () {
  var selText;
  var selTextCinema;
    $('#multiple_dropdown_select').on('change', function() {
      selText = "";
      $("#multiple_dropdown_select option:selected").each(function () {
        var $this = $(this);   
        if(selText != ""){
          selText = selText.concat(","); 
          selText = selText.concat($this.text());
        }
        else
          selText = $this.text();
      });
      document.getElementById("selected_values").value = selText;
    });

    $('#multiple_dropdown_select_cinema').on('change', function() {
      selTextCinema = "";
      $("#multiple_dropdown_select_cinema option:selected").each(function () {
        var $this = $(this);   
        if(selTextCinema != ""){
          selTextCinema = selTextCinema.concat(","); 
          selTextCinema = selTextCinema.concat($this.text());
        }
        else
          selTextCinema = $this.text();
      });
      document.getElementById("selected_cinema_values").value = selTextCinema;
    });
})();
