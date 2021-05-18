
/*========== Script Contents ==========

	1. Open Window Setting
	2. Smooth Scroll Setteing
	3. Copyright
	4. Hover（Jquery）
	5. Smart RollOver

====================================== */





/*===== ■1. Open Window Setting =====*/
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





/*===== ■2. Smooth Scroll Setteing =====*/
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





/*===== ■3. Copyright =====*/
function WriteCopyYear() {
	document.write(new Date().getFullYear());
}





/*===== ■4. Hover（Jquery） =====*/
$(function() {
  $("a.hover").bind({
    touchstart: function () {
      $(this).removeClass().addClass("touchstart");
    }
  });
});
$(function() {
  $("a.hover").bind({
    touchend: function () {
      $(this).removeClass().addClass("touchend");
    }
  });
});





/*===== ■5. Smart RollOver =====*/
$(function(){
	$('[src*="_off."]').bind('touchstart', function() {
		$(this).attr("src",$(this).attr("src").replace(/^(.+)_off(\.[a-z]+)$/,"$1_on$2"));
		}).bind('touchend', function() {
			$(this).attr("src",$(this).attr("src").replace(/^(.+)_on(\.[a-z]+)$/,"$1_off$2"));
		}).each(function(init) {
			$("<img>").attr("src",$(this).attr("src").replace(/^(.+)_off(\.[a-z]+)$/,"$1_on$2"));
	});
});




