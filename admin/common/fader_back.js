// main function to process the fade request //
function colorFade(id,bg_start,bg_end,text_start, text_end, border_start,border_end,steps,speed) {
  var target = document.getElementById(id);
  steps = steps || 20;
  speed = speed || 20;
  clearInterval(target.timer);
  	bg_endrgb = colorConv(bg_end);
	text_endrgb = colorConv(text_end);
	border_endrgb = colorConv(border_end);
  bg_er = bg_endrgb[0];
  bg_eg = bg_endrgb[1];
  bg_eb = bg_endrgb[2];
  
  text_er = text_endrgb[0];
  text_eg = text_endrgb[1];
  text_eb = text_endrgb[2];
  
  border_er = border_endrgb[0];
  border_eg = border_endrgb[1];
  border_eb = border_endrgb[2];
  if(!target.r) {
    bg_startrgb = colorConv(bg_start);
	text_startrgb = colorConv(text_start);
	border_startrgb = colorConv(border_start);
	
    target.bg_r = bg_startrgb[0];
    target.bg_g = bg_startrgb[1];
    target.bg_b = bg_startrgb[2];
	
	target.text_r = text_startrgb[0];
    target.text_g = text_startrgb[1];
    target.text_b = text_startrgb[2];
	
	target.border_r = border_startrgb[0];
    target.border_g = border_startrgb[1];
    target.border_b = border_startrgb[2];
  }
  bg_rint = Math.round(Math.abs(target.bg_r-bg_er)/steps);
  bg_gint = Math.round(Math.abs(target.bg_g-bg_eg)/steps);
  bg_bint = Math.round(Math.abs(target.bg_b-bg_eb)/steps);
  
  text_rint = Math.round(Math.abs(target.text_r-text_er)/steps);
  text_gint = Math.round(Math.abs(target.text_g-text_eg)/steps);
  text_bint = Math.round(Math.abs(target.text_b-text_eb)/steps);
  
  border_rint = Math.round(Math.abs(target.border_r-border_er)/steps);
  border_gint = Math.round(Math.abs(target.border_g-border_eg)/steps);
  border_bint = Math.round(Math.abs(target.border_b-border_eb)/steps);
  
  if(bg_rint == 0) { bg_rint = 1 }
  if(bg_gint == 0) { bg_gint = 1 }
  if(bg_bint == 0) { bg_bint = 1 }
  
  if(text_rint == 0) { text_rint = 1 }
  if(text_gint == 0) { text_gint = 1 }
  if(text_bint == 0) { text_bint = 1 }
  
  if(border_rint == 0) { border_rint = 1 }
  if(border_gint == 0) { border_gint = 1 }
  if(border_bint == 0) { border_bint = 1 }
  target.step = 1;
 target.timer = setInterval( function() { animateColor(id,'background',steps,bg_er,bg_eg,bg_eb,bg_rint,bg_gint,bg_bint) }, speed);
 //  target.timer = setInterval( function() { animateColor(id,'text',steps,text_er,text_eg,text_eb,text_rint,text_gint,text_bint) }, speed);
  //target.timer = setInterval( function() { animateColor(id,'border',steps,border_er,border_eg,border_eb,border_rint,border_gint,border_bint) }, speed);
}

// incrementally close the gap between the two colors //
function animateColor(id,element,steps,er,eg,eb,rint,gint,bint) {
  var target = document.getElementById(id);
  var color;
  if(target.step <= steps) {
    var r = target.r;
    var g = target.g;
    var b = target.b;
    if(r >= er) {
      r = r - rint;
    } else {
      r = parseInt(r) + parseInt(rint);
    }
    if(g >= eg) {
      g = g - gint;
    } else {
      g = parseInt(g) + parseInt(gint);
    }
    if(b >= eb) {
      b = b - bint;
    } else {
      b = parseInt(b) + parseInt(bint);
    }
    color = 'rgb(' + r + ',' + g + ',' + b + ')';
    if(element == 'background') {
      target.style.backgroundColor = color;
    } else if(element == 'border') {
      target.style.borderColor = color;
    } else {
      target.style.color = color;
    }
    target.r = r;
    target.g = g;
    target.b = b;
    target.step = target.step + 1;
  } else {
    clearInterval(target.timer);
    color = 'rgb(' + er + ',' + eg + ',' + eb + ')';
    if(element == 'background') {
      target.style.backgroundColor = color;
    } else if(element == 'border') {
      target.style.borderColor = color;
    } else {
      target.style.color = color;
    }
  }
}

// convert the color to rgb from hex //
function colorConv(color) {
  var rgb = [parseInt(color.substring(0,2),16), 
    parseInt(color.substring(2,4),16), 
    parseInt(color.substring(4,6),16)];
  return rgb;
}

function messageFade(id) {
	colorFade(id,'ffd59e','ffffff','000000','ffffff','ff9100','ffffff',50,20)//id, bg_start, bg_end, text_start, text_end, border_start,border_end,steps,speed
}