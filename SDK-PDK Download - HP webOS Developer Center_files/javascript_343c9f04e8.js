var browserName=navigator.appName;var browserVer=parseInt(navigator.appVersion);var version="";var msie4=(browserName=="Microsoft Internet Explorer"&&browserVer>=4);if((browserName=="Netscape"&&browserVer>=3)||msie4||browserName=="Konqueror"||browserName=="Opera"){version="n3";}else{version="n2";}
function blurLink(theObject){if(msie4){theObject.blur();}}
function decryptCharcode(n,start,end,offset){n=n+offset;if(offset>0&&n>end){n=start+(n-end-1);}else if(offset<0&&n<start){n=end-(start-n-1);}
return String.fromCharCode(n);}
function decryptString(enc,offset){var dec="";var len=enc.length;for(var i=0;i<len;i++){var n=enc.charCodeAt(i);if(n>=0x2B&&n<=0x3A){dec+=decryptCharcode(n,0x2B,0x3A,offset);}else if(n>=0x40&&n<=0x5A){dec+=decryptCharcode(n,0x40,0x5A,offset);}else if(n>=0x61&&n<=0x7A){dec+=decryptCharcode(n,0x61,0x7A,offset);}else{dec+=enc.charAt(i);}}
return dec;}
function linkTo_UnCryptMailto(s){location.href=decryptString(s,4);}var addthis_config={"ui_language":"en","ui_use_css":true,"services_compact":"google,twitter,facebook,delicious,blogger"};
/*
     FILE ARCHIVED ON 18:17:07 Feb 01, 2013 AND RETRIEVED FROM THE
     INTERNET ARCHIVE ON 21:25:59 Oct 04, 2018.
     JAVASCRIPT APPENDED BY WAYBACK MACHINE, COPYRIGHT INTERNET ARCHIVE.

     ALL OTHER CONTENT MAY ALSO BE PROTECTED BY COPYRIGHT (17 U.S.C.
     SECTION 108(a)(3)).
*/
/*
playback timings (ms):
  LoadShardBlock: 104.975 (3)
  esindex: 0.006
  captures_list: 131.905
  CDXLines.iter: 16.146 (3)
  PetaboxLoader3.datanode: 81.584 (4)
  exclusion.robots: 0.19
  exclusion.robots.policy: 0.175
  RedisCDXSource: 4.906
  PetaboxLoader3.resolve: 27.654
  load_resource: 54.193
*/