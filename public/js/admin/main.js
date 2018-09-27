(function () {
	var selText;
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
})();
