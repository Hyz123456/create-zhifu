


/*
$(document).ready(function(){
	
	
	

   var newImage = new Image();  //Ԥ����ͼƬ

   var oadImage = $('.aa').attr('src');
      var obdImage = $('.ab').attr('src');
	        var ocdImage = $('.ac').attr('src');
			      var oddImage = $('.ad').attr('src');
	        var oedImage = $('.ae').attr('src');
		      var ofdImage = $('.af').attr('src');
	        var ogdImage = $('.ag').attr('src');
				        var ohdImage = $('.ah').attr('src');
						    var oidImage = $('.ai').attr('src');
								    var ojdImage = $('.aj').attr('src');

   newImage.src = './icon/list_hover.png';


   $('.aa').hover(function(){ //��껬��ͼƬ�л�

    $('.aa').attr('src',newImage.src);
	


	

    },

    function(){

    $('.aa').attr('src',oadImage);
	
 

    });
	
	
	
	
	
	   $('.ab').hover(function(){ //��껬��ͼƬ�л�

    $('.ab').attr('src',newImage.src);

    },

    function(){

    $('.ab').attr('src',obdImage);
	
 

    });
		   $('.ac').hover(function(){ //��껬��ͼƬ�л�

    $('.ac').attr('src',newImage.src);

    },

    function(){

    $('.ac').attr('src',ocdImage);
	
 

    });
			   $('.ad').hover(function(){ //��껬��ͼƬ�л�

    $('.ad').attr('src',newImage.src);

    },

    function(){

    $('.ad').attr('src',oddImage);
	
 

    });
	
	
	
				   $('.ae').hover(function(){ //��껬��ͼƬ�л�

    $('.ae').attr('src',newImage.src);

    },

    function(){

    $('.ae').attr('src',oedImage);
	
 

    });
		
				   $('.af').hover(function(){ //��껬��ͼƬ�л�

    $('.af').attr('src',newImage.src);

    },

    function(){

    $('.af').attr('src',ofdImage);
	
 

    });
	
		
				   $('.ag').hover(function(){ //��껬��ͼƬ�л�

    $('.ag').attr('src',newImage.src);

    },

    function(){

    $('.ag').attr('src',ogdImage);
	
 

    });
	
	
	
	
		
				   $('.ah').hover(function(){ //��껬��ͼƬ�л�

    $('.ah').attr('src',newImage.src);

    },

    function(){

    $('.ah').attr('src',ohdImage);
	
 

    });
	
			
				   $('.ai').hover(function(){ //��껬��ͼƬ�л�

    $('.ai').attr('src',newImage.src);

    },

    function(){

    $('.ai').attr('src',oidImage);
	
 

    });
					   $('.aj').hover(function(){ //��껬��ͼƬ�л�

    $('.aj').attr('src',newImage.src);

    },

    function(){

    $('.aj').attr('src',ojdImage);
	
 

    });





});




*/


$(function () {
$(".ocs").hover(
	function () {
		$(this).find(".dask").stop().delay(50).attr({style:"display:block"}).animate({"top":0,opacity:0.9},300)
	 },
	function () {
		$(this).find(".dask").stop().animate({"top":0,opacity:0},300)
	}
	
)
})














function blinklink()
{
if (!document.getElementById('blink').style.color)
 {
 document.getElementById('blink').style.color="green"
 }
if (document.getElementById('blink').style.color=="green")
 {
 document.getElementById('blink').style.color="#1AA1B3"
 }
else
 {
 document.getElementById('blink').style.color="green"
 }
timer=setTimeout("blinklink()",500)










}

function stoptimer()
{
clearTimeout(timer)
}













