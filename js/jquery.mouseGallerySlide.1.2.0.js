/*
 * jQuery mouseGallerySlide v1.1.0
 *
 * Copyright (c) 2008 Taranets Aleksey
 * www: markup-javascript.com
 * Licensed under the MIT License:
 * http://www.opensource.org/licenses/mit-license.php
 */

jQuery.fn.mouseGallerySlide = function(_options){
	// defaults options
	var _options = jQuery.extend({
		scrollElParent: 'ul',
		scrollEl: 'li'
	},_options);

	return this.each(function(){
		var _this = $(this),
			_height = _this.outerHeight(), //static
			_scrollElParent = jQuery(_options.scrollElParent,_this),
			_scrollEl = jQuery(_options.scrollEl,_this),
			_posParent = _scrollElParent.offset(),
			_liHeight = _scrollEl.outerHeight(true), //static
			_liWidth = _scrollEl.outerWidth(true), //static
			_liSum = _scrollEl.length * _liHeight;

		var _sec = (_liSum - _height) * 30,
			_maxMargin = _liSum - _height,
			_posHolder = _this.offset(), //static
			_width = _this.outerWidth(); //static
			
		var _chapter = _height/12,
			_speed = 0
			_direction = 2;
			_timerOut = false;
			
		jQuery(document).resize(function(){
			_posHolder = _this.offset();
			_height = _this.outerHeight();
			_liHeight = _scrollEl.outerHeight(true);
			_liSum = _scrollEl.length * _liHeight;
		});

		$(document).mousemove(function(e){
			//console.log('_liSum='+_liSum+' e.pageY='+e.pageY);
			if (e.pageY > _posHolder.top && e.pageY < (_posHolder.top + _height) && e.pageY < _liSum-140 && e.pageX > _posParent.left && e.pageX < (_posParent.left + _liWidth)) {
				mouseOverMove(e);
			}
			else  {
				_scrollElParent.stop();
				_speed = 0;
			}
		});

		function mouseOverMove(e) {			
			var _newSpeed = 0;
			for (var i=0; i <= 12; i++) {
				
				if ((_chapter*i) > (e.pageY - _posHolder.top)) {
					//console.log(_chapter*i);
					//console.log('e.pageY='+e.pageY);
					//console.log('i='+i);
					switch(i){
						case 1: _newSpeed = 3;break
						case 2:	_newSpeed = 3;break
						case 3: _newSpeed = 2;break
						case 4: _newSpeed = 1;break
						case 12: _newSpeed = 3;break
						case 11: _newSpeed = 3;break
						case 10: _newSpeed = 2;break
						case 9: _newSpeed = 1;break
						default:_newSpeed = 0;
					}
					if (i < 5) _direction = 1;
					else if (i > 8) _direction = 3;
					else if (i==5 || i==8) _direction = 2;
					break;
				}
			}
			//console.log(_newSpeed);
			if(_speed != _newSpeed) {
				_speed = _newSpeed*4;
			    animateEl();
			}
		}
		function animateEl() {
			//if (_timerOut) clearTimeout(_timerOut);
			_scrollElParent.stop();
			var _curMargin = parseInt(_scrollElParent.css('marginTop'));
			if (_direction == 1) {
				//console.log('ddd');
				var k = -_curMargin/_maxMargin;
				//console.log('k='+k+' speed='+_speed+' (_sec/_speed)*k='+(_sec/_speed)*k);
				_scrollElParent.stop()
					.animate(
						{marginTop:0},
						{easing:'linear',duration:(_sec/_speed)*k, complete:function(){
							_scrollElParent.stop(); //add myself
							//_scrollElParent.css({'marginTop':-(_maxMargin)});
							//_timerOut = setTimeout(function(){animateEl()},15)
						}}
					);
			}
			if (_direction == 2) {
				//console.log('!!!');
				//var k = -_curMargin/_maxMargin;
				//console.log('k='+k+' speed='+_speed+' (_sec/_speed)*k='+(_sec/_speed)*k);
				_scrollElParent.stop();
			}
			if (_direction == 3) {
				//console.log(-_maxMargin+_height);
				var k = (_maxMargin + _curMargin)/_maxMargin;
				//console.log('2) k='+k+' speed='+_speed+' (_sec/_speed)*k='+(_sec/_speed)*k);
				_scrollElParent.stop()
					.animate(
						{marginTop:-_maxMargin-40},
						{easing:'linear',duration:(_sec/_speed)*k, complete:function(){
							//console.log('stop complete');
							_scrollElParent.stop();
							//_scrollElParent.css({'marginTop':0});
							//_timerOut = setTimeout(function(){animateEl()},15)
						}}
					);
			}
		}
	});
}