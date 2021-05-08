$( document ).ready(function() {
  $('#img-captcha').attr('src', '/capcha2?id='+Math.random()+'');
});
function ValidationForm()
{
	
$.ajax({  
    type: 'POST',  
    url: 'verify', 
    data: { album: this.title },
    success: function(response) {
        content.html(response);
    }
});
}