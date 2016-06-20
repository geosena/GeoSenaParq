// GOOGLE STATIC MAPS EFFECT
// MORE INFO AT http://blog.ikhuerta.com/efecto-para-mapas-de-google-maps
$(document).ready(function() {
	$(".map").css({cursor:"pointer"});
	$(".map").hover(function(){
		var help_map_text = "Haz click en el mapa para ampliarlo";
		var h = $(this).height();
		var w = $(this).width();
		var offset = $(this).offset();
		var oTop = offset.top+(h-24);
		var oLeft = offset.left
		$(document.body).before("<span class='help_map_hover'>"+help_map_text+"</span>");
		$(".help_map_hover").css({
			position : "absolute",
			background : "white",
			opacity : 0.9,
			lineHeight: "20px",
			display : "block",
			top : oTop,
			left: oLeft,
			width : w-4,
			fontSize: 14,
			zIndex:99997,
			border : "2px solid #ccc",
			textAlign : "center"
		});
	},function(){
		$(".help_map_hover").remove();
	});
	$(".map").click(function(){
		extraWidth = 300;
		extraHeight = 300;
		var src = $(this).attr("src");
		sizes = src.split("&size=")[1].split("&")[0].split("x");
		var w = (sizes[0]*1)+extraWidth;
		var h = (sizes[1]*1)+extraHeight;
		bigsrc = src.replace("&size="+sizes[0]+"x"+sizes[1],"&size="+w+"x"+h);
		zoom = (src.split("&zoom=")[1].split("&")[0]*1);
		litlesrc = src.replace("&size="+sizes[0]+"x"+sizes[1],"&size=200x100").replace("&zoom="+zoom,"&zoom="+(zoom-4)).replace("green","tinygreen");
		$(document.body).append("<span class='zoom_map'><img src='"+bigsrc+"' /><img class='litle_zoom_map' src='"+litlesrc+"' /></span>");
		var offset = $(this).offset();
		var oTop = offset.top-((extraHeight/2)+5)
		var oLeft = offset.left-((extraWidth/2)+5)
		$(".zoom_map").css({
			position : "absolute",
			display : "block",
			top : oTop,
			left : oLeft,
			textAlign : "center",
			zIndex:99998,
			border:"5px solid white"
		});
		$(".litle_zoom_map").css({
			position : "absolute",
			display : "block",
			bottom:0,
			right:0,
			zIndex:99999,
			border:"3px solid white",
			borderWidth : "3px 0 0 3px"
		});
		setTimeout(function() {
			$(document.body).one("click",function(){
				$(".zoom_map").remove();
			});
		},100);
		return false;
	});
});
// END OF GOOGLE STATIC MAP EFFECT