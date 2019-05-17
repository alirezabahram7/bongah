function tglbkmrk(x) {
  x.classList.toggle("fa-bookmark-o");
x.classList.toggle("fa-bookmark");


}

var filename;
document.getElementById('fileInput').onchange = function () {
   filename = this.value.split(String.fromCharCode(92));
   document.getElementById("some_text").value = filename[filename.length-1];
};

$(document).ready(function() {

  $(".btn-success").click(function(){ 
      var html = $(".clone").html();
      $(".increment").after(html);
  });

  $("body").on("click",".btn-danger",function(){ 
      $(this).parents(".control-group").remove();
  });

});

$(function()
{
    $(document).on('click', '.btn-add', function(e)
    {
        e.preventDefault();

        var controlForm = $('.controls:first'),
            currentEntry = $(this).parents('.entry:first'),
            newEntry = $(currentEntry.clone()).appendTo(controlForm);

        newEntry.find('input').val('');
        controlForm.find('.entry:not(:last) .btn-add')
            .removeClass('btn-add').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('<span class="glyphicon glyphicon-minus"></span>');
    }).on('click', '.btn-remove', function(e)
    {
      $(this).parents('.entry:first').remove();

		e.preventDefault();
		return false;
	});
});

function openForm() {
    if ($('#popup_form').is(':visible')) {
        document.getElementById("popup_form").style.display = "none";

    } else {
        document.getElementById("popup_form").style.display = "block";

    }

}
