/* json2.js minified from https://github.com/douglascrockford/JSON-js */

if(typeof JSON!=='object'){JSON={};}
(function(){'use strict';var rx_one=/^[\],:{}\s]*$/,rx_two=/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g,rx_three=/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g,rx_four=/(?:^|:|,)(?:\s*\[)+/g,rx_escapable=/[\\\"\u0000-\u001f\u007f-\u009f\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,rx_dangerous=/[\u0000\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g;function f(n){return n<10?'0'+n:n;}
function this_value(){return this.valueOf();}
if(typeof Date.prototype.toJSON!=='function'){Date.prototype.toJSON=function(){return isFinite(this.valueOf())?this.getUTCFullYear()+'-'+
f(this.getUTCMonth()+1)+'-'+
f(this.getUTCDate())+'T'+
f(this.getUTCHours())+':'+
f(this.getUTCMinutes())+':'+
f(this.getUTCSeconds())+'Z':null;};Boolean.prototype.toJSON=this_value;Number.prototype.toJSON=this_value;String.prototype.toJSON=this_value;}
var gap,indent,meta,rep;function quote(string){rx_escapable.lastIndex=0;return rx_escapable.test(string)?'"'+string.replace(rx_escapable,function(a){var c=meta[a];return typeof c==='string'?c:'\\u'+('0000'+a.charCodeAt(0).toString(16)).slice(-4);})+'"':'"'+string+'"';}
function str(key,holder){var i,k,v,length,mind=gap,partial,value=holder[key];if(value&&typeof value==='object'&&typeof value.toJSON==='function'){value=value.toJSON(key);}
if(typeof rep==='function'){value=rep.call(holder,key,value);}
switch(typeof value){case'string':return quote(value);case'number':return isFinite(value)?String(value):'null';case'boolean':case'null':return String(value);case'object':if(!value){return'null';}
gap+=indent;partial=[];if(Object.prototype.toString.apply(value)==='[object Array]'){length=value.length;for(i=0;i<length;i+=1){partial[i]=str(i,value)||'null';}
v=partial.length===0?'[]':gap?'[\n'+gap+partial.join(',\n'+gap)+'\n'+mind+']':'['+partial.join(',')+']';gap=mind;return v;}
if(rep&&typeof rep==='object'){length=rep.length;for(i=0;i<length;i+=1){if(typeof rep[i]==='string'){k=rep[i];v=str(k,value);if(v){partial.push(quote(k)+(gap?': ':':')+v);}}}}else{for(k in value){if(Object.prototype.hasOwnProperty.call(value,k)){v=str(k,value);if(v){partial.push(quote(k)+(gap?': ':':')+v);}}}}
v=partial.length===0?'{}':gap?'{\n'+gap+partial.join(',\n'+gap)+'\n'+mind+'}':'{'+partial.join(',')+'}';gap=mind;return v;}}
if(typeof JSON.stringify!=='function'){meta={'\b':'\\b','\t':'\\t','\n':'\\n','\f':'\\f','\r':'\\r','"':'\\"','\\':'\\\\'};JSON.stringify=function(value,replacer,space){var i;gap='';indent='';if(typeof space==='number'){for(i=0;i<space;i+=1){indent+=' ';}}else if(typeof space==='string'){indent=space;}
rep=replacer;if(replacer&&typeof replacer!=='function'&&(typeof replacer!=='object'||typeof replacer.length!=='number')){throw new Error('JSON.stringify');}
return str('',{'':value});};}
if(typeof JSON.parse!=='function'){JSON.parse=function(text,reviver){var j;function walk(holder,key){var k,v,value=holder[key];if(value&&typeof value==='object'){for(k in value){if(Object.prototype.hasOwnProperty.call(value,k)){v=walk(value,k);if(v!==undefined){value[k]=v;}else{delete value[k];}}}}
return reviver.call(holder,key,value);}
text=String(text);rx_dangerous.lastIndex=0;if(rx_dangerous.test(text)){text=text.replace(rx_dangerous,function(a){return'\\u'+
('0000'+a.charCodeAt(0).toString(16)).slice(-4);});}
if(rx_one.test(text.replace(rx_two,'@').replace(rx_three,']').replace(rx_four,''))){j=eval('('+text+')');return typeof reviver==='function'?walk({'':j},''):j;}
throw new SyntaxError('JSON.parse');};}}());




/* alert banner push */

var pollingInterval = 10;  /* how often to request new data, in seconds... need to manually change in alert-stream.php, too */


function clearBanner(data) {

  document.getElementById('UNCC_Alerts').className = document.getElementById('UNCC_Alerts').className.replace(/\bwww-uncc-edu-alert-active\b/, '');
  document.body.style.backgroundPosition=bkgImgPos;
  banner.style.backgroundColor=bkgColor;
  banner.innerHTML='';
  data.title='';
  data.link='';

  return;

}


function updateBanner(data) {

  if (data.type != "") {
  	
	// This snippet would prevent the appearance of 'yellow' alerts...
	/*
    if ( (data.type == 'yellow') && (document.location.hostname != 'www.uncc.edu') ) {
      clearBanner(data);
      return;
    }
    */

    if (data.type == 'red') {
      var alertBackgroundColor = '#b22222';
      var alertTextColor = '#ffffff'; 
    } else if (data.type == 'yellow') {
      var alertBackgroundColor = '#ffcc00';
      var alertTextColor = '#000000'; 
    }

    if (document.getElementById('UNCC_Alerts').className.indexOf('www-uncc-edu-alert-active') < 0) {
      document.getElementById('UNCC_Alerts').className += ' www-uncc-edu-alert-active';
      window.scrollTo(0, 0);
    }

    document.body.style.backgroundPosition='0 81px';
    banner.style.backgroundColor=alertBackgroundColor;
    banner.style.color=alertTextColor;
    banner.innerHTML='<div style="display: block; height: 65px; margin: 8px 0 8px 0; "><div style="padding: 5px; text-align: center; background: '+alertBackgroundColor+';"><span id="www-uncc-edu-alert-banner-text1" style="line-height: 27px; font-family: arial, helvetica, sans-serif; font-size: 14px; color: '+alertTextColor+'; font-weight: bold; text-decoration: none;">'+data.title+'</span><br /><a id="www-uncc-edu-alert-banner-link" href="'+data.link+'" target="_blank" style="font-family: arial, helvetica, sans-serif; color: '+alertTextColor+'; font-size: 12px;"><span id="www-uncc-edu-alert-banner-text2" style="text-decoration: underline; font-family: arial, helvetica, sans-serif; color: '+alertTextColor+'; font-size: 12px;">Click here for more information</span></a></div>';

    return;

  } else {
    clearBanner(data);
  }

}


function updateLastUpdated(secsAgo) {

  secsAgo += 10;

  if (secsAgo > (pollingInterval-1)) {
    setTimeout(function() { updateLastUpdated(0); }, 10000);
    return;
  }

  var secsStr = secsAgo + ' seconds ago.';
  if (secsAgo == 1) {
    secsStr = '1 second ago.';
  }

  var lastUpdated = document.getElementById('www-uncc-edu-alert-last-updated');
  if (lastUpdated) {
    lastUpdated.innerHTML='Last updated: ' + secsStr;
  }

  setTimeout(function() { updateLastUpdated(secsAgo); }, 10000);

}


function getJSONwithIE() {

  var ts = Math.round(new Date().getTime() / 1000);

  if (window.location.hash.indexOf('www-uncc-edu-alert-test') > 0) {
    var url = '//www.uncc.edu/alerts/alerts-test.json?'+ts;
  } else {
    var url = '//www.uncc.edu/alerts/alerts.json?'+ts;
  }

  if (window.XDomainRequest) {
    xdr = new XDomainRequest();
    if (xdr) {
      xdr.onload = function() {
        data = JSON.parse(xdr.responseText);
        updateBanner(data);
      };
      xdr.open('get', url);
      xdr.send();
    }
  }
  else if (window.XMLHttpRequest) {
    var xhr = new XMLHttpRequest();
    xhr.open('get', url, true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        data = JSON.parse(xhr.responseText);
        updateBanner(data); 
      }
    }
    xhr.send(null);
  }

  setTimeout('getJSONwithIE()', pollingInterval*1000); 

}


document.body.insertAdjacentHTML('afterbegin', '<div id="www-uncc-edu-alert"></div>');


var banner = document.getElementById('www-uncc-edu-alert');
var bkgImgPos = document.body.style.backgroundPosition;
var bkgColor = document.body.style.backgroundColor;
var ts = new Date().getMinutes();

if (banner) {

  if (!!window.EventSource) {
    if (window.location.hash.indexOf('www-uncc-edu-alert-test') > 0) {
      var source = new EventSource('//www.uncc.edu/alerts/alert-stream-test.php?'+ts);
    } else {
      var source = new EventSource('//www.uncc.edu/alerts/alert-stream.php?'+ts);
    }
    source.addEventListener('message', function(e) {
      data = JSON.parse(e.data);
      updateBanner(data);
    }, false);
  } else {
    getJSONwithIE();
  }

<!--  setTimeout(function() { updateLastUpdated(0); }, 10000); -->

}