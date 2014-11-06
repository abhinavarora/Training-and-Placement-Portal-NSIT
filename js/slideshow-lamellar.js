// CREDITS:
// Slideshow with with lamellar effect
// by Peter Gehrig
// Copyright (c) 2010 Peter Gehrig. All rights reserved.
// Permission given to use the script provided that this notice remains as is.
// Additional scripts can be found at http://www.fabulant.com
// 03/01/2010

// IMPORTANT:
// If you add this script to a script-library or script-archive
// you have to add a link to http://www.fabulant.com on the webpage
// where this script will be running.

var imgpreload=new Array()
for (i=0;i<pictures.length;i++) {
	imgpreload[i]=new Image()
	imgpreload[i].src=pictures[i].src
}

var picturewidth;
var pictureheight;
var i_loop=0;
var i_picture=0;
var width_slice;
var cliptop=0;
var clipbottom;
var i_clipright=1;
var content="";
pause=pause*1000;
var slideshow_height=slideshow_height

function initiate() {
	getcontent();
	for (i=0;i<=x_slices;i++) {
     	var thisinners=document.getElementById("s"+i);
		thisinners.innerHTML=content;
		var thiss = document.getElementById('s' + i).style;
		// var thiss=eval("document.getElementById('s"+i+"').style");
		thiss.left=0;
		thiss.top=0;
  	}
	var thisspan=eval("document.getElementById('s0')");
	width_slice=Math.ceil(slideshow_width/x_slices);
	clipbottom=slideshow_height;
	var elWholeStyle = document.getElementById("whole").style;
	elWholeStyle.left = elWholeStyle.top = '0px';
	i_picture++;
	openlamellar();
}

function openlamellar() {
	clipleft=-width_slice;
	clipright=0;
    if (i_clipright<=width_slice) {
        for (i=0;i<=x_slices;i++) {
			var thiss = document.getElementById('s' + i).style;
            thiss.clip ="rect("+cliptop+"px "+clipright+"px "+clipbottom+"px "+clipleft+"px)";
            clipleft+=width_slice;
            clipright=clipleft+i_clipright;
		}
 	   i_clipright++;
    	var timer=setTimeout("openlamellar()",20);
   	}
   	else {
		clearTimeout(timer);
		document.getElementById('whole').innerHTML=content;
		var timer=setTimeout("changepicture()",pause);
	}
}

function getcontent() {
    content="<a href='"+pictures[i_picture].url+"' target='"+target_url+"'>";
    content+="<img src="+pictures[i_picture].src+" border=0>";
    ;
}

function changepicture(){
	i_clipright = 0;
	clipleft = 0;
	clipright = 0;
	for (i = 0; i <= x_slices; i++) {
		var thiss = document.getElementById('s' + i).style;
		thiss.clip = "rect(" + cliptop + "px " + clipright + "px " + clipbottom + "px " + clipleft + "px)";
	}
	if (i_picture >= pictures.length) {
		i_picture = 0;
	}
	getcontent();

	for (i = 0; i <= x_slices; i++) {
		var thisinners=document.getElementById("s"+i);
		thisinners.innerHTML = content;
	}
	i_picture++;
	openlamellar();
}

document.write("<div style='position:relative;width:"+slideshow_width+"px;height:"+slideshow_height+"px;'>");
document.write("<div id='whole' style='position:absolute;top:0px;left:0px'></div>");
for (i=0;i<=x_slices;i++) {
 	document.write("<div id='s"+i+"' style='position:absolute;top:0px;left:0px'></div>");
}
document.write("</div>");
document.close();
window.onload=initiate;
