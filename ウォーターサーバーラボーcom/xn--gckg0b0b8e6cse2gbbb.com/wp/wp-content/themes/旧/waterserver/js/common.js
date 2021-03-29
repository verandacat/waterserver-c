
/*========== Script Contents ==========

	1. Smooth Scroll Setting
	2. Justify a Box Height
	3. Copyright
	4. Open Window Setting

====================================== */



function show_hide_row(row)
{$("#"+row).toggle();}

/*===== ■1. Smooth Scroll Setting =====*/
Scroller = {
	// control the speed of the scroller.
	// dont change it here directly, please use Scroller.speed=50;
	speed:10,

	// returns the Y position of the div
	gy: function (d) {
		gy = d.offsetTop
		if (d.offsetParent) while (d = d.offsetParent) gy += d.offsetTop
		return gy
	},

	// returns the current scroll position
	scrollTop: function (){
		body=document.body
		d=document.documentElement
		if (body && body.scrollTop) return body.scrollTop
		if (d && d.scrollTop) return d.scrollTop
		if (window.pageYOffset) return window.pageYOffset
		return 0
	},

	// attach an event for an element
	// (element, type, function)
	add: function(event, body, d) {
		if (event.addEventListener) return event.addEventListener(body, d,false)
		if (event.attachEvent) return event.attachEvent('on'+body, d)
	},

	// kill an event of an element
	end: function(e){
		if (window.event) {
			window.event.cancelBubble = true
			window.event.returnValue = false
	  		return;
		}
		if (e.preventDefault && e.stopPropagation) {
		  e.preventDefault()
		  e.stopPropagation()
		}
	},
	
	// move the scroll bar to the particular div.
	scroll: function(d){
		i = window.innerHeight || document.documentElement.clientHeight;
		h=document.body.scrollHeight;
		a = Scroller.scrollTop()
		if (d>a) {
			if (d>h-i) d = h-i;
			a += Math.ceil((d-a)/Scroller.speed);
		}
		else
			a = a+(d-a)/Scroller.speed;
		window.scrollTo(0,a)
	  	if(a==d || Scroller.offsetTop==a)clearInterval(Scroller.interval)
	  	Scroller.offsetTop=a
	},
	// initializer that adds the renderer to the onload function of the window
	init: function(){
		Scroller.add(window,'load', Scroller.render)
	},

	// this method extracts all the anchors and validates then as # and attaches the events.
	render: function(){
		a = document.getElementsByTagName('a');
		Scroller.end(this);
		window.onscroll
		for (i=0;i<a.length;i++) {
			l = a[i];
			p1 = l.href.replace(/#.*/, "");
			p2 = location.href.replace(/#.*/, "");
			if(l.href && l.href.indexOf('#') != -1 && ((p1==p2) || ('/'+p1==p2)) ){
				Scroller.add(l,'click',Scroller.end)
				l.onclick = function(){
					Scroller.end(this);
					l=this.hash.substr(1);
					a = document.getElementById(l);
					if (a) {
						clearInterval(Scroller.interval);
						Scroller.interval=setInterval('Scroller.scroll('+Scroller.gy(a)+')',10);
					}
				}
			}
		}
	}
}
// invoke the initializer of the scroller
Scroller.init();





/*===== ■2. Justify a Box Height =====*/
new function(){
	
	function HeightLine(){
	
		this.className="HeightLine";
		this.parentClassName="HeightLineParent"
		reg = new RegExp(this.className+"([a-zA-Z0-9-_]+)", "i");
		objCN =new Array();
		var objAll = document.getElementsByTagName ? document.getElementsByTagName("*") : document.all;
		for(var i = 0; i < objAll.length; i++) {
			var eltClass = objAll[i].className.split(/\s+/);
			for(var j = 0; j < eltClass.length; j++) {
				if(eltClass[j] == this.className) {
					if(!objCN["main CN"]) objCN["main CN"] = new Array();
					objCN["main CN"].push(objAll[i]);
					break;
				}else if(eltClass[j] == this.parentClassName){
					if(!objCN["parent CN"]) objCN["parent CN"] = new Array();
					objCN["parent CN"].push(objAll[i]);
					break;
				}else if(eltClass[j].match(reg)){
					var OCN = eltClass[j].match(reg)
					if(!objCN[OCN]) objCN[OCN]=new Array();
					objCN[OCN].push(objAll[i]);
					break;
				}
			}
		}
		
		//check font size
		var e = document.createElement("div");
		var s = document.createTextNode("S");
		e.appendChild(s);
		e.style.visibility="hidden"
		e.style.position="absolute"
		e.style.top="0"
		document.body.appendChild(e);
		var defHeight = e.offsetHeight;
		
		changeBoxSize = function(){
			for(var key in objCN){
				if (objCN.hasOwnProperty(key)) {
					//parent type
					if(key == "parent CN"){
						for(var i=0 ; i<objCN[key].length ; i++){
							var max_height=0;
							var CCN = objCN[key][i].childNodes;
							for(var j=0 ; j<CCN.length ; j++){
								if(CCN[j] && CCN[j].nodeType == 1){
									CCN[j].style.height="auto";
									max_height = max_height>CCN[j].offsetHeight?max_height:CCN[j].offsetHeight;
								}
							}
							for(var j=0 ; j<CCN.length ; j++){
								if(CCN[j].style){
									var stylea = CCN[j].currentStyle || document.defaultView.getComputedStyle(CCN[j], '');
									var newheight = max_height;
									if(stylea.paddingTop)newheight -= stylea.paddingTop.replace("px","");
									if(stylea.paddingBottom)newheight -= stylea.paddingBottom.replace("px","");
									if(stylea.borderTopWidth && stylea.borderTopWidth != "medium")newheight-= stylea.borderTopWidth.replace("px","");
									if(stylea.borderBottomWidth && stylea.borderBottomWidth != "medium")newheight-= stylea.borderBottomWidth.replace("px","");
									CCN[j].style.height =newheight+"px";
								}
							}
						}
					}else{
						var max_height=0;
						for(var i=0 ; i<objCN[key].length ; i++){
							objCN[key][i].style.height="auto";
							max_height = max_height>objCN[key][i].offsetHeight?max_height:objCN[key][i].offsetHeight;
						}
						for(var i=0 ; i<objCN[key].length ; i++){
							if(objCN[key][i].style){
								var stylea = objCN[key][i].currentStyle || document.defaultView.getComputedStyle(objCN[key][i], '');
									var newheight = max_height;
									if(stylea.paddingTop)newheight-= stylea.paddingTop.replace("px","");
									if(stylea.paddingBottom)newheight-= stylea.paddingBottom.replace("px","");
									if(stylea.borderTopWidth && stylea.borderTopWidth != "medium")newheight-= stylea.borderTopWidth.replace("px","")
									if(stylea.borderBottomWidth && stylea.borderBottomWidth != "medium")newheight-= stylea.borderBottomWidth.replace("px","");
									objCN[key][i].style.height =newheight+"px";
							}
						}
					}
				}
			}
		}
		
		checkBoxSize = function(){
			if(defHeight != e.offsetHeight){
				changeBoxSize();
				defHeight= e.offsetHeight;
			}
		}
		changeBoxSize();
		setInterval(checkBoxSize,1000)
		window.onresize=changeBoxSize;
	}
	
	function addEvent(elm,listener,fn){
		try{
			elm.addEventListener(listener,fn,false);
		}catch(e){
			elm.attachEvent("on"+listener,fn);
		}
	}
	addEvent(window,"load",HeightLine);
}





/*===== ■3. Copyright =====*/
function WriteCopyYear() {
	document.write(new Date().getFullYear());
}





/*===== ■4. Open Window Setting =====*/
function externalLinks() {
	if (!document.getElementsByTagName) return;
		var anchors = document.getElementsByTagName("a");
	for (var i=0; i<anchors.length; i++) {
		var anchor = anchors[i];
	if (anchor.getAttribute("href") &&
		((anchor.getAttribute("rel") == "external nofollow") || (anchor.getAttribute("rel") == "nofollow external") || (anchor.getAttribute("rel") == "external")))
		anchor.target = "_blank";
		}
	}

window.onload = externalLinks;