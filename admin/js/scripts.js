jQuery(document).ready(function($) {
$('.pop-link').click(function () {
             var poplink = $(this).attr('href');                   
                                
	newwindow=window.open(poplink,'name','height=800,width=1024');
	if (window.focus) {newwindow.focus()}
	return false;
})

});