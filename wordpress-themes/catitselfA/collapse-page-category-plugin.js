/*
Plugin Name: Collapse Page and Category Plugin
Plugin URI: http://www.BlogsEye.com/
Description: Uses Javascript to collapse children on Pages and Categories or any List that uses the css class 'children'
Version: 1.5
Author: Keith P. Graham
Author URI: http://www.BlogsEye.com/

This software is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/
	function kpg_colpage_context(event) {
		var ev=event||window.event;
		var targ=ev.srcElement||ev.target;
		var nodes=targ.parentNode.childNodes;
		for (var i = 0; i < nodes.length; i++) {
			if (nodes[i].className=="children") {
				if (nodes[i].style.display=="none") {
					nodes[i].style.display="block";
					nodes[i].style.visibility="visible";
					if(ev.stopPropagation) {ev.stopPropagation();}
					ev.cancelBubble = true;
					// targ.innerHTML='&#9651;&nbsp;'
					targ.innerHTML='&#9660;&nbsp;'
					targ.id='ktriangledn';
					return false;
				} else {
					nodes[i].style.visibility="hidden";
					nodes[i].style.display="none";
					if(ev.stopPropagation) {ev.stopPropagation();}
					ev.cancelBubble = true;
					// targ.innerHTML='&#9661;&nbsp;'
					targ.innerHTML='&#9654;&nbsp;'
					targ.id='ktriangleup';
					return false;
				}
			}
		}
		return false;
	}
	function kpg_colpage_action(event) {
	    var clicker='<a href="#" style="text-decoration:none;" onclick="return kpg_colpage_context(event);">&#9654;&nbsp;</a>';
		// right triangle is &#9657;
		// filed triangles are one less than open ones.
		try {
			var b=document.getElementsByTagName("UL"); // case sensitive XML
			for (var i=0;i<b.length;i++) {
				// make parent clickable and the child no display
				if (b[i].className=="children") {
					// search for parent li - check a few times incase the ul tags are heavily formatted
					var p=b[i].parentNode;
					b[i].style.visibility="hidden";
					b[i].style.display="none";
					// set the p object with a character before with a click item attached to it.
					p.innerHTML=clicker+p.innerHTML;
					// code thanks to Jette!!
					var m = p.className.match(/current_page_/);
					if (m !=null) {
						b[i].style.visibility="visible";
						b[i].style.display="block";
					}
				}
			}
		} catch (ee) {}
	}

	if (!document.all) {
		HTMLElement.prototype.click = function() {
			var evt = this.ownerDocument.createEvent('MouseEvents');
			evt.initMouseEvent('click', true, true, this.ownerDocument.defaultView, 1, 0, 0, 0, 0, false, false, false, false, 0, null);
			this.dispatchEvent(evt);
		} 
	}
	// set the onload event
	if (document.addEventListener) {
		document.addEventListener("DOMContentLoaded", function(event) { kpg_colpage_action(event); }, false);
	} else if (window.attachEvent) {
		window.attachEvent("onload", function(event) { kpg_colpage_action(event); });
	} else {
		var oldFunc = window.onload;
		window.onload = function() {
			if (oldFunc) {
				oldFunc();
			}
				kpg_colpage_action('load');
			};
	}