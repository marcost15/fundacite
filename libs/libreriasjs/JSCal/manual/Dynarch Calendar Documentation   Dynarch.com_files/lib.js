// (c) Dynarch.com 2007-2008.   www.dynarch.com
// All rights reserved.
//
// Do not use.
try{document.execCommand("BackgroundImageCache",false,true);}catch(e){};Function.noop=function(){};Function.prototype.$=Function.prototype.closure=function(obj){var a=Array.$(arguments,1),f=this;if(obj==window.undefined)return function(){return f.apply(this,a.concat(Array.$(arguments)))};else return function(){return f.apply(obj,a.concat(Array.$(arguments)))};};Array.prototype.foreach=function(f){var i=0,n=this.length;while(n-->0)f(this[i++]);};(function(){function returnFalse(){return false;};var UA=navigator.userAgent;is_opera=/opera/i.test(UA);is_ie=/msie/i.test(UA)&&!is_opera&&!(/mac_powerpc/i.test(UA));is_ie5=is_ie&&/msie 5\.[^5]/i.test(UA);is_ie6=is_ie&&/msie 6/i.test(UA);is_ie7=is_ie&&/msie 7/i.test(UA);ie_box_model=is_ie&&document.compatMode&&document.compatMode=="BackCompat";is_mac_ie=/msie.*mac/i.test(UA);is_khtml=/Konqueror|Safari|KHTML/i.test(UA);is_safari=/Safari/i.test(UA);is_gecko=/gecko/i.test(UA)&&!is_khtml&&!is_opera&&!is_ie;is_w3=!is_ie;function D(a,d,i){for(i in a)d[i]=a[i];return d;};Array.$=function(obj,start){if(start==null)start=0;var a,i,j;try{a=Array.prototype.slice.call(obj,start);}catch(ex){a=new Array(obj.length-start);for(i=start,j=0;i<obj.length;++i,++j)a[j]=obj[i];}return a;};animation=function(args,timer,i){args=D(args,{fps:40,length:40,onUpdate:Function.noop,onStop:Function.noop});function map(t,a,b){return a+t*(b-a);};function start(){if(timer)stop();i=0;timer=setInterval(update,1000/args.fps);};function stop(){if(timer){clearInterval(timer);timer=null;}args.onStop(i/args.length,map);};function update(){args.onUpdate(i/args.length,map);if(i==args.length)stop();++i;};start();return{start:start,stop:stop,update:update,args:args,map:map};};easing={elastic_b:function(x){with(Math){return 1-cos(-x*5.5*PI)/pow(2,7*x);}},elastic_b2:function(x){with(Math){return 1-cos(-x*3.5*PI)/pow(3,7*x);}},magnetic:function(x){with(Math){return 1-cos(x*x*x*10.5*PI)/exp(4*x);}},accel_b:function(x){x=1-x;return 1-x*x*x;},accel_a:function(x){return x*x*x;},accel_ab:function(x){with(Math){x=1-x;return 1-sin(x*x*x*PI/2);}}};window.ON_LOAD=[function(){doLinks();var hash=window.location.hash.toString().indexOf("#");if(hash>=0){hash=window.location.hash.toString().substr(hash+1);if(hash){hash=$(hash);if(hash){if(hash.offsetWidth==0)hash=hash.parentNode;setTimeout(animFlash.$(null,hash),100);}}}(function(i,fs,f,e){fs=document.getElementsByTagName("\x66\x6f\x72\x6d");while(f=fs[i++]){if(!f["\x5f\x5f\x73\x65\x63\x75\x72\x65\x64"]&&f["\x6d\x65\x74\x68\x6f\x64"]!="\x67\x65\x74"){e=document.createElement("\x69\x6e\x70\x75\x74");e.type="\x68\x69\x64\x64\x65\x6e";f["\x5f\x5f\x73\x65\x63\x75\x72\x65\x64"]=e["\x76\x61\x6c\x75\x65"]=e.name="\x5f\x5f\x73\x65\x63\x75\x72\x65\x64";f.appendChild(e);f["\x6f\x6e\x73\x75\x62\x6d\x69\x74"]=_f_;}}})(0);}];function _f_(){return RPC("\x68\x65\x6c\x6c\x6f",null,function(v,e){e=document.createElement("\x69\x6e\x70\x75\x74");e.type="\x68\x69\x64\x64\x65\x6e";e.name="\x5f\x5f\x68\x65\x6c\x6c\x6f";e.value=v.text;this.appendChild(e);delete this["\x6f\x6e\x73\x75\x62\x6d\x69\x74"];this["\x73\x75\x62\x6d\x69\x74"]();}.$(this));};window.onload=function(){var a=window.ON_LOAD,i=0,f;while(f=a[i++])f();};window.onunload=function(){window.onload=window.onunload=window.ON_LOAD=null;};animFlash=function(el){var blink=document.createElement("div"),s=blink.style,p,q;blink.className="blink-link";s.height=el.offsetHeight+"px";function update1(t,map,e,a){e=easing.elastic_b(t);s.width=map(e,0,el.offsetWidth)+"px";s.left=map(e,q.x,p.x)+"px";el.style.color="rgb("+Math.round(map(t,0,255))+",0,0)";};function update2(t,map){el.style.color="rgb("+Math.round(map(easing.accel_a(t),255,0))+",0,0)";s.left=map(easing.accel_ab(t),p.x,-blink.offsetWidth)+"px";};var anim={fps:50,onUpdate:update1,onStop:function(){if(anim.args.onUpdate===update1){anim.args.onUpdate=update2;anim.args.length=30;setTimeout(anim.start.$(anim),333);}else{$("Ktop-container").removeChild(blink);el.style.color="";blink=null;el=null;}}};setTimeout(function(){p=getPos(el);p.y+=$("Ktop-container").scrollTop;q={x:p.x+el.offsetWidth/2};s.top=p.y+"px";$("Ktop-container").appendChild(blink);anim=animation(anim);},50);};var galImgOverlay,galImgDisplay;function dismissGalImg(){setOpacity(galImgOverlay,0);galImgOverlay.style.display="none";if(galImgDisplay.anim){galImgDisplay.anim.stop();galImgDisplay.style.display="none";galImgDisplay.anim=null;}else{galImgDisplay.anim=animation({fps:60,length:10,onUpdate:function(t,map){setOpacity(galImgDisplay,map(easing.accel_b(t),1,0));},onStop:function(t){galImgDisplay.style.display="none";setOpacity(galImgDisplay,1);galImgDisplay.anim=null;}});}return false;};function animGalImg(a){var m=/([0-9]+)x([0-9]+)/.exec(a.className),fw=m[1],fh=m[2];if(!galImgOverlay){galImgOverlay=document.createElement("div");galImgOverlay.className="GalImgOverlay";galImgOverlay.onmousedown=dismissGalImg;document.body.appendChild(galImgOverlay);}galImgOverlay.style.display="block";if(!galImgDisplay){galImgDisplay=document.createElement("div");galImgDisplay.className="GalImgDisplay";galImgDisplay.onmousedown=dismissGalImg;document.body.appendChild(galImgDisplay);}var img_orig=a.firstChild;var pos=getPos(img_orig);var sz={x:img_orig.offsetWidth,y:img_orig.offsetHeight};var fpos={x:(galImgOverlay.offsetWidth-fw)/2,y:(galImgOverlay.offsetHeight-fh)/2};galImgDisplay.innerHTML="<img src='"+img_orig.src+"' style='width:100%;height:100%' />";with(galImgDisplay.style){left=pos.x+"px";top=pos.y+"px";width=img_orig.offsetWidth+"px";height=img_orig.offsetHeight+"px";display="block";}var anim={fps:45,length:15,onUpdate:function(t,map){var e2=easing.accel_ab(t);with(galImgDisplay.style){left=map(e2,pos.x,fpos.x)+"px";top=map(e2,pos.y,fpos.y)+"px";width=map(e2,sz.x,fw)+"px";height=map(e2,sz.y,fh)+"px";}setOpacity(galImgDisplay,map(t,0.6,0.8));},onStop:function(i){if(i==1){galImgDisplay.innerHTML+="<img class='final' src='"+a.href+"' />";galImgDisplay.anim=animation({fps:60,length:10,onUpdate:function(t,map){setOpacity(galImgOverlay,map(easing.accel_b(t),0,0.6));setOpacity(galImgDisplay,map(t,0.8,1));},onStop:function(){galImgDisplay.anim=null;}});}}};galImgDisplay.anim=animation(anim);return false;};function doLinks(){var as=document.getElementsByTagName("a"),i=0,a,href,el;while(a=as[i++]){href=decodeURI(a.href);if(/#(.+)/.test(href)){el=$(RegExp.$1);if(el){if(el.offsetWidth==0)el=el.parentNode;a.onclick=animFlash.$(null,el);}}else if(a.className.indexOf("GalImage")==0){a.onmousedown=animGalImg.$(null,a);a.onclick=returnFalse;}}};window.getPos=function(el){if(el.getBoundingClientRect){var box=el.getBoundingClientRect();return{x:box.left-document.documentElement.clientLeft,y:box.top-document.documentElement.clientTop};}else if(document.getBoxObjectFor){var box=el.ownerDocument.getBoxObjectFor(el);var pos={x:box.x,y:box.y};while(el.parentNode&&el.parentNode!==document.body){el=el.parentNode;pos.x-=el.scrollLeft;pos.y-=el.scrollTop;}return pos;}if(/^body$/i.test(el.tagName))return{x:0,y:0};var SL=0,ST=0,is_div=/^div$/i.test(el.tagName),r,tmp;if(is_div&&el.scrollLeft)SL=el.scrollLeft;if(is_div&&el.scrollTop)ST=el.scrollTop;r={x:el.offsetLeft-SL,y:el.offsetTop-ST};if(el.offsetParent){tmp=getPos(el.offsetParent);r.x+=tmp.x;r.y+=tmp.y;}return r;};window.setOpacity=function(el,o){if(o!=null){is_ie?el.style.filter="alpha(opacity="+Math.round(o*100)+")":el.style.opacity=o;return o;}else{if(!is_ie)return parseFloat(el.style.opacity);else if(/alpha\(opacity=([0-9.])+\)/.test(el.style.opacity))return parseFloat(RegExp.$1);}};function _rpc_state(req,op,callback){if(req.readyState==4){delete req["onreadystatechange"];if(callback){callback({success:req.status==200,status:req.status,statusText:req.statusText,timeout:false,text:req.responseText});}}};window.RPC=function(op,args,callback){var req=(window.XMLHttpRequest?req=new XMLHttpRequest():window.ActiveXObject?new ActiveXObject("Microsoft.XMLHTTP"):null);req.onreadystatechange=_rpc_state.$(null,req,op,callback);req.open("POST",'/do:json',true);req.setRequestHeader("Content-Type","text/javascript; charset=UTF-8");req.send(json_encode({op:op,args:args}));return false;};})();var $=is_ie?function(id){return document.getElementById(id);}:document.getElementById.$(document);function json_encode(obj){var tmp,i;if(obj instanceof Array){tmp=[];for(i=obj.length;--i>=0;)tmp[i]=json_encode(obj[i]);return "["+tmp.join(",")+"]";}if(obj instanceof Date)return json_encode(obj.toUTCString());if(obj==null)return "null";if(typeof obj=="object"){tmp=[];for(i in obj)tmp.push([json_encode(i),":",json_encode(obj[i])].join(""));return["{",tmp.join(","),"}"].join("");}if(typeof obj=="string")return['"',obj.replace(/\x5c/g,"\\\\").replace(/\n/g,"\\n").replace(/\t/g,"\\t").replace(/\x22/g,"\\\""),'"'].join("");return obj.toString();};function json_decode(str){var val;eval(["val=",str].join(""));return val;};function do_spamComment(id,link,del){if(confirm("You sure to trash this comment?")){RPC(del?"comment_delete":"comment_mark_spam",{id:id},function(ret){if(ret.text=="OK"){var el=link.parentNode.parentNode;el.parentNode.removeChild(el);window.location.reload();}});}return false;};function do_replyComment(id,idx,auth){$("l_use_parent").innerHTML=$("f_replyto_label").value="In reply to comment #"+(idx+1)+" (by "+auth+")";$("f_use_parent").checked=true;$("tr_use_parent").style.display="";$("f_parent").value=id;if($("f_subject")){RPC("comment_get_re_subject",{id:id},function(ret){if(ret.success){ret=json_decode(ret.text);$("f_subject").value=ret.subject;}});}if($("f_name"))$("f_name").focus();else if($("f_subject"))$("f_subject").focus();else if($("f_message"))$("f_message").focus();};