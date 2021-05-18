jQuery(function(){
    if (window.localStorage != null) {
      var urlParam = location.search.substring(1);
      if(urlParam) {
        var param = urlParam.split('&');
       
        var paramArray = [];
       
        for (i = 0; i < param.length; i++) {
          var paramItem = param[i].split('=');
          paramArray[paramItem[0]] = paramItem[1];
        }
       
        var cam = paramArray.cam;
        var gr_no = paramArray.gr_no;
        var ad_no = paramArray.ad_no;
        var key = paramArray.key;
        var gclid = paramArray.gclid;
        var yclid = paramArray.yclid;
        console.log(gclid);
        console.log(yclid);
        if(gclid){
          window.localStorage.setItem('gclid', gclid);
        }
        if(yclid){
          window.localStorage.setItem('yclid', yclid);
        }
        if(cam){
          window.localStorage.setItem('cam', cam);
        }
        if(gr_no){
          window.localStorage.setItem('gr_no', gr_no);
        }
        if(ad_no){
          window.localStorage.setItem('ad_no', ad_no);
        }
        if(key){
          window.localStorage.setItem('key', key);
        }
      }
    }


  
  var cam = localStorage.getItem('cam', cam);
  var gr_no = localStorage.getItem('gr_no', gr_no);
  var ad_no = localStorage.getItem('ad_no', ad_no);
  var key = localStorage.getItem('key', key);
  var gclid = localStorage.getItem('gclid', gclid);
  var yclid = localStorage.getItem('yclid', yclid);
  console.log(gclid);
  console.log(yclid);
  console.log(cam);
  console.log(gr_no);
  console.log(ad_no);
  console.log(key);

  let uri = location.pathname ;

  if ( uri.indexOf('link') != -1) {

    let refreshUrl = document.getElementsByTagName("meta")[3].getAttribute('content');
    if(gclid){
      let linkUrl = refreshUrl+"&add="+gclid;
      document.getElementsByTagName("meta")[3].setAttribute('content',linkUrl);
    }else
    if(yclid){
      let linkUrl = refreshUrl+"&add="+yclid;
      document.getElementsByTagName("meta")[3].setAttribute('content',linkUrl);
    }else{
      let linkUrl = refreshUrl;
      document.getElementsByTagName("meta")[3].setAttribute('content',linkUrl);
    }
  }
	jQuery('a.prrrr').each(function(e,v){
		var url =  jQuery(v).attr("href");
        console.log(url);

        if ( ~url.indexOf('?')) {

		  jQuery(v).attr("href",url + "&cam=" + cam + "&gr_no=" + gr_no + "&ad_no=" + ad_no + "&key=" + key)

        } else {

		  jQuery(v).attr("href",url + "?cam=" + cam + "&gr_no=" + gr_no + "&ad_no=" + ad_no + "&key=" + key)

        }
	});
});