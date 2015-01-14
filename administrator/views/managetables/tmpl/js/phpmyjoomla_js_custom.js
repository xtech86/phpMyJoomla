$(document).ready(function() 
{
$('.toggle').hide();
   $('a.togglelink').on('click', function (e) {
       e.preventDefault();
       var elem = $(this).next('.toggle')
       $('.toggle').not(elem).hide('slow');
       elem.toggle('slow');
   });
});
function setColor(btn,color)
{
	var property=document.getElementById(btn);
   	if (window.getComputedStyle(property).backgroundColor == 'rgb(91, 183, 91)') 
   	{
    	property.style.backgroundColor=color;
   	}
    else 
    {
      	property.style.backgroundColor = "#5bb75b";      
    }
}
$(function() {
    $('#activator').click(function(){
        $('#overlay').fadeIn('fast',function(){
            $('#box').animate({'top':'160px'},500);
        });
    });
    $('#boxclose').click(function(){
        $('#box').animate({'top':'-1000px'},500,function(){
            $('#overlay').fadeOut('fast');
        });
    });
});


/*** BEGIN: ADDED RUEL SCRIPTS ***/
function showLoadingDiv() {
    try{
            if (document.getElementById('ajax_loading')) document.getElementById('ajax_loading').className = 'loading-visible';
            if (document.getElementById('ajax_shield')) document.getElementById('ajax_shield').className = 'dark_background';
    } catch (e){}
}

function hideLoadingDiv() {
    try{
        if (document.getElementById('ajax_loading')) document.getElementById('ajax_loading').className = 'loading-invisible';
        if (document.getElementById('ajax_shield')) document.getElementById('ajax_shield').className = 'clear_background';
    } catch (e){}
}
/*** END: ADDED RUEL SCRIPTS ***/