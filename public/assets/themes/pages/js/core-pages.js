/*! pace 1.0.2 */
(function(){var a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X=[].slice,Y={}.hasOwnProperty,Z=function(a,b){function c(){this.constructor=a}for(var d in b)Y.call(b,d)&&(a[d]=b[d]);return c.prototype=b.prototype,a.prototype=new c,a.__super__=b.prototype,a},$=[].indexOf||function(a){for(var b=0,c=this.length;c>b;b++)if(b in this&&this[b]===a)return b;return-1};for(u={catchupTime:100,initialRate:.03,minTime:250,ghostTime:100,maxProgressPerFrame:20,easeFactor:1.25,startOnPageLoad:!0,restartOnPushState:!0,restartOnRequestAfter:500,target:"body",elements:{checkInterval:100,selectors:["body"]},eventLag:{minSamples:10,sampleCount:3,lagThreshold:3},ajax:{trackMethods:["GET"],trackWebSockets:!0,ignoreURLs:[]}},C=function(){var a;return null!=(a="undefined"!=typeof performance&&null!==performance&&"function"==typeof performance.now?performance.now():void 0)?a:+new Date},E=window.requestAnimationFrame||window.mozRequestAnimationFrame||window.webkitRequestAnimationFrame||window.msRequestAnimationFrame,t=window.cancelAnimationFrame||window.mozCancelAnimationFrame,null==E&&(E=function(a){return setTimeout(a,50)},t=function(a){return clearTimeout(a)}),G=function(a){var b,c;return b=C(),(c=function(){var d;return d=C()-b,d>=33?(b=C(),a(d,function(){return E(c)})):setTimeout(c,33-d)})()},F=function(){var a,b,c;return c=arguments[0],b=arguments[1],a=3<=arguments.length?X.call(arguments,2):[],"function"==typeof c[b]?c[b].apply(c,a):c[b]},v=function(){var a,b,c,d,e,f,g;for(b=arguments[0],d=2<=arguments.length?X.call(arguments,1):[],f=0,g=d.length;g>f;f++)if(c=d[f])for(a in c)Y.call(c,a)&&(e=c[a],null!=b[a]&&"object"==typeof b[a]&&null!=e&&"object"==typeof e?v(b[a],e):b[a]=e);return b},q=function(a){var b,c,d,e,f;for(c=b=0,e=0,f=a.length;f>e;e++)d=a[e],c+=Math.abs(d),b++;return c/b},x=function(a,b){var c,d,e;if(null==a&&(a="options"),null==b&&(b=!0),e=document.querySelector("[data-pace-"+a+"]")){if(c=e.getAttribute("data-pace-"+a),!b)return c;try{return JSON.parse(c)}catch(f){return d=f,"undefined"!=typeof console&&null!==console?console.error("Error parsing inline pace options",d):void 0}}},g=function(){function a(){}return a.prototype.on=function(a,b,c,d){var e;return null==d&&(d=!1),null==this.bindings&&(this.bindings={}),null==(e=this.bindings)[a]&&(e[a]=[]),this.bindings[a].push({handler:b,ctx:c,once:d})},a.prototype.once=function(a,b,c){return this.on(a,b,c,!0)},a.prototype.off=function(a,b){var c,d,e;if(null!=(null!=(d=this.bindings)?d[a]:void 0)){if(null==b)return delete this.bindings[a];for(c=0,e=[];c<this.bindings[a].length;)e.push(this.bindings[a][c].handler===b?this.bindings[a].splice(c,1):c++);return e}},a.prototype.trigger=function(){var a,b,c,d,e,f,g,h,i;if(c=arguments[0],a=2<=arguments.length?X.call(arguments,1):[],null!=(g=this.bindings)?g[c]:void 0){for(e=0,i=[];e<this.bindings[c].length;)h=this.bindings[c][e],d=h.handler,b=h.ctx,f=h.once,d.apply(null!=b?b:this,a),i.push(f?this.bindings[c].splice(e,1):e++);return i}},a}(),j=window.Pace||{},window.Pace=j,v(j,g.prototype),D=j.options=v({},u,window.paceOptions,x()),U=["ajax","document","eventLag","elements"],Q=0,S=U.length;S>Q;Q++)K=U[Q],D[K]===!0&&(D[K]=u[K]);i=function(a){function b(){return V=b.__super__.constructor.apply(this,arguments)}return Z(b,a),b}(Error),b=function(){function a(){this.progress=0}return a.prototype.getElement=function(){var a;if(null==this.el){if(a=document.querySelector(D.target),!a)throw new i;this.el=document.createElement("div"),this.el.className="pace pace-active",document.body.className=document.body.className.replace(/pace-done/g,""),document.body.className+=" pace-running",this.el.innerHTML='<div class="pace-progress">\n  <div class="pace-progress-inner"></div>\n</div>\n<div class="pace-activity"></div>',null!=a.firstChild?a.insertBefore(this.el,a.firstChild):a.appendChild(this.el)}return this.el},a.prototype.finish=function(){var a;return a=this.getElement(),a.className=a.className.replace("pace-active",""),a.className+=" pace-inactive",document.body.className=document.body.className.replace("pace-running",""),document.body.className+=" pace-done"},a.prototype.update=function(a){return this.progress=a,this.render()},a.prototype.destroy=function(){try{this.getElement().parentNode.removeChild(this.getElement())}catch(a){i=a}return this.el=void 0},a.prototype.render=function(){var a,b,c,d,e,f,g;if(null==document.querySelector(D.target))return!1;for(a=this.getElement(),d="translate3d("+this.progress+"%, 0, 0)",g=["webkitTransform","msTransform","transform"],e=0,f=g.length;f>e;e++)b=g[e],a.children[0].style[b]=d;return(!this.lastRenderedProgress||this.lastRenderedProgress|0!==this.progress|0)&&(a.children[0].setAttribute("data-progress-text",""+(0|this.progress)+"%"),this.progress>=100?c="99":(c=this.progress<10?"0":"",c+=0|this.progress),a.children[0].setAttribute("data-progress",""+c)),this.lastRenderedProgress=this.progress},a.prototype.done=function(){return this.progress>=100},a}(),h=function(){function a(){this.bindings={}}return a.prototype.trigger=function(a,b){var c,d,e,f,g;if(null!=this.bindings[a]){for(f=this.bindings[a],g=[],d=0,e=f.length;e>d;d++)c=f[d],g.push(c.call(this,b));return g}},a.prototype.on=function(a,b){var c;return null==(c=this.bindings)[a]&&(c[a]=[]),this.bindings[a].push(b)},a}(),P=window.XMLHttpRequest,O=window.XDomainRequest,N=window.WebSocket,w=function(a,b){var c,d,e;e=[];for(d in b.prototype)try{e.push(null==a[d]&&"function"!=typeof b[d]?"function"==typeof Object.defineProperty?Object.defineProperty(a,d,{get:function(){return b.prototype[d]},configurable:!0,enumerable:!0}):a[d]=b.prototype[d]:void 0)}catch(f){c=f}return e},A=[],j.ignore=function(){var a,b,c;return b=arguments[0],a=2<=arguments.length?X.call(arguments,1):[],A.unshift("ignore"),c=b.apply(null,a),A.shift(),c},j.track=function(){var a,b,c;return b=arguments[0],a=2<=arguments.length?X.call(arguments,1):[],A.unshift("track"),c=b.apply(null,a),A.shift(),c},J=function(a){var b;if(null==a&&(a="GET"),"track"===A[0])return"force";if(!A.length&&D.ajax){if("socket"===a&&D.ajax.trackWebSockets)return!0;if(b=a.toUpperCase(),$.call(D.ajax.trackMethods,b)>=0)return!0}return!1},k=function(a){function b(){var a,c=this;b.__super__.constructor.apply(this,arguments),a=function(a){var b;return b=a.open,a.open=function(d,e){return J(d)&&c.trigger("request",{type:d,url:e,request:a}),b.apply(a,arguments)}},window.XMLHttpRequest=function(b){var c;return c=new P(b),a(c),c};try{w(window.XMLHttpRequest,P)}catch(d){}if(null!=O){window.XDomainRequest=function(){var b;return b=new O,a(b),b};try{w(window.XDomainRequest,O)}catch(d){}}if(null!=N&&D.ajax.trackWebSockets){window.WebSocket=function(a,b){var d;return d=null!=b?new N(a,b):new N(a),J("socket")&&c.trigger("request",{type:"socket",url:a,protocols:b,request:d}),d};try{w(window.WebSocket,N)}catch(d){}}}return Z(b,a),b}(h),R=null,y=function(){return null==R&&(R=new k),R},I=function(a){var b,c,d,e;for(e=D.ajax.ignoreURLs,c=0,d=e.length;d>c;c++)if(b=e[c],"string"==typeof b){if(-1!==a.indexOf(b))return!0}else if(b.test(a))return!0;return!1},y().on("request",function(b){var c,d,e,f,g;return f=b.type,e=b.request,g=b.url,I(g)?void 0:j.running||D.restartOnRequestAfter===!1&&"force"!==J(f)?void 0:(d=arguments,c=D.restartOnRequestAfter||0,"boolean"==typeof c&&(c=0),setTimeout(function(){var b,c,g,h,i,k;if(b="socket"===f?e.readyState<2:0<(h=e.readyState)&&4>h){for(j.restart(),i=j.sources,k=[],c=0,g=i.length;g>c;c++){if(K=i[c],K instanceof a){K.watch.apply(K,d);break}k.push(void 0)}return k}},c))}),a=function(){function a(){var a=this;this.elements=[],y().on("request",function(){return a.watch.apply(a,arguments)})}return a.prototype.watch=function(a){var b,c,d,e;return d=a.type,b=a.request,e=a.url,I(e)?void 0:(c="socket"===d?new n(b):new o(b),this.elements.push(c))},a}(),o=function(){function a(a){var b,c,d,e,f,g,h=this;if(this.progress=0,null!=window.ProgressEvent)for(c=null,a.addEventListener("progress",function(a){return h.progress=a.lengthComputable?100*a.loaded/a.total:h.progress+(100-h.progress)/2},!1),g=["load","abort","timeout","error"],d=0,e=g.length;e>d;d++)b=g[d],a.addEventListener(b,function(){return h.progress=100},!1);else f=a.onreadystatechange,a.onreadystatechange=function(){var b;return 0===(b=a.readyState)||4===b?h.progress=100:3===a.readyState&&(h.progress=50),"function"==typeof f?f.apply(null,arguments):void 0}}return a}(),n=function(){function a(a){var b,c,d,e,f=this;for(this.progress=0,e=["error","open"],c=0,d=e.length;d>c;c++)b=e[c],a.addEventListener(b,function(){return f.progress=100},!1)}return a}(),d=function(){function a(a){var b,c,d,f;for(null==a&&(a={}),this.elements=[],null==a.selectors&&(a.selectors=[]),f=a.selectors,c=0,d=f.length;d>c;c++)b=f[c],this.elements.push(new e(b))}return a}(),e=function(){function a(a){this.selector=a,this.progress=0,this.check()}return a.prototype.check=function(){var a=this;return document.querySelector(this.selector)?this.done():setTimeout(function(){return a.check()},D.elements.checkInterval)},a.prototype.done=function(){return this.progress=100},a}(),c=function(){function a(){var a,b,c=this;this.progress=null!=(b=this.states[document.readyState])?b:100,a=document.onreadystatechange,document.onreadystatechange=function(){return null!=c.states[document.readyState]&&(c.progress=c.states[document.readyState]),"function"==typeof a?a.apply(null,arguments):void 0}}return a.prototype.states={loading:0,interactive:50,complete:100},a}(),f=function(){function a(){var a,b,c,d,e,f=this;this.progress=0,a=0,e=[],d=0,c=C(),b=setInterval(function(){var g;return g=C()-c-50,c=C(),e.push(g),e.length>D.eventLag.sampleCount&&e.shift(),a=q(e),++d>=D.eventLag.minSamples&&a<D.eventLag.lagThreshold?(f.progress=100,clearInterval(b)):f.progress=100*(3/(a+3))},50)}return a}(),m=function(){function a(a){this.source=a,this.last=this.sinceLastUpdate=0,this.rate=D.initialRate,this.catchup=0,this.progress=this.lastProgress=0,null!=this.source&&(this.progress=F(this.source,"progress"))}return a.prototype.tick=function(a,b){var c;return null==b&&(b=F(this.source,"progress")),b>=100&&(this.done=!0),b===this.last?this.sinceLastUpdate+=a:(this.sinceLastUpdate&&(this.rate=(b-this.last)/this.sinceLastUpdate),this.catchup=(b-this.progress)/D.catchupTime,this.sinceLastUpdate=0,this.last=b),b>this.progress&&(this.progress+=this.catchup*a),c=1-Math.pow(this.progress/100,D.easeFactor),this.progress+=c*this.rate*a,this.progress=Math.min(this.lastProgress+D.maxProgressPerFrame,this.progress),this.progress=Math.max(0,this.progress),this.progress=Math.min(100,this.progress),this.lastProgress=this.progress,this.progress},a}(),L=null,H=null,r=null,M=null,p=null,s=null,j.running=!1,z=function(){return D.restartOnPushState?j.restart():void 0},null!=window.history.pushState&&(T=window.history.pushState,window.history.pushState=function(){return z(),T.apply(window.history,arguments)}),null!=window.history.replaceState&&(W=window.history.replaceState,window.history.replaceState=function(){return z(),W.apply(window.history,arguments)}),l={ajax:a,elements:d,document:c,eventLag:f},(B=function(){var a,c,d,e,f,g,h,i;for(j.sources=L=[],g=["ajax","elements","document","eventLag"],c=0,e=g.length;e>c;c++)a=g[c],D[a]!==!1&&L.push(new l[a](D[a]));for(i=null!=(h=D.extraSources)?h:[],d=0,f=i.length;f>d;d++)K=i[d],L.push(new K(D));return j.bar=r=new b,H=[],M=new m})(),j.stop=function(){return j.trigger("stop"),j.running=!1,r.destroy(),s=!0,null!=p&&("function"==typeof t&&t(p),p=null),B()},j.restart=function(){return j.trigger("restart"),j.stop(),j.start()},j.go=function(){var a;return j.running=!0,r.render(),a=C(),s=!1,p=G(function(b,c){var d,e,f,g,h,i,k,l,n,o,p,q,t,u,v,w;for(l=100-r.progress,e=p=0,f=!0,i=q=0,u=L.length;u>q;i=++q)for(K=L[i],o=null!=H[i]?H[i]:H[i]=[],h=null!=(w=K.elements)?w:[K],k=t=0,v=h.length;v>t;k=++t)g=h[k],n=null!=o[k]?o[k]:o[k]=new m(g),f&=n.done,n.done||(e++,p+=n.tick(b));return d=p/e,r.update(M.tick(b,d)),r.done()||f||s?(r.update(100),j.trigger("done"),setTimeout(function(){return r.finish(),j.running=!1,j.trigger("hide")},Math.max(D.ghostTime,Math.max(D.minTime-(C()-a),0)))):c()})},j.start=function(a){v(D,a),j.running=!0;try{r.render()}catch(b){i=b}return document.querySelector(".pace")?(j.trigger("start"),j.go()):setTimeout(j.start,50)},"function"==typeof define&&define.amd?define(["pace"],function(){return j}):"object"==typeof exports?module.exports=j:D.startOnPageLoad&&j.start()}).call(this);
/*! jQuery v1.11.1 | (c) 2005, 2014 jQuery Foundation, Inc. | jquery.org/license */
!function(a,b){"object"==typeof module&&"object"==typeof module.exports?module.exports=a.document?b(a,!0):function(a){if(!a.document)throw new Error("jQuery requires a window with a document");return b(a)}:b(a)}("undefined"!=typeof window?window:this,function(a,b){var c=[],d=c.slice,e=c.concat,f=c.push,g=c.indexOf,h={},i=h.toString,j=h.hasOwnProperty,k={},l="1.11.1",m=function(a,b){return new m.fn.init(a,b)},n=/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,o=/^-ms-/,p=/-([\da-z])/gi,q=function(a,b){return b.toUpperCase()};m.fn=m.prototype={jquery:l,constructor:m,selector:"",length:0,toArray:function(){return d.call(this)},get:function(a){return null!=a?0>a?this[a+this.length]:this[a]:d.call(this)},pushStack:function(a){var b=m.merge(this.constructor(),a);return b.prevObject=this,b.context=this.context,b},each:function(a,b){return m.each(this,a,b)},map:function(a){return this.pushStack(m.map(this,function(b,c){return a.call(b,c,b)}))},slice:function(){return this.pushStack(d.apply(this,arguments))},first:function(){return this.eq(0)},last:function(){return this.eq(-1)},eq:function(a){var b=this.length,c=+a+(0>a?b:0);return this.pushStack(c>=0&&b>c?[this[c]]:[])},end:function(){return this.prevObject||this.constructor(null)},push:f,sort:c.sort,splice:c.splice},m.extend=m.fn.extend=function(){var a,b,c,d,e,f,g=arguments[0]||{},h=1,i=arguments.length,j=!1;for("boolean"==typeof g&&(j=g,g=arguments[h]||{},h++),"object"==typeof g||m.isFunction(g)||(g={}),h===i&&(g=this,h--);i>h;h++)if(null!=(e=arguments[h]))for(d in e)a=g[d],c=e[d],g!==c&&(j&&c&&(m.isPlainObject(c)||(b=m.isArray(c)))?(b?(b=!1,f=a&&m.isArray(a)?a:[]):f=a&&m.isPlainObject(a)?a:{},g[d]=m.extend(j,f,c)):void 0!==c&&(g[d]=c));return g},m.extend({expando:"jQuery"+(l+Math.random()).replace(/\D/g,""),isReady:!0,error:function(a){throw new Error(a)},noop:function(){},isFunction:function(a){return"function"===m.type(a)},isArray:Array.isArray||function(a){return"array"===m.type(a)},isWindow:function(a){return null!=a&&a==a.window},isNumeric:function(a){return!m.isArray(a)&&a-parseFloat(a)>=0},isEmptyObject:function(a){var b;for(b in a)return!1;return!0},isPlainObject:function(a){var b;if(!a||"object"!==m.type(a)||a.nodeType||m.isWindow(a))return!1;try{if(a.constructor&&!j.call(a,"constructor")&&!j.call(a.constructor.prototype,"isPrototypeOf"))return!1}catch(c){return!1}if(k.ownLast)for(b in a)return j.call(a,b);for(b in a);return void 0===b||j.call(a,b)},type:function(a){return null==a?a+"":"object"==typeof a||"function"==typeof a?h[i.call(a)]||"object":typeof a},globalEval:function(b){b&&m.trim(b)&&(a.execScript||function(b){a.eval.call(a,b)})(b)},camelCase:function(a){return a.replace(o,"ms-").replace(p,q)},nodeName:function(a,b){return a.nodeName&&a.nodeName.toLowerCase()===b.toLowerCase()},each:function(a,b,c){var d,e=0,f=a.length,g=r(a);if(c){if(g){for(;f>e;e++)if(d=b.apply(a[e],c),d===!1)break}else for(e in a)if(d=b.apply(a[e],c),d===!1)break}else if(g){for(;f>e;e++)if(d=b.call(a[e],e,a[e]),d===!1)break}else for(e in a)if(d=b.call(a[e],e,a[e]),d===!1)break;return a},trim:function(a){return null==a?"":(a+"").replace(n,"")},makeArray:function(a,b){var c=b||[];return null!=a&&(r(Object(a))?m.merge(c,"string"==typeof a?[a]:a):f.call(c,a)),c},inArray:function(a,b,c){var d;if(b){if(g)return g.call(b,a,c);for(d=b.length,c=c?0>c?Math.max(0,d+c):c:0;d>c;c++)if(c in b&&b[c]===a)return c}return-1},merge:function(a,b){var c=+b.length,d=0,e=a.length;while(c>d)a[e++]=b[d++];if(c!==c)while(void 0!==b[d])a[e++]=b[d++];return a.length=e,a},grep:function(a,b,c){for(var d,e=[],f=0,g=a.length,h=!c;g>f;f++)d=!b(a[f],f),d!==h&&e.push(a[f]);return e},map:function(a,b,c){var d,f=0,g=a.length,h=r(a),i=[];if(h)for(;g>f;f++)d=b(a[f],f,c),null!=d&&i.push(d);else for(f in a)d=b(a[f],f,c),null!=d&&i.push(d);return e.apply([],i)},guid:1,proxy:function(a,b){var c,e,f;return"string"==typeof b&&(f=a[b],b=a,a=f),m.isFunction(a)?(c=d.call(arguments,2),e=function(){return a.apply(b||this,c.concat(d.call(arguments)))},e.guid=a.guid=a.guid||m.guid++,e):void 0},now:function(){return+new Date},support:k}),m.each("Boolean Number String Function Array Date RegExp Object Error".split(" "),function(a,b){h["[object "+b+"]"]=b.toLowerCase()});function r(a){var b=a.length,c=m.type(a);return"function"===c||m.isWindow(a)?!1:1===a.nodeType&&b?!0:"array"===c||0===b||"number"==typeof b&&b>0&&b-1 in a}var s=function(a){var b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u="sizzle"+-new Date,v=a.document,w=0,x=0,y=gb(),z=gb(),A=gb(),B=function(a,b){return a===b&&(l=!0),0},C="undefined",D=1<<31,E={}.hasOwnProperty,F=[],G=F.pop,H=F.push,I=F.push,J=F.slice,K=F.indexOf||function(a){for(var b=0,c=this.length;c>b;b++)if(this[b]===a)return b;return-1},L="checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",M="[\\x20\\t\\r\\n\\f]",N="(?:\\\\.|[\\w-]|[^\\x00-\\xa0])+",O=N.replace("w","w#"),P="\\["+M+"*("+N+")(?:"+M+"*([*^$|!~]?=)"+M+"*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|("+O+"))|)"+M+"*\\]",Q=":("+N+")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|"+P+")*)|.*)\\)|)",R=new RegExp("^"+M+"+|((?:^|[^\\\\])(?:\\\\.)*)"+M+"+$","g"),S=new RegExp("^"+M+"*,"+M+"*"),T=new RegExp("^"+M+"*([>+~]|"+M+")"+M+"*"),U=new RegExp("="+M+"*([^\\]'\"]*?)"+M+"*\\]","g"),V=new RegExp(Q),W=new RegExp("^"+O+"$"),X={ID:new RegExp("^#("+N+")"),CLASS:new RegExp("^\\.("+N+")"),TAG:new RegExp("^("+N.replace("w","w*")+")"),ATTR:new RegExp("^"+P),PSEUDO:new RegExp("^"+Q),CHILD:new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\("+M+"*(even|odd|(([+-]|)(\\d*)n|)"+M+"*(?:([+-]|)"+M+"*(\\d+)|))"+M+"*\\)|)","i"),bool:new RegExp("^(?:"+L+")$","i"),needsContext:new RegExp("^"+M+"*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\("+M+"*((?:-\\d)?\\d*)"+M+"*\\)|)(?=[^-]|$)","i")},Y=/^(?:input|select|textarea|button)$/i,Z=/^h\d$/i,$=/^[^{]+\{\s*\[native \w/,_=/^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,ab=/[+~]/,bb=/'|\\/g,cb=new RegExp("\\\\([\\da-f]{1,6}"+M+"?|("+M+")|.)","ig"),db=function(a,b,c){var d="0x"+b-65536;return d!==d||c?b:0>d?String.fromCharCode(d+65536):String.fromCharCode(d>>10|55296,1023&d|56320)};try{I.apply(F=J.call(v.childNodes),v.childNodes),F[v.childNodes.length].nodeType}catch(eb){I={apply:F.length?function(a,b){H.apply(a,J.call(b))}:function(a,b){var c=a.length,d=0;while(a[c++]=b[d++]);a.length=c-1}}}function fb(a,b,d,e){var f,h,j,k,l,o,r,s,w,x;if((b?b.ownerDocument||b:v)!==n&&m(b),b=b||n,d=d||[],!a||"string"!=typeof a)return d;if(1!==(k=b.nodeType)&&9!==k)return[];if(p&&!e){if(f=_.exec(a))if(j=f[1]){if(9===k){if(h=b.getElementById(j),!h||!h.parentNode)return d;if(h.id===j)return d.push(h),d}else if(b.ownerDocument&&(h=b.ownerDocument.getElementById(j))&&t(b,h)&&h.id===j)return d.push(h),d}else{if(f[2])return I.apply(d,b.getElementsByTagName(a)),d;if((j=f[3])&&c.getElementsByClassName&&b.getElementsByClassName)return I.apply(d,b.getElementsByClassName(j)),d}if(c.qsa&&(!q||!q.test(a))){if(s=r=u,w=b,x=9===k&&a,1===k&&"object"!==b.nodeName.toLowerCase()){o=g(a),(r=b.getAttribute("id"))?s=r.replace(bb,"\\$&"):b.setAttribute("id",s),s="[id='"+s+"'] ",l=o.length;while(l--)o[l]=s+qb(o[l]);w=ab.test(a)&&ob(b.parentNode)||b,x=o.join(",")}if(x)try{return I.apply(d,w.querySelectorAll(x)),d}catch(y){}finally{r||b.removeAttribute("id")}}}return i(a.replace(R,"$1"),b,d,e)}function gb(){var a=[];function b(c,e){return a.push(c+" ")>d.cacheLength&&delete b[a.shift()],b[c+" "]=e}return b}function hb(a){return a[u]=!0,a}function ib(a){var b=n.createElement("div");try{return!!a(b)}catch(c){return!1}finally{b.parentNode&&b.parentNode.removeChild(b),b=null}}function jb(a,b){var c=a.split("|"),e=a.length;while(e--)d.attrHandle[c[e]]=b}function kb(a,b){var c=b&&a,d=c&&1===a.nodeType&&1===b.nodeType&&(~b.sourceIndex||D)-(~a.sourceIndex||D);if(d)return d;if(c)while(c=c.nextSibling)if(c===b)return-1;return a?1:-1}function lb(a){return function(b){var c=b.nodeName.toLowerCase();return"input"===c&&b.type===a}}function mb(a){return function(b){var c=b.nodeName.toLowerCase();return("input"===c||"button"===c)&&b.type===a}}function nb(a){return hb(function(b){return b=+b,hb(function(c,d){var e,f=a([],c.length,b),g=f.length;while(g--)c[e=f[g]]&&(c[e]=!(d[e]=c[e]))})})}function ob(a){return a&&typeof a.getElementsByTagName!==C&&a}c=fb.support={},f=fb.isXML=function(a){var b=a&&(a.ownerDocument||a).documentElement;return b?"HTML"!==b.nodeName:!1},m=fb.setDocument=function(a){var b,e=a?a.ownerDocument||a:v,g=e.defaultView;return e!==n&&9===e.nodeType&&e.documentElement?(n=e,o=e.documentElement,p=!f(e),g&&g!==g.top&&(g.addEventListener?g.addEventListener("unload",function(){m()},!1):g.attachEvent&&g.attachEvent("onunload",function(){m()})),c.attributes=ib(function(a){return a.className="i",!a.getAttribute("className")}),c.getElementsByTagName=ib(function(a){return a.appendChild(e.createComment("")),!a.getElementsByTagName("*").length}),c.getElementsByClassName=$.test(e.getElementsByClassName)&&ib(function(a){return a.innerHTML="<div class='a'></div><div class='a i'></div>",a.firstChild.className="i",2===a.getElementsByClassName("i").length}),c.getById=ib(function(a){return o.appendChild(a).id=u,!e.getElementsByName||!e.getElementsByName(u).length}),c.getById?(d.find.ID=function(a,b){if(typeof b.getElementById!==C&&p){var c=b.getElementById(a);return c&&c.parentNode?[c]:[]}},d.filter.ID=function(a){var b=a.replace(cb,db);return function(a){return a.getAttribute("id")===b}}):(delete d.find.ID,d.filter.ID=function(a){var b=a.replace(cb,db);return function(a){var c=typeof a.getAttributeNode!==C&&a.getAttributeNode("id");return c&&c.value===b}}),d.find.TAG=c.getElementsByTagName?function(a,b){return typeof b.getElementsByTagName!==C?b.getElementsByTagName(a):void 0}:function(a,b){var c,d=[],e=0,f=b.getElementsByTagName(a);if("*"===a){while(c=f[e++])1===c.nodeType&&d.push(c);return d}return f},d.find.CLASS=c.getElementsByClassName&&function(a,b){return typeof b.getElementsByClassName!==C&&p?b.getElementsByClassName(a):void 0},r=[],q=[],(c.qsa=$.test(e.querySelectorAll))&&(ib(function(a){a.innerHTML="<select msallowclip=''><option selected=''></option></select>",a.querySelectorAll("[msallowclip^='']").length&&q.push("[*^$]="+M+"*(?:''|\"\")"),a.querySelectorAll("[selected]").length||q.push("\\["+M+"*(?:value|"+L+")"),a.querySelectorAll(":checked").length||q.push(":checked")}),ib(function(a){var b=e.createElement("input");b.setAttribute("type","hidden"),a.appendChild(b).setAttribute("name","D"),a.querySelectorAll("[name=d]").length&&q.push("name"+M+"*[*^$|!~]?="),a.querySelectorAll(":enabled").length||q.push(":enabled",":disabled"),a.querySelectorAll("*,:x"),q.push(",.*:")})),(c.matchesSelector=$.test(s=o.matches||o.webkitMatchesSelector||o.mozMatchesSelector||o.oMatchesSelector||o.msMatchesSelector))&&ib(function(a){c.disconnectedMatch=s.call(a,"div"),s.call(a,"[s!='']:x"),r.push("!=",Q)}),q=q.length&&new RegExp(q.join("|")),r=r.length&&new RegExp(r.join("|")),b=$.test(o.compareDocumentPosition),t=b||$.test(o.contains)?function(a,b){var c=9===a.nodeType?a.documentElement:a,d=b&&b.parentNode;return a===d||!(!d||1!==d.nodeType||!(c.contains?c.contains(d):a.compareDocumentPosition&&16&a.compareDocumentPosition(d)))}:function(a,b){if(b)while(b=b.parentNode)if(b===a)return!0;return!1},B=b?function(a,b){if(a===b)return l=!0,0;var d=!a.compareDocumentPosition-!b.compareDocumentPosition;return d?d:(d=(a.ownerDocument||a)===(b.ownerDocument||b)?a.compareDocumentPosition(b):1,1&d||!c.sortDetached&&b.compareDocumentPosition(a)===d?a===e||a.ownerDocument===v&&t(v,a)?-1:b===e||b.ownerDocument===v&&t(v,b)?1:k?K.call(k,a)-K.call(k,b):0:4&d?-1:1)}:function(a,b){if(a===b)return l=!0,0;var c,d=0,f=a.parentNode,g=b.parentNode,h=[a],i=[b];if(!f||!g)return a===e?-1:b===e?1:f?-1:g?1:k?K.call(k,a)-K.call(k,b):0;if(f===g)return kb(a,b);c=a;while(c=c.parentNode)h.unshift(c);c=b;while(c=c.parentNode)i.unshift(c);while(h[d]===i[d])d++;return d?kb(h[d],i[d]):h[d]===v?-1:i[d]===v?1:0},e):n},fb.matches=function(a,b){return fb(a,null,null,b)},fb.matchesSelector=function(a,b){if((a.ownerDocument||a)!==n&&m(a),b=b.replace(U,"='$1']"),!(!c.matchesSelector||!p||r&&r.test(b)||q&&q.test(b)))try{var d=s.call(a,b);if(d||c.disconnectedMatch||a.document&&11!==a.document.nodeType)return d}catch(e){}return fb(b,n,null,[a]).length>0},fb.contains=function(a,b){return(a.ownerDocument||a)!==n&&m(a),t(a,b)},fb.attr=function(a,b){(a.ownerDocument||a)!==n&&m(a);var e=d.attrHandle[b.toLowerCase()],f=e&&E.call(d.attrHandle,b.toLowerCase())?e(a,b,!p):void 0;return void 0!==f?f:c.attributes||!p?a.getAttribute(b):(f=a.getAttributeNode(b))&&f.specified?f.value:null},fb.error=function(a){throw new Error("Syntax error, unrecognized expression: "+a)},fb.uniqueSort=function(a){var b,d=[],e=0,f=0;if(l=!c.detectDuplicates,k=!c.sortStable&&a.slice(0),a.sort(B),l){while(b=a[f++])b===a[f]&&(e=d.push(f));while(e--)a.splice(d[e],1)}return k=null,a},e=fb.getText=function(a){var b,c="",d=0,f=a.nodeType;if(f){if(1===f||9===f||11===f){if("string"==typeof a.textContent)return a.textContent;for(a=a.firstChild;a;a=a.nextSibling)c+=e(a)}else if(3===f||4===f)return a.nodeValue}else while(b=a[d++])c+=e(b);return c},d=fb.selectors={cacheLength:50,createPseudo:hb,match:X,attrHandle:{},find:{},relative:{">":{dir:"parentNode",first:!0}," ":{dir:"parentNode"},"+":{dir:"previousSibling",first:!0},"~":{dir:"previousSibling"}},preFilter:{ATTR:function(a){return a[1]=a[1].replace(cb,db),a[3]=(a[3]||a[4]||a[5]||"").replace(cb,db),"~="===a[2]&&(a[3]=" "+a[3]+" "),a.slice(0,4)},CHILD:function(a){return a[1]=a[1].toLowerCase(),"nth"===a[1].slice(0,3)?(a[3]||fb.error(a[0]),a[4]=+(a[4]?a[5]+(a[6]||1):2*("even"===a[3]||"odd"===a[3])),a[5]=+(a[7]+a[8]||"odd"===a[3])):a[3]&&fb.error(a[0]),a},PSEUDO:function(a){var b,c=!a[6]&&a[2];return X.CHILD.test(a[0])?null:(a[3]?a[2]=a[4]||a[5]||"":c&&V.test(c)&&(b=g(c,!0))&&(b=c.indexOf(")",c.length-b)-c.length)&&(a[0]=a[0].slice(0,b),a[2]=c.slice(0,b)),a.slice(0,3))}},filter:{TAG:function(a){var b=a.replace(cb,db).toLowerCase();return"*"===a?function(){return!0}:function(a){return a.nodeName&&a.nodeName.toLowerCase()===b}},CLASS:function(a){var b=y[a+" "];return b||(b=new RegExp("(^|"+M+")"+a+"("+M+"|$)"))&&y(a,function(a){return b.test("string"==typeof a.className&&a.className||typeof a.getAttribute!==C&&a.getAttribute("class")||"")})},ATTR:function(a,b,c){return function(d){var e=fb.attr(d,a);return null==e?"!="===b:b?(e+="","="===b?e===c:"!="===b?e!==c:"^="===b?c&&0===e.indexOf(c):"*="===b?c&&e.indexOf(c)>-1:"$="===b?c&&e.slice(-c.length)===c:"~="===b?(" "+e+" ").indexOf(c)>-1:"|="===b?e===c||e.slice(0,c.length+1)===c+"-":!1):!0}},CHILD:function(a,b,c,d,e){var f="nth"!==a.slice(0,3),g="last"!==a.slice(-4),h="of-type"===b;return 1===d&&0===e?function(a){return!!a.parentNode}:function(b,c,i){var j,k,l,m,n,o,p=f!==g?"nextSibling":"previousSibling",q=b.parentNode,r=h&&b.nodeName.toLowerCase(),s=!i&&!h;if(q){if(f){while(p){l=b;while(l=l[p])if(h?l.nodeName.toLowerCase()===r:1===l.nodeType)return!1;o=p="only"===a&&!o&&"nextSibling"}return!0}if(o=[g?q.firstChild:q.lastChild],g&&s){k=q[u]||(q[u]={}),j=k[a]||[],n=j[0]===w&&j[1],m=j[0]===w&&j[2],l=n&&q.childNodes[n];while(l=++n&&l&&l[p]||(m=n=0)||o.pop())if(1===l.nodeType&&++m&&l===b){k[a]=[w,n,m];break}}else if(s&&(j=(b[u]||(b[u]={}))[a])&&j[0]===w)m=j[1];else while(l=++n&&l&&l[p]||(m=n=0)||o.pop())if((h?l.nodeName.toLowerCase()===r:1===l.nodeType)&&++m&&(s&&((l[u]||(l[u]={}))[a]=[w,m]),l===b))break;return m-=e,m===d||m%d===0&&m/d>=0}}},PSEUDO:function(a,b){var c,e=d.pseudos[a]||d.setFilters[a.toLowerCase()]||fb.error("unsupported pseudo: "+a);return e[u]?e(b):e.length>1?(c=[a,a,"",b],d.setFilters.hasOwnProperty(a.toLowerCase())?hb(function(a,c){var d,f=e(a,b),g=f.length;while(g--)d=K.call(a,f[g]),a[d]=!(c[d]=f[g])}):function(a){return e(a,0,c)}):e}},pseudos:{not:hb(function(a){var b=[],c=[],d=h(a.replace(R,"$1"));return d[u]?hb(function(a,b,c,e){var f,g=d(a,null,e,[]),h=a.length;while(h--)(f=g[h])&&(a[h]=!(b[h]=f))}):function(a,e,f){return b[0]=a,d(b,null,f,c),!c.pop()}}),has:hb(function(a){return function(b){return fb(a,b).length>0}}),contains:hb(function(a){return function(b){return(b.textContent||b.innerText||e(b)).indexOf(a)>-1}}),lang:hb(function(a){return W.test(a||"")||fb.error("unsupported lang: "+a),a=a.replace(cb,db).toLowerCase(),function(b){var c;do if(c=p?b.lang:b.getAttribute("xml:lang")||b.getAttribute("lang"))return c=c.toLowerCase(),c===a||0===c.indexOf(a+"-");while((b=b.parentNode)&&1===b.nodeType);return!1}}),target:function(b){var c=a.location&&a.location.hash;return c&&c.slice(1)===b.id},root:function(a){return a===o},focus:function(a){return a===n.activeElement&&(!n.hasFocus||n.hasFocus())&&!!(a.type||a.href||~a.tabIndex)},enabled:function(a){return a.disabled===!1},disabled:function(a){return a.disabled===!0},checked:function(a){var b=a.nodeName.toLowerCase();return"input"===b&&!!a.checked||"option"===b&&!!a.selected},selected:function(a){return a.parentNode&&a.parentNode.selectedIndex,a.selected===!0},empty:function(a){for(a=a.firstChild;a;a=a.nextSibling)if(a.nodeType<6)return!1;return!0},parent:function(a){return!d.pseudos.empty(a)},header:function(a){return Z.test(a.nodeName)},input:function(a){return Y.test(a.nodeName)},button:function(a){var b=a.nodeName.toLowerCase();return"input"===b&&"button"===a.type||"button"===b},text:function(a){var b;return"input"===a.nodeName.toLowerCase()&&"text"===a.type&&(null==(b=a.getAttribute("type"))||"text"===b.toLowerCase())},first:nb(function(){return[0]}),last:nb(function(a,b){return[b-1]}),eq:nb(function(a,b,c){return[0>c?c+b:c]}),even:nb(function(a,b){for(var c=0;b>c;c+=2)a.push(c);return a}),odd:nb(function(a,b){for(var c=1;b>c;c+=2)a.push(c);return a}),lt:nb(function(a,b,c){for(var d=0>c?c+b:c;--d>=0;)a.push(d);return a}),gt:nb(function(a,b,c){for(var d=0>c?c+b:c;++d<b;)a.push(d);return a})}},d.pseudos.nth=d.pseudos.eq;for(b in{radio:!0,checkbox:!0,file:!0,password:!0,image:!0})d.pseudos[b]=lb(b);for(b in{submit:!0,reset:!0})d.pseudos[b]=mb(b);function pb(){}pb.prototype=d.filters=d.pseudos,d.setFilters=new pb,g=fb.tokenize=function(a,b){var c,e,f,g,h,i,j,k=z[a+" "];if(k)return b?0:k.slice(0);h=a,i=[],j=d.preFilter;while(h){(!c||(e=S.exec(h)))&&(e&&(h=h.slice(e[0].length)||h),i.push(f=[])),c=!1,(e=T.exec(h))&&(c=e.shift(),f.push({value:c,type:e[0].replace(R," ")}),h=h.slice(c.length));for(g in d.filter)!(e=X[g].exec(h))||j[g]&&!(e=j[g](e))||(c=e.shift(),f.push({value:c,type:g,matches:e}),h=h.slice(c.length));if(!c)break}return b?h.length:h?fb.error(a):z(a,i).slice(0)};function qb(a){for(var b=0,c=a.length,d="";c>b;b++)d+=a[b].value;return d}function rb(a,b,c){var d=b.dir,e=c&&"parentNode"===d,f=x++;return b.first?function(b,c,f){while(b=b[d])if(1===b.nodeType||e)return a(b,c,f)}:function(b,c,g){var h,i,j=[w,f];if(g){while(b=b[d])if((1===b.nodeType||e)&&a(b,c,g))return!0}else while(b=b[d])if(1===b.nodeType||e){if(i=b[u]||(b[u]={}),(h=i[d])&&h[0]===w&&h[1]===f)return j[2]=h[2];if(i[d]=j,j[2]=a(b,c,g))return!0}}}function sb(a){return a.length>1?function(b,c,d){var e=a.length;while(e--)if(!a[e](b,c,d))return!1;return!0}:a[0]}function tb(a,b,c){for(var d=0,e=b.length;e>d;d++)fb(a,b[d],c);return c}function ub(a,b,c,d,e){for(var f,g=[],h=0,i=a.length,j=null!=b;i>h;h++)(f=a[h])&&(!c||c(f,d,e))&&(g.push(f),j&&b.push(h));return g}function vb(a,b,c,d,e,f){return d&&!d[u]&&(d=vb(d)),e&&!e[u]&&(e=vb(e,f)),hb(function(f,g,h,i){var j,k,l,m=[],n=[],o=g.length,p=f||tb(b||"*",h.nodeType?[h]:h,[]),q=!a||!f&&b?p:ub(p,m,a,h,i),r=c?e||(f?a:o||d)?[]:g:q;if(c&&c(q,r,h,i),d){j=ub(r,n),d(j,[],h,i),k=j.length;while(k--)(l=j[k])&&(r[n[k]]=!(q[n[k]]=l))}if(f){if(e||a){if(e){j=[],k=r.length;while(k--)(l=r[k])&&j.push(q[k]=l);e(null,r=[],j,i)}k=r.length;while(k--)(l=r[k])&&(j=e?K.call(f,l):m[k])>-1&&(f[j]=!(g[j]=l))}}else r=ub(r===g?r.splice(o,r.length):r),e?e(null,g,r,i):I.apply(g,r)})}function wb(a){for(var b,c,e,f=a.length,g=d.relative[a[0].type],h=g||d.relative[" "],i=g?1:0,k=rb(function(a){return a===b},h,!0),l=rb(function(a){return K.call(b,a)>-1},h,!0),m=[function(a,c,d){return!g&&(d||c!==j)||((b=c).nodeType?k(a,c,d):l(a,c,d))}];f>i;i++)if(c=d.relative[a[i].type])m=[rb(sb(m),c)];else{if(c=d.filter[a[i].type].apply(null,a[i].matches),c[u]){for(e=++i;f>e;e++)if(d.relative[a[e].type])break;return vb(i>1&&sb(m),i>1&&qb(a.slice(0,i-1).concat({value:" "===a[i-2].type?"*":""})).replace(R,"$1"),c,e>i&&wb(a.slice(i,e)),f>e&&wb(a=a.slice(e)),f>e&&qb(a))}m.push(c)}return sb(m)}function xb(a,b){var c=b.length>0,e=a.length>0,f=function(f,g,h,i,k){var l,m,o,p=0,q="0",r=f&&[],s=[],t=j,u=f||e&&d.find.TAG("*",k),v=w+=null==t?1:Math.random()||.1,x=u.length;for(k&&(j=g!==n&&g);q!==x&&null!=(l=u[q]);q++){if(e&&l){m=0;while(o=a[m++])if(o(l,g,h)){i.push(l);break}k&&(w=v)}c&&((l=!o&&l)&&p--,f&&r.push(l))}if(p+=q,c&&q!==p){m=0;while(o=b[m++])o(r,s,g,h);if(f){if(p>0)while(q--)r[q]||s[q]||(s[q]=G.call(i));s=ub(s)}I.apply(i,s),k&&!f&&s.length>0&&p+b.length>1&&fb.uniqueSort(i)}return k&&(w=v,j=t),r};return c?hb(f):f}return h=fb.compile=function(a,b){var c,d=[],e=[],f=A[a+" "];if(!f){b||(b=g(a)),c=b.length;while(c--)f=wb(b[c]),f[u]?d.push(f):e.push(f);f=A(a,xb(e,d)),f.selector=a}return f},i=fb.select=function(a,b,e,f){var i,j,k,l,m,n="function"==typeof a&&a,o=!f&&g(a=n.selector||a);if(e=e||[],1===o.length){if(j=o[0]=o[0].slice(0),j.length>2&&"ID"===(k=j[0]).type&&c.getById&&9===b.nodeType&&p&&d.relative[j[1].type]){if(b=(d.find.ID(k.matches[0].replace(cb,db),b)||[])[0],!b)return e;n&&(b=b.parentNode),a=a.slice(j.shift().value.length)}i=X.needsContext.test(a)?0:j.length;while(i--){if(k=j[i],d.relative[l=k.type])break;if((m=d.find[l])&&(f=m(k.matches[0].replace(cb,db),ab.test(j[0].type)&&ob(b.parentNode)||b))){if(j.splice(i,1),a=f.length&&qb(j),!a)return I.apply(e,f),e;break}}}return(n||h(a,o))(f,b,!p,e,ab.test(a)&&ob(b.parentNode)||b),e},c.sortStable=u.split("").sort(B).join("")===u,c.detectDuplicates=!!l,m(),c.sortDetached=ib(function(a){return 1&a.compareDocumentPosition(n.createElement("div"))}),ib(function(a){return a.innerHTML="<a href='#'></a>","#"===a.firstChild.getAttribute("href")})||jb("type|href|height|width",function(a,b,c){return c?void 0:a.getAttribute(b,"type"===b.toLowerCase()?1:2)}),c.attributes&&ib(function(a){return a.innerHTML="<input/>",a.firstChild.setAttribute("value",""),""===a.firstChild.getAttribute("value")})||jb("value",function(a,b,c){return c||"input"!==a.nodeName.toLowerCase()?void 0:a.defaultValue}),ib(function(a){return null==a.getAttribute("disabled")})||jb(L,function(a,b,c){var d;return c?void 0:a[b]===!0?b.toLowerCase():(d=a.getAttributeNode(b))&&d.specified?d.value:null}),fb}(a);m.find=s,m.expr=s.selectors,m.expr[":"]=m.expr.pseudos,m.unique=s.uniqueSort,m.text=s.getText,m.isXMLDoc=s.isXML,m.contains=s.contains;var t=m.expr.match.needsContext,u=/^<(\w+)\s*\/?>(?:<\/\1>|)$/,v=/^.[^:#\[\.,]*$/;function w(a,b,c){if(m.isFunction(b))return m.grep(a,function(a,d){return!!b.call(a,d,a)!==c});if(b.nodeType)return m.grep(a,function(a){return a===b!==c});if("string"==typeof b){if(v.test(b))return m.filter(b,a,c);b=m.filter(b,a)}return m.grep(a,function(a){return m.inArray(a,b)>=0!==c})}m.filter=function(a,b,c){var d=b[0];return c&&(a=":not("+a+")"),1===b.length&&1===d.nodeType?m.find.matchesSelector(d,a)?[d]:[]:m.find.matches(a,m.grep(b,function(a){return 1===a.nodeType}))},m.fn.extend({find:function(a){var b,c=[],d=this,e=d.length;if("string"!=typeof a)return this.pushStack(m(a).filter(function(){for(b=0;e>b;b++)if(m.contains(d[b],this))return!0}));for(b=0;e>b;b++)m.find(a,d[b],c);return c=this.pushStack(e>1?m.unique(c):c),c.selector=this.selector?this.selector+" "+a:a,c},filter:function(a){return this.pushStack(w(this,a||[],!1))},not:function(a){return this.pushStack(w(this,a||[],!0))},is:function(a){return!!w(this,"string"==typeof a&&t.test(a)?m(a):a||[],!1).length}});var x,y=a.document,z=/^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]*))$/,A=m.fn.init=function(a,b){var c,d;if(!a)return this;if("string"==typeof a){if(c="<"===a.charAt(0)&&">"===a.charAt(a.length-1)&&a.length>=3?[null,a,null]:z.exec(a),!c||!c[1]&&b)return!b||b.jquery?(b||x).find(a):this.constructor(b).find(a);if(c[1]){if(b=b instanceof m?b[0]:b,m.merge(this,m.parseHTML(c[1],b&&b.nodeType?b.ownerDocument||b:y,!0)),u.test(c[1])&&m.isPlainObject(b))for(c in b)m.isFunction(this[c])?this[c](b[c]):this.attr(c,b[c]);return this}if(d=y.getElementById(c[2]),d&&d.parentNode){if(d.id!==c[2])return x.find(a);this.length=1,this[0]=d}return this.context=y,this.selector=a,this}return a.nodeType?(this.context=this[0]=a,this.length=1,this):m.isFunction(a)?"undefined"!=typeof x.ready?x.ready(a):a(m):(void 0!==a.selector&&(this.selector=a.selector,this.context=a.context),m.makeArray(a,this))};A.prototype=m.fn,x=m(y);var B=/^(?:parents|prev(?:Until|All))/,C={children:!0,contents:!0,next:!0,prev:!0};m.extend({dir:function(a,b,c){var d=[],e=a[b];while(e&&9!==e.nodeType&&(void 0===c||1!==e.nodeType||!m(e).is(c)))1===e.nodeType&&d.push(e),e=e[b];return d},sibling:function(a,b){for(var c=[];a;a=a.nextSibling)1===a.nodeType&&a!==b&&c.push(a);return c}}),m.fn.extend({has:function(a){var b,c=m(a,this),d=c.length;return this.filter(function(){for(b=0;d>b;b++)if(m.contains(this,c[b]))return!0})},closest:function(a,b){for(var c,d=0,e=this.length,f=[],g=t.test(a)||"string"!=typeof a?m(a,b||this.context):0;e>d;d++)for(c=this[d];c&&c!==b;c=c.parentNode)if(c.nodeType<11&&(g?g.index(c)>-1:1===c.nodeType&&m.find.matchesSelector(c,a))){f.push(c);break}return this.pushStack(f.length>1?m.unique(f):f)},index:function(a){return a?"string"==typeof a?m.inArray(this[0],m(a)):m.inArray(a.jquery?a[0]:a,this):this[0]&&this[0].parentNode?this.first().prevAll().length:-1},add:function(a,b){return this.pushStack(m.unique(m.merge(this.get(),m(a,b))))},addBack:function(a){return this.add(null==a?this.prevObject:this.prevObject.filter(a))}});function D(a,b){do a=a[b];while(a&&1!==a.nodeType);return a}m.each({parent:function(a){var b=a.parentNode;return b&&11!==b.nodeType?b:null},parents:function(a){return m.dir(a,"parentNode")},parentsUntil:function(a,b,c){return m.dir(a,"parentNode",c)},next:function(a){return D(a,"nextSibling")},prev:function(a){return D(a,"previousSibling")},nextAll:function(a){return m.dir(a,"nextSibling")},prevAll:function(a){return m.dir(a,"previousSibling")},nextUntil:function(a,b,c){return m.dir(a,"nextSibling",c)},prevUntil:function(a,b,c){return m.dir(a,"previousSibling",c)},siblings:function(a){return m.sibling((a.parentNode||{}).firstChild,a)},children:function(a){return m.sibling(a.firstChild)},contents:function(a){return m.nodeName(a,"iframe")?a.contentDocument||a.contentWindow.document:m.merge([],a.childNodes)}},function(a,b){m.fn[a]=function(c,d){var e=m.map(this,b,c);return"Until"!==a.slice(-5)&&(d=c),d&&"string"==typeof d&&(e=m.filter(d,e)),this.length>1&&(C[a]||(e=m.unique(e)),B.test(a)&&(e=e.reverse())),this.pushStack(e)}});var E=/\S+/g,F={};function G(a){var b=F[a]={};return m.each(a.match(E)||[],function(a,c){b[c]=!0}),b}m.Callbacks=function(a){a="string"==typeof a?F[a]||G(a):m.extend({},a);var b,c,d,e,f,g,h=[],i=!a.once&&[],j=function(l){for(c=a.memory&&l,d=!0,f=g||0,g=0,e=h.length,b=!0;h&&e>f;f++)if(h[f].apply(l[0],l[1])===!1&&a.stopOnFalse){c=!1;break}b=!1,h&&(i?i.length&&j(i.shift()):c?h=[]:k.disable())},k={add:function(){if(h){var d=h.length;!function f(b){m.each(b,function(b,c){var d=m.type(c);"function"===d?a.unique&&k.has(c)||h.push(c):c&&c.length&&"string"!==d&&f(c)})}(arguments),b?e=h.length:c&&(g=d,j(c))}return this},remove:function(){return h&&m.each(arguments,function(a,c){var d;while((d=m.inArray(c,h,d))>-1)h.splice(d,1),b&&(e>=d&&e--,f>=d&&f--)}),this},has:function(a){return a?m.inArray(a,h)>-1:!(!h||!h.length)},empty:function(){return h=[],e=0,this},disable:function(){return h=i=c=void 0,this},disabled:function(){return!h},lock:function(){return i=void 0,c||k.disable(),this},locked:function(){return!i},fireWith:function(a,c){return!h||d&&!i||(c=c||[],c=[a,c.slice?c.slice():c],b?i.push(c):j(c)),this},fire:function(){return k.fireWith(this,arguments),this},fired:function(){return!!d}};return k},m.extend({Deferred:function(a){var b=[["resolve","done",m.Callbacks("once memory"),"resolved"],["reject","fail",m.Callbacks("once memory"),"rejected"],["notify","progress",m.Callbacks("memory")]],c="pending",d={state:function(){return c},always:function(){return e.done(arguments).fail(arguments),this},then:function(){var a=arguments;return m.Deferred(function(c){m.each(b,function(b,f){var g=m.isFunction(a[b])&&a[b];e[f[1]](function(){var a=g&&g.apply(this,arguments);a&&m.isFunction(a.promise)?a.promise().done(c.resolve).fail(c.reject).progress(c.notify):c[f[0]+"With"](this===d?c.promise():this,g?[a]:arguments)})}),a=null}).promise()},promise:function(a){return null!=a?m.extend(a,d):d}},e={};return d.pipe=d.then,m.each(b,function(a,f){var g=f[2],h=f[3];d[f[1]]=g.add,h&&g.add(function(){c=h},b[1^a][2].disable,b[2][2].lock),e[f[0]]=function(){return e[f[0]+"With"](this===e?d:this,arguments),this},e[f[0]+"With"]=g.fireWith}),d.promise(e),a&&a.call(e,e),e},when:function(a){var b=0,c=d.call(arguments),e=c.length,f=1!==e||a&&m.isFunction(a.promise)?e:0,g=1===f?a:m.Deferred(),h=function(a,b,c){return function(e){b[a]=this,c[a]=arguments.length>1?d.call(arguments):e,c===i?g.notifyWith(b,c):--f||g.resolveWith(b,c)}},i,j,k;if(e>1)for(i=new Array(e),j=new Array(e),k=new Array(e);e>b;b++)c[b]&&m.isFunction(c[b].promise)?c[b].promise().done(h(b,k,c)).fail(g.reject).progress(h(b,j,i)):--f;return f||g.resolveWith(k,c),g.promise()}});var H;m.fn.ready=function(a){return m.ready.promise().done(a),this},m.extend({isReady:!1,readyWait:1,holdReady:function(a){a?m.readyWait++:m.ready(!0)},ready:function(a){if(a===!0?!--m.readyWait:!m.isReady){if(!y.body)return setTimeout(m.ready);m.isReady=!0,a!==!0&&--m.readyWait>0||(H.resolveWith(y,[m]),m.fn.triggerHandler&&(m(y).triggerHandler("ready"),m(y).off("ready")))}}});function I(){y.addEventListener?(y.removeEventListener("DOMContentLoaded",J,!1),a.removeEventListener("load",J,!1)):(y.detachEvent("onreadystatechange",J),a.detachEvent("onload",J))}function J(){(y.addEventListener||"load"===event.type||"complete"===y.readyState)&&(I(),m.ready())}m.ready.promise=function(b){if(!H)if(H=m.Deferred(),"complete"===y.readyState)setTimeout(m.ready);else if(y.addEventListener)y.addEventListener("DOMContentLoaded",J,!1),a.addEventListener("load",J,!1);else{y.attachEvent("onreadystatechange",J),a.attachEvent("onload",J);var c=!1;try{c=null==a.frameElement&&y.documentElement}catch(d){}c&&c.doScroll&&!function e(){if(!m.isReady){try{c.doScroll("left")}catch(a){return setTimeout(e,50)}I(),m.ready()}}()}return H.promise(b)};var K="undefined",L;for(L in m(k))break;k.ownLast="0"!==L,k.inlineBlockNeedsLayout=!1,m(function(){var a,b,c,d;c=y.getElementsByTagName("body")[0],c&&c.style&&(b=y.createElement("div"),d=y.createElement("div"),d.style.cssText="position:absolute;border:0;width:0;height:0;top:0;left:-9999px",c.appendChild(d).appendChild(b),typeof b.style.zoom!==K&&(b.style.cssText="display:inline;margin:0;border:0;padding:1px;width:1px;zoom:1",k.inlineBlockNeedsLayout=a=3===b.offsetWidth,a&&(c.style.zoom=1)),c.removeChild(d))}),function(){var a=y.createElement("div");if(null==k.deleteExpando){k.deleteExpando=!0;try{delete a.test}catch(b){k.deleteExpando=!1}}a=null}(),m.acceptData=function(a){var b=m.noData[(a.nodeName+" ").toLowerCase()],c=+a.nodeType||1;return 1!==c&&9!==c?!1:!b||b!==!0&&a.getAttribute("classid")===b};var M=/^(?:\{[\w\W]*\}|\[[\w\W]*\])$/,N=/([A-Z])/g;function O(a,b,c){if(void 0===c&&1===a.nodeType){var d="data-"+b.replace(N,"-$1").toLowerCase();if(c=a.getAttribute(d),"string"==typeof c){try{c="true"===c?!0:"false"===c?!1:"null"===c?null:+c+""===c?+c:M.test(c)?m.parseJSON(c):c}catch(e){}m.data(a,b,c)}else c=void 0}return c}function P(a){var b;for(b in a)if(("data"!==b||!m.isEmptyObject(a[b]))&&"toJSON"!==b)return!1;return!0}function Q(a,b,d,e){if(m.acceptData(a)){var f,g,h=m.expando,i=a.nodeType,j=i?m.cache:a,k=i?a[h]:a[h]&&h;
if(k&&j[k]&&(e||j[k].data)||void 0!==d||"string"!=typeof b)return k||(k=i?a[h]=c.pop()||m.guid++:h),j[k]||(j[k]=i?{}:{toJSON:m.noop}),("object"==typeof b||"function"==typeof b)&&(e?j[k]=m.extend(j[k],b):j[k].data=m.extend(j[k].data,b)),g=j[k],e||(g.data||(g.data={}),g=g.data),void 0!==d&&(g[m.camelCase(b)]=d),"string"==typeof b?(f=g[b],null==f&&(f=g[m.camelCase(b)])):f=g,f}}function R(a,b,c){if(m.acceptData(a)){var d,e,f=a.nodeType,g=f?m.cache:a,h=f?a[m.expando]:m.expando;if(g[h]){if(b&&(d=c?g[h]:g[h].data)){m.isArray(b)?b=b.concat(m.map(b,m.camelCase)):b in d?b=[b]:(b=m.camelCase(b),b=b in d?[b]:b.split(" ")),e=b.length;while(e--)delete d[b[e]];if(c?!P(d):!m.isEmptyObject(d))return}(c||(delete g[h].data,P(g[h])))&&(f?m.cleanData([a],!0):k.deleteExpando||g!=g.window?delete g[h]:g[h]=null)}}}m.extend({cache:{},noData:{"applet ":!0,"embed ":!0,"object ":"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"},hasData:function(a){return a=a.nodeType?m.cache[a[m.expando]]:a[m.expando],!!a&&!P(a)},data:function(a,b,c){return Q(a,b,c)},removeData:function(a,b){return R(a,b)},_data:function(a,b,c){return Q(a,b,c,!0)},_removeData:function(a,b){return R(a,b,!0)}}),m.fn.extend({data:function(a,b){var c,d,e,f=this[0],g=f&&f.attributes;if(void 0===a){if(this.length&&(e=m.data(f),1===f.nodeType&&!m._data(f,"parsedAttrs"))){c=g.length;while(c--)g[c]&&(d=g[c].name,0===d.indexOf("data-")&&(d=m.camelCase(d.slice(5)),O(f,d,e[d])));m._data(f,"parsedAttrs",!0)}return e}return"object"==typeof a?this.each(function(){m.data(this,a)}):arguments.length>1?this.each(function(){m.data(this,a,b)}):f?O(f,a,m.data(f,a)):void 0},removeData:function(a){return this.each(function(){m.removeData(this,a)})}}),m.extend({queue:function(a,b,c){var d;return a?(b=(b||"fx")+"queue",d=m._data(a,b),c&&(!d||m.isArray(c)?d=m._data(a,b,m.makeArray(c)):d.push(c)),d||[]):void 0},dequeue:function(a,b){b=b||"fx";var c=m.queue(a,b),d=c.length,e=c.shift(),f=m._queueHooks(a,b),g=function(){m.dequeue(a,b)};"inprogress"===e&&(e=c.shift(),d--),e&&("fx"===b&&c.unshift("inprogress"),delete f.stop,e.call(a,g,f)),!d&&f&&f.empty.fire()},_queueHooks:function(a,b){var c=b+"queueHooks";return m._data(a,c)||m._data(a,c,{empty:m.Callbacks("once memory").add(function(){m._removeData(a,b+"queue"),m._removeData(a,c)})})}}),m.fn.extend({queue:function(a,b){var c=2;return"string"!=typeof a&&(b=a,a="fx",c--),arguments.length<c?m.queue(this[0],a):void 0===b?this:this.each(function(){var c=m.queue(this,a,b);m._queueHooks(this,a),"fx"===a&&"inprogress"!==c[0]&&m.dequeue(this,a)})},dequeue:function(a){return this.each(function(){m.dequeue(this,a)})},clearQueue:function(a){return this.queue(a||"fx",[])},promise:function(a,b){var c,d=1,e=m.Deferred(),f=this,g=this.length,h=function(){--d||e.resolveWith(f,[f])};"string"!=typeof a&&(b=a,a=void 0),a=a||"fx";while(g--)c=m._data(f[g],a+"queueHooks"),c&&c.empty&&(d++,c.empty.add(h));return h(),e.promise(b)}});var S=/[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,T=["Top","Right","Bottom","Left"],U=function(a,b){return a=b||a,"none"===m.css(a,"display")||!m.contains(a.ownerDocument,a)},V=m.access=function(a,b,c,d,e,f,g){var h=0,i=a.length,j=null==c;if("object"===m.type(c)){e=!0;for(h in c)m.access(a,b,h,c[h],!0,f,g)}else if(void 0!==d&&(e=!0,m.isFunction(d)||(g=!0),j&&(g?(b.call(a,d),b=null):(j=b,b=function(a,b,c){return j.call(m(a),c)})),b))for(;i>h;h++)b(a[h],c,g?d:d.call(a[h],h,b(a[h],c)));return e?a:j?b.call(a):i?b(a[0],c):f},W=/^(?:checkbox|radio)$/i;!function(){var a=y.createElement("input"),b=y.createElement("div"),c=y.createDocumentFragment();if(b.innerHTML="  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>",k.leadingWhitespace=3===b.firstChild.nodeType,k.tbody=!b.getElementsByTagName("tbody").length,k.htmlSerialize=!!b.getElementsByTagName("link").length,k.html5Clone="<:nav></:nav>"!==y.createElement("nav").cloneNode(!0).outerHTML,a.type="checkbox",a.checked=!0,c.appendChild(a),k.appendChecked=a.checked,b.innerHTML="<textarea>x</textarea>",k.noCloneChecked=!!b.cloneNode(!0).lastChild.defaultValue,c.appendChild(b),b.innerHTML="<input type='radio' checked='checked' name='t'/>",k.checkClone=b.cloneNode(!0).cloneNode(!0).lastChild.checked,k.noCloneEvent=!0,b.attachEvent&&(b.attachEvent("onclick",function(){k.noCloneEvent=!1}),b.cloneNode(!0).click()),null==k.deleteExpando){k.deleteExpando=!0;try{delete b.test}catch(d){k.deleteExpando=!1}}}(),function(){var b,c,d=y.createElement("div");for(b in{submit:!0,change:!0,focusin:!0})c="on"+b,(k[b+"Bubbles"]=c in a)||(d.setAttribute(c,"t"),k[b+"Bubbles"]=d.attributes[c].expando===!1);d=null}();var X=/^(?:input|select|textarea)$/i,Y=/^key/,Z=/^(?:mouse|pointer|contextmenu)|click/,$=/^(?:focusinfocus|focusoutblur)$/,_=/^([^.]*)(?:\.(.+)|)$/;function ab(){return!0}function bb(){return!1}function cb(){try{return y.activeElement}catch(a){}}m.event={global:{},add:function(a,b,c,d,e){var f,g,h,i,j,k,l,n,o,p,q,r=m._data(a);if(r){c.handler&&(i=c,c=i.handler,e=i.selector),c.guid||(c.guid=m.guid++),(g=r.events)||(g=r.events={}),(k=r.handle)||(k=r.handle=function(a){return typeof m===K||a&&m.event.triggered===a.type?void 0:m.event.dispatch.apply(k.elem,arguments)},k.elem=a),b=(b||"").match(E)||[""],h=b.length;while(h--)f=_.exec(b[h])||[],o=q=f[1],p=(f[2]||"").split(".").sort(),o&&(j=m.event.special[o]||{},o=(e?j.delegateType:j.bindType)||o,j=m.event.special[o]||{},l=m.extend({type:o,origType:q,data:d,handler:c,guid:c.guid,selector:e,needsContext:e&&m.expr.match.needsContext.test(e),namespace:p.join(".")},i),(n=g[o])||(n=g[o]=[],n.delegateCount=0,j.setup&&j.setup.call(a,d,p,k)!==!1||(a.addEventListener?a.addEventListener(o,k,!1):a.attachEvent&&a.attachEvent("on"+o,k))),j.add&&(j.add.call(a,l),l.handler.guid||(l.handler.guid=c.guid)),e?n.splice(n.delegateCount++,0,l):n.push(l),m.event.global[o]=!0);a=null}},remove:function(a,b,c,d,e){var f,g,h,i,j,k,l,n,o,p,q,r=m.hasData(a)&&m._data(a);if(r&&(k=r.events)){b=(b||"").match(E)||[""],j=b.length;while(j--)if(h=_.exec(b[j])||[],o=q=h[1],p=(h[2]||"").split(".").sort(),o){l=m.event.special[o]||{},o=(d?l.delegateType:l.bindType)||o,n=k[o]||[],h=h[2]&&new RegExp("(^|\\.)"+p.join("\\.(?:.*\\.|)")+"(\\.|$)"),i=f=n.length;while(f--)g=n[f],!e&&q!==g.origType||c&&c.guid!==g.guid||h&&!h.test(g.namespace)||d&&d!==g.selector&&("**"!==d||!g.selector)||(n.splice(f,1),g.selector&&n.delegateCount--,l.remove&&l.remove.call(a,g));i&&!n.length&&(l.teardown&&l.teardown.call(a,p,r.handle)!==!1||m.removeEvent(a,o,r.handle),delete k[o])}else for(o in k)m.event.remove(a,o+b[j],c,d,!0);m.isEmptyObject(k)&&(delete r.handle,m._removeData(a,"events"))}},trigger:function(b,c,d,e){var f,g,h,i,k,l,n,o=[d||y],p=j.call(b,"type")?b.type:b,q=j.call(b,"namespace")?b.namespace.split("."):[];if(h=l=d=d||y,3!==d.nodeType&&8!==d.nodeType&&!$.test(p+m.event.triggered)&&(p.indexOf(".")>=0&&(q=p.split("."),p=q.shift(),q.sort()),g=p.indexOf(":")<0&&"on"+p,b=b[m.expando]?b:new m.Event(p,"object"==typeof b&&b),b.isTrigger=e?2:3,b.namespace=q.join("."),b.namespace_re=b.namespace?new RegExp("(^|\\.)"+q.join("\\.(?:.*\\.|)")+"(\\.|$)"):null,b.result=void 0,b.target||(b.target=d),c=null==c?[b]:m.makeArray(c,[b]),k=m.event.special[p]||{},e||!k.trigger||k.trigger.apply(d,c)!==!1)){if(!e&&!k.noBubble&&!m.isWindow(d)){for(i=k.delegateType||p,$.test(i+p)||(h=h.parentNode);h;h=h.parentNode)o.push(h),l=h;l===(d.ownerDocument||y)&&o.push(l.defaultView||l.parentWindow||a)}n=0;while((h=o[n++])&&!b.isPropagationStopped())b.type=n>1?i:k.bindType||p,f=(m._data(h,"events")||{})[b.type]&&m._data(h,"handle"),f&&f.apply(h,c),f=g&&h[g],f&&f.apply&&m.acceptData(h)&&(b.result=f.apply(h,c),b.result===!1&&b.preventDefault());if(b.type=p,!e&&!b.isDefaultPrevented()&&(!k._default||k._default.apply(o.pop(),c)===!1)&&m.acceptData(d)&&g&&d[p]&&!m.isWindow(d)){l=d[g],l&&(d[g]=null),m.event.triggered=p;try{d[p]()}catch(r){}m.event.triggered=void 0,l&&(d[g]=l)}return b.result}},dispatch:function(a){a=m.event.fix(a);var b,c,e,f,g,h=[],i=d.call(arguments),j=(m._data(this,"events")||{})[a.type]||[],k=m.event.special[a.type]||{};if(i[0]=a,a.delegateTarget=this,!k.preDispatch||k.preDispatch.call(this,a)!==!1){h=m.event.handlers.call(this,a,j),b=0;while((f=h[b++])&&!a.isPropagationStopped()){a.currentTarget=f.elem,g=0;while((e=f.handlers[g++])&&!a.isImmediatePropagationStopped())(!a.namespace_re||a.namespace_re.test(e.namespace))&&(a.handleObj=e,a.data=e.data,c=((m.event.special[e.origType]||{}).handle||e.handler).apply(f.elem,i),void 0!==c&&(a.result=c)===!1&&(a.preventDefault(),a.stopPropagation()))}return k.postDispatch&&k.postDispatch.call(this,a),a.result}},handlers:function(a,b){var c,d,e,f,g=[],h=b.delegateCount,i=a.target;if(h&&i.nodeType&&(!a.button||"click"!==a.type))for(;i!=this;i=i.parentNode||this)if(1===i.nodeType&&(i.disabled!==!0||"click"!==a.type)){for(e=[],f=0;h>f;f++)d=b[f],c=d.selector+" ",void 0===e[c]&&(e[c]=d.needsContext?m(c,this).index(i)>=0:m.find(c,this,null,[i]).length),e[c]&&e.push(d);e.length&&g.push({elem:i,handlers:e})}return h<b.length&&g.push({elem:this,handlers:b.slice(h)}),g},fix:function(a){if(a[m.expando])return a;var b,c,d,e=a.type,f=a,g=this.fixHooks[e];g||(this.fixHooks[e]=g=Z.test(e)?this.mouseHooks:Y.test(e)?this.keyHooks:{}),d=g.props?this.props.concat(g.props):this.props,a=new m.Event(f),b=d.length;while(b--)c=d[b],a[c]=f[c];return a.target||(a.target=f.srcElement||y),3===a.target.nodeType&&(a.target=a.target.parentNode),a.metaKey=!!a.metaKey,g.filter?g.filter(a,f):a},props:"altKey bubbles cancelable ctrlKey currentTarget eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(" "),fixHooks:{},keyHooks:{props:"char charCode key keyCode".split(" "),filter:function(a,b){return null==a.which&&(a.which=null!=b.charCode?b.charCode:b.keyCode),a}},mouseHooks:{props:"button buttons clientX clientY fromElement offsetX offsetY pageX pageY screenX screenY toElement".split(" "),filter:function(a,b){var c,d,e,f=b.button,g=b.fromElement;return null==a.pageX&&null!=b.clientX&&(d=a.target.ownerDocument||y,e=d.documentElement,c=d.body,a.pageX=b.clientX+(e&&e.scrollLeft||c&&c.scrollLeft||0)-(e&&e.clientLeft||c&&c.clientLeft||0),a.pageY=b.clientY+(e&&e.scrollTop||c&&c.scrollTop||0)-(e&&e.clientTop||c&&c.clientTop||0)),!a.relatedTarget&&g&&(a.relatedTarget=g===a.target?b.toElement:g),a.which||void 0===f||(a.which=1&f?1:2&f?3:4&f?2:0),a}},special:{load:{noBubble:!0},focus:{trigger:function(){if(this!==cb()&&this.focus)try{return this.focus(),!1}catch(a){}},delegateType:"focusin"},blur:{trigger:function(){return this===cb()&&this.blur?(this.blur(),!1):void 0},delegateType:"focusout"},click:{trigger:function(){return m.nodeName(this,"input")&&"checkbox"===this.type&&this.click?(this.click(),!1):void 0},_default:function(a){return m.nodeName(a.target,"a")}},beforeunload:{postDispatch:function(a){void 0!==a.result&&a.originalEvent&&(a.originalEvent.returnValue=a.result)}}},simulate:function(a,b,c,d){var e=m.extend(new m.Event,c,{type:a,isSimulated:!0,originalEvent:{}});d?m.event.trigger(e,null,b):m.event.dispatch.call(b,e),e.isDefaultPrevented()&&c.preventDefault()}},m.removeEvent=y.removeEventListener?function(a,b,c){a.removeEventListener&&a.removeEventListener(b,c,!1)}:function(a,b,c){var d="on"+b;a.detachEvent&&(typeof a[d]===K&&(a[d]=null),a.detachEvent(d,c))},m.Event=function(a,b){return this instanceof m.Event?(a&&a.type?(this.originalEvent=a,this.type=a.type,this.isDefaultPrevented=a.defaultPrevented||void 0===a.defaultPrevented&&a.returnValue===!1?ab:bb):this.type=a,b&&m.extend(this,b),this.timeStamp=a&&a.timeStamp||m.now(),void(this[m.expando]=!0)):new m.Event(a,b)},m.Event.prototype={isDefaultPrevented:bb,isPropagationStopped:bb,isImmediatePropagationStopped:bb,preventDefault:function(){var a=this.originalEvent;this.isDefaultPrevented=ab,a&&(a.preventDefault?a.preventDefault():a.returnValue=!1)},stopPropagation:function(){var a=this.originalEvent;this.isPropagationStopped=ab,a&&(a.stopPropagation&&a.stopPropagation(),a.cancelBubble=!0)},stopImmediatePropagation:function(){var a=this.originalEvent;this.isImmediatePropagationStopped=ab,a&&a.stopImmediatePropagation&&a.stopImmediatePropagation(),this.stopPropagation()}},m.each({mouseenter:"mouseover",mouseleave:"mouseout",pointerenter:"pointerover",pointerleave:"pointerout"},function(a,b){m.event.special[a]={delegateType:b,bindType:b,handle:function(a){var c,d=this,e=a.relatedTarget,f=a.handleObj;return(!e||e!==d&&!m.contains(d,e))&&(a.type=f.origType,c=f.handler.apply(this,arguments),a.type=b),c}}}),k.submitBubbles||(m.event.special.submit={setup:function(){return m.nodeName(this,"form")?!1:void m.event.add(this,"click._submit keypress._submit",function(a){var b=a.target,c=m.nodeName(b,"input")||m.nodeName(b,"button")?b.form:void 0;c&&!m._data(c,"submitBubbles")&&(m.event.add(c,"submit._submit",function(a){a._submit_bubble=!0}),m._data(c,"submitBubbles",!0))})},postDispatch:function(a){a._submit_bubble&&(delete a._submit_bubble,this.parentNode&&!a.isTrigger&&m.event.simulate("submit",this.parentNode,a,!0))},teardown:function(){return m.nodeName(this,"form")?!1:void m.event.remove(this,"._submit")}}),k.changeBubbles||(m.event.special.change={setup:function(){return X.test(this.nodeName)?(("checkbox"===this.type||"radio"===this.type)&&(m.event.add(this,"propertychange._change",function(a){"checked"===a.originalEvent.propertyName&&(this._just_changed=!0)}),m.event.add(this,"click._change",function(a){this._just_changed&&!a.isTrigger&&(this._just_changed=!1),m.event.simulate("change",this,a,!0)})),!1):void m.event.add(this,"beforeactivate._change",function(a){var b=a.target;X.test(b.nodeName)&&!m._data(b,"changeBubbles")&&(m.event.add(b,"change._change",function(a){!this.parentNode||a.isSimulated||a.isTrigger||m.event.simulate("change",this.parentNode,a,!0)}),m._data(b,"changeBubbles",!0))})},handle:function(a){var b=a.target;return this!==b||a.isSimulated||a.isTrigger||"radio"!==b.type&&"checkbox"!==b.type?a.handleObj.handler.apply(this,arguments):void 0},teardown:function(){return m.event.remove(this,"._change"),!X.test(this.nodeName)}}),k.focusinBubbles||m.each({focus:"focusin",blur:"focusout"},function(a,b){var c=function(a){m.event.simulate(b,a.target,m.event.fix(a),!0)};m.event.special[b]={setup:function(){var d=this.ownerDocument||this,e=m._data(d,b);e||d.addEventListener(a,c,!0),m._data(d,b,(e||0)+1)},teardown:function(){var d=this.ownerDocument||this,e=m._data(d,b)-1;e?m._data(d,b,e):(d.removeEventListener(a,c,!0),m._removeData(d,b))}}}),m.fn.extend({on:function(a,b,c,d,e){var f,g;if("object"==typeof a){"string"!=typeof b&&(c=c||b,b=void 0);for(f in a)this.on(f,b,c,a[f],e);return this}if(null==c&&null==d?(d=b,c=b=void 0):null==d&&("string"==typeof b?(d=c,c=void 0):(d=c,c=b,b=void 0)),d===!1)d=bb;else if(!d)return this;return 1===e&&(g=d,d=function(a){return m().off(a),g.apply(this,arguments)},d.guid=g.guid||(g.guid=m.guid++)),this.each(function(){m.event.add(this,a,d,c,b)})},one:function(a,b,c,d){return this.on(a,b,c,d,1)},off:function(a,b,c){var d,e;if(a&&a.preventDefault&&a.handleObj)return d=a.handleObj,m(a.delegateTarget).off(d.namespace?d.origType+"."+d.namespace:d.origType,d.selector,d.handler),this;if("object"==typeof a){for(e in a)this.off(e,b,a[e]);return this}return(b===!1||"function"==typeof b)&&(c=b,b=void 0),c===!1&&(c=bb),this.each(function(){m.event.remove(this,a,c,b)})},trigger:function(a,b){return this.each(function(){m.event.trigger(a,b,this)})},triggerHandler:function(a,b){var c=this[0];return c?m.event.trigger(a,b,c,!0):void 0}});function db(a){var b=eb.split("|"),c=a.createDocumentFragment();if(c.createElement)while(b.length)c.createElement(b.pop());return c}var eb="abbr|article|aside|audio|bdi|canvas|data|datalist|details|figcaption|figure|footer|header|hgroup|mark|meter|nav|output|progress|section|summary|time|video",fb=/ jQuery\d+="(?:null|\d+)"/g,gb=new RegExp("<(?:"+eb+")[\\s/>]","i"),hb=/^\s+/,ib=/<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/gi,jb=/<([\w:]+)/,kb=/<tbody/i,lb=/<|&#?\w+;/,mb=/<(?:script|style|link)/i,nb=/checked\s*(?:[^=]|=\s*.checked.)/i,ob=/^$|\/(?:java|ecma)script/i,pb=/^true\/(.*)/,qb=/^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g,rb={option:[1,"<select multiple='multiple'>","</select>"],legend:[1,"<fieldset>","</fieldset>"],area:[1,"<map>","</map>"],param:[1,"<object>","</object>"],thead:[1,"<table>","</table>"],tr:[2,"<table><tbody>","</tbody></table>"],col:[2,"<table><tbody></tbody><colgroup>","</colgroup></table>"],td:[3,"<table><tbody><tr>","</tr></tbody></table>"],_default:k.htmlSerialize?[0,"",""]:[1,"X<div>","</div>"]},sb=db(y),tb=sb.appendChild(y.createElement("div"));rb.optgroup=rb.option,rb.tbody=rb.tfoot=rb.colgroup=rb.caption=rb.thead,rb.th=rb.td;function ub(a,b){var c,d,e=0,f=typeof a.getElementsByTagName!==K?a.getElementsByTagName(b||"*"):typeof a.querySelectorAll!==K?a.querySelectorAll(b||"*"):void 0;if(!f)for(f=[],c=a.childNodes||a;null!=(d=c[e]);e++)!b||m.nodeName(d,b)?f.push(d):m.merge(f,ub(d,b));return void 0===b||b&&m.nodeName(a,b)?m.merge([a],f):f}function vb(a){W.test(a.type)&&(a.defaultChecked=a.checked)}function wb(a,b){return m.nodeName(a,"table")&&m.nodeName(11!==b.nodeType?b:b.firstChild,"tr")?a.getElementsByTagName("tbody")[0]||a.appendChild(a.ownerDocument.createElement("tbody")):a}function xb(a){return a.type=(null!==m.find.attr(a,"type"))+"/"+a.type,a}function yb(a){var b=pb.exec(a.type);return b?a.type=b[1]:a.removeAttribute("type"),a}function zb(a,b){for(var c,d=0;null!=(c=a[d]);d++)m._data(c,"globalEval",!b||m._data(b[d],"globalEval"))}function Ab(a,b){if(1===b.nodeType&&m.hasData(a)){var c,d,e,f=m._data(a),g=m._data(b,f),h=f.events;if(h){delete g.handle,g.events={};for(c in h)for(d=0,e=h[c].length;e>d;d++)m.event.add(b,c,h[c][d])}g.data&&(g.data=m.extend({},g.data))}}function Bb(a,b){var c,d,e;if(1===b.nodeType){if(c=b.nodeName.toLowerCase(),!k.noCloneEvent&&b[m.expando]){e=m._data(b);for(d in e.events)m.removeEvent(b,d,e.handle);b.removeAttribute(m.expando)}"script"===c&&b.text!==a.text?(xb(b).text=a.text,yb(b)):"object"===c?(b.parentNode&&(b.outerHTML=a.outerHTML),k.html5Clone&&a.innerHTML&&!m.trim(b.innerHTML)&&(b.innerHTML=a.innerHTML)):"input"===c&&W.test(a.type)?(b.defaultChecked=b.checked=a.checked,b.value!==a.value&&(b.value=a.value)):"option"===c?b.defaultSelected=b.selected=a.defaultSelected:("input"===c||"textarea"===c)&&(b.defaultValue=a.defaultValue)}}m.extend({clone:function(a,b,c){var d,e,f,g,h,i=m.contains(a.ownerDocument,a);if(k.html5Clone||m.isXMLDoc(a)||!gb.test("<"+a.nodeName+">")?f=a.cloneNode(!0):(tb.innerHTML=a.outerHTML,tb.removeChild(f=tb.firstChild)),!(k.noCloneEvent&&k.noCloneChecked||1!==a.nodeType&&11!==a.nodeType||m.isXMLDoc(a)))for(d=ub(f),h=ub(a),g=0;null!=(e=h[g]);++g)d[g]&&Bb(e,d[g]);if(b)if(c)for(h=h||ub(a),d=d||ub(f),g=0;null!=(e=h[g]);g++)Ab(e,d[g]);else Ab(a,f);return d=ub(f,"script"),d.length>0&&zb(d,!i&&ub(a,"script")),d=h=e=null,f},buildFragment:function(a,b,c,d){for(var e,f,g,h,i,j,l,n=a.length,o=db(b),p=[],q=0;n>q;q++)if(f=a[q],f||0===f)if("object"===m.type(f))m.merge(p,f.nodeType?[f]:f);else if(lb.test(f)){h=h||o.appendChild(b.createElement("div")),i=(jb.exec(f)||["",""])[1].toLowerCase(),l=rb[i]||rb._default,h.innerHTML=l[1]+f.replace(ib,"<$1></$2>")+l[2],e=l[0];while(e--)h=h.lastChild;if(!k.leadingWhitespace&&hb.test(f)&&p.push(b.createTextNode(hb.exec(f)[0])),!k.tbody){f="table"!==i||kb.test(f)?"<table>"!==l[1]||kb.test(f)?0:h:h.firstChild,e=f&&f.childNodes.length;while(e--)m.nodeName(j=f.childNodes[e],"tbody")&&!j.childNodes.length&&f.removeChild(j)}m.merge(p,h.childNodes),h.textContent="";while(h.firstChild)h.removeChild(h.firstChild);h=o.lastChild}else p.push(b.createTextNode(f));h&&o.removeChild(h),k.appendChecked||m.grep(ub(p,"input"),vb),q=0;while(f=p[q++])if((!d||-1===m.inArray(f,d))&&(g=m.contains(f.ownerDocument,f),h=ub(o.appendChild(f),"script"),g&&zb(h),c)){e=0;while(f=h[e++])ob.test(f.type||"")&&c.push(f)}return h=null,o},cleanData:function(a,b){for(var d,e,f,g,h=0,i=m.expando,j=m.cache,l=k.deleteExpando,n=m.event.special;null!=(d=a[h]);h++)if((b||m.acceptData(d))&&(f=d[i],g=f&&j[f])){if(g.events)for(e in g.events)n[e]?m.event.remove(d,e):m.removeEvent(d,e,g.handle);j[f]&&(delete j[f],l?delete d[i]:typeof d.removeAttribute!==K?d.removeAttribute(i):d[i]=null,c.push(f))}}}),m.fn.extend({text:function(a){return V(this,function(a){return void 0===a?m.text(this):this.empty().append((this[0]&&this[0].ownerDocument||y).createTextNode(a))},null,a,arguments.length)},append:function(){return this.domManip(arguments,function(a){if(1===this.nodeType||11===this.nodeType||9===this.nodeType){var b=wb(this,a);b.appendChild(a)}})},prepend:function(){return this.domManip(arguments,function(a){if(1===this.nodeType||11===this.nodeType||9===this.nodeType){var b=wb(this,a);b.insertBefore(a,b.firstChild)}})},before:function(){return this.domManip(arguments,function(a){this.parentNode&&this.parentNode.insertBefore(a,this)})},after:function(){return this.domManip(arguments,function(a){this.parentNode&&this.parentNode.insertBefore(a,this.nextSibling)})},remove:function(a,b){for(var c,d=a?m.filter(a,this):this,e=0;null!=(c=d[e]);e++)b||1!==c.nodeType||m.cleanData(ub(c)),c.parentNode&&(b&&m.contains(c.ownerDocument,c)&&zb(ub(c,"script")),c.parentNode.removeChild(c));return this},empty:function(){for(var a,b=0;null!=(a=this[b]);b++){1===a.nodeType&&m.cleanData(ub(a,!1));while(a.firstChild)a.removeChild(a.firstChild);a.options&&m.nodeName(a,"select")&&(a.options.length=0)}return this},clone:function(a,b){return a=null==a?!1:a,b=null==b?a:b,this.map(function(){return m.clone(this,a,b)})},html:function(a){return V(this,function(a){var b=this[0]||{},c=0,d=this.length;if(void 0===a)return 1===b.nodeType?b.innerHTML.replace(fb,""):void 0;if(!("string"!=typeof a||mb.test(a)||!k.htmlSerialize&&gb.test(a)||!k.leadingWhitespace&&hb.test(a)||rb[(jb.exec(a)||["",""])[1].toLowerCase()])){a=a.replace(ib,"<$1></$2>");try{for(;d>c;c++)b=this[c]||{},1===b.nodeType&&(m.cleanData(ub(b,!1)),b.innerHTML=a);b=0}catch(e){}}b&&this.empty().append(a)},null,a,arguments.length)},replaceWith:function(){var a=arguments[0];return this.domManip(arguments,function(b){a=this.parentNode,m.cleanData(ub(this)),a&&a.replaceChild(b,this)}),a&&(a.length||a.nodeType)?this:this.remove()},detach:function(a){return this.remove(a,!0)},domManip:function(a,b){a=e.apply([],a);var c,d,f,g,h,i,j=0,l=this.length,n=this,o=l-1,p=a[0],q=m.isFunction(p);if(q||l>1&&"string"==typeof p&&!k.checkClone&&nb.test(p))return this.each(function(c){var d=n.eq(c);q&&(a[0]=p.call(this,c,d.html())),d.domManip(a,b)});if(l&&(i=m.buildFragment(a,this[0].ownerDocument,!1,this),c=i.firstChild,1===i.childNodes.length&&(i=c),c)){for(g=m.map(ub(i,"script"),xb),f=g.length;l>j;j++)d=i,j!==o&&(d=m.clone(d,!0,!0),f&&m.merge(g,ub(d,"script"))),b.call(this[j],d,j);if(f)for(h=g[g.length-1].ownerDocument,m.map(g,yb),j=0;f>j;j++)d=g[j],ob.test(d.type||"")&&!m._data(d,"globalEval")&&m.contains(h,d)&&(d.src?m._evalUrl&&m._evalUrl(d.src):m.globalEval((d.text||d.textContent||d.innerHTML||"").replace(qb,"")));i=c=null}return this}}),m.each({appendTo:"append",prependTo:"prepend",insertBefore:"before",insertAfter:"after",replaceAll:"replaceWith"},function(a,b){m.fn[a]=function(a){for(var c,d=0,e=[],g=m(a),h=g.length-1;h>=d;d++)c=d===h?this:this.clone(!0),m(g[d])[b](c),f.apply(e,c.get());return this.pushStack(e)}});var Cb,Db={};function Eb(b,c){var d,e=m(c.createElement(b)).appendTo(c.body),f=a.getDefaultComputedStyle&&(d=a.getDefaultComputedStyle(e[0]))?d.display:m.css(e[0],"display");return e.detach(),f}function Fb(a){var b=y,c=Db[a];return c||(c=Eb(a,b),"none"!==c&&c||(Cb=(Cb||m("<iframe frameborder='0' width='0' height='0'/>")).appendTo(b.documentElement),b=(Cb[0].contentWindow||Cb[0].contentDocument).document,b.write(),b.close(),c=Eb(a,b),Cb.detach()),Db[a]=c),c}!function(){var a;k.shrinkWrapBlocks=function(){if(null!=a)return a;a=!1;var b,c,d;return c=y.getElementsByTagName("body")[0],c&&c.style?(b=y.createElement("div"),d=y.createElement("div"),d.style.cssText="position:absolute;border:0;width:0;height:0;top:0;left:-9999px",c.appendChild(d).appendChild(b),typeof b.style.zoom!==K&&(b.style.cssText="-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;display:block;margin:0;border:0;padding:1px;width:1px;zoom:1",b.appendChild(y.createElement("div")).style.width="5px",a=3!==b.offsetWidth),c.removeChild(d),a):void 0}}();var Gb=/^margin/,Hb=new RegExp("^("+S+")(?!px)[a-z%]+$","i"),Ib,Jb,Kb=/^(top|right|bottom|left)$/;a.getComputedStyle?(Ib=function(a){return a.ownerDocument.defaultView.getComputedStyle(a,null)},Jb=function(a,b,c){var d,e,f,g,h=a.style;return c=c||Ib(a),g=c?c.getPropertyValue(b)||c[b]:void 0,c&&(""!==g||m.contains(a.ownerDocument,a)||(g=m.style(a,b)),Hb.test(g)&&Gb.test(b)&&(d=h.width,e=h.minWidth,f=h.maxWidth,h.minWidth=h.maxWidth=h.width=g,g=c.width,h.width=d,h.minWidth=e,h.maxWidth=f)),void 0===g?g:g+""}):y.documentElement.currentStyle&&(Ib=function(a){return a.currentStyle},Jb=function(a,b,c){var d,e,f,g,h=a.style;return c=c||Ib(a),g=c?c[b]:void 0,null==g&&h&&h[b]&&(g=h[b]),Hb.test(g)&&!Kb.test(b)&&(d=h.left,e=a.runtimeStyle,f=e&&e.left,f&&(e.left=a.currentStyle.left),h.left="fontSize"===b?"1em":g,g=h.pixelLeft+"px",h.left=d,f&&(e.left=f)),void 0===g?g:g+""||"auto"});function Lb(a,b){return{get:function(){var c=a();if(null!=c)return c?void delete this.get:(this.get=b).apply(this,arguments)}}}!function(){var b,c,d,e,f,g,h;if(b=y.createElement("div"),b.innerHTML="  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>",d=b.getElementsByTagName("a")[0],c=d&&d.style){c.cssText="float:left;opacity:.5",k.opacity="0.5"===c.opacity,k.cssFloat=!!c.cssFloat,b.style.backgroundClip="content-box",b.cloneNode(!0).style.backgroundClip="",k.clearCloneStyle="content-box"===b.style.backgroundClip,k.boxSizing=""===c.boxSizing||""===c.MozBoxSizing||""===c.WebkitBoxSizing,m.extend(k,{reliableHiddenOffsets:function(){return null==g&&i(),g},boxSizingReliable:function(){return null==f&&i(),f},pixelPosition:function(){return null==e&&i(),e},reliableMarginRight:function(){return null==h&&i(),h}});function i(){var b,c,d,i;c=y.getElementsByTagName("body")[0],c&&c.style&&(b=y.createElement("div"),d=y.createElement("div"),d.style.cssText="position:absolute;border:0;width:0;height:0;top:0;left:-9999px",c.appendChild(d).appendChild(b),b.style.cssText="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;display:block;margin-top:1%;top:1%;border:1px;padding:1px;width:4px;position:absolute",e=f=!1,h=!0,a.getComputedStyle&&(e="1%"!==(a.getComputedStyle(b,null)||{}).top,f="4px"===(a.getComputedStyle(b,null)||{width:"4px"}).width,i=b.appendChild(y.createElement("div")),i.style.cssText=b.style.cssText="-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;display:block;margin:0;border:0;padding:0",i.style.marginRight=i.style.width="0",b.style.width="1px",h=!parseFloat((a.getComputedStyle(i,null)||{}).marginRight)),b.innerHTML="<table><tr><td></td><td>t</td></tr></table>",i=b.getElementsByTagName("td"),i[0].style.cssText="margin:0;border:0;padding:0;display:none",g=0===i[0].offsetHeight,g&&(i[0].style.display="",i[1].style.display="none",g=0===i[0].offsetHeight),c.removeChild(d))}}}(),m.swap=function(a,b,c,d){var e,f,g={};for(f in b)g[f]=a.style[f],a.style[f]=b[f];e=c.apply(a,d||[]);for(f in b)a.style[f]=g[f];return e};var Mb=/alpha\([^)]*\)/i,Nb=/opacity\s*=\s*([^)]*)/,Ob=/^(none|table(?!-c[ea]).+)/,Pb=new RegExp("^("+S+")(.*)$","i"),Qb=new RegExp("^([+-])=("+S+")","i"),Rb={position:"absolute",visibility:"hidden",display:"block"},Sb={letterSpacing:"0",fontWeight:"400"},Tb=["Webkit","O","Moz","ms"];function Ub(a,b){if(b in a)return b;var c=b.charAt(0).toUpperCase()+b.slice(1),d=b,e=Tb.length;while(e--)if(b=Tb[e]+c,b in a)return b;return d}function Vb(a,b){for(var c,d,e,f=[],g=0,h=a.length;h>g;g++)d=a[g],d.style&&(f[g]=m._data(d,"olddisplay"),c=d.style.display,b?(f[g]||"none"!==c||(d.style.display=""),""===d.style.display&&U(d)&&(f[g]=m._data(d,"olddisplay",Fb(d.nodeName)))):(e=U(d),(c&&"none"!==c||!e)&&m._data(d,"olddisplay",e?c:m.css(d,"display"))));for(g=0;h>g;g++)d=a[g],d.style&&(b&&"none"!==d.style.display&&""!==d.style.display||(d.style.display=b?f[g]||"":"none"));return a}function Wb(a,b,c){var d=Pb.exec(b);return d?Math.max(0,d[1]-(c||0))+(d[2]||"px"):b}function Xb(a,b,c,d,e){for(var f=c===(d?"border":"content")?4:"width"===b?1:0,g=0;4>f;f+=2)"margin"===c&&(g+=m.css(a,c+T[f],!0,e)),d?("content"===c&&(g-=m.css(a,"padding"+T[f],!0,e)),"margin"!==c&&(g-=m.css(a,"border"+T[f]+"Width",!0,e))):(g+=m.css(a,"padding"+T[f],!0,e),"padding"!==c&&(g+=m.css(a,"border"+T[f]+"Width",!0,e)));return g}function Yb(a,b,c){var d=!0,e="width"===b?a.offsetWidth:a.offsetHeight,f=Ib(a),g=k.boxSizing&&"border-box"===m.css(a,"boxSizing",!1,f);if(0>=e||null==e){if(e=Jb(a,b,f),(0>e||null==e)&&(e=a.style[b]),Hb.test(e))return e;d=g&&(k.boxSizingReliable()||e===a.style[b]),e=parseFloat(e)||0}return e+Xb(a,b,c||(g?"border":"content"),d,f)+"px"}m.extend({cssHooks:{opacity:{get:function(a,b){if(b){var c=Jb(a,"opacity");return""===c?"1":c}}}},cssNumber:{columnCount:!0,fillOpacity:!0,flexGrow:!0,flexShrink:!0,fontWeight:!0,lineHeight:!0,opacity:!0,order:!0,orphans:!0,widows:!0,zIndex:!0,zoom:!0},cssProps:{"float":k.cssFloat?"cssFloat":"styleFloat"},style:function(a,b,c,d){if(a&&3!==a.nodeType&&8!==a.nodeType&&a.style){var e,f,g,h=m.camelCase(b),i=a.style;if(b=m.cssProps[h]||(m.cssProps[h]=Ub(i,h)),g=m.cssHooks[b]||m.cssHooks[h],void 0===c)return g&&"get"in g&&void 0!==(e=g.get(a,!1,d))?e:i[b];if(f=typeof c,"string"===f&&(e=Qb.exec(c))&&(c=(e[1]+1)*e[2]+parseFloat(m.css(a,b)),f="number"),null!=c&&c===c&&("number"!==f||m.cssNumber[h]||(c+="px"),k.clearCloneStyle||""!==c||0!==b.indexOf("background")||(i[b]="inherit"),!(g&&"set"in g&&void 0===(c=g.set(a,c,d)))))try{i[b]=c}catch(j){}}},css:function(a,b,c,d){var e,f,g,h=m.camelCase(b);return b=m.cssProps[h]||(m.cssProps[h]=Ub(a.style,h)),g=m.cssHooks[b]||m.cssHooks[h],g&&"get"in g&&(f=g.get(a,!0,c)),void 0===f&&(f=Jb(a,b,d)),"normal"===f&&b in Sb&&(f=Sb[b]),""===c||c?(e=parseFloat(f),c===!0||m.isNumeric(e)?e||0:f):f}}),m.each(["height","width"],function(a,b){m.cssHooks[b]={get:function(a,c,d){return c?Ob.test(m.css(a,"display"))&&0===a.offsetWidth?m.swap(a,Rb,function(){return Yb(a,b,d)}):Yb(a,b,d):void 0},set:function(a,c,d){var e=d&&Ib(a);return Wb(a,c,d?Xb(a,b,d,k.boxSizing&&"border-box"===m.css(a,"boxSizing",!1,e),e):0)}}}),k.opacity||(m.cssHooks.opacity={get:function(a,b){return Nb.test((b&&a.currentStyle?a.currentStyle.filter:a.style.filter)||"")?.01*parseFloat(RegExp.$1)+"":b?"1":""},set:function(a,b){var c=a.style,d=a.currentStyle,e=m.isNumeric(b)?"alpha(opacity="+100*b+")":"",f=d&&d.filter||c.filter||"";c.zoom=1,(b>=1||""===b)&&""===m.trim(f.replace(Mb,""))&&c.removeAttribute&&(c.removeAttribute("filter"),""===b||d&&!d.filter)||(c.filter=Mb.test(f)?f.replace(Mb,e):f+" "+e)}}),m.cssHooks.marginRight=Lb(k.reliableMarginRight,function(a,b){return b?m.swap(a,{display:"inline-block"},Jb,[a,"marginRight"]):void 0}),m.each({margin:"",padding:"",border:"Width"},function(a,b){m.cssHooks[a+b]={expand:function(c){for(var d=0,e={},f="string"==typeof c?c.split(" "):[c];4>d;d++)e[a+T[d]+b]=f[d]||f[d-2]||f[0];return e}},Gb.test(a)||(m.cssHooks[a+b].set=Wb)}),m.fn.extend({css:function(a,b){return V(this,function(a,b,c){var d,e,f={},g=0;if(m.isArray(b)){for(d=Ib(a),e=b.length;e>g;g++)f[b[g]]=m.css(a,b[g],!1,d);return f}return void 0!==c?m.style(a,b,c):m.css(a,b)},a,b,arguments.length>1)},show:function(){return Vb(this,!0)},hide:function(){return Vb(this)},toggle:function(a){return"boolean"==typeof a?a?this.show():this.hide():this.each(function(){U(this)?m(this).show():m(this).hide()})}});function Zb(a,b,c,d,e){return new Zb.prototype.init(a,b,c,d,e)}m.Tween=Zb,Zb.prototype={constructor:Zb,init:function(a,b,c,d,e,f){this.elem=a,this.prop=c,this.easing=e||"swing",this.options=b,this.start=this.now=this.cur(),this.end=d,this.unit=f||(m.cssNumber[c]?"":"px")
},cur:function(){var a=Zb.propHooks[this.prop];return a&&a.get?a.get(this):Zb.propHooks._default.get(this)},run:function(a){var b,c=Zb.propHooks[this.prop];return this.pos=b=this.options.duration?m.easing[this.easing](a,this.options.duration*a,0,1,this.options.duration):a,this.now=(this.end-this.start)*b+this.start,this.options.step&&this.options.step.call(this.elem,this.now,this),c&&c.set?c.set(this):Zb.propHooks._default.set(this),this}},Zb.prototype.init.prototype=Zb.prototype,Zb.propHooks={_default:{get:function(a){var b;return null==a.elem[a.prop]||a.elem.style&&null!=a.elem.style[a.prop]?(b=m.css(a.elem,a.prop,""),b&&"auto"!==b?b:0):a.elem[a.prop]},set:function(a){m.fx.step[a.prop]?m.fx.step[a.prop](a):a.elem.style&&(null!=a.elem.style[m.cssProps[a.prop]]||m.cssHooks[a.prop])?m.style(a.elem,a.prop,a.now+a.unit):a.elem[a.prop]=a.now}}},Zb.propHooks.scrollTop=Zb.propHooks.scrollLeft={set:function(a){a.elem.nodeType&&a.elem.parentNode&&(a.elem[a.prop]=a.now)}},m.easing={linear:function(a){return a},swing:function(a){return.5-Math.cos(a*Math.PI)/2}},m.fx=Zb.prototype.init,m.fx.step={};var $b,_b,ac=/^(?:toggle|show|hide)$/,bc=new RegExp("^(?:([+-])=|)("+S+")([a-z%]*)$","i"),cc=/queueHooks$/,dc=[ic],ec={"*":[function(a,b){var c=this.createTween(a,b),d=c.cur(),e=bc.exec(b),f=e&&e[3]||(m.cssNumber[a]?"":"px"),g=(m.cssNumber[a]||"px"!==f&&+d)&&bc.exec(m.css(c.elem,a)),h=1,i=20;if(g&&g[3]!==f){f=f||g[3],e=e||[],g=+d||1;do h=h||".5",g/=h,m.style(c.elem,a,g+f);while(h!==(h=c.cur()/d)&&1!==h&&--i)}return e&&(g=c.start=+g||+d||0,c.unit=f,c.end=e[1]?g+(e[1]+1)*e[2]:+e[2]),c}]};function fc(){return setTimeout(function(){$b=void 0}),$b=m.now()}function gc(a,b){var c,d={height:a},e=0;for(b=b?1:0;4>e;e+=2-b)c=T[e],d["margin"+c]=d["padding"+c]=a;return b&&(d.opacity=d.width=a),d}function hc(a,b,c){for(var d,e=(ec[b]||[]).concat(ec["*"]),f=0,g=e.length;g>f;f++)if(d=e[f].call(c,b,a))return d}function ic(a,b,c){var d,e,f,g,h,i,j,l,n=this,o={},p=a.style,q=a.nodeType&&U(a),r=m._data(a,"fxshow");c.queue||(h=m._queueHooks(a,"fx"),null==h.unqueued&&(h.unqueued=0,i=h.empty.fire,h.empty.fire=function(){h.unqueued||i()}),h.unqueued++,n.always(function(){n.always(function(){h.unqueued--,m.queue(a,"fx").length||h.empty.fire()})})),1===a.nodeType&&("height"in b||"width"in b)&&(c.overflow=[p.overflow,p.overflowX,p.overflowY],j=m.css(a,"display"),l="none"===j?m._data(a,"olddisplay")||Fb(a.nodeName):j,"inline"===l&&"none"===m.css(a,"float")&&(k.inlineBlockNeedsLayout&&"inline"!==Fb(a.nodeName)?p.zoom=1:p.display="inline-block")),c.overflow&&(p.overflow="hidden",k.shrinkWrapBlocks()||n.always(function(){p.overflow=c.overflow[0],p.overflowX=c.overflow[1],p.overflowY=c.overflow[2]}));for(d in b)if(e=b[d],ac.exec(e)){if(delete b[d],f=f||"toggle"===e,e===(q?"hide":"show")){if("show"!==e||!r||void 0===r[d])continue;q=!0}o[d]=r&&r[d]||m.style(a,d)}else j=void 0;if(m.isEmptyObject(o))"inline"===("none"===j?Fb(a.nodeName):j)&&(p.display=j);else{r?"hidden"in r&&(q=r.hidden):r=m._data(a,"fxshow",{}),f&&(r.hidden=!q),q?m(a).show():n.done(function(){m(a).hide()}),n.done(function(){var b;m._removeData(a,"fxshow");for(b in o)m.style(a,b,o[b])});for(d in o)g=hc(q?r[d]:0,d,n),d in r||(r[d]=g.start,q&&(g.end=g.start,g.start="width"===d||"height"===d?1:0))}}function jc(a,b){var c,d,e,f,g;for(c in a)if(d=m.camelCase(c),e=b[d],f=a[c],m.isArray(f)&&(e=f[1],f=a[c]=f[0]),c!==d&&(a[d]=f,delete a[c]),g=m.cssHooks[d],g&&"expand"in g){f=g.expand(f),delete a[d];for(c in f)c in a||(a[c]=f[c],b[c]=e)}else b[d]=e}function kc(a,b,c){var d,e,f=0,g=dc.length,h=m.Deferred().always(function(){delete i.elem}),i=function(){if(e)return!1;for(var b=$b||fc(),c=Math.max(0,j.startTime+j.duration-b),d=c/j.duration||0,f=1-d,g=0,i=j.tweens.length;i>g;g++)j.tweens[g].run(f);return h.notifyWith(a,[j,f,c]),1>f&&i?c:(h.resolveWith(a,[j]),!1)},j=h.promise({elem:a,props:m.extend({},b),opts:m.extend(!0,{specialEasing:{}},c),originalProperties:b,originalOptions:c,startTime:$b||fc(),duration:c.duration,tweens:[],createTween:function(b,c){var d=m.Tween(a,j.opts,b,c,j.opts.specialEasing[b]||j.opts.easing);return j.tweens.push(d),d},stop:function(b){var c=0,d=b?j.tweens.length:0;if(e)return this;for(e=!0;d>c;c++)j.tweens[c].run(1);return b?h.resolveWith(a,[j,b]):h.rejectWith(a,[j,b]),this}}),k=j.props;for(jc(k,j.opts.specialEasing);g>f;f++)if(d=dc[f].call(j,a,k,j.opts))return d;return m.map(k,hc,j),m.isFunction(j.opts.start)&&j.opts.start.call(a,j),m.fx.timer(m.extend(i,{elem:a,anim:j,queue:j.opts.queue})),j.progress(j.opts.progress).done(j.opts.done,j.opts.complete).fail(j.opts.fail).always(j.opts.always)}m.Animation=m.extend(kc,{tweener:function(a,b){m.isFunction(a)?(b=a,a=["*"]):a=a.split(" ");for(var c,d=0,e=a.length;e>d;d++)c=a[d],ec[c]=ec[c]||[],ec[c].unshift(b)},prefilter:function(a,b){b?dc.unshift(a):dc.push(a)}}),m.speed=function(a,b,c){var d=a&&"object"==typeof a?m.extend({},a):{complete:c||!c&&b||m.isFunction(a)&&a,duration:a,easing:c&&b||b&&!m.isFunction(b)&&b};return d.duration=m.fx.off?0:"number"==typeof d.duration?d.duration:d.duration in m.fx.speeds?m.fx.speeds[d.duration]:m.fx.speeds._default,(null==d.queue||d.queue===!0)&&(d.queue="fx"),d.old=d.complete,d.complete=function(){m.isFunction(d.old)&&d.old.call(this),d.queue&&m.dequeue(this,d.queue)},d},m.fn.extend({fadeTo:function(a,b,c,d){return this.filter(U).css("opacity",0).show().end().animate({opacity:b},a,c,d)},animate:function(a,b,c,d){var e=m.isEmptyObject(a),f=m.speed(b,c,d),g=function(){var b=kc(this,m.extend({},a),f);(e||m._data(this,"finish"))&&b.stop(!0)};return g.finish=g,e||f.queue===!1?this.each(g):this.queue(f.queue,g)},stop:function(a,b,c){var d=function(a){var b=a.stop;delete a.stop,b(c)};return"string"!=typeof a&&(c=b,b=a,a=void 0),b&&a!==!1&&this.queue(a||"fx",[]),this.each(function(){var b=!0,e=null!=a&&a+"queueHooks",f=m.timers,g=m._data(this);if(e)g[e]&&g[e].stop&&d(g[e]);else for(e in g)g[e]&&g[e].stop&&cc.test(e)&&d(g[e]);for(e=f.length;e--;)f[e].elem!==this||null!=a&&f[e].queue!==a||(f[e].anim.stop(c),b=!1,f.splice(e,1));(b||!c)&&m.dequeue(this,a)})},finish:function(a){return a!==!1&&(a=a||"fx"),this.each(function(){var b,c=m._data(this),d=c[a+"queue"],e=c[a+"queueHooks"],f=m.timers,g=d?d.length:0;for(c.finish=!0,m.queue(this,a,[]),e&&e.stop&&e.stop.call(this,!0),b=f.length;b--;)f[b].elem===this&&f[b].queue===a&&(f[b].anim.stop(!0),f.splice(b,1));for(b=0;g>b;b++)d[b]&&d[b].finish&&d[b].finish.call(this);delete c.finish})}}),m.each(["toggle","show","hide"],function(a,b){var c=m.fn[b];m.fn[b]=function(a,d,e){return null==a||"boolean"==typeof a?c.apply(this,arguments):this.animate(gc(b,!0),a,d,e)}}),m.each({slideDown:gc("show"),slideUp:gc("hide"),slideToggle:gc("toggle"),fadeIn:{opacity:"show"},fadeOut:{opacity:"hide"},fadeToggle:{opacity:"toggle"}},function(a,b){m.fn[a]=function(a,c,d){return this.animate(b,a,c,d)}}),m.timers=[],m.fx.tick=function(){var a,b=m.timers,c=0;for($b=m.now();c<b.length;c++)a=b[c],a()||b[c]!==a||b.splice(c--,1);b.length||m.fx.stop(),$b=void 0},m.fx.timer=function(a){m.timers.push(a),a()?m.fx.start():m.timers.pop()},m.fx.interval=13,m.fx.start=function(){_b||(_b=setInterval(m.fx.tick,m.fx.interval))},m.fx.stop=function(){clearInterval(_b),_b=null},m.fx.speeds={slow:600,fast:200,_default:400},m.fn.delay=function(a,b){return a=m.fx?m.fx.speeds[a]||a:a,b=b||"fx",this.queue(b,function(b,c){var d=setTimeout(b,a);c.stop=function(){clearTimeout(d)}})},function(){var a,b,c,d,e;b=y.createElement("div"),b.setAttribute("className","t"),b.innerHTML="  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>",d=b.getElementsByTagName("a")[0],c=y.createElement("select"),e=c.appendChild(y.createElement("option")),a=b.getElementsByTagName("input")[0],d.style.cssText="top:1px",k.getSetAttribute="t"!==b.className,k.style=/top/.test(d.getAttribute("style")),k.hrefNormalized="/a"===d.getAttribute("href"),k.checkOn=!!a.value,k.optSelected=e.selected,k.enctype=!!y.createElement("form").enctype,c.disabled=!0,k.optDisabled=!e.disabled,a=y.createElement("input"),a.setAttribute("value",""),k.input=""===a.getAttribute("value"),a.value="t",a.setAttribute("type","radio"),k.radioValue="t"===a.value}();var lc=/\r/g;m.fn.extend({val:function(a){var b,c,d,e=this[0];{if(arguments.length)return d=m.isFunction(a),this.each(function(c){var e;1===this.nodeType&&(e=d?a.call(this,c,m(this).val()):a,null==e?e="":"number"==typeof e?e+="":m.isArray(e)&&(e=m.map(e,function(a){return null==a?"":a+""})),b=m.valHooks[this.type]||m.valHooks[this.nodeName.toLowerCase()],b&&"set"in b&&void 0!==b.set(this,e,"value")||(this.value=e))});if(e)return b=m.valHooks[e.type]||m.valHooks[e.nodeName.toLowerCase()],b&&"get"in b&&void 0!==(c=b.get(e,"value"))?c:(c=e.value,"string"==typeof c?c.replace(lc,""):null==c?"":c)}}}),m.extend({valHooks:{option:{get:function(a){var b=m.find.attr(a,"value");return null!=b?b:m.trim(m.text(a))}},select:{get:function(a){for(var b,c,d=a.options,e=a.selectedIndex,f="select-one"===a.type||0>e,g=f?null:[],h=f?e+1:d.length,i=0>e?h:f?e:0;h>i;i++)if(c=d[i],!(!c.selected&&i!==e||(k.optDisabled?c.disabled:null!==c.getAttribute("disabled"))||c.parentNode.disabled&&m.nodeName(c.parentNode,"optgroup"))){if(b=m(c).val(),f)return b;g.push(b)}return g},set:function(a,b){var c,d,e=a.options,f=m.makeArray(b),g=e.length;while(g--)if(d=e[g],m.inArray(m.valHooks.option.get(d),f)>=0)try{d.selected=c=!0}catch(h){d.scrollHeight}else d.selected=!1;return c||(a.selectedIndex=-1),e}}}}),m.each(["radio","checkbox"],function(){m.valHooks[this]={set:function(a,b){return m.isArray(b)?a.checked=m.inArray(m(a).val(),b)>=0:void 0}},k.checkOn||(m.valHooks[this].get=function(a){return null===a.getAttribute("value")?"on":a.value})});var mc,nc,oc=m.expr.attrHandle,pc=/^(?:checked|selected)$/i,qc=k.getSetAttribute,rc=k.input;m.fn.extend({attr:function(a,b){return V(this,m.attr,a,b,arguments.length>1)},removeAttr:function(a){return this.each(function(){m.removeAttr(this,a)})}}),m.extend({attr:function(a,b,c){var d,e,f=a.nodeType;if(a&&3!==f&&8!==f&&2!==f)return typeof a.getAttribute===K?m.prop(a,b,c):(1===f&&m.isXMLDoc(a)||(b=b.toLowerCase(),d=m.attrHooks[b]||(m.expr.match.bool.test(b)?nc:mc)),void 0===c?d&&"get"in d&&null!==(e=d.get(a,b))?e:(e=m.find.attr(a,b),null==e?void 0:e):null!==c?d&&"set"in d&&void 0!==(e=d.set(a,c,b))?e:(a.setAttribute(b,c+""),c):void m.removeAttr(a,b))},removeAttr:function(a,b){var c,d,e=0,f=b&&b.match(E);if(f&&1===a.nodeType)while(c=f[e++])d=m.propFix[c]||c,m.expr.match.bool.test(c)?rc&&qc||!pc.test(c)?a[d]=!1:a[m.camelCase("default-"+c)]=a[d]=!1:m.attr(a,c,""),a.removeAttribute(qc?c:d)},attrHooks:{type:{set:function(a,b){if(!k.radioValue&&"radio"===b&&m.nodeName(a,"input")){var c=a.value;return a.setAttribute("type",b),c&&(a.value=c),b}}}}}),nc={set:function(a,b,c){return b===!1?m.removeAttr(a,c):rc&&qc||!pc.test(c)?a.setAttribute(!qc&&m.propFix[c]||c,c):a[m.camelCase("default-"+c)]=a[c]=!0,c}},m.each(m.expr.match.bool.source.match(/\w+/g),function(a,b){var c=oc[b]||m.find.attr;oc[b]=rc&&qc||!pc.test(b)?function(a,b,d){var e,f;return d||(f=oc[b],oc[b]=e,e=null!=c(a,b,d)?b.toLowerCase():null,oc[b]=f),e}:function(a,b,c){return c?void 0:a[m.camelCase("default-"+b)]?b.toLowerCase():null}}),rc&&qc||(m.attrHooks.value={set:function(a,b,c){return m.nodeName(a,"input")?void(a.defaultValue=b):mc&&mc.set(a,b,c)}}),qc||(mc={set:function(a,b,c){var d=a.getAttributeNode(c);return d||a.setAttributeNode(d=a.ownerDocument.createAttribute(c)),d.value=b+="","value"===c||b===a.getAttribute(c)?b:void 0}},oc.id=oc.name=oc.coords=function(a,b,c){var d;return c?void 0:(d=a.getAttributeNode(b))&&""!==d.value?d.value:null},m.valHooks.button={get:function(a,b){var c=a.getAttributeNode(b);return c&&c.specified?c.value:void 0},set:mc.set},m.attrHooks.contenteditable={set:function(a,b,c){mc.set(a,""===b?!1:b,c)}},m.each(["width","height"],function(a,b){m.attrHooks[b]={set:function(a,c){return""===c?(a.setAttribute(b,"auto"),c):void 0}}})),k.style||(m.attrHooks.style={get:function(a){return a.style.cssText||void 0},set:function(a,b){return a.style.cssText=b+""}});var sc=/^(?:input|select|textarea|button|object)$/i,tc=/^(?:a|area)$/i;m.fn.extend({prop:function(a,b){return V(this,m.prop,a,b,arguments.length>1)},removeProp:function(a){return a=m.propFix[a]||a,this.each(function(){try{this[a]=void 0,delete this[a]}catch(b){}})}}),m.extend({propFix:{"for":"htmlFor","class":"className"},prop:function(a,b,c){var d,e,f,g=a.nodeType;if(a&&3!==g&&8!==g&&2!==g)return f=1!==g||!m.isXMLDoc(a),f&&(b=m.propFix[b]||b,e=m.propHooks[b]),void 0!==c?e&&"set"in e&&void 0!==(d=e.set(a,c,b))?d:a[b]=c:e&&"get"in e&&null!==(d=e.get(a,b))?d:a[b]},propHooks:{tabIndex:{get:function(a){var b=m.find.attr(a,"tabindex");return b?parseInt(b,10):sc.test(a.nodeName)||tc.test(a.nodeName)&&a.href?0:-1}}}}),k.hrefNormalized||m.each(["href","src"],function(a,b){m.propHooks[b]={get:function(a){return a.getAttribute(b,4)}}}),k.optSelected||(m.propHooks.selected={get:function(a){var b=a.parentNode;return b&&(b.selectedIndex,b.parentNode&&b.parentNode.selectedIndex),null}}),m.each(["tabIndex","readOnly","maxLength","cellSpacing","cellPadding","rowSpan","colSpan","useMap","frameBorder","contentEditable"],function(){m.propFix[this.toLowerCase()]=this}),k.enctype||(m.propFix.enctype="encoding");var uc=/[\t\r\n\f]/g;m.fn.extend({addClass:function(a){var b,c,d,e,f,g,h=0,i=this.length,j="string"==typeof a&&a;if(m.isFunction(a))return this.each(function(b){m(this).addClass(a.call(this,b,this.className))});if(j)for(b=(a||"").match(E)||[];i>h;h++)if(c=this[h],d=1===c.nodeType&&(c.className?(" "+c.className+" ").replace(uc," "):" ")){f=0;while(e=b[f++])d.indexOf(" "+e+" ")<0&&(d+=e+" ");g=m.trim(d),c.className!==g&&(c.className=g)}return this},removeClass:function(a){var b,c,d,e,f,g,h=0,i=this.length,j=0===arguments.length||"string"==typeof a&&a;if(m.isFunction(a))return this.each(function(b){m(this).removeClass(a.call(this,b,this.className))});if(j)for(b=(a||"").match(E)||[];i>h;h++)if(c=this[h],d=1===c.nodeType&&(c.className?(" "+c.className+" ").replace(uc," "):"")){f=0;while(e=b[f++])while(d.indexOf(" "+e+" ")>=0)d=d.replace(" "+e+" "," ");g=a?m.trim(d):"",c.className!==g&&(c.className=g)}return this},toggleClass:function(a,b){var c=typeof a;return"boolean"==typeof b&&"string"===c?b?this.addClass(a):this.removeClass(a):this.each(m.isFunction(a)?function(c){m(this).toggleClass(a.call(this,c,this.className,b),b)}:function(){if("string"===c){var b,d=0,e=m(this),f=a.match(E)||[];while(b=f[d++])e.hasClass(b)?e.removeClass(b):e.addClass(b)}else(c===K||"boolean"===c)&&(this.className&&m._data(this,"__className__",this.className),this.className=this.className||a===!1?"":m._data(this,"__className__")||"")})},hasClass:function(a){for(var b=" "+a+" ",c=0,d=this.length;d>c;c++)if(1===this[c].nodeType&&(" "+this[c].className+" ").replace(uc," ").indexOf(b)>=0)return!0;return!1}}),m.each("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error contextmenu".split(" "),function(a,b){m.fn[b]=function(a,c){return arguments.length>0?this.on(b,null,a,c):this.trigger(b)}}),m.fn.extend({hover:function(a,b){return this.mouseenter(a).mouseleave(b||a)},bind:function(a,b,c){return this.on(a,null,b,c)},unbind:function(a,b){return this.off(a,null,b)},delegate:function(a,b,c,d){return this.on(b,a,c,d)},undelegate:function(a,b,c){return 1===arguments.length?this.off(a,"**"):this.off(b,a||"**",c)}});var vc=m.now(),wc=/\?/,xc=/(,)|(\[|{)|(}|])|"(?:[^"\\\r\n]|\\["\\\/bfnrt]|\\u[\da-fA-F]{4})*"\s*:?|true|false|null|-?(?!0\d)\d+(?:\.\d+|)(?:[eE][+-]?\d+|)/g;m.parseJSON=function(b){if(a.JSON&&a.JSON.parse)return a.JSON.parse(b+"");var c,d=null,e=m.trim(b+"");return e&&!m.trim(e.replace(xc,function(a,b,e,f){return c&&b&&(d=0),0===d?a:(c=e||b,d+=!f-!e,"")}))?Function("return "+e)():m.error("Invalid JSON: "+b)},m.parseXML=function(b){var c,d;if(!b||"string"!=typeof b)return null;try{a.DOMParser?(d=new DOMParser,c=d.parseFromString(b,"text/xml")):(c=new ActiveXObject("Microsoft.XMLDOM"),c.async="false",c.loadXML(b))}catch(e){c=void 0}return c&&c.documentElement&&!c.getElementsByTagName("parsererror").length||m.error("Invalid XML: "+b),c};var yc,zc,Ac=/#.*$/,Bc=/([?&])_=[^&]*/,Cc=/^(.*?):[ \t]*([^\r\n]*)\r?$/gm,Dc=/^(?:about|app|app-storage|.+-extension|file|res|widget):$/,Ec=/^(?:GET|HEAD)$/,Fc=/^\/\//,Gc=/^([\w.+-]+:)(?:\/\/(?:[^\/?#]*@|)([^\/?#:]*)(?::(\d+)|)|)/,Hc={},Ic={},Jc="*/".concat("*");try{zc=location.href}catch(Kc){zc=y.createElement("a"),zc.href="",zc=zc.href}yc=Gc.exec(zc.toLowerCase())||[];function Lc(a){return function(b,c){"string"!=typeof b&&(c=b,b="*");var d,e=0,f=b.toLowerCase().match(E)||[];if(m.isFunction(c))while(d=f[e++])"+"===d.charAt(0)?(d=d.slice(1)||"*",(a[d]=a[d]||[]).unshift(c)):(a[d]=a[d]||[]).push(c)}}function Mc(a,b,c,d){var e={},f=a===Ic;function g(h){var i;return e[h]=!0,m.each(a[h]||[],function(a,h){var j=h(b,c,d);return"string"!=typeof j||f||e[j]?f?!(i=j):void 0:(b.dataTypes.unshift(j),g(j),!1)}),i}return g(b.dataTypes[0])||!e["*"]&&g("*")}function Nc(a,b){var c,d,e=m.ajaxSettings.flatOptions||{};for(d in b)void 0!==b[d]&&((e[d]?a:c||(c={}))[d]=b[d]);return c&&m.extend(!0,a,c),a}function Oc(a,b,c){var d,e,f,g,h=a.contents,i=a.dataTypes;while("*"===i[0])i.shift(),void 0===e&&(e=a.mimeType||b.getResponseHeader("Content-Type"));if(e)for(g in h)if(h[g]&&h[g].test(e)){i.unshift(g);break}if(i[0]in c)f=i[0];else{for(g in c){if(!i[0]||a.converters[g+" "+i[0]]){f=g;break}d||(d=g)}f=f||d}return f?(f!==i[0]&&i.unshift(f),c[f]):void 0}function Pc(a,b,c,d){var e,f,g,h,i,j={},k=a.dataTypes.slice();if(k[1])for(g in a.converters)j[g.toLowerCase()]=a.converters[g];f=k.shift();while(f)if(a.responseFields[f]&&(c[a.responseFields[f]]=b),!i&&d&&a.dataFilter&&(b=a.dataFilter(b,a.dataType)),i=f,f=k.shift())if("*"===f)f=i;else if("*"!==i&&i!==f){if(g=j[i+" "+f]||j["* "+f],!g)for(e in j)if(h=e.split(" "),h[1]===f&&(g=j[i+" "+h[0]]||j["* "+h[0]])){g===!0?g=j[e]:j[e]!==!0&&(f=h[0],k.unshift(h[1]));break}if(g!==!0)if(g&&a["throws"])b=g(b);else try{b=g(b)}catch(l){return{state:"parsererror",error:g?l:"No conversion from "+i+" to "+f}}}return{state:"success",data:b}}m.extend({active:0,lastModified:{},etag:{},ajaxSettings:{url:zc,type:"GET",isLocal:Dc.test(yc[1]),global:!0,processData:!0,async:!0,contentType:"application/x-www-form-urlencoded; charset=UTF-8",accepts:{"*":Jc,text:"text/plain",html:"text/html",xml:"application/xml, text/xml",json:"application/json, text/javascript"},contents:{xml:/xml/,html:/html/,json:/json/},responseFields:{xml:"responseXML",text:"responseText",json:"responseJSON"},converters:{"* text":String,"text html":!0,"text json":m.parseJSON,"text xml":m.parseXML},flatOptions:{url:!0,context:!0}},ajaxSetup:function(a,b){return b?Nc(Nc(a,m.ajaxSettings),b):Nc(m.ajaxSettings,a)},ajaxPrefilter:Lc(Hc),ajaxTransport:Lc(Ic),ajax:function(a,b){"object"==typeof a&&(b=a,a=void 0),b=b||{};var c,d,e,f,g,h,i,j,k=m.ajaxSetup({},b),l=k.context||k,n=k.context&&(l.nodeType||l.jquery)?m(l):m.event,o=m.Deferred(),p=m.Callbacks("once memory"),q=k.statusCode||{},r={},s={},t=0,u="canceled",v={readyState:0,getResponseHeader:function(a){var b;if(2===t){if(!j){j={};while(b=Cc.exec(f))j[b[1].toLowerCase()]=b[2]}b=j[a.toLowerCase()]}return null==b?null:b},getAllResponseHeaders:function(){return 2===t?f:null},setRequestHeader:function(a,b){var c=a.toLowerCase();return t||(a=s[c]=s[c]||a,r[a]=b),this},overrideMimeType:function(a){return t||(k.mimeType=a),this},statusCode:function(a){var b;if(a)if(2>t)for(b in a)q[b]=[q[b],a[b]];else v.always(a[v.status]);return this},abort:function(a){var b=a||u;return i&&i.abort(b),x(0,b),this}};if(o.promise(v).complete=p.add,v.success=v.done,v.error=v.fail,k.url=((a||k.url||zc)+"").replace(Ac,"").replace(Fc,yc[1]+"//"),k.type=b.method||b.type||k.method||k.type,k.dataTypes=m.trim(k.dataType||"*").toLowerCase().match(E)||[""],null==k.crossDomain&&(c=Gc.exec(k.url.toLowerCase()),k.crossDomain=!(!c||c[1]===yc[1]&&c[2]===yc[2]&&(c[3]||("http:"===c[1]?"80":"443"))===(yc[3]||("http:"===yc[1]?"80":"443")))),k.data&&k.processData&&"string"!=typeof k.data&&(k.data=m.param(k.data,k.traditional)),Mc(Hc,k,b,v),2===t)return v;h=k.global,h&&0===m.active++&&m.event.trigger("ajaxStart"),k.type=k.type.toUpperCase(),k.hasContent=!Ec.test(k.type),e=k.url,k.hasContent||(k.data&&(e=k.url+=(wc.test(e)?"&":"?")+k.data,delete k.data),k.cache===!1&&(k.url=Bc.test(e)?e.replace(Bc,"$1_="+vc++):e+(wc.test(e)?"&":"?")+"_="+vc++)),k.ifModified&&(m.lastModified[e]&&v.setRequestHeader("If-Modified-Since",m.lastModified[e]),m.etag[e]&&v.setRequestHeader("If-None-Match",m.etag[e])),(k.data&&k.hasContent&&k.contentType!==!1||b.contentType)&&v.setRequestHeader("Content-Type",k.contentType),v.setRequestHeader("Accept",k.dataTypes[0]&&k.accepts[k.dataTypes[0]]?k.accepts[k.dataTypes[0]]+("*"!==k.dataTypes[0]?", "+Jc+"; q=0.01":""):k.accepts["*"]);for(d in k.headers)v.setRequestHeader(d,k.headers[d]);if(k.beforeSend&&(k.beforeSend.call(l,v,k)===!1||2===t))return v.abort();u="abort";for(d in{success:1,error:1,complete:1})v[d](k[d]);if(i=Mc(Ic,k,b,v)){v.readyState=1,h&&n.trigger("ajaxSend",[v,k]),k.async&&k.timeout>0&&(g=setTimeout(function(){v.abort("timeout")},k.timeout));try{t=1,i.send(r,x)}catch(w){if(!(2>t))throw w;x(-1,w)}}else x(-1,"No Transport");function x(a,b,c,d){var j,r,s,u,w,x=b;2!==t&&(t=2,g&&clearTimeout(g),i=void 0,f=d||"",v.readyState=a>0?4:0,j=a>=200&&300>a||304===a,c&&(u=Oc(k,v,c)),u=Pc(k,u,v,j),j?(k.ifModified&&(w=v.getResponseHeader("Last-Modified"),w&&(m.lastModified[e]=w),w=v.getResponseHeader("etag"),w&&(m.etag[e]=w)),204===a||"HEAD"===k.type?x="nocontent":304===a?x="notmodified":(x=u.state,r=u.data,s=u.error,j=!s)):(s=x,(a||!x)&&(x="error",0>a&&(a=0))),v.status=a,v.statusText=(b||x)+"",j?o.resolveWith(l,[r,x,v]):o.rejectWith(l,[v,x,s]),v.statusCode(q),q=void 0,h&&n.trigger(j?"ajaxSuccess":"ajaxError",[v,k,j?r:s]),p.fireWith(l,[v,x]),h&&(n.trigger("ajaxComplete",[v,k]),--m.active||m.event.trigger("ajaxStop")))}return v},getJSON:function(a,b,c){return m.get(a,b,c,"json")},getScript:function(a,b){return m.get(a,void 0,b,"script")}}),m.each(["get","post"],function(a,b){m[b]=function(a,c,d,e){return m.isFunction(c)&&(e=e||d,d=c,c=void 0),m.ajax({url:a,type:b,dataType:e,data:c,success:d})}}),m.each(["ajaxStart","ajaxStop","ajaxComplete","ajaxError","ajaxSuccess","ajaxSend"],function(a,b){m.fn[b]=function(a){return this.on(b,a)}}),m._evalUrl=function(a){return m.ajax({url:a,type:"GET",dataType:"script",async:!1,global:!1,"throws":!0})},m.fn.extend({wrapAll:function(a){if(m.isFunction(a))return this.each(function(b){m(this).wrapAll(a.call(this,b))});if(this[0]){var b=m(a,this[0].ownerDocument).eq(0).clone(!0);this[0].parentNode&&b.insertBefore(this[0]),b.map(function(){var a=this;while(a.firstChild&&1===a.firstChild.nodeType)a=a.firstChild;return a}).append(this)}return this},wrapInner:function(a){return this.each(m.isFunction(a)?function(b){m(this).wrapInner(a.call(this,b))}:function(){var b=m(this),c=b.contents();c.length?c.wrapAll(a):b.append(a)})},wrap:function(a){var b=m.isFunction(a);return this.each(function(c){m(this).wrapAll(b?a.call(this,c):a)})},unwrap:function(){return this.parent().each(function(){m.nodeName(this,"body")||m(this).replaceWith(this.childNodes)}).end()}}),m.expr.filters.hidden=function(a){return a.offsetWidth<=0&&a.offsetHeight<=0||!k.reliableHiddenOffsets()&&"none"===(a.style&&a.style.display||m.css(a,"display"))},m.expr.filters.visible=function(a){return!m.expr.filters.hidden(a)};var Qc=/%20/g,Rc=/\[\]$/,Sc=/\r?\n/g,Tc=/^(?:submit|button|image|reset|file)$/i,Uc=/^(?:input|select|textarea|keygen)/i;function Vc(a,b,c,d){var e;if(m.isArray(b))m.each(b,function(b,e){c||Rc.test(a)?d(a,e):Vc(a+"["+("object"==typeof e?b:"")+"]",e,c,d)});else if(c||"object"!==m.type(b))d(a,b);else for(e in b)Vc(a+"["+e+"]",b[e],c,d)}m.param=function(a,b){var c,d=[],e=function(a,b){b=m.isFunction(b)?b():null==b?"":b,d[d.length]=encodeURIComponent(a)+"="+encodeURIComponent(b)};if(void 0===b&&(b=m.ajaxSettings&&m.ajaxSettings.traditional),m.isArray(a)||a.jquery&&!m.isPlainObject(a))m.each(a,function(){e(this.name,this.value)});else for(c in a)Vc(c,a[c],b,e);return d.join("&").replace(Qc,"+")},m.fn.extend({serialize:function(){return m.param(this.serializeArray())},serializeArray:function(){return this.map(function(){var a=m.prop(this,"elements");return a?m.makeArray(a):this}).filter(function(){var a=this.type;return this.name&&!m(this).is(":disabled")&&Uc.test(this.nodeName)&&!Tc.test(a)&&(this.checked||!W.test(a))}).map(function(a,b){var c=m(this).val();return null==c?null:m.isArray(c)?m.map(c,function(a){return{name:b.name,value:a.replace(Sc,"\r\n")}}):{name:b.name,value:c.replace(Sc,"\r\n")}}).get()}}),m.ajaxSettings.xhr=void 0!==a.ActiveXObject?function(){return!this.isLocal&&/^(get|post|head|put|delete|options)$/i.test(this.type)&&Zc()||$c()}:Zc;var Wc=0,Xc={},Yc=m.ajaxSettings.xhr();a.ActiveXObject&&m(a).on("unload",function(){for(var a in Xc)Xc[a](void 0,!0)}),k.cors=!!Yc&&"withCredentials"in Yc,Yc=k.ajax=!!Yc,Yc&&m.ajaxTransport(function(a){if(!a.crossDomain||k.cors){var b;return{send:function(c,d){var e,f=a.xhr(),g=++Wc;if(f.open(a.type,a.url,a.async,a.username,a.password),a.xhrFields)for(e in a.xhrFields)f[e]=a.xhrFields[e];a.mimeType&&f.overrideMimeType&&f.overrideMimeType(a.mimeType),a.crossDomain||c["X-Requested-With"]||(c["X-Requested-With"]="XMLHttpRequest");for(e in c)void 0!==c[e]&&f.setRequestHeader(e,c[e]+"");f.send(a.hasContent&&a.data||null),b=function(c,e){var h,i,j;if(b&&(e||4===f.readyState))if(delete Xc[g],b=void 0,f.onreadystatechange=m.noop,e)4!==f.readyState&&f.abort();else{j={},h=f.status,"string"==typeof f.responseText&&(j.text=f.responseText);try{i=f.statusText}catch(k){i=""}h||!a.isLocal||a.crossDomain?1223===h&&(h=204):h=j.text?200:404}j&&d(h,i,j,f.getAllResponseHeaders())},a.async?4===f.readyState?setTimeout(b):f.onreadystatechange=Xc[g]=b:b()},abort:function(){b&&b(void 0,!0)}}}});function Zc(){try{return new a.XMLHttpRequest}catch(b){}}function $c(){try{return new a.ActiveXObject("Microsoft.XMLHTTP")}catch(b){}}m.ajaxSetup({accepts:{script:"text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"},contents:{script:/(?:java|ecma)script/},converters:{"text script":function(a){return m.globalEval(a),a}}}),m.ajaxPrefilter("script",function(a){void 0===a.cache&&(a.cache=!1),a.crossDomain&&(a.type="GET",a.global=!1)}),m.ajaxTransport("script",function(a){if(a.crossDomain){var b,c=y.head||m("head")[0]||y.documentElement;return{send:function(d,e){b=y.createElement("script"),b.async=!0,a.scriptCharset&&(b.charset=a.scriptCharset),b.src=a.url,b.onload=b.onreadystatechange=function(a,c){(c||!b.readyState||/loaded|complete/.test(b.readyState))&&(b.onload=b.onreadystatechange=null,b.parentNode&&b.parentNode.removeChild(b),b=null,c||e(200,"success"))},c.insertBefore(b,c.firstChild)},abort:function(){b&&b.onload(void 0,!0)}}}});var _c=[],ad=/(=)\?(?=&|$)|\?\?/;m.ajaxSetup({jsonp:"callback",jsonpCallback:function(){var a=_c.pop()||m.expando+"_"+vc++;return this[a]=!0,a}}),m.ajaxPrefilter("json jsonp",function(b,c,d){var e,f,g,h=b.jsonp!==!1&&(ad.test(b.url)?"url":"string"==typeof b.data&&!(b.contentType||"").indexOf("application/x-www-form-urlencoded")&&ad.test(b.data)&&"data");return h||"jsonp"===b.dataTypes[0]?(e=b.jsonpCallback=m.isFunction(b.jsonpCallback)?b.jsonpCallback():b.jsonpCallback,h?b[h]=b[h].replace(ad,"$1"+e):b.jsonp!==!1&&(b.url+=(wc.test(b.url)?"&":"?")+b.jsonp+"="+e),b.converters["script json"]=function(){return g||m.error(e+" was not called"),g[0]},b.dataTypes[0]="json",f=a[e],a[e]=function(){g=arguments},d.always(function(){a[e]=f,b[e]&&(b.jsonpCallback=c.jsonpCallback,_c.push(e)),g&&m.isFunction(f)&&f(g[0]),g=f=void 0}),"script"):void 0}),m.parseHTML=function(a,b,c){if(!a||"string"!=typeof a)return null;"boolean"==typeof b&&(c=b,b=!1),b=b||y;var d=u.exec(a),e=!c&&[];return d?[b.createElement(d[1])]:(d=m.buildFragment([a],b,e),e&&e.length&&m(e).remove(),m.merge([],d.childNodes))};var bd=m.fn.load;m.fn.load=function(a,b,c){if("string"!=typeof a&&bd)return bd.apply(this,arguments);var d,e,f,g=this,h=a.indexOf(" ");return h>=0&&(d=m.trim(a.slice(h,a.length)),a=a.slice(0,h)),m.isFunction(b)?(c=b,b=void 0):b&&"object"==typeof b&&(f="POST"),g.length>0&&m.ajax({url:a,type:f,dataType:"html",data:b}).done(function(a){e=arguments,g.html(d?m("<div>").append(m.parseHTML(a)).find(d):a)}).complete(c&&function(a,b){g.each(c,e||[a.responseText,b,a])}),this},m.expr.filters.animated=function(a){return m.grep(m.timers,function(b){return a===b.elem}).length};var cd=a.document.documentElement;function dd(a){return m.isWindow(a)?a:9===a.nodeType?a.defaultView||a.parentWindow:!1}m.offset={setOffset:function(a,b,c){var d,e,f,g,h,i,j,k=m.css(a,"position"),l=m(a),n={};"static"===k&&(a.style.position="relative"),h=l.offset(),f=m.css(a,"top"),i=m.css(a,"left"),j=("absolute"===k||"fixed"===k)&&m.inArray("auto",[f,i])>-1,j?(d=l.position(),g=d.top,e=d.left):(g=parseFloat(f)||0,e=parseFloat(i)||0),m.isFunction(b)&&(b=b.call(a,c,h)),null!=b.top&&(n.top=b.top-h.top+g),null!=b.left&&(n.left=b.left-h.left+e),"using"in b?b.using.call(a,n):l.css(n)}},m.fn.extend({offset:function(a){if(arguments.length)return void 0===a?this:this.each(function(b){m.offset.setOffset(this,a,b)});var b,c,d={top:0,left:0},e=this[0],f=e&&e.ownerDocument;if(f)return b=f.documentElement,m.contains(b,e)?(typeof e.getBoundingClientRect!==K&&(d=e.getBoundingClientRect()),c=dd(f),{top:d.top+(c.pageYOffset||b.scrollTop)-(b.clientTop||0),left:d.left+(c.pageXOffset||b.scrollLeft)-(b.clientLeft||0)}):d},position:function(){if(this[0]){var a,b,c={top:0,left:0},d=this[0];return"fixed"===m.css(d,"position")?b=d.getBoundingClientRect():(a=this.offsetParent(),b=this.offset(),m.nodeName(a[0],"html")||(c=a.offset()),c.top+=m.css(a[0],"borderTopWidth",!0),c.left+=m.css(a[0],"borderLeftWidth",!0)),{top:b.top-c.top-m.css(d,"marginTop",!0),left:b.left-c.left-m.css(d,"marginLeft",!0)}}},offsetParent:function(){return this.map(function(){var a=this.offsetParent||cd;while(a&&!m.nodeName(a,"html")&&"static"===m.css(a,"position"))a=a.offsetParent;return a||cd})}}),m.each({scrollLeft:"pageXOffset",scrollTop:"pageYOffset"},function(a,b){var c=/Y/.test(b);m.fn[a]=function(d){return V(this,function(a,d,e){var f=dd(a);return void 0===e?f?b in f?f[b]:f.document.documentElement[d]:a[d]:void(f?f.scrollTo(c?m(f).scrollLeft():e,c?e:m(f).scrollTop()):a[d]=e)},a,d,arguments.length,null)}}),m.each(["top","left"],function(a,b){m.cssHooks[b]=Lb(k.pixelPosition,function(a,c){return c?(c=Jb(a,b),Hb.test(c)?m(a).position()[b]+"px":c):void 0})}),m.each({Height:"height",Width:"width"},function(a,b){m.each({padding:"inner"+a,content:b,"":"outer"+a},function(c,d){m.fn[d]=function(d,e){var f=arguments.length&&(c||"boolean"!=typeof d),g=c||(d===!0||e===!0?"margin":"border");return V(this,function(b,c,d){var e;return m.isWindow(b)?b.document.documentElement["client"+a]:9===b.nodeType?(e=b.documentElement,Math.max(b.body["scroll"+a],e["scroll"+a],b.body["offset"+a],e["offset"+a],e["client"+a])):void 0===d?m.css(b,c,g):m.style(b,c,d,g)},b,f?d:void 0,f,null)}})}),m.fn.size=function(){return this.length},m.fn.andSelf=m.fn.addBack,"function"==typeof define&&define.amd&&define("jquery",[],function(){return m});var ed=a.jQuery,fd=a.$;return m.noConflict=function(b){return a.$===m&&(a.$=fd),b&&a.jQuery===m&&(a.jQuery=ed),m},typeof b===K&&(a.jQuery=a.$=m),m});

/* Modernizr 2.8.3 (Custom Build) | MIT & BSD
 * Build: http://modernizr.com/download/#-csstransforms3d-csstransitions-touch-shiv-cssclasses-prefixed-teststyles-testprop-testallprops-prefixes-domprefixes-load
 */
;window.Modernizr=function(a,b,c){function z(a){j.cssText=a}function A(a,b){return z(m.join(a+";")+(b||""))}function B(a,b){return typeof a===b}function C(a,b){return!!~(""+a).indexOf(b)}function D(a,b){for(var d in a){var e=a[d];if(!C(e,"-")&&j[e]!==c)return b=="pfx"?e:!0}return!1}function E(a,b,d){for(var e in a){var f=b[a[e]];if(f!==c)return d===!1?a[e]:B(f,"function")?f.bind(d||b):f}return!1}function F(a,b,c){var d=a.charAt(0).toUpperCase()+a.slice(1),e=(a+" "+o.join(d+" ")+d).split(" ");return B(b,"string")||B(b,"undefined")?D(e,b):(e=(a+" "+p.join(d+" ")+d).split(" "),E(e,b,c))}var d="2.8.3",e={},f=!0,g=b.documentElement,h="modernizr",i=b.createElement(h),j=i.style,k,l={}.toString,m=" -webkit- -moz- -o- -ms- ".split(" "),n="Webkit Moz O ms",o=n.split(" "),p=n.toLowerCase().split(" "),q={},r={},s={},t=[],u=t.slice,v,w=function(a,c,d,e){var f,i,j,k,l=b.createElement("div"),m=b.body,n=m||b.createElement("body");if(parseInt(d,10))while(d--)j=b.createElement("div"),j.id=e?e[d]:h+(d+1),l.appendChild(j);return f=["&#173;",'<style id="s',h,'">',a,"</style>"].join(""),l.id=h,(m?l:n).innerHTML+=f,n.appendChild(l),m||(n.style.background="",n.style.overflow="hidden",k=g.style.overflow,g.style.overflow="hidden",g.appendChild(n)),i=c(l,a),m?l.parentNode.removeChild(l):(n.parentNode.removeChild(n),g.style.overflow=k),!!i},x={}.hasOwnProperty,y;!B(x,"undefined")&&!B(x.call,"undefined")?y=function(a,b){return x.call(a,b)}:y=function(a,b){return b in a&&B(a.constructor.prototype[b],"undefined")},Function.prototype.bind||(Function.prototype.bind=function(b){var c=this;if(typeof c!="function")throw new TypeError;var d=u.call(arguments,1),e=function(){if(this instanceof e){var a=function(){};a.prototype=c.prototype;var f=new a,g=c.apply(f,d.concat(u.call(arguments)));return Object(g)===g?g:f}return c.apply(b,d.concat(u.call(arguments)))};return e}),q.touch=function(){var c;return"ontouchstart"in a||a.DocumentTouch&&b instanceof DocumentTouch?c=!0:w(["@media (",m.join("touch-enabled),("),h,")","{#modernizr{top:9px;position:absolute}}"].join(""),function(a){c=a.offsetTop===9}),c},q.csstransforms3d=function(){var a=!!F("perspective");return a&&"webkitPerspective"in g.style&&w("@media (transform-3d),(-webkit-transform-3d){#modernizr{left:9px;position:absolute;height:3px;}}",function(b,c){a=b.offsetLeft===9&&b.offsetHeight===3}),a},q.csstransitions=function(){return F("transition")};for(var G in q)y(q,G)&&(v=G.toLowerCase(),e[v]=q[G](),t.push((e[v]?"":"no-")+v));return e.addTest=function(a,b){if(typeof a=="object")for(var d in a)y(a,d)&&e.addTest(d,a[d]);else{a=a.toLowerCase();if(e[a]!==c)return e;b=typeof b=="function"?b():b,typeof f!="undefined"&&f&&(g.className+=" "+(b?"":"no-")+a),e[a]=b}return e},z(""),i=k=null,function(a,b){function l(a,b){var c=a.createElement("p"),d=a.getElementsByTagName("head")[0]||a.documentElement;return c.innerHTML="x<style>"+b+"</style>",d.insertBefore(c.lastChild,d.firstChild)}function m(){var a=s.elements;return typeof a=="string"?a.split(" "):a}function n(a){var b=j[a[h]];return b||(b={},i++,a[h]=i,j[i]=b),b}function o(a,c,d){c||(c=b);if(k)return c.createElement(a);d||(d=n(c));var g;return d.cache[a]?g=d.cache[a].cloneNode():f.test(a)?g=(d.cache[a]=d.createElem(a)).cloneNode():g=d.createElem(a),g.canHaveChildren&&!e.test(a)&&!g.tagUrn?d.frag.appendChild(g):g}function p(a,c){a||(a=b);if(k)return a.createDocumentFragment();c=c||n(a);var d=c.frag.cloneNode(),e=0,f=m(),g=f.length;for(;e<g;e++)d.createElement(f[e]);return d}function q(a,b){b.cache||(b.cache={},b.createElem=a.createElement,b.createFrag=a.createDocumentFragment,b.frag=b.createFrag()),a.createElement=function(c){return s.shivMethods?o(c,a,b):b.createElem(c)},a.createDocumentFragment=Function("h,f","return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&("+m().join().replace(/[\w\-]+/g,function(a){return b.createElem(a),b.frag.createElement(a),'c("'+a+'")'})+");return n}")(s,b.frag)}function r(a){a||(a=b);var c=n(a);return s.shivCSS&&!g&&!c.hasCSS&&(c.hasCSS=!!l(a,"article,aside,dialog,figcaption,figure,footer,header,hgroup,main,nav,section{display:block}mark{background:#FF0;color:#000}template{display:none}")),k||q(a,c),a}var c="3.7.0",d=a.html5||{},e=/^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,f=/^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,g,h="_html5shiv",i=0,j={},k;(function(){try{var a=b.createElement("a");a.innerHTML="<xyz></xyz>",g="hidden"in a,k=a.childNodes.length==1||function(){b.createElement("a");var a=b.createDocumentFragment();return typeof a.cloneNode=="undefined"||typeof a.createDocumentFragment=="undefined"||typeof a.createElement=="undefined"}()}catch(c){g=!0,k=!0}})();var s={elements:d.elements||"abbr article aside audio bdi canvas data datalist details dialog figcaption figure footer header hgroup main mark meter nav output progress section summary template time video",version:c,shivCSS:d.shivCSS!==!1,supportsUnknownElements:k,shivMethods:d.shivMethods!==!1,type:"default",shivDocument:r,createElement:o,createDocumentFragment:p};a.html5=s,r(b)}(this,b),e._version=d,e._prefixes=m,e._domPrefixes=p,e._cssomPrefixes=o,e.testProp=function(a){return D([a])},e.testAllProps=F,e.testStyles=w,e.prefixed=function(a,b,c){return b?F(a,b,c):F(a,"pfx")},g.className=g.className.replace(/(^|\s)no-js(\s|$)/,"$1$2")+(f?" js "+t.join(" "):""),e}(this,this.document),function(a,b,c){function d(a){return"[object Function]"==o.call(a)}function e(a){return"string"==typeof a}function f(){}function g(a){return!a||"loaded"==a||"complete"==a||"uninitialized"==a}function h(){var a=p.shift();q=1,a?a.t?m(function(){("c"==a.t?B.injectCss:B.injectJs)(a.s,0,a.a,a.x,a.e,1)},0):(a(),h()):q=0}function i(a,c,d,e,f,i,j){function k(b){if(!o&&g(l.readyState)&&(u.r=o=1,!q&&h(),l.onload=l.onreadystatechange=null,b)){"img"!=a&&m(function(){t.removeChild(l)},50);for(var d in y[c])y[c].hasOwnProperty(d)&&y[c][d].onload()}}var j=j||B.errorTimeout,l=b.createElement(a),o=0,r=0,u={t:d,s:c,e:f,a:i,x:j};1===y[c]&&(r=1,y[c]=[]),"object"==a?l.data=c:(l.src=c,l.type=a),l.width=l.height="0",l.onerror=l.onload=l.onreadystatechange=function(){k.call(this,r)},p.splice(e,0,u),"img"!=a&&(r||2===y[c]?(t.insertBefore(l,s?null:n),m(k,j)):y[c].push(l))}function j(a,b,c,d,f){return q=0,b=b||"j",e(a)?i("c"==b?v:u,a,b,this.i++,c,d,f):(p.splice(this.i++,0,a),1==p.length&&h()),this}function k(){var a=B;return a.loader={load:j,i:0},a}var l=b.documentElement,m=a.setTimeout,n=b.getElementsByTagName("script")[0],o={}.toString,p=[],q=0,r="MozAppearance"in l.style,s=r&&!!b.createRange().compareNode,t=s?l:n.parentNode,l=a.opera&&"[object Opera]"==o.call(a.opera),l=!!b.attachEvent&&!l,u=r?"object":l?"script":"img",v=l?"script":u,w=Array.isArray||function(a){return"[object Array]"==o.call(a)},x=[],y={},z={timeout:function(a,b){return b.length&&(a.timeout=b[0]),a}},A,B;B=function(a){function b(a){var a=a.split("!"),b=x.length,c=a.pop(),d=a.length,c={url:c,origUrl:c,prefixes:a},e,f,g;for(f=0;f<d;f++)g=a[f].split("="),(e=z[g.shift()])&&(c=e(c,g));for(f=0;f<b;f++)c=x[f](c);return c}function g(a,e,f,g,h){var i=b(a),j=i.autoCallback;i.url.split(".").pop().split("?").shift(),i.bypass||(e&&(e=d(e)?e:e[a]||e[g]||e[a.split("/").pop().split("?")[0]]),i.instead?i.instead(a,e,f,g,h):(y[i.url]?i.noexec=!0:y[i.url]=1,f.load(i.url,i.forceCSS||!i.forceJS&&"css"==i.url.split(".").pop().split("?").shift()?"c":c,i.noexec,i.attrs,i.timeout),(d(e)||d(j))&&f.load(function(){k(),e&&e(i.origUrl,h,g),j&&j(i.origUrl,h,g),y[i.url]=2})))}function h(a,b){function c(a,c){if(a){if(e(a))c||(j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}),g(a,j,b,0,h);else if(Object(a)===a)for(n in m=function(){var b=0,c;for(c in a)a.hasOwnProperty(c)&&b++;return b}(),a)a.hasOwnProperty(n)&&(!c&&!--m&&(d(j)?j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}:j[n]=function(a){return function(){var b=[].slice.call(arguments);a&&a.apply(this,b),l()}}(k[n])),g(a[n],j,b,n,h))}else!c&&l()}var h=!!a.test,i=a.load||a.both,j=a.callback||f,k=j,l=a.complete||f,m,n;c(h?a.yep:a.nope,!!i),i&&c(i)}var i,j,l=this.yepnope.loader;if(e(a))g(a,0,l,0);else if(w(a))for(i=0;i<a.length;i++)j=a[i],e(j)?g(j,0,l,0):w(j)?B(j):Object(j)===j&&h(j,l);else Object(a)===a&&h(a,l)},B.addPrefix=function(a,b){z[a]=b},B.addFilter=function(a){x.push(a)},B.errorTimeout=1e4,null==b.readyState&&b.addEventListener&&(b.readyState="loading",b.addEventListener("DOMContentLoaded",A=function(){b.removeEventListener("DOMContentLoaded",A,0),b.readyState="complete"},0)),a.yepnope=k(),a.yepnope.executeStack=h,a.yepnope.injectJs=function(a,c,d,e,i,j){var k=b.createElement("script"),l,o,e=e||B.errorTimeout;k.src=a;for(o in d)k.setAttribute(o,d[o]);c=j?h:c||f,k.onreadystatechange=k.onload=function(){!l&&g(k.readyState)&&(l=1,c(),k.onload=k.onreadystatechange=null)},m(function(){l||(l=1,c(1))},e),i?k.onload():n.parentNode.insertBefore(k,n)},a.yepnope.injectCss=function(a,c,d,e,g,i){var e=b.createElement("link"),j,c=i?h:c||f;e.href=a,e.rel="stylesheet",e.type="text/css";for(j in d)e.setAttribute(j,d[j]);g||(n.parentNode.insertBefore(e,n),m(c,0))}}(this,document),Modernizr.load=function(){yepnope.apply(window,[].slice.call(arguments,0))};
/*!
 * Bootstrap v3.3.7 (http://getbootstrap.com)
 * Copyright 2011-2016 Twitter, Inc.
 * Licensed under the MIT license
 */
if("undefined"==typeof jQuery)throw new Error("Bootstrap's JavaScript requires jQuery");+function(a){"use strict";var b=a.fn.jquery.split(" ")[0].split(".");if(b[0]<2&&b[1]<9||1==b[0]&&9==b[1]&&b[2]<1||b[0]>3)throw new Error("Bootstrap's JavaScript requires jQuery version 1.9.1 or higher, but lower than version 4")}(jQuery),+function(a){"use strict";function b(){var a=document.createElement("bootstrap"),b={WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",OTransition:"oTransitionEnd otransitionend",transition:"transitionend"};for(var c in b)if(void 0!==a.style[c])return{end:b[c]};return!1}a.fn.emulateTransitionEnd=function(b){var c=!1,d=this;a(this).one("bsTransitionEnd",function(){c=!0});var e=function(){c||a(d).trigger(a.support.transition.end)};return setTimeout(e,b),this},a(function(){a.support.transition=b(),a.support.transition&&(a.event.special.bsTransitionEnd={bindType:a.support.transition.end,delegateType:a.support.transition.end,handle:function(b){if(a(b.target).is(this))return b.handleObj.handler.apply(this,arguments)}})})}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var c=a(this),e=c.data("bs.alert");e||c.data("bs.alert",e=new d(this)),"string"==typeof b&&e[b].call(c)})}var c='[data-dismiss="alert"]',d=function(b){a(b).on("click",c,this.close)};d.VERSION="3.3.7",d.TRANSITION_DURATION=150,d.prototype.close=function(b){function c(){g.detach().trigger("closed.bs.alert").remove()}var e=a(this),f=e.attr("data-target");f||(f=e.attr("href"),f=f&&f.replace(/.*(?=#[^\s]*$)/,""));var g=a("#"===f?[]:f);b&&b.preventDefault(),g.length||(g=e.closest(".alert")),g.trigger(b=a.Event("close.bs.alert")),b.isDefaultPrevented()||(g.removeClass("in"),a.support.transition&&g.hasClass("fade")?g.one("bsTransitionEnd",c).emulateTransitionEnd(d.TRANSITION_DURATION):c())};var e=a.fn.alert;a.fn.alert=b,a.fn.alert.Constructor=d,a.fn.alert.noConflict=function(){return a.fn.alert=e,this},a(document).on("click.bs.alert.data-api",c,d.prototype.close)}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.button"),f="object"==typeof b&&b;e||d.data("bs.button",e=new c(this,f)),"toggle"==b?e.toggle():b&&e.setState(b)})}var c=function(b,d){this.$element=a(b),this.options=a.extend({},c.DEFAULTS,d),this.isLoading=!1};c.VERSION="3.3.7",c.DEFAULTS={loadingText:"loading..."},c.prototype.setState=function(b){var c="disabled",d=this.$element,e=d.is("input")?"val":"html",f=d.data();b+="Text",null==f.resetText&&d.data("resetText",d[e]()),setTimeout(a.proxy(function(){d[e](null==f[b]?this.options[b]:f[b]),"loadingText"==b?(this.isLoading=!0,d.addClass(c).attr(c,c).prop(c,!0)):this.isLoading&&(this.isLoading=!1,d.removeClass(c).removeAttr(c).prop(c,!1))},this),0)},c.prototype.toggle=function(){var a=!0,b=this.$element.closest('[data-toggle="buttons"]');if(b.length){var c=this.$element.find("input");"radio"==c.prop("type")?(c.prop("checked")&&(a=!1),b.find(".active").removeClass("active"),this.$element.addClass("active")):"checkbox"==c.prop("type")&&(c.prop("checked")!==this.$element.hasClass("active")&&(a=!1),this.$element.toggleClass("active")),c.prop("checked",this.$element.hasClass("active")),a&&c.trigger("change")}else this.$element.attr("aria-pressed",!this.$element.hasClass("active")),this.$element.toggleClass("active")};var d=a.fn.button;a.fn.button=b,a.fn.button.Constructor=c,a.fn.button.noConflict=function(){return a.fn.button=d,this},a(document).on("click.bs.button.data-api",'[data-toggle^="button"]',function(c){var d=a(c.target).closest(".btn");b.call(d,"toggle"),a(c.target).is('input[type="radio"], input[type="checkbox"]')||(c.preventDefault(),d.is("input,button")?d.trigger("focus"):d.find("input:visible,button:visible").first().trigger("focus"))}).on("focus.bs.button.data-api blur.bs.button.data-api",'[data-toggle^="button"]',function(b){a(b.target).closest(".btn").toggleClass("focus",/^focus(in)?$/.test(b.type))})}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.carousel"),f=a.extend({},c.DEFAULTS,d.data(),"object"==typeof b&&b),g="string"==typeof b?b:f.slide;e||d.data("bs.carousel",e=new c(this,f)),"number"==typeof b?e.to(b):g?e[g]():f.interval&&e.pause().cycle()})}var c=function(b,c){this.$element=a(b),this.$indicators=this.$element.find(".carousel-indicators"),this.options=c,this.paused=null,this.sliding=null,this.interval=null,this.$active=null,this.$items=null,this.options.keyboard&&this.$element.on("keydown.bs.carousel",a.proxy(this.keydown,this)),"hover"==this.options.pause&&!("ontouchstart"in document.documentElement)&&this.$element.on("mouseenter.bs.carousel",a.proxy(this.pause,this)).on("mouseleave.bs.carousel",a.proxy(this.cycle,this))};c.VERSION="3.3.7",c.TRANSITION_DURATION=600,c.DEFAULTS={interval:5e3,pause:"hover",wrap:!0,keyboard:!0},c.prototype.keydown=function(a){if(!/input|textarea/i.test(a.target.tagName)){switch(a.which){case 37:this.prev();break;case 39:this.next();break;default:return}a.preventDefault()}},c.prototype.cycle=function(b){return b||(this.paused=!1),this.interval&&clearInterval(this.interval),this.options.interval&&!this.paused&&(this.interval=setInterval(a.proxy(this.next,this),this.options.interval)),this},c.prototype.getItemIndex=function(a){return this.$items=a.parent().children(".item"),this.$items.index(a||this.$active)},c.prototype.getItemForDirection=function(a,b){var c=this.getItemIndex(b),d="prev"==a&&0===c||"next"==a&&c==this.$items.length-1;if(d&&!this.options.wrap)return b;var e="prev"==a?-1:1,f=(c+e)%this.$items.length;return this.$items.eq(f)},c.prototype.to=function(a){var b=this,c=this.getItemIndex(this.$active=this.$element.find(".item.active"));if(!(a>this.$items.length-1||a<0))return this.sliding?this.$element.one("slid.bs.carousel",function(){b.to(a)}):c==a?this.pause().cycle():this.slide(a>c?"next":"prev",this.$items.eq(a))},c.prototype.pause=function(b){return b||(this.paused=!0),this.$element.find(".next, .prev").length&&a.support.transition&&(this.$element.trigger(a.support.transition.end),this.cycle(!0)),this.interval=clearInterval(this.interval),this},c.prototype.next=function(){if(!this.sliding)return this.slide("next")},c.prototype.prev=function(){if(!this.sliding)return this.slide("prev")},c.prototype.slide=function(b,d){var e=this.$element.find(".item.active"),f=d||this.getItemForDirection(b,e),g=this.interval,h="next"==b?"left":"right",i=this;if(f.hasClass("active"))return this.sliding=!1;var j=f[0],k=a.Event("slide.bs.carousel",{relatedTarget:j,direction:h});if(this.$element.trigger(k),!k.isDefaultPrevented()){if(this.sliding=!0,g&&this.pause(),this.$indicators.length){this.$indicators.find(".active").removeClass("active");var l=a(this.$indicators.children()[this.getItemIndex(f)]);l&&l.addClass("active")}var m=a.Event("slid.bs.carousel",{relatedTarget:j,direction:h});return a.support.transition&&this.$element.hasClass("slide")?(f.addClass(b),f[0].offsetWidth,e.addClass(h),f.addClass(h),e.one("bsTransitionEnd",function(){f.removeClass([b,h].join(" ")).addClass("active"),e.removeClass(["active",h].join(" ")),i.sliding=!1,setTimeout(function(){i.$element.trigger(m)},0)}).emulateTransitionEnd(c.TRANSITION_DURATION)):(e.removeClass("active"),f.addClass("active"),this.sliding=!1,this.$element.trigger(m)),g&&this.cycle(),this}};var d=a.fn.carousel;a.fn.carousel=b,a.fn.carousel.Constructor=c,a.fn.carousel.noConflict=function(){return a.fn.carousel=d,this};var e=function(c){var d,e=a(this),f=a(e.attr("data-target")||(d=e.attr("href"))&&d.replace(/.*(?=#[^\s]+$)/,""));if(f.hasClass("carousel")){var g=a.extend({},f.data(),e.data()),h=e.attr("data-slide-to");h&&(g.interval=!1),b.call(f,g),h&&f.data("bs.carousel").to(h),c.preventDefault()}};a(document).on("click.bs.carousel.data-api","[data-slide]",e).on("click.bs.carousel.data-api","[data-slide-to]",e),a(window).on("load",function(){a('[data-ride="carousel"]').each(function(){var c=a(this);b.call(c,c.data())})})}(jQuery),+function(a){"use strict";function b(b){var c,d=b.attr("data-target")||(c=b.attr("href"))&&c.replace(/.*(?=#[^\s]+$)/,"");return a(d)}function c(b){return this.each(function(){var c=a(this),e=c.data("bs.collapse"),f=a.extend({},d.DEFAULTS,c.data(),"object"==typeof b&&b);!e&&f.toggle&&/show|hide/.test(b)&&(f.toggle=!1),e||c.data("bs.collapse",e=new d(this,f)),"string"==typeof b&&e[b]()})}var d=function(b,c){this.$element=a(b),this.options=a.extend({},d.DEFAULTS,c),this.$trigger=a('[data-toggle="collapse"][href="#'+b.id+'"],[data-toggle="collapse"][data-target="#'+b.id+'"]'),this.transitioning=null,this.options.parent?this.$parent=this.getParent():this.addAriaAndCollapsedClass(this.$element,this.$trigger),this.options.toggle&&this.toggle()};d.VERSION="3.3.7",d.TRANSITION_DURATION=350,d.DEFAULTS={toggle:!0},d.prototype.dimension=function(){var a=this.$element.hasClass("width");return a?"width":"height"},d.prototype.show=function(){if(!this.transitioning&&!this.$element.hasClass("in")){var b,e=this.$parent&&this.$parent.children(".panel").children(".in, .collapsing");if(!(e&&e.length&&(b=e.data("bs.collapse"),b&&b.transitioning))){var f=a.Event("show.bs.collapse");if(this.$element.trigger(f),!f.isDefaultPrevented()){e&&e.length&&(c.call(e,"hide"),b||e.data("bs.collapse",null));var g=this.dimension();this.$element.removeClass("collapse").addClass("collapsing")[g](0).attr("aria-expanded",!0),this.$trigger.removeClass("collapsed").attr("aria-expanded",!0),this.transitioning=1;var h=function(){this.$element.removeClass("collapsing").addClass("collapse in")[g](""),this.transitioning=0,this.$element.trigger("shown.bs.collapse")};if(!a.support.transition)return h.call(this);var i=a.camelCase(["scroll",g].join("-"));this.$element.one("bsTransitionEnd",a.proxy(h,this)).emulateTransitionEnd(d.TRANSITION_DURATION)[g](this.$element[0][i])}}}},d.prototype.hide=function(){if(!this.transitioning&&this.$element.hasClass("in")){var b=a.Event("hide.bs.collapse");if(this.$element.trigger(b),!b.isDefaultPrevented()){var c=this.dimension();this.$element[c](this.$element[c]())[0].offsetHeight,this.$element.addClass("collapsing").removeClass("collapse in").attr("aria-expanded",!1),this.$trigger.addClass("collapsed").attr("aria-expanded",!1),this.transitioning=1;var e=function(){this.transitioning=0,this.$element.removeClass("collapsing").addClass("collapse").trigger("hidden.bs.collapse")};return a.support.transition?void this.$element[c](0).one("bsTransitionEnd",a.proxy(e,this)).emulateTransitionEnd(d.TRANSITION_DURATION):e.call(this)}}},d.prototype.toggle=function(){this[this.$element.hasClass("in")?"hide":"show"]()},d.prototype.getParent=function(){return a(this.options.parent).find('[data-toggle="collapse"][data-parent="'+this.options.parent+'"]').each(a.proxy(function(c,d){var e=a(d);this.addAriaAndCollapsedClass(b(e),e)},this)).end()},d.prototype.addAriaAndCollapsedClass=function(a,b){var c=a.hasClass("in");a.attr("aria-expanded",c),b.toggleClass("collapsed",!c).attr("aria-expanded",c)};var e=a.fn.collapse;a.fn.collapse=c,a.fn.collapse.Constructor=d,a.fn.collapse.noConflict=function(){return a.fn.collapse=e,this},a(document).on("click.bs.collapse.data-api",'[data-toggle="collapse"]',function(d){var e=a(this);e.attr("data-target")||d.preventDefault();var f=b(e),g=f.data("bs.collapse"),h=g?"toggle":e.data();c.call(f,h)})}(jQuery),+function(a){"use strict";function b(b){var c=b.attr("data-target");c||(c=b.attr("href"),c=c&&/#[A-Za-z]/.test(c)&&c.replace(/.*(?=#[^\s]*$)/,""));var d=c&&a(c);return d&&d.length?d:b.parent()}function c(c){c&&3===c.which||(a(e).remove(),a(f).each(function(){var d=a(this),e=b(d),f={relatedTarget:this};e.hasClass("open")&&(c&&"click"==c.type&&/input|textarea/i.test(c.target.tagName)&&a.contains(e[0],c.target)||(e.trigger(c=a.Event("hide.bs.dropdown",f)),c.isDefaultPrevented()||(d.attr("aria-expanded","false"),e.removeClass("open").trigger(a.Event("hidden.bs.dropdown",f)))))}))}function d(b){return this.each(function(){var c=a(this),d=c.data("bs.dropdown");d||c.data("bs.dropdown",d=new g(this)),"string"==typeof b&&d[b].call(c)})}var e=".dropdown-backdrop",f='[data-toggle="dropdown"]',g=function(b){a(b).on("click.bs.dropdown",this.toggle)};g.VERSION="3.3.7",g.prototype.toggle=function(d){var e=a(this);if(!e.is(".disabled, :disabled")){var f=b(e),g=f.hasClass("open");if(c(),!g){"ontouchstart"in document.documentElement&&!f.closest(".navbar-nav").length&&a(document.createElement("div")).addClass("dropdown-backdrop").insertAfter(a(this)).on("click",c);var h={relatedTarget:this};if(f.trigger(d=a.Event("show.bs.dropdown",h)),d.isDefaultPrevented())return;e.trigger("focus").attr("aria-expanded","true"),f.toggleClass("open").trigger(a.Event("shown.bs.dropdown",h))}return!1}},g.prototype.keydown=function(c){if(/(38|40|27|32)/.test(c.which)&&!/input|textarea/i.test(c.target.tagName)){var d=a(this);if(c.preventDefault(),c.stopPropagation(),!d.is(".disabled, :disabled")){var e=b(d),g=e.hasClass("open");if(!g&&27!=c.which||g&&27==c.which)return 27==c.which&&e.find(f).trigger("focus"),d.trigger("click");var h=" li:not(.disabled):visible a",i=e.find(".dropdown-menu"+h);if(i.length){var j=i.index(c.target);38==c.which&&j>0&&j--,40==c.which&&j<i.length-1&&j++,~j||(j=0),i.eq(j).trigger("focus")}}}};var h=a.fn.dropdown;a.fn.dropdown=d,a.fn.dropdown.Constructor=g,a.fn.dropdown.noConflict=function(){return a.fn.dropdown=h,this},a(document).on("click.bs.dropdown.data-api",c).on("click.bs.dropdown.data-api",".dropdown form",function(a){a.stopPropagation()}).on("click.bs.dropdown.data-api",f,g.prototype.toggle).on("keydown.bs.dropdown.data-api",f,g.prototype.keydown).on("keydown.bs.dropdown.data-api",".dropdown-menu",g.prototype.keydown)}(jQuery),+function(a){"use strict";function b(b,d){return this.each(function(){var e=a(this),f=e.data("bs.modal"),g=a.extend({},c.DEFAULTS,e.data(),"object"==typeof b&&b);f||e.data("bs.modal",f=new c(this,g)),"string"==typeof b?f[b](d):g.show&&f.show(d)})}var c=function(b,c){this.options=c,this.$body=a(document.body),this.$element=a(b),this.$dialog=this.$element.find(".modal-dialog"),this.$backdrop=null,this.isShown=null,this.originalBodyPad=null,this.scrollbarWidth=0,this.ignoreBackdropClick=!1,this.options.remote&&this.$element.find(".modal-content").load(this.options.remote,a.proxy(function(){this.$element.trigger("loaded.bs.modal")},this))};c.VERSION="3.3.7",c.TRANSITION_DURATION=300,c.BACKDROP_TRANSITION_DURATION=150,c.DEFAULTS={backdrop:!0,keyboard:!0,show:!0},c.prototype.toggle=function(a){return this.isShown?this.hide():this.show(a)},c.prototype.show=function(b){var d=this,e=a.Event("show.bs.modal",{relatedTarget:b});this.$element.trigger(e),this.isShown||e.isDefaultPrevented()||(this.isShown=!0,this.checkScrollbar(),this.setScrollbar(),this.$body.addClass("modal-open"),this.escape(),this.resize(),this.$element.on("click.dismiss.bs.modal",'[data-dismiss="modal"]',a.proxy(this.hide,this)),this.$dialog.on("mousedown.dismiss.bs.modal",function(){d.$element.one("mouseup.dismiss.bs.modal",function(b){a(b.target).is(d.$element)&&(d.ignoreBackdropClick=!0)})}),this.backdrop(function(){var e=a.support.transition&&d.$element.hasClass("fade");d.$element.parent().length||d.$element.appendTo(d.$body),d.$element.show().scrollTop(0),d.adjustDialog(),e&&d.$element[0].offsetWidth,d.$element.addClass("in"),d.enforceFocus();var f=a.Event("shown.bs.modal",{relatedTarget:b});e?d.$dialog.one("bsTransitionEnd",function(){d.$element.trigger("focus").trigger(f)}).emulateTransitionEnd(c.TRANSITION_DURATION):d.$element.trigger("focus").trigger(f)}))},c.prototype.hide=function(b){b&&b.preventDefault(),b=a.Event("hide.bs.modal"),this.$element.trigger(b),this.isShown&&!b.isDefaultPrevented()&&(this.isShown=!1,this.escape(),this.resize(),a(document).off("focusin.bs.modal"),this.$element.removeClass("in").off("click.dismiss.bs.modal").off("mouseup.dismiss.bs.modal"),this.$dialog.off("mousedown.dismiss.bs.modal"),a.support.transition&&this.$element.hasClass("fade")?this.$element.one("bsTransitionEnd",a.proxy(this.hideModal,this)).emulateTransitionEnd(c.TRANSITION_DURATION):this.hideModal())},c.prototype.enforceFocus=function(){a(document).off("focusin.bs.modal").on("focusin.bs.modal",a.proxy(function(a){document===a.target||this.$element[0]===a.target||this.$element.has(a.target).length||this.$element.trigger("focus")},this))},c.prototype.escape=function(){this.isShown&&this.options.keyboard?this.$element.on("keydown.dismiss.bs.modal",a.proxy(function(a){27==a.which&&this.hide()},this)):this.isShown||this.$element.off("keydown.dismiss.bs.modal")},c.prototype.resize=function(){this.isShown?a(window).on("resize.bs.modal",a.proxy(this.handleUpdate,this)):a(window).off("resize.bs.modal")},c.prototype.hideModal=function(){var a=this;this.$element.hide(),this.backdrop(function(){a.$body.removeClass("modal-open"),a.resetAdjustments(),a.resetScrollbar(),a.$element.trigger("hidden.bs.modal")})},c.prototype.removeBackdrop=function(){this.$backdrop&&this.$backdrop.remove(),this.$backdrop=null},c.prototype.backdrop=function(b){var d=this,e=this.$element.hasClass("fade")?"fade":"";if(this.isShown&&this.options.backdrop){var f=a.support.transition&&e;if(this.$backdrop=a(document.createElement("div")).addClass("modal-backdrop "+e).appendTo(this.$body),this.$element.on("click.dismiss.bs.modal",a.proxy(function(a){return this.ignoreBackdropClick?void(this.ignoreBackdropClick=!1):void(a.target===a.currentTarget&&("static"==this.options.backdrop?this.$element[0].focus():this.hide()))},this)),f&&this.$backdrop[0].offsetWidth,this.$backdrop.addClass("in"),!b)return;f?this.$backdrop.one("bsTransitionEnd",b).emulateTransitionEnd(c.BACKDROP_TRANSITION_DURATION):b()}else if(!this.isShown&&this.$backdrop){this.$backdrop.removeClass("in");var g=function(){d.removeBackdrop(),b&&b()};a.support.transition&&this.$element.hasClass("fade")?this.$backdrop.one("bsTransitionEnd",g).emulateTransitionEnd(c.BACKDROP_TRANSITION_DURATION):g()}else b&&b()},c.prototype.handleUpdate=function(){this.adjustDialog()},c.prototype.adjustDialog=function(){var a=this.$element[0].scrollHeight>document.documentElement.clientHeight;this.$element.css({paddingLeft:!this.bodyIsOverflowing&&a?this.scrollbarWidth:"",paddingRight:this.bodyIsOverflowing&&!a?this.scrollbarWidth:""})},c.prototype.resetAdjustments=function(){this.$element.css({paddingLeft:"",paddingRight:""})},c.prototype.checkScrollbar=function(){var a=window.innerWidth;if(!a){var b=document.documentElement.getBoundingClientRect();a=b.right-Math.abs(b.left)}this.bodyIsOverflowing=document.body.clientWidth<a,this.scrollbarWidth=this.measureScrollbar()},c.prototype.setScrollbar=function(){var a=parseInt(this.$body.css("padding-right")||0,10);this.originalBodyPad=document.body.style.paddingRight||"",this.bodyIsOverflowing&&this.$body.css("padding-right",a+this.scrollbarWidth)},c.prototype.resetScrollbar=function(){this.$body.css("padding-right",this.originalBodyPad)},c.prototype.measureScrollbar=function(){var a=document.createElement("div");a.className="modal-scrollbar-measure",this.$body.append(a);var b=a.offsetWidth-a.clientWidth;return this.$body[0].removeChild(a),b};var d=a.fn.modal;a.fn.modal=b,a.fn.modal.Constructor=c,a.fn.modal.noConflict=function(){return a.fn.modal=d,this},a(document).on("click.bs.modal.data-api",'[data-toggle="modal"]',function(c){var d=a(this),e=d.attr("href"),f=a(d.attr("data-target")||e&&e.replace(/.*(?=#[^\s]+$)/,"")),g=f.data("bs.modal")?"toggle":a.extend({remote:!/#/.test(e)&&e},f.data(),d.data());d.is("a")&&c.preventDefault(),f.one("show.bs.modal",function(a){a.isDefaultPrevented()||f.one("hidden.bs.modal",function(){d.is(":visible")&&d.trigger("focus")})}),b.call(f,g,this)})}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.tooltip"),f="object"==typeof b&&b;!e&&/destroy|hide/.test(b)||(e||d.data("bs.tooltip",e=new c(this,f)),"string"==typeof b&&e[b]())})}var c=function(a,b){this.type=null,this.options=null,this.enabled=null,this.timeout=null,this.hoverState=null,this.$element=null,this.inState=null,this.init("tooltip",a,b)};c.VERSION="3.3.7",c.TRANSITION_DURATION=150,c.DEFAULTS={animation:!0,placement:"top",selector:!1,template:'<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',trigger:"hover focus",title:"",delay:0,html:!1,container:!1,viewport:{selector:"body",padding:0}},c.prototype.init=function(b,c,d){if(this.enabled=!0,this.type=b,this.$element=a(c),this.options=this.getOptions(d),this.$viewport=this.options.viewport&&a(a.isFunction(this.options.viewport)?this.options.viewport.call(this,this.$element):this.options.viewport.selector||this.options.viewport),this.inState={click:!1,hover:!1,focus:!1},this.$element[0]instanceof document.constructor&&!this.options.selector)throw new Error("`selector` option must be specified when initializing "+this.type+" on the window.document object!");for(var e=this.options.trigger.split(" "),f=e.length;f--;){var g=e[f];if("click"==g)this.$element.on("click."+this.type,this.options.selector,a.proxy(this.toggle,this));else if("manual"!=g){var h="hover"==g?"mouseenter":"focusin",i="hover"==g?"mouseleave":"focusout";this.$element.on(h+"."+this.type,this.options.selector,a.proxy(this.enter,this)),this.$element.on(i+"."+this.type,this.options.selector,a.proxy(this.leave,this))}}this.options.selector?this._options=a.extend({},this.options,{trigger:"manual",selector:""}):this.fixTitle()},c.prototype.getDefaults=function(){return c.DEFAULTS},c.prototype.getOptions=function(b){return b=a.extend({},this.getDefaults(),this.$element.data(),b),b.delay&&"number"==typeof b.delay&&(b.delay={show:b.delay,hide:b.delay}),b},c.prototype.getDelegateOptions=function(){var b={},c=this.getDefaults();return this._options&&a.each(this._options,function(a,d){c[a]!=d&&(b[a]=d)}),b},c.prototype.enter=function(b){var c=b instanceof this.constructor?b:a(b.currentTarget).data("bs."+this.type);return c||(c=new this.constructor(b.currentTarget,this.getDelegateOptions()),a(b.currentTarget).data("bs."+this.type,c)),b instanceof a.Event&&(c.inState["focusin"==b.type?"focus":"hover"]=!0),c.tip().hasClass("in")||"in"==c.hoverState?void(c.hoverState="in"):(clearTimeout(c.timeout),c.hoverState="in",c.options.delay&&c.options.delay.show?void(c.timeout=setTimeout(function(){"in"==c.hoverState&&c.show()},c.options.delay.show)):c.show())},c.prototype.isInStateTrue=function(){for(var a in this.inState)if(this.inState[a])return!0;return!1},c.prototype.leave=function(b){var c=b instanceof this.constructor?b:a(b.currentTarget).data("bs."+this.type);if(c||(c=new this.constructor(b.currentTarget,this.getDelegateOptions()),a(b.currentTarget).data("bs."+this.type,c)),b instanceof a.Event&&(c.inState["focusout"==b.type?"focus":"hover"]=!1),!c.isInStateTrue())return clearTimeout(c.timeout),c.hoverState="out",c.options.delay&&c.options.delay.hide?void(c.timeout=setTimeout(function(){"out"==c.hoverState&&c.hide()},c.options.delay.hide)):c.hide()},c.prototype.show=function(){var b=a.Event("show.bs."+this.type);if(this.hasContent()&&this.enabled){this.$element.trigger(b);var d=a.contains(this.$element[0].ownerDocument.documentElement,this.$element[0]);if(b.isDefaultPrevented()||!d)return;var e=this,f=this.tip(),g=this.getUID(this.type);this.setContent(),f.attr("id",g),this.$element.attr("aria-describedby",g),this.options.animation&&f.addClass("fade");var h="function"==typeof this.options.placement?this.options.placement.call(this,f[0],this.$element[0]):this.options.placement,i=/\s?auto?\s?/i,j=i.test(h);j&&(h=h.replace(i,"")||"top"),f.detach().css({top:0,left:0,display:"block"}).addClass(h).data("bs."+this.type,this),this.options.container?f.appendTo(this.options.container):f.insertAfter(this.$element),this.$element.trigger("inserted.bs."+this.type);var k=this.getPosition(),l=f[0].offsetWidth,m=f[0].offsetHeight;if(j){var n=h,o=this.getPosition(this.$viewport);h="bottom"==h&&k.bottom+m>o.bottom?"top":"top"==h&&k.top-m<o.top?"bottom":"right"==h&&k.right+l>o.width?"left":"left"==h&&k.left-l<o.left?"right":h,f.removeClass(n).addClass(h)}var p=this.getCalculatedOffset(h,k,l,m);this.applyPlacement(p,h);var q=function(){var a=e.hoverState;e.$element.trigger("shown.bs."+e.type),e.hoverState=null,"out"==a&&e.leave(e)};a.support.transition&&this.$tip.hasClass("fade")?f.one("bsTransitionEnd",q).emulateTransitionEnd(c.TRANSITION_DURATION):q()}},c.prototype.applyPlacement=function(b,c){var d=this.tip(),e=d[0].offsetWidth,f=d[0].offsetHeight,g=parseInt(d.css("margin-top"),10),h=parseInt(d.css("margin-left"),10);isNaN(g)&&(g=0),isNaN(h)&&(h=0),b.top+=g,b.left+=h,a.offset.setOffset(d[0],a.extend({using:function(a){d.css({top:Math.round(a.top),left:Math.round(a.left)})}},b),0),d.addClass("in");var i=d[0].offsetWidth,j=d[0].offsetHeight;"top"==c&&j!=f&&(b.top=b.top+f-j);var k=this.getViewportAdjustedDelta(c,b,i,j);k.left?b.left+=k.left:b.top+=k.top;var l=/top|bottom/.test(c),m=l?2*k.left-e+i:2*k.top-f+j,n=l?"offsetWidth":"offsetHeight";d.offset(b),this.replaceArrow(m,d[0][n],l)},c.prototype.replaceArrow=function(a,b,c){this.arrow().css(c?"left":"top",50*(1-a/b)+"%").css(c?"top":"left","")},c.prototype.setContent=function(){var a=this.tip(),b=this.getTitle();a.find(".tooltip-inner")[this.options.html?"html":"text"](b),a.removeClass("fade in top bottom left right")},c.prototype.hide=function(b){function d(){"in"!=e.hoverState&&f.detach(),e.$element&&e.$element.removeAttr("aria-describedby").trigger("hidden.bs."+e.type),b&&b()}var e=this,f=a(this.$tip),g=a.Event("hide.bs."+this.type);if(this.$element.trigger(g),!g.isDefaultPrevented())return f.removeClass("in"),a.support.transition&&f.hasClass("fade")?f.one("bsTransitionEnd",d).emulateTransitionEnd(c.TRANSITION_DURATION):d(),this.hoverState=null,this},c.prototype.fixTitle=function(){var a=this.$element;(a.attr("title")||"string"!=typeof a.attr("data-original-title"))&&a.attr("data-original-title",a.attr("title")||"").attr("title","")},c.prototype.hasContent=function(){return this.getTitle()},c.prototype.getPosition=function(b){b=b||this.$element;var c=b[0],d="BODY"==c.tagName,e=c.getBoundingClientRect();null==e.width&&(e=a.extend({},e,{width:e.right-e.left,height:e.bottom-e.top}));var f=window.SVGElement&&c instanceof window.SVGElement,g=d?{top:0,left:0}:f?null:b.offset(),h={scroll:d?document.documentElement.scrollTop||document.body.scrollTop:b.scrollTop()},i=d?{width:a(window).width(),height:a(window).height()}:null;return a.extend({},e,h,i,g)},c.prototype.getCalculatedOffset=function(a,b,c,d){return"bottom"==a?{top:b.top+b.height,left:b.left+b.width/2-c/2}:"top"==a?{top:b.top-d,left:b.left+b.width/2-c/2}:"left"==a?{top:b.top+b.height/2-d/2,left:b.left-c}:{top:b.top+b.height/2-d/2,left:b.left+b.width}},c.prototype.getViewportAdjustedDelta=function(a,b,c,d){var e={top:0,left:0};if(!this.$viewport)return e;var f=this.options.viewport&&this.options.viewport.padding||0,g=this.getPosition(this.$viewport);if(/right|left/.test(a)){var h=b.top-f-g.scroll,i=b.top+f-g.scroll+d;h<g.top?e.top=g.top-h:i>g.top+g.height&&(e.top=g.top+g.height-i)}else{var j=b.left-f,k=b.left+f+c;j<g.left?e.left=g.left-j:k>g.right&&(e.left=g.left+g.width-k)}return e},c.prototype.getTitle=function(){var a,b=this.$element,c=this.options;return a=b.attr("data-original-title")||("function"==typeof c.title?c.title.call(b[0]):c.title)},c.prototype.getUID=function(a){do a+=~~(1e6*Math.random());while(document.getElementById(a));return a},c.prototype.tip=function(){if(!this.$tip&&(this.$tip=a(this.options.template),1!=this.$tip.length))throw new Error(this.type+" `template` option must consist of exactly 1 top-level element!");return this.$tip},c.prototype.arrow=function(){return this.$arrow=this.$arrow||this.tip().find(".tooltip-arrow")},c.prototype.enable=function(){this.enabled=!0},c.prototype.disable=function(){this.enabled=!1},c.prototype.toggleEnabled=function(){this.enabled=!this.enabled},c.prototype.toggle=function(b){var c=this;b&&(c=a(b.currentTarget).data("bs."+this.type),c||(c=new this.constructor(b.currentTarget,this.getDelegateOptions()),a(b.currentTarget).data("bs."+this.type,c))),b?(c.inState.click=!c.inState.click,c.isInStateTrue()?c.enter(c):c.leave(c)):c.tip().hasClass("in")?c.leave(c):c.enter(c)},c.prototype.destroy=function(){var a=this;clearTimeout(this.timeout),this.hide(function(){a.$element.off("."+a.type).removeData("bs."+a.type),a.$tip&&a.$tip.detach(),a.$tip=null,a.$arrow=null,a.$viewport=null,a.$element=null})};var d=a.fn.tooltip;a.fn.tooltip=b,a.fn.tooltip.Constructor=c,a.fn.tooltip.noConflict=function(){return a.fn.tooltip=d,this}}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.popover"),f="object"==typeof b&&b;!e&&/destroy|hide/.test(b)||(e||d.data("bs.popover",e=new c(this,f)),"string"==typeof b&&e[b]())})}var c=function(a,b){this.init("popover",a,b)};if(!a.fn.tooltip)throw new Error("Popover requires tooltip.js");c.VERSION="3.3.7",c.DEFAULTS=a.extend({},a.fn.tooltip.Constructor.DEFAULTS,{placement:"right",trigger:"click",content:"",template:'<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'}),c.prototype=a.extend({},a.fn.tooltip.Constructor.prototype),c.prototype.constructor=c,c.prototype.getDefaults=function(){return c.DEFAULTS},c.prototype.setContent=function(){var a=this.tip(),b=this.getTitle(),c=this.getContent();a.find(".popover-title")[this.options.html?"html":"text"](b),a.find(".popover-content").children().detach().end()[this.options.html?"string"==typeof c?"html":"append":"text"](c),a.removeClass("fade top bottom left right in"),a.find(".popover-title").html()||a.find(".popover-title").hide()},c.prototype.hasContent=function(){return this.getTitle()||this.getContent()},c.prototype.getContent=function(){var a=this.$element,b=this.options;return a.attr("data-content")||("function"==typeof b.content?b.content.call(a[0]):b.content)},c.prototype.arrow=function(){return this.$arrow=this.$arrow||this.tip().find(".arrow")};var d=a.fn.popover;a.fn.popover=b,a.fn.popover.Constructor=c,a.fn.popover.noConflict=function(){return a.fn.popover=d,this}}(jQuery),+function(a){"use strict";function b(c,d){this.$body=a(document.body),this.$scrollElement=a(a(c).is(document.body)?window:c),this.options=a.extend({},b.DEFAULTS,d),this.selector=(this.options.target||"")+" .nav li > a",this.offsets=[],this.targets=[],this.activeTarget=null,this.scrollHeight=0,this.$scrollElement.on("scroll.bs.scrollspy",a.proxy(this.process,this)),this.refresh(),this.process()}function c(c){return this.each(function(){var d=a(this),e=d.data("bs.scrollspy"),f="object"==typeof c&&c;e||d.data("bs.scrollspy",e=new b(this,f)),"string"==typeof c&&e[c]()})}b.VERSION="3.3.7",b.DEFAULTS={offset:10},b.prototype.getScrollHeight=function(){return this.$scrollElement[0].scrollHeight||Math.max(this.$body[0].scrollHeight,document.documentElement.scrollHeight)},b.prototype.refresh=function(){var b=this,c="offset",d=0;this.offsets=[],this.targets=[],this.scrollHeight=this.getScrollHeight(),a.isWindow(this.$scrollElement[0])||(c="position",d=this.$scrollElement.scrollTop()),this.$body.find(this.selector).map(function(){var b=a(this),e=b.data("target")||b.attr("href"),f=/^#./.test(e)&&a(e);return f&&f.length&&f.is(":visible")&&[[f[c]().top+d,e]]||null}).sort(function(a,b){return a[0]-b[0]}).each(function(){b.offsets.push(this[0]),b.targets.push(this[1])})},b.prototype.process=function(){var a,b=this.$scrollElement.scrollTop()+this.options.offset,c=this.getScrollHeight(),d=this.options.offset+c-this.$scrollElement.height(),e=this.offsets,f=this.targets,g=this.activeTarget;if(this.scrollHeight!=c&&this.refresh(),b>=d)return g!=(a=f[f.length-1])&&this.activate(a);if(g&&b<e[0])return this.activeTarget=null,this.clear();for(a=e.length;a--;)g!=f[a]&&b>=e[a]&&(void 0===e[a+1]||b<e[a+1])&&this.activate(f[a])},b.prototype.activate=function(b){
this.activeTarget=b,this.clear();var c=this.selector+'[data-target="'+b+'"],'+this.selector+'[href="'+b+'"]',d=a(c).parents("li").addClass("active");d.parent(".dropdown-menu").length&&(d=d.closest("li.dropdown").addClass("active")),d.trigger("activate.bs.scrollspy")},b.prototype.clear=function(){a(this.selector).parentsUntil(this.options.target,".active").removeClass("active")};var d=a.fn.scrollspy;a.fn.scrollspy=c,a.fn.scrollspy.Constructor=b,a.fn.scrollspy.noConflict=function(){return a.fn.scrollspy=d,this},a(window).on("load.bs.scrollspy.data-api",function(){a('[data-spy="scroll"]').each(function(){var b=a(this);c.call(b,b.data())})})}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.tab");e||d.data("bs.tab",e=new c(this)),"string"==typeof b&&e[b]()})}var c=function(b){this.element=a(b)};c.VERSION="3.3.7",c.TRANSITION_DURATION=150,c.prototype.show=function(){var b=this.element,c=b.closest("ul:not(.dropdown-menu)"),d=b.data("target");if(d||(d=b.attr("href"),d=d&&d.replace(/.*(?=#[^\s]*$)/,"")),!b.parent("li").hasClass("active")){var e=c.find(".active:last a"),f=a.Event("hide.bs.tab",{relatedTarget:b[0]}),g=a.Event("show.bs.tab",{relatedTarget:e[0]});if(e.trigger(f),b.trigger(g),!g.isDefaultPrevented()&&!f.isDefaultPrevented()){var h=a(d);this.activate(b.closest("li"),c),this.activate(h,h.parent(),function(){e.trigger({type:"hidden.bs.tab",relatedTarget:b[0]}),b.trigger({type:"shown.bs.tab",relatedTarget:e[0]})})}}},c.prototype.activate=function(b,d,e){function f(){g.removeClass("active").find("> .dropdown-menu > .active").removeClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded",!1),b.addClass("active").find('[data-toggle="tab"]').attr("aria-expanded",!0),h?(b[0].offsetWidth,b.addClass("in")):b.removeClass("fade"),b.parent(".dropdown-menu").length&&b.closest("li.dropdown").addClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded",!0),e&&e()}var g=d.find("> .active"),h=e&&a.support.transition&&(g.length&&g.hasClass("fade")||!!d.find("> .fade").length);g.length&&h?g.one("bsTransitionEnd",f).emulateTransitionEnd(c.TRANSITION_DURATION):f(),g.removeClass("in")};var d=a.fn.tab;a.fn.tab=b,a.fn.tab.Constructor=c,a.fn.tab.noConflict=function(){return a.fn.tab=d,this};var e=function(c){c.preventDefault(),b.call(a(this),"show")};a(document).on("click.bs.tab.data-api",'[data-toggle="tab"]',e).on("click.bs.tab.data-api",'[data-toggle="pill"]',e)}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.affix"),f="object"==typeof b&&b;e||d.data("bs.affix",e=new c(this,f)),"string"==typeof b&&e[b]()})}var c=function(b,d){this.options=a.extend({},c.DEFAULTS,d),this.$target=a(this.options.target).on("scroll.bs.affix.data-api",a.proxy(this.checkPosition,this)).on("click.bs.affix.data-api",a.proxy(this.checkPositionWithEventLoop,this)),this.$element=a(b),this.affixed=null,this.unpin=null,this.pinnedOffset=null,this.checkPosition()};c.VERSION="3.3.7",c.RESET="affix affix-top affix-bottom",c.DEFAULTS={offset:0,target:window},c.prototype.getState=function(a,b,c,d){var e=this.$target.scrollTop(),f=this.$element.offset(),g=this.$target.height();if(null!=c&&"top"==this.affixed)return e<c&&"top";if("bottom"==this.affixed)return null!=c?!(e+this.unpin<=f.top)&&"bottom":!(e+g<=a-d)&&"bottom";var h=null==this.affixed,i=h?e:f.top,j=h?g:b;return null!=c&&e<=c?"top":null!=d&&i+j>=a-d&&"bottom"},c.prototype.getPinnedOffset=function(){if(this.pinnedOffset)return this.pinnedOffset;this.$element.removeClass(c.RESET).addClass("affix");var a=this.$target.scrollTop(),b=this.$element.offset();return this.pinnedOffset=b.top-a},c.prototype.checkPositionWithEventLoop=function(){setTimeout(a.proxy(this.checkPosition,this),1)},c.prototype.checkPosition=function(){if(this.$element.is(":visible")){var b=this.$element.height(),d=this.options.offset,e=d.top,f=d.bottom,g=Math.max(a(document).height(),a(document.body).height());"object"!=typeof d&&(f=e=d),"function"==typeof e&&(e=d.top(this.$element)),"function"==typeof f&&(f=d.bottom(this.$element));var h=this.getState(g,b,e,f);if(this.affixed!=h){null!=this.unpin&&this.$element.css("top","");var i="affix"+(h?"-"+h:""),j=a.Event(i+".bs.affix");if(this.$element.trigger(j),j.isDefaultPrevented())return;this.affixed=h,this.unpin="bottom"==h?this.getPinnedOffset():null,this.$element.removeClass(c.RESET).addClass(i).trigger(i.replace("affix","affixed")+".bs.affix")}"bottom"==h&&this.$element.offset({top:g-b-f})}};var d=a.fn.affix;a.fn.affix=b,a.fn.affix.Constructor=c,a.fn.affix.noConflict=function(){return a.fn.affix=d,this},a(window).on("load",function(){a('[data-spy="affix"]').each(function(){var c=a(this),d=c.data();d.offset=d.offset||{},null!=d.offsetBottom&&(d.offset.bottom=d.offsetBottom),null!=d.offsetTop&&(d.offset.top=d.offsetTop),b.call(c,d)})})}(jQuery);
/*
 * jQuery Easing v1.3 - http://gsgd.co.uk/sandbox/jquery/easing/
 *
 * Uses the built in easing capabilities added In jQuery 1.1
 * to offer multiple easing options
 *
 * TERMS OF USE - jQuery Easing
 * 
 * Open source under the BSD License. 
 * 
 * Copyright © 2008 George McGinley Smith
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without modification, 
 * are permitted provided that the following conditions are met:
 * 
 * Redistributions of source code must retain the above copyright notice, this list of 
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list 
 * of conditions and the following disclaimer in the documentation and/or other materials 
 * provided with the distribution.
 * 
 * Neither the name of the author nor the names of contributors may be used to endorse 
 * or promote products derived from this software without specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY 
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 *  COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 *  EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
 *  GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED 
 * AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 *  NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED 
 * OF THE POSSIBILITY OF SUCH DAMAGE. 
 *
*/

// t: current time, b: begInnIng value, c: change In value, d: duration
jQuery.easing['jswing'] = jQuery.easing['swing'];

jQuery.extend( jQuery.easing,
{
	def: 'easeOutQuad',
	swing: function (x, t, b, c, d) {
		//alert(jQuery.easing.default);
		return jQuery.easing[jQuery.easing.def](x, t, b, c, d);
	},
	easeInQuad: function (x, t, b, c, d) {
		return c*(t/=d)*t + b;
	},
	easeOutQuad: function (x, t, b, c, d) {
		return -c *(t/=d)*(t-2) + b;
	},
	easeInOutQuad: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t + b;
		return -c/2 * ((--t)*(t-2) - 1) + b;
	},
	easeInCubic: function (x, t, b, c, d) {
		return c*(t/=d)*t*t + b;
	},
	easeOutCubic: function (x, t, b, c, d) {
		return c*((t=t/d-1)*t*t + 1) + b;
	},
	easeInOutCubic: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t + b;
		return c/2*((t-=2)*t*t + 2) + b;
	},
	easeInQuart: function (x, t, b, c, d) {
		return c*(t/=d)*t*t*t + b;
	},
	easeOutQuart: function (x, t, b, c, d) {
		return -c * ((t=t/d-1)*t*t*t - 1) + b;
	},
	easeInOutQuart: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t*t + b;
		return -c/2 * ((t-=2)*t*t*t - 2) + b;
	},
	easeInQuint: function (x, t, b, c, d) {
		return c*(t/=d)*t*t*t*t + b;
	},
	easeOutQuint: function (x, t, b, c, d) {
		return c*((t=t/d-1)*t*t*t*t + 1) + b;
	},
	easeInOutQuint: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t*t*t + b;
		return c/2*((t-=2)*t*t*t*t + 2) + b;
	},
	easeInSine: function (x, t, b, c, d) {
		return -c * Math.cos(t/d * (Math.PI/2)) + c + b;
	},
	easeOutSine: function (x, t, b, c, d) {
		return c * Math.sin(t/d * (Math.PI/2)) + b;
	},
	easeInOutSine: function (x, t, b, c, d) {
		return -c/2 * (Math.cos(Math.PI*t/d) - 1) + b;
	},
	easeInExpo: function (x, t, b, c, d) {
		return (t==0) ? b : c * Math.pow(2, 10 * (t/d - 1)) + b;
	},
	easeOutExpo: function (x, t, b, c, d) {
		return (t==d) ? b+c : c * (-Math.pow(2, -10 * t/d) + 1) + b;
	},
	easeInOutExpo: function (x, t, b, c, d) {
		if (t==0) return b;
		if (t==d) return b+c;
		if ((t/=d/2) < 1) return c/2 * Math.pow(2, 10 * (t - 1)) + b;
		return c/2 * (-Math.pow(2, -10 * --t) + 2) + b;
	},
	easeInCirc: function (x, t, b, c, d) {
		return -c * (Math.sqrt(1 - (t/=d)*t) - 1) + b;
	},
	easeOutCirc: function (x, t, b, c, d) {
		return c * Math.sqrt(1 - (t=t/d-1)*t) + b;
	},
	easeInOutCirc: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return -c/2 * (Math.sqrt(1 - t*t) - 1) + b;
		return c/2 * (Math.sqrt(1 - (t-=2)*t) + 1) + b;
	},
	easeInElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		return -(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
	},
	easeOutElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		return a*Math.pow(2,-10*t) * Math.sin( (t*d-s)*(2*Math.PI)/p ) + c + b;
	},
	easeInOutElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d/2)==2) return b+c;  if (!p) p=d*(.3*1.5);
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		if (t < 1) return -.5*(a*Math.pow(2,10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )) + b;
		return a*Math.pow(2,-10*(t-=1)) * Math.sin( (t*d-s)*(2*Math.PI)/p )*.5 + c + b;
	},
	easeInBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158;
		return c*(t/=d)*t*((s+1)*t - s) + b;
	},
	easeOutBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158;
		return c*((t=t/d-1)*t*((s+1)*t + s) + 1) + b;
	},
	easeInOutBack: function (x, t, b, c, d, s) {
		if (s == undefined) s = 1.70158; 
		if ((t/=d/2) < 1) return c/2*(t*t*(((s*=(1.525))+1)*t - s)) + b;
		return c/2*((t-=2)*t*(((s*=(1.525))+1)*t + s) + 2) + b;
	},
	easeInBounce: function (x, t, b, c, d) {
		return c - jQuery.easing.easeOutBounce (x, d-t, 0, c, d) + b;
	},
	easeOutBounce: function (x, t, b, c, d) {
		if ((t/=d) < (1/2.75)) {
			return c*(7.5625*t*t) + b;
		} else if (t < (2/2.75)) {
			return c*(7.5625*(t-=(1.5/2.75))*t + .75) + b;
		} else if (t < (2.5/2.75)) {
			return c*(7.5625*(t-=(2.25/2.75))*t + .9375) + b;
		} else {
			return c*(7.5625*(t-=(2.625/2.75))*t + .984375) + b;
		}
	},
	easeInOutBounce: function (x, t, b, c, d) {
		if (t < d/2) return jQuery.easing.easeInBounce (x, t*2, 0, c, d) * .5 + b;
		return jQuery.easing.easeOutBounce (x, t*2-d, 0, c, d) * .5 + c*.5 + b;
	}
});

/*
 *
 * TERMS OF USE - EASING EQUATIONS
 * 
 * Open source under the BSD License. 
 * 
 * Copyright © 2001 Robert Penner
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without modification, 
 * are permitted provided that the following conditions are met:
 * 
 * Redistributions of source code must retain the above copyright notice, this list of 
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list 
 * of conditions and the following disclaimer in the documentation and/or other materials 
 * provided with the distribution.
 * 
 * Neither the name of the author nor the names of contributors may be used to endorse 
 * or promote products derived from this software without specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY 
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 *  COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 *  EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
 *  GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED 
 * AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 *  NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED 
 * OF THE POSSIBILITY OF SUCH DAMAGE. 
 *
 */
/**
 * jQuery Unveil
 * A very lightweight jQuery plugin to lazy load images
 * http://luis-almeida.github.com/unveil
 *
 * Licensed under the MIT license.
 * Copyright 2013 Luís Almeida
 * https://github.com/luis-almeida
 */

;(function($){$.fn.unveil=function(threshold,callback){var $w=$(window),th=threshold||0,retina=window.devicePixelRatio>1,attrib=retina?"data-src-retina":"data-src",images=this,loaded;this.one("unveil",function(){var source=this.getAttribute(attrib);source=source||this.getAttribute("data-src");if(source){this.setAttribute("src",source);if(typeof callback==="function")callback.call(this);}});function unveil(){var inview=images.filter(function(){var $e=$(this),wt=$w.scrollTop(),wb=wt+$w.height(),et=$e.offset().top,eb=et+$e.height();return eb>=wt-th&&et<=wb+th;});loaded=inview.trigger("unveil");images=images.not(loaded);}$w.scroll(unveil);$w.resize(unveil);unveil();return this;};})(window.jQuery||window.Zepto);

jQuery.extend({bez:function(coOrdArray){var encodedFuncName="bez_"+jQuery.makeArray(arguments).join("_").replace(/\./g,"p");if(typeof jQuery.easing[encodedFuncName]!=="function"){var polyBez=function(p1,p2){var A=[null,null],B=[null,null],C=[null,null],bezCoOrd=function(t,ax){C[ax]=3*p1[ax],B[ax]=3*(p2[ax]-p1[ax])-C[ax],A[ax]=1-C[ax]-B[ax];return t*(C[ax]+t*(B[ax]+t*A[ax]))},xDeriv=function(t){return C[0]+t*(2*B[0]+3*A[0]*t)},xForT=function(t){var x=t,i=0,z;while(++i<14){z=bezCoOrd(x,0)-t;if(Math.abs(z)<.001)break;x-=z/xDeriv(x)}return x};return function(t){return bezCoOrd(xForT(t),1)}};jQuery.easing[encodedFuncName]=function(x,t,b,c,d){return c*polyBez([coOrdArray[0],coOrdArray[1]],[coOrdArray[2],coOrdArray[3]])(t/d)+b}}return encodedFuncName}});;

/*! iOSList - v2.0.0 -  * https://brianhadaway.github.io/iOSList
 * Copyright (c)  2014  Brian Hadaway; Licensed MIT */
/* Classes Edited By Pages - Revox Pvt Ltd */
! function (a) {
    var b = function (b, c) {
        this.$elem = a(b), this.$elem.data("instance", this), this.init(c)
    };
    b.prototype = {
        defaults: {
            classes: {
                animated: "list-view-animated",
                container: "list-view-wrapper",
                hidden: "list-view-hidden",
                stationaryHeader: "list-view-fake-header"
            },
            selectors: {
                groupContainer: ".list-view-group-container",
                groupHeader: ".list-view-group-header",
                stationaryHeader: "h2"
            }
        },
        init: function (b) {
            var c = this,
                d = navigator.userAgent.match(/ipad|iphone|ipod/gi) ? !0 : !1;
            this.options = a.extend(!0, {}, this.defaults, b || {}), this.elems = [], this.$elem.addClass("list-view"), this.$elem.children().wrapAll(["<div class='", this.options.classes.container, "' data-ios='", d, "'></div>"].join("")), this.$elem.prepend(["<", this.options.selectors.stationaryHeader, "/>"].join("")), this.$listWrapper = this.$elem.find("." + this.options.classes.container), this.$fakeHeader = this.$elem.find(this.options.selectors.stationaryHeader).eq(0), this.$fakeHeader.addClass(this.options.classes.stationaryHeader), this.$elem.find(this.options.selectors.groupContainer).each(function (a) {
                var b = c.$elem.find(c.options.selectors.groupContainer).eq(a),
                    d = b.find(c.options.selectors.groupHeader).eq(0),
                    e = b.height(),
                    f = b.position().top;
                c.elems.push({
                    list: b,
                    header: d,
                    listHeight: e,
                    headerText: d.text(),
                    headerHeight: d.outerHeight(),
                    listOffset: f,
                    listBottom: e + f
                })
            }), this.$fakeHeader.text(this.elems[0].headerText), this.$listWrapper.scroll(function () {
                c.testPosition()
            })
        },
        testPosition: function () {
            for (var b, c, d, e = this.$listWrapper.scrollTop(), f = 0; this.elems[f].listOffset - e <= 0 && (b = this.elems[f], d = b.listBottom - e, d < -b.headerHeight && (c = b), f++, !(f >= this.elems.length)););
            0 > d && d > -b.headerHeight ? (this.$fakeHeader.addClass(this.options.classes.hidden), a(b.list).addClass(this.options.classes.animated)) : (this.$fakeHeader.removeClass(this.options.classes.hidden), b && a(b.list).removeClass(this.options.classes.animated)), b && this.$fakeHeader.text(b.headerText)
        }
    }, a.fn.ioslist = function (c, d) {
        return this.each("string" == typeof c ? function () {
            a(this).data("instance")[c](d)
        } : function () {
            new b(this, c)
        })
    }
}(jQuery, window, document);
/*! Copyright 2012, Ben Lin (http://dreamerslab.com/)
 * Licensed under the MIT License (LICENSE.txt).
 *
 * Version: 1.0.16
 *
 * Requires: jQuery >= 1.2.3
 */
(function(a){a.fn.addBack=a.fn.addBack||a.fn.andSelf;
a.fn.extend({actual:function(b,l){if(!this[b]){throw'$.actual => The jQuery method "'+b+'" you called does not exist';}var f={absolute:false,clone:false,includeMargin:false};
var i=a.extend(f,l);var e=this.eq(0);var h,j;if(i.clone===true){h=function(){var m="position: absolute !important; top: -1000 !important; ";e=e.clone().attr("style",m).appendTo("body");
};j=function(){e.remove();};}else{var g=[];var d="";var c;h=function(){c=e.parents().addBack().filter(":hidden");d+="visibility: hidden !important; display: block !important; ";
if(i.absolute===true){d+="position: absolute !important; ";}c.each(function(){var m=a(this);var n=m.attr("style");g.push(n);m.attr("style",n?n+";"+d:d);
});};j=function(){c.each(function(m){var o=a(this);var n=g[m];if(n===undefined){o.removeAttr("style");}else{o.attr("style",n);}});};}h();var k=/(outer)/.test(b)?e[b](i.includeMargin):e[b]();
j();return k;}});})(jQuery);
/**
 * jQuery CSS Customizable Scrollbar
 *
 * Copyright 2015, Yuriy Khabarov
 * Dual licensed under the MIT or GPL Version 2 licenses.
 *
 * If you found bug, please contact me via email <13real008@gmail.com>
 *
 * Compressed by http://jscompress.com/
 *
 * @author Yuriy Khabarov aka Gromo
 * @version 0.2.11
 * @url https://github.com/gromo/jquery.scrollbar/
 *
 */
!function(a,b){"function"==typeof define&&define.amd?define(["jquery"],b):b("undefined"!=typeof exports?require("jquery"):a.jQuery)}(this,function(a){"use strict";function h(b){if(c.webkit&&!b)return{height:0,width:0};if(!c.data.outer){var d={border:"none","box-sizing":"content-box",height:"200px",margin:"0",padding:"0",width:"200px"};c.data.inner=a("<div>").css(a.extend({},d)),c.data.outer=a("<div>").css(a.extend({left:"-1000px",overflow:"scroll",position:"absolute",top:"-1000px"},d)).append(c.data.inner).appendTo("body")}return c.data.outer.scrollLeft(1e3).scrollTop(1e3),{height:Math.ceil(c.data.outer.offset().top-c.data.inner.offset().top||0),width:Math.ceil(c.data.outer.offset().left-c.data.inner.offset().left||0)}}function i(){var a=h(!0);return!(a.height||a.width)}function j(a){var b=a.originalEvent;return(!b.axis||b.axis!==b.HORIZONTAL_AXIS)&&!b.wheelDeltaX}var b=!1,c={data:{index:0,name:"scrollbar"},firefox:/firefox/i.test(navigator.userAgent),macosx:/mac/i.test(navigator.platform),msedge:/edge\/\d+/i.test(navigator.userAgent),msie:/(msie|trident)/i.test(navigator.userAgent),mobile:/android|webos|iphone|ipad|ipod|blackberry/i.test(navigator.userAgent),overlay:null,scroll:null,scrolls:[],webkit:/webkit/i.test(navigator.userAgent)&&!/edge\/\d+/i.test(navigator.userAgent)};c.scrolls.add=function(a){this.remove(a).push(a)},c.scrolls.remove=function(b){for(;a.inArray(b,this)>=0;)this.splice(a.inArray(b,this),1);return this};var d={autoScrollSize:!0,autoUpdate:!0,debug:!1,disableBodyScroll:!1,duration:200,ignoreMobile:!1,ignoreOverlay:!1,isRtl:!1,scrollStep:30,showArrows:!1,stepScrolling:!0,scrollx:null,scrolly:null,onDestroy:null,onFallback:null,onInit:null,onScroll:null,onUpdate:null},e=function(b){c.scroll||(c.overlay=i(),c.scroll=h(),g(),a(window).resize(function(){var a=!1;if(c.scroll&&(c.scroll.height||c.scroll.width)){var b=h();b.height===c.scroll.height&&b.width===c.scroll.width||(c.scroll=b,a=!0)}g(a)})),this.container=b,this.namespace=".scrollbar_"+c.data.index++,this.options=a.extend({},d,window.jQueryScrollbarOptions||{}),this.scrollTo=null,this.scrollx={},this.scrolly={},b.data(c.data.name,this),c.scrolls.add(this)};e.prototype={destroy:function(){if(this.wrapper){this.container.removeData(c.data.name),c.scrolls.remove(this);var b=this.container.scrollLeft(),d=this.container.scrollTop();this.container.insertBefore(this.wrapper).css({height:"",margin:"","max-height":""}).removeClass("scroll-content scroll-scrollx_visible scroll-scrolly_visible").off(this.namespace).scrollLeft(b).scrollTop(d),this.scrollx.scroll.removeClass("scroll-scrollx_visible").find("div").addBack().off(this.namespace),this.scrolly.scroll.removeClass("scroll-scrolly_visible").find("div").addBack().off(this.namespace),this.wrapper.remove(),a(document).add("body").off(this.namespace),a.isFunction(this.options.onDestroy)&&this.options.onDestroy.apply(this,[this.container])}},init:function(b){var d=this,e=this.container,f=this.containerWrapper||e,g=this.namespace,h=a.extend(this.options,b||{}),i={x:this.scrollx,y:this.scrolly},k=this.wrapper,l={},m={scrollLeft:e.scrollLeft(),scrollTop:e.scrollTop()};if(c.mobile&&h.ignoreMobile||c.overlay&&h.ignoreOverlay||c.macosx&&!c.webkit)return a.isFunction(h.onFallback)&&h.onFallback.apply(this,[e]),!1;if(k)l={height:"auto","margin-bottom":c.scroll.height*-1+"px","max-height":""},l[h.isRtl?"margin-left":"margin-right"]=c.scroll.width*-1+"px",f.css(l);else{if(this.wrapper=k=a("<div>").addClass("scroll-wrapper").addClass(e.attr("class")).css("position","absolute"===e.css("position")?"absolute":"relative").insertBefore(e).append(e),h.isRtl&&k.addClass("scroll--rtl"),e.is("textarea")&&(this.containerWrapper=f=a("<div>").insertBefore(e).append(e),k.addClass("scroll-textarea")),l={height:"auto","margin-bottom":c.scroll.height*-1+"px","max-height":""},l[h.isRtl?"margin-left":"margin-right"]=c.scroll.width*-1+"px",f.addClass("scroll-content").css(l),e.on("scroll"+g,function(b){var f=e.scrollLeft(),g=e.scrollTop();if(h.isRtl)switch(!0){case c.firefox:f=Math.abs(f);case c.msedge||c.msie:f=e[0].scrollWidth-e[0].clientWidth-f}a.isFunction(h.onScroll)&&h.onScroll.call(d,{maxScroll:i.y.maxScrollOffset,scroll:g,size:i.y.size,visible:i.y.visible},{maxScroll:i.x.maxScrollOffset,scroll:f,size:i.x.size,visible:i.x.visible}),i.x.isVisible&&i.x.scroll.bar.css("left",f*i.x.kx+"px"),i.y.isVisible&&i.y.scroll.bar.css("top",g*i.y.kx+"px")}),k.on("scroll"+g,function(){k.scrollTop(0).scrollLeft(0)}),h.disableBodyScroll){var n=function(a){j(a)?i.y.isVisible&&i.y.mousewheel(a):i.x.isVisible&&i.x.mousewheel(a)};k.on("MozMousePixelScroll"+g,n),k.on("mousewheel"+g,n),c.mobile&&k.on("touchstart"+g,function(b){var c=b.originalEvent.touches&&b.originalEvent.touches[0]||b,d={pageX:c.pageX,pageY:c.pageY},f={left:e.scrollLeft(),top:e.scrollTop()};a(document).on("touchmove"+g,function(a){var b=a.originalEvent.targetTouches&&a.originalEvent.targetTouches[0]||a;e.scrollLeft(f.left+d.pageX-b.pageX),e.scrollTop(f.top+d.pageY-b.pageY),a.preventDefault()}),a(document).on("touchend"+g,function(){a(document).off(g)})})}a.isFunction(h.onInit)&&h.onInit.apply(this,[e])}a.each(i,function(b,f){var k=null,l=1,m="x"===b?"scrollLeft":"scrollTop",n=h.scrollStep,o=function(){var a=e[m]();e[m](a+n),1==l&&a+n>=p&&(a=e[m]()),l==-1&&a+n<=p&&(a=e[m]()),e[m]()==a&&k&&k()},p=0;f.scroll||(f.scroll=d._getScroll(h["scroll"+b]).addClass("scroll-"+b),h.showArrows&&f.scroll.addClass("scroll-element_arrows_visible"),f.mousewheel=function(a){if(!f.isVisible||"x"===b&&j(a))return!0;if("y"===b&&!j(a))return i.x.mousewheel(a),!0;var c=a.originalEvent.wheelDelta*-1||a.originalEvent.detail,g=f.size-f.visible-f.offset;return c||("x"===b&&a.originalEvent.deltaX?c=40*a.originalEvent.deltaX:"y"===b&&a.originalEvent.deltaY&&(c=40*a.originalEvent.deltaY)),(c>0&&p<g||c<0&&p>0)&&(p+=c,p<0&&(p=0),p>g&&(p=g),d.scrollTo=d.scrollTo||{},d.scrollTo[m]=p,setTimeout(function(){d.scrollTo&&(e.stop().animate(d.scrollTo,240,"linear",function(){p=e[m]()}),d.scrollTo=null)},1)),a.preventDefault(),!1},f.scroll.on("MozMousePixelScroll"+g,f.mousewheel).on("mousewheel"+g,f.mousewheel).on("mouseenter"+g,function(){p=e[m]()}),f.scroll.find(".scroll-arrow, .scroll-element_track").on("mousedown"+g,function(g){if(1!=g.which)return!0;l=1;var i={eventOffset:g["x"===b?"pageX":"pageY"],maxScrollValue:f.size-f.visible-f.offset,scrollbarOffset:f.scroll.bar.offset()["x"===b?"left":"top"],scrollbarSize:f.scroll.bar["x"===b?"outerWidth":"outerHeight"]()},j=0,q=0;if(a(this).hasClass("scroll-arrow")){if(l=a(this).hasClass("scroll-arrow_more")?1:-1,n=h.scrollStep*l,p=l>0?i.maxScrollValue:0,h.isRtl)switch(!0){case c.firefox:p=l>0?0:i.maxScrollValue*-1;break;case c.msie||c.msedge:}}else l=i.eventOffset>i.scrollbarOffset+i.scrollbarSize?1:i.eventOffset<i.scrollbarOffset?-1:0,"x"===b&&h.isRtl&&(c.msie||c.msedge)&&(l*=-1),n=Math.round(.75*f.visible)*l,p=i.eventOffset-i.scrollbarOffset-(h.stepScrolling?1==l?i.scrollbarSize:0:Math.round(i.scrollbarSize/2)),p=e[m]()+p/f.kx;return d.scrollTo=d.scrollTo||{},d.scrollTo[m]=h.stepScrolling?e[m]()+n:p,h.stepScrolling&&(k=function(){p=e[m](),clearInterval(q),clearTimeout(j),j=0,q=0},j=setTimeout(function(){q=setInterval(o,40)},h.duration+100)),setTimeout(function(){d.scrollTo&&(e.animate(d.scrollTo,h.duration),d.scrollTo=null)},1),d._handleMouseDown(k,g)}),f.scroll.bar.on("mousedown"+g,function(i){if(1!=i.which)return!0;var j=i["x"===b?"pageX":"pageY"],k=e[m]();return f.scroll.addClass("scroll-draggable"),a(document).on("mousemove"+g,function(a){var d=parseInt((a["x"===b?"pageX":"pageY"]-j)/f.kx,10);"x"===b&&h.isRtl&&(c.msie||c.msedge)&&(d*=-1),e[m](k+d)}),d._handleMouseDown(function(){f.scroll.removeClass("scroll-draggable"),p=e[m]()},i)}))}),a.each(i,function(a,b){var c="scroll-scroll"+a+"_visible",d="x"==a?i.y:i.x;b.scroll.removeClass(c),d.scroll.removeClass(c),f.removeClass(c)}),a.each(i,function(b,c){a.extend(c,"x"==b?{offset:parseInt(e.css("left"),10)||0,size:e.prop("scrollWidth"),visible:k.width()}:{offset:parseInt(e.css("top"),10)||0,size:e.prop("scrollHeight"),visible:k.height()})}),this._updateScroll("x",this.scrollx),this._updateScroll("y",this.scrolly),a.isFunction(h.onUpdate)&&h.onUpdate.apply(this,[e]),a.each(i,function(a,b){var c="x"===a?"left":"top",d="x"===a?"outerWidth":"outerHeight",f="x"===a?"width":"height",g=parseInt(e.css(c),10)||0,i=b.size,j=b.visible+g,k=b.scroll.size[d]()+(parseInt(b.scroll.size.css(c),10)||0);h.autoScrollSize&&(b.scrollbarSize=parseInt(k*j/i,10),b.scroll.bar.css(f,b.scrollbarSize+"px")),b.scrollbarSize=b.scroll.bar[d](),b.kx=(k-b.scrollbarSize)/(i-j)||1,b.maxScrollOffset=i-j}),e.scrollLeft(m.scrollLeft).scrollTop(m.scrollTop).trigger("scroll")},_getScroll:function(b){var c={advanced:['<div class="scroll-element">','<div class="scroll-element_corner"></div>','<div class="scroll-arrow scroll-arrow_less"></div>','<div class="scroll-arrow scroll-arrow_more"></div>','<div class="scroll-element_outer">','<div class="scroll-element_size"></div>','<div class="scroll-element_inner-wrapper">','<div class="scroll-element_inner scroll-element_track">','<div class="scroll-element_inner-bottom"></div>',"</div>","</div>",'<div class="scroll-bar">','<div class="scroll-bar_body">','<div class="scroll-bar_body-inner"></div>',"</div>",'<div class="scroll-bar_bottom"></div>','<div class="scroll-bar_center"></div>',"</div>","</div>","</div>"].join(""),simple:['<div class="scroll-element">','<div class="scroll-element_outer">','<div class="scroll-element_size"></div>','<div class="scroll-element_track"></div>','<div class="scroll-bar"></div>',"</div>","</div>"].join("")};return c[b]&&(b=c[b]),b||(b=c.simple),b="string"==typeof b?a(b).appendTo(this.wrapper):a(b),a.extend(b,{bar:b.find(".scroll-bar"),size:b.find(".scroll-element_size"),track:b.find(".scroll-element_track")}),b},_handleMouseDown:function(b,c){var d=this.namespace;return a(document).on("blur"+d,function(){a(document).add("body").off(d),b&&b()}),a(document).on("dragstart"+d,function(a){return a.preventDefault(),!1}),a(document).on("mouseup"+d,function(){a(document).add("body").off(d),b&&b()}),a("body").on("selectstart"+d,function(a){return a.preventDefault(),!1}),c&&c.preventDefault(),!1},_updateScroll:function(b,d){var e=this.container,f=this.containerWrapper||e,g="scroll-scroll"+b+"_visible",h="x"===b?this.scrolly:this.scrollx,i=parseInt(this.container.css("x"===b?"left":"top"),10)||0,j=this.wrapper,k=d.size,l=d.visible+i;d.isVisible=k-l>1,d.isVisible?(d.scroll.addClass(g),h.scroll.addClass(g),f.addClass(g)):(d.scroll.removeClass(g),h.scroll.removeClass(g),f.removeClass(g)),"y"===b&&(e.is("textarea")||k<l?f.css({height:l+c.scroll.height+"px","max-height":"none"}):f.css({"max-height":l+c.scroll.height+"px"})),d.size==e.prop("scrollWidth")&&h.size==e.prop("scrollHeight")&&d.visible==j.width()&&h.visible==j.height()&&d.offset==(parseInt(e.css("left"),10)||0)&&h.offset==(parseInt(e.css("top"),10)||0)||(a.extend(this.scrollx,{offset:parseInt(e.css("left"),10)||0,size:e.prop("scrollWidth"),visible:j.width()}),a.extend(this.scrolly,{offset:parseInt(e.css("top"),10)||0,size:this.container.prop("scrollHeight"),visible:j.height()}),this._updateScroll("x"===b?"y":"x",h))}};var f=e;a.fn.scrollbar=function(b,d){return"string"!=typeof b&&(d=b,b="init"),"undefined"==typeof d&&(d=[]),a.isArray(d)||(d=[d]),this.not("body, .scroll-wrapper").each(function(){var e=a(this),g=e.data(c.data.name);(g||"init"===b)&&(g||(g=new f(e)),g[b]&&g[b].apply(g,d))}),this},a.fn.scrollbar.options=d;var g=function(){var a=0,d=0;return function(e){var f,h,i,j,k,l,m;for(f=0;f<c.scrolls.length;f++)j=c.scrolls[f],h=j.container,i=j.options,k=j.wrapper,l=j.scrollx,m=j.scrolly,(e||i.autoUpdate&&k&&k.is(":visible")&&(h.prop("scrollWidth")!=l.size||h.prop("scrollHeight")!=m.size||k.width()!=l.visible||k.height()!=m.visible))&&(j.init(),i.debug&&(window.console&&console.log({scrollHeight:h.prop("scrollHeight")+":"+j.scrolly.size,scrollWidth:h.prop("scrollWidth")+":"+j.scrollx.size,visibleHeight:k.height()+":"+j.scrolly.visible,visibleWidth:k.width()+":"+j.scrollx.visible},!0),d++));b&&d>10?(window.console&&console.log("Scroll updates exceed 10"),g=function(){}):(clearTimeout(a),a=setTimeout(g,300))}}();window.angular&&!function(a){a.module("jQueryScrollbar",[]).provider("jQueryScrollbar",function(){var b=d;return{setOptions:function(c){a.extend(b,c)},$get:function(){return{options:a.copy(b)}}}}).directive("jqueryScrollbar",["jQueryScrollbar","$parse",function(a,b){return{restrict:"AC",link:function(c,d,e){var f=b(e.jqueryScrollbar),g=f(c);d.scrollbar(g||a.options).on("$destroy",function(){d.scrollbar("destroy")})}}}])}(window.angular)});
/*! Select2 4.0.3 | https://github.com/select2/select2/blob/master/LICENSE.md */!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):a("object"==typeof exports?require("jquery"):jQuery)}(function(a){var b=function(){if(a&&a.fn&&a.fn.select2&&a.fn.select2.amd)var b=a.fn.select2.amd;var b;return function(){if(!b||!b.requirejs){b?c=b:b={};var a,c,d;!function(b){function e(a,b){return u.call(a,b)}function f(a,b){var c,d,e,f,g,h,i,j,k,l,m,n=b&&b.split("/"),o=s.map,p=o&&o["*"]||{};if(a&&"."===a.charAt(0))if(b){for(a=a.split("/"),g=a.length-1,s.nodeIdCompat&&w.test(a[g])&&(a[g]=a[g].replace(w,"")),a=n.slice(0,n.length-1).concat(a),k=0;k<a.length;k+=1)if(m=a[k],"."===m)a.splice(k,1),k-=1;else if(".."===m){if(1===k&&(".."===a[2]||".."===a[0]))break;k>0&&(a.splice(k-1,2),k-=2)}a=a.join("/")}else 0===a.indexOf("./")&&(a=a.substring(2));if((n||p)&&o){for(c=a.split("/"),k=c.length;k>0;k-=1){if(d=c.slice(0,k).join("/"),n)for(l=n.length;l>0;l-=1)if(e=o[n.slice(0,l).join("/")],e&&(e=e[d])){f=e,h=k;break}if(f)break;!i&&p&&p[d]&&(i=p[d],j=k)}!f&&i&&(f=i,h=j),f&&(c.splice(0,h,f),a=c.join("/"))}return a}function g(a,c){return function(){var d=v.call(arguments,0);return"string"!=typeof d[0]&&1===d.length&&d.push(null),n.apply(b,d.concat([a,c]))}}function h(a){return function(b){return f(b,a)}}function i(a){return function(b){q[a]=b}}function j(a){if(e(r,a)){var c=r[a];delete r[a],t[a]=!0,m.apply(b,c)}if(!e(q,a)&&!e(t,a))throw new Error("No "+a);return q[a]}function k(a){var b,c=a?a.indexOf("!"):-1;return c>-1&&(b=a.substring(0,c),a=a.substring(c+1,a.length)),[b,a]}function l(a){return function(){return s&&s.config&&s.config[a]||{}}}var m,n,o,p,q={},r={},s={},t={},u=Object.prototype.hasOwnProperty,v=[].slice,w=/\.js$/;o=function(a,b){var c,d=k(a),e=d[0];return a=d[1],e&&(e=f(e,b),c=j(e)),e?a=c&&c.normalize?c.normalize(a,h(b)):f(a,b):(a=f(a,b),d=k(a),e=d[0],a=d[1],e&&(c=j(e))),{f:e?e+"!"+a:a,n:a,pr:e,p:c}},p={require:function(a){return g(a)},exports:function(a){var b=q[a];return"undefined"!=typeof b?b:q[a]={}},module:function(a){return{id:a,uri:"",exports:q[a],config:l(a)}}},m=function(a,c,d,f){var h,k,l,m,n,s,u=[],v=typeof d;if(f=f||a,"undefined"===v||"function"===v){for(c=!c.length&&d.length?["require","exports","module"]:c,n=0;n<c.length;n+=1)if(m=o(c[n],f),k=m.f,"require"===k)u[n]=p.require(a);else if("exports"===k)u[n]=p.exports(a),s=!0;else if("module"===k)h=u[n]=p.module(a);else if(e(q,k)||e(r,k)||e(t,k))u[n]=j(k);else{if(!m.p)throw new Error(a+" missing "+k);m.p.load(m.n,g(f,!0),i(k),{}),u[n]=q[k]}l=d?d.apply(q[a],u):void 0,a&&(h&&h.exports!==b&&h.exports!==q[a]?q[a]=h.exports:l===b&&s||(q[a]=l))}else a&&(q[a]=d)},a=c=n=function(a,c,d,e,f){if("string"==typeof a)return p[a]?p[a](c):j(o(a,c).f);if(!a.splice){if(s=a,s.deps&&n(s.deps,s.callback),!c)return;c.splice?(a=c,c=d,d=null):a=b}return c=c||function(){},"function"==typeof d&&(d=e,e=f),e?m(b,a,c,d):setTimeout(function(){m(b,a,c,d)},4),n},n.config=function(a){return n(a)},a._defined=q,d=function(a,b,c){if("string"!=typeof a)throw new Error("See almond README: incorrect module build, no module name");b.splice||(c=b,b=[]),e(q,a)||e(r,a)||(r[a]=[a,b,c])},d.amd={jQuery:!0}}(),b.requirejs=a,b.require=c,b.define=d}}(),b.define("almond",function(){}),b.define("jquery",[],function(){var b=a||$;return null==b&&console&&console.error&&console.error("Select2: An instance of jQuery or a jQuery-compatible library was not found. Make sure that you are including jQuery before Select2 on your web page."),b}),b.define("select2/utils",["jquery"],function(a){function b(a){var b=a.prototype,c=[];for(var d in b){var e=b[d];"function"==typeof e&&"constructor"!==d&&c.push(d)}return c}var c={};c.Extend=function(a,b){function c(){this.constructor=a}var d={}.hasOwnProperty;for(var e in b)d.call(b,e)&&(a[e]=b[e]);return c.prototype=b.prototype,a.prototype=new c,a.__super__=b.prototype,a},c.Decorate=function(a,c){function d(){var b=Array.prototype.unshift,d=c.prototype.constructor.length,e=a.prototype.constructor;d>0&&(b.call(arguments,a.prototype.constructor),e=c.prototype.constructor),e.apply(this,arguments)}function e(){this.constructor=d}var f=b(c),g=b(a);c.displayName=a.displayName,d.prototype=new e;for(var h=0;h<g.length;h++){var i=g[h];d.prototype[i]=a.prototype[i]}for(var j=(function(a){var b=function(){};a in d.prototype&&(b=d.prototype[a]);var e=c.prototype[a];return function(){var a=Array.prototype.unshift;return a.call(arguments,b),e.apply(this,arguments)}}),k=0;k<f.length;k++){var l=f[k];d.prototype[l]=j(l)}return d};var d=function(){this.listeners={}};return d.prototype.on=function(a,b){this.listeners=this.listeners||{},a in this.listeners?this.listeners[a].push(b):this.listeners[a]=[b]},d.prototype.trigger=function(a){var b=Array.prototype.slice,c=b.call(arguments,1);this.listeners=this.listeners||{},null==c&&(c=[]),0===c.length&&c.push({}),c[0]._type=a,a in this.listeners&&this.invoke(this.listeners[a],b.call(arguments,1)),"*"in this.listeners&&this.invoke(this.listeners["*"],arguments)},d.prototype.invoke=function(a,b){for(var c=0,d=a.length;d>c;c++)a[c].apply(this,b)},c.Observable=d,c.generateChars=function(a){for(var b="",c=0;a>c;c++){var d=Math.floor(36*Math.random());b+=d.toString(36)}return b},c.bind=function(a,b){return function(){a.apply(b,arguments)}},c._convertData=function(a){for(var b in a){var c=b.split("-"),d=a;if(1!==c.length){for(var e=0;e<c.length;e++){var f=c[e];f=f.substring(0,1).toLowerCase()+f.substring(1),f in d||(d[f]={}),e==c.length-1&&(d[f]=a[b]),d=d[f]}delete a[b]}}return a},c.hasScroll=function(b,c){var d=a(c),e=c.style.overflowX,f=c.style.overflowY;return e!==f||"hidden"!==f&&"visible"!==f?"scroll"===e||"scroll"===f?!0:d.innerHeight()<c.scrollHeight||d.innerWidth()<c.scrollWidth:!1},c.escapeMarkup=function(a){var b={"\\":"&#92;","&":"&amp;","<":"&lt;",">":"&gt;",'"':"&quot;","'":"&#39;","/":"&#47;"};return"string"!=typeof a?a:String(a).replace(/[&<>"'\/\\]/g,function(a){return b[a]})},c.appendMany=function(b,c){if("1.7"===a.fn.jquery.substr(0,3)){var d=a();a.map(c,function(a){d=d.add(a)}),c=d}b.append(c)},c}),b.define("select2/results",["jquery","./utils"],function(a,b){function c(a,b,d){this.$element=a,this.data=d,this.options=b,c.__super__.constructor.call(this)}return b.Extend(c,b.Observable),c.prototype.render=function(){var b=a('<ul class="select2-results__options" role="tree"></ul>');return this.options.get("multiple")&&b.attr("aria-multiselectable","true"),this.$results=b,b},c.prototype.clear=function(){this.$results.empty()},c.prototype.displayMessage=function(b){var c=this.options.get("escapeMarkup");this.clear(),this.hideLoading();var d=a('<li role="treeitem" aria-live="assertive" class="select2-results__option"></li>'),e=this.options.get("translations").get(b.message);d.append(c(e(b.args))),d[0].className+=" select2-results__message",this.$results.append(d)},c.prototype.hideMessages=function(){this.$results.find(".select2-results__message").remove()},c.prototype.append=function(a){this.hideLoading();var b=[];if(null==a.results||0===a.results.length)return void(0===this.$results.children().length&&this.trigger("results:message",{message:"noResults"}));a.results=this.sort(a.results);for(var c=0;c<a.results.length;c++){var d=a.results[c],e=this.option(d);b.push(e)}this.$results.append(b)},c.prototype.position=function(a,b){var c=b.find(".select2-results");c.append(a)},c.prototype.sort=function(a){var b=this.options.get("sorter");return b(a)},c.prototype.highlightFirstItem=function(){var a=this.$results.find(".select2-results__option[aria-selected]"),b=a.filter("[aria-selected=true]");b.length>0?b.first().trigger("mouseenter"):a.first().trigger("mouseenter"),this.ensureHighlightVisible()},c.prototype.setClasses=function(){var b=this;this.data.current(function(c){var d=a.map(c,function(a){return a.id.toString()}),e=b.$results.find(".select2-results__option[aria-selected]");e.each(function(){var b=a(this),c=a.data(this,"data"),e=""+c.id;null!=c.element&&c.element.selected||null==c.element&&a.inArray(e,d)>-1?b.attr("aria-selected","true"):b.attr("aria-selected","false")})})},c.prototype.showLoading=function(a){this.hideLoading();var b=this.options.get("translations").get("searching"),c={disabled:!0,loading:!0,text:b(a)},d=this.option(c);d.className+=" loading-results",this.$results.prepend(d)},c.prototype.hideLoading=function(){this.$results.find(".loading-results").remove()},c.prototype.option=function(b){var c=document.createElement("li");c.className="select2-results__option";var d={role:"treeitem","aria-selected":"false"};b.disabled&&(delete d["aria-selected"],d["aria-disabled"]="true"),null==b.id&&delete d["aria-selected"],null!=b._resultId&&(c.id=b._resultId),b.title&&(c.title=b.title),b.children&&(d.role="group",d["aria-label"]=b.text,delete d["aria-selected"]);for(var e in d){var f=d[e];c.setAttribute(e,f)}if(b.children){var g=a(c),h=document.createElement("strong");h.className="select2-results__group";a(h);this.template(b,h);for(var i=[],j=0;j<b.children.length;j++){var k=b.children[j],l=this.option(k);i.push(l)}var m=a("<ul></ul>",{"class":"select2-results__options select2-results__options--nested"});m.append(i),g.append(h),g.append(m)}else this.template(b,c);return a.data(c,"data",b),c},c.prototype.bind=function(b,c){var d=this,e=b.id+"-results";this.$results.attr("id",e),b.on("results:all",function(a){d.clear(),d.append(a.data),b.isOpen()&&(d.setClasses(),d.highlightFirstItem())}),b.on("results:append",function(a){d.append(a.data),b.isOpen()&&d.setClasses()}),b.on("query",function(a){d.hideMessages(),d.showLoading(a)}),b.on("select",function(){b.isOpen()&&(d.setClasses(),d.highlightFirstItem())}),b.on("unselect",function(){b.isOpen()&&(d.setClasses(),d.highlightFirstItem())}),b.on("open",function(){d.$results.attr("aria-expanded","true"),d.$results.attr("aria-hidden","false"),d.setClasses(),d.ensureHighlightVisible()}),b.on("close",function(){d.$results.attr("aria-expanded","false"),d.$results.attr("aria-hidden","true"),d.$results.removeAttr("aria-activedescendant")}),b.on("results:toggle",function(){var a=d.getHighlightedResults();0!==a.length&&a.trigger("mouseup")}),b.on("results:select",function(){var a=d.getHighlightedResults();if(0!==a.length){var b=a.data("data");"true"==a.attr("aria-selected")?d.trigger("close",{}):d.trigger("select",{data:b})}}),b.on("results:previous",function(){var a=d.getHighlightedResults(),b=d.$results.find("[aria-selected]"),c=b.index(a);if(0!==c){var e=c-1;0===a.length&&(e=0);var f=b.eq(e);f.trigger("mouseenter");var g=d.$results.offset().top,h=f.offset().top,i=d.$results.scrollTop()+(h-g);0===e?d.$results.scrollTop(0):0>h-g&&d.$results.scrollTop(i)}}),b.on("results:next",function(){var a=d.getHighlightedResults(),b=d.$results.find("[aria-selected]"),c=b.index(a),e=c+1;if(!(e>=b.length)){var f=b.eq(e);f.trigger("mouseenter");var g=d.$results.offset().top+d.$results.outerHeight(!1),h=f.offset().top+f.outerHeight(!1),i=d.$results.scrollTop()+h-g;0===e?d.$results.scrollTop(0):h>g&&d.$results.scrollTop(i)}}),b.on("results:focus",function(a){a.element.addClass("select2-results__option--highlighted")}),b.on("results:message",function(a){d.displayMessage(a)}),a.fn.mousewheel&&this.$results.on("mousewheel",function(a){var b=d.$results.scrollTop(),c=d.$results.get(0).scrollHeight-b+a.deltaY,e=a.deltaY>0&&b-a.deltaY<=0,f=a.deltaY<0&&c<=d.$results.height();e?(d.$results.scrollTop(0),a.preventDefault(),a.stopPropagation()):f&&(d.$results.scrollTop(d.$results.get(0).scrollHeight-d.$results.height()),a.preventDefault(),a.stopPropagation())}),this.$results.on("mouseup",".select2-results__option[aria-selected]",function(b){var c=a(this),e=c.data("data");return"true"===c.attr("aria-selected")?void(d.options.get("multiple")?d.trigger("unselect",{originalEvent:b,data:e}):d.trigger("close",{})):void d.trigger("select",{originalEvent:b,data:e})}),this.$results.on("mouseenter",".select2-results__option[aria-selected]",function(b){var c=a(this).data("data");d.getHighlightedResults().removeClass("select2-results__option--highlighted"),d.trigger("results:focus",{data:c,element:a(this)})})},c.prototype.getHighlightedResults=function(){var a=this.$results.find(".select2-results__option--highlighted");return a},c.prototype.destroy=function(){this.$results.remove()},c.prototype.ensureHighlightVisible=function(){var a=this.getHighlightedResults();if(0!==a.length){var b=this.$results.find("[aria-selected]"),c=b.index(a),d=this.$results.offset().top,e=a.offset().top,f=this.$results.scrollTop()+(e-d),g=e-d;f-=2*a.outerHeight(!1),2>=c?this.$results.scrollTop(0):(g>this.$results.outerHeight()||0>g)&&this.$results.scrollTop(f)}},c.prototype.template=function(b,c){var d=this.options.get("templateResult"),e=this.options.get("escapeMarkup"),f=d(b,c);null==f?c.style.display="none":"string"==typeof f?c.innerHTML=e(f):a(c).append(f)},c}),b.define("select2/keys",[],function(){var a={BACKSPACE:8,TAB:9,ENTER:13,SHIFT:16,CTRL:17,ALT:18,ESC:27,SPACE:32,PAGE_UP:33,PAGE_DOWN:34,END:35,HOME:36,LEFT:37,UP:38,RIGHT:39,DOWN:40,DELETE:46};return a}),b.define("select2/selection/base",["jquery","../utils","../keys"],function(a,b,c){function d(a,b){this.$element=a,this.options=b,d.__super__.constructor.call(this)}return b.Extend(d,b.Observable),d.prototype.render=function(){var b=a('<span class="select2-selection" role="combobox"  aria-haspopup="true" aria-expanded="false"></span>');return this._tabindex=0,null!=this.$element.data("old-tabindex")?this._tabindex=this.$element.data("old-tabindex"):null!=this.$element.attr("tabindex")&&(this._tabindex=this.$element.attr("tabindex")),b.attr("title",this.$element.attr("title")),b.attr("tabindex",this._tabindex),this.$selection=b,b},d.prototype.bind=function(a,b){var d=this,e=(a.id+"-container",a.id+"-results");this.container=a,this.$selection.on("focus",function(a){d.trigger("focus",a)}),this.$selection.on("blur",function(a){d._handleBlur(a)}),this.$selection.on("keydown",function(a){d.trigger("keypress",a),a.which===c.SPACE&&a.preventDefault()}),a.on("results:focus",function(a){d.$selection.attr("aria-activedescendant",a.data._resultId)}),a.on("selection:update",function(a){d.update(a.data)}),a.on("open",function(){d.$selection.attr("aria-expanded","true"),d.$selection.attr("aria-owns",e),d._attachCloseHandler(a)}),a.on("close",function(){d.$selection.attr("aria-expanded","false"),d.$selection.removeAttr("aria-activedescendant"),d.$selection.removeAttr("aria-owns"),d.$selection.focus(),d._detachCloseHandler(a)}),a.on("enable",function(){d.$selection.attr("tabindex",d._tabindex)}),a.on("disable",function(){d.$selection.attr("tabindex","-1")})},d.prototype._handleBlur=function(b){var c=this;window.setTimeout(function(){document.activeElement==c.$selection[0]||a.contains(c.$selection[0],document.activeElement)||c.trigger("blur",b)},1)},d.prototype._attachCloseHandler=function(b){a(document.body).on("mousedown.select2."+b.id,function(b){var c=a(b.target),d=c.closest(".select2"),e=a(".select2.select2-container--open");e.each(function(){var b=a(this);if(this!=d[0]){var c=b.data("element");c.select2("close")}})})},d.prototype._detachCloseHandler=function(b){a(document.body).off("mousedown.select2."+b.id)},d.prototype.position=function(a,b){var c=b.find(".selection");c.append(a)},d.prototype.destroy=function(){this._detachCloseHandler(this.container)},d.prototype.update=function(a){throw new Error("The `update` method must be defined in child classes.")},d}),b.define("select2/selection/single",["jquery","./base","../utils","../keys"],function(a,b,c,d){function e(){e.__super__.constructor.apply(this,arguments)}return c.Extend(e,b),e.prototype.render=function(){var a=e.__super__.render.call(this);return a.addClass("select2-selection--single"),a.html('<span class="select2-selection__rendered"></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span>'),a},e.prototype.bind=function(a,b){var c=this;e.__super__.bind.apply(this,arguments);var d=a.id+"-container";this.$selection.find(".select2-selection__rendered").attr("id",d),this.$selection.attr("aria-labelledby",d),this.$selection.on("mousedown",function(a){1===a.which&&c.trigger("toggle",{originalEvent:a})}),this.$selection.on("focus",function(a){}),this.$selection.on("blur",function(a){}),a.on("focus",function(b){a.isOpen()||c.$selection.focus()}),a.on("selection:update",function(a){c.update(a.data)})},e.prototype.clear=function(){this.$selection.find(".select2-selection__rendered").empty()},e.prototype.display=function(a,b){var c=this.options.get("templateSelection"),d=this.options.get("escapeMarkup");return d(c(a,b))},e.prototype.selectionContainer=function(){return a("<span></span>")},e.prototype.update=function(a){if(0===a.length)return void this.clear();var b=a[0],c=this.$selection.find(".select2-selection__rendered"),d=this.display(b,c);c.empty().append(d),c.prop("title",b.title||b.text)},e}),b.define("select2/selection/multiple",["jquery","./base","../utils"],function(a,b,c){function d(a,b){d.__super__.constructor.apply(this,arguments)}return c.Extend(d,b),d.prototype.render=function(){var a=d.__super__.render.call(this);return a.addClass("select2-selection--multiple"),a.html('<ul class="select2-selection__rendered"></ul>'),a},d.prototype.bind=function(b,c){var e=this;d.__super__.bind.apply(this,arguments),this.$selection.on("click",function(a){e.trigger("toggle",{originalEvent:a})}),this.$selection.on("click",".select2-selection__choice__remove",function(b){if(!e.options.get("disabled")){var c=a(this),d=c.parent(),f=d.data("data");e.trigger("unselect",{originalEvent:b,data:f})}})},d.prototype.clear=function(){this.$selection.find(".select2-selection__rendered").empty()},d.prototype.display=function(a,b){var c=this.options.get("templateSelection"),d=this.options.get("escapeMarkup");return d(c(a,b))},d.prototype.selectionContainer=function(){var b=a('<li class="select2-selection__choice"><span class="select2-selection__choice__remove" role="presentation">&times;</span></li>');return b},d.prototype.update=function(a){if(this.clear(),0!==a.length){for(var b=[],d=0;d<a.length;d++){var e=a[d],f=this.selectionContainer(),g=this.display(e,f);f.append(g),f.prop("title",e.title||e.text),f.data("data",e),b.push(f)}var h=this.$selection.find(".select2-selection__rendered");c.appendMany(h,b)}},d}),b.define("select2/selection/placeholder",["../utils"],function(a){function b(a,b,c){this.placeholder=this.normalizePlaceholder(c.get("placeholder")),a.call(this,b,c)}return b.prototype.normalizePlaceholder=function(a,b){return"string"==typeof b&&(b={id:"",text:b}),b},b.prototype.createPlaceholder=function(a,b){var c=this.selectionContainer();return c.html(this.display(b)),c.addClass("select2-selection__placeholder").removeClass("select2-selection__choice"),c},b.prototype.update=function(a,b){var c=1==b.length&&b[0].id!=this.placeholder.id,d=b.length>1;if(d||c)return a.call(this,b);this.clear();var e=this.createPlaceholder(this.placeholder);this.$selection.find(".select2-selection__rendered").append(e)},b}),b.define("select2/selection/allowClear",["jquery","../keys"],function(a,b){function c(){}return c.prototype.bind=function(a,b,c){var d=this;a.call(this,b,c),null==this.placeholder&&this.options.get("debug")&&window.console&&console.error&&console.error("Select2: The `allowClear` option should be used in combination with the `placeholder` option."),this.$selection.on("mousedown",".select2-selection__clear",function(a){d._handleClear(a)}),b.on("keypress",function(a){d._handleKeyboardClear(a,b)})},c.prototype._handleClear=function(a,b){if(!this.options.get("disabled")){var c=this.$selection.find(".select2-selection__clear");if(0!==c.length){b.stopPropagation();for(var d=c.data("data"),e=0;e<d.length;e++){var f={data:d[e]};if(this.trigger("unselect",f),f.prevented)return}this.$element.val(this.placeholder.id).trigger("change"),this.trigger("toggle",{})}}},c.prototype._handleKeyboardClear=function(a,c,d){d.isOpen()||(c.which==b.DELETE||c.which==b.BACKSPACE)&&this._handleClear(c)},c.prototype.update=function(b,c){if(b.call(this,c),!(this.$selection.find(".select2-selection__placeholder").length>0||0===c.length)){var d=a('<span class="select2-selection__clear">&times;</span>');d.data("data",c),this.$selection.find(".select2-selection__rendered").prepend(d)}},c}),b.define("select2/selection/search",["jquery","../utils","../keys"],function(a,b,c){function d(a,b,c){a.call(this,b,c)}return d.prototype.render=function(b){var c=a('<li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="-1" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" /></li>');this.$searchContainer=c,this.$search=c.find("input");var d=b.call(this);return this._transferTabIndex(),d},d.prototype.bind=function(a,b,d){var e=this;a.call(this,b,d),b.on("open",function(){e.$search.trigger("focus")}),b.on("close",function(){e.$search.val(""),e.$search.removeAttr("aria-activedescendant"),e.$search.trigger("focus")}),b.on("enable",function(){e.$search.prop("disabled",!1),e._transferTabIndex()}),b.on("disable",function(){e.$search.prop("disabled",!0)}),b.on("focus",function(a){e.$search.trigger("focus")}),b.on("results:focus",function(a){e.$search.attr("aria-activedescendant",a.id)}),this.$selection.on("focusin",".select2-search--inline",function(a){e.trigger("focus",a)}),this.$selection.on("focusout",".select2-search--inline",function(a){e._handleBlur(a)}),this.$selection.on("keydown",".select2-search--inline",function(a){a.stopPropagation(),e.trigger("keypress",a),e._keyUpPrevented=a.isDefaultPrevented();var b=a.which;if(b===c.BACKSPACE&&""===e.$search.val()){var d=e.$searchContainer.prev(".select2-selection__choice");if(d.length>0){var f=d.data("data");e.searchRemoveChoice(f),a.preventDefault()}}});var f=document.documentMode,g=f&&11>=f;this.$selection.on("input.searchcheck",".select2-search--inline",function(a){return g?void e.$selection.off("input.search input.searchcheck"):void e.$selection.off("keyup.search")}),this.$selection.on("keyup.search input.search",".select2-search--inline",function(a){if(g&&"input"===a.type)return void e.$selection.off("input.search input.searchcheck");var b=a.which;b!=c.SHIFT&&b!=c.CTRL&&b!=c.ALT&&b!=c.TAB&&e.handleSearch(a)})},d.prototype._transferTabIndex=function(a){this.$search.attr("tabindex",this.$selection.attr("tabindex")),this.$selection.attr("tabindex","-1")},d.prototype.createPlaceholder=function(a,b){this.$search.attr("placeholder",b.text)},d.prototype.update=function(a,b){var c=this.$search[0]==document.activeElement;this.$search.attr("placeholder",""),a.call(this,b),this.$selection.find(".select2-selection__rendered").append(this.$searchContainer),this.resizeSearch(),c&&this.$search.focus()},d.prototype.handleSearch=function(){if(this.resizeSearch(),!this._keyUpPrevented){var a=this.$search.val();this.trigger("query",{term:a})}this._keyUpPrevented=!1},d.prototype.searchRemoveChoice=function(a,b){this.trigger("unselect",{data:b}),this.$search.val(b.text),this.handleSearch()},d.prototype.resizeSearch=function(){this.$search.css("width","25px");var a="";if(""!==this.$search.attr("placeholder"))a=this.$selection.find(".select2-selection__rendered").innerWidth();else{var b=this.$search.val().length+1;a=.75*b+"em"}this.$search.css("width",a)},d}),b.define("select2/selection/eventRelay",["jquery"],function(a){function b(){}return b.prototype.bind=function(b,c,d){var e=this,f=["open","opening","close","closing","select","selecting","unselect","unselecting"],g=["opening","closing","selecting","unselecting"];b.call(this,c,d),c.on("*",function(b,c){if(-1!==a.inArray(b,f)){c=c||{};var d=a.Event("select2:"+b,{params:c});e.$element.trigger(d),-1!==a.inArray(b,g)&&(c.prevented=d.isDefaultPrevented())}})},b}),b.define("select2/translation",["jquery","require"],function(a,b){function c(a){this.dict=a||{}}return c.prototype.all=function(){return this.dict},c.prototype.get=function(a){return this.dict[a]},c.prototype.extend=function(b){this.dict=a.extend({},b.all(),this.dict)},c._cache={},c.loadPath=function(a){if(!(a in c._cache)){var d=b(a);c._cache[a]=d}return new c(c._cache[a])},c}),b.define("select2/diacritics",[],function(){var a={"Ⓐ":"A","Ａ":"A","À":"A","Á":"A","Â":"A","Ầ":"A","Ấ":"A","Ẫ":"A","Ẩ":"A","Ã":"A","Ā":"A","Ă":"A","Ằ":"A","Ắ":"A","Ẵ":"A","Ẳ":"A","Ȧ":"A","Ǡ":"A","Ä":"A","Ǟ":"A","Ả":"A","Å":"A","Ǻ":"A","Ǎ":"A","Ȁ":"A","Ȃ":"A","Ạ":"A","Ậ":"A","Ặ":"A","Ḁ":"A","Ą":"A","Ⱥ":"A","Ɐ":"A","Ꜳ":"AA","Æ":"AE","Ǽ":"AE","Ǣ":"AE","Ꜵ":"AO","Ꜷ":"AU","Ꜹ":"AV","Ꜻ":"AV","Ꜽ":"AY","Ⓑ":"B","Ｂ":"B","Ḃ":"B","Ḅ":"B","Ḇ":"B","Ƀ":"B","Ƃ":"B","Ɓ":"B","Ⓒ":"C","Ｃ":"C","Ć":"C","Ĉ":"C","Ċ":"C","Č":"C","Ç":"C","Ḉ":"C","Ƈ":"C","Ȼ":"C","Ꜿ":"C","Ⓓ":"D","Ｄ":"D","Ḋ":"D","Ď":"D","Ḍ":"D","Ḑ":"D","Ḓ":"D","Ḏ":"D","Đ":"D","Ƌ":"D","Ɗ":"D","Ɖ":"D","Ꝺ":"D","Ǳ":"DZ","Ǆ":"DZ","ǲ":"Dz","ǅ":"Dz","Ⓔ":"E","Ｅ":"E","È":"E","É":"E","Ê":"E","Ề":"E","Ế":"E","Ễ":"E","Ể":"E","Ẽ":"E","Ē":"E","Ḕ":"E","Ḗ":"E","Ĕ":"E","Ė":"E","Ë":"E","Ẻ":"E","Ě":"E","Ȅ":"E","Ȇ":"E","Ẹ":"E","Ệ":"E","Ȩ":"E","Ḝ":"E","Ę":"E","Ḙ":"E","Ḛ":"E","Ɛ":"E","Ǝ":"E","Ⓕ":"F","Ｆ":"F","Ḟ":"F","Ƒ":"F","Ꝼ":"F","Ⓖ":"G","Ｇ":"G","Ǵ":"G","Ĝ":"G","Ḡ":"G","Ğ":"G","Ġ":"G","Ǧ":"G","Ģ":"G","Ǥ":"G","Ɠ":"G","Ꞡ":"G","Ᵹ":"G","Ꝿ":"G","Ⓗ":"H","Ｈ":"H","Ĥ":"H","Ḣ":"H","Ḧ":"H","Ȟ":"H","Ḥ":"H","Ḩ":"H","Ḫ":"H","Ħ":"H","Ⱨ":"H","Ⱶ":"H","Ɥ":"H","Ⓘ":"I","Ｉ":"I","Ì":"I","Í":"I","Î":"I","Ĩ":"I","Ī":"I","Ĭ":"I","İ":"I","Ï":"I","Ḯ":"I","Ỉ":"I","Ǐ":"I","Ȉ":"I","Ȋ":"I","Ị":"I","Į":"I","Ḭ":"I","Ɨ":"I","Ⓙ":"J","Ｊ":"J","Ĵ":"J","Ɉ":"J","Ⓚ":"K","Ｋ":"K","Ḱ":"K","Ǩ":"K","Ḳ":"K","Ķ":"K","Ḵ":"K","Ƙ":"K","Ⱪ":"K","Ꝁ":"K","Ꝃ":"K","Ꝅ":"K","Ꞣ":"K","Ⓛ":"L","Ｌ":"L","Ŀ":"L","Ĺ":"L","Ľ":"L","Ḷ":"L","Ḹ":"L","Ļ":"L","Ḽ":"L","Ḻ":"L","Ł":"L","Ƚ":"L","Ɫ":"L","Ⱡ":"L","Ꝉ":"L","Ꝇ":"L","Ꞁ":"L","Ǉ":"LJ","ǈ":"Lj","Ⓜ":"M","Ｍ":"M","Ḿ":"M","Ṁ":"M","Ṃ":"M","Ɱ":"M","Ɯ":"M","Ⓝ":"N","Ｎ":"N","Ǹ":"N","Ń":"N","Ñ":"N","Ṅ":"N","Ň":"N","Ṇ":"N","Ņ":"N","Ṋ":"N","Ṉ":"N","Ƞ":"N","Ɲ":"N","Ꞑ":"N","Ꞥ":"N","Ǌ":"NJ","ǋ":"Nj","Ⓞ":"O","Ｏ":"O","Ò":"O","Ó":"O","Ô":"O","Ồ":"O","Ố":"O","Ỗ":"O","Ổ":"O","Õ":"O","Ṍ":"O","Ȭ":"O","Ṏ":"O","Ō":"O","Ṑ":"O","Ṓ":"O","Ŏ":"O","Ȯ":"O","Ȱ":"O","Ö":"O","Ȫ":"O","Ỏ":"O","Ő":"O","Ǒ":"O","Ȍ":"O","Ȏ":"O","Ơ":"O","Ờ":"O","Ớ":"O","Ỡ":"O","Ở":"O","Ợ":"O","Ọ":"O","Ộ":"O","Ǫ":"O","Ǭ":"O","Ø":"O","Ǿ":"O","Ɔ":"O","Ɵ":"O","Ꝋ":"O","Ꝍ":"O","Ƣ":"OI","Ꝏ":"OO","Ȣ":"OU","Ⓟ":"P","Ｐ":"P","Ṕ":"P","Ṗ":"P","Ƥ":"P","Ᵽ":"P","Ꝑ":"P","Ꝓ":"P","Ꝕ":"P","Ⓠ":"Q","Ｑ":"Q","Ꝗ":"Q","Ꝙ":"Q","Ɋ":"Q","Ⓡ":"R","Ｒ":"R","Ŕ":"R","Ṙ":"R","Ř":"R","Ȑ":"R","Ȓ":"R","Ṛ":"R","Ṝ":"R","Ŗ":"R","Ṟ":"R","Ɍ":"R","Ɽ":"R","Ꝛ":"R","Ꞧ":"R","Ꞃ":"R","Ⓢ":"S","Ｓ":"S","ẞ":"S","Ś":"S","Ṥ":"S","Ŝ":"S","Ṡ":"S","Š":"S","Ṧ":"S","Ṣ":"S","Ṩ":"S","Ș":"S","Ş":"S","Ȿ":"S","Ꞩ":"S","Ꞅ":"S","Ⓣ":"T","Ｔ":"T","Ṫ":"T","Ť":"T","Ṭ":"T","Ț":"T","Ţ":"T","Ṱ":"T","Ṯ":"T","Ŧ":"T","Ƭ":"T","Ʈ":"T","Ⱦ":"T","Ꞇ":"T","Ꜩ":"TZ","Ⓤ":"U","Ｕ":"U","Ù":"U","Ú":"U","Û":"U","Ũ":"U","Ṹ":"U","Ū":"U","Ṻ":"U","Ŭ":"U","Ü":"U","Ǜ":"U","Ǘ":"U","Ǖ":"U","Ǚ":"U","Ủ":"U","Ů":"U","Ű":"U","Ǔ":"U","Ȕ":"U","Ȗ":"U","Ư":"U","Ừ":"U","Ứ":"U","Ữ":"U","Ử":"U","Ự":"U","Ụ":"U","Ṳ":"U","Ų":"U","Ṷ":"U","Ṵ":"U","Ʉ":"U","Ⓥ":"V","Ｖ":"V","Ṽ":"V","Ṿ":"V","Ʋ":"V","Ꝟ":"V","Ʌ":"V","Ꝡ":"VY","Ⓦ":"W","Ｗ":"W","Ẁ":"W","Ẃ":"W","Ŵ":"W","Ẇ":"W","Ẅ":"W","Ẉ":"W","Ⱳ":"W","Ⓧ":"X","Ｘ":"X","Ẋ":"X","Ẍ":"X","Ⓨ":"Y","Ｙ":"Y","Ỳ":"Y","Ý":"Y","Ŷ":"Y","Ỹ":"Y","Ȳ":"Y","Ẏ":"Y","Ÿ":"Y","Ỷ":"Y","Ỵ":"Y","Ƴ":"Y","Ɏ":"Y","Ỿ":"Y","Ⓩ":"Z","Ｚ":"Z","Ź":"Z","Ẑ":"Z","Ż":"Z","Ž":"Z","Ẓ":"Z","Ẕ":"Z","Ƶ":"Z","Ȥ":"Z","Ɀ":"Z","Ⱬ":"Z","Ꝣ":"Z","ⓐ":"a","ａ":"a","ẚ":"a","à":"a","á":"a","â":"a","ầ":"a","ấ":"a","ẫ":"a","ẩ":"a","ã":"a","ā":"a","ă":"a","ằ":"a","ắ":"a","ẵ":"a","ẳ":"a","ȧ":"a","ǡ":"a","ä":"a","ǟ":"a","ả":"a","å":"a","ǻ":"a","ǎ":"a","ȁ":"a","ȃ":"a","ạ":"a","ậ":"a","ặ":"a","ḁ":"a","ą":"a","ⱥ":"a","ɐ":"a","ꜳ":"aa","æ":"ae","ǽ":"ae","ǣ":"ae","ꜵ":"ao","ꜷ":"au","ꜹ":"av","ꜻ":"av","ꜽ":"ay","ⓑ":"b","ｂ":"b","ḃ":"b","ḅ":"b","ḇ":"b","ƀ":"b","ƃ":"b","ɓ":"b","ⓒ":"c","ｃ":"c","ć":"c","ĉ":"c","ċ":"c","č":"c","ç":"c","ḉ":"c","ƈ":"c","ȼ":"c","ꜿ":"c","ↄ":"c","ⓓ":"d","ｄ":"d","ḋ":"d","ď":"d","ḍ":"d","ḑ":"d","ḓ":"d","ḏ":"d","đ":"d","ƌ":"d","ɖ":"d","ɗ":"d","ꝺ":"d","ǳ":"dz","ǆ":"dz","ⓔ":"e","ｅ":"e","è":"e","é":"e","ê":"e","ề":"e","ế":"e","ễ":"e","ể":"e","ẽ":"e","ē":"e","ḕ":"e","ḗ":"e","ĕ":"e","ė":"e","ë":"e","ẻ":"e","ě":"e","ȅ":"e","ȇ":"e","ẹ":"e","ệ":"e","ȩ":"e","ḝ":"e","ę":"e","ḙ":"e","ḛ":"e","ɇ":"e","ɛ":"e","ǝ":"e","ⓕ":"f","ｆ":"f","ḟ":"f","ƒ":"f","ꝼ":"f","ⓖ":"g","ｇ":"g","ǵ":"g","ĝ":"g","ḡ":"g","ğ":"g","ġ":"g","ǧ":"g","ģ":"g","ǥ":"g","ɠ":"g","ꞡ":"g","ᵹ":"g","ꝿ":"g","ⓗ":"h","ｈ":"h","ĥ":"h","ḣ":"h","ḧ":"h","ȟ":"h","ḥ":"h","ḩ":"h","ḫ":"h","ẖ":"h","ħ":"h","ⱨ":"h","ⱶ":"h","ɥ":"h","ƕ":"hv","ⓘ":"i","ｉ":"i","ì":"i","í":"i","î":"i","ĩ":"i","ī":"i","ĭ":"i","ï":"i","ḯ":"i","ỉ":"i","ǐ":"i","ȉ":"i","ȋ":"i","ị":"i","į":"i","ḭ":"i","ɨ":"i","ı":"i","ⓙ":"j","ｊ":"j","ĵ":"j","ǰ":"j","ɉ":"j","ⓚ":"k","ｋ":"k","ḱ":"k","ǩ":"k","ḳ":"k","ķ":"k","ḵ":"k","ƙ":"k","ⱪ":"k","ꝁ":"k","ꝃ":"k","ꝅ":"k","ꞣ":"k","ⓛ":"l","ｌ":"l","ŀ":"l","ĺ":"l","ľ":"l","ḷ":"l","ḹ":"l","ļ":"l","ḽ":"l","ḻ":"l","ſ":"l","ł":"l","ƚ":"l","ɫ":"l","ⱡ":"l","ꝉ":"l","ꞁ":"l","ꝇ":"l","ǉ":"lj","ⓜ":"m","ｍ":"m","ḿ":"m","ṁ":"m","ṃ":"m","ɱ":"m","ɯ":"m","ⓝ":"n","ｎ":"n","ǹ":"n","ń":"n","ñ":"n","ṅ":"n","ň":"n","ṇ":"n","ņ":"n","ṋ":"n","ṉ":"n","ƞ":"n","ɲ":"n","ŉ":"n","ꞑ":"n","ꞥ":"n","ǌ":"nj","ⓞ":"o","ｏ":"o","ò":"o","ó":"o","ô":"o","ồ":"o","ố":"o","ỗ":"o","ổ":"o","õ":"o","ṍ":"o","ȭ":"o","ṏ":"o","ō":"o","ṑ":"o","ṓ":"o","ŏ":"o","ȯ":"o","ȱ":"o","ö":"o","ȫ":"o","ỏ":"o","ő":"o","ǒ":"o","ȍ":"o","ȏ":"o","ơ":"o","ờ":"o","ớ":"o","ỡ":"o","ở":"o","ợ":"o","ọ":"o","ộ":"o","ǫ":"o","ǭ":"o","ø":"o","ǿ":"o","ɔ":"o","ꝋ":"o","ꝍ":"o","ɵ":"o","ƣ":"oi","ȣ":"ou","ꝏ":"oo","ⓟ":"p","ｐ":"p","ṕ":"p","ṗ":"p","ƥ":"p","ᵽ":"p","ꝑ":"p","ꝓ":"p","ꝕ":"p","ⓠ":"q","ｑ":"q","ɋ":"q","ꝗ":"q","ꝙ":"q","ⓡ":"r","ｒ":"r","ŕ":"r","ṙ":"r","ř":"r","ȑ":"r","ȓ":"r","ṛ":"r","ṝ":"r","ŗ":"r","ṟ":"r","ɍ":"r","ɽ":"r","ꝛ":"r","ꞧ":"r","ꞃ":"r","ⓢ":"s","ｓ":"s","ß":"s","ś":"s","ṥ":"s","ŝ":"s","ṡ":"s","š":"s","ṧ":"s","ṣ":"s","ṩ":"s","ș":"s","ş":"s","ȿ":"s","ꞩ":"s","ꞅ":"s","ẛ":"s","ⓣ":"t","ｔ":"t","ṫ":"t","ẗ":"t","ť":"t","ṭ":"t","ț":"t","ţ":"t","ṱ":"t","ṯ":"t","ŧ":"t","ƭ":"t","ʈ":"t","ⱦ":"t","ꞇ":"t","ꜩ":"tz","ⓤ":"u","ｕ":"u","ù":"u","ú":"u","û":"u","ũ":"u","ṹ":"u","ū":"u","ṻ":"u","ŭ":"u","ü":"u","ǜ":"u","ǘ":"u","ǖ":"u","ǚ":"u","ủ":"u","ů":"u","ű":"u","ǔ":"u","ȕ":"u","ȗ":"u","ư":"u","ừ":"u","ứ":"u","ữ":"u","ử":"u","ự":"u","ụ":"u","ṳ":"u","ų":"u","ṷ":"u","ṵ":"u","ʉ":"u","ⓥ":"v","ｖ":"v","ṽ":"v","ṿ":"v","ʋ":"v","ꝟ":"v","ʌ":"v","ꝡ":"vy","ⓦ":"w","ｗ":"w","ẁ":"w","ẃ":"w","ŵ":"w","ẇ":"w","ẅ":"w","ẘ":"w","ẉ":"w","ⱳ":"w","ⓧ":"x","ｘ":"x","ẋ":"x","ẍ":"x","ⓨ":"y","ｙ":"y","ỳ":"y","ý":"y","ŷ":"y","ỹ":"y","ȳ":"y","ẏ":"y","ÿ":"y","ỷ":"y","ẙ":"y","ỵ":"y","ƴ":"y","ɏ":"y","ỿ":"y","ⓩ":"z","ｚ":"z","ź":"z","ẑ":"z","ż":"z","ž":"z","ẓ":"z","ẕ":"z","ƶ":"z","ȥ":"z","ɀ":"z","ⱬ":"z","ꝣ":"z","Ά":"Α","Έ":"Ε","Ή":"Η","Ί":"Ι","Ϊ":"Ι","Ό":"Ο","Ύ":"Υ","Ϋ":"Υ","Ώ":"Ω","ά":"α","έ":"ε","ή":"η","ί":"ι","ϊ":"ι","ΐ":"ι","ό":"ο","ύ":"υ","ϋ":"υ","ΰ":"υ","ω":"ω","ς":"σ"};return a}),b.define("select2/data/base",["../utils"],function(a){function b(a,c){b.__super__.constructor.call(this)}return a.Extend(b,a.Observable),b.prototype.current=function(a){throw new Error("The `current` method must be defined in child classes.")},b.prototype.query=function(a,b){throw new Error("The `query` method must be defined in child classes.")},b.prototype.bind=function(a,b){},b.prototype.destroy=function(){},b.prototype.generateResultId=function(b,c){var d=b.id+"-result-";return d+=a.generateChars(4),d+=null!=c.id?"-"+c.id.toString():"-"+a.generateChars(4)},b}),b.define("select2/data/select",["./base","../utils","jquery"],function(a,b,c){function d(a,b){this.$element=a,this.options=b,d.__super__.constructor.call(this)}return b.Extend(d,a),d.prototype.current=function(a){var b=[],d=this;this.$element.find(":selected").each(function(){var a=c(this),e=d.item(a);b.push(e)}),a(b)},d.prototype.select=function(a){var b=this;if(a.selected=!0,c(a.element).is("option"))return a.element.selected=!0,void this.$element.trigger("change");
if(this.$element.prop("multiple"))this.current(function(d){var e=[];a=[a],a.push.apply(a,d);for(var f=0;f<a.length;f++){var g=a[f].id;-1===c.inArray(g,e)&&e.push(g)}b.$element.val(e),b.$element.trigger("change")});else{var d=a.id;this.$element.val(d),this.$element.trigger("change")}},d.prototype.unselect=function(a){var b=this;if(this.$element.prop("multiple"))return a.selected=!1,c(a.element).is("option")?(a.element.selected=!1,void this.$element.trigger("change")):void this.current(function(d){for(var e=[],f=0;f<d.length;f++){var g=d[f].id;g!==a.id&&-1===c.inArray(g,e)&&e.push(g)}b.$element.val(e),b.$element.trigger("change")})},d.prototype.bind=function(a,b){var c=this;this.container=a,a.on("select",function(a){c.select(a.data)}),a.on("unselect",function(a){c.unselect(a.data)})},d.prototype.destroy=function(){this.$element.find("*").each(function(){c.removeData(this,"data")})},d.prototype.query=function(a,b){var d=[],e=this,f=this.$element.children();f.each(function(){var b=c(this);if(b.is("option")||b.is("optgroup")){var f=e.item(b),g=e.matches(a,f);null!==g&&d.push(g)}}),b({results:d})},d.prototype.addOptions=function(a){b.appendMany(this.$element,a)},d.prototype.option=function(a){var b;a.children?(b=document.createElement("optgroup"),b.label=a.text):(b=document.createElement("option"),void 0!==b.textContent?b.textContent=a.text:b.innerText=a.text),a.id&&(b.value=a.id),a.disabled&&(b.disabled=!0),a.selected&&(b.selected=!0),a.title&&(b.title=a.title);var d=c(b),e=this._normalizeItem(a);return e.element=b,c.data(b,"data",e),d},d.prototype.item=function(a){var b={};if(b=c.data(a[0],"data"),null!=b)return b;if(a.is("option"))b={id:a.val(),text:a.text(),disabled:a.prop("disabled"),selected:a.prop("selected"),title:a.prop("title")};else if(a.is("optgroup")){b={text:a.prop("label"),children:[],title:a.prop("title")};for(var d=a.children("option"),e=[],f=0;f<d.length;f++){var g=c(d[f]),h=this.item(g);e.push(h)}b.children=e}return b=this._normalizeItem(b),b.element=a[0],c.data(a[0],"data",b),b},d.prototype._normalizeItem=function(a){c.isPlainObject(a)||(a={id:a,text:a}),a=c.extend({},{text:""},a);var b={selected:!1,disabled:!1};return null!=a.id&&(a.id=a.id.toString()),null!=a.text&&(a.text=a.text.toString()),null==a._resultId&&a.id&&null!=this.container&&(a._resultId=this.generateResultId(this.container,a)),c.extend({},b,a)},d.prototype.matches=function(a,b){var c=this.options.get("matcher");return c(a,b)},d}),b.define("select2/data/array",["./select","../utils","jquery"],function(a,b,c){function d(a,b){var c=b.get("data")||[];d.__super__.constructor.call(this,a,b),this.addOptions(this.convertToOptions(c))}return b.Extend(d,a),d.prototype.select=function(a){var b=this.$element.find("option").filter(function(b,c){return c.value==a.id.toString()});0===b.length&&(b=this.option(a),this.addOptions(b)),d.__super__.select.call(this,a)},d.prototype.convertToOptions=function(a){function d(a){return function(){return c(this).val()==a.id}}for(var e=this,f=this.$element.find("option"),g=f.map(function(){return e.item(c(this)).id}).get(),h=[],i=0;i<a.length;i++){var j=this._normalizeItem(a[i]);if(c.inArray(j.id,g)>=0){var k=f.filter(d(j)),l=this.item(k),m=c.extend(!0,{},j,l),n=this.option(m);k.replaceWith(n)}else{var o=this.option(j);if(j.children){var p=this.convertToOptions(j.children);b.appendMany(o,p)}h.push(o)}}return h},d}),b.define("select2/data/ajax",["./array","../utils","jquery"],function(a,b,c){function d(a,b){this.ajaxOptions=this._applyDefaults(b.get("ajax")),null!=this.ajaxOptions.processResults&&(this.processResults=this.ajaxOptions.processResults),d.__super__.constructor.call(this,a,b)}return b.Extend(d,a),d.prototype._applyDefaults=function(a){var b={data:function(a){return c.extend({},a,{q:a.term})},transport:function(a,b,d){var e=c.ajax(a);return e.then(b),e.fail(d),e}};return c.extend({},b,a,!0)},d.prototype.processResults=function(a){return a},d.prototype.query=function(a,b){function d(){var d=f.transport(f,function(d){var f=e.processResults(d,a);e.options.get("debug")&&window.console&&console.error&&(f&&f.results&&c.isArray(f.results)||console.error("Select2: The AJAX results did not return an array in the `results` key of the response.")),b(f)},function(){d.status&&"0"===d.status||e.trigger("results:message",{message:"errorLoading"})});e._request=d}var e=this;null!=this._request&&(c.isFunction(this._request.abort)&&this._request.abort(),this._request=null);var f=c.extend({type:"GET"},this.ajaxOptions);"function"==typeof f.url&&(f.url=f.url.call(this.$element,a)),"function"==typeof f.data&&(f.data=f.data.call(this.$element,a)),this.ajaxOptions.delay&&null!=a.term?(this._queryTimeout&&window.clearTimeout(this._queryTimeout),this._queryTimeout=window.setTimeout(d,this.ajaxOptions.delay)):d()},d}),b.define("select2/data/tags",["jquery"],function(a){function b(b,c,d){var e=d.get("tags"),f=d.get("createTag");void 0!==f&&(this.createTag=f);var g=d.get("insertTag");if(void 0!==g&&(this.insertTag=g),b.call(this,c,d),a.isArray(e))for(var h=0;h<e.length;h++){var i=e[h],j=this._normalizeItem(i),k=this.option(j);this.$element.append(k)}}return b.prototype.query=function(a,b,c){function d(a,f){for(var g=a.results,h=0;h<g.length;h++){var i=g[h],j=null!=i.children&&!d({results:i.children},!0),k=i.text===b.term;if(k||j)return f?!1:(a.data=g,void c(a))}if(f)return!0;var l=e.createTag(b);if(null!=l){var m=e.option(l);m.attr("data-select2-tag",!0),e.addOptions([m]),e.insertTag(g,l)}a.results=g,c(a)}var e=this;return this._removeOldTags(),null==b.term||null!=b.page?void a.call(this,b,c):void a.call(this,b,d)},b.prototype.createTag=function(b,c){var d=a.trim(c.term);return""===d?null:{id:d,text:d}},b.prototype.insertTag=function(a,b,c){b.unshift(c)},b.prototype._removeOldTags=function(b){var c=(this._lastTag,this.$element.find("option[data-select2-tag]"));c.each(function(){this.selected||a(this).remove()})},b}),b.define("select2/data/tokenizer",["jquery"],function(a){function b(a,b,c){var d=c.get("tokenizer");void 0!==d&&(this.tokenizer=d),a.call(this,b,c)}return b.prototype.bind=function(a,b,c){a.call(this,b,c),this.$search=b.dropdown.$search||b.selection.$search||c.find(".select2-search__field")},b.prototype.query=function(b,c,d){function e(b){var c=g._normalizeItem(b),d=g.$element.find("option").filter(function(){return a(this).val()===c.id});if(!d.length){var e=g.option(c);e.attr("data-select2-tag",!0),g._removeOldTags(),g.addOptions([e])}f(c)}function f(a){g.trigger("select",{data:a})}var g=this;c.term=c.term||"";var h=this.tokenizer(c,this.options,e);h.term!==c.term&&(this.$search.length&&(this.$search.val(h.term),this.$search.focus()),c.term=h.term),b.call(this,c,d)},b.prototype.tokenizer=function(b,c,d,e){for(var f=d.get("tokenSeparators")||[],g=c.term,h=0,i=this.createTag||function(a){return{id:a.term,text:a.term}};h<g.length;){var j=g[h];if(-1!==a.inArray(j,f)){var k=g.substr(0,h),l=a.extend({},c,{term:k}),m=i(l);null!=m?(e(m),g=g.substr(h+1)||"",h=0):h++}else h++}return{term:g}},b}),b.define("select2/data/minimumInputLength",[],function(){function a(a,b,c){this.minimumInputLength=c.get("minimumInputLength"),a.call(this,b,c)}return a.prototype.query=function(a,b,c){return b.term=b.term||"",b.term.length<this.minimumInputLength?void this.trigger("results:message",{message:"inputTooShort",args:{minimum:this.minimumInputLength,input:b.term,params:b}}):void a.call(this,b,c)},a}),b.define("select2/data/maximumInputLength",[],function(){function a(a,b,c){this.maximumInputLength=c.get("maximumInputLength"),a.call(this,b,c)}return a.prototype.query=function(a,b,c){return b.term=b.term||"",this.maximumInputLength>0&&b.term.length>this.maximumInputLength?void this.trigger("results:message",{message:"inputTooLong",args:{maximum:this.maximumInputLength,input:b.term,params:b}}):void a.call(this,b,c)},a}),b.define("select2/data/maximumSelectionLength",[],function(){function a(a,b,c){this.maximumSelectionLength=c.get("maximumSelectionLength"),a.call(this,b,c)}return a.prototype.query=function(a,b,c){var d=this;this.current(function(e){var f=null!=e?e.length:0;return d.maximumSelectionLength>0&&f>=d.maximumSelectionLength?void d.trigger("results:message",{message:"maximumSelected",args:{maximum:d.maximumSelectionLength}}):void a.call(d,b,c)})},a}),b.define("select2/dropdown",["jquery","./utils"],function(a,b){function c(a,b){this.$element=a,this.options=b,c.__super__.constructor.call(this)}return b.Extend(c,b.Observable),c.prototype.render=function(){var b=a('<span class="select2-dropdown"><span class="select2-results"></span></span>');return b.attr("dir",this.options.get("dir")),this.$dropdown=b,b},c.prototype.bind=function(){},c.prototype.position=function(a,b){},c.prototype.destroy=function(){this.$dropdown.remove()},c}),b.define("select2/dropdown/search",["jquery","../utils"],function(a,b){function c(){}return c.prototype.render=function(b){var c=b.call(this),d=a('<span class="select2-search select2-search--dropdown"><input class="select2-search__field" type="search" tabindex="-1" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" role="textbox" /></span>');return this.$searchContainer=d,this.$search=d.find("input"),c.prepend(d),c},c.prototype.bind=function(b,c,d){var e=this;b.call(this,c,d),this.$search.on("keydown",function(a){e.trigger("keypress",a),e._keyUpPrevented=a.isDefaultPrevented()}),this.$search.on("input",function(b){a(this).off("keyup")}),this.$search.on("keyup input",function(a){e.handleSearch(a)}),c.on("open",function(){e.$search.attr("tabindex",0),e.$search.focus(),window.setTimeout(function(){e.$search.focus()},0)}),c.on("close",function(){e.$search.attr("tabindex",-1),e.$search.val("")}),c.on("focus",function(){c.isOpen()&&e.$search.focus()}),c.on("results:all",function(a){if(null==a.query.term||""===a.query.term){var b=e.showSearch(a);b?e.$searchContainer.removeClass("select2-search--hide"):e.$searchContainer.addClass("select2-search--hide")}})},c.prototype.handleSearch=function(a){if(!this._keyUpPrevented){var b=this.$search.val();this.trigger("query",{term:b})}this._keyUpPrevented=!1},c.prototype.showSearch=function(a,b){return!0},c}),b.define("select2/dropdown/hidePlaceholder",[],function(){function a(a,b,c,d){this.placeholder=this.normalizePlaceholder(c.get("placeholder")),a.call(this,b,c,d)}return a.prototype.append=function(a,b){b.results=this.removePlaceholder(b.results),a.call(this,b)},a.prototype.normalizePlaceholder=function(a,b){return"string"==typeof b&&(b={id:"",text:b}),b},a.prototype.removePlaceholder=function(a,b){for(var c=b.slice(0),d=b.length-1;d>=0;d--){var e=b[d];this.placeholder.id===e.id&&c.splice(d,1)}return c},a}),b.define("select2/dropdown/infiniteScroll",["jquery"],function(a){function b(a,b,c,d){this.lastParams={},a.call(this,b,c,d),this.$loadingMore=this.createLoadingMore(),this.loading=!1}return b.prototype.append=function(a,b){this.$loadingMore.remove(),this.loading=!1,a.call(this,b),this.showLoadingMore(b)&&this.$results.append(this.$loadingMore)},b.prototype.bind=function(b,c,d){var e=this;b.call(this,c,d),c.on("query",function(a){e.lastParams=a,e.loading=!0}),c.on("query:append",function(a){e.lastParams=a,e.loading=!0}),this.$results.on("scroll",function(){var b=a.contains(document.documentElement,e.$loadingMore[0]);if(!e.loading&&b){var c=e.$results.offset().top+e.$results.outerHeight(!1),d=e.$loadingMore.offset().top+e.$loadingMore.outerHeight(!1);c+50>=d&&e.loadMore()}})},b.prototype.loadMore=function(){this.loading=!0;var b=a.extend({},{page:1},this.lastParams);b.page++,this.trigger("query:append",b)},b.prototype.showLoadingMore=function(a,b){return b.pagination&&b.pagination.more},b.prototype.createLoadingMore=function(){var b=a('<li class="select2-results__option select2-results__option--load-more"role="treeitem" aria-disabled="true"></li>'),c=this.options.get("translations").get("loadingMore");return b.html(c(this.lastParams)),b},b}),b.define("select2/dropdown/attachBody",["jquery","../utils"],function(a,b){function c(b,c,d){this.$dropdownParent=d.get("dropdownParent")||a(document.body),b.call(this,c,d)}return c.prototype.bind=function(a,b,c){var d=this,e=!1;a.call(this,b,c),b.on("open",function(){d._showDropdown(),d._attachPositioningHandler(b),e||(e=!0,b.on("results:all",function(){d._positionDropdown(),d._resizeDropdown()}),b.on("results:append",function(){d._positionDropdown(),d._resizeDropdown()}))}),b.on("close",function(){d._hideDropdown(),d._detachPositioningHandler(b)}),this.$dropdownContainer.on("mousedown",function(a){a.stopPropagation()})},c.prototype.destroy=function(a){a.call(this),this.$dropdownContainer.remove()},c.prototype.position=function(a,b,c){b.attr("class",c.attr("class")),b.removeClass("select2"),b.addClass("select2-container--open"),b.css({position:"absolute",top:-999999}),this.$container=c},c.prototype.render=function(b){var c=a("<span></span>"),d=b.call(this);return c.append(d),this.$dropdownContainer=c,c},c.prototype._hideDropdown=function(a){this.$dropdownContainer.detach()},c.prototype._attachPositioningHandler=function(c,d){var e=this,f="scroll.select2."+d.id,g="resize.select2."+d.id,h="orientationchange.select2."+d.id,i=this.$container.parents().filter(b.hasScroll);i.each(function(){a(this).data("select2-scroll-position",{x:a(this).scrollLeft(),y:a(this).scrollTop()})}),i.on(f,function(b){var c=a(this).data("select2-scroll-position");a(this).scrollTop(c.y)}),a(window).on(f+" "+g+" "+h,function(a){e._positionDropdown(),e._resizeDropdown()})},c.prototype._detachPositioningHandler=function(c,d){var e="scroll.select2."+d.id,f="resize.select2."+d.id,g="orientationchange.select2."+d.id,h=this.$container.parents().filter(b.hasScroll);h.off(e),a(window).off(e+" "+f+" "+g)},c.prototype._positionDropdown=function(){var b=a(window),c=this.$dropdown.hasClass("select2-dropdown--above"),d=this.$dropdown.hasClass("select2-dropdown--below"),e=null,f=this.$container.offset();f.bottom=f.top+this.$container.outerHeight(!1);var g={height:this.$container.outerHeight(!1)};g.top=f.top,g.bottom=f.top+g.height;var h={height:this.$dropdown.outerHeight(!1)},i={top:b.scrollTop(),bottom:b.scrollTop()+b.height()},j=i.top<f.top-h.height,k=i.bottom>f.bottom+h.height,l={left:f.left,top:g.bottom},m=this.$dropdownParent;"static"===m.css("position")&&(m=m.offsetParent());var n=m.offset();l.top-=n.top,l.left-=n.left,c||d||(e="below"),k||!j||c?!j&&k&&c&&(e="below"):e="above",("above"==e||c&&"below"!==e)&&(l.top=g.top-n.top-h.height),null!=e&&(this.$dropdown.removeClass("select2-dropdown--below select2-dropdown--above").addClass("select2-dropdown--"+e),this.$container.removeClass("select2-container--below select2-container--above").addClass("select2-container--"+e)),this.$dropdownContainer.css(l)},c.prototype._resizeDropdown=function(){var a={width:this.$container.outerWidth(!1)+"px"};this.options.get("dropdownAutoWidth")&&(a.minWidth=a.width,a.position="relative",a.width="auto"),this.$dropdown.css(a)},c.prototype._showDropdown=function(a){this.$dropdownContainer.appendTo(this.$dropdownParent),this._positionDropdown(),this._resizeDropdown()},c}),b.define("select2/dropdown/minimumResultsForSearch",[],function(){function a(b){for(var c=0,d=0;d<b.length;d++){var e=b[d];e.children?c+=a(e.children):c++}return c}function b(a,b,c,d){this.minimumResultsForSearch=c.get("minimumResultsForSearch"),this.minimumResultsForSearch<0&&(this.minimumResultsForSearch=1/0),a.call(this,b,c,d)}return b.prototype.showSearch=function(b,c){return a(c.data.results)<this.minimumResultsForSearch?!1:b.call(this,c)},b}),b.define("select2/dropdown/selectOnClose",[],function(){function a(){}return a.prototype.bind=function(a,b,c){var d=this;a.call(this,b,c),b.on("close",function(a){d._handleSelectOnClose(a)})},a.prototype._handleSelectOnClose=function(a,b){if(b&&null!=b.originalSelect2Event){var c=b.originalSelect2Event;if("select"===c._type||"unselect"===c._type)return}var d=this.getHighlightedResults();if(!(d.length<1)){var e=d.data("data");null!=e.element&&e.element.selected||null==e.element&&e.selected||this.trigger("select",{data:e})}},a}),b.define("select2/dropdown/closeOnSelect",[],function(){function a(){}return a.prototype.bind=function(a,b,c){var d=this;a.call(this,b,c),b.on("select",function(a){d._selectTriggered(a)}),b.on("unselect",function(a){d._selectTriggered(a)})},a.prototype._selectTriggered=function(a,b){var c=b.originalEvent;c&&c.ctrlKey||this.trigger("close",{originalEvent:c,originalSelect2Event:b})},a}),b.define("select2/i18n/en",[],function(){return{errorLoading:function(){return"The results could not be loaded."},inputTooLong:function(a){var b=a.input.length-a.maximum,c="Please delete "+b+" character";return 1!=b&&(c+="s"),c},inputTooShort:function(a){var b=a.minimum-a.input.length,c="Please enter "+b+" or more characters";return c},loadingMore:function(){return"Loading more results…"},maximumSelected:function(a){var b="You can only select "+a.maximum+" item";return 1!=a.maximum&&(b+="s"),b},noResults:function(){return"No results found"},searching:function(){return"Searching…"}}}),b.define("select2/defaults",["jquery","require","./results","./selection/single","./selection/multiple","./selection/placeholder","./selection/allowClear","./selection/search","./selection/eventRelay","./utils","./translation","./diacritics","./data/select","./data/array","./data/ajax","./data/tags","./data/tokenizer","./data/minimumInputLength","./data/maximumInputLength","./data/maximumSelectionLength","./dropdown","./dropdown/search","./dropdown/hidePlaceholder","./dropdown/infiniteScroll","./dropdown/attachBody","./dropdown/minimumResultsForSearch","./dropdown/selectOnClose","./dropdown/closeOnSelect","./i18n/en"],function(a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,A,B,C){function D(){this.reset()}D.prototype.apply=function(l){if(l=a.extend(!0,{},this.defaults,l),null==l.dataAdapter){if(null!=l.ajax?l.dataAdapter=o:null!=l.data?l.dataAdapter=n:l.dataAdapter=m,l.minimumInputLength>0&&(l.dataAdapter=j.Decorate(l.dataAdapter,r)),l.maximumInputLength>0&&(l.dataAdapter=j.Decorate(l.dataAdapter,s)),l.maximumSelectionLength>0&&(l.dataAdapter=j.Decorate(l.dataAdapter,t)),l.tags&&(l.dataAdapter=j.Decorate(l.dataAdapter,p)),(null!=l.tokenSeparators||null!=l.tokenizer)&&(l.dataAdapter=j.Decorate(l.dataAdapter,q)),null!=l.query){var C=b(l.amdBase+"compat/query");l.dataAdapter=j.Decorate(l.dataAdapter,C)}if(null!=l.initSelection){var D=b(l.amdBase+"compat/initSelection");l.dataAdapter=j.Decorate(l.dataAdapter,D)}}if(null==l.resultsAdapter&&(l.resultsAdapter=c,null!=l.ajax&&(l.resultsAdapter=j.Decorate(l.resultsAdapter,x)),null!=l.placeholder&&(l.resultsAdapter=j.Decorate(l.resultsAdapter,w)),l.selectOnClose&&(l.resultsAdapter=j.Decorate(l.resultsAdapter,A))),null==l.dropdownAdapter){if(l.multiple)l.dropdownAdapter=u;else{var E=j.Decorate(u,v);l.dropdownAdapter=E}if(0!==l.minimumResultsForSearch&&(l.dropdownAdapter=j.Decorate(l.dropdownAdapter,z)),l.closeOnSelect&&(l.dropdownAdapter=j.Decorate(l.dropdownAdapter,B)),null!=l.dropdownCssClass||null!=l.dropdownCss||null!=l.adaptDropdownCssClass){var F=b(l.amdBase+"compat/dropdownCss");l.dropdownAdapter=j.Decorate(l.dropdownAdapter,F)}l.dropdownAdapter=j.Decorate(l.dropdownAdapter,y)}if(null==l.selectionAdapter){if(l.multiple?l.selectionAdapter=e:l.selectionAdapter=d,null!=l.placeholder&&(l.selectionAdapter=j.Decorate(l.selectionAdapter,f)),l.allowClear&&(l.selectionAdapter=j.Decorate(l.selectionAdapter,g)),l.multiple&&(l.selectionAdapter=j.Decorate(l.selectionAdapter,h)),null!=l.containerCssClass||null!=l.containerCss||null!=l.adaptContainerCssClass){var G=b(l.amdBase+"compat/containerCss");l.selectionAdapter=j.Decorate(l.selectionAdapter,G)}l.selectionAdapter=j.Decorate(l.selectionAdapter,i)}if("string"==typeof l.language)if(l.language.indexOf("-")>0){var H=l.language.split("-"),I=H[0];l.language=[l.language,I]}else l.language=[l.language];if(a.isArray(l.language)){var J=new k;l.language.push("en");for(var K=l.language,L=0;L<K.length;L++){var M=K[L],N={};try{N=k.loadPath(M)}catch(O){try{M=this.defaults.amdLanguageBase+M,N=k.loadPath(M)}catch(P){l.debug&&window.console&&console.warn&&console.warn('Select2: The language file for "'+M+'" could not be automatically loaded. A fallback will be used instead.');continue}}J.extend(N)}l.translations=J}else{var Q=k.loadPath(this.defaults.amdLanguageBase+"en"),R=new k(l.language);R.extend(Q),l.translations=R}return l},D.prototype.reset=function(){function b(a){function b(a){return l[a]||a}return a.replace(/[^\u0000-\u007E]/g,b)}function c(d,e){if(""===a.trim(d.term))return e;if(e.children&&e.children.length>0){for(var f=a.extend(!0,{},e),g=e.children.length-1;g>=0;g--){var h=e.children[g],i=c(d,h);null==i&&f.children.splice(g,1)}return f.children.length>0?f:c(d,f)}var j=b(e.text).toUpperCase(),k=b(d.term).toUpperCase();return j.indexOf(k)>-1?e:null}this.defaults={amdBase:"./",amdLanguageBase:"./i18n/",closeOnSelect:!0,debug:!1,dropdownAutoWidth:!1,escapeMarkup:j.escapeMarkup,language:C,matcher:c,minimumInputLength:0,maximumInputLength:0,maximumSelectionLength:0,minimumResultsForSearch:0,selectOnClose:!1,sorter:function(a){return a},templateResult:function(a){return a.text},templateSelection:function(a){return a.text},theme:"default",width:"resolve"}},D.prototype.set=function(b,c){var d=a.camelCase(b),e={};e[d]=c;var f=j._convertData(e);a.extend(this.defaults,f)};var E=new D;return E}),b.define("select2/options",["require","jquery","./defaults","./utils"],function(a,b,c,d){function e(b,e){if(this.options=b,null!=e&&this.fromElement(e),this.options=c.apply(this.options),e&&e.is("input")){var f=a(this.get("amdBase")+"compat/inputData");this.options.dataAdapter=d.Decorate(this.options.dataAdapter,f)}}return e.prototype.fromElement=function(a){var c=["select2"];null==this.options.multiple&&(this.options.multiple=a.prop("multiple")),null==this.options.disabled&&(this.options.disabled=a.prop("disabled")),null==this.options.language&&(a.prop("lang")?this.options.language=a.prop("lang").toLowerCase():a.closest("[lang]").prop("lang")&&(this.options.language=a.closest("[lang]").prop("lang"))),null==this.options.dir&&(a.prop("dir")?this.options.dir=a.prop("dir"):a.closest("[dir]").prop("dir")?this.options.dir=a.closest("[dir]").prop("dir"):this.options.dir="ltr"),a.prop("disabled",this.options.disabled),a.prop("multiple",this.options.multiple),a.data("select2Tags")&&(this.options.debug&&window.console&&console.warn&&console.warn('Select2: The `data-select2-tags` attribute has been changed to use the `data-data` and `data-tags="true"` attributes and will be removed in future versions of Select2.'),a.data("data",a.data("select2Tags")),a.data("tags",!0)),a.data("ajaxUrl")&&(this.options.debug&&window.console&&console.warn&&console.warn("Select2: The `data-ajax-url` attribute has been changed to `data-ajax--url` and support for the old attribute will be removed in future versions of Select2."),a.attr("ajax--url",a.data("ajaxUrl")),a.data("ajax--url",a.data("ajaxUrl")));var e={};e=b.fn.jquery&&"1."==b.fn.jquery.substr(0,2)&&a[0].dataset?b.extend(!0,{},a[0].dataset,a.data()):a.data();var f=b.extend(!0,{},e);f=d._convertData(f);for(var g in f)b.inArray(g,c)>-1||(b.isPlainObject(this.options[g])?b.extend(this.options[g],f[g]):this.options[g]=f[g]);return this},e.prototype.get=function(a){return this.options[a]},e.prototype.set=function(a,b){this.options[a]=b},e}),b.define("select2/core",["jquery","./options","./utils","./keys"],function(a,b,c,d){var e=function(a,c){null!=a.data("select2")&&a.data("select2").destroy(),this.$element=a,this.id=this._generateId(a),c=c||{},this.options=new b(c,a),e.__super__.constructor.call(this);var d=a.attr("tabindex")||0;a.data("old-tabindex",d),a.attr("tabindex","-1");var f=this.options.get("dataAdapter");this.dataAdapter=new f(a,this.options);var g=this.render();this._placeContainer(g);var h=this.options.get("selectionAdapter");this.selection=new h(a,this.options),this.$selection=this.selection.render(),this.selection.position(this.$selection,g);var i=this.options.get("dropdownAdapter");this.dropdown=new i(a,this.options),this.$dropdown=this.dropdown.render(),this.dropdown.position(this.$dropdown,g);var j=this.options.get("resultsAdapter");this.results=new j(a,this.options,this.dataAdapter),this.$results=this.results.render(),this.results.position(this.$results,this.$dropdown);var k=this;this._bindAdapters(),this._registerDomEvents(),this._registerDataEvents(),this._registerSelectionEvents(),this._registerDropdownEvents(),this._registerResultsEvents(),this._registerEvents(),this.dataAdapter.current(function(a){k.trigger("selection:update",{data:a})}),a.addClass("select2-hidden-accessible"),a.attr("aria-hidden","true"),this._syncAttributes(),a.data("select2",this)};return c.Extend(e,c.Observable),e.prototype._generateId=function(a){var b="";return b=null!=a.attr("id")?a.attr("id"):null!=a.attr("name")?a.attr("name")+"-"+c.generateChars(2):c.generateChars(4),b=b.replace(/(:|\.|\[|\]|,)/g,""),b="select2-"+b},e.prototype._placeContainer=function(a){a.insertAfter(this.$element);var b=this._resolveWidth(this.$element,this.options.get("width"));null!=b&&a.css("width",b)},e.prototype._resolveWidth=function(a,b){var c=/^width:(([-+]?([0-9]*\.)?[0-9]+)(px|em|ex|%|in|cm|mm|pt|pc))/i;if("resolve"==b){var d=this._resolveWidth(a,"style");return null!=d?d:this._resolveWidth(a,"element")}if("element"==b){var e=a.outerWidth(!1);return 0>=e?"auto":e+"px"}if("style"==b){var f=a.attr("style");if("string"!=typeof f)return null;for(var g=f.split(";"),h=0,i=g.length;i>h;h+=1){var j=g[h].replace(/\s/g,""),k=j.match(c);if(null!==k&&k.length>=1)return k[1]}return null}return b},e.prototype._bindAdapters=function(){this.dataAdapter.bind(this,this.$container),this.selection.bind(this,this.$container),this.dropdown.bind(this,this.$container),this.results.bind(this,this.$container)},e.prototype._registerDomEvents=function(){var b=this;this.$element.on("change.select2",function(){b.dataAdapter.current(function(a){b.trigger("selection:update",{data:a})})}),this.$element.on("focus.select2",function(a){b.trigger("focus",a)}),this._syncA=c.bind(this._syncAttributes,this),this._syncS=c.bind(this._syncSubtree,this),this.$element[0].attachEvent&&this.$element[0].attachEvent("onpropertychange",this._syncA);var d=window.MutationObserver||window.WebKitMutationObserver||window.MozMutationObserver;null!=d?(this._observer=new d(function(c){a.each(c,b._syncA),a.each(c,b._syncS)}),this._observer.observe(this.$element[0],{attributes:!0,childList:!0,subtree:!1})):this.$element[0].addEventListener&&(this.$element[0].addEventListener("DOMAttrModified",b._syncA,!1),this.$element[0].addEventListener("DOMNodeInserted",b._syncS,!1),this.$element[0].addEventListener("DOMNodeRemoved",b._syncS,!1))},e.prototype._registerDataEvents=function(){var a=this;this.dataAdapter.on("*",function(b,c){a.trigger(b,c)})},e.prototype._registerSelectionEvents=function(){var b=this,c=["toggle","focus"];this.selection.on("toggle",function(){b.toggleDropdown()}),this.selection.on("focus",function(a){b.focus(a)}),this.selection.on("*",function(d,e){-1===a.inArray(d,c)&&b.trigger(d,e)})},e.prototype._registerDropdownEvents=function(){var a=this;this.dropdown.on("*",function(b,c){a.trigger(b,c)})},e.prototype._registerResultsEvents=function(){var a=this;this.results.on("*",function(b,c){a.trigger(b,c)})},e.prototype._registerEvents=function(){var a=this;this.on("open",function(){a.$container.addClass("select2-container--open")}),this.on("close",function(){a.$container.removeClass("select2-container--open")}),this.on("enable",function(){a.$container.removeClass("select2-container--disabled")}),this.on("disable",function(){a.$container.addClass("select2-container--disabled")}),this.on("blur",function(){a.$container.removeClass("select2-container--focus")}),this.on("query",function(b){a.isOpen()||a.trigger("open",{}),this.dataAdapter.query(b,function(c){a.trigger("results:all",{data:c,query:b})})}),this.on("query:append",function(b){this.dataAdapter.query(b,function(c){a.trigger("results:append",{data:c,query:b})})}),this.on("keypress",function(b){var c=b.which;a.isOpen()?c===d.ESC||c===d.TAB||c===d.UP&&b.altKey?(a.close(),b.preventDefault()):c===d.ENTER?(a.trigger("results:select",{}),b.preventDefault()):c===d.SPACE&&b.ctrlKey?(a.trigger("results:toggle",{}),b.preventDefault()):c===d.UP?(a.trigger("results:previous",{}),b.preventDefault()):c===d.DOWN&&(a.trigger("results:next",{}),b.preventDefault()):(c===d.ENTER||c===d.SPACE||c===d.DOWN&&b.altKey)&&(a.open(),b.preventDefault())})},e.prototype._syncAttributes=function(){this.options.set("disabled",this.$element.prop("disabled")),this.options.get("disabled")?(this.isOpen()&&this.close(),this.trigger("disable",{})):this.trigger("enable",{})},e.prototype._syncSubtree=function(a,b){var c=!1,d=this;if(!a||!a.target||"OPTION"===a.target.nodeName||"OPTGROUP"===a.target.nodeName){if(b)if(b.addedNodes&&b.addedNodes.length>0)for(var e=0;e<b.addedNodes.length;e++){var f=b.addedNodes[e];f.selected&&(c=!0)}else b.removedNodes&&b.removedNodes.length>0&&(c=!0);else c=!0;c&&this.dataAdapter.current(function(a){d.trigger("selection:update",{data:a})})}},e.prototype.trigger=function(a,b){var c=e.__super__.trigger,d={open:"opening",close:"closing",select:"selecting",unselect:"unselecting"};if(void 0===b&&(b={}),a in d){var f=d[a],g={prevented:!1,name:a,args:b};if(c.call(this,f,g),g.prevented)return void(b.prevented=!0)}c.call(this,a,b)},e.prototype.toggleDropdown=function(){this.options.get("disabled")||(this.isOpen()?this.close():this.open())},e.prototype.open=function(){this.isOpen()||this.trigger("query",{})},e.prototype.close=function(){this.isOpen()&&this.trigger("close",{})},e.prototype.isOpen=function(){return this.$container.hasClass("select2-container--open")},e.prototype.hasFocus=function(){return this.$container.hasClass("select2-container--focus")},e.prototype.focus=function(a){this.hasFocus()||(this.$container.addClass("select2-container--focus"),this.trigger("focus",{}))},e.prototype.enable=function(a){this.options.get("debug")&&window.console&&console.warn&&console.warn('Select2: The `select2("enable")` method has been deprecated and will be removed in later Select2 versions. Use $element.prop("disabled") instead.'),(null==a||0===a.length)&&(a=[!0]);var b=!a[0];this.$element.prop("disabled",b)},e.prototype.data=function(){this.options.get("debug")&&arguments.length>0&&window.console&&console.warn&&console.warn('Select2: Data can no longer be set using `select2("data")`. You should consider setting the value instead using `$element.val()`.');var a=[];return this.dataAdapter.current(function(b){a=b}),a},e.prototype.val=function(b){if(this.options.get("debug")&&window.console&&console.warn&&console.warn('Select2: The `select2("val")` method has been deprecated and will be removed in later Select2 versions. Use $element.val() instead.'),null==b||0===b.length)return this.$element.val();var c=b[0];a.isArray(c)&&(c=a.map(c,function(a){return a.toString()})),this.$element.val(c).trigger("change")},e.prototype.destroy=function(){this.$container.remove(),this.$element[0].detachEvent&&this.$element[0].detachEvent("onpropertychange",this._syncA),null!=this._observer?(this._observer.disconnect(),this._observer=null):this.$element[0].removeEventListener&&(this.$element[0].removeEventListener("DOMAttrModified",this._syncA,!1),this.$element[0].removeEventListener("DOMNodeInserted",this._syncS,!1),this.$element[0].removeEventListener("DOMNodeRemoved",this._syncS,!1)),this._syncA=null,this._syncS=null,this.$element.off(".select2"),this.$element.attr("tabindex",this.$element.data("old-tabindex")),this.$element.removeClass("select2-hidden-accessible"),this.$element.attr("aria-hidden","false"),this.$element.removeData("select2"),this.dataAdapter.destroy(),this.selection.destroy(),this.dropdown.destroy(),this.results.destroy(),this.dataAdapter=null,this.selection=null,this.dropdown=null,this.results=null;
},e.prototype.render=function(){var b=a('<span class="select2 select2-container"><span class="selection"></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>');return b.attr("dir",this.options.get("dir")),this.$container=b,this.$container.addClass("select2-container--"+this.options.get("theme")),b.data("element",this.$element),b},e}),b.define("select2/compat/utils",["jquery"],function(a){function b(b,c,d){var e,f,g=[];e=a.trim(b.attr("class")),e&&(e=""+e,a(e.split(/\s+/)).each(function(){0===this.indexOf("select2-")&&g.push(this)})),e=a.trim(c.attr("class")),e&&(e=""+e,a(e.split(/\s+/)).each(function(){0!==this.indexOf("select2-")&&(f=d(this),null!=f&&g.push(f))})),b.attr("class",g.join(" "))}return{syncCssClasses:b}}),b.define("select2/compat/containerCss",["jquery","./utils"],function(a,b){function c(a){return null}function d(){}return d.prototype.render=function(d){var e=d.call(this),f=this.options.get("containerCssClass")||"";a.isFunction(f)&&(f=f(this.$element));var g=this.options.get("adaptContainerCssClass");if(g=g||c,-1!==f.indexOf(":all:")){f=f.replace(":all:","");var h=g;g=function(a){var b=h(a);return null!=b?b+" "+a:a}}var i=this.options.get("containerCss")||{};return a.isFunction(i)&&(i=i(this.$element)),b.syncCssClasses(e,this.$element,g),e.css(i),e.addClass(f),e},d}),b.define("select2/compat/dropdownCss",["jquery","./utils"],function(a,b){function c(a){return null}function d(){}return d.prototype.render=function(d){var e=d.call(this),f=this.options.get("dropdownCssClass")||"";a.isFunction(f)&&(f=f(this.$element));var g=this.options.get("adaptDropdownCssClass");if(g=g||c,-1!==f.indexOf(":all:")){f=f.replace(":all:","");var h=g;g=function(a){var b=h(a);return null!=b?b+" "+a:a}}var i=this.options.get("dropdownCss")||{};return a.isFunction(i)&&(i=i(this.$element)),b.syncCssClasses(e,this.$element,g),e.css(i),e.addClass(f),e},d}),b.define("select2/compat/initSelection",["jquery"],function(a){function b(a,b,c){c.get("debug")&&window.console&&console.warn&&console.warn("Select2: The `initSelection` option has been deprecated in favor of a custom data adapter that overrides the `current` method. This method is now called multiple times instead of a single time when the instance is initialized. Support will be removed for the `initSelection` option in future versions of Select2"),this.initSelection=c.get("initSelection"),this._isInitialized=!1,a.call(this,b,c)}return b.prototype.current=function(b,c){var d=this;return this._isInitialized?void b.call(this,c):void this.initSelection.call(null,this.$element,function(b){d._isInitialized=!0,a.isArray(b)||(b=[b]),c(b)})},b}),b.define("select2/compat/inputData",["jquery"],function(a){function b(a,b,c){this._currentData=[],this._valueSeparator=c.get("valueSeparator")||",","hidden"===b.prop("type")&&c.get("debug")&&console&&console.warn&&console.warn("Select2: Using a hidden input with Select2 is no longer supported and may stop working in the future. It is recommended to use a `<select>` element instead."),a.call(this,b,c)}return b.prototype.current=function(b,c){function d(b,c){var e=[];return b.selected||-1!==a.inArray(b.id,c)?(b.selected=!0,e.push(b)):b.selected=!1,b.children&&e.push.apply(e,d(b.children,c)),e}for(var e=[],f=0;f<this._currentData.length;f++){var g=this._currentData[f];e.push.apply(e,d(g,this.$element.val().split(this._valueSeparator)))}c(e)},b.prototype.select=function(b,c){if(this.options.get("multiple")){var d=this.$element.val();d+=this._valueSeparator+c.id,this.$element.val(d),this.$element.trigger("change")}else this.current(function(b){a.map(b,function(a){a.selected=!1})}),this.$element.val(c.id),this.$element.trigger("change")},b.prototype.unselect=function(a,b){var c=this;b.selected=!1,this.current(function(a){for(var d=[],e=0;e<a.length;e++){var f=a[e];b.id!=f.id&&d.push(f.id)}c.$element.val(d.join(c._valueSeparator)),c.$element.trigger("change")})},b.prototype.query=function(a,b,c){for(var d=[],e=0;e<this._currentData.length;e++){var f=this._currentData[e],g=this.matches(b,f);null!==g&&d.push(g)}c({results:d})},b.prototype.addOptions=function(b,c){var d=a.map(c,function(b){return a.data(b[0],"data")});this._currentData.push.apply(this._currentData,d)},b}),b.define("select2/compat/matcher",["jquery"],function(a){function b(b){function c(c,d){var e=a.extend(!0,{},d);if(null==c.term||""===a.trim(c.term))return e;if(d.children){for(var f=d.children.length-1;f>=0;f--){var g=d.children[f],h=b(c.term,g.text,g);h||e.children.splice(f,1)}if(e.children.length>0)return e}return b(c.term,d.text,d)?e:null}return c}return b}),b.define("select2/compat/query",[],function(){function a(a,b,c){c.get("debug")&&window.console&&console.warn&&console.warn("Select2: The `query` option has been deprecated in favor of a custom data adapter that overrides the `query` method. Support will be removed for the `query` option in future versions of Select2."),a.call(this,b,c)}return a.prototype.query=function(a,b,c){b.callback=c;var d=this.options.get("query");d.call(null,b)},a}),b.define("select2/dropdown/attachContainer",[],function(){function a(a,b,c){a.call(this,b,c)}return a.prototype.position=function(a,b,c){var d=c.find(".dropdown-wrapper");d.append(b),b.addClass("select2-dropdown--below"),c.addClass("select2-container--below")},a}),b.define("select2/dropdown/stopPropagation",[],function(){function a(){}return a.prototype.bind=function(a,b,c){a.call(this,b,c);var d=["blur","change","click","dblclick","focus","focusin","focusout","input","keydown","keyup","keypress","mousedown","mouseenter","mouseleave","mousemove","mouseover","mouseup","search","touchend","touchstart"];this.$dropdown.on(d.join(" "),function(a){a.stopPropagation()})},a}),b.define("select2/selection/stopPropagation",[],function(){function a(){}return a.prototype.bind=function(a,b,c){a.call(this,b,c);var d=["blur","change","click","dblclick","focus","focusin","focusout","input","keydown","keyup","keypress","mousedown","mouseenter","mouseleave","mousemove","mouseover","mouseup","search","touchend","touchstart"];this.$selection.on(d.join(" "),function(a){a.stopPropagation()})},a}),function(c){"function"==typeof b.define&&b.define.amd?b.define("jquery-mousewheel",["jquery"],c):"object"==typeof exports?module.exports=c:c(a)}(function(a){function b(b){var g=b||window.event,h=i.call(arguments,1),j=0,l=0,m=0,n=0,o=0,p=0;if(b=a.event.fix(g),b.type="mousewheel","detail"in g&&(m=-1*g.detail),"wheelDelta"in g&&(m=g.wheelDelta),"wheelDeltaY"in g&&(m=g.wheelDeltaY),"wheelDeltaX"in g&&(l=-1*g.wheelDeltaX),"axis"in g&&g.axis===g.HORIZONTAL_AXIS&&(l=-1*m,m=0),j=0===m?l:m,"deltaY"in g&&(m=-1*g.deltaY,j=m),"deltaX"in g&&(l=g.deltaX,0===m&&(j=-1*l)),0!==m||0!==l){if(1===g.deltaMode){var q=a.data(this,"mousewheel-line-height");j*=q,m*=q,l*=q}else if(2===g.deltaMode){var r=a.data(this,"mousewheel-page-height");j*=r,m*=r,l*=r}if(n=Math.max(Math.abs(m),Math.abs(l)),(!f||f>n)&&(f=n,d(g,n)&&(f/=40)),d(g,n)&&(j/=40,l/=40,m/=40),j=Math[j>=1?"floor":"ceil"](j/f),l=Math[l>=1?"floor":"ceil"](l/f),m=Math[m>=1?"floor":"ceil"](m/f),k.settings.normalizeOffset&&this.getBoundingClientRect){var s=this.getBoundingClientRect();o=b.clientX-s.left,p=b.clientY-s.top}return b.deltaX=l,b.deltaY=m,b.deltaFactor=f,b.offsetX=o,b.offsetY=p,b.deltaMode=0,h.unshift(b,j,l,m),e&&clearTimeout(e),e=setTimeout(c,200),(a.event.dispatch||a.event.handle).apply(this,h)}}function c(){f=null}function d(a,b){return k.settings.adjustOldDeltas&&"mousewheel"===a.type&&b%120===0}var e,f,g=["wheel","mousewheel","DOMMouseScroll","MozMousePixelScroll"],h="onwheel"in document||document.documentMode>=9?["wheel"]:["mousewheel","DomMouseScroll","MozMousePixelScroll"],i=Array.prototype.slice;if(a.event.fixHooks)for(var j=g.length;j;)a.event.fixHooks[g[--j]]=a.event.mouseHooks;var k=a.event.special.mousewheel={version:"3.1.12",setup:function(){if(this.addEventListener)for(var c=h.length;c;)this.addEventListener(h[--c],b,!1);else this.onmousewheel=b;a.data(this,"mousewheel-line-height",k.getLineHeight(this)),a.data(this,"mousewheel-page-height",k.getPageHeight(this))},teardown:function(){if(this.removeEventListener)for(var c=h.length;c;)this.removeEventListener(h[--c],b,!1);else this.onmousewheel=null;a.removeData(this,"mousewheel-line-height"),a.removeData(this,"mousewheel-page-height")},getLineHeight:function(b){var c=a(b),d=c["offsetParent"in a.fn?"offsetParent":"parent"]();return d.length||(d=a("body")),parseInt(d.css("fontSize"),10)||parseInt(c.css("fontSize"),10)||16},getPageHeight:function(b){return a(b).height()},settings:{adjustOldDeltas:!0,normalizeOffset:!0}};a.fn.extend({mousewheel:function(a){return a?this.bind("mousewheel",a):this.trigger("mousewheel")},unmousewheel:function(a){return this.unbind("mousewheel",a)}})}),b.define("jquery.select2",["jquery","jquery-mousewheel","./select2/core","./select2/defaults"],function(a,b,c,d){if(null==a.fn.select2){var e=["open","close","destroy"];a.fn.select2=function(b){if(b=b||{},"object"==typeof b)return this.each(function(){var d=a.extend(!0,{},b);new c(a(this),d)}),this;if("string"==typeof b){var d,f=Array.prototype.slice.call(arguments,1);return this.each(function(){var c=a(this).data("select2");null==c&&window.console&&console.error&&console.error("The select2('"+b+"') method was called on an element that is not using Select2."),d=c[b].apply(c,f)}),a.inArray(b,e)>-1?this:d}throw new Error("Invalid arguments for Select2: "+b)}}return null==a.fn.select2.defaults&&(a.fn.select2.defaults=d),c}),{define:b.define,require:b.require}}(),c=b.require("jquery.select2");return a.fn.select2.amd=b,c});
/*!
 * classie - class helper functions
 * from bonzo https://github.com/ded/bonzo
 * 
 * classie.has( elem, 'my-class' ) -> true/false
 * classie.add( elem, 'my-new-class' )
 * classie.remove( elem, 'my-unwanted-class' )
 * classie.toggle( elem, 'my-class' )
 */

/*jshint browser: true, strict: true, undef: true */
/*global define: false */

( function( window ) {

'use strict';

// class helper functions from bonzo https://github.com/ded/bonzo

function classReg( className ) {
  return new RegExp("(^|\\s+)" + className + "(\\s+|$)");
}

// classList support for class management
// altho to be fair, the api sucks because it won't accept multiple classes at once
var hasClass, addClass, removeClass;

if ( 'classList' in document.documentElement ) {
  hasClass = function( elem, c ) {
    return elem.classList.contains( c );
  };
  addClass = function( elem, c ) {
    elem.classList.add( c );
  };
  removeClass = function( elem, c ) {
    elem.classList.remove( c );
  };
}
else {
  hasClass = function( elem, c ) {
    return classReg( c ).test( elem.className );
  };
  addClass = function( elem, c ) {
    if ( !hasClass( elem, c ) ) {
      elem.className = elem.className + ' ' + c;
    }
  };
  removeClass = function( elem, c ) {
    elem.className = elem.className.replace( classReg( c ), ' ' );
  };
}

function toggleClass( elem, c ) {
  var fn = hasClass( elem, c ) ? removeClass : addClass;
  fn( elem, c );
}

var classie = {
  // full names
  hasClass: hasClass,
  addClass: addClass,
  removeClass: removeClass,
  toggleClass: toggleClass,
  // short names
  has: hasClass,
  add: addClass,
  remove: removeClass,
  toggle: toggleClass
};

// transport
if ( typeof define === 'function' && define.amd ) {
  // AMD
  define( classie );
} else {
  // browser global
  window.classie = classie;
}

})( window );

(function(){function require(name){var module=require.modules[name];if(!module)throw new Error('failed to require "'+name+'"');if(!("exports"in module)&&typeof module.definition==="function"){module.client=module.component=true;module.definition.call(this,module.exports={},module);delete module.definition}return module.exports}require.loader="component";require.helper={};require.helper.semVerSort=function(a,b){var aArray=a.version.split(".");var bArray=b.version.split(".");for(var i=0;i<aArray.length;++i){var aInt=parseInt(aArray[i],10);var bInt=parseInt(bArray[i],10);if(aInt===bInt){var aLex=aArray[i].substr((""+aInt).length);var bLex=bArray[i].substr((""+bInt).length);if(aLex===""&&bLex!=="")return 1;if(aLex!==""&&bLex==="")return-1;if(aLex!==""&&bLex!=="")return aLex>bLex?1:-1;continue}else if(aInt>bInt){return 1}else{return-1}}return 0};require.latest=function(name,returnPath){function showError(name){throw new Error('failed to find latest module of "'+name+'"')}var versionRegexp=/(.*)~(.*)@v?(\d+\.\d+\.\d+[^\/]*)$/;var remoteRegexp=/(.*)~(.*)/;if(!remoteRegexp.test(name))showError(name);var moduleNames=Object.keys(require.modules);var semVerCandidates=[];var otherCandidates=[];for(var i=0;i<moduleNames.length;i++){var moduleName=moduleNames[i];if(new RegExp(name+"@").test(moduleName)){var version=moduleName.substr(name.length+1);var semVerMatch=versionRegexp.exec(moduleName);if(semVerMatch!=null){semVerCandidates.push({version:version,name:moduleName})}else{otherCandidates.push({version:version,name:moduleName})}}}if(semVerCandidates.concat(otherCandidates).length===0){showError(name)}if(semVerCandidates.length>0){var module=semVerCandidates.sort(require.helper.semVerSort).pop().name;if(returnPath===true){return module}return require(module)}var module=otherCandidates.pop().name;if(returnPath===true){return module}return require(module)};require.modules={};require.register=function(name,definition){require.modules[name]={definition:definition}};require.define=function(name,exports){require.modules[name]={exports:exports}};require.register("abpetkov~transitionize@0.0.3",function(exports,module){module.exports=Transitionize;function Transitionize(element,props){if(!(this instanceof Transitionize))return new Transitionize(element,props);this.element=element;this.props=props||{};this.init()}Transitionize.prototype.isSafari=function(){return/Safari/.test(navigator.userAgent)&&/Apple Computer/.test(navigator.vendor)};Transitionize.prototype.init=function(){var transitions=[];for(var key in this.props){transitions.push(key+" "+this.props[key])}this.element.style.transition=transitions.join(", ");if(this.isSafari())this.element.style.webkitTransition=transitions.join(", ")}});require.register("ftlabs~fastclick@v0.6.11",function(exports,module){function FastClick(layer){"use strict";var oldOnClick,self=this;this.trackingClick=false;this.trackingClickStart=0;this.targetElement=null;this.touchStartX=0;this.touchStartY=0;this.lastTouchIdentifier=0;this.touchBoundary=10;this.layer=layer;if(!layer||!layer.nodeType){throw new TypeError("Layer must be a document node")}this.onClick=function(){return FastClick.prototype.onClick.apply(self,arguments)};this.onMouse=function(){return FastClick.prototype.onMouse.apply(self,arguments)};this.onTouchStart=function(){return FastClick.prototype.onTouchStart.apply(self,arguments)};this.onTouchMove=function(){return FastClick.prototype.onTouchMove.apply(self,arguments)};this.onTouchEnd=function(){return FastClick.prototype.onTouchEnd.apply(self,arguments)};this.onTouchCancel=function(){return FastClick.prototype.onTouchCancel.apply(self,arguments)};if(FastClick.notNeeded(layer)){return}if(this.deviceIsAndroid){layer.addEventListener("mouseover",this.onMouse,true);layer.addEventListener("mousedown",this.onMouse,true);layer.addEventListener("mouseup",this.onMouse,true)}layer.addEventListener("click",this.onClick,true);layer.addEventListener("touchstart",this.onTouchStart,false);layer.addEventListener("touchmove",this.onTouchMove,false);layer.addEventListener("touchend",this.onTouchEnd,false);layer.addEventListener("touchcancel",this.onTouchCancel,false);if(!Event.prototype.stopImmediatePropagation){layer.removeEventListener=function(type,callback,capture){var rmv=Node.prototype.removeEventListener;if(type==="click"){rmv.call(layer,type,callback.hijacked||callback,capture)}else{rmv.call(layer,type,callback,capture)}};layer.addEventListener=function(type,callback,capture){var adv=Node.prototype.addEventListener;if(type==="click"){adv.call(layer,type,callback.hijacked||(callback.hijacked=function(event){if(!event.propagationStopped){callback(event)}}),capture)}else{adv.call(layer,type,callback,capture)}}}if(typeof layer.onclick==="function"){oldOnClick=layer.onclick;layer.addEventListener("click",function(event){oldOnClick(event)},false);layer.onclick=null}}FastClick.prototype.deviceIsAndroid=navigator.userAgent.indexOf("Android")>0;FastClick.prototype.deviceIsIOS=/iP(ad|hone|od)/.test(navigator.userAgent);FastClick.prototype.deviceIsIOS4=FastClick.prototype.deviceIsIOS&&/OS 4_\d(_\d)?/.test(navigator.userAgent);FastClick.prototype.deviceIsIOSWithBadTarget=FastClick.prototype.deviceIsIOS&&/OS ([6-9]|\d{2})_\d/.test(navigator.userAgent);FastClick.prototype.needsClick=function(target){"use strict";switch(target.nodeName.toLowerCase()){case"button":case"select":case"textarea":if(target.disabled){return true}break;case"input":if(this.deviceIsIOS&&target.type==="file"||target.disabled){return true}break;case"label":case"video":return true}return/\bneedsclick\b/.test(target.className)};FastClick.prototype.needsFocus=function(target){"use strict";switch(target.nodeName.toLowerCase()){case"textarea":return true;case"select":return!this.deviceIsAndroid;case"input":switch(target.type){case"button":case"checkbox":case"file":case"image":case"radio":case"submit":return false}return!target.disabled&&!target.readOnly;default:return/\bneedsfocus\b/.test(target.className)}};FastClick.prototype.sendClick=function(targetElement,event){"use strict";var clickEvent,touch;if(document.activeElement&&document.activeElement!==targetElement){document.activeElement.blur()}touch=event.changedTouches[0];clickEvent=document.createEvent("MouseEvents");clickEvent.initMouseEvent(this.determineEventType(targetElement),true,true,window,1,touch.screenX,touch.screenY,touch.clientX,touch.clientY,false,false,false,false,0,null);clickEvent.forwardedTouchEvent=true;targetElement.dispatchEvent(clickEvent)};FastClick.prototype.determineEventType=function(targetElement){"use strict";if(this.deviceIsAndroid&&targetElement.tagName.toLowerCase()==="select"){return"mousedown"}return"click"};FastClick.prototype.focus=function(targetElement){"use strict";var length;if(this.deviceIsIOS&&targetElement.setSelectionRange&&targetElement.type.indexOf("date")!==0&&targetElement.type!=="time"){length=targetElement.value.length;targetElement.setSelectionRange(length,length)}else{targetElement.focus()}};FastClick.prototype.updateScrollParent=function(targetElement){"use strict";var scrollParent,parentElement;scrollParent=targetElement.fastClickScrollParent;if(!scrollParent||!scrollParent.contains(targetElement)){parentElement=targetElement;do{if(parentElement.scrollHeight>parentElement.offsetHeight){scrollParent=parentElement;targetElement.fastClickScrollParent=parentElement;break}parentElement=parentElement.parentElement}while(parentElement)}if(scrollParent){scrollParent.fastClickLastScrollTop=scrollParent.scrollTop}};FastClick.prototype.getTargetElementFromEventTarget=function(eventTarget){"use strict";if(eventTarget.nodeType===Node.TEXT_NODE){return eventTarget.parentNode}return eventTarget};FastClick.prototype.onTouchStart=function(event){"use strict";var targetElement,touch,selection;if(event.targetTouches.length>1){return true}targetElement=this.getTargetElementFromEventTarget(event.target);touch=event.targetTouches[0];if(this.deviceIsIOS){selection=window.getSelection();if(selection.rangeCount&&!selection.isCollapsed){return true}if(!this.deviceIsIOS4){if(touch.identifier===this.lastTouchIdentifier){event.preventDefault();return false}this.lastTouchIdentifier=touch.identifier;this.updateScrollParent(targetElement)}}this.trackingClick=true;this.trackingClickStart=event.timeStamp;this.targetElement=targetElement;this.touchStartX=touch.pageX;this.touchStartY=touch.pageY;if(event.timeStamp-this.lastClickTime<200){event.preventDefault()}return true};FastClick.prototype.touchHasMoved=function(event){"use strict";var touch=event.changedTouches[0],boundary=this.touchBoundary;if(Math.abs(touch.pageX-this.touchStartX)>boundary||Math.abs(touch.pageY-this.touchStartY)>boundary){return true}return false};FastClick.prototype.onTouchMove=function(event){"use strict";if(!this.trackingClick){return true}if(this.targetElement!==this.getTargetElementFromEventTarget(event.target)||this.touchHasMoved(event)){this.trackingClick=false;this.targetElement=null}return true};FastClick.prototype.findControl=function(labelElement){"use strict";if(labelElement.control!==undefined){return labelElement.control}if(labelElement.htmlFor){return document.getElementById(labelElement.htmlFor)}return labelElement.querySelector("button, input:not([type=hidden]), keygen, meter, output, progress, select, textarea")};FastClick.prototype.onTouchEnd=function(event){"use strict";var forElement,trackingClickStart,targetTagName,scrollParent,touch,targetElement=this.targetElement;if(!this.trackingClick){return true}if(event.timeStamp-this.lastClickTime<200){this.cancelNextClick=true;return true}this.cancelNextClick=false;this.lastClickTime=event.timeStamp;trackingClickStart=this.trackingClickStart;this.trackingClick=false;this.trackingClickStart=0;if(this.deviceIsIOSWithBadTarget){touch=event.changedTouches[0];targetElement=document.elementFromPoint(touch.pageX-window.pageXOffset,touch.pageY-window.pageYOffset)||targetElement;targetElement.fastClickScrollParent=this.targetElement.fastClickScrollParent}targetTagName=targetElement.tagName.toLowerCase();if(targetTagName==="label"){forElement=this.findControl(targetElement);if(forElement){this.focus(targetElement);if(this.deviceIsAndroid){return false}targetElement=forElement}}else if(this.needsFocus(targetElement)){if(event.timeStamp-trackingClickStart>100||this.deviceIsIOS&&window.top!==window&&targetTagName==="input"){this.targetElement=null;return false}this.focus(targetElement);if(!this.deviceIsIOS4||targetTagName!=="select"){this.targetElement=null;event.preventDefault()}return false}if(this.deviceIsIOS&&!this.deviceIsIOS4){scrollParent=targetElement.fastClickScrollParent;if(scrollParent&&scrollParent.fastClickLastScrollTop!==scrollParent.scrollTop){return true}}if(!this.needsClick(targetElement)){event.preventDefault();this.sendClick(targetElement,event)}return false};FastClick.prototype.onTouchCancel=function(){"use strict";this.trackingClick=false;this.targetElement=null};FastClick.prototype.onMouse=function(event){"use strict";if(!this.targetElement){return true}if(event.forwardedTouchEvent){return true}if(!event.cancelable){return true}if(!this.needsClick(this.targetElement)||this.cancelNextClick){if(event.stopImmediatePropagation){event.stopImmediatePropagation()}else{event.propagationStopped=true}event.stopPropagation();event.preventDefault();return false}return true};FastClick.prototype.onClick=function(event){"use strict";var permitted;if(this.trackingClick){this.targetElement=null;this.trackingClick=false;return true}if(event.target.type==="submit"&&event.detail===0){return true}permitted=this.onMouse(event);if(!permitted){this.targetElement=null}return permitted};FastClick.prototype.destroy=function(){"use strict";var layer=this.layer;if(this.deviceIsAndroid){layer.removeEventListener("mouseover",this.onMouse,true);layer.removeEventListener("mousedown",this.onMouse,true);layer.removeEventListener("mouseup",this.onMouse,true)}layer.removeEventListener("click",this.onClick,true);layer.removeEventListener("touchstart",this.onTouchStart,false);layer.removeEventListener("touchmove",this.onTouchMove,false);layer.removeEventListener("touchend",this.onTouchEnd,false);layer.removeEventListener("touchcancel",this.onTouchCancel,false)};FastClick.notNeeded=function(layer){"use strict";var metaViewport;var chromeVersion;if(typeof window.ontouchstart==="undefined"){return true}chromeVersion=+(/Chrome\/([0-9]+)/.exec(navigator.userAgent)||[,0])[1];if(chromeVersion){if(FastClick.prototype.deviceIsAndroid){metaViewport=document.querySelector("meta[name=viewport]");if(metaViewport){if(metaViewport.content.indexOf("user-scalable=no")!==-1){return true}if(chromeVersion>31&&window.innerWidth<=window.screen.width){return true}}}else{return true}}if(layer.style.msTouchAction==="none"){return true}return false};FastClick.attach=function(layer){"use strict";return new FastClick(layer)};if(typeof define!=="undefined"&&define.amd){define(function(){"use strict";return FastClick})}else if(typeof module!=="undefined"&&module.exports){module.exports=FastClick.attach;module.exports.FastClick=FastClick}else{window.FastClick=FastClick}});require.register("component~indexof@0.0.3",function(exports,module){module.exports=function(arr,obj){if(arr.indexOf)return arr.indexOf(obj);for(var i=0;i<arr.length;++i){if(arr[i]===obj)return i}return-1}});require.register("component~classes@1.2.1",function(exports,module){var index=require("component~indexof@0.0.3");var re=/\s+/;var toString=Object.prototype.toString;module.exports=function(el){return new ClassList(el)};function ClassList(el){if(!el)throw new Error("A DOM element reference is required");this.el=el;this.list=el.classList}ClassList.prototype.add=function(name){if(this.list){this.list.add(name);return this}var arr=this.array();var i=index(arr,name);if(!~i)arr.push(name);this.el.className=arr.join(" ");return this};ClassList.prototype.remove=function(name){if("[object RegExp]"==toString.call(name)){return this.removeMatching(name)}if(this.list){this.list.remove(name);return this}var arr=this.array();var i=index(arr,name);if(~i)arr.splice(i,1);this.el.className=arr.join(" ");return this};ClassList.prototype.removeMatching=function(re){var arr=this.array();for(var i=0;i<arr.length;i++){if(re.test(arr[i])){this.remove(arr[i])}}return this};ClassList.prototype.toggle=function(name,force){if(this.list){if("undefined"!==typeof force){if(force!==this.list.toggle(name,force)){this.list.toggle(name)}}else{this.list.toggle(name)}return this}if("undefined"!==typeof force){if(!force){this.remove(name)}else{this.add(name)}}else{if(this.has(name)){this.remove(name)}else{this.add(name)}}return this};ClassList.prototype.array=function(){var str=this.el.className.replace(/^\s+|\s+$/g,"");var arr=str.split(re);if(""===arr[0])arr.shift();return arr};ClassList.prototype.has=ClassList.prototype.contains=function(name){return this.list?this.list.contains(name):!!~index(this.array(),name)}});require.register("switchery",function(exports,module){var transitionize=require("abpetkov~transitionize@0.0.3"),fastclick=require("ftlabs~fastclick@v0.6.11"),classes=require("component~classes@1.2.1");module.exports=Switchery;var defaults={color:"#64bd63",secondaryColor:"#dfdfdf",jackColor:"#fff",className:"switchery",disabled:false,disabledOpacity:.5,speed:"0.4s",size:"default"};function Switchery(element,options){if(!(this instanceof Switchery))return new Switchery(element,options);this.element=element;this.options=options||{};for(var i in defaults){if(this.options[i]==null){this.options[i]=defaults[i]}}if(this.element!=null&&this.element.type=="checkbox")this.init()}Switchery.prototype.hide=function(){this.element.style.display="none"};Switchery.prototype.show=function(){var switcher=this.create();this.insertAfter(this.element,switcher)};Switchery.prototype.create=function(){this.switcher=document.createElement("span");this.jack=document.createElement("small");this.switcher.appendChild(this.jack);this.switcher.className=this.options.className;return this.switcher};Switchery.prototype.insertAfter=function(reference,target){reference.parentNode.insertBefore(target,reference.nextSibling)};Switchery.prototype.isChecked=function(){return this.element.checked};Switchery.prototype.isDisabled=function(){return this.options.disabled||this.element.disabled||this.element.readOnly};Switchery.prototype.setPosition=function(clicked){var checked=this.isChecked(),switcher=this.switcher,jack=this.jack;if(clicked&&checked)checked=false;else if(clicked&&!checked)checked=true;if(checked===true){this.element.checked=true;if(window.getComputedStyle)jack.style.left=parseInt(window.getComputedStyle(switcher).width)-parseInt(window.getComputedStyle(jack).width)+"px";else jack.style.left=parseInt(switcher.currentStyle["width"])-parseInt(jack.currentStyle["width"])+"px";if(this.options.color)this.colorize();this.setSpeed()}else{jack.style.left=0;this.element.checked=false;this.switcher.style.boxShadow="inset 0 0 0 0 "+this.options.secondaryColor;this.switcher.style.borderColor=this.options.secondaryColor;this.switcher.style.backgroundColor=this.options.secondaryColor!==defaults.secondaryColor?this.options.secondaryColor:"#fff";this.jack.style.backgroundColor=this.options.jackColor;this.setSpeed()}};Switchery.prototype.setSpeed=function(){var switcherProp={},jackProp={left:this.options.speed.replace(/[a-z]/,"")/2+"s"};if(this.isChecked()){switcherProp={border:this.options.speed,"box-shadow":this.options.speed,"background-color":this.options.speed.replace(/[a-z]/,"")*3+"s"}}else{switcherProp={border:this.options.speed,"box-shadow":this.options.speed}}transitionize(this.switcher,switcherProp);transitionize(this.jack,jackProp)};Switchery.prototype.setSize=function(){var small="switchery-small",normal="switchery-default",large="switchery-large";switch(this.options.size){case"small":classes(this.switcher).add(small);break;case"large":classes(this.switcher).add(large);break;default:classes(this.switcher).add(normal);break}};Switchery.prototype.colorize=function(){var switcherHeight=this.switcher.offsetHeight/2;this.switcher.style.backgroundColor=this.options.color;this.switcher.style.borderColor=this.options.color;this.switcher.style.boxShadow="inset 0 0 0 "+switcherHeight+"px "+this.options.color;this.jack.style.backgroundColor=this.options.jackColor};Switchery.prototype.handleOnchange=function(state){if(document.dispatchEvent){var event=document.createEvent("HTMLEvents");event.initEvent("change",true,true);this.element.dispatchEvent(event)}else{this.element.fireEvent("onchange")}};Switchery.prototype.handleChange=function(){var self=this,el=this.element;if(el.addEventListener){el.addEventListener("change",function(){self.setPosition()})}else{el.attachEvent("onchange",function(){self.setPosition()})}};Switchery.prototype.handleClick=function(){var self=this,switcher=this.switcher,parent=self.element.parentNode.tagName.toLowerCase(),labelParent=parent==="label"?false:true;if(this.isDisabled()===false){fastclick(switcher);if(switcher.addEventListener){switcher.addEventListener("click",function(e){self.setPosition(labelParent);self.handleOnchange(self.element.checked)})}else{switcher.attachEvent("onclick",function(){self.setPosition(labelParent);self.handleOnchange(self.element.checked)})}}else{this.element.disabled=true;this.switcher.style.opacity=this.options.disabledOpacity}};Switchery.prototype.markAsSwitched=function(){this.element.setAttribute("data-switchery",true)};Switchery.prototype.markedAsSwitched=function(){return this.element.getAttribute("data-switchery")};Switchery.prototype.init=function(){this.hide();this.show();this.setSize();this.setPosition();this.markAsSwitched();this.handleChange();this.handleClick()}});if(typeof exports=="object"){module.exports=require("switchery")}else if(typeof define=="function"&&define.amd){define("Switchery",[],function(){return require("switchery")})}else{(this||window)["Switchery"]=require("switchery")}})();
!function(l){l.fn.metrojs={capabilities:null,checkCapabilities:function(e,t){return(null==l.fn.metrojs.capabilities||"undefined"!=typeof t&&1==t)&&(l.fn.metrojs.capabilities=new l.fn.metrojs.MetroModernizr(e)),l.fn.metrojs.capabilities}};var e=l.fn.metrojs,t=99e3;l.fn.liveTile=function(e){if(n[e]){for(var t=[],i=1;i<=arguments.length;i++)t[i-1]=arguments[i];return n[e].apply(this,t)}return"object"!=typeof e&&e?(l.error("Method "+e+" does not exist on jQuery.liveTile"),null):n.init.apply(this,arguments)},l.fn.liveTile.contentModules={modules:[],addContentModule:function(l,e){this.modules instanceof Array||(this.modules=[]),this.modules.push(e)},hasContentModule:function(l){if("undefined"==typeof l||!(this.modules instanceof Array))return-1;for(var e=0;e<this.modules.length;e++)if("undefined"!=typeof this.modules[e].moduleName&&this.modules[e].moduleName==l)return e;return-1}},l.fn.liveTile.defaults={mode:"slide",speed:500,initDelay:-1,delay:5e3,stops:"100%",stack:!1,direction:"vertical",animationDirection:"forward",tileSelector:">div,>li,>p,>img,>a",tileFaceSelector:">div,>li,>p,>img,>a",ignoreDataAttributes:!1,click:null,link:"",newWindow:!1,bounce:!1,bounceDirections:"all",bounceFollowsMove:!0,pauseOnHover:!1,pauseOnHoverEvent:"both",playOnHover:!1,playOnHoverEvent:"both",onHoverDelay:0,repeatCount:-1,appendBack:!0,alwaysTrigger:!1,flipListOnHover:!1,flipListOnHoverEvent:"mouseout",noHAflipOpacity:"1",haTransFunc:"ease",noHaTransFunc:"linear",currentIndex:0,startNow:!0,useModernizr:"undefined"!=typeof window.Modernizr,useHardwareAccel:!0,useTranslate:!0,faces:{$front:null,$back:null},animationStarting:function(){},animationComplete:function(){},triggerDelay:function(){return 3e3*Math.random()},swap:"",swapFront:"-",swapBack:"-",contentModules:[]};var n={init:function(t){var n=l.extend({},l.fn.liveTile.defaults,t);return e.checkCapabilities(n),o.getBrowserPrefix(),-1==l.fn.liveTile.contentModules.hasContentModule("image")&&l.fn.liveTile.contentModules.addContentModule("image",a.imageSwap),-1==l.fn.liveTile.contentModules.hasContentModule("html")&&l.fn.liveTile.contentModules.addContentModule("html",a.htmlSwap),l(this).each(function(e,t){var o=l(t),a=i.initTileData(o,n);a.faces=i.prepTile(o,a),a.fade=function(l){i.fade(o,l)},a.slide=function(l){i.slide(o,l)},a.carousel=function(l){i.carousel(o,l)},a.flip=function(l){i.flip(o,l)},a.flipList=function(l){i.flipList(o,l)};var r={fade:a.fade,slide:a.slide,carousel:a.carousel,flip:a.flip,"flip-list":a.flipList};a.doAction=function(l){var e=r[a.mode];"function"==typeof e&&(e(l),a.hasRun=!0),l==a.timer.repeatCount&&(a.runEvents=!1)},a.timer=new l.fn.metrojs.TileTimer(a.delay,a.doAction,a.repeatCount),o.data("LiveTile",a),("flip-list"!==a.mode||0==a.flipListOnHover)&&(a.pauseOnHover?i.bindPauseOnHover(o):a.playOnHover&&i.bindPlayOnHover(o,a)),(a.link.length>0||"function"==typeof a.click)&&o.css({cursor:"pointer"}).bind("click.liveTile",function(l){var e=!0;"function"==typeof a.click&&(e=a.click(o,a)||!1),e&&a.link.length>0&&(l.preventDefault(),a.newWindow?window.open(a.link):window.location=a.link)}),i.bindBounce(o,a),a.startNow&&"none"!=a.mode&&(a.runEvents=!0,a.timer.start(a.initDelay))})},"goto":function(e){var t,n=typeof e;if("undefined"===n&&(t={index:-99,delay:0,autoAniDirection:!1}),"number"!==n&&isNaN(e)){if("string"===n)if("next"==e)t={index:-99,delay:0};else{if(0!==e.indexOf("prev"))return l.error(e+' is not a recognized action for .liveTile("goto")'),l(this);t={index:-100,delay:0}}else if("object"===n){"undefined"==typeof e.delay&&(e.delay=0);var i=typeof e.index;"undefined"===i?e.index=0:"string"===i&&("next"===e.index?e.index=-99:0===e.index.indexOf("prev")&&(e.index=-100)),t=e}}else t={index:parseInt(e,10),delay:0};return l(this).each(function(e,n){var i=l(n),o=i.data("LiveTile"),a=i.data("metrojs.tile"),r=t.index;if(a.animating===!0)return l(this);if("carousel"===o.mode){var s=o.faces.$listTiles.filter(".active"),c=o.faces.$listTiles.index(s);if(-100===r?(("undefined"==typeof t.autoAniDirection||1==t.autoAniDirection)&&(o.tempValues.animationDirection="undefined"==typeof t.animationDirection?"backward":t.animationDirection),r=0===c?o.faces.$listTiles.length-1:c-1):-99===r&&(("undefined"==typeof t.autoAniDirection||1==t.autoAniDirection)&&(o.tempValues.animationDirection="undefined"==typeof t.animationDirection?"forward":t.animationDirection),r=c+1),c==r)return;"undefined"!=typeof t.direction&&(o.tempValues.direction=t.direction),"undefined"!=typeof t.animationDirection&&(o.tempValues.animationDirection=t.animationDirection),o.currentIndex=0==r?o.faces.$listTiles.length:r-1}else o.currentIndex=r;o.runEvents=!0,o.timer.start(t.delay>=0?t.delay:o.delay)})},play:function(e){var t,n=typeof e;return"undefined"===n?t={delay:-1}:"number"===n?t={delay:e}:"object"===n&&("undefined"==typeof e.delay&&(e.delay=-1),t=e),l(this).each(function(e,n){var i=l(n),o=i.data("LiveTile");o.runEvents=!0,t.delay<0&&!o.hasRun&&(t.delay=o.initDelay),o.timer.start(t.delay>=0?t.delay:o.delay)})},animate:function(){return l(this).each(function(e,t){var n=l(t),i=n.data("LiveTile");i.doAction()})},stop:function(){return l(this).each(function(e,t){var n=l(t),i=n.data("LiveTile");i.hasRun=!1,i.runEvents=!1,i.timer.stop(),window.clearTimeout(i.eventTimeout),window.clearTimeout(i.flCompleteTimeout),window.clearTimeout(i.completeTimeout),"flip-list"===i.mode&&i.faces.$listTiles.each(function(e,t){var n=l(t).data("metrojs.tile");window.clearTimeout(n.eventTimeout),window.clearTimeout(n.flCompleteTimeout),window.clearTimeout(n.completeTimeout)})})},pause:function(){return l(this).each(function(e,t){var n=l(t),i=n.data("LiveTile");i.timer.pause(),i.runEvents=!1,window.clearTimeout(i.eventTimeout),window.clearTimeout(i.flCompleteTimeout),window.clearTimeout(i.completeTimeout),"flip-list"===i.mode&&i.faces.$listTiles.each(function(e,t){var n=l(t).data("metrojs.tile");window.clearTimeout(n.eventTimeout),window.clearTimeout(n.flCompleteTimeout),window.clearTimeout(n.completeTimeout)})})},restart:function(e){var t,n=typeof e;return"undefined"===n?t={delay:-1}:"number"===n?t={delay:e}:"object"===n&&("undefined"==typeof e.delay&&(e.delay=-1),t=e),l(this).each(function(e,n){var i=l(n),o=i.data("LiveTile");t.delay<0&&!o.hasRun&&(t.delay=o.initDelay),o.hasRun=!1,o.runEvents=!0,o.timer.restart(t.delay>=0?t.delay:o.delay)})},rebind:function(e){return l(this).each(function(l,t){"undefined"!=typeof e?("undefined"!=typeof e.timer&&null!=e.timer&&e.timer.stop(),e.hasRun=!1,n.init.apply(t,e)):n.init.apply(t,{})})},destroy:function(e){var t,n=typeof e;return"undefined"===n?t={removeCss:!1}:"boolean"===n?t={removeCss:e}:"object"===n&&("undefined"==typeof e.removeCss&&(e.removeCss=!1),t=e),l(this).each(function(e,n){var a=l(n),r=a.data("LiveTile");if("undefined"!=typeof r){a.unbind(".liveTile");var s=o.appendStyleProperties({margin:"",cursor:""},["transform","transition"],["",""]);r.timer.stop(),window.clearTimeout(r.eventTimeout),window.clearTimeout(r.flCompleteTimeout),window.clearTimeout(r.completeTimeout),null!=r.faces.$listTiles&&r.faces.$listTiles.each(function(e,n){var o=l(n);if("flip-list"===r.mode){var a=o.data("metrojs.tile");window.clearTimeout(a.eventTimeout),window.clearTimeout(a.flCompleteTimeout),window.clearTimeout(a.completeTimeout)}else if("carousel"===r.mode){var c=r.listData[e];c.bounce&&i.unbindMsBounce(o,c)}t.removeCss?(o.removeClass("ha"),o.find(r.tileFaceSelector).unbind(".liveTile").removeClass("bounce flip-front flip-back ha slide slide-front slide-back").css(s)):o.find(r.tileFaceSelector).unbind(".liveTile"),o.removeData("metrojs.tile")}).unbind(".liveTile"),null!=r.faces.$front&&t.removeCss&&r.faces.$front.removeClass("flip-front flip-back ha slide slide-front slide-back").css(s),null!=r.faces.$back&&t.removeCss&&r.faces.$back.removeClass("flip-front flip-back ha slide slide-front slide-back").css(s),r.bounce&&i.unbindMsBounce(a,r),r.playOnHover&&i.unbindMsPlayOnHover(a,r),r.pauseOnhover&&i.unbindMsPauseOnHover(a,r),a.removeClass("ha"),a.removeData("LiveTile"),a.removeData("metrojs.tile"),r=null}})}},i={dataAtr:function(l,e,t){return"undefined"!=typeof l.attr("data-"+e)?l.attr("data-"+e):t},dataMethod:function(l,e,t){return"undefined"!=typeof l.data(e)?l.data(e):t},getDataOrDefault:null,initTileData:function(t,n){var o=0==n.ignoreDataAttributes,a=null;null==this.getDataOrDefault&&(this.getDataOrDefault=e.capabilities.isOldJQuery?this.dataAtr:this.dataMethod),a=o?{speed:this.getDataOrDefault(t,"speed",n.speed),delay:this.getDataOrDefault(t,"delay",n.delay),stops:this.getDataOrDefault(t,"stops",n.stops),stack:this.getDataOrDefault(t,"stack",n.stack),mode:this.getDataOrDefault(t,"mode",n.mode),direction:this.getDataOrDefault(t,"direction",n.direction),useHardwareAccel:this.getDataOrDefault(t,"ha",n.useHardwareAccel),repeatCount:this.getDataOrDefault(t,"repeat",n.repeatCount),swap:this.getDataOrDefault(t,"swap",n.swap),appendBack:this.getDataOrDefault(t,"appendback",n.appendBack),currentIndex:this.getDataOrDefault(t,"start-index",n.currentIndex),animationDirection:this.getDataOrDefault(t,"ani-direction",n.animationDirection),startNow:this.getDataOrDefault(t,"start-now",n.startNow),tileSelector:this.getDataOrDefault(t,"tile-selector",n.tileSelector),tileFaceSelector:this.getDataOrDefault(t,"face-selector",n.tileFaceSelector),bounce:this.getDataOrDefault(t,"bounce",n.bounce),bounceDirections:this.getDataOrDefault(t,"bounce-dir",n.bounceDirections),bounceFollowsMove:this.getDataOrDefault(t,"bounce-follows",n.bounceFollowsMove),click:this.getDataOrDefault(t,"click",n.click),link:this.getDataOrDefault(t,"link",n.link),newWindow:this.getDataOrDefault(t,"new-window",n.newWindow),alwaysTrigger:this.getDataOrDefault(t,"always-trigger",n.alwaysTrigger),flipListOnHover:this.getDataOrDefault(t,"flip-onhover",n.flipListOnHover),pauseOnHover:this.getDataOrDefault(t,"pause-onhover",n.pauseOnHover),playOnHover:this.getDataOrDefault(t,"play-onhover",n.playOnHover),onHoverDelay:this.getDataOrDefault(t,"hover-delay",n.onHoverDelay),noHAflipOpacity:this.getDataOrDefault(t,"flip-opacity",n.noHAflipOpacity),useTranslate:this.getDataOrDefault(t,"use-translate",n.useTranslate),runEvents:!1,isReversed:!1,loopCount:0,contentModules:[],listData:[],height:t.height(),width:t.width(),tempValues:{}}:l.extend(!0,{runEvents:!1,isReversed:!1,loopCount:0,contentModules:[],listData:[],height:t.height(),width:t.width(),tempValues:{}},n),a.useTranslate=a.useTranslate&&a.useHardwareAccel&&e.capabilities.canTransform&&e.capabilities.canTransition,a.margin="vertical"===a.direction?a.height/2:a.width/2,a.stops="object"==typeof n.stops&&n.stops instanceof Array?n.stops:(""+a.stops).split(","),1===a.stops.length&&a.stops.push("0px");var r=a.swap.replace(" ","").split(","),s=o?this.getDataOrDefault(t,"swap-front",n.swapFront):n.swapFront,c=o?this.getDataOrDefault(t,"swap-back",n.swapBack):n.swapBack;a.swapFront="-"===s?r:s.replace(" ","").split(","),a.swapBack="-"===c?r:c.replace(" ","").split(",");var d;for(d=0;d<a.swapFront.length;d++)a.swapFront[d].length>0&&-1===l.inArray(a.swapFront[d],r)&&r.push(a.swapFront[d]);for(d=0;d<a.swapBack.length;d++)a.swapBack[d].length>0&&-1===l.inArray(a.swapBack[d],r)&&r.push(a.swapBack[d]);for(a.swap=r,d=0;d<r.length;d++)if(r[d].length>0){var u=l.fn.liveTile.contentModules.hasContentModule(r[d]);u>-1&&a.contentModules.push(l.fn.liveTile.contentModules.modules[u])}a.initDelay=o?this.getDataOrDefault(t,"initdelay",n.initDelay):n.initDelay,a.delay<-1?a.delay=n.triggerDelay(1):a.delay<0&&(a.delay=3500+4501*Math.random()),a.initDelay<0&&(a.initDelay=a.delay);var h={};for(d=0;d<a.contentModules.length;d++)l.extend(h,a.contentModules[d].data);l.extend(h,n,a);var f;for("flip-list"===h.mode?(f=t.find(h.tileSelector).not(".tile-title"),f.each(function(e,t){var n=l(t),a={direction:o?i.getDataOrDefault(n,"direction",h.direction):h.direction,newWindow:o?i.getDataOrDefault(n,"new-window",!1):!1,link:o?i.getDataOrDefault(n,"link",""):"",faces:{$front:null,$back:null},height:n.height(),width:n.width(),isReversed:!1};a.margin="vertical"===a.direction?a.height/2:a.width/2,h.listData.push(a)})):"carousel"===h.mode&&(h.stack=!0,f=t.find(h.tileSelector).not(".tile-title"),f.each(function(e,t){var n=l(t),a={bounce:o?i.getDataOrDefault(n,"bounce",!1):!1,bounceDirections:o?i.getDataOrDefault(n,"bounce-dir","all"):"all",link:o?i.getDataOrDefault(n,"link",""):"",newWindow:o?i.getDataOrDefault(n,"new-window",!1):!1,animationDirection:o?i.getDataOrDefault(n,"ani-direction",""):"",direction:o?i.getDataOrDefault(n,"direction",""):""};h.listData.push(a)})),d=0;d<a.contentModules.length;d++)"function"==typeof h.contentModules[d].initData&&h.contentModules[d].initData(h,t);return a=null,h},prepTile:function(n,a){n.addClass(a.mode);var r,s,c,d,u={$tileFaces:null,$listTiles:null,$front:null,$back:null};switch(a.mode){case"fade":u.$tileFaces=n.find(a.tileFaceSelector).not(".tile-title"),u.$front=null!=a.faces.$front&&a.faces.$front.length>0?a.faces.$front.addClass("fade-front"):u.$tileFaces.filter(":first").addClass("fade-front"),u.$back=null!=a.faces.$back&&a.faces.$back.length>0?a.faces.$back.addClass("fade-back"):u.$tileFaces.length>1?u.$tileFaces.filter(":last").addClass("fade-back"):a.appendBack?l('<div class="fade-back"></div>').appendTo(n):l("<div></div>");break;case"slide":if(u.$tileFaces=n.find(a.tileFaceSelector).not(".tile-title"),u.$front=null!=a.faces.$front&&a.faces.$front.length>0?a.faces.$front.addClass("slide-front"):u.$tileFaces.filter(":first").addClass("slide-front"),u.$back=null!=a.faces.$back&&a.faces.$back.length>0?a.faces.$back.addClass("slide-back"):u.$tileFaces.length>1?u.$tileFaces.filter(":last").addClass("slide-back"):a.appendBack?l('<div class="slide-back"></div>').appendTo(n):l("<div></div>"),1==a.stack){var h,f;"vertical"===a.direction?(h="top",f="translate(0%, -100%) translateZ(0)"):(h="left",f="translate(-100%, 0%) translateZ(0)"),c={},a.useTranslate?o.appendStyleProperties(c,["transform"],[f]):c[h]="-100%",u.$back.css(c)}n.data("metrojs.tile",{animating:!1}),e.capabilities.canTransition&&a.useHardwareAccel&&(n.addClass("ha"),u.$front.addClass("ha"),u.$back.addClass("ha"));break;case"carousel":u.$listTiles=n.find(a.tileSelector).not(".tile-title");var p=u.$listTiles.length;n.data("metrojs.tile",{animating:!1}),a.currentIndex=Math.min(a.currentIndex,p-1),u.$listTiles.each(function(t,n){var r=l(n).addClass("slide"),s=a.listData[t],c="string"==typeof s.animationDirection&&s.animationDirection.length>0?s.animationDirection:a.animationDirection,u="string"==typeof s.direction&&s.direction.length>0?s.direction:a.direction;t==a.currentIndex?r.addClass("active"):"forward"===c?"vertical"===u?(d=a.useTranslate?o.appendStyleProperties({},["transform"],["translate(0%, 100%) translateZ(0)"]):{left:"0%",top:"100%"},r.css(d)):(d=a.useTranslate?o.appendStyleProperties({},["transform"],["translate(100%, 0%) translateZ(0)"]):{left:"100%",top:"0%"},r.css(d)):"backward"===c&&("vertical"===u?(d=a.useTranslate?o.appendStyleProperties({},["transform"],["translate(0%, -100%) translateZ(0)"]):{left:"0%",top:"-100%"},r.css(d)):(d=a.useTranslate?o.appendStyleProperties({},["transform"],["translate(-100%, 0%) translateZ(0)"]):{left:"-100%",top:"0%"},r.css(d))),i.bindLink(r,s),a.useHardwareAccel&&e.capabilities.canTransition&&i.bindBounce(r,s),r=null,s=null}),e.capabilities.canFlip3d&&a.useHardwareAccel&&(n.addClass("ha"),u.$listTiles.addClass("ha"));break;case"flip-list":u.$listTiles=n.find(a.tileSelector).not(".tile-title"),u.$listTiles.each(function(n,d){var u=l(d).addClass("tile-"+(n+1)),h=u.find(a.tileFaceSelector).filter(":first").addClass("flip-front").css({margin:"0px"});1===u.find(a.tileFaceSelector).length&&1==a.appendBack&&u.append("<div></div>");var f=u.find(a.tileFaceSelector).filter(":last").addClass("flip-back").css({margin:"0px"});a.listData[n].faces.$front=h,a.listData[n].faces.$back=f,u.data("metrojs.tile",{animating:!1,count:1,completeTimeout:null,flCompleteTimeout:null,index:n});var p=u.data("metrojs.tile");e.capabilities.canFlip3d&&a.useHardwareAccel?(u.addClass("ha"),h.addClass("ha"),f.addClass("ha"),r="vertical"===a.listData[n].direction?"rotateX(180deg)":"rotateY(180deg)",c=o.appendStyleProperties({},["transform"],[r]),f.css(c)):(s="vertical"===a.listData[n].direction?{height:"100%",width:"100%",marginTop:"0px",opacity:"1"}:{height:"100%",width:"100%",marginLeft:"0px",opacity:"1"},c="vertical"===a.listData[n].direction?{height:"0px",width:"100%",marginTop:a.listData[n].margin+"px",opacity:a.noHAflipOpacity}:{height:"100%",width:"0px",marginLeft:a.listData[n].margin+"px",opacity:a.noHAflipOpacity},h.css(s),f.css(c));var m=function(){p.count++,p.count>=t&&(p.count=1)};if(a.flipListOnHover){var g=a.flipListOnHoverEvent+".liveTile";h.bind(g,function(){i.flip(u,p.count,a,m)}),f.bind(g,function(){i.flip(u,p.count,a,m)})}a.listData[n].link.length>0&&u.css({cursor:"pointer"}).bind("click.liveTile",function(){a.listData[n].newWindow?window.open(a.listData[n].link):window.location=a.listData[n].link})});break;case"flip":u.$tileFaces=n.find(a.tileFaceSelector).not(".tile-title"),u.$front=null!=a.faces.$front&&a.faces.$front.length>0?a.faces.$front.addClass("flip-front"):u.$tileFaces.filter(":first").addClass("flip-front"),u.$back=null!=a.faces.$back&&a.faces.$back.length>0?a.faces.$back.addClass("flip-back"):u.$tileFaces.length>1?u.$tileFaces.filter(":last").addClass("flip-back"):a.appendBack?l('<div class="flip-back"></div>').appendTo(n):l("<div></div>"),n.data("metrojs.tile",{animating:!1}),e.capabilities.canFlip3d&&a.useHardwareAccel?(n.addClass("ha"),u.$front.addClass("ha"),u.$back.addClass("ha"),r="vertical"===a.direction?"rotateX(180deg)":"rotateY(180deg)",c=o.appendStyleProperties({},["transform"],[r]),u.$back.css(c)):(s="vertical"===a.direction?{height:"100%",width:"100%",marginTop:"0px",opacity:"1"}:{height:"100%",width:"100%",marginLeft:"0px",opacity:"1"},c="vertical"===a.direction?{height:"0%",width:"100%",marginTop:a.margin+"px",opacity:"0"}:{height:"100%",width:"0%",marginLeft:a.margin+"px",opacity:"0"},u.$front.css(s),u.$back.css(c))}return u},bindPauseOnHover:function(t){!function(){var n=t.data("LiveTile"),i=!1,o=!1,a="both"==n.pauseOnHoverEvent||"mouseover"==n.pauseOnHoverEvent||"mouseenter"==n.pauseOnHoverEvent,r="both"==n.pauseOnHoverEvent||"mouseout"==n.pauseOnHoverEvent||"mouseleave"==n.pauseOnHoverEvent;n.pOnHoverMethods={pause:function(){n.timer.pause(),"flip-list"===n.mode&&n.faces.$listTiles.each(function(e,t){window.clearTimeout(l(t).data("metrojs.tile").completeTimeout)})},over:function(){i||o||n.runEvents&&(o=!0,n.eventTimeout=window.setTimeout(function(){o=!1,r&&(i=!0),n.pOnHoverMethods.pause()},n.onHoverDelay))},out:function(){if(o)return window.clearTimeout(n.eventTimeout),o=!1,void 0;if(a){if(!i&&!o)return;n.runEvents&&n.timer.start(n.hasRun?n.delay:n.initDelay)}else n.pOnHoverMethods.pause();i=!1}},e.capabilities.canTouch?window.navigator.msPointerEnabled?(a&&t[0].addEventListener("MSPointerOver",n.pOnHoverMethods.over,!1),r&&t[0].addEventListener("MSPointerOut",n.pOnHoverMethods.out,!1)):(a&&t.bind("touchstart.liveTile",n.pOnHoverMethods.over),r&&t.bind("touchend.liveTile",n.pOnHoverMethods.out)):(a&&t.bind("mouseover.liveTile",n.pOnHoverMethods.over),r&&t.bind("mouseout.liveTile",n.pOnHoverMethods.out))}()},unbindMsPauseOnHover:function(l,e){"undefined"!=typeof e.pOnHoverMethods&&window.navigator.msPointerEnabled&&(l[0].removeEventListener("MSPointerOver",e.pOnHoverMethods.over,!1),l[0].removeEventListener("MSPointerOut",e.pOnHoverMethods.out,!1))},bindPlayOnHover:function(l,t){!function(){var i=!1,o=!1,a="both"==t.playOnHoverEvent||"mouseover"==t.playOnHoverEvent||"mouseenter"==t.playOnHoverEvent,r="both"==t.playOnHoverEvent||"mouseout"==t.playOnHoverEvent||"mouseleave"==t.playOnHoverEvent;t.onHoverMethods={over:function(){if(!(i||o||t.bounce&&"no"!=t.bounceMethods.down)){var e="flip"==t.mode||(t.startNow?!t.isReversed:t.isReversed);window.clearTimeout(t.eventTimeout),(t.runEvents&&e||!t.hasRun)&&(o=!0,t.eventTimeout=window.setTimeout(function(){o=!1,r&&(i=!0),n.play.apply(l[0],[0])},t.onHoverDelay))}},out:function(){return o?(window.clearTimeout(t.eventTimeout),o=!1,void 0):((!a||i||o)&&(window.clearTimeout(t.eventTimeout),t.eventTimeout=window.setTimeout(function(){var e="flip"==t.mode||(t.startNow?t.isReversed:!t.isReversed);t.runEvents&&e&&n.play.apply(l[0],[0]),i=!1},t.speed+200)),void 0)}},e.capabilities.canTouch?window.navigator.msPointerEnabled?(a&&l[0].addEventListener("MSPointerDown",t.onHoverMethods.over,!1),r&&l.bind("mouseleave.liveTile",t.onHoverMethods.out)):(a&&l.bind("touchstart.liveTile",t.onHoverMethods.over),r&&l.bind("touchend.liveTile",t.onHoverMethods.out)):(a&&l.bind("mouseenter.liveTile",t.onHoverMethods.over),r&&l.bind("mouseleave.liveTile",t.onHoverMethods.out))}()},unbindMsPlayOnHover:function(l,e){"undefined"!=typeof e.onHoverMethods&&window.navigator.msPointerEnabled&&l[0].removeEventListener("MSPointerDown",e.onHoverMethods.over,!1)},bindBounce:function(t,n){n.bounce&&(t.addClass("bounce"),t.addClass("noselect"),function(){n.bounceMethods={down:"no",threshold:30,zeroPos:{x:0,y:0},eventPos:{x:0,y:0},inTilePos:{x:0,y:0},pointPos:{x:0,y:0},regions:{c:[0,0],tl:[-1,-1],tr:[1,-1],bl:[-1,1],br:[1,1],t:[null,-1],r:[1,null],b:[null,1],l:[-1,null]},targets:{all:["c","t","r","b","l","tl","tr","bl","br"],edges:["c","t","r","b","l"],corners:["c","tl","tr","bl","br"]},hitTest:function(t,i,o,a){var r=n.bounceMethods.regions,s=n.bounceMethods.targets[o],c=0,d=null,u=null,h={hit:[0,0],name:"c"};if(e.capabilities.isOldAndroid||!e.capabilities.canTransition)return h;"undefined"==typeof s&&("string"==typeof o&&(s=o.split(",")),l.isArray(s)&&-1==l.inArray("c")&&(a=0,h=null));for(var f=t.width(),p=t.height(),m=[f*a,p*a],g=i.x-.5*f,v=i.y-.5*p,b=[g>0?Math.abs(g)<=m[0]?0:1:Math.abs(g)<=m[0]?0:-1,v>0?Math.abs(v)<=m[1]?0:1:Math.abs(v)<=m[1]?0:-1];c<s.length;c++){if(null!=d)return d;var T=s[c],y=r[T];if("*"==T)return T=s[c+1],{region:r[T],name:T};b[0]==y[0]&&b[1]==y[1]?d={hit:y,name:T}:b[0]!=y[0]&&null!=y[0]||b[1]!=y[1]&&null!=y[1]||(u={hit:y,name:T})}return null!=d?d:null!=u?u:h},bounceDown:function(e){if("A"!=e.target.tagName||l(e).is(".bounce")){var i=e.originalEvent&&e.originalEvent.touches?e.originalEvent.touches[0]:e,a=t.offset();window.pageXOffset,window.pageYOffset,n.bounceMethods.pointPos={x:i.pageX,y:i.pageY},n.bounceMethods.inTilePos={x:i.pageX-a.left,y:i.pageY-a.top},n.$tileParent||(n.$tileParent=t.parent());var r=n.$tileParent.offset();n.bounceMethods.eventPos={x:a.left-r.left+t.width()/2,y:a.top-r.top+t.height()/2};var s=n.bounceMethods.hitTest(t,n.bounceMethods.inTilePos,n.bounceDirections,.25);if(null==s)n.bounceMethods.down="no";else{window.navigator.msPointerEnabled?(document.addEventListener("MSPointerUp",n.bounceMethods.bounceUp,!1),t[0].addEventListener("MSPointerUp",n.bounceMethods.bounceUp,!1),document.addEventListener("MSPointerCancel",n.bounceMethods.bounceUp,!1),n.bounceFollowsMove&&t[0].addEventListener("MSPointerMove",n.bounceMethods.bounceMove,!1)):(l(document).bind("mouseup.liveTile, touchend.liveTile, touchcancel.liveTile, dragstart.liveTile",n.bounceMethods.bounceUp),n.bounceFollowsMove&&(t.bind("touchmove.liveTile",n.bounceMethods.bounceMove),t.bind("mousemove.liveTile",n.bounceMethods.bounceMove)));var c="bounce-"+s.name;t.addClass(c),n.bounceMethods.down=c,n.bounceMethods.downPcss=o.appendStyleProperties({},["perspective-origin"],[n.bounceMethods.eventPos.x+"px "+n.bounceMethods.eventPos.y+"px"]),n.$tileParent.css(n.bounceMethods.downPcss)}}},bounceUp:function(){"no"!=n.bounceMethods.down&&(n.bounceMethods.unBounce(),window.navigator.msPointerEnabled?(document.removeEventListener("MSPointerUp",n.bounceMethods.bounceUp,!1),t[0].removeEventListener("MSPointerUp",n.bounceMethods.bounceUp,!1),document.removeEventListener("MSPointerCancel",n.bounceMethods.bounceUp,!1),n.bounceFollowsMove&&t[0].removeEventListener("MSPointerMove",n.bounceMethods.bounceMove,!1)):l(document).unbind("mouseup.liveTile, touchend.liveTile, touchcancel.liveTile, dragstart.liveTile",n.bounceMethods.bounceUp),n.bounceFollowsMove&&(t.unbind("touchmove.liveTile",n.bounceMethods.bounceMove),t.unbind("mousemove.liveTile",n.bounceMethods.bounceMove)))},bounceMove:function(l){if("no"!=n.bounceMethods.down){var e=l.originalEvent&&l.originalEvent.touches?l.originalEvent.touches[0]:l,i=Math.abs(e.pageX-n.bounceMethods.pointPos.x),o=Math.abs(e.pageY-n.bounceMethods.pointPos.y);if(i>n.bounceMethods.threshold||o>n.bounceMethods.threshold){var a=n.bounceMethods.down;n.bounceMethods.bounceDown(l),a!=n.bounceMethods.down&&t.removeClass(a)}}},unBounce:function(){if(t.removeClass(n.bounceMethods.down),"object"==typeof n.bounceMethods.downPcss){var l=["perspective-origin","perspective-origin-x","perspective-origin-y"],e=["","",""];n.bounceMethods.downPcss=o.appendStyleProperties({},l,e),window.setTimeout(function(){n.$tileParent.css(n.bounceMethods.downPcss)},200)}n.bounceMethods.down="no",n.bounceMethods.inTilePos=n.bounceMethods.zeroPos,n.bounceMethods.eventPos=n.bounceMethods.zeroPos}},window.navigator.msPointerEnabled?t[0].addEventListener("MSPointerDown",n.bounceMethods.bounceDown,!1):e.capabilities.canTouch?t.bind("touchstart.liveTile",n.bounceMethods.bounceDown):t.bind("mousedown.liveTile",n.bounceMethods.bounceDown)}())},unbindMsBounce:function(l,e){e.bounce&&window.navigator.msPointerEnabled&&(l[0].removeEventListener("MSPointerDown",e.bounceMethods.bounceDown,!1),l[0].removeEventListener("MSPointerCancel",e.bounceMethods.bounceUp,!1),l[0].removeEventListener("MSPointerOut",e.bounceMethods.bounceUp,!1))},bindLink:function(e,t){t.link.length>0&&e.css({cursor:"pointer"}).bind("click.liveTile",function(e){("A"!=e.target.tagName||l(e).is(".live-tile,.slide,.flip"))&&(t.newWindow?window.open(t.link):window.location=t.link)})},runContenModules:function(l,e,t,n){for(var i=0;i<l.contentModules.length;i++){var o=l.contentModules[i];"function"==typeof o.action&&o.action(l,e,t,n)}},fade:function(l,e,t){var n="object"==typeof t?t:l.data("LiveTile"),o=function(){(n.timer.repeatCount>0||-1==n.timer.repeatCount)&&n.timer.count!=n.timer.repeatCount&&n.timer.start(n.delay)};if(!n.faces.$front.is(":animated")){n.timer.pause();var a=n.loopCount+1;n.isReversed=0===a%2;var r=n.animationStarting.call(l[0],n,n.faces.$front,n.faces.$back);if("undefined"!=typeof r&&0==r)return o(),void 0;n.loopCount=a;var s=function(){o(),i.runContenModules(n,n.faces.$front,n.faces.$back),n.animationComplete.call(l[0],n,n.faces.$front,n.faces.$back)};n.isReversed?n.faces.$front.fadeIn(n.speed,n.noHaTransFunc,s):n.faces.$front.fadeOut(n.speed,n.noHaTransFunc,s)}},slide:function(t,n,a,r,s){var c="object"==typeof a?a:t.data("LiveTile"),d=t.data("metrojs.tile");if(1==d.animating||t.is(":animated"))return c=null,d=null,void 0;var u=function(){(c.timer.repeatCount>0||-1==c.timer.repeatCount)&&c.timer.count!=c.timer.repeatCount&&c.timer.start(c.delay)};if("carousel"!==c.mode){c.isReversed=0!==c.currentIndex%2,c.timer.pause();var h=c.animationStarting.call(t[0],c,c.faces.$front,c.faces.$back);if("undefined"!=typeof h&&0==h)return u(),void 0;c.loopCount=c.loopCount+1}else c.isReversed=!0;var f;f="string"==typeof c.tempValues.direction&&c.tempValues.direction.length>0?c.tempValues.direction:c.direction,c.tempValues.direction=null;var p={},m={},g="undefined"==typeof r?c.currentIndex:r,v=l.trim(c.stops[Math.min(g,c.stops.length-1)]),b=v.indexOf("px"),T=0,y=0,C="vertical"===f?c.height:c.width,E="vertical"===f?"top":"left",D=1==c.stack,I=function(){"undefined"==typeof s?(c.currentIndex=c.currentIndex+1,c.currentIndex>c.stops.length-1&&(c.currentIndex=0)):s(),"carousel"!=c.mode&&u(),i.runContenModules(c,c.faces.$front,c.faces.$back,c.currentIndex),c.animationComplete.call(t[0],c,c.faces.$front,c.faces.$back),c=null,d=null};if(b>0?(y=parseInt(v.substring(0,b),10),T=y-C+"px"):(y=parseInt(v.replace("%",""),10),T=y-100+"%"),e.capabilities.canTransition&&c.useHardwareAccel){if("undefined"!=typeof d.animating&&1==d.animating)return;d.animating=!0;var w=["transition-property","transition-duration","transition-timing-function"],S=[c.useTranslate?"transform":E,c.speed+"ms",c.haTransFunc];S[o.browserPrefix+"transition-property"]=o.browserPrefix+"transform",p=o.appendStyleProperties(p,w,S),m=o.appendStyleProperties(m,w,S);var _,O="vertical"===f,k=O?"top":"left";c.useTranslate?(_=O?"translate(0%, "+v+")":"translate("+v+", 0%)",p=o.appendStyleProperties(p,["transform"],[_+"translateZ(0)"]),D&&(_=O?"translate(0%, "+T+")":"translate("+T+", 0%)",m=o.appendStyleProperties(m,["transform"],[_+"translateZ(0)"]))):(p[k]=v,D&&(m[k]=T)),c.faces.$front.css(p),D&&c.faces.$back.css(m),window.clearTimeout(c.completeTimeout),c.completeTimeout=window.setTimeout(function(){d.animating=!1,I()},c.speed)}else{p[E]=v,m[E]=T,d.animating=!0;var R=c.faces.$front.stop(),x=c.faces.$back.stop();R.animate(p,c.speed,c.noHaTransFunc,function(){d.animating=!1,I()}),D&&x.animate(m,c.speed,c.noHaTransFunc,function(){})}},carousel:function(l,t){var n=l.data("LiveTile"),a=l.data("metrojs.tile");if(1==a.animating||n.faces.$listTiles.length<=1)return a=null,void 0;var r=function(){(n.timer.repeatCount>0||-1==n.timer.repeatCount)&&n.timer.count!=n.timer.repeatCount&&n.timer.start(n.delay)};n.timer.pause();var s=n.faces.$listTiles.filter(".active"),c=n.faces.$listTiles.index(s),d=n.currentIndex,u=d!=c?d:c,h=u+1>=n.faces.$listTiles.length?0:u+1,f=n.listData[h];if(c==h)return a=null,s=null,void 0;var p;p="string"==typeof n.tempValues.animationDirection&&n.tempValues.animationDirection.length>0?n.tempValues.animationDirection:"string"==typeof f.animationDirection&&f.animationDirection.length>0?f.animationDirection:n.animationDirection,n.tempValues.animationDirection=null;var m;"string"==typeof n.tempValues.direction&&n.tempValues.direction.length>0?m=n.tempValues.direction:"string"==typeof f.direction&&f.direction.length>0?(m=f.direction,n.tempValues.direction=m):m=n.direction;var g=n.faces.$listTiles.eq(h),v=n.animationStarting.call(l[0],n,s,g);if("undefined"!=typeof v&&0==v)return r(),void 0;n.loopCount=n.loopCount+1;var b,T=o.appendStyleProperties({},["transition-duration"],["0s"]),y="vertical"===m;"backward"===p?(n.useTranslate&&e.capabilities.canTransition?(b=y?"translate(0%, -100%)":"translate(-100%, 0%)",T=o.appendStyleProperties(T,["transform"],[b+" translateZ(0)"]),n.stops=["100%"]):(y?(T.top="-100%",T.left="0%"):(T.top="0%",T.left="-100%"),n.stops=["100%"]),n.faces.$front=s,n.faces.$back=g):(n.useTranslate&&e.capabilities.canTransition?(b=y?"translate(0%, 100%)":"translate(100%, 0%)",T=o.appendStyleProperties(T,["transform"],[b+" translateZ(0)"])):y?(T.top="100%",T.left="0%"):(T.top="0%",T.left="100%"),n.faces.$front=g,n.faces.$back=s,n.stops=["0%"]),g.css(T),window.setTimeout(function(){s.removeClass("active"),g.addClass("active"),i.slide(l,t,n,0,function(){n.currentIndex=h,a=null,s=null,g=null,r()})},150)},flip:function(l,t,n,a){var r=l.data("metrojs.tile");if(1==r.animating)return r=null,void 0;var s,c,d,u,h,f,p,m="object"==typeof n?n:l.data("LiveTile"),g="undefined"==typeof a,v=0,b=function(){(m.timer.repeatCount>0||-1==m.timer.repeatCount)&&m.timer.count!=m.timer.repeatCount&&m.timer.start(m.delay)};if(g){m.timer.pause();var T=m.loopCount+1;p=0===T%2,m.isReversed=p,s=m.faces.$front,c=m.faces.$back;var y=p?[m,c,s]:[m,s,c],C=m.animationStarting.apply(l[0],y);if("undefined"!=typeof C&&0==C)return b(),void 0;d=m.direction,height=m.height,width=m.width,margin=m.margin,m.loopCount=T}else p=0===t%2,v=r.index,s=m.listData[v].faces.$front,c=m.listData[v].faces.$back,m.listData[v].isReversed=p,d=m.listData[v].direction,height=m.listData[v].height,width=m.listData[v].width,margin=m.listData[v].margin;if(e.capabilities.canFlip3d&&m.useHardwareAccel){u=p?"360deg":"180deg",h="vertical"===d?"rotateX("+u+")":"rotateY("+u+")",f=o.appendStyleProperties({},["transform","transition"],[h,"all "+m.speed+"ms "+m.haTransFunc+" 0s"]);var E=p?"540deg":"360deg",D="vertical"===d?"rotateX("+E+")":"rotateY("+E+")",I=o.appendStyleProperties({},["transform","transition"],[D,"all "+m.speed+"ms "+m.haTransFunc+" 0s"]);
s.css(f),c.css(I);var w=function(){r.animating=!1;var e,t;p?(e="vertical"===d?"rotateX(0deg)":"rotateY(0deg)",t=o.appendStyleProperties({},["transform","transition"],[e,"all 0s "+m.haTransFunc+" 0s"]),s.css(t),i.runContenModules(m,s,c,v),g?(b(),m.animationComplete.call(l[0],m,s,c)):a(m,s,c),s=null,c=null,m=null,r=null):(i.runContenModules(m,c,s,v),g?(b(),m.animationComplete.call(l[0],m,c,s)):a(m,c,s))};"flip-list"===m.mode?(window.clearTimeout(m.listData[v].completeTimeout),m.listData[v].completeTimeout=window.setTimeout(w,m.speed)):(window.clearTimeout(m.completeTimeout),m.completeTimeout=window.setTimeout(w,m.speed))}else{var S,_=m.speed/2,O="vertical"===d?{height:"0px",width:"100%",marginTop:margin+"px",opacity:m.noHAflipOpacity}:{height:"100%",width:"0px",marginLeft:margin+"px",opacity:m.noHAflipOpacity},k="vertical"===d?{height:"100%",width:"100%",marginTop:"0px",opacity:"1"}:{height:"100%",width:"100%",marginLeft:"0px",opacity:"1"};p?(r.animating=!0,c.stop().animate(O,{duration:_}),S=function(){r.animating=!1,s.stop().animate(k,{duration:_,complete:function(){i.runContenModules(m,s,c,v),g?(b(),m.animationComplete.call(l[0],m,s,c)):a(m,s,c),r=null,s=null,c=null}})},"flip-list"===m.mode?(window.clearTimeout(m.listData[r.index].completeTimeout),m.listData[r.index].completeTimeout=window.setTimeout(S,_)):(window.clearTimeout(m.completeTimeout),m.completeTimeout=window.setTimeout(S,_))):(r.animating=!0,s.stop().animate(O,{duration:_}),S=function(){r.animating=!1,c.stop().animate(k,{duration:_,complete:function(){i.runContenModules(m,c,s,v),g?(b(),m.animationComplete.call(l[0],m,c,s)):a(m,c,s),s=null,c=null,m=null,r=null}})},"flip-list"===m.mode?(window.clearTimeout(m.listData[r.index].completeTimeout),m.listData[r.index].completeTimeout=window.setTimeout(S,_)):(window.clearTimeout(m.completeTimeout),m.completeTimeout=window.setTimeout(S,_)))}},flipList:function(e){var n=e.data("LiveTile"),o=n.speed,a=!1,r=function(){(n.timer.repeatCount>0||-1==n.timer.repeatCount)&&n.timer.count!=n.timer.repeatCount&&n.timer.start(n.delay)};n.timer.pause();var s=n.animationStarting.call(e[0],n,null,null);return"undefined"!=typeof s&&0==s?(r(),void 0):(n.loopCount=n.loopCount+1,n.faces.$listTiles.each(function(e,r){var s=l(r),c=s.data("metrojs.tile"),d=n.triggerDelay(e),u=n.speed+Math.max(d,0),h=n.alwaysTrigger;h||(h=351*Math.random()>150?!0:!1),h&&(a=!0,o=Math.max(u+n.speed,o),window.clearTimeout(c.flCompleteTimeout),c.flCompleteTimeout=window.setTimeout(function(){i.flip(s,c.count,n,function(){c.count++,c.count>=t&&(c.count=1),s=null,c=null})},u))}),a&&(window.clearTimeout(n.flCompleteTimeout),n.flCompleteTimeout=window.setTimeout(function(){i.runContenModules(n,null,null,-1),n.animationComplete.call(e[0],n,null,null),r()},o+n.speed)),void 0)}},o={stylePrefixes:"Webkit Moz O ms Khtml ".split(" "),domPrefixes:"-webkit- -moz- -o- -ms- -khtml- ".split(" "),browserPrefix:null,appendStyleProperties:function(e,t,n){for(var i=0;i<=t.length-1;i++)e[l.trim(this.browserPrefix+t[i])]=n[i],e[l.trim(t[i])]=n[i];return e},applyStyleValue:function(e,t,n){return e[l.trim(this.browserPrefix+t)]=n,e[t]=n,e},getBrowserPrefix:function(){if(null==this.browserPrefix){for(var l="",e=0;e<=this.domPrefixes.length-1;e++)"undefined"!=typeof document.body.style[this.domPrefixes[e]+"transform"]&&(l=this.domPrefixes[e]);return this.browserPrefix=l}return this.browserPrefix},shuffleArray:function(l){for(var e=[];l.length;)e.push(l.splice(Math.random()*l.length,1));for(;e.length;)l.push(e.pop());return l}},a={moduleName:"custom",customSwap:{data:{customDoSwapFront:function(){return!1},customDoSwapBack:function(){return!1},customGetContent:function(){return null}},initData:function(e){var t={};t.doSwapFront=l.inArray("custom",e.swapFront)>-1&&e.customDoSwapFront(),t.doSwapBack=l.inArray("custom",e.swapBack)>-1&&e.customDoSwapBack(),e.customSwap="undefined"!=typeof e.customSwap?l.extend(t,e.customSwap):t},action:function(){}},htmlSwap:{moduleName:"html",data:{frontContent:[],frontIsRandom:!0,frontIsInGrid:!1,backContent:[],backIsRandom:!0,backIsInGrid:!1},initData:function(e,t){var n={backBag:[],backIndex:0,backStaticIndex:0,backStaticRndm:-1,prevBackIndex:-1,frontBag:[],frontIndex:0,frontStaticIndex:0,frontStaticRndm:-1,prevFrontIndex:-1};e.ignoreDataAttributes?(n.frontIsRandom=e.frontIsRandom,n.frontIsInGrid=e.frontIsInGrid,n.backIsRandom=e.backIsRandom,n.backIsInGrid=e.backIsInGrid):(n.frontIsRandom=i.getDataOrDefault(t,"front-israndom",e.frontIsRandom),n.frontIsInGrid=i.getDataOrDefault(t,"front-isingrid",e.frontIsInGrid),n.backIsRandom=i.getDataOrDefault(t,"back-israndom",e.backIsRandom),n.backIsInGrid=i.getDataOrDefault(t,"back-isingrid",e.backIsInGrid)),n.doSwapFront=l.inArray("html",e.swapFront)>-1&&e.frontContent instanceof Array&&e.frontContent.length>0,n.doSwapBack=l.inArray("html",e.swapBack)>-1&&e.backContent instanceof Array&&e.backContent.length>0,e.htmlSwap="undefined"!=typeof e.htmlSwap?l.extend(n,e.htmlSwap):n,e.htmlSwap.doSwapFront&&(e.htmlSwap.frontBag=this.prepBag(e.htmlSwap.frontBag,e.frontContent,e.htmlSwap.prevFrontIndex),e.htmlSwap.frontStaticRndm=e.htmlSwap.frontBag.pop()),e.htmlSwap.doSwapBack&&(e.htmlSwap.backBag=this.prepBag(e.htmlSwap.backBag,e.backContent,e.htmlSwap.prevBackIndex),e.htmlSwap.backStaticRndm=e.htmlSwap.backBag.pop())},prepBag:function(l,e,t){l=l||[];for(var n=0,i=0;i<e.length;i++)(i!=t||1===l.length)&&(l[n]=i,n++);return o.shuffleArray(l)},getFrontSwapIndex:function(l){var e=0;return l.htmlSwap.frontIsRandom?(0===l.htmlSwap.frontBag.length&&(l.htmlSwap.frontBag=this.prepBag(l.htmlSwap.frontBag,l.frontContent,l.htmlSwap.prevFrontIndex)),e=l.htmlSwap.frontIsInGrid?l.htmlSwap.frontStaticRndm:l.htmlSwap.frontBag.pop()):e=l.htmlSwap.frontIsInGrid?l.htmlSwap.frontStaticIndex:l.htmlSwap.frontIndex,e},getBackSwapIndex:function(l){var e=0;return l.htmlSwap.backIsRandom?(0===l.htmlSwap.backBag.length&&(l.htmlSwap.backBag=this.prepBag(l.htmlSwap.backBag,l.backContent,l.htmlSwap.prevBackIndex)),e=l.htmlSwap.backIsInGrid?l.htmlSwap.backStaticRndm:l.htmlSwap.backBag.pop()):e=l.htmlSwap.backIsInGrid?l.htmlSwap.backStaticIndex:l.htmlSwap.backIndex,e},action:function(l,e,t,n){if(l.htmlSwap.doSwapFront||l.htmlSwap.doSwapBack){var i="flip-list"===l.mode,o=0,a=i?l.listData[Math.max(n,0)].isReversed:l.isReversed;if(i&&-1==n)return a?l.htmlSwap.doSwapBack&&(0===l.htmlSwap.backBag.length&&(l.htmlSwap.backBag=this.prepBag(l.htmlSwap.backBag,l.backContent,l.htmlSwap.backStaticRndm)),l.htmlSwap.backStaticRndm=l.htmlSwap.backBag.pop(),l.htmlSwap.backStaticIndex++,l.htmlSwap.backStaticIndex>=l.backContent.length&&(l.htmlSwap.backStaticIndex=0)):l.htmlSwap.doSwapFront&&(0===l.htmlSwap.frontBag.length&&(l.htmlSwap.frontBag=this.prepBag(l.htmlSwap.frontBag,l.frontContent,l.htmlSwap.frontStaticRndm)),l.htmlSwap.frontStaticRndm=l.htmlSwap.frontBag.pop(),l.htmlSwap.frontStaticIndex++,l.htmlSwap.frontStaticIndex>=l.frontContent.length&&(l.htmlSwap.frontStaticIndex=0)),void 0;if(a){if(!l.htmlSwap.doSwapBack)return;o=this.getBackSwapIndex(l),l.htmlSwap.prevBackIndex=o,t.html(l.backContent[l.htmlSwap.backIndex]),l.htmlSwap.backIndex++,l.htmlSwap.backIndex>=l.backContent.length&&(l.htmlSwap.backIndex=0),i||(l.htmlSwap.backStaticIndex++,l.htmlSwap.backStaticIndex>=l.backContent.length&&(l.htmlSwap.backStaticIndex=0))}else{if(!l.htmlSwap.doSwapFront)return;o=this.getFrontSwapIndex(l),l.htmlSwap.prevFrontIndex=o,"slide"===l.mode?l.startNow?t.html(l.frontContent[o]):e.html(l.frontContent[o]):t.html(l.frontContent[o]),l.htmlSwap.frontIndex++,l.htmlSwap.frontIndex>=l.frontContent.length&&(l.htmlSwap.frontIndex=0),i||(l.htmlSwap.frontStaticIndex++,l.htmlSwap.frontStaticIndex>=l.frontContent.length&&(l.htmlSwap.frontStaticIndex=0))}}}},imageSwap:{moduleName:"image",data:{preloadImages:!1,imageCssSelector:">img,>a>img",fadeSwap:!1,frontImages:[],frontIsRandom:!0,frontIsBackgroundImage:!1,frontIsInGrid:!1,backImages:null,backIsRandom:!0,backIsBackgroundImage:!1,backIsInGrid:!1},initData:function(e,t){var n={backBag:[],backIndex:0,backStaticIndex:0,backStaticRndm:-1,frontBag:[],frontIndex:0,frontStaticIndex:0,frontStaticRndm:-1,prevBackIndex:-1,prevFrontIndex:-1},o=e.ignoreDataAttributes;o?(n.imageCssSelector=i.getDataOrDefault(t,"image-css",e.imageCssSelector),n.fadeSwap=i.getDataOrDefault(t,"fadeswap",e.fadeSwap),n.frontIsRandom=i.getDataOrDefault(t,"front-israndom",e.frontIsRandom),n.frontIsInGrid=i.getDataOrDefault(t,"front-isingrid",e.frontIsInGrid),n.frontIsBackgroundImage=i.getDataOrDefault(t,"front-isbg",e.frontIsBackgroundImage),n.backIsRandom=i.getDataOrDefault(t,"back-israndom",e.backIsRandom),n.backIsInGrid=i.getDataOrDefault(t,"back-isingrid",e.backIsInGrid),n.backIsBackgroundImage=i.getDataOrDefault(t,"back-isbg",e.backIsBackgroundImage),n.doSwapFront=l.inArray("image",e.swapFront)>-1&&e.frontImages instanceof Array&&e.frontImages.length>0,n.doSwapBack=l.inArray("image",e.swapBack)>-1&&e.backImages instanceof Array&&e.backImages.length>0,n.alwaysSwapFront=i.getDataOrDefault(t,"front-alwaysswap",e.alwaysSwapFront),n.alwaysSwapBack=i.getDataOrDefault(t,"back-alwaysswap",e.alwaysSwapBack)):(n.imageCssSelector=e.imageCssSelector,n.fadeSwap=e.fadeSwap,n.frontIsRandom=e.frontIsRandom,n.frontIsInGrid=e.frontIsInGrid,n.frontIsBackgroundImage=e.frontIsBackgroundImage,n.backIsRandom=e.backIsRandom,n.backIsInGrid=e.backIsInGrid,n.backIsBackgroundImage=e.backIsBackgroundImage,n.doSwapFront=l.inArray("image",e.swapFront)>-1&&e.frontImages instanceof Array&&e.frontImages.length>0,n.doSwapBack=l.inArray("image",e.swapBack)>-1&&e.backImages instanceof Array&&e.backImages.length>0,n.alwaysSwapFront=e.alwaysSwapFront,n.alwaysSwapBack=e.alwaysSwapBack),e.imgSwap="undefined"!=typeof e.imgSwap?l.extend(n,e.imgSwap):n,e.imgSwap.doSwapFront&&(e.imgSwap.frontBag=this.prepBag(e.imgSwap.frontBag,e.frontImages,e.imgSwap.prevFrontIndex),e.imgSwap.frontStaticRndm=e.imgSwap.frontBag.pop(),e.preloadImages&&l(e.frontImages).metrojs.preloadImages(function(){})),e.imgSwap.doSwapBack&&(e.imgSwap.backBag=this.prepBag(e.imgSwap.backBag,e.backImages,e.imgSwap.prevBackIndex),e.imgSwap.backStaticRndm=e.imgSwap.backBag.pop(),e.preloadImages&&l(e.backImages).metrojs.preloadImages(function(){}))},prepBag:function(l,e,t){l=l||[];for(var n=0,i=0;i<e.length;i++)(i!=t||1===e.length)&&(l[n]=i,n++);return o.shuffleArray(l)},getFrontSwapIndex:function(l){var e=0;return l.imgSwap.frontIsRandom?(0===l.imgSwap.frontBag.length&&(l.imgSwap.frontBag=this.prepBag(l.imgSwap.frontBag,l.frontImages,l.imgSwap.prevFrontIndex)),e=l.imgSwap.frontIsInGrid?l.imgSwap.frontStaticRndm:l.imgSwap.frontBag.pop()):e=l.imgSwap.frontIsInGrid?l.imgSwap.frontStaticIndex:l.imgSwap.frontIndex,e},getBackSwapIndex:function(l){var e=0;return l.imgSwap.backIsRandom?(0===l.imgSwap.backBag.length&&(l.imgSwap.backBag=this.prepBag(l.imgSwap.backBag,l.backImages,l.imgSwap.prevBackIndex)),e=l.imgSwap.backIsInGrid?l.imgSwap.backStaticRndm:l.imgSwap.backBag.pop()):e=l.imgSwap.backIsInGrid?l.imgSwap.backStaticIndex:l.imgSwap.backIndex,e},setImageProperties:function(e,t,n){var i={},o={};"undefined"!=typeof t.src&&(n?i.backgroundImage="url('"+t.src+"')":o.src=t.src),"undefined"!=typeof t.alt&&(o.alt=t.alt),"object"==typeof t.css?e.css(l.extend(i,t.css)):e.css(i),"object"==typeof t.attr?e.attr(l.extend(o,t.attr)):e.attr(o)},action:function(l,e,t,n){if(l.imgSwap.doSwapFront||l.imgSwap.doSwapBack){var i="flip-list"===l.mode,o=("slide"==l.mode,0),r=i?l.listData[Math.max(n,0)].isReversed:l.isReversed;if(i&&-1==n)return(l.alwaysSwapFront||!r)&&l.imgSwap.doSwapFront&&(0===l.imgSwap.frontBag.length&&(l.imgSwap.frontBag=this.prepBag(l.imgSwap.frontBag,l.frontImages,l.imgSwap.frontStaticRndm)),l.imgSwap.frontStaticRndm=l.imgSwap.frontBag.pop(),l.imgSwap.frontStaticIndex++,l.imgSwap.frontStaticIndex>=l.frontImages.length&&(l.imgSwap.frontStaticIndex=0)),(l.alwaysSwapBack||r)&&l.imgSwap.doSwapBack&&(0===l.imgSwap.backBag.length&&(l.imgSwap.backBag=this.prepBag(l.imgSwap.backBag,l.backImages,l.imgSwap.backStaticRndm)),l.imgSwap.backStaticRndm=l.imgSwap.backBag.pop(),l.imgSwap.backStaticIndex++,l.imgSwap.backStaticIndex>=l.backImages.length&&(l.imgSwap.backStaticIndex=0)),void 0;var s,c,d,u;if(l.alwaysSwapFront||!r){if(!l.imgSwap.doSwapFront)return;o=this.getFrontSwapIndex(l),l.imgSwap.prevFrontIndex=o,s="slide"===l.mode?e:t,c=s.find(l.imgSwap.imageCssSelector),d="object"==typeof l.frontImages[o]?l.frontImages[o]:{src:l.frontImages[o]},u=function(e){var t=l.imgSwap.frontIsBackgroundImage;"function"==typeof e&&(t?window.setTimeout(e,100):c[0].onload=e),a.imageSwap.setImageProperties(c,d,t)},l.fadeSwap?c.fadeOut(function(){u(function(){c.fadeIn()})}):u(),l.imgSwap.frontIndex++,l.imgSwap.frontIndex>=l.frontImages.length&&(l.imgSwap.frontIndex=0),i||(l.imgSwap.frontStaticIndex++,l.imgSwap.frontStaticIndex>=l.frontImages.length&&(l.imgSwap.frontStaticIndex=0))}if(l.alwaysSwapBack||r){if(!l.imgSwap.doSwapBack)return;o=this.getBackSwapIndex(l),l.imgSwap.prevBackIndex=o,s=t,c=s.find(l.imgSwap.imageCssSelector),d="object"==typeof l.backImages[o]?l.backImages[o]:{src:l.backImages[o]},u=function(){a.imageSwap.setImageProperties(c,d,l.imgSwap.backIsBackgroundImage)},l.fadeSwap?c.fadeOut(function(){u(function(){c.fadeIn()})}):u(),l.imgSwap.backIndex++,l.imgSwap.backIndex>=l.backImages.length&&(l.imgSwap.backIndex=0),i||(l.imgSwap.backStaticIndex++,l.imgSwap.backStaticIndex>=l.backImages.length&&(l.imgSwap.backStaticIndex=0))}}}}};l.fn.metrojs.TileTimer=function(l,e,n){this.timerId=null,this.interval=l,this.action=e,this.count=0,this.repeatCount="undefined"==typeof n?0:n,this.start=function(e){window.clearTimeout(this.timerId);var t=this;this.timerId=window.setTimeout(function(){t.tick.call(t,l)},e)},this.tick=function(l){this.action(this.count+1),this.count++,this.count>=t&&(this.count=0),(this.repeatCount>0||-1==this.repeatCount)&&(this.count!=this.repeatCount?this.start(l):this.stop())},this.stop=function(){this.timerId=window.clearTimeout(this.timerId),this.reset()},this.resume=function(){(this.repeatCount>0||-1==this.repeatCount)&&this.count!=this.repeatCount&&this.start(l)},this.pause=function(){this.timerId=window.clearTimeout(this.timerId)},this.reset=function(){this.count=0},this.restart=function(l){this.stop(),this.start(l)}},jQuery.fn.metrojs.theme={loadDefaultTheme:function(l){if("undefined"==typeof l||null==l)l=jQuery.fn.metrojs.theme.defaults;else{var e=jQuery.fn.metrojs.theme.defaults;jQuery.extend(e,l),l=e}var t="undefined"!=typeof window.localStorage,n=function(l){return"undefined"!=typeof window.localStorage[l]&&null!=window.localStorage[l]};!t||n("Metro.JS.AccentColor")&&n("Metro.JS.BaseAccentColor")?t?(l.accentColor=window.localStorage["Metro.JS.AccentColor"],l.baseTheme=window.localStorage["Metro.JS.BaseAccentColor"],jQuery(l.accentCssSelector).addClass(l.accentColor).data("accent",l.accentColor),jQuery(l.baseThemeCssSelector).addClass(l.baseTheme),"function"==typeof l.loaded&&l.loaded(l.baseTheme,l.accentColor)):(jQuery(l.accentCssSelector).addClass(l.accentColor).data("accent",l.accentColor),jQuery(l.baseThemeCssSelector).addClass(l.baseTheme),"function"==typeof l.loaded&&l.loaded(l.baseTheme,l.accentColor),"undefined"!=typeof l.preloadAltBaseTheme&&l.preloadAltBaseTheme&&jQuery(["dark"==l.baseTheme?l.metroLightUrl:l.metroDarkUrl]).metrojs.preloadImages(function(){})):(window.localStorage["Metro.JS.AccentColor"]=l.accentColor,window.localStorage["Metro.JS.BaseAccentColor"]=l.baseTheme,jQuery(l.accentCssSelector).addClass(l.accentColor).data("accent",l.accentColor),jQuery(l.baseThemeCssSelector).addClass(l.baseTheme),"function"==typeof l.loaded&&l.loaded(l.baseTheme,l.accentColor),"undefined"!=typeof l.preloadAltBaseTheme&&l.preloadAltBaseTheme&&jQuery(["dark"==l.baseTheme?l.metroLightUrl:l.metroDarkUrl]).metrojs.preloadImages(function(){}))},applyTheme:function(l,e,t){if("undefined"==typeof t||null==t)t=jQuery.fn.metrojs.theme.defaults;else{var n=jQuery.fn.metrojs.theme.defaults;t=jQuery.extend({},n,t)}if("undefined"!=typeof l&&null!=l){"undefined"!=typeof window.localStorage&&(window.localStorage["Metro.JS.BaseAccentColor"]=l);var i=jQuery(t.baseThemeCssSelector);i.length>0&&("dark"==l?i.addClass("dark").removeClass("light"):"light"==l&&i.addClass("light").removeClass("dark"))}if("undefined"!=typeof e&&null!=e){"undefined"!=typeof window.localStorage&&(window.localStorage["Metro.JS.AccentColor"]=e);var o=jQuery(t.accentCssSelector);if(o.length>0){var a=!1;o.each(function(){jQuery(this).addClass(e);var l=jQuery(this).data("accent");if(l!=e){var t=jQuery(this).attr("class").replace(l,"");t=t.replace(/(\s)+/," "),jQuery(this).attr("class",t),jQuery(this).data("accent",e),a=!0}}),a&&"function"==typeof t.accentPicked&&t.accentPicked(e)}}},appendAccentColors:function(e){if("undefined"==typeof e||null==e)e=jQuery.fn.metrojs.theme.defaults;else{var t=jQuery.fn.metrojs.theme.defaults;e=jQuery.extend({},t,e)}for(var n="",i=e.accentColors,o=e.accentListTemplate,a=0;a<i.length;a++)n+=o.replace(/\{0\}/g,i[a]);l(n).appendTo(e.accentListContainer)},appendBaseThemes:function(e){if("undefined"==typeof e||null==e)e=jQuery.fn.metrojs.theme.defaults;else{var t=jQuery.fn.metrojs.theme.defaults;e=jQuery.extend({},t,e)}for(var n="",i=e.baseThemes,o=e.baseThemeListTemplate,a=0;a<i.length;a++)n+=o.replace(/\{0\}/g,i[a]);l(n).appendTo(e.baseThemeListContainer)},defaults:{baseThemeCssSelector:"body",accentCssSelector:".tiles",accentColor:"blue",baseTheme:"dark",accentColors:["amber","blue","brown","cobalt","crimson","cyan","magenta","lime","indigo","green","emerald","mango","mauve","olive","orange","pink","red","sienna","steel","teal","violet","yellow"],baseThemes:["light","dark"],accentListTemplate:"<li><a href='javascript:;' title='{0}' class='accent {0}'></a></li>",accentListContainer:"ul.theme-options,.theme-options>ul",baseThemeListTemplate:"<li><a href='javascript:;' title='{0}' class='accent {0}'></a></li>",baseThemeListContainer:"ul.base-theme-options,.base-theme-options>ul"}},jQuery.fn.applicationBar=function(e){var t="undefined"!=typeof jQuery.fn.metrojs.theme?jQuery.fn.metrojs.theme.defaults:{};if(jQuery.extend(t,jQuery.fn.applicationBar.defaults,e),"undefined"!=typeof jQuery.fn.metrojs.theme){var n=jQuery.fn.metrojs.theme;t.shouldApplyTheme&&n.loadDefaultTheme(t);var i=t.accentListContainer.replace(","," a,")+" a",o=function(){var l=jQuery(this).attr("class").replace("accent","").replace(" ","");n.applyTheme(null,l,t),"function"==typeof t.accentPicked&&t.accentPicked(l)},a=t.baseThemeListContainer.replace(","," a,")+" a",r=function(){var l=jQuery(this).attr("class").replace("accent","").replace(" ","");n.applyTheme(l,null,t),"function"==typeof t.themePicked&&t.themePicked(l)};"function"==typeof l.fn.on?(l(this).on("click.appBar",i,o),l(this).on("click.appBar",a,r)):(l(i).live("click.appBar",o),l(a).live("click.appBar",r))}return l(this).each(function(e,n){var i=l(n),o=l.extend({},t);"auto"==o.collapseHeight&&(o.collapseHeight=l(this).height()),navigator.userAgent.match(/(Android|webOS|iPhone|iPod|BlackBerry|PIE|IEMobile)/i)&&(navigator.userAgent.match(/(IEMobile\/1)/i)||navigator.userAgent.match(/(iPhone OS [56789])/i)||i.css({position:"absolute",bottom:"0px"})),o.slideOpen=function(){i.hasClass("expanded")||o.animateAppBar(!1)},o.slideClosed=function(){i.hasClass("expanded")&&o.animateAppBar(!0)},o.animateAppBar=function(l){var e=l?o.collapseHeight:o.expandHeight;l?i.removeClass("expanded"):i.hasClass("expanded")||i.addClass("expanded"),i.stop().animate({height:e},{duration:o.duration})},i.data("ApplicationBar",o),i.find(t.handleSelector).click(function(){o.animateAppBar(i.hasClass("expanded"))}),1==o.bindKeyboard&&jQuery(document.documentElement).keyup(function(l){38==l.keyCode?l.target&&null==l.target.tagName.match(/INPUT|TEXTAREA|SELECT/i)&&(i.hasClass("expanded")||o.animateAppBar(!1)):40==l.keyCode&&l.target&&null==l.target.tagName.match(/INPUT|TEXTAREA|SELECT/i)&&i.hasClass("expanded")&&o.animateAppBar(!0)})})},jQuery.fn.applicationBar.defaults={applyTheme:!0,themePicked:function(){},accentPicked:function(){},loaded:function(){},duration:300,expandHeight:"320px",collapseHeight:"auto",bindKeyboard:!0,handleSelector:"a.etc",metroLightUrl:"images/metroIcons_light.jpg",metroDarkUrl:"images/metroIcons.jpg",preloadAltBaseTheme:!1},l.fn.metrojs.preloadImages=function(e){var t=l(this).toArray(),n=l("<img style='display:none;' />").appendTo("body");l(this).each(function(){var l=this;"object"==typeof this&&(l=this.src),n.attr({src:l}).load(function(){for(var l=0;l<t.length;l++)t[l]==element&&t.splice(l,1);0==t.length&&e()})}),n.remove()},l.fn.metrojs.MetroModernizr=function(e){if("undefined"==typeof e&&(e={useHardwareAccel:!0,useModernizr:"undefined"!=typeof window.Modernizr}),this.isOldJQuery=/^1\.[0123]/.test(l.fn.jquery),this.isOldAndroid=function(){try{var e=navigator.userAgent;if(e.indexOf("Android")>=0){var t=parseFloat(e.slice(e.indexOf("Android")+8));if(2.3>t)return!0}}catch(n){l.error(n)}return!1}(),this.canTransform=!1,this.canTransition=!1,this.canTransform3d=!1,this.canAnimate=!1,this.canTouch=!1,this.canFlip3d=e.useHardwareAccel,1==e.useHardwareAccel)if(0==e.useModernizr)if("undefined"!=typeof window.MetroModernizr)this.canTransform=window.MetroModernizr.canTransform,this.canTransition=window.MetroModernizr.canTransition,this.canTransform3d=window.MetroModernizr.canTransform3d,this.canAnimate=window.MetroModernizr.canAnimate,this.canTouch=window.MetroModernizr.canTouch;else{window.MetroModernizr={};var t="metromodernizr",n=document.documentElement,i=document.head||document.getElementsByTagName("head")[0],o=document.createElement(t),a=o.style,r=" -webkit- -moz- -o- -ms- ".split(" "),s="Webkit Moz O ms Khtml".split(" "),c=function(l,e){for(var t in l)if(void 0!==a[l[t]]&&(!e||e(l[t],o)))return!0},d=function(l,e){var t=l.charAt(0).toUpperCase()+l.substr(1),n=(l+" "+s.join(t+" ")+t).split(" ");return!!c(n,e)},u=function(){var l=!!c(["perspectiveProperty","WebkitPerspective","MozPerspective","OPerspective","msPerspective"]);return l&&"webkitPerspective"in n.style&&(l=h(["@media (",r.join("transform-3d),("),t,")","{#metromodernizr{left:9px;position:absolute;height:3px;}}"].join(""),function(l){return 3===l.offsetHeight&&9===l.offsetLeft})),l},h=function(l,e){var o,a=document.createElement("style"),r=document.createElement("div");return a.textContent=l,i.appendChild(a),r.id=t,n.appendChild(r),o=e(r),a.parentNode.removeChild(a),r.parentNode.removeChild(r),!!o},f=function(){return canTouch="ontouchstart"in window||window.DocumentTouch&&document instanceof DocumentTouch||"undefined"!=typeof window.navigator.msMaxTouchPoints&&window.navigator.msMaxTouchPoints>0||h(["@media (",r.join("touch-enabled),("),t,")","{#metromodernizr{top:9px;position:absolute}}"].join(""),function(l){return 9===l.offsetTop})};this.canTransform=!!c(["transformProperty","WebkitTransform","MozTransform","OTransform","msTransform"]),this.canTransition=d("transitionProperty"),this.canTransform3d=u(),this.canAnimate=d("animationName"),this.canTouch=f(),window.MetroModernizr.canTransform=this.canTransform,window.MetroModernizr.canTransition=this.canTransition,window.MetroModernizr.canTransform3d=this.canTransform3d,window.MetroModernizr.canAnimate=this.canAnimate,window.MetroModernizr.canTouch=this.canTouch,n=null,i=null,o=null,a=null}else this.canTransform=l("html").hasClass("csstransforms"),this.canTransition=l("html").hasClass("csstransitions"),this.canTransform3d=l("html").hasClass("csstransforms3d"),this.canAnimate=l("html").hasClass("cssanimations"),this.canTouch=l("html").hasClass("touch")||"undefined"!=typeof window.navigator.msMaxTouchPoints&&window.navigator.msMaxTouchPoints>0;this.canFlip3d=this.canFlip3d&&this.canAnimate&&this.canTransform&&this.canTransform3d}}(jQuery);
!function(e,t,l){!function(e){"function"==typeof define&&define.amd?define(["jquery"],e):jQuery&&!jQuery.fn.sparkline&&e(jQuery)}(function(n){"use strict";var i,a,o,r,s,c,u,d,h,f,p,m,g,v,y,b,C,T,E,w,D,_,S,I,x,k,O,R,M,N,A,K,L={},P=0;i=function(){return{common:{type:"line",lineColor:"#00f",fillColor:"#cdf",defaultPixelsPerValue:3,width:"auto",height:"auto",composite:!1,tagValuesAttribute:"values",tagOptionsPrefix:"spark",enableTagOptions:!1,enableHighlight:!0,highlightLighten:1.4,tooltipSkipNull:!0,tooltipPrefix:"",tooltipSuffix:"",disableHiddenCheck:!1,numberFormatter:!1,numberDigitGroupCount:3,numberDigitGroupSep:",",numberDecimalMark:".",disableTooltips:!1,disableInteraction:!1},line:{spotColor:"#f80",highlightSpotColor:"#5f5",highlightLineColor:"#f22",spotRadius:1.5,minSpotColor:"#f80",maxSpotColor:"#f80",lineWidth:1,normalRangeMin:l,normalRangeMax:l,normalRangeColor:"#ccc",drawNormalOnTop:!1,chartRangeMin:l,chartRangeMax:l,chartRangeMinX:l,chartRangeMaxX:l,tooltipFormat:new o('<span style="color: {{color}}">&#9679;</span> {{prefix}}{{y}}{{suffix}}')},bar:{barColor:"#3366cc",negBarColor:"#f44",stackedBarColor:["#3366cc","#dc3912","#ff9900","#109618","#66aa00","#dd4477","#0099c6","#990099"],zeroColor:l,nullColor:l,zeroAxis:!0,barWidth:4,barSpacing:1,chartRangeMax:l,chartRangeMin:l,chartRangeClip:!1,colorMap:l,tooltipFormat:new o('<span style="color: {{color}}">&#9679;</span> {{prefix}}{{value}}{{suffix}}')},tristate:{barWidth:4,barSpacing:1,posBarColor:"#6f6",negBarColor:"#f44",zeroBarColor:"#999",colorMap:{},tooltipFormat:new o('<span style="color: {{color}}">&#9679;</span> {{value:map}}'),tooltipValueLookups:{map:{"-1":"Loss",0:"Draw",1:"Win"}}},discrete:{lineHeight:"auto",thresholdColor:l,thresholdValue:0,chartRangeMax:l,chartRangeMin:l,chartRangeClip:!1,tooltipFormat:new o("{{prefix}}{{value}}{{suffix}}")},bullet:{targetColor:"#f33",targetWidth:3,performanceColor:"#33f",rangeColors:["#d3dafe","#a8b6ff","#7f94ff"],base:l,tooltipFormat:new o("{{fieldkey:fields}} - {{value}}"),tooltipValueLookups:{fields:{r:"Range",p:"Performance",t:"Target"}}},pie:{offset:0,sliceColors:["#3366cc","#dc3912","#ff9900","#109618","#66aa00","#dd4477","#0099c6","#990099"],borderWidth:0,borderColor:"#000",tooltipFormat:new o('<span style="color: {{color}}">&#9679;</span> {{value}} ({{percent.1}}%)')},box:{raw:!1,boxLineColor:"#000",boxFillColor:"#cdf",whiskerColor:"#000",outlierLineColor:"#333",outlierFillColor:"#fff",medianColor:"#f00",showOutliers:!0,outlierIQR:1.5,spotRadius:1.5,target:l,targetColor:"#4a2",chartRangeMax:l,chartRangeMin:l,tooltipFormat:new o("{{field:fields}}: {{value}}"),tooltipFormatFieldlistKey:"field",tooltipValueLookups:{fields:{lq:"Lower Quartile",med:"Median",uq:"Upper Quartile",lo:"Left Outlier",ro:"Right Outlier",lw:"Left Whisker",rw:"Right Whisker"}}}}},k='.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}',a=function(){var e,t;return e=function(){this.init.apply(this,arguments)},arguments.length>1?(arguments[0]?(e.prototype=n.extend(new arguments[0],arguments[arguments.length-1]),e._super=arguments[0].prototype):e.prototype=arguments[arguments.length-1],arguments.length>2&&(t=Array.prototype.slice.call(arguments,1,-1),t.unshift(e.prototype),n.extend.apply(n,t))):e.prototype=arguments[0],e.prototype.cls=e,e},n.SPFormatClass=o=a({fre:/\{\{([\w.]+?)(:(.+?))?\}\}/g,precre:/(\w+)\.(\d+)/,init:function(e,t){this.format=e,this.fclass=t},render:function(e,t,n){var i,a,o,r,s,c=this,u=e;return this.format.replace(this.fre,function(){var e;return a=arguments[1],o=arguments[3],i=c.precre.exec(a),i?(s=i[2],a=i[1]):s=!1,r=u[a],r===l?"":o&&t&&t[o]?(e=t[o],e.get?t[o].get(r)||r:t[o][r]||r):(h(r)&&(r=n.get("numberFormatter")?n.get("numberFormatter")(r):v(r,s,n.get("numberDigitGroupCount"),n.get("numberDigitGroupSep"),n.get("numberDecimalMark"))),r)})}}),n.spformat=function(e,t){return new o(e,t)},r=function(e,t,l){return t>e?t:e>l?l:e},s=function(e,l){var n;return 2===l?(n=t.floor(e.length/2),e.length%2?e[n]:(e[n-1]+e[n])/2):e.length%2?(n=(e.length*l+l)/4,n%1?(e[t.floor(n)]+e[t.floor(n)-1])/2:e[n-1]):(n=(e.length*l+2)/4,n%1?(e[t.floor(n)]+e[t.floor(n)-1])/2:e[n-1])},c=function(e){var t;switch(e){case"undefined":e=l;break;case"null":e=null;break;case"true":e=!0;break;case"false":e=!1;break;default:t=parseFloat(e),e==t&&(e=t)}return e},u=function(e){var t,l=[];for(t=e.length;t--;)l[t]=c(e[t]);return l},d=function(e,t){var l,n,i=[];for(l=0,n=e.length;n>l;l++)e[l]!==t&&i.push(e[l]);return i},h=function(e){return!isNaN(parseFloat(e))&&isFinite(e)},v=function(e,t,l,i,a){var o,r;for(e=(t===!1?parseFloat(e).toString():e.toFixed(t)).split(""),o=(o=n.inArray(".",e))<0?e.length:o,o<e.length&&(e[o]=a),r=o-l;r>0;r-=l)e.splice(r,0,i);return e.join("")},f=function(e,t,l){var n;for(n=t.length;n--;)if((!l||null!==t[n])&&t[n]!==e)return!1;return!0},p=function(e){var t,l=0;for(t=e.length;t--;)l+="number"==typeof e[t]?e[t]:0;return l},g=function(e){return n.isArray(e)?e:[e]},m=function(t){var l;e.createStyleSheet?e.createStyleSheet().cssText=t:(l=e.createElement("style"),l.type="text/css",e.getElementsByTagName("head")[0].appendChild(l),l["string"==typeof e.body.style.WebkitAppearance?"innerText":"innerHTML"]=t)},n.fn.simpledraw=function(t,i,a,o){var r,s;if(a&&(r=this.data("_jqs_vcanvas")))return r;if(n.fn.sparkline.canvas===!1)return!1;if(n.fn.sparkline.canvas===l){var c=e.createElement("canvas");if(c.getContext&&c.getContext("2d"))n.fn.sparkline.canvas=function(e,t,l,n){return new N(e,t,l,n)};else{if(!e.namespaces||e.namespaces.v)return n.fn.sparkline.canvas=!1,!1;e.namespaces.add("v","urn:schemas-microsoft-com:vml","#default#VML"),n.fn.sparkline.canvas=function(e,t,l){return new A(e,t,l)}}}return t===l&&(t=n(this).innerWidth()),i===l&&(i=n(this).innerHeight()),r=n.fn.sparkline.canvas(t,i,this,o),s=n(this).data("_jqs_mhandler"),s&&s.registerCanvas(r),r},n.fn.cleardraw=function(){var e=this.data("_jqs_vcanvas");e&&e.reset()},n.RangeMapClass=y=a({init:function(e){var t,l,n=[];for(t in e)e.hasOwnProperty(t)&&"string"==typeof t&&t.indexOf(":")>-1&&(l=t.split(":"),l[0]=0===l[0].length?-1/0:parseFloat(l[0]),l[1]=0===l[1].length?1/0:parseFloat(l[1]),l[2]=e[t],n.push(l));this.map=e,this.rangelist=n||!1},get:function(e){var t,n,i,a=this.rangelist;if((i=this.map[e])!==l)return i;if(a)for(t=a.length;t--;)if(n=a[t],n[0]<=e&&n[1]>=e)return n[2];return l}}),n.range_map=function(e){return new y(e)},b=a({init:function(e,t){var l=n(e);this.$el=l,this.options=t,this.currentPageX=0,this.currentPageY=0,this.el=e,this.splist=[],this.tooltip=null,this.over=!1,this.displayTooltips=!t.get("disableTooltips"),this.highlightEnabled=!t.get("disableHighlight")},registerSparkline:function(e){this.splist.push(e),this.over&&this.updateDisplay()},registerCanvas:function(e){var t=n(e.canvas);this.canvas=e,this.$canvas=t,t.mouseenter(n.proxy(this.mouseenter,this)),t.mouseleave(n.proxy(this.mouseleave,this)),t.click(n.proxy(this.mouseclick,this))},reset:function(e){this.splist=[],this.tooltip&&e&&(this.tooltip.remove(),this.tooltip=l)},mouseclick:function(e){var t=n.Event("sparklineClick");t.originalEvent=e,t.sparklines=this.splist,this.$el.trigger(t)},mouseenter:function(t){n(e.body).unbind("mousemove.jqs"),n(e.body).bind("mousemove.jqs",n.proxy(this.mousemove,this)),this.over=!0,this.currentPageX=t.pageX,this.currentPageY=t.pageY,this.currentEl=t.target,!this.tooltip&&this.displayTooltips&&(this.tooltip=new C(this.options),this.tooltip.updatePosition(t.pageX,t.pageY)),this.updateDisplay()},mouseleave:function(){n(e.body).unbind("mousemove.jqs");var t,l,i=this.splist,a=i.length,o=!1;for(this.over=!1,this.currentEl=null,this.tooltip&&(this.tooltip.remove(),this.tooltip=null),l=0;a>l;l++)t=i[l],t.clearRegionHighlight()&&(o=!0);o&&this.canvas.render()},mousemove:function(e){this.currentPageX=e.pageX,this.currentPageY=e.pageY,this.currentEl=e.target,this.tooltip&&this.tooltip.updatePosition(e.pageX,e.pageY),this.updateDisplay()},updateDisplay:function(){var e,t,l,i,a,o=this.splist,r=o.length,s=!1,c=this.$canvas.offset(),u=this.currentPageX-c.left,d=this.currentPageY-c.top;if(this.over){for(l=0;r>l;l++)t=o[l],i=t.setRegionHighlight(this.currentEl,u,d),i&&(s=!0);if(s){if(a=n.Event("sparklineRegionChange"),a.sparklines=this.splist,this.$el.trigger(a),this.tooltip){for(e="",l=0;r>l;l++)t=o[l],e+=t.getCurrentRegionTooltip();this.tooltip.setContent(e)}this.disableHighlight||this.canvas.render()}null===i&&this.mouseleave()}}}),C=a({sizeStyle:"position: static !important;display: block !important;visibility: hidden !important;float: left !important;padding: 5px 5px 15px 5px;min-height: 30px;min-width: 30px;",init:function(t){var l,i=t.get("tooltipClassname","jqstooltip"),a=this.sizeStyle;this.container=t.get("tooltipContainer")||e.body,this.tooltipOffsetX=t.get("tooltipOffsetX",10),this.tooltipOffsetY=t.get("tooltipOffsetY",12),n("#jqssizetip").remove(),n("#jqstooltip").remove(),this.sizetip=n("<div/>",{id:"jqssizetip",style:a,"class":i}),this.tooltip=n("<div/>",{id:"jqstooltip","class":i}).appendTo(this.container),l=this.tooltip.offset(),this.offsetLeft=l.left,this.offsetTop=l.top,this.hidden=!0,n(window).unbind("resize.jqs scroll.jqs"),n(window).bind("resize.jqs scroll.jqs",n.proxy(this.updateWindowDims,this)),this.updateWindowDims()},updateWindowDims:function(){this.scrollTop=n(window).scrollTop(),this.scrollLeft=n(window).scrollLeft(),this.scrollRight=this.scrollLeft+n(window).width(),this.updatePosition()},getSize:function(e){this.sizetip.html(e).appendTo(this.container),this.width=this.sizetip.width()+12,this.height=this.sizetip.height()+12,this.sizetip.remove()},setContent:function(e){return e?(this.getSize(e),this.tooltip.html(e).css({width:this.width,height:this.height,visibility:"visible"}),this.hidden&&(this.hidden=!1,this.updatePosition()),void 0):(this.tooltip.css("visibility","hidden"),this.hidden=!0,void 0)},updatePosition:function(e,t){if(e===l){if(this.mousex===l)return;e=this.mousex-this.offsetLeft,t=this.mousey-this.offsetTop}else this.mousex=e-=this.offsetLeft,this.mousey=t-=this.offsetTop;this.height&&this.width&&!this.hidden&&(t-=this.height+this.tooltipOffsetY,e+=this.tooltipOffsetX,t<this.scrollTop&&(t=this.scrollTop),e<this.scrollLeft?e=this.scrollLeft:e+this.width>this.scrollRight&&(e=this.scrollRight-this.width),this.tooltip.css({left:e,top:t}))},remove:function(){this.tooltip.remove(),this.sizetip.remove(),this.sizetip=this.tooltip=l,n(window).unbind("resize.jqs scroll.jqs")}}),O=function(){m(k)},n(O),K=[],n.fn.sparkline=function(t,i){return this.each(function(){var a,o,r=new n.fn.sparkline.options(this,i),s=n(this);if(a=function(){var i,a,o,c,u,d,h;return"html"===t||t===l?(h=this.getAttribute(r.get("tagValuesAttribute")),(h===l||null===h)&&(h=s.html()),i=h.replace(/(^\s*<!--)|(-->\s*$)|\s+/g,"").split(",")):i=t,a="auto"===r.get("width")?i.length*r.get("defaultPixelsPerValue"):r.get("width"),"auto"===r.get("height")?r.get("composite")&&n.data(this,"_jqs_vcanvas")||(c=e.createElement("span"),c.innerHTML="a",s.html(c),o=n(c).innerHeight()||n(c).height(),n(c).remove(),c=null):o=r.get("height"),r.get("disableInteraction")?u=!1:(u=n.data(this,"_jqs_mhandler"),u?r.get("composite")||u.reset():(u=new b(this,r),n.data(this,"_jqs_mhandler",u))),r.get("composite")&&!n.data(this,"_jqs_vcanvas")?(n.data(this,"_jqs_errnotify")||(alert("Attempted to attach a composite sparkline to an element with no existing sparkline"),n.data(this,"_jqs_errnotify",!0)),void 0):(d=new(n.fn.sparkline[r.get("type")])(this,i,r,a,o),d.render(),u&&u.registerSparkline(d),void 0)},n(this).html()&&!r.get("disableHiddenCheck")&&n(this).is(":hidden")||!n(this).parents("body").length){if(!r.get("composite")&&n.data(this,"_jqs_pending"))for(o=K.length;o;o--)K[o-1][0]==this&&K.splice(o-1,1);K.push([this,a]),n.data(this,"_jqs_pending",!0)}else a.call(this)})},n.fn.sparkline.defaults=i(),n.sparkline_display_visible=function(){var e,t,l,i=[];for(t=0,l=K.length;l>t;t++)e=K[t][0],n(e).is(":visible")&&!n(e).parents().is(":hidden")?(K[t][1].call(e),n.data(K[t][0],"_jqs_pending",!1),i.push(t)):!n(e).closest("html").length&&!n.data(e,"_jqs_pending")&&(n.data(K[t][0],"_jqs_pending",!1),i.push(t));for(t=i.length;t;t--)K.splice(i[t-1],1)},n.fn.sparkline.options=a({init:function(e,t){var l,i,a,o;this.userOptions=t=t||{},this.tag=e,this.tagValCache={},i=n.fn.sparkline.defaults,a=i.common,this.tagOptionsPrefix=t.enableTagOptions&&(t.tagOptionsPrefix||a.tagOptionsPrefix),o=this.getTagSetting("type"),l=o===L?i[t.type||a.type]:i[o],this.mergedOptions=n.extend({},a,l,t)},getTagSetting:function(e){var t,n,i,a,o=this.tagOptionsPrefix;if(o===!1||o===l)return L;if(this.tagValCache.hasOwnProperty(e))t=this.tagValCache.key;else{if(t=this.tag.getAttribute(o+e),t===l||null===t)t=L;else if("["===t.substr(0,1))for(t=t.substr(1,t.length-2).split(","),n=t.length;n--;)t[n]=c(t[n].replace(/(^\s*)|(\s*$)/g,""));else if("{"===t.substr(0,1))for(i=t.substr(1,t.length-2).split(","),t={},n=i.length;n--;)a=i[n].split(":",2),t[a[0].replace(/(^\s*)|(\s*$)/g,"")]=c(a[1].replace(/(^\s*)|(\s*$)/g,""));else t=c(t);this.tagValCache.key=t}return t},get:function(e,t){var n,i=this.getTagSetting(e);return i!==L?i:(n=this.mergedOptions[e])===l?t:n}}),n.fn.sparkline._base=a({disabled:!1,init:function(e,t,i,a,o){this.el=e,this.$el=n(e),this.values=t,this.options=i,this.width=a,this.height=o,this.currentRegion=l},initTarget:function(){var e=!this.options.get("disableInteraction");(this.target=this.$el.simpledraw(this.width,this.height,this.options.get("composite"),e))?(this.canvasWidth=this.target.pixelWidth,this.canvasHeight=this.target.pixelHeight):this.disabled=!0},render:function(){return this.disabled?(this.el.innerHTML="",!1):!0},getRegion:function(){},setRegionHighlight:function(e,t,n){var i,a=this.currentRegion,o=!this.options.get("disableHighlight");return t>this.canvasWidth||n>this.canvasHeight||0>t||0>n?null:(i=this.getRegion(e,t,n),a!==i?(a!==l&&o&&this.removeHighlight(),this.currentRegion=i,i!==l&&o&&this.renderHighlight(),!0):!1)},clearRegionHighlight:function(){return this.currentRegion!==l?(this.removeHighlight(),this.currentRegion=l,!0):!1},renderHighlight:function(){this.changeHighlight(!0)},removeHighlight:function(){this.changeHighlight(!1)},changeHighlight:function(){},getCurrentRegionTooltip:function(){var e,t,i,a,r,s,c,u,d,h,f,p,m,g,v=this.options,y="",b=[];if(this.currentRegion===l)return"";if(e=this.getCurrentRegionFields(),f=v.get("tooltipFormatter"))return f(this,v,e);if(v.get("tooltipChartTitle")&&(y+='<div class="jqs jqstitle">'+v.get("tooltipChartTitle")+"</div>\n"),t=this.options.get("tooltipFormat"),!t)return"";if(n.isArray(t)||(t=[t]),n.isArray(e)||(e=[e]),c=this.options.get("tooltipFormatFieldlist"),u=this.options.get("tooltipFormatFieldlistKey"),c&&u){for(d=[],s=e.length;s--;)h=e[s][u],-1!=(g=n.inArray(h,c))&&(d[g]=e[s]);e=d}for(i=t.length,m=e.length,s=0;i>s;s++)for(p=t[s],"string"==typeof p&&(p=new o(p)),a=p.fclass||"jqsfield",g=0;m>g;g++)e[g].isNull&&v.get("tooltipSkipNull")||(n.extend(e[g],{prefix:v.get("tooltipPrefix"),suffix:v.get("tooltipSuffix")}),r=p.render(e[g],v.get("tooltipValueLookups"),v),b.push('<div class="'+a+'">'+r+"</div>"));return b.length?y+b.join("\n"):""},getCurrentRegionFields:function(){},calcHighlightColor:function(e,l){var n,i,a,o,s=l.get("highlightColor"),c=l.get("highlightLighten");if(s)return s;if(c&&(n=/^#([0-9a-f])([0-9a-f])([0-9a-f])$/i.exec(e)||/^#([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2})$/i.exec(e))){for(a=[],i=4===e.length?16:1,o=0;3>o;o++)a[o]=r(t.round(parseInt(n[o+1],16)*i*c),0,255);return"rgb("+a.join(",")+")"}return e}}),T={changeHighlight:function(e){var t,l=this.currentRegion,i=this.target,a=this.regionShapes[l];a&&(t=this.renderRegion(l,e),n.isArray(t)||n.isArray(a)?(i.replaceWithShapes(a,t),this.regionShapes[l]=n.map(t,function(e){return e.id})):(i.replaceWithShape(a,t),this.regionShapes[l]=t.id))},render:function(){var e,t,l,i,a=this.values,o=this.target,r=this.regionShapes;if(this.cls._super.render.call(this)){for(l=a.length;l--;)if(e=this.renderRegion(l))if(n.isArray(e)){for(t=[],i=e.length;i--;)e[i].append(),t.push(e[i].id);r[l]=t}else e.append(),r[l]=e.id;else r[l]=null;o.render()}}},n.fn.sparkline.line=E=a(n.fn.sparkline._base,{type:"line",init:function(e,t,l,n,i){E._super.init.call(this,e,t,l,n,i),this.vertices=[],this.regionMap=[],this.xvalues=[],this.yvalues=[],this.yminmax=[],this.hightlightSpotId=null,this.lastShapeId=null,this.initTarget()},getRegion:function(e,t){var n,i=this.regionMap;for(n=i.length;n--;)if(null!==i[n]&&t>=i[n][0]&&t<=i[n][1])return i[n][2];return l},getCurrentRegionFields:function(){var e=this.currentRegion;return{isNull:null===this.yvalues[e],x:this.xvalues[e],y:this.yvalues[e],color:this.options.get("lineColor"),fillColor:this.options.get("fillColor"),offset:e}},renderHighlight:function(){var e,t,n=this.currentRegion,i=this.target,a=this.vertices[n],o=this.options,r=o.get("spotRadius"),s=o.get("highlightSpotColor"),c=o.get("highlightLineColor");a&&(r&&s&&(e=i.drawCircle(a[0],a[1],r,l,s),this.highlightSpotId=e.id,i.insertAfterShape(this.lastShapeId,e)),c&&(t=i.drawLine(a[0],this.canvasTop,a[0],this.canvasTop+this.canvasHeight,c),this.highlightLineId=t.id,i.insertAfterShape(this.lastShapeId,t)))},removeHighlight:function(){var e=this.target;this.highlightSpotId&&(e.removeShapeId(this.highlightSpotId),this.highlightSpotId=null),this.highlightLineId&&(e.removeShapeId(this.highlightLineId),this.highlightLineId=null)},scanValues:function(){var e,l,n,i,a,o=this.values,r=o.length,s=this.xvalues,c=this.yvalues,u=this.yminmax;for(e=0;r>e;e++)l=o[e],n="string"==typeof o[e],i="object"==typeof o[e]&&o[e]instanceof Array,a=n&&o[e].split(":"),n&&2===a.length?(s.push(Number(a[0])),c.push(Number(a[1])),u.push(Number(a[1]))):i?(s.push(l[0]),c.push(l[1]),u.push(l[1])):(s.push(e),null===o[e]||"null"===o[e]?c.push(null):(c.push(Number(l)),u.push(Number(l))));this.options.get("xvalues")&&(s=this.options.get("xvalues")),this.maxy=this.maxyorg=t.max.apply(t,u),this.miny=this.minyorg=t.min.apply(t,u),this.maxx=t.max.apply(t,s),this.minx=t.min.apply(t,s),this.xvalues=s,this.yvalues=c,this.yminmax=u},processRangeOptions:function(){var e=this.options,t=e.get("normalRangeMin"),n=e.get("normalRangeMax");t!==l&&(t<this.miny&&(this.miny=t),n>this.maxy&&(this.maxy=n)),e.get("chartRangeMin")!==l&&(e.get("chartRangeClip")||e.get("chartRangeMin")<this.miny)&&(this.miny=e.get("chartRangeMin")),e.get("chartRangeMax")!==l&&(e.get("chartRangeClip")||e.get("chartRangeMax")>this.maxy)&&(this.maxy=e.get("chartRangeMax")),e.get("chartRangeMinX")!==l&&(e.get("chartRangeClipX")||e.get("chartRangeMinX")<this.minx)&&(this.minx=e.get("chartRangeMinX")),e.get("chartRangeMaxX")!==l&&(e.get("chartRangeClipX")||e.get("chartRangeMaxX")>this.maxx)&&(this.maxx=e.get("chartRangeMaxX"))},drawNormalRange:function(e,n,i,a,o){var r=this.options.get("normalRangeMin"),s=this.options.get("normalRangeMax"),c=n+t.round(i-i*((s-this.miny)/o)),u=t.round(i*(s-r)/o);this.target.drawRect(e,c,a,u,l,this.options.get("normalRangeColor")).append()},render:function(){var e,i,a,o,r,s,c,u,d,h,f,p,m,g,v,b,C,T,w,D,_,S,I,x,k,O=this.options,R=this.target,M=this.canvasWidth,N=this.canvasHeight,A=this.vertices,K=O.get("spotRadius"),L=this.regionMap;if(E._super.render.call(this)&&(this.scanValues(),this.processRangeOptions(),I=this.xvalues,x=this.yvalues,this.yminmax.length&&!(this.yvalues.length<2))){for(o=r=0,e=0===this.maxx-this.minx?1:this.maxx-this.minx,i=0===this.maxy-this.miny?1:this.maxy-this.miny,a=this.yvalues.length-1,K&&(4*K>M||4*K>N)&&(K=0),K&&(_=O.get("highlightSpotColor")&&!O.get("disableInteraction"),(_||O.get("minSpotColor")||O.get("spotColor")&&x[a]===this.miny)&&(N-=t.ceil(K)),(_||O.get("maxSpotColor")||O.get("spotColor")&&x[a]===this.maxy)&&(N-=t.ceil(K),o+=t.ceil(K)),(_||(O.get("minSpotColor")||O.get("maxSpotColor"))&&(x[0]===this.miny||x[0]===this.maxy))&&(r+=t.ceil(K),M-=t.ceil(K)),(_||O.get("spotColor")||O.get("minSpotColor")||O.get("maxSpotColor")&&(x[a]===this.miny||x[a]===this.maxy))&&(M-=t.ceil(K))),N--,O.get("normalRangeMin")!==l&&!O.get("drawNormalOnTop")&&this.drawNormalRange(r,o,N,M,i),c=[],u=[c],g=v=null,b=x.length,k=0;b>k;k++)d=I[k],f=I[k+1],h=x[k],p=r+t.round((d-this.minx)*(M/e)),m=b-1>k?r+t.round((f-this.minx)*(M/e)):M,v=p+(m-p)/2,L[k]=[g||0,v,k],g=v,null===h?k&&(null!==x[k-1]&&(c=[],u.push(c)),A.push(null)):(h<this.miny&&(h=this.miny),h>this.maxy&&(h=this.maxy),c.length||c.push([p,o+N]),s=[p,o+t.round(N-N*((h-this.miny)/i))],c.push(s),A.push(s));for(C=[],T=[],w=u.length,k=0;w>k;k++)c=u[k],c.length&&(O.get("fillColor")&&(c.push([c[c.length-1][0],o+N]),T.push(c.slice(0)),c.pop()),c.length>2&&(c[0]=[c[0][0],c[1][1]]),C.push(c));for(w=T.length,k=0;w>k;k++)R.drawShape(T[k],O.get("fillColor"),O.get("fillColor")).append();for(O.get("normalRangeMin")!==l&&O.get("drawNormalOnTop")&&this.drawNormalRange(r,o,N,M,i),w=C.length,k=0;w>k;k++)R.drawShape(C[k],O.get("lineColor"),l,O.get("lineWidth")).append();if(K&&O.get("valueSpots"))for(D=O.get("valueSpots"),D.get===l&&(D=new y(D)),k=0;b>k;k++)S=D.get(x[k]),S&&R.drawCircle(r+t.round((I[k]-this.minx)*(M/e)),o+t.round(N-N*((x[k]-this.miny)/i)),K,l,S).append();K&&O.get("spotColor")&&null!==x[a]&&R.drawCircle(r+t.round((I[I.length-1]-this.minx)*(M/e)),o+t.round(N-N*((x[a]-this.miny)/i)),K,l,O.get("spotColor")).append(),this.maxy!==this.minyorg&&(K&&O.get("minSpotColor")&&(d=I[n.inArray(this.minyorg,x)],R.drawCircle(r+t.round((d-this.minx)*(M/e)),o+t.round(N-N*((this.minyorg-this.miny)/i)),K,l,O.get("minSpotColor")).append()),K&&O.get("maxSpotColor")&&(d=I[n.inArray(this.maxyorg,x)],R.drawCircle(r+t.round((d-this.minx)*(M/e)),o+t.round(N-N*((this.maxyorg-this.miny)/i)),K,l,O.get("maxSpotColor")).append())),this.lastShapeId=R.getLastShapeId(),this.canvasTop=o,R.render()}}}),n.fn.sparkline.bar=w=a(n.fn.sparkline._base,T,{type:"bar",init:function(e,i,a,o,s){var h,f,p,m,g,v,b,C,T,E,D,_,S,I,x,k,O,R,M,N,A,K,L=parseInt(a.get("barWidth"),10),P=parseInt(a.get("barSpacing"),10),F=a.get("chartRangeMin"),B=a.get("chartRangeMax"),$=a.get("chartRangeClip"),H=1/0,Z=-1/0;for(w._super.init.call(this,e,i,a,o,s),v=0,b=i.length;b>v;v++)N=i[v],h="string"==typeof N&&N.indexOf(":")>-1,(h||n.isArray(N))&&(x=!0,h&&(N=i[v]=u(N.split(":"))),N=d(N,null),f=t.min.apply(t,N),p=t.max.apply(t,N),H>f&&(H=f),p>Z&&(Z=p));this.stacked=x,this.regionShapes={},this.barWidth=L,this.barSpacing=P,this.totalBarWidth=L+P,this.width=o=i.length*L+(i.length-1)*P,this.initTarget(),$&&(S=F===l?-1/0:F,I=B===l?1/0:B),g=[],m=x?[]:g;var z=[],U=[];for(v=0,b=i.length;b>v;v++)if(x)for(k=i[v],i[v]=M=[],z[v]=0,m[v]=U[v]=0,O=0,R=k.length;R>O;O++)N=M[O]=$?r(k[O],S,I):k[O],null!==N&&(N>0&&(z[v]+=N),0>H&&Z>0?0>N?U[v]+=t.abs(N):m[v]+=N:m[v]+=t.abs(N-(0>N?Z:H)),g.push(N));else N=$?r(i[v],S,I):i[v],N=i[v]=c(N),null!==N&&g.push(N);this.max=_=t.max.apply(t,g),this.min=D=t.min.apply(t,g),this.stackMax=Z=x?t.max.apply(t,z):_,this.stackMin=H=x?t.min.apply(t,g):D,a.get("chartRangeMin")!==l&&(a.get("chartRangeClip")||a.get("chartRangeMin")<D)&&(D=a.get("chartRangeMin")),a.get("chartRangeMax")!==l&&(a.get("chartRangeClip")||a.get("chartRangeMax")>_)&&(_=a.get("chartRangeMax")),this.zeroAxis=T=a.get("zeroAxis",!0),E=0>=D&&_>=0&&T?0:0==T?D:D>0?D:_,this.xaxisOffset=E,C=x?t.max.apply(t,m)+t.max.apply(t,U):_-D,this.canvasHeightEf=T&&0>D?this.canvasHeight-2:this.canvasHeight-1,E>D?(K=x&&_>=0?Z:_,A=(K-E)/C*this.canvasHeight,A!==t.ceil(A)&&(this.canvasHeightEf-=2,A=t.ceil(A))):A=this.canvasHeight,this.yoffset=A,n.isArray(a.get("colorMap"))?(this.colorMapByIndex=a.get("colorMap"),this.colorMapByValue=null):(this.colorMapByIndex=null,this.colorMapByValue=a.get("colorMap"),this.colorMapByValue&&this.colorMapByValue.get===l&&(this.colorMapByValue=new y(this.colorMapByValue))),this.range=C},getRegion:function(e,n){var i=t.floor(n/this.totalBarWidth);return 0>i||i>=this.values.length?l:i},getCurrentRegionFields:function(){var e,t,l=this.currentRegion,n=g(this.values[l]),i=[];for(t=n.length;t--;)e=n[t],i.push({isNull:null===e,value:e,color:this.calcColor(t,e,l),offset:l});return i},calcColor:function(e,t,i){var a,o,r=this.colorMapByIndex,s=this.colorMapByValue,c=this.options;return a=this.stacked?c.get("stackedBarColor"):0>t?c.get("negBarColor"):c.get("barColor"),0===t&&c.get("zeroColor")!==l&&(a=c.get("zeroColor")),s&&(o=s.get(t))?a=o:r&&r.length>i&&(a=r[i]),n.isArray(a)?a[e%a.length]:a},renderRegion:function(e,i){var a,o,r,s,c,u,d,h,p,m,g=this.values[e],v=this.options,y=this.xaxisOffset,b=[],C=this.range,T=this.stacked,E=this.target,w=e*this.totalBarWidth,D=this.canvasHeightEf,_=this.yoffset;if(g=n.isArray(g)?g:[g],d=g.length,h=g[0],s=f(null,g),m=f(y,g,!0),s)return v.get("nullColor")?(r=i?v.get("nullColor"):this.calcHighlightColor(v.get("nullColor"),v),a=_>0?_-1:_,E.drawRect(w,a,this.barWidth-1,0,r,r)):l;for(c=_,u=0;d>u;u++){if(h=g[u],T&&h===y){if(!m||p)continue;p=!0}o=C>0?t.floor(D*(t.abs(h-y)/C))+1:1,y>h||h===y&&0===_?(a=c,c+=o):(a=_-o,_-=o),r=this.calcColor(u,h,e),i&&(r=this.calcHighlightColor(r,v)),b.push(E.drawRect(w,a,this.barWidth-1,o-1,r,r))}return 1===b.length?b[0]:b}}),n.fn.sparkline.tristate=D=a(n.fn.sparkline._base,T,{type:"tristate",init:function(e,t,i,a,o){var r=parseInt(i.get("barWidth"),10),s=parseInt(i.get("barSpacing"),10);D._super.init.call(this,e,t,i,a,o),this.regionShapes={},this.barWidth=r,this.barSpacing=s,this.totalBarWidth=r+s,this.values=n.map(t,Number),this.width=a=t.length*r+(t.length-1)*s,n.isArray(i.get("colorMap"))?(this.colorMapByIndex=i.get("colorMap"),this.colorMapByValue=null):(this.colorMapByIndex=null,this.colorMapByValue=i.get("colorMap"),this.colorMapByValue&&this.colorMapByValue.get===l&&(this.colorMapByValue=new y(this.colorMapByValue))),this.initTarget()},getRegion:function(e,l){return t.floor(l/this.totalBarWidth)},getCurrentRegionFields:function(){var e=this.currentRegion;return{isNull:this.values[e]===l,value:this.values[e],color:this.calcColor(this.values[e],e),offset:e}},calcColor:function(e,t){var l,n,i=this.values,a=this.options,o=this.colorMapByIndex,r=this.colorMapByValue;return l=r&&(n=r.get(e))?n:o&&o.length>t?o[t]:i[t]<0?a.get("negBarColor"):i[t]>0?a.get("posBarColor"):a.get("zeroBarColor")},renderRegion:function(e,l){var n,i,a,o,r,s,c=this.values,u=this.options,d=this.target;return n=d.pixelHeight,a=t.round(n/2),o=e*this.totalBarWidth,c[e]<0?(r=a,i=a-1):c[e]>0?(r=0,i=a-1):(r=a-1,i=2),s=this.calcColor(c[e],e),null!==s?(l&&(s=this.calcHighlightColor(s,u)),d.drawRect(o,r,this.barWidth-1,i-1,s,s)):void 0}}),n.fn.sparkline.discrete=_=a(n.fn.sparkline._base,T,{type:"discrete",init:function(e,i,a,o,r){_._super.init.call(this,e,i,a,o,r),this.regionShapes={},this.values=i=n.map(i,Number),this.min=t.min.apply(t,i),this.max=t.max.apply(t,i),this.range=this.max-this.min,this.width=o="auto"===a.get("width")?2*i.length:this.width,this.interval=t.floor(o/i.length),this.itemWidth=o/i.length,a.get("chartRangeMin")!==l&&(a.get("chartRangeClip")||a.get("chartRangeMin")<this.min)&&(this.min=a.get("chartRangeMin")),a.get("chartRangeMax")!==l&&(a.get("chartRangeClip")||a.get("chartRangeMax")>this.max)&&(this.max=a.get("chartRangeMax")),this.initTarget(),this.target&&(this.lineHeight="auto"===a.get("lineHeight")?t.round(.3*this.canvasHeight):a.get("lineHeight"))},getRegion:function(e,l){return t.floor(l/this.itemWidth)},getCurrentRegionFields:function(){var e=this.currentRegion;return{isNull:this.values[e]===l,value:this.values[e],offset:e}},renderRegion:function(e,l){var n,i,a,o,s=this.values,c=this.options,u=this.min,d=this.max,h=this.range,f=this.interval,p=this.target,m=this.canvasHeight,g=this.lineHeight,v=m-g;return i=r(s[e],u,d),o=e*f,n=t.round(v-v*((i-u)/h)),a=c.get("thresholdColor")&&i<c.get("thresholdValue")?c.get("thresholdColor"):c.get("lineColor"),l&&(a=this.calcHighlightColor(a,c)),p.drawLine(o,n,o,n+g,a)}}),n.fn.sparkline.bullet=S=a(n.fn.sparkline._base,{type:"bullet",init:function(e,n,i,a,o){var r,s,c;S._super.init.call(this,e,n,i,a,o),this.values=n=u(n),c=n.slice(),c[0]=null===c[0]?c[2]:c[0],c[1]=null===n[1]?c[2]:c[1],r=t.min.apply(t,n),s=t.max.apply(t,n),r=i.get("base")===l?0>r?r:0:i.get("base"),this.min=r,this.max=s,this.range=s-r,this.shapes={},this.valueShapes={},this.regiondata={},this.width=a="auto"===i.get("width")?"4.0em":a,this.target=this.$el.simpledraw(a,o,i.get("composite")),n.length||(this.disabled=!0),this.initTarget()},getRegion:function(e,t,n){var i=this.target.getShapeAt(e,t,n);return i!==l&&this.shapes[i]!==l?this.shapes[i]:l},getCurrentRegionFields:function(){var e=this.currentRegion;return{fieldkey:e.substr(0,1),value:this.values[e.substr(1)],region:e}},changeHighlight:function(e){var t,l=this.currentRegion,n=this.valueShapes[l];switch(delete this.shapes[n],l.substr(0,1)){case"r":t=this.renderRange(l.substr(1),e);break;case"p":t=this.renderPerformance(e);break;case"t":t=this.renderTarget(e)}this.valueShapes[l]=t.id,this.shapes[t.id]=l,this.target.replaceWithShape(n,t)},renderRange:function(e,l){var n=this.values[e],i=t.round(this.canvasWidth*((n-this.min)/this.range)),a=this.options.get("rangeColors")[e-2];return l&&(a=this.calcHighlightColor(a,this.options)),this.target.drawRect(0,0,i-1,this.canvasHeight-1,a,a)},renderPerformance:function(e){var l=this.values[1],n=t.round(this.canvasWidth*((l-this.min)/this.range)),i=this.options.get("performanceColor");return e&&(i=this.calcHighlightColor(i,this.options)),this.target.drawRect(0,t.round(.3*this.canvasHeight),n-1,t.round(.4*this.canvasHeight)-1,i,i)},renderTarget:function(e){var l=this.values[0],n=t.round(this.canvasWidth*((l-this.min)/this.range)-this.options.get("targetWidth")/2),i=t.round(.1*this.canvasHeight),a=this.canvasHeight-2*i,o=this.options.get("targetColor");return e&&(o=this.calcHighlightColor(o,this.options)),this.target.drawRect(n,i,this.options.get("targetWidth")-1,a-1,o,o)},render:function(){var e,t,l=this.values.length,n=this.target;if(S._super.render.call(this)){for(e=2;l>e;e++)t=this.renderRange(e).append(),this.shapes[t.id]="r"+e,this.valueShapes["r"+e]=t.id;null!==this.values[1]&&(t=this.renderPerformance().append(),this.shapes[t.id]="p1",this.valueShapes.p1=t.id),null!==this.values[0]&&(t=this.renderTarget().append(),this.shapes[t.id]="t0",this.valueShapes.t0=t.id),n.render()}}}),n.fn.sparkline.pie=I=a(n.fn.sparkline._base,{type:"pie",init:function(e,l,i,a,o){var r,s=0;if(I._super.init.call(this,e,l,i,a,o),this.shapes={},this.valueShapes={},this.values=l=n.map(l,Number),"auto"===i.get("width")&&(this.width=this.height),l.length>0)for(r=l.length;r--;)s+=l[r];this.total=s,this.initTarget(),this.radius=t.floor(t.min(this.canvasWidth,this.canvasHeight)/2)},getRegion:function(e,t,n){var i=this.target.getShapeAt(e,t,n);return i!==l&&this.shapes[i]!==l?this.shapes[i]:l},getCurrentRegionFields:function(){var e=this.currentRegion;return{isNull:this.values[e]===l,value:this.values[e],percent:100*(this.values[e]/this.total),color:this.options.get("sliceColors")[e%this.options.get("sliceColors").length],offset:e}},changeHighlight:function(e){var t=this.currentRegion,l=this.renderSlice(t,e),n=this.valueShapes[t];delete this.shapes[n],this.target.replaceWithShape(n,l),this.valueShapes[t]=l.id,this.shapes[l.id]=t},renderSlice:function(e,n){var i,a,o,r,s,c=this.target,u=this.options,d=this.radius,h=u.get("borderWidth"),f=u.get("offset"),p=2*t.PI,m=this.values,g=this.total,v=f?2*t.PI*(f/360):0;for(r=m.length,o=0;r>o;o++){if(i=v,a=v,g>0&&(a=v+p*(m[o]/g)),e===o)return s=u.get("sliceColors")[o%u.get("sliceColors").length],n&&(s=this.calcHighlightColor(s,u)),c.drawPieSlice(d,d,d-h,i,a,l,s);v=a}},render:function(){var e,n,i=this.target,a=this.values,o=this.options,r=this.radius,s=o.get("borderWidth");
if(I._super.render.call(this)){for(s&&i.drawCircle(r,r,t.floor(r-s/2),o.get("borderColor"),l,s).append(),n=a.length;n--;)a[n]&&(e=this.renderSlice(n).append(),this.valueShapes[n]=e.id,this.shapes[e.id]=n);i.render()}}}),n.fn.sparkline.box=x=a(n.fn.sparkline._base,{type:"box",init:function(e,t,l,i,a){x._super.init.call(this,e,t,l,i,a),this.values=n.map(t,Number),this.width="auto"===l.get("width")?"4.0em":i,this.initTarget(),this.values.length||(this.disabled=1)},getRegion:function(){return 1},getCurrentRegionFields:function(){var e=[{field:"lq",value:this.quartiles[0]},{field:"med",value:this.quartiles[1]},{field:"uq",value:this.quartiles[2]}];return this.loutlier!==l&&e.push({field:"lo",value:this.loutlier}),this.routlier!==l&&e.push({field:"ro",value:this.routlier}),this.lwhisker!==l&&e.push({field:"lw",value:this.lwhisker}),this.rwhisker!==l&&e.push({field:"rw",value:this.rwhisker}),e},render:function(){var e,n,i,a,o,r,c,u,d,h,f,p=this.target,m=this.values,g=m.length,v=this.options,y=this.canvasWidth,b=this.canvasHeight,C=v.get("chartRangeMin")===l?t.min.apply(t,m):v.get("chartRangeMin"),T=v.get("chartRangeMax")===l?t.max.apply(t,m):v.get("chartRangeMax"),E=0;if(x._super.render.call(this)){if(v.get("raw"))v.get("showOutliers")&&m.length>5?(n=m[0],e=m[1],a=m[2],o=m[3],r=m[4],c=m[5],u=m[6]):(e=m[0],a=m[1],o=m[2],r=m[3],c=m[4]);else if(m.sort(function(e,t){return e-t}),a=s(m,1),o=s(m,2),r=s(m,3),i=r-a,v.get("showOutliers")){for(e=c=l,d=0;g>d;d++)e===l&&m[d]>a-i*v.get("outlierIQR")&&(e=m[d]),m[d]<r+i*v.get("outlierIQR")&&(c=m[d]);n=m[0],u=m[g-1]}else e=m[0],c=m[g-1];this.quartiles=[a,o,r],this.lwhisker=e,this.rwhisker=c,this.loutlier=n,this.routlier=u,f=y/(T-C+1),v.get("showOutliers")&&(E=t.ceil(v.get("spotRadius")),y-=2*t.ceil(v.get("spotRadius")),f=y/(T-C+1),e>n&&p.drawCircle((n-C)*f+E,b/2,v.get("spotRadius"),v.get("outlierLineColor"),v.get("outlierFillColor")).append(),u>c&&p.drawCircle((u-C)*f+E,b/2,v.get("spotRadius"),v.get("outlierLineColor"),v.get("outlierFillColor")).append()),p.drawRect(t.round((a-C)*f+E),t.round(.1*b),t.round((r-a)*f),t.round(.8*b),v.get("boxLineColor"),v.get("boxFillColor")).append(),p.drawLine(t.round((e-C)*f+E),t.round(b/2),t.round((a-C)*f+E),t.round(b/2),v.get("lineColor")).append(),p.drawLine(t.round((e-C)*f+E),t.round(b/4),t.round((e-C)*f+E),t.round(b-b/4),v.get("whiskerColor")).append(),p.drawLine(t.round((c-C)*f+E),t.round(b/2),t.round((r-C)*f+E),t.round(b/2),v.get("lineColor")).append(),p.drawLine(t.round((c-C)*f+E),t.round(b/4),t.round((c-C)*f+E),t.round(b-b/4),v.get("whiskerColor")).append(),p.drawLine(t.round((o-C)*f+E),t.round(.1*b),t.round((o-C)*f+E),t.round(.9*b),v.get("medianColor")).append(),v.get("target")&&(h=t.ceil(v.get("spotRadius")),p.drawLine(t.round((v.get("target")-C)*f+E),t.round(b/2-h),t.round((v.get("target")-C)*f+E),t.round(b/2+h),v.get("targetColor")).append(),p.drawLine(t.round((v.get("target")-C)*f+E-h),t.round(b/2),t.round((v.get("target")-C)*f+E+h),t.round(b/2),v.get("targetColor")).append()),p.render()}}}),R=a({init:function(e,t,l,n){this.target=e,this.id=t,this.type=l,this.args=n},append:function(){return this.target.appendShape(this),this}}),M=a({_pxregex:/(\d+)(px)?\s*$/i,init:function(e,t,l){e&&(this.width=e,this.height=t,this.target=l,this.lastShapeId=null,l[0]&&(l=l[0]),n.data(l,"_jqs_vcanvas",this))},drawLine:function(e,t,l,n,i,a){return this.drawShape([[e,t],[l,n]],i,a)},drawShape:function(e,t,l,n){return this._genShape("Shape",[e,t,l,n])},drawCircle:function(e,t,l,n,i,a){return this._genShape("Circle",[e,t,l,n,i,a])},drawPieSlice:function(e,t,l,n,i,a,o){return this._genShape("PieSlice",[e,t,l,n,i,a,o])},drawRect:function(e,t,l,n,i,a){return this._genShape("Rect",[e,t,l,n,i,a])},getElement:function(){return this.canvas},getLastShapeId:function(){return this.lastShapeId},reset:function(){alert("reset not implemented")},_insert:function(e,t){n(t).html(e)},_calculatePixelDims:function(e,t,l){var i;i=this._pxregex.exec(t),this.pixelHeight=i?i[1]:n(l).height(),i=this._pxregex.exec(e),this.pixelWidth=i?i[1]:n(l).width()},_genShape:function(e,t){var l=P++;return t.unshift(l),new R(this,l,e,t)},appendShape:function(){alert("appendShape not implemented")},replaceWithShape:function(){alert("replaceWithShape not implemented")},insertAfterShape:function(){alert("insertAfterShape not implemented")},removeShapeId:function(){alert("removeShapeId not implemented")},getShapeAt:function(){alert("getShapeAt not implemented")},render:function(){alert("render not implemented")}}),N=a(M,{init:function(t,i,a,o){N._super.init.call(this,t,i,a),this.canvas=e.createElement("canvas"),a[0]&&(a=a[0]),n.data(a,"_jqs_vcanvas",this),n(this.canvas).css({display:"inline-block",width:t,height:i,verticalAlign:"top"}),this._insert(this.canvas,a),this._calculatePixelDims(t,i,this.canvas),this.canvas.width=this.pixelWidth,this.canvas.height=this.pixelHeight,this.interact=o,this.shapes={},this.shapeseq=[],this.currentTargetShapeId=l,n(this.canvas).css({width:this.pixelWidth,height:this.pixelHeight})},_getContext:function(e,t,n){var i=this.canvas.getContext("2d");return e!==l&&(i.strokeStyle=e),i.lineWidth=n===l?1:n,t!==l&&(i.fillStyle=t),i},reset:function(){var e=this._getContext();e.clearRect(0,0,this.pixelWidth,this.pixelHeight),this.shapes={},this.shapeseq=[],this.currentTargetShapeId=l},_drawShape:function(e,t,n,i,a){var o,r,s=this._getContext(n,i,a);for(s.beginPath(),s.moveTo(t[0][0]+.5,t[0][1]+.5),o=1,r=t.length;r>o;o++)s.lineTo(t[o][0]+.5,t[o][1]+.5);n!==l&&s.stroke(),i!==l&&s.fill(),this.targetX!==l&&this.targetY!==l&&s.isPointInPath(this.targetX,this.targetY)&&(this.currentTargetShapeId=e)},_drawCircle:function(e,n,i,a,o,r,s){var c=this._getContext(o,r,s);c.beginPath(),c.arc(n,i,a,0,2*t.PI,!1),this.targetX!==l&&this.targetY!==l&&c.isPointInPath(this.targetX,this.targetY)&&(this.currentTargetShapeId=e),o!==l&&c.stroke(),r!==l&&c.fill()},_drawPieSlice:function(e,t,n,i,a,o,r,s){var c=this._getContext(r,s);c.beginPath(),c.moveTo(t,n),c.arc(t,n,i,a,o,!1),c.lineTo(t,n),c.closePath(),r!==l&&c.stroke(),s&&c.fill(),this.targetX!==l&&this.targetY!==l&&c.isPointInPath(this.targetX,this.targetY)&&(this.currentTargetShapeId=e)},_drawRect:function(e,t,l,n,i,a,o){return this._drawShape(e,[[t,l],[t+n,l],[t+n,l+i],[t,l+i],[t,l]],a,o)},appendShape:function(e){return this.shapes[e.id]=e,this.shapeseq.push(e.id),this.lastShapeId=e.id,e.id},replaceWithShape:function(e,t){var l,n=this.shapeseq;for(this.shapes[t.id]=t,l=n.length;l--;)n[l]==e&&(n[l]=t.id);delete this.shapes[e]},replaceWithShapes:function(e,t){var l,n,i,a=this.shapeseq,o={};for(n=e.length;n--;)o[e[n]]=!0;for(n=a.length;n--;)l=a[n],o[l]&&(a.splice(n,1),delete this.shapes[l],i=n);for(n=t.length;n--;)a.splice(i,0,t[n].id),this.shapes[t[n].id]=t[n]},insertAfterShape:function(e,t){var l,n=this.shapeseq;for(l=n.length;l--;)if(n[l]===e)return n.splice(l+1,0,t.id),this.shapes[t.id]=t,void 0},removeShapeId:function(e){var t,l=this.shapeseq;for(t=l.length;t--;)if(l[t]===e){l.splice(t,1);break}delete this.shapes[e]},getShapeAt:function(e,t,l){return this.targetX=t,this.targetY=l,this.render(),this.currentTargetShapeId},render:function(){var e,t,l,n=this.shapeseq,i=this.shapes,a=n.length,o=this._getContext();for(o.clearRect(0,0,this.pixelWidth,this.pixelHeight),l=0;a>l;l++)e=n[l],t=i[e],this["_draw"+t.type].apply(this,t.args);this.interact||(this.shapes={},this.shapeseq=[])}}),A=a(M,{init:function(t,l,i){var a;A._super.init.call(this,t,l,i),i[0]&&(i=i[0]),n.data(i,"_jqs_vcanvas",this),this.canvas=e.createElement("span"),n(this.canvas).css({display:"inline-block",position:"relative",overflow:"hidden",width:t,height:l,margin:"0px",padding:"0px",verticalAlign:"top"}),this._insert(this.canvas,i),this._calculatePixelDims(t,l,this.canvas),this.canvas.width=this.pixelWidth,this.canvas.height=this.pixelHeight,a='<v:group coordorigin="0 0" coordsize="'+this.pixelWidth+" "+this.pixelHeight+'"'+' style="position:absolute;top:0;left:0;width:'+this.pixelWidth+"px;height="+this.pixelHeight+'px;"></v:group>',this.canvas.insertAdjacentHTML("beforeEnd",a),this.group=n(this.canvas).children()[0],this.rendered=!1,this.prerender=""},_drawShape:function(e,t,n,i,a){var o,r,s,c,u,d,h,f=[];for(h=0,d=t.length;d>h;h++)f[h]=""+t[h][0]+","+t[h][1];return o=f.splice(0,1),a=a===l?1:a,r=n===l?' stroked="false" ':' strokeWeight="'+a+'px" strokeColor="'+n+'" ',s=i===l?' filled="false"':' fillColor="'+i+'" filled="true" ',c=f[0]===f[f.length-1]?"x ":"",u='<v:shape coordorigin="0 0" coordsize="'+this.pixelWidth+" "+this.pixelHeight+'" '+' id="jqsshape'+e+'" '+r+s+' style="position:absolute;left:0px;top:0px;height:'+this.pixelHeight+"px;width:"+this.pixelWidth+'px;padding:0px;margin:0px;" '+' path="m '+o+" l "+f.join(", ")+" "+c+'e">'+" </v:shape>"},_drawCircle:function(e,t,n,i,a,o,r){var s,c,u;return t-=i,n-=i,s=a===l?' stroked="false" ':' strokeWeight="'+r+'px" strokeColor="'+a+'" ',c=o===l?' filled="false"':' fillColor="'+o+'" filled="true" ',u='<v:oval  id="jqsshape'+e+'" '+s+c+' style="position:absolute;top:'+n+"px; left:"+t+"px; width:"+2*i+"px; height:"+2*i+'px"></v:oval>'},_drawPieSlice:function(e,n,i,a,o,r,s,c){var u,d,h,f,p,m,g,v;if(o===r)return"";if(r-o===2*t.PI&&(o=0,r=2*t.PI),d=n+t.round(t.cos(o)*a),h=i+t.round(t.sin(o)*a),f=n+t.round(t.cos(r)*a),p=i+t.round(t.sin(r)*a),d===f&&h===p){if(r-o<t.PI)return"";d=f=n+a,h=p=i}return d===f&&h===p&&r-o<t.PI?"":(u=[n-a,i-a,n+a,i+a,d,h,f,p],m=s===l?' stroked="false" ':' strokeWeight="1px" strokeColor="'+s+'" ',g=c===l?' filled="false"':' fillColor="'+c+'" filled="true" ',v='<v:shape coordorigin="0 0" coordsize="'+this.pixelWidth+" "+this.pixelHeight+'" '+' id="jqsshape'+e+'" '+m+g+' style="position:absolute;left:0px;top:0px;height:'+this.pixelHeight+"px;width:"+this.pixelWidth+'px;padding:0px;margin:0px;" '+' path="m '+n+","+i+" wa "+u.join(", ")+' x e">'+" </v:shape>")},_drawRect:function(e,t,l,n,i,a,o){return this._drawShape(e,[[t,l],[t,l+i],[t+n,l+i],[t+n,l],[t,l]],a,o)},reset:function(){this.group.innerHTML=""},appendShape:function(e){var t=this["_draw"+e.type].apply(this,e.args);return this.rendered?this.group.insertAdjacentHTML("beforeEnd",t):this.prerender+=t,this.lastShapeId=e.id,e.id},replaceWithShape:function(e,t){var l=n("#jqsshape"+e),i=this["_draw"+t.type].apply(this,t.args);l[0].outerHTML=i},replaceWithShapes:function(e,t){var l,i=n("#jqsshape"+e[0]),a="",o=t.length;for(l=0;o>l;l++)a+=this["_draw"+t[l].type].apply(this,t[l].args);for(i[0].outerHTML=a,l=1;l<e.length;l++)n("#jqsshape"+e[l]).remove()},insertAfterShape:function(e,t){var l=n("#jqsshape"+e),i=this["_draw"+t.type].apply(this,t.args);l[0].insertAdjacentHTML("afterEnd",i)},removeShapeId:function(e){var t=n("#jqsshape"+e);this.group.removeChild(t[0])},getShapeAt:function(e){var t=e.id.substr(8);return t},render:function(){this.rendered||(this.group.innerHTML=this.prerender,this.rendered=!0)}})})}(document,Math);
(function(global) {
  "use strict";

  /* Set up a RequestAnimationFrame shim so we can animate efficiently FOR
   * GREAT JUSTICE. */
  var requestInterval, cancelInterval;

  (function() {
    var raf = global.requestAnimationFrame       ||
              global.webkitRequestAnimationFrame ||
              global.mozRequestAnimationFrame    ||
              global.oRequestAnimationFrame      ||
              global.msRequestAnimationFrame     ,
        caf = global.cancelAnimationFrame        ||
              global.webkitCancelAnimationFrame  ||
              global.mozCancelAnimationFrame     ||
              global.oCancelAnimationFrame       ||
              global.msCancelAnimationFrame      ;

    if(raf && caf) {
      requestInterval = function(fn, delay) {
        var handle = {value: null};

        function loop() {
          handle.value = raf(loop);
          fn();
        }

        loop();
        return handle;
      };

      cancelInterval = function(handle) {
        caf(handle.value);
      };
    }

    else {
      requestInterval = setInterval;
      cancelInterval = clearInterval;
    }
  }());

  /* Catmull-rom spline stuffs. */
  /*
  function upsample(n, spline) {
    var polyline = [],
        len = spline.length,
        bx  = spline[0],
        by  = spline[1],
        cx  = spline[2],
        cy  = spline[3],
        dx  = spline[4],
        dy  = spline[5],
        i, j, ax, ay, px, qx, rx, sx, py, qy, ry, sy, t;

    for(i = 6; i !== spline.length; i += 2) {
      ax = bx;
      bx = cx;
      cx = dx;
      dx = spline[i    ];
      px = -0.5 * ax + 1.5 * bx - 1.5 * cx + 0.5 * dx;
      qx =        ax - 2.5 * bx + 2.0 * cx - 0.5 * dx;
      rx = -0.5 * ax            + 0.5 * cx           ;
      sx =                   bx                      ;

      ay = by;
      by = cy;
      cy = dy;
      dy = spline[i + 1];
      py = -0.5 * ay + 1.5 * by - 1.5 * cy + 0.5 * dy;
      qy =        ay - 2.5 * by + 2.0 * cy - 0.5 * dy;
      ry = -0.5 * ay            + 0.5 * cy           ;
      sy =                   by                      ;

      for(j = 0; j !== n; ++j) {
        t = j / n;

        polyline.push(
          ((px * t + qx) * t + rx) * t + sx,
          ((py * t + qy) * t + ry) * t + sy
        );
      }
    }

    polyline.push(
      px + qx + rx + sx,
      py + qy + ry + sy
    );

    return polyline;
  }

  function downsample(n, polyline) {
    var len = 0,
        i, dx, dy;

    for(i = 2; i !== polyline.length; i += 2) {
      dx = polyline[i    ] - polyline[i - 2];
      dy = polyline[i + 1] - polyline[i - 1];
      len += Math.sqrt(dx * dx + dy * dy);
    }

    len /= n;

    var small = [],
        target = len,
        min = 0,
        max, t;

    small.push(polyline[0], polyline[1]);

    for(i = 2; i !== polyline.length; i += 2) {
      dx = polyline[i    ] - polyline[i - 2];
      dy = polyline[i + 1] - polyline[i - 1];
      max = min + Math.sqrt(dx * dx + dy * dy);

      if(max > target) {
        t = (target - min) / (max - min);

        small.push(
          polyline[i - 2] + dx * t,
          polyline[i - 1] + dy * t
        );

        target += len;
      }

      min = max;
    }

    small.push(polyline[polyline.length - 2], polyline[polyline.length - 1]);

    return small;
  }
  */

  /* Define skycon things. */
  /* FIXME: I'm *really really* sorry that this code is so gross. Really, I am.
   * I'll try to clean it up eventually! Promise! */
  var KEYFRAME = 500,
      STROKE = 0.08,
      TAU = 2.0 * Math.PI,
      TWO_OVER_SQRT_2 = 2.0 / Math.sqrt(2);

  function circle(ctx, x, y, r) {
    ctx.beginPath();
    ctx.arc(x, y, r, 0, TAU, false);
    ctx.fill();
  }

  function line(ctx, ax, ay, bx, by) {
    ctx.beginPath();
    ctx.moveTo(ax, ay);
    ctx.lineTo(bx, by);
    ctx.stroke();
  }

  function puff(ctx, t, cx, cy, rx, ry, rmin, rmax) {
    var c = Math.cos(t * TAU),
        s = Math.sin(t * TAU);

    rmax -= rmin;

    circle(
      ctx,
      cx - s * rx,
      cy + c * ry + rmax * 0.5,
      rmin + (1 - c * 0.5) * rmax
    );
  }

  function puffs(ctx, t, cx, cy, rx, ry, rmin, rmax) {
    var i;

    for(i = 5; i--; )
      puff(ctx, t + i / 5, cx, cy, rx, ry, rmin, rmax);
  }

  function cloud(ctx, t, cx, cy, cw, s, color) {
    t /= 30000;

    var a = cw * 0.21,
        b = cw * 0.12,
        c = cw * 0.24,
        d = cw * 0.28;

    ctx.fillStyle = color;
    puffs(ctx, t, cx, cy, a, b, c, d);

    ctx.globalCompositeOperation = 'destination-out';
    puffs(ctx, t, cx, cy, a, b, c - s, d - s);
    ctx.globalCompositeOperation = 'source-over';
  }

  function sun(ctx, t, cx, cy, cw, s, color) {
    t /= 120000;

    var a = cw * 0.25 - s * 0.5,
        b = cw * 0.32 + s * 0.5,
        c = cw * 0.50 - s * 0.5,
        i, p, cos, sin;

    ctx.strokeStyle = color;
    ctx.lineWidth = s;
    ctx.lineCap = "round";
    ctx.lineJoin = "round";

    ctx.beginPath();
    ctx.arc(cx, cy, a, 0, TAU, false);
    ctx.stroke();

    for(i = 8; i--; ) {
      p = (t + i / 8) * TAU;
      cos = Math.cos(p);
      sin = Math.sin(p);
      line(ctx, cx + cos * b, cy + sin * b, cx + cos * c, cy + sin * c);
    }
  }

  function moon(ctx, t, cx, cy, cw, s, color) {
    t /= 15000;

    var a = cw * 0.29 - s * 0.5,
        b = cw * 0.05,
        c = Math.cos(t * TAU),
        p = c * TAU / -16;

    ctx.strokeStyle = color;
    ctx.lineWidth = s;
    ctx.lineCap = "round";
    ctx.lineJoin = "round";

    cx += c * b;

    ctx.beginPath();
    ctx.arc(cx, cy, a, p + TAU / 8, p + TAU * 7 / 8, false);
    ctx.arc(cx + Math.cos(p) * a * TWO_OVER_SQRT_2, cy + Math.sin(p) * a * TWO_OVER_SQRT_2, a, p + TAU * 5 / 8, p + TAU * 3 / 8, true);
    ctx.closePath();
    ctx.stroke();
  }

  function rain(ctx, t, cx, cy, cw, s, color) {
    t /= 1350;

    var a = cw * 0.16,
        b = TAU * 11 / 12,
        c = TAU *  7 / 12,
        i, p, x, y;

    ctx.fillStyle = color;

    for(i = 4; i--; ) {
      p = (t + i / 4) % 1;
      x = cx + ((i - 1.5) / 1.5) * (i === 1 || i === 2 ? -1 : 1) * a;
      y = cy + p * p * cw;
      ctx.beginPath();
      ctx.moveTo(x, y - s * 1.5);
      ctx.arc(x, y, s * 0.75, b, c, false);
      ctx.fill();
    }
  }

  function sleet(ctx, t, cx, cy, cw, s, color) {
    t /= 750;

    var a = cw * 0.1875,
        b = TAU * 11 / 12,
        c = TAU *  7 / 12,
        i, p, x, y;

    ctx.strokeStyle = color;
    ctx.lineWidth = s * 0.5;
    ctx.lineCap = "round";
    ctx.lineJoin = "round";

    for(i = 4; i--; ) {
      p = (t + i / 4) % 1;
      x = Math.floor(cx + ((i - 1.5) / 1.5) * (i === 1 || i === 2 ? -1 : 1) * a) + 0.5;
      y = cy + p * cw;
      line(ctx, x, y - s * 1.5, x, y + s * 1.5);
    }
  }

  function snow(ctx, t, cx, cy, cw, s, color) {
    t /= 3000;

    var a  = cw * 0.16,
        b  = s * 0.75,
        u  = t * TAU * 0.7,
        ux = Math.cos(u) * b,
        uy = Math.sin(u) * b,
        v  = u + TAU / 3,
        vx = Math.cos(v) * b,
        vy = Math.sin(v) * b,
        w  = u + TAU * 2 / 3,
        wx = Math.cos(w) * b,
        wy = Math.sin(w) * b,
        i, p, x, y;

    ctx.strokeStyle = color;
    ctx.lineWidth = s * 0.5;
    ctx.lineCap = "round";
    ctx.lineJoin = "round";

    for(i = 4; i--; ) {
      p = (t + i / 4) % 1;
      x = cx + Math.sin((p + i / 4) * TAU) * a;
      y = cy + p * cw;

      line(ctx, x - ux, y - uy, x + ux, y + uy);
      line(ctx, x - vx, y - vy, x + vx, y + vy);
      line(ctx, x - wx, y - wy, x + wx, y + wy);
    }
  }

  function fogbank(ctx, t, cx, cy, cw, s, color) {
    t /= 30000;

    var a = cw * 0.21,
        b = cw * 0.06,
        c = cw * 0.21,
        d = cw * 0.28;

    ctx.fillStyle = color;
    puffs(ctx, t, cx, cy, a, b, c, d);

    ctx.globalCompositeOperation = 'destination-out';
    puffs(ctx, t, cx, cy, a, b, c - s, d - s);
    ctx.globalCompositeOperation = 'source-over';
  }

  /*
  var WIND_PATHS = [
        downsample(63, upsample(8, [
          -1.00, -0.28,
          -0.75, -0.18,
          -0.50,  0.12,
          -0.20,  0.12,
          -0.04, -0.04,
          -0.07, -0.18,
          -0.19, -0.18,
          -0.23, -0.05,
          -0.12,  0.11,
           0.02,  0.16,
           0.20,  0.15,
           0.50,  0.07,
           0.75,  0.18,
           1.00,  0.28
        ])),
        downsample(31, upsample(16, [
          -1.00, -0.10,
          -0.75,  0.00,
          -0.50,  0.10,
          -0.25,  0.14,
           0.00,  0.10,
           0.25,  0.00,
           0.50, -0.10,
           0.75, -0.14,
           1.00, -0.10
        ]))
      ];
  */

  var WIND_PATHS = [
        [
          -0.7500, -0.1800, -0.7219, -0.1527, -0.6971, -0.1225,
          -0.6739, -0.0910, -0.6516, -0.0588, -0.6298, -0.0262,
          -0.6083,  0.0065, -0.5868,  0.0396, -0.5643,  0.0731,
          -0.5372,  0.1041, -0.5033,  0.1259, -0.4662,  0.1406,
          -0.4275,  0.1493, -0.3881,  0.1530, -0.3487,  0.1526,
          -0.3095,  0.1488, -0.2708,  0.1421, -0.2319,  0.1342,
          -0.1943,  0.1217, -0.1600,  0.1025, -0.1290,  0.0785,
          -0.1012,  0.0509, -0.0764,  0.0206, -0.0547, -0.0120,
          -0.0378, -0.0472, -0.0324, -0.0857, -0.0389, -0.1241,
          -0.0546, -0.1599, -0.0814, -0.1876, -0.1193, -0.1964,
          -0.1582, -0.1935, -0.1931, -0.1769, -0.2157, -0.1453,
          -0.2290, -0.1085, -0.2327, -0.0697, -0.2240, -0.0317,
          -0.2064,  0.0033, -0.1853,  0.0362, -0.1613,  0.0672,
          -0.1350,  0.0961, -0.1051,  0.1213, -0.0706,  0.1397,
          -0.0332,  0.1512,  0.0053,  0.1580,  0.0442,  0.1624,
           0.0833,  0.1636,  0.1224,  0.1615,  0.1613,  0.1565,
           0.1999,  0.1500,  0.2378,  0.1402,  0.2749,  0.1279,
           0.3118,  0.1147,  0.3487,  0.1015,  0.3858,  0.0892,
           0.4236,  0.0787,  0.4621,  0.0715,  0.5012,  0.0702,
           0.5398,  0.0766,  0.5768,  0.0890,  0.6123,  0.1055,
           0.6466,  0.1244,  0.6805,  0.1440,  0.7147,  0.1630,
           0.7500,  0.1800
        ],
        [
          -0.7500,  0.0000, -0.7033,  0.0195, -0.6569,  0.0399,
          -0.6104,  0.0600, -0.5634,  0.0789, -0.5155,  0.0954,
          -0.4667,  0.1089, -0.4174,  0.1206, -0.3676,  0.1299,
          -0.3174,  0.1365, -0.2669,  0.1398, -0.2162,  0.1391,
          -0.1658,  0.1347, -0.1157,  0.1271, -0.0661,  0.1169,
          -0.0170,  0.1046,  0.0316,  0.0903,  0.0791,  0.0728,
           0.1259,  0.0534,  0.1723,  0.0331,  0.2188,  0.0129,
           0.2656, -0.0064,  0.3122, -0.0263,  0.3586, -0.0466,
           0.4052, -0.0665,  0.4525, -0.0847,  0.5007, -0.1002,
           0.5497, -0.1130,  0.5991, -0.1240,  0.6491, -0.1325,
           0.6994, -0.1380,  0.7500, -0.1400
        ]
      ],
      WIND_OFFSETS = [
        {start: 0.36, end: 0.11},
        {start: 0.56, end: 0.16}
      ];

  function leaf(ctx, t, x, y, cw, s, color) {
    var a = cw / 8,
        b = a / 3,
        c = 2 * b,
        d = (t % 1) * TAU,
        e = Math.cos(d),
        f = Math.sin(d);

    ctx.fillStyle = color;
    ctx.strokeStyle = color;
    ctx.lineWidth = s;
    ctx.lineCap = "round";
    ctx.lineJoin = "round";

    ctx.beginPath();
    ctx.arc(x        , y        , a, d          , d + Math.PI, false);
    ctx.arc(x - b * e, y - b * f, c, d + Math.PI, d          , false);
    ctx.arc(x + c * e, y + c * f, b, d + Math.PI, d          , true );
    ctx.globalCompositeOperation = 'destination-out';
    ctx.fill();
    ctx.globalCompositeOperation = 'source-over';
    ctx.stroke();
  }

  function swoosh(ctx, t, cx, cy, cw, s, index, total, color) {
    t /= 2500;

    var path = WIND_PATHS[index],
        a = (t + index - WIND_OFFSETS[index].start) % total,
        c = (t + index - WIND_OFFSETS[index].end  ) % total,
        e = (t + index                            ) % total,
        b, d, f, i;

    ctx.strokeStyle = color;
    ctx.lineWidth = s;
    ctx.lineCap = "round";
    ctx.lineJoin = "round";

    if(a < 1) {
      ctx.beginPath();

      a *= path.length / 2 - 1;
      b  = Math.floor(a);
      a -= b;
      b *= 2;
      b += 2;

      ctx.moveTo(
        cx + (path[b - 2] * (1 - a) + path[b    ] * a) * cw,
        cy + (path[b - 1] * (1 - a) + path[b + 1] * a) * cw
      );

      if(c < 1) {
        c *= path.length / 2 - 1;
        d  = Math.floor(c);
        c -= d;
        d *= 2;
        d += 2;

        for(i = b; i !== d; i += 2)
          ctx.lineTo(cx + path[i] * cw, cy + path[i + 1] * cw);

        ctx.lineTo(
          cx + (path[d - 2] * (1 - c) + path[d    ] * c) * cw,
          cy + (path[d - 1] * (1 - c) + path[d + 1] * c) * cw
        );
      }

      else
        for(i = b; i !== path.length; i += 2)
          ctx.lineTo(cx + path[i] * cw, cy + path[i + 1] * cw);

      ctx.stroke();
    }

    else if(c < 1) {
      ctx.beginPath();

      c *= path.length / 2 - 1;
      d  = Math.floor(c);
      c -= d;
      d *= 2;
      d += 2;

      ctx.moveTo(cx + path[0] * cw, cy + path[1] * cw);

      for(i = 2; i !== d; i += 2)
        ctx.lineTo(cx + path[i] * cw, cy + path[i + 1] * cw);

      ctx.lineTo(
        cx + (path[d - 2] * (1 - c) + path[d    ] * c) * cw,
        cy + (path[d - 1] * (1 - c) + path[d + 1] * c) * cw
      );

      ctx.stroke();
    }

    if(e < 1) {
      e *= path.length / 2 - 1;
      f  = Math.floor(e);
      e -= f;
      f *= 2;
      f += 2;

      leaf(
        ctx,
        t,
        cx + (path[f - 2] * (1 - e) + path[f    ] * e) * cw,
        cy + (path[f - 1] * (1 - e) + path[f + 1] * e) * cw,
        cw,
        s,
        color
      );
    }
  }

  var Skycons = function(opts) {
        this.list        = [];
        this.interval    = null;
        this.color       = opts && opts.color ? opts.color : "black";
        this.resizeClear = !!(opts && opts.resizeClear);
      };

  Skycons.CLEAR_DAY = function(ctx, t, color) {
    var w = ctx.canvas.width,
        h = ctx.canvas.height,
        s = Math.min(w, h);

    sun(ctx, t, w * 0.5, h * 0.5, s, s * STROKE, color);
  };

  Skycons.CLEAR_NIGHT = function(ctx, t, color) {
    var w = ctx.canvas.width,
        h = ctx.canvas.height,
        s = Math.min(w, h);

    moon(ctx, t, w * 0.5, h * 0.5, s, s * STROKE, color);
  };

  Skycons.PARTLY_CLOUDY_DAY = function(ctx, t, color) {
    var w = ctx.canvas.width,
        h = ctx.canvas.height,
        s = Math.min(w, h);

    sun(ctx, t, w * 0.625, h * 0.375, s * 0.75, s * STROKE, color);
    cloud(ctx, t, w * 0.375, h * 0.625, s * 0.75, s * STROKE, color);
  };

  Skycons.PARTLY_CLOUDY_NIGHT = function(ctx, t, color) {
    var w = ctx.canvas.width,
        h = ctx.canvas.height,
        s = Math.min(w, h);

    moon(ctx, t, w * 0.667, h * 0.375, s * 0.75, s * STROKE, color);
    cloud(ctx, t, w * 0.375, h * 0.625, s * 0.75, s * STROKE, color);
  };

  Skycons.CLOUDY = function(ctx, t, color) {
    var w = ctx.canvas.width,
        h = ctx.canvas.height,
        s = Math.min(w, h);

    cloud(ctx, t, w * 0.5, h * 0.5, s, s * STROKE, color);
  };

  Skycons.RAIN = function(ctx, t, color) {
    var w = ctx.canvas.width,
        h = ctx.canvas.height,
        s = Math.min(w, h);

    rain(ctx, t, w * 0.5, h * 0.37, s * 0.9, s * STROKE, color);
    cloud(ctx, t, w * 0.5, h * 0.37, s * 0.9, s * STROKE, color);
  };

  Skycons.SLEET = function(ctx, t, color) {
    var w = ctx.canvas.width,
        h = ctx.canvas.height,
        s = Math.min(w, h);

    sleet(ctx, t, w * 0.5, h * 0.37, s * 0.9, s * STROKE, color);
    cloud(ctx, t, w * 0.5, h * 0.37, s * 0.9, s * STROKE, color);
  };

  Skycons.SNOW = function(ctx, t, color) {
    var w = ctx.canvas.width,
        h = ctx.canvas.height,
        s = Math.min(w, h);

    snow(ctx, t, w * 0.5, h * 0.37, s * 0.9, s * STROKE, color);
    cloud(ctx, t, w * 0.5, h * 0.37, s * 0.9, s * STROKE, color);
  };

  Skycons.WIND = function(ctx, t, color) {
    var w = ctx.canvas.width,
        h = ctx.canvas.height,
        s = Math.min(w, h);

    swoosh(ctx, t, w * 0.5, h * 0.5, s, s * STROKE, 0, 2, color);
    swoosh(ctx, t, w * 0.5, h * 0.5, s, s * STROKE, 1, 2, color);
  };

  Skycons.FOG = function(ctx, t, color) {
    var w = ctx.canvas.width,
        h = ctx.canvas.height,
        s = Math.min(w, h),
        k = s * STROKE;

    fogbank(ctx, t, w * 0.5, h * 0.32, s * 0.75, k, color);

    t /= 5000;

    var a = Math.cos((t       ) * TAU) * s * 0.02,
        b = Math.cos((t + 0.25) * TAU) * s * 0.02,
        c = Math.cos((t + 0.50) * TAU) * s * 0.02,
        d = Math.cos((t + 0.75) * TAU) * s * 0.02,
        n = h * 0.936,
        e = Math.floor(n - k * 0.5) + 0.5,
        f = Math.floor(n - k * 2.5) + 0.5;

    ctx.strokeStyle = color;
    ctx.lineWidth = k;
    ctx.lineCap = "round";
    ctx.lineJoin = "round";

    line(ctx, a + w * 0.2 + k * 0.5, e, b + w * 0.8 - k * 0.5, e);
    line(ctx, c + w * 0.2 + k * 0.5, f, d + w * 0.8 - k * 0.5, f);
  };

  Skycons.prototype = {
    _determineDrawingFunction: function(draw) {
      if(typeof draw === "string")
        draw = Skycons[draw.toUpperCase().replace(/-/g, "_")] || null;

      return draw;
    },
    add: function(el, draw) {
      var obj;

      if(typeof el === "string")
        el = document.getElementById(el);

      // Does nothing if canvas name doesn't exists
      if(el === null)
        return;

      draw = this._determineDrawingFunction(draw);

      // Does nothing if the draw function isn't actually a function
      if(typeof draw !== "function")
        return;

      obj = {
        element: el,
        context: el.getContext("2d"),
        drawing: draw
      };

      this.list.push(obj);
      this.draw(obj, KEYFRAME);
    },
    set: function(el, draw) {
      var i;

      if(typeof el === "string")
        el = document.getElementById(el);

      for(i = this.list.length; i--; )
        if(this.list[i].element === el) {
          this.list[i].drawing = this._determineDrawingFunction(draw);
          this.draw(this.list[i], KEYFRAME);
          return;
        }

      this.add(el, draw);
    },
    remove: function(el) {
      var i;

      if(typeof el === "string")
        el = document.getElementById(el);

      for(i = this.list.length; i--; )
        if(this.list[i].element === el) {
          this.list.splice(i, 1);
          return;
        }
    },
    draw: function(obj, time) {
      var canvas = obj.context.canvas;

      if(this.resizeClear)
        canvas.width = canvas.width;

      else
        obj.context.clearRect(0, 0, canvas.width, canvas.height);

      obj.drawing(obj.context, time, this.color);
    },
    play: function() {
      var self = this;

      this.pause();
      this.interval = requestInterval(function() {
        var now = Date.now(),
            i;

        for(i = self.list.length; i--; )
          self.draw(self.list[i], now);
      }, 1000 / 60);
    },
    pause: function() {
      var i;

      if(this.interval) {
        cancelInterval(this.interval);
        this.interval = null;
      }
    }
  };

  global.Skycons = Skycons;
}(this));

/* =========================================================
 * bootstrap-datepicker.js
 * Repo: https://github.com/eternicode/bootstrap-datepicker/
 * Demo: http://eternicode.github.io/bootstrap-datepicker/
 * Docs: http://bootstrap-datepicker.readthedocs.org/
 * Forked from http://www.eyecon.ro/bootstrap-datepicker
 * =========================================================
 * Started by Stefan Petre; improvements by Andrew Rowls + contributors
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ========================================================= */

(function($, undefined){

	var $window = $(window);

	function UTCDate(){
		return new Date(Date.UTC.apply(Date, arguments));
	}
	function UTCToday(){
		var today = new Date();
		return UTCDate(today.getFullYear(), today.getMonth(), today.getDate());
	}
	function alias(method){
		return function(){
			return this[method].apply(this, arguments);
		};
	}

	var DateArray = (function(){
		var extras = {
			get: function(i){
				return this.slice(i)[0];
			},
			contains: function(d){
				// Array.indexOf is not cross-browser;
				// $.inArray doesn't work with Dates
				var val = d && d.valueOf();
				for (var i=0, l=this.length; i < l; i++)
					if (this[i].valueOf() === val)
						return i;
				return -1;
			},
			remove: function(i){
				this.splice(i,1);
			},
			replace: function(new_array){
				if (!new_array)
					return;
				if (!$.isArray(new_array))
					new_array = [new_array];
				this.clear();
				this.push.apply(this, new_array);
			},
			clear: function(){
				this.length = 0;
			},
			copy: function(){
				var a = new DateArray();
				a.replace(this);
				return a;
			}
		};

		return function(){
			var a = [];
			a.push.apply(a, arguments);
			$.extend(a, extras);
			return a;
		};
	})();


	// Picker object

	var Datepicker = function(element, options){
		this.dates = new DateArray();
		this.viewDate = UTCToday();
		this.focusDate = null;

		this._process_options(options);

		this.element = $(element);
		this.isInline = false;
		this.isInput = this.element.is('input');
		this.component = this.element.is('.date') ? this.element.find('.add-on, .input-group-addon, .btn') : false;
		this.hasInput = this.component && this.element.find('input').length;
		if (this.component && this.component.length === 0)
			this.component = false;

		this.picker = $(DPGlobal.template);
		this._buildEvents();
		this._attachEvents();

		if (this.isInline){
			this.picker.addClass('datepicker-inline').appendTo(this.element);
		}
		else {
			this.picker.addClass('datepicker-dropdown dropdown-menu');
		}

		if (this.o.rtl){
			this.picker.addClass('datepicker-rtl');
		}

		this.viewMode = this.o.startView;

		if (this.o.calendarWeeks)
			this.picker.find('tfoot th.today')
						.attr('colspan', function(i, val){
							return parseInt(val) + 1;
						});

		this._allow_update = false;

		this.setStartDate(this._o.startDate);
		this.setEndDate(this._o.endDate);
		this.setDaysOfWeekDisabled(this.o.daysOfWeekDisabled);

		this.fillDow();
		this.fillMonths();

		this._allow_update = true;

		this.update();
		this.showMode();

		if (this.isInline){
			this.show();
		}
	};

	Datepicker.prototype = {
		constructor: Datepicker,

		_process_options: function(opts){
			// Store raw options for reference
			this._o = $.extend({}, this._o, opts);
			// Processed options
			var o = this.o = $.extend({}, this._o);

			// Check if "de-DE" style date is available, if not language should
			// fallback to 2 letter code eg "de"
			var lang = o.language;
			if (!dates[lang]){
				lang = lang.split('-')[0];
				if (!dates[lang])
					lang = defaults.language;
			}
			o.language = lang;

			switch (o.startView){
				case 2:
				case 'decade':
					o.startView = 2;
					break;
				case 1:
				case 'year':
					o.startView = 1;
					break;
				default:
					o.startView = 0;
			}

			switch (o.minViewMode){
				case 1:
				case 'months':
					o.minViewMode = 1;
					break;
				case 2:
				case 'years':
					o.minViewMode = 2;
					break;
				default:
					o.minViewMode = 0;
			}

			o.startView = Math.max(o.startView, o.minViewMode);

			// true, false, or Number > 0
			if (o.multidate !== true){
				o.multidate = Number(o.multidate) || false;
				if (o.multidate !== false)
					o.multidate = Math.max(0, o.multidate);
				else
					o.multidate = 1;
			}
			o.multidateSeparator = String(o.multidateSeparator);

			o.weekStart %= 7;
			o.weekEnd = ((o.weekStart + 6) % 7);

			var format = DPGlobal.parseFormat(o.format);
			if (o.startDate !== -Infinity){
				if (!!o.startDate){
					if (o.startDate instanceof Date)
						o.startDate = this._local_to_utc(this._zero_time(o.startDate));
					else
						o.startDate = DPGlobal.parseDate(o.startDate, format, o.language);
				}
				else {
					o.startDate = -Infinity;
				}
			}
			if (o.endDate !== Infinity){
				if (!!o.endDate){
					if (o.endDate instanceof Date)
						o.endDate = this._local_to_utc(this._zero_time(o.endDate));
					else
						o.endDate = DPGlobal.parseDate(o.endDate, format, o.language);
				}
				else {
					o.endDate = Infinity;
				}
			}

			o.daysOfWeekDisabled = o.daysOfWeekDisabled||[];
			if (!$.isArray(o.daysOfWeekDisabled))
				o.daysOfWeekDisabled = o.daysOfWeekDisabled.split(/[,\s]*/);
			o.daysOfWeekDisabled = $.map(o.daysOfWeekDisabled, function(d){
				return parseInt(d, 10);
			});

			var plc = String(o.orientation).toLowerCase().split(/\s+/g),
				_plc = o.orientation.toLowerCase();
			plc = $.grep(plc, function(word){
				return (/^auto|left|right|top|bottom$/).test(word);
			});
			o.orientation = {x: 'auto', y: 'auto'};
			if (!_plc || _plc === 'auto')
				; // no action
			else if (plc.length === 1){
				switch (plc[0]){
					case 'top':
					case 'bottom':
						o.orientation.y = plc[0];
						break;
					case 'left':
					case 'right':
						o.orientation.x = plc[0];
						break;
				}
			}
			else {
				_plc = $.grep(plc, function(word){
					return (/^left|right$/).test(word);
				});
				o.orientation.x = _plc[0] || 'auto';

				_plc = $.grep(plc, function(word){
					return (/^top|bottom$/).test(word);
				});
				o.orientation.y = _plc[0] || 'auto';
			}
		},
		_events: [],
		_secondaryEvents: [],
		_applyEvents: function(evs){
			for (var i=0, el, ch, ev; i < evs.length; i++){
				el = evs[i][0];
				if (evs[i].length === 2){
					ch = undefined;
					ev = evs[i][1];
				}
				else if (evs[i].length === 3){
					ch = evs[i][1];
					ev = evs[i][2];
				}
				el.on(ev, ch);
			}
		},
		_unapplyEvents: function(evs){
			for (var i=0, el, ev, ch; i < evs.length; i++){
				el = evs[i][0];
				if (evs[i].length === 2){
					ch = undefined;
					ev = evs[i][1];
				}
				else if (evs[i].length === 3){
					ch = evs[i][1];
					ev = evs[i][2];
				}
				el.off(ev, ch);
			}
		},
		_buildEvents: function(){
			if (this.isInput){ // single input
				this._events = [
					[this.element, {
						focus: $.proxy(this.show, this),
						keyup: $.proxy(function(e){
							if ($.inArray(e.keyCode, [27,37,39,38,40,32,13,9]) === -1)
								this.update();
						}, this),
						keydown: $.proxy(this.keydown, this)
					}]
				];
			}
			else if (this.component && this.hasInput){ // component: input + button
				this._events = [
					// For components that are not readonly, allow keyboard nav
					[this.element.find('input'), {
						focus: $.proxy(this.show, this),
						keyup: $.proxy(function(e){
							if ($.inArray(e.keyCode, [27,37,39,38,40,32,13,9]) === -1)
								this.update();
						}, this),
						keydown: $.proxy(this.keydown, this)
					}],
					[this.component, {
						click: $.proxy(this.show, this)
					}]
				];
			}
			else if (this.element.is('div')){  // inline datepicker
				this.isInline = true;
			}
			else {
				this._events = [
					[this.element, {
						click: $.proxy(this.show, this)
					}]
				];
			}
			this._events.push(
				// Component: listen for blur on element descendants
				[this.element, '*', {
					blur: $.proxy(function(e){
						this._focused_from = e.target;
					}, this)
				}],
				// Input: listen for blur on element
				[this.element, {
					blur: $.proxy(function(e){
						this._focused_from = e.target;
					}, this)
				}]
			);

			this._secondaryEvents = [
				[this.picker, {
					click: $.proxy(this.click, this)
				}],
				[$(window), {
					resize: $.proxy(this.place, this)
				}],
				[$(document), {
					'mousedown touchstart': $.proxy(function(e){
						// Clicked outside the datepicker, hide it
						if (!(
							this.element.is(e.target) ||
							this.element.find(e.target).length ||
							this.picker.is(e.target) ||
							this.picker.find(e.target).length
						)){
							this.hide();
						}
					}, this)
				}]
			];
		},
		_attachEvents: function(){
			this._detachEvents();
			this._applyEvents(this._events);
		},
		_detachEvents: function(){
			this._unapplyEvents(this._events);
		},
		_attachSecondaryEvents: function(){
			this._detachSecondaryEvents();
			this._applyEvents(this._secondaryEvents);
		},
		_detachSecondaryEvents: function(){
			this._unapplyEvents(this._secondaryEvents);
		},
		_trigger: function(event, altdate){
			var date = altdate || this.dates.get(-1),
				local_date = this._utc_to_local(date);

			this.element.trigger({
				type: event,
				date: local_date,
				dates: $.map(this.dates, this._utc_to_local),
				format: $.proxy(function(ix, format){
					if (arguments.length === 0){
						ix = this.dates.length - 1;
						format = this.o.format;
					}
					else if (typeof ix === 'string'){
						format = ix;
						ix = this.dates.length - 1;
					}
					format = format || this.o.format;
					var date = this.dates.get(ix);
					return DPGlobal.formatDate(date, format, this.o.language);
				}, this)
			});
		},

		show: function(){
			if (!this.isInline)
				this.picker.appendTo('body');
			this.picker.show();
			this.place();
			this._attachSecondaryEvents();
			this._trigger('show');
		},

		hide: function(){
			if (this.isInline)
				return;
			if (!this.picker.is(':visible'))
				return;
			this.focusDate = null;
			this.picker.hide().detach();
			this._detachSecondaryEvents();
			this.viewMode = this.o.startView;
			this.showMode();

			if (
				this.o.forceParse &&
				(
					this.isInput && this.element.val() ||
					this.hasInput && this.element.find('input').val()
				)
			)
				this.setValue();
			this._trigger('hide');
		},

		remove: function(){
			this.hide();
			this._detachEvents();
			this._detachSecondaryEvents();
			this.picker.remove();
			delete this.element.data().datepicker;
			if (!this.isInput){
				delete this.element.data().date;
			}
		},

		_utc_to_local: function(utc){
			return utc && new Date(utc.getTime() + (utc.getTimezoneOffset()*60000));
		},
		_local_to_utc: function(local){
			return local && new Date(local.getTime() - (local.getTimezoneOffset()*60000));
		},
		_zero_time: function(local){
			return local && new Date(local.getFullYear(), local.getMonth(), local.getDate());
		},
		_zero_utc_time: function(utc){
			return utc && new Date(Date.UTC(utc.getUTCFullYear(), utc.getUTCMonth(), utc.getUTCDate()));
		},

		getDates: function(){
			return $.map(this.dates, this._utc_to_local);
		},

		getUTCDates: function(){
			return $.map(this.dates, function(d){
				return new Date(d);
			});
		},

		getDate: function(){
			return this._utc_to_local(this.getUTCDate());
		},

		getUTCDate: function(){
			return new Date(this.dates.get(-1));
		},

		setDates: function(){
			var args = $.isArray(arguments[0]) ? arguments[0] : arguments;
			this.update.apply(this, args);
			this._trigger('changeDate');
			this.setValue();
		},

		setUTCDates: function(){
			var args = $.isArray(arguments[0]) ? arguments[0] : arguments;
			this.update.apply(this, $.map(args, this._utc_to_local));
			this._trigger('changeDate');
			this.setValue();
		},

		setDate: alias('setDates'),
		setUTCDate: alias('setUTCDates'),

		setValue: function(){
			var formatted = this.getFormattedDate();
			if (!this.isInput){
				if (this.component){
					this.element.find('input').val(formatted).change();
				}
			}
			else {
				this.element.val(formatted).change();
			}
		},

		getFormattedDate: function(format){
			if (format === undefined)
				format = this.o.format;

			var lang = this.o.language;
			return $.map(this.dates, function(d){
				return DPGlobal.formatDate(d, format, lang);
			}).join(this.o.multidateSeparator);
		},

		setStartDate: function(startDate){
			this._process_options({startDate: startDate});
			this.update();
			this.updateNavArrows();
		},

		setEndDate: function(endDate){
			this._process_options({endDate: endDate});
			this.update();
			this.updateNavArrows();
		},

		setDaysOfWeekDisabled: function(daysOfWeekDisabled){
			this._process_options({daysOfWeekDisabled: daysOfWeekDisabled});
			this.update();
			this.updateNavArrows();
		},

		place: function(){
			if (this.isInline)
				return;
			var calendarWidth = this.picker.outerWidth(),
				calendarHeight = this.picker.outerHeight(),
				visualPadding = 10,
				windowWidth = $window.width(),
				windowHeight = $window.height(),
				scrollTop = $window.scrollTop();

			var zIndex = parseInt(this.element.parents().filter(function(){
					return $(this).css('z-index') !== 'auto';
				}).first().css('z-index'))+10;
			var offset = this.component ? this.component.parent().offset() : this.element.offset();
			var height = this.component ? this.component.outerHeight(true) : this.element.outerHeight(false);
			var width = this.component ? this.component.outerWidth(true) : this.element.outerWidth(false);
			var left = offset.left,
				top = offset.top;

			this.picker.removeClass(
				'datepicker-orient-top datepicker-orient-bottom '+
				'datepicker-orient-right datepicker-orient-left'
			);

			if (this.o.orientation.x !== 'auto'){
				this.picker.addClass('datepicker-orient-' + this.o.orientation.x);
				if (this.o.orientation.x === 'right')
					left -= calendarWidth - width;
			}
			// auto x orientation is best-placement: if it crosses a window
			// edge, fudge it sideways
			else {
				// Default to left
				this.picker.addClass('datepicker-orient-left');
				if (offset.left < 0)
					left -= offset.left - visualPadding;
				else if (offset.left + calendarWidth > windowWidth)
					left = windowWidth - calendarWidth - visualPadding;
			}

			// auto y orientation is best-situation: top or bottom, no fudging,
			// decision based on which shows more of the calendar
			var yorient = this.o.orientation.y,
				top_overflow, bottom_overflow;
			if (yorient === 'auto'){
				top_overflow = -scrollTop + offset.top - calendarHeight;
				bottom_overflow = scrollTop + windowHeight - (offset.top + height + calendarHeight);
				if (Math.max(top_overflow, bottom_overflow) === bottom_overflow)
					yorient = 'top';
				else
					yorient = 'bottom';
			}
			this.picker.addClass('datepicker-orient-' + yorient);
			if (yorient === 'top')
				top += height;
			else
				top -= calendarHeight + parseInt(this.picker.css('padding-top'));

			this.picker.css({
				top: top,
				left: left,
				zIndex: zIndex
			});
		},

		_allow_update: true,
		update: function(){
			if (!this._allow_update)
				return;

			var oldDates = this.dates.copy(),
				dates = [],
				fromArgs = false;
			if (arguments.length){
				$.each(arguments, $.proxy(function(i, date){
					if (date instanceof Date)
						date = this._local_to_utc(date);
					dates.push(date);
				}, this));
				fromArgs = true;
			}
			else {
				dates = this.isInput
						? this.element.val()
						: this.element.data('date') || this.element.find('input').val();
				if (dates && this.o.multidate)
					dates = dates.split(this.o.multidateSeparator);
				else
					dates = [dates];
				delete this.element.data().date;
			}

			dates = $.map(dates, $.proxy(function(date){
				return DPGlobal.parseDate(date, this.o.format, this.o.language);
			}, this));
			dates = $.grep(dates, $.proxy(function(date){
				return (
					date < this.o.startDate ||
					date > this.o.endDate ||
					!date
				);
			}, this), true);
			this.dates.replace(dates);

			if (this.dates.length)
				this.viewDate = new Date(this.dates.get(-1));
			else if (this.viewDate < this.o.startDate)
				this.viewDate = new Date(this.o.startDate);
			else if (this.viewDate > this.o.endDate)
				this.viewDate = new Date(this.o.endDate);

			if (fromArgs){
				// setting date by clicking
				this.setValue();
			}
			else if (dates.length){
				// setting date by typing
				if (String(oldDates) !== String(this.dates))
					this._trigger('changeDate');
			}
			if (!this.dates.length && oldDates.length)
				this._trigger('clearDate');

			this.fill();
		},

		fillDow: function(){
			var dowCnt = this.o.weekStart,
				html = '<tr>';
			if (this.o.calendarWeeks){
				var cell = '<th class="cw">&nbsp;</th>';
				html += cell;
				this.picker.find('.datepicker-days thead tr:first-child').prepend(cell);
			}
			while (dowCnt < this.o.weekStart + 7){
				html += '<th class="dow">'+dates[this.o.language].daysMin[(dowCnt++)%7]+'</th>';
			}
			html += '</tr>';
			this.picker.find('.datepicker-days thead').append(html);
		},

		fillMonths: function(){
			var html = '',
			i = 0;
			while (i < 12){
				html += '<span class="month">'+dates[this.o.language].monthsShort[i++]+'</span>';
			}
			this.picker.find('.datepicker-months td').html(html);
		},

		setRange: function(range){
			if (!range || !range.length)
				delete this.range;
			else
				this.range = $.map(range, function(d){
					return d.valueOf();
				});
			this.fill();
		},

		getClassNames: function(date){
			var cls = [],
				year = this.viewDate.getUTCFullYear(),
				month = this.viewDate.getUTCMonth(),
				today = new Date();
			if (date.getUTCFullYear() < year || (date.getUTCFullYear() === year && date.getUTCMonth() < month)){
				cls.push('old');
			}
			else if (date.getUTCFullYear() > year || (date.getUTCFullYear() === year && date.getUTCMonth() > month)){
				cls.push('new');
			}
			if (this.focusDate && date.valueOf() === this.focusDate.valueOf())
				cls.push('focused');
			// Compare internal UTC date with local today, not UTC today
			if (this.o.todayHighlight &&
				date.getUTCFullYear() === today.getFullYear() &&
				date.getUTCMonth() === today.getMonth() &&
				date.getUTCDate() === today.getDate()){
				cls.push('today');
			}
			if (this.dates.contains(date) !== -1)
				cls.push('active');
			if (date.valueOf() < this.o.startDate || date.valueOf() > this.o.endDate ||
				$.inArray(date.getUTCDay(), this.o.daysOfWeekDisabled) !== -1){
				cls.push('disabled');
			}
			if (this.range){
				if (date > this.range[0] && date < this.range[this.range.length-1]){
					cls.push('range');
				}
				if ($.inArray(date.valueOf(), this.range) !== -1){
					cls.push('selected');
				}
			}
			return cls;
		},

		fill: function(){
			var d = new Date(this.viewDate),
				year = d.getUTCFullYear(),
				month = d.getUTCMonth(),
				startYear = this.o.startDate !== -Infinity ? this.o.startDate.getUTCFullYear() : -Infinity,
				startMonth = this.o.startDate !== -Infinity ? this.o.startDate.getUTCMonth() : -Infinity,
				endYear = this.o.endDate !== Infinity ? this.o.endDate.getUTCFullYear() : Infinity,
				endMonth = this.o.endDate !== Infinity ? this.o.endDate.getUTCMonth() : Infinity,
				todaytxt = dates[this.o.language].today || dates['en'].today || '',
				cleartxt = dates[this.o.language].clear || dates['en'].clear || '',
				tooltip;
			this.picker.find('.datepicker-days thead th.datepicker-switch')
						.text(dates[this.o.language].months[month]+' '+year);
			this.picker.find('tfoot th.today')
						.text(todaytxt)
						.toggle(this.o.todayBtn !== false);
			this.picker.find('tfoot th.clear')
						.text(cleartxt)
						.toggle(this.o.clearBtn !== false);
			this.updateNavArrows();
			this.fillMonths();
			var prevMonth = UTCDate(year, month-1, 28),
				day = DPGlobal.getDaysInMonth(prevMonth.getUTCFullYear(), prevMonth.getUTCMonth());
			prevMonth.setUTCDate(day);
			prevMonth.setUTCDate(day - (prevMonth.getUTCDay() - this.o.weekStart + 7)%7);
			var nextMonth = new Date(prevMonth);
			nextMonth.setUTCDate(nextMonth.getUTCDate() + 42);
			nextMonth = nextMonth.valueOf();
			var html = [];
			var clsName;
			while (prevMonth.valueOf() < nextMonth){
				if (prevMonth.getUTCDay() === this.o.weekStart){
					html.push('<tr>');
					if (this.o.calendarWeeks){
						// ISO 8601: First week contains first thursday.
						// ISO also states week starts on Monday, but we can be more abstract here.
						var
							// Start of current week: based on weekstart/current date
							ws = new Date(+prevMonth + (this.o.weekStart - prevMonth.getUTCDay() - 7) % 7 * 864e5),
							// Thursday of this week
							th = new Date(Number(ws) + (7 + 4 - ws.getUTCDay()) % 7 * 864e5),
							// First Thursday of year, year from thursday
							yth = new Date(Number(yth = UTCDate(th.getUTCFullYear(), 0, 1)) + (7 + 4 - yth.getUTCDay())%7*864e5),
							// Calendar week: ms between thursdays, div ms per day, div 7 days
							calWeek =  (th - yth) / 864e5 / 7 + 1;
						html.push('<td class="cw">'+ calWeek +'</td>');

					}
				}
				clsName = this.getClassNames(prevMonth);
				clsName.push('day');

				if (this.o.beforeShowDay !== $.noop){
					var before = this.o.beforeShowDay(this._utc_to_local(prevMonth));
					if (before === undefined)
						before = {};
					else if (typeof(before) === 'boolean')
						before = {enabled: before};
					else if (typeof(before) === 'string')
						before = {classes: before};
					if (before.enabled === false)
						clsName.push('disabled');
					if (before.classes)
						clsName = clsName.concat(before.classes.split(/\s+/));
					if (before.tooltip)
						tooltip = before.tooltip;
				}

				clsName = $.unique(clsName);
				html.push('<td class="'+clsName.join(' ')+'"' + (tooltip ? ' title="'+tooltip+'"' : '') + '>'+prevMonth.getUTCDate() + '</td>');
				if (prevMonth.getUTCDay() === this.o.weekEnd){
					html.push('</tr>');
				}
				prevMonth.setUTCDate(prevMonth.getUTCDate()+1);
			}
			this.picker.find('.datepicker-days tbody').empty().append(html.join(''));

			var months = this.picker.find('.datepicker-months')
						.find('th:eq(1)')
							.text(year)
							.end()
						.find('span').removeClass('active');

			$.each(this.dates, function(i, d){
				if (d.getUTCFullYear() === year)
					months.eq(d.getUTCMonth()).addClass('active');
			});

			if (year < startYear || year > endYear){
				months.addClass('disabled');
			}
			if (year === startYear){
				months.slice(0, startMonth).addClass('disabled');
			}
			if (year === endYear){
				months.slice(endMonth+1).addClass('disabled');
			}

			html = '';
			year = parseInt(year/10, 10) * 10;
			var yearCont = this.picker.find('.datepicker-years')
								.find('th:eq(1)')
									.text(year + '-' + (year + 9))
									.end()
								.find('td');
			year -= 1;
			var years = $.map(this.dates, function(d){
					return d.getUTCFullYear();
				}),
				classes;
			for (var i = -1; i < 11; i++){
				classes = ['year'];
				if (i === -1)
					classes.push('old');
				else if (i === 10)
					classes.push('new');
				if ($.inArray(year, years) !== -1)
					classes.push('active');
				if (year < startYear || year > endYear)
					classes.push('disabled');
				html += '<span class="' + classes.join(' ') + '">'+year+'</span>';
				year += 1;
			}
			yearCont.html(html);
		},

		updateNavArrows: function(){
			if (!this._allow_update)
				return;

			var d = new Date(this.viewDate),
				year = d.getUTCFullYear(),
				month = d.getUTCMonth();
			switch (this.viewMode){
				case 0:
					if (this.o.startDate !== -Infinity && year <= this.o.startDate.getUTCFullYear() && month <= this.o.startDate.getUTCMonth()){
						this.picker.find('.prev').css({visibility: 'hidden'});
					}
					else {
						this.picker.find('.prev').css({visibility: 'visible'});
					}
					if (this.o.endDate !== Infinity && year >= this.o.endDate.getUTCFullYear() && month >= this.o.endDate.getUTCMonth()){
						this.picker.find('.next').css({visibility: 'hidden'});
					}
					else {
						this.picker.find('.next').css({visibility: 'visible'});
					}
					break;
				case 1:
				case 2:
					if (this.o.startDate !== -Infinity && year <= this.o.startDate.getUTCFullYear()){
						this.picker.find('.prev').css({visibility: 'hidden'});
					}
					else {
						this.picker.find('.prev').css({visibility: 'visible'});
					}
					if (this.o.endDate !== Infinity && year >= this.o.endDate.getUTCFullYear()){
						this.picker.find('.next').css({visibility: 'hidden'});
					}
					else {
						this.picker.find('.next').css({visibility: 'visible'});
					}
					break;
			}
		},

		click: function(e){
			e.preventDefault();
			var target = $(e.target).closest('span, td, th'),
				year, month, day;
			if (target.length === 1){
				switch (target[0].nodeName.toLowerCase()){
					case 'th':
						switch (target[0].className){
							case 'datepicker-switch':
								this.showMode(1);
								break;
							case 'prev':
							case 'next':
								var dir = DPGlobal.modes[this.viewMode].navStep * (target[0].className === 'prev' ? -1 : 1);
								switch (this.viewMode){
									case 0:
										this.viewDate = this.moveMonth(this.viewDate, dir);
										this._trigger('changeMonth', this.viewDate);
										break;
									case 1:
									case 2:
										this.viewDate = this.moveYear(this.viewDate, dir);
										if (this.viewMode === 1)
											this._trigger('changeYear', this.viewDate);
										break;
								}
								this.fill();
								break;
							case 'today':
								var date = new Date();
								date = UTCDate(date.getFullYear(), date.getMonth(), date.getDate(), 0, 0, 0);

								this.showMode(-2);
								var which = this.o.todayBtn === 'linked' ? null : 'view';
								this._setDate(date, which);
								break;
							case 'clear':
								var element;
								if (this.isInput)
									element = this.element;
								else if (this.component)
									element = this.element.find('input');
								if (element)
									element.val("").change();
								this.update();
								this._trigger('changeDate');
								if (this.o.autoclose)
									this.hide();
								break;
						}
						break;
					case 'span':
						if (!target.is('.disabled')){
							this.viewDate.setUTCDate(1);
							if (target.is('.month')){
								day = 1;
								month = target.parent().find('span').index(target);
								year = this.viewDate.getUTCFullYear();
								this.viewDate.setUTCMonth(month);
								this._trigger('changeMonth', this.viewDate);
								if (this.o.minViewMode === 1){
									this._setDate(UTCDate(year, month, day));
								}
							}
							else {
								day = 1;
								month = 0;
								year = parseInt(target.text(), 10)||0;
								this.viewDate.setUTCFullYear(year);
								this._trigger('changeYear', this.viewDate);
								if (this.o.minViewMode === 2){
									this._setDate(UTCDate(year, month, day));
								}
							}
							this.showMode(-1);
							this.fill();
						}
						break;
					case 'td':
						if (target.is('.day') && !target.is('.disabled')){
							day = parseInt(target.text(), 10)||1;
							year = this.viewDate.getUTCFullYear();
							month = this.viewDate.getUTCMonth();
							if (target.is('.old')){
								if (month === 0){
									month = 11;
									year -= 1;
								}
								else {
									month -= 1;
								}
							}
							else if (target.is('.new')){
								if (month === 11){
									month = 0;
									year += 1;
								}
								else {
									month += 1;
								}
							}
							this._setDate(UTCDate(year, month, day));
						}
						break;
				}
			}
			if (this.picker.is(':visible') && this._focused_from){
				$(this._focused_from).focus();
			}
			delete this._focused_from;
		},

		_toggle_multidate: function(date){
			var ix = this.dates.contains(date);
			if (!date){
				this.dates.clear();
			}
			else if (ix !== -1){
				this.dates.remove(ix);
			}
			else {
				this.dates.push(date);
			}
			if (typeof this.o.multidate === 'number')
				while (this.dates.length > this.o.multidate)
					this.dates.remove(0);
		},

		_setDate: function(date, which){
			if (!which || which === 'date')
				this._toggle_multidate(date && new Date(date));
			if (!which || which  === 'view')
				this.viewDate = date && new Date(date);

			this.fill();
			this.setValue();
			this._trigger('changeDate');
			var element;
			if (this.isInput){
				element = this.element;
			}
			else if (this.component){
				element = this.element.find('input');
			}
			if (element){
				element.change();
			}
			if (this.o.autoclose && (!which || which === 'date')){
				this.hide();
			}
		},

		moveMonth: function(date, dir){
			if (!date)
				return undefined;
			if (!dir)
				return date;
			var new_date = new Date(date.valueOf()),
				day = new_date.getUTCDate(),
				month = new_date.getUTCMonth(),
				mag = Math.abs(dir),
				new_month, test;
			dir = dir > 0 ? 1 : -1;
			if (mag === 1){
				test = dir === -1
					// If going back one month, make sure month is not current month
					// (eg, Mar 31 -> Feb 31 == Feb 28, not Mar 02)
					? function(){
						return new_date.getUTCMonth() === month;
					}
					// If going forward one month, make sure month is as expected
					// (eg, Jan 31 -> Feb 31 == Feb 28, not Mar 02)
					: function(){
						return new_date.getUTCMonth() !== new_month;
					};
				new_month = month + dir;
				new_date.setUTCMonth(new_month);
				// Dec -> Jan (12) or Jan -> Dec (-1) -- limit expected date to 0-11
				if (new_month < 0 || new_month > 11)
					new_month = (new_month + 12) % 12;
			}
			else {
				// For magnitudes >1, move one month at a time...
				for (var i=0; i < mag; i++)
					// ...which might decrease the day (eg, Jan 31 to Feb 28, etc)...
					new_date = this.moveMonth(new_date, dir);
				// ...then reset the day, keeping it in the new month
				new_month = new_date.getUTCMonth();
				new_date.setUTCDate(day);
				test = function(){
					return new_month !== new_date.getUTCMonth();
				};
			}
			// Common date-resetting loop -- if date is beyond end of month, make it
			// end of month
			while (test()){
				new_date.setUTCDate(--day);
				new_date.setUTCMonth(new_month);
			}
			return new_date;
		},

		moveYear: function(date, dir){
			return this.moveMonth(date, dir*12);
		},

		dateWithinRange: function(date){
			return date >= this.o.startDate && date <= this.o.endDate;
		},

		keydown: function(e){
			if (this.picker.is(':not(:visible)')){
				if (e.keyCode === 27) // allow escape to hide and re-show picker
					this.show();
				return;
			}
			var dateChanged = false,
				dir, newDate, newViewDate,
				focusDate = this.focusDate || this.viewDate;
			switch (e.keyCode){
				case 27: // escape
					if (this.focusDate){
						this.focusDate = null;
						this.viewDate = this.dates.get(-1) || this.viewDate;
						this.fill();
					}
					else
						this.hide();
					e.preventDefault();
					break;
				case 37: // left
				case 39: // right
					if (!this.o.keyboardNavigation)
						break;
					dir = e.keyCode === 37 ? -1 : 1;
					if (e.ctrlKey){
						newDate = this.moveYear(this.dates.get(-1) || UTCToday(), dir);
						newViewDate = this.moveYear(focusDate, dir);
						this._trigger('changeYear', this.viewDate);
					}
					else if (e.shiftKey){
						newDate = this.moveMonth(this.dates.get(-1) || UTCToday(), dir);
						newViewDate = this.moveMonth(focusDate, dir);
						this._trigger('changeMonth', this.viewDate);
					}
					else {
						newDate = new Date(this.dates.get(-1) || UTCToday());
						newDate.setUTCDate(newDate.getUTCDate() + dir);
						newViewDate = new Date(focusDate);
						newViewDate.setUTCDate(focusDate.getUTCDate() + dir);
					}
					if (this.dateWithinRange(newDate)){
						this.focusDate = this.viewDate = newViewDate;
						this.setValue();
						this.fill();
						e.preventDefault();
					}
					break;
				case 38: // up
				case 40: // down
					if (!this.o.keyboardNavigation)
						break;
					dir = e.keyCode === 38 ? -1 : 1;
					if (e.ctrlKey){
						newDate = this.moveYear(this.dates.get(-1) || UTCToday(), dir);
						newViewDate = this.moveYear(focusDate, dir);
						this._trigger('changeYear', this.viewDate);
					}
					else if (e.shiftKey){
						newDate = this.moveMonth(this.dates.get(-1) || UTCToday(), dir);
						newViewDate = this.moveMonth(focusDate, dir);
						this._trigger('changeMonth', this.viewDate);
					}
					else {
						newDate = new Date(this.dates.get(-1) || UTCToday());
						newDate.setUTCDate(newDate.getUTCDate() + dir * 7);
						newViewDate = new Date(focusDate);
						newViewDate.setUTCDate(focusDate.getUTCDate() + dir * 7);
					}
					if (this.dateWithinRange(newDate)){
						this.focusDate = this.viewDate = newViewDate;
						this.setValue();
						this.fill();
						e.preventDefault();
					}
					break;
				case 32: // spacebar
					// Spacebar is used in manually typing dates in some formats.
					// As such, its behavior should not be hijacked.
					break;
				case 13: // enter
					focusDate = this.focusDate || this.dates.get(-1) || this.viewDate;
					this._toggle_multidate(focusDate);
					dateChanged = true;
					this.focusDate = null;
					this.viewDate = this.dates.get(-1) || this.viewDate;
					this.setValue();
					this.fill();
					if (this.picker.is(':visible')){
						e.preventDefault();
						if (this.o.autoclose)
							this.hide();
					}
					break;
				case 9: // tab
					this.focusDate = null;
					this.viewDate = this.dates.get(-1) || this.viewDate;
					this.fill();
					this.hide();
					break;
			}
			if (dateChanged){
				if (this.dates.length)
					this._trigger('changeDate');
				else
					this._trigger('clearDate');
				var element;
				if (this.isInput){
					element = this.element;
				}
				else if (this.component){
					element = this.element.find('input');
				}
				if (element){
					element.change();
				}
			}
		},

		showMode: function(dir){
			if (dir){
				this.viewMode = Math.max(this.o.minViewMode, Math.min(2, this.viewMode + dir));
			}
			this.picker
				.find('>div')
				.hide()
				.filter('.datepicker-'+DPGlobal.modes[this.viewMode].clsName)
					.css('display', 'block');
			this.updateNavArrows();
		}
	};

	var DateRangePicker = function(element, options){
		this.element = $(element);
		this.inputs = $.map(options.inputs, function(i){
			return i.jquery ? i[0] : i;
		});
		delete options.inputs;

		$(this.inputs)
			.datepicker(options)
			.bind('changeDate', $.proxy(this.dateUpdated, this));

		this.pickers = $.map(this.inputs, function(i){
			return $(i).data('datepicker');
		});
		this.updateDates();
	};
	DateRangePicker.prototype = {
		updateDates: function(){
			this.dates = $.map(this.pickers, function(i){
				return i.getUTCDate();
			});
			this.updateRanges();
		},
		updateRanges: function(){
			var range = $.map(this.dates, function(d){
				return d.valueOf();
			});
			$.each(this.pickers, function(i, p){
				p.setRange(range);
			});
		},
		dateUpdated: function(e){
			// `this.updating` is a workaround for preventing infinite recursion
			// between `changeDate` triggering and `setUTCDate` calling.  Until
			// there is a better mechanism.
			if (this.updating)
				return;
			this.updating = true;

			var dp = $(e.target).data('datepicker'),
				new_date = dp.getUTCDate(),
				i = $.inArray(e.target, this.inputs),
				l = this.inputs.length;
			if (i === -1)
				return;

			$.each(this.pickers, function(i, p){
				if (!p.getUTCDate())
					p.setUTCDate(new_date);
			});

			if (new_date < this.dates[i]){
				// Date being moved earlier/left
				while (i >= 0 && new_date < this.dates[i]){
					this.pickers[i--].setUTCDate(new_date);
				}
			}
			else if (new_date > this.dates[i]){
				// Date being moved later/right
				while (i < l && new_date > this.dates[i]){
					this.pickers[i++].setUTCDate(new_date);
				}
			}
			this.updateDates();

			delete this.updating;
		},
		remove: function(){
			$.map(this.pickers, function(p){ p.remove(); });
			delete this.element.data().datepicker;
		}
	};

	function opts_from_el(el, prefix){
		// Derive options from element data-attrs
		var data = $(el).data(),
			out = {}, inkey,
			replace = new RegExp('^' + prefix.toLowerCase() + '([A-Z])');
		prefix = new RegExp('^' + prefix.toLowerCase());
		function re_lower(_,a){
			return a.toLowerCase();
		}
		for (var key in data)
			if (prefix.test(key)){
				inkey = key.replace(replace, re_lower);
				out[inkey] = data[key];
			}
		return out;
	}

	function opts_from_locale(lang){
		// Derive options from locale plugins
		var out = {};
		// Check if "de-DE" style date is available, if not language should
		// fallback to 2 letter code eg "de"
		if (!dates[lang]){
			lang = lang.split('-')[0];
			if (!dates[lang])
				return;
		}
		var d = dates[lang];
		$.each(locale_opts, function(i,k){
			if (k in d)
				out[k] = d[k];
		});
		return out;
	}

	var old = $.fn.datepicker;
	$.fn.datepicker = function(option){
		var args = Array.apply(null, arguments);
		args.shift();
		var internal_return;
		this.each(function(){
			var $this = $(this),
				data = $this.data('datepicker'),
				options = typeof option === 'object' && option;
			if (!data){
				var elopts = opts_from_el(this, 'date'),
					// Preliminary otions
					xopts = $.extend({}, defaults, elopts, options),
					locopts = opts_from_locale(xopts.language),
					// Options priority: js args, data-attrs, locales, defaults
					opts = $.extend({}, defaults, locopts, elopts, options);
				if ($this.is('.input-daterange') || opts.inputs){
					var ropts = {
						inputs: opts.inputs || $this.find('input').toArray()
					};
					$this.data('datepicker', (data = new DateRangePicker(this, $.extend(opts, ropts))));
				}
				else {
					$this.data('datepicker', (data = new Datepicker(this, opts)));
				}
			}
			if (typeof option === 'string' && typeof data[option] === 'function'){
				internal_return = data[option].apply(data, args);
				if (internal_return !== undefined)
					return false;
			}
		});
		if (internal_return !== undefined)
			return internal_return;
		else
			return this;
	};

	var defaults = $.fn.datepicker.defaults = {
		autoclose: false,
		beforeShowDay: $.noop,
		calendarWeeks: false,
		clearBtn: false,
		daysOfWeekDisabled: [],
		endDate: Infinity,
		forceParse: true,
		format: 'mm/dd/yyyy',
		keyboardNavigation: true,
		language: 'en',
		minViewMode: 0,
		multidate: false,
		multidateSeparator: ',',
		orientation: "auto",
		rtl: false,
		startDate: -Infinity,
		startView: 0,
		todayBtn: false,
		todayHighlight: false,
		weekStart: 0
	};
	var locale_opts = $.fn.datepicker.locale_opts = [
		'format',
		'rtl',
		'weekStart'
	];
	$.fn.datepicker.Constructor = Datepicker;
	var dates = $.fn.datepicker.dates = {
		en: {
			days: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
			daysShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
			daysMin: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa", "Su"],
			months: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
			monthsShort: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
			today: "Today",
			clear: "Clear"
		}
	};

	var DPGlobal = {
		modes: [
			{
				clsName: 'days',
				navFnc: 'Month',
				navStep: 1
			},
			{
				clsName: 'months',
				navFnc: 'FullYear',
				navStep: 1
			},
			{
				clsName: 'years',
				navFnc: 'FullYear',
				navStep: 10
		}],
		isLeapYear: function(year){
			return (((year % 4 === 0) && (year % 100 !== 0)) || (year % 400 === 0));
		},
		getDaysInMonth: function(year, month){
			return [31, (DPGlobal.isLeapYear(year) ? 29 : 28), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31][month];
		},
		validParts: /dd?|DD?|mm?|MM?|yy(?:yy)?/g,
		nonpunctuation: /[^ -\/:-@\[\u3400-\u9fff-`{-~\t\n\r]+/g,
		parseFormat: function(format){
			// IE treats \0 as a string end in inputs (truncating the value),
			// so it's a bad format delimiter, anyway
			var separators = format.replace(this.validParts, '\0').split('\0'),
				parts = format.match(this.validParts);
			if (!separators || !separators.length || !parts || parts.length === 0){
				throw new Error("Invalid date format.");
			}
			return {separators: separators, parts: parts};
		},
		parseDate: function(date, format, language){
			if (!date)
				return undefined;
			if (date instanceof Date)
				return date;
			if (typeof format === 'string')
				format = DPGlobal.parseFormat(format);
			var part_re = /([\-+]\d+)([dmwy])/,
				parts = date.match(/([\-+]\d+)([dmwy])/g),
				part, dir, i;
			if (/^[\-+]\d+[dmwy]([\s,]+[\-+]\d+[dmwy])*$/.test(date)){
				date = new Date();
				for (i=0; i < parts.length; i++){
					part = part_re.exec(parts[i]);
					dir = parseInt(part[1]);
					switch (part[2]){
						case 'd':
							date.setUTCDate(date.getUTCDate() + dir);
							break;
						case 'm':
							date = Datepicker.prototype.moveMonth.call(Datepicker.prototype, date, dir);
							break;
						case 'w':
							date.setUTCDate(date.getUTCDate() + dir * 7);
							break;
						case 'y':
							date = Datepicker.prototype.moveYear.call(Datepicker.prototype, date, dir);
							break;
					}
				}
				return UTCDate(date.getUTCFullYear(), date.getUTCMonth(), date.getUTCDate(), 0, 0, 0);
			}
			parts = date && date.match(this.nonpunctuation) || [];
			date = new Date();
			var parsed = {},
				setters_order = ['yyyy', 'yy', 'M', 'MM', 'm', 'mm', 'd', 'dd'],
				setters_map = {
					yyyy: function(d,v){
						return d.setUTCFullYear(v);
					},
					yy: function(d,v){
						return d.setUTCFullYear(2000+v);
					},
					m: function(d,v){
						if (isNaN(d))
							return d;
						v -= 1;
						while (v < 0) v += 12;
						v %= 12;
						d.setUTCMonth(v);
						while (d.getUTCMonth() !== v)
							d.setUTCDate(d.getUTCDate()-1);
						return d;
					},
					d: function(d,v){
						return d.setUTCDate(v);
					}
				},
				val, filtered;
			setters_map['M'] = setters_map['MM'] = setters_map['mm'] = setters_map['m'];
			setters_map['dd'] = setters_map['d'];
			date = UTCDate(date.getFullYear(), date.getMonth(), date.getDate(), 0, 0, 0);
			var fparts = format.parts.slice();
			// Remove noop parts
			if (parts.length !== fparts.length){
				fparts = $(fparts).filter(function(i,p){
					return $.inArray(p, setters_order) !== -1;
				}).toArray();
			}
			// Process remainder
			function match_part(){
				var m = this.slice(0, parts[i].length),
					p = parts[i].slice(0, m.length);
				return m === p;
			}
			if (parts.length === fparts.length){
				var cnt;
				for (i=0, cnt = fparts.length; i < cnt; i++){
					val = parseInt(parts[i], 10);
					part = fparts[i];
					if (isNaN(val)){
						switch (part){
							case 'MM':
								filtered = $(dates[language].months).filter(match_part);
								val = $.inArray(filtered[0], dates[language].months) + 1;
								break;
							case 'M':
								filtered = $(dates[language].monthsShort).filter(match_part);
								val = $.inArray(filtered[0], dates[language].monthsShort) + 1;
								break;
						}
					}
					parsed[part] = val;
				}
				var _date, s;
				for (i=0; i < setters_order.length; i++){
					s = setters_order[i];
					if (s in parsed && !isNaN(parsed[s])){
						_date = new Date(date);
						setters_map[s](_date, parsed[s]);
						if (!isNaN(_date))
							date = _date;
					}
				}
			}
			return date;
		},
		formatDate: function(date, format, language){
			if (!date)
				return '';
			if (typeof format === 'string')
				format = DPGlobal.parseFormat(format);
			var val = {
				d: date.getUTCDate(),
				D: dates[language].daysShort[date.getUTCDay()],
				DD: dates[language].days[date.getUTCDay()],
				m: date.getUTCMonth() + 1,
				M: dates[language].monthsShort[date.getUTCMonth()],
				MM: dates[language].months[date.getUTCMonth()],
				yy: date.getUTCFullYear().toString().substring(2),
				yyyy: date.getUTCFullYear()
			};
			val.dd = (val.d < 10 ? '0' : '') + val.d;
			val.mm = (val.m < 10 ? '0' : '') + val.m;
			date = [];
			var seps = $.extend([], format.separators);
			for (var i=0, cnt = format.parts.length; i <= cnt; i++){
				if (seps.length)
					date.push(seps.shift());
				date.push(val[format.parts[i]]);
			}
			return date.join('');
		},
		headTemplate: '<thead>'+
							'<tr>'+
								'<th class="prev">&laquo;</th>'+
								'<th colspan="5" class="datepicker-switch"></th>'+
								'<th class="next">&raquo;</th>'+
							'</tr>'+
						'</thead>',
		contTemplate: '<tbody><tr><td colspan="7"></td></tr></tbody>',
		footTemplate: '<tfoot>'+
							'<tr>'+
								'<th colspan="7" class="today"></th>'+
							'</tr>'+
							'<tr>'+
								'<th colspan="7" class="clear"></th>'+
							'</tr>'+
						'</tfoot>'
	};
	DPGlobal.template = '<div class="datepicker">'+
							'<div class="datepicker-days">'+
								'<table class=" table-condensed">'+
									DPGlobal.headTemplate+
									'<tbody></tbody>'+
									DPGlobal.footTemplate+
								'</table>'+
							'</div>'+
							'<div class="datepicker-months">'+
								'<table class="table-condensed">'+
									DPGlobal.headTemplate+
									DPGlobal.contTemplate+
									DPGlobal.footTemplate+
								'</table>'+
							'</div>'+
							'<div class="datepicker-years">'+
								'<table class="table-condensed">'+
									DPGlobal.headTemplate+
									DPGlobal.contTemplate+
									DPGlobal.footTemplate+
								'</table>'+
							'</div>'+
						'</div>';

	$.fn.datepicker.DPGlobal = DPGlobal;


	/* DATEPICKER NO CONFLICT
	* =================== */

	$.fn.datepicker.noConflict = function(){
		$.fn.datepicker = old;
		return this;
	};


	/* DATEPICKER DATA-API
	* ================== */

	$(document).on(
		'focus.datepicker.data-api click.datepicker.data-api',
		'[data-provide="datepicker"]',
		function(e){
			var $this = $(this);
			if ($this.data('datepicker'))
				return;
			e.preventDefault();
			// component click requires us to explicitly show it
			$this.datepicker('show');
		}
	);
	$(function(){
		$('[data-provide="datepicker-inline"]').datepicker();
	});

}(window.jQuery));

/**
 * French translation for bootstrap-datepicker
 * Nico Mollet <nico.mollet@gmail.com>
 */
;(function($){
	$.fn.datepicker.dates['fr'] = {
		days: ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche"],
		daysShort: ["Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam", "Dim"],
		daysMin: ["D", "L", "Ma", "Me", "J", "V", "S", "D"],
		months: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"],
		monthsShort: ["Jan", "Fév", "Mar", "Avr", "Mai", "Jui", "Jul", "Aou", "Sep", "Oct", "Nov", "Déc"],
		today: "Aujourd'hui",
		clear: "Effacer",
		weekStart: 1,
		format: "dd/mm/yyyy"
	};
}(jQuery));

(function($) {
    'use strict';

    /**
    * Pages.
     * @constructor
     * @property {string}  VERSION      - Build Version.
     * @property {string}  AUTHOR       - Author.
     * @property {string}  SUPPORT      - Support Email.
     * @property {string}  pageScrollElement  - Scroll Element in Page.
     * @property {object}  $body - Cache Body.
     */
    var Pages = function() {
        this.VERSION = "2.3.0";
        this.AUTHOR = "Revox";
        this.SUPPORT = "support@revox.io";

        this.pageScrollElement = 'html, body';
        this.$body = $('body');

        this.setUserOS();
        this.setUserAgent();
    }

    /** @function setUserOS
    * @description SET User Operating System eg: mac,windows,etc
    * @returns {string} - Appends OSName to Pages.$body
    */
    Pages.prototype.setUserOS = function() {
        var OSName = "";
        if (navigator.appVersion.indexOf("Win") != -1) OSName = "windows";
        if (navigator.appVersion.indexOf("Mac") != -1) OSName = "mac";
        if (navigator.appVersion.indexOf("X11") != -1) OSName = "unix";
        if (navigator.appVersion.indexOf("Linux") != -1) OSName = "linux";

        this.$body.addClass(OSName);
    }

    /** @function setUserAgent
    * @description SET User Device Name to mobile | desktop
    * @returns {string} - Appends Device to Pages.$body
    */
    Pages.prototype.setUserAgent = function() {
        if (navigator.userAgent.match(/Android|BlackBerry|iPhone|iPad|iPod|Opera Mini|IEMobile/i)) {
            this.$body.addClass('mobile');
        } else {
            this.$body.addClass('desktop');
            if (navigator.userAgent.match(/MSIE 9.0/)) {
                this.$body.addClass('ie9');
            }
        }
    }

    /** @function isVisibleXs
    * @description Checks if the screen size is XS - Extra Small i.e below W480px
    * @returns {$Element} - Appends $('#pg-visible-xs') to Body
    */
    Pages.prototype.isVisibleXs = function() {
        (!$('#pg-visible-xs').length) && this.$body.append('<div id="pg-visible-xs" class="visible-xs" />');
        return $('#pg-visible-xs').is(':visible');
    }

    /** @function isVisibleSm
    * @description Checks if the screen size is SM - Small Screen i.e Above W480px
    * @returns {$Element} - Appends $('#pg-visible-sm') to Body
    */
    Pages.prototype.isVisibleSm = function() {
        (!$('#pg-visible-sm').length) && this.$body.append('<div id="pg-visible-sm" class="visible-sm" />');
        return $('#pg-visible-sm').is(':visible');
    }

    /** @function isVisibleMd
    * @description Checks if the screen size is MD - Medium Screen i.e Above W1024px
    * @returns {$Element} - Appends $('#pg-visible-md') to Body
    */
    Pages.prototype.isVisibleMd = function() {
        (!$('#pg-visible-md').length) && this.$body.append('<div id="pg-visible-md" class="visible-md" />');
        return $('#pg-visible-md').is(':visible');
    }

    /** @function isVisibleLg
    * @description Checks if the screen size is LG - Large Screen i.e Above W1200px
    * @returns {$Element} - Appends $('#pg-visible-lg') to Body
    */
    Pages.prototype.isVisibleLg = function() {
        (!$('#pg-visible-lg').length) && this.$body.append('<div id="pg-visible-lg" class="visible-lg" />');
        return $('#pg-visible-lg').is(':visible');
    }

    /** @function getUserAgent
    * @description Get Current User Agent.
    * @returns {string} - mobile | desktop
    */
    Pages.prototype.getUserAgent = function() {
        return $('body').hasClass('mobile') ? "mobile" : "desktop";
    }

    /** @function setFullScreen
    * @description Make Browser fullscreen.
    */
    Pages.prototype.setFullScreen = function(element) {
        // Supports most browsers and their versions.
        var requestMethod = element.requestFullScreen || element.webkitRequestFullScreen || element.mozRequestFullScreen || element.msRequestFullscreen;

        if (requestMethod) { // Native full screen.
            requestMethod.call(element);
        } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
            var wscript = new ActiveXObject("WScript.Shell");
            if (wscript !== null) {
                wscript.SendKeys("{F11}");
            }
        }
    }

    /** @function getColor
    * @description Get Color from CSS
    * @param {string} color - pages color class eg: primary,master,master-light etc.
    * @param {int} opacity
    * @returns {rgba}
    */
    Pages.prototype.getColor = function(color, opacity) {
        opacity = parseFloat(opacity) || 1;

        var elem = $('.pg-colors').length ? $('.pg-colors') : $('<div class="pg-colors"></div>').appendTo('body');

        var colorElem = elem.find('[data-color="' + color + '"]').length ? elem.find('[data-color="' + color + '"]') : $('<div class="bg-' + color + '" data-color="' + color + '"></div>').appendTo(elem);

        var color = colorElem.css('background-color');

        var rgb = color.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
        var rgba = "rgba(" + rgb[1] + ", " + rgb[2] + ", " + rgb[3] + ', ' + opacity + ')';

        return rgba;
    }

    /** @function initSidebar
    * @description Initialize side bar to open and close
    * @param {(Element|JQuery)} [context] - A DOM Element, Document, or jQuery to use as context.
    * @requires ui/sidebar.js
    */
    Pages.prototype.initSidebar = function(context) {
        $('[data-pages="sidebar"]', context).each(function() {
            var $sidebar = $(this)
            $sidebar.sidebar($sidebar.data())
        })
    }

    /** @function initDropDown
    * @description Initialize Boot-Strap dropdown Menue
    * @param {(Element|JQuery)} [context] - A DOM Element, Document, or jQuery to use as context.
    * @requires bootstrap.js
    */
    Pages.prototype.initDropDown = function(context) {
        // adjust width of each dropdown to match content width
        $('.dropdown-default', context).each(function() {
            var btn = $(this).find('.dropdown-menu').siblings('.dropdown-toggle');
            var offset = 0;

            var menuWidth = $(this).find('.dropdown-menu').actual('outerWidth');

            if (btn.actual('outerWidth') < menuWidth) {
                btn.width(menuWidth - offset);
                $(this).find('.dropdown-menu').width(btn.actual('outerWidth'));
            } else {
                $(this).find('.dropdown-menu').width(btn.actual('outerWidth'));
            }
        });
    }

    /** @function initFormGroupDefault
    * @description Initialize Pages form group input
    * @param {(Element|JQuery)} [context] - A DOM Element, Document, or jQuery to use as context.
    */
    Pages.prototype.initFormGroupDefault = function(context) {
        $('.form-group.form-group-default', context).click(function() {
            $(this).find('input').focus();
        });

        if (!this.initFormGroupDefaultRun) {
            $('body').on('focus', '.form-group.form-group-default :input', function() {
                $('.form-group.form-group-default').removeClass('focused');
                $(this).parents('.form-group').addClass('focused');
            });

            $('body').on('blur', '.form-group.form-group-default :input', function() {
                $(this).parents('.form-group').removeClass('focused');
                if ($(this).val()) {
                    $(this).closest('.form-group').find('label').addClass('fade');
                } else {
                    $(this).closest('.form-group').find('label').removeClass('fade');
                }
            });

            // Only run the above code once.
            this.initFormGroupDefaultRun = true;
        }

        $('.form-group.form-group-default .checkbox, .form-group.form-group-default .radio', context).hover(function() {
            $(this).parents('.form-group').addClass('focused');
        }, function() {
            $(this).parents('.form-group').removeClass('focused');
        });
    }

    /** @function initSlidingTabs
    * @description Initialize Bootstrap Custom Sliding Tabs
    * @param {(Element|JQuery)} [context] - A DOM Element, Document, or jQuery to use as context.
    * @requires bootstrap.js
    */
    Pages.prototype.initSlidingTabs = function(context) {
        // TODO: move this to a separate file
        $('a[data-toggle="tab"]', context).on('show.bs.tab', function(e) {
            //e = $(e.relatedTarget || e.target).parent().find('a[data-toggle=tab]');
            e = $(e.target).parent().find('a[data-toggle=tab]');

            var hrefPrev = e.attr('href');

            var hrefCurrent = e.attr('href');

            if (!$(hrefCurrent).is('.slide-left, .slide-right')) return;
            $(hrefCurrent).addClass('sliding');

            setTimeout(function() {
                $(hrefCurrent).removeClass('sliding');
            }, 100);
        });
    }
    /** @function reponsiveTabs
    * @description Responsive handlers for Bootstrap Tabs
    */
    Pages.prototype.reponsiveTabs = function() {
        //Dropdown FX
         $('[data-init-reponsive-tabs="dropdownfx"]').each(function() {
            var drop = $(this);
            drop.addClass("hidden-sm hidden-xs");
            var content = '<select class="cs-select cs-skin-slide full-width" data-init-plugin="cs-select">'
            for(var i = 1; i <= drop.children("li").length; i++){
                var li = drop.children("li:nth-child("+i+")");
                var selected ="";
                if(li.hasClass("active")){
                    selected="selected";
                }
                content +='<option value="'+ li.children('a').attr('href')+'" '+selected+'>';
                content += li.children('a').text();
                content += '</option>';
            }
            content +='</select>'
            drop.after(content);
            var select = drop.next()[0];
            $(select).on('change', function (e) {
                var optionSelected = $("option:selected", this);
                var valueSelected = this.value;
                drop.find('a[href="'+valueSelected+'"]').tab('show')
            })
            $(select).wrap('<div class="nav-tab-dropdown cs-wrapper full-width p-t-10 visible-xs visible-sm"></div>');
            new SelectFx(select);
         });

        //Tab to Accordian
        $.fn.tabCollapse && $('[data-init-reponsive-tabs="collapse"]').tabCollapse();
    }

    /** @function initNotificationCenter
    * @description Initialize Pages Header Notifcation Dropdown
    */
    Pages.prototype.initNotificationCenter = function() {
        $('body').on('click', '.notification-list .dropdown-menu', function(event) {
            event.stopPropagation();
        });
        $('body').on('click', '.toggle-more-details', function(event) {
            var p = $(this).closest('.heading');
            p.closest('.heading').children('.more-details').stop().slideToggle('fast', function() {
                p.toggleClass('open');
            });
        });
    }

    /** @function initProgressBars
    * @description Initialize Pages ProgressBars
    */
    Pages.prototype.initProgressBars = function() {
        $(window).on('load', function() {
            // Hack: FF doesn't play SVG animations set as background-image
            $('.progress-bar-indeterminate, .progress-circle-indeterminate, .mapplic-pin').hide().show(0);
        });
    }

    /** @function initInputFile
    * @description Initialize File Input for Bootstrap Buttons and Input groups
    */
    Pages.prototype.initInputFile = function() {
        $(document).on('change', '.btn-file :file', function() {
            var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [numFiles, label]);
        });

        $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
            var input = $(this).parents('.input-group').find(':text'),
                log = numFiles > 1 ? numFiles + ' files selected' : label;
            if( input.length ) {
                input.val(log);
            } else {
                $(this).parent().html(log);
            }
        });
    }
    /** @function initHorizontalMenu
    * @description Initialize Horizontal Dropdown Menu
    */
    Pages.prototype.initHorizontalMenu = function(){
        $(document).on('click', '.horizontal-menu .bar-inner > ul > li', function(){
            $(this).toggleClass('open').siblings().removeClass('open');
        });

        $('.content').on('click', function () {
            $('.horizontal-menu .bar-inner > ul > li').removeClass('open');
        });

        $('[data-pages="horizontal-menu-toggle"]').on('click touchstart', function(e) {
            e.preventDefault();
            $('body').toggleClass('menu-opened');
        });
    }
    /** @function initTooltipPlugin
    * @description Initialize Bootstrap tooltip
    * @param {(Element|JQuery)} [context] - A DOM Element, Document, or jQuery to use as context.
    * @requires bootstrap.js
    */
    Pages.prototype.initTooltipPlugin = function(context) {
        $.fn.tooltip && $('[data-toggle="tooltip"]', context).tooltip();
    }
    /** @function initSelect2Plugin
    * @description Initialize select2 dropdown
    * @param {(Element|JQuery)} [context] - A DOM Element, Document, or jQuery to use as context.
    * @requires select2.js version 4.0.x
    */
    Pages.prototype.initSelect2Plugin = function(context) {
        $.fn.select2 && $('[data-init-plugin="select2"]', context).each(function() {
            $(this).select2({
                minimumResultsForSearch: ($(this).attr('data-disable-search') == 'true' ? -1 : 1)
            }).on('select2:open', function() {
                $.fn.scrollbar && $('.select2-results__options').scrollbar({
                    ignoreMobile: false
                })
            });
        });
    }
    /** @function initScrollBarPlugin
    * @description Initialize Global Scroller
    * @param {(Element|JQuery)} [context] - A DOM Element, Document, or jQuery to use as context.
    * @requires jquery-scrollbar.js
    */
    Pages.prototype.initScrollBarPlugin = function(context) {
        $.fn.scrollbar && $('.scrollable', context).scrollbar({
            ignoreOverlay: false
        });
    }
    /** @function initListView
    * @description Initialize iOS like List view plugin
    * @param {(Element|JQuery)} [context] - A DOM Element, Document, or jQuery to use as context.
    * @example <caption>data-init-list-view="ioslist"</caption>
    * @requires jquery-ioslist.js
    */
    Pages.prototype.initListView = function(context) {
        $.fn.ioslist && $('[data-init-list-view="ioslist"]', context).ioslist();
        $.fn.scrollbar && $('.list-view-wrapper', context).scrollbar({
            ignoreOverlay: false
        });
    }

    /** @function initSwitcheryPlugin
    * @description Initialize iOS like List view plugin
    * @param {(Element|JQuery)} [context] - A DOM Element, Document, or jQuery to use as context.
    * @example <caption>data-init-plugin="switchery"</caption>
    * @requires Switchery.js
    */
    Pages.prototype.initSwitcheryPlugin = function(context) {
        // Switchery - ios7 switch
        window.Switchery && $('[data-init-plugin="switchery"]', context).each(function() {
            var el = $(this);
            new Switchery(el.get(0), {
                color: (el.data("color") != null ?  $.Pages.getColor(el.data("color")) : $.Pages.getColor('success')),
                size : (el.data("size") != null ?  el.data("size") : "default")
            });
        });
    }

    /** @function initSelectFxPlugin
    * @description Initialize iOS like List view plugin
    * @param {(Element|JQuery)} [context] - A DOM Element, Document, or jQuery to use as context.
    * @example <caption>select[data-init-plugin="cs-select"]</caption>
    */
    Pages.prototype.initSelectFxPlugin = function(context) {
        window.SelectFx && $('select[data-init-plugin="cs-select"]', context).each(function() {
            var el = $(this).get(0);
            $(el).wrap('<div class="cs-wrapper"></div>');
            new SelectFx(el);
        });
    }
    /** @function initUnveilPlugin
    * @description To load retina images to img tag
    * @param {(Element|JQuery)} [context] - A DOM Element, Document, or jQuery to use as context.
    */
    Pages.prototype.initUnveilPlugin = function(context) {
        // lazy load retina images
        $.fn.unveil && $("img", context).unveil();
    }

    /** @function initValidatorPlugin
    * @description Inintialize and Overide exsisting jquery-validate methods.
    * @requires jquery-validate.js
    */
    Pages.prototype.initValidatorPlugin = function() {
        /**
         * Open the socket.
         * @override
         */
        $.validator && $.validator.setDefaults({
            ignore: "", // validate hidden fields, required for cs-select
            showErrors: function(errorMap, errorList) {
                var $this = this;
                $.each(this.successList, function(index, value) {
                    var parent = $(this).closest('.form-group-attached');
                    if (parent.length) return $(value).popover("hide");
                });
                return $.each(errorList, function(index, value) {

                    var parent = $(value.element).closest('.form-group-attached');
                    if (!parent.length) {
                        return $this.defaultShowErrors();
                    }
                    var _popover;
                    _popover = $(value.element).popover({
                        trigger: "manual",
                        placement: "top",
                        html: true,
                        container: parent.closest('form'),
                        content: value.message
                    });
                    _popover.data("bs.popover").options.content = value.message;
                    var parent = $(value.element).closest('.form-group');
                    parent.addClass('has-error');
                    $(value.element).popover("show");
                });
            },
            onfocusout: function(element) {
                var parent = $(element).closest('.form-group');
                if ($(element).valid()) {
                    parent.removeClass('has-error');
                    parent.next('.error').remove();
                }
            },
            onkeyup: function(element) {
                var parent = $(element).closest('.form-group');
                if ($(element).valid()) {
                    $(element).removeClass('error');
                    parent.removeClass('has-error');
                    parent.next('label.error').remove();
                    parent.find('label.error').remove();
                } else {
                    parent.addClass('has-error');
                }
            },
            errorPlacement: function(error, element) {
                var parent = $(element).closest('.form-group');
                if (parent.hasClass('form-group-default')) {
                    parent.addClass('has-error');
                    error.insertAfter(parent);
                } else {
                    error.insertAfter(element);
                }
            }
        });
    }

    /** @function init
    * @description Inintialize all core components.
    */
    Pages.prototype.init = function() {
        // init layout
        this.initSidebar();
        this.initDropDown();
        this.initFormGroupDefault();
        this.initSlidingTabs();
        this.initNotificationCenter();
        this.initProgressBars();
        this.initHorizontalMenu();
        // init plugins
        this.initTooltipPlugin();
        this.initSelect2Plugin();
        this.initScrollBarPlugin();
        this.initSwitcheryPlugin();
        this.initSelectFxPlugin();
        this.initUnveilPlugin();
        this.initValidatorPlugin();
        this.initListView();
        this.initInputFile();
        this.reponsiveTabs();
    }

    $.Pages = new Pages();
    $.Pages.Constructor = Pages;

})(window.jQuery);

/**
 * selectFx.js v1.0.0
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2014, Codrops
 * http://www.codrops.com
 */
;
(function(window) {

    'use strict';

    /**
     * based on from https://github.com/inuyaksa/jquery.nicescroll/blob/master/jquery.nicescroll.js
     */
    function hasParent(e, p) {
        if (!e) return false;
        var el = e.target || e.srcElement || e || false;
        while (el && el != p) {
            el = el.parentNode || false;
        }
        return (el !== false);
    };

    /**
     * extend obj function
     */
    function extend(a, b) {
        for (var key in b) {
            if (b.hasOwnProperty(key)) {
                a[key] = b[key];
            }
        }
        return a;
    }

    /**
     * SelectFx function
     */
    function SelectFx(el, options) {
        this.el = el;
        this.options = extend({}, this.options);
        extend(this.options, options);
        this._init();
    }

    /**
     * Pure-JS alternative to jQuery closest()
     */
    function closest(elem, selector) {
        var matchesSelector = elem.matches || elem.webkitMatchesSelector || elem.mozMatchesSelector || elem.msMatchesSelector;
        while (elem) {
            if (matchesSelector.bind(elem)(selector)) {
                return elem;
            } else {
                elem = elem.parentElement;
            }
        }
        return false;
    }

    /**
     * jQuery offset() in pure JS
     */
    function offset(el) {
        return {
            left: el.getBoundingClientRect().left + window.pageXOffset - el.ownerDocument.documentElement.clientLeft,
            top: el.getBoundingClientRect().top + window.pageYOffset - el.ownerDocument.documentElement.clientTop
        }

    }

    /**
     * jQuery after() in pure JS
     */
    function insertAfter(newNode, referenceNode) {
            referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
        }
        /**
         * SelectFx options
         */
    SelectFx.prototype.options = {
        // if true all the links will open in a new tab.
        // if we want to be redirected when we click an option, we need to define a data-link attr on the option of the native select element
        newTab: true,
        // when opening the select element, the default placeholder (if any) is shown
        stickyPlaceholder: true,
        // default container is body
        container: 'body',
        // callback when changing the value
        onChange: function(el) {
            var event = document.createEvent('HTMLEvents');
            event.initEvent('change', true, false);
            el.dispatchEvent(event);
        }
    }

    /**
     * init function
     * initialize and cache some vars
     */
    SelectFx.prototype._init = function() {
        // check if we are using a placeholder for the native select box
        // we assume the placeholder is disabled and selected by default
        var selectedOpt = document.querySelector('option[selected]');
        this.hasDefaultPlaceholder = selectedOpt && selectedOpt.disabled;

        // get selected option (either the first option with attr selected or just the first option)
        this.selectedOpt = selectedOpt || this.el.querySelector('option');

        // create structure
        this._createSelectEl();

        // all options
        this.selOpts = [].slice.call(this.selEl.querySelectorAll('li[data-option]'));

        // total options
        this.selOptsCount = this.selOpts.length;

        // current index
        this.current = this.selOpts.indexOf(this.selEl.querySelector('li.cs-selected')) || -1;

        // placeholder elem
        this.selPlaceholder = this.selEl.querySelector('span.cs-placeholder');

        // init events
        this._initEvents();

        this.el.onchange = function() {
            var index = this.selectedIndex;
            var inputText = this.children[index].innerHTML.trim();
        }

    }

    /**
     * creates the structure for the select element
     */
    SelectFx.prototype._createSelectEl = function() {
        var self = this,
            options = '',
            createOptionHTML = function(el) {
                var optclass = '',
                    classes = '',
                    link = '';

                if (el.selectedOpt && !this.foundSelected && !this.hasDefaultPlaceholder) {
                    classes += 'cs-selected ';
                    this.foundSelected = true;
                }
                // extra classes
                if (el.getAttribute('data-class')) {
                    classes += el.getAttribute('data-class');
                }
                // link options
                if (el.getAttribute('data-link')) {
                    link = 'data-link=' + el.getAttribute('data-link');
                }

                if (classes !== '') {
                    optclass = 'class="' + classes + '" ';
                }

                return '<li ' + optclass + link + ' data-option data-value="' + el.value + '"><span>' + el.textContent + '</span></li>';
            };

        [].slice.call(this.el.children).forEach(function(el) {
            if (el.disabled) {
                return;
            }

            var tag = el.tagName.toLowerCase();

            if (tag === 'option') {
                options += createOptionHTML(el);
            } else if (tag === 'optgroup') {
                options += '<li class="cs-optgroup"><span>' + el.label + '</span><ul>';
                [].slice.call(el.children).forEach(function(opt) {
                    options += createOptionHTML(opt);
                })
                options += '</ul></li>';
            }
        });

        var opts_el = '<div class="cs-options"><ul>' + options + '</ul></div>';
        this.selEl = document.createElement('div');
        this.selEl.className = this.el.className;
        this.selEl.tabIndex = this.el.tabIndex;
        this.selEl.innerHTML = '<span class="cs-placeholder">' + this.selectedOpt.textContent + '</span>' + opts_el;
        this.el.parentNode.appendChild(this.selEl);
        this.selEl.appendChild(this.el);

        // backdrop to support dynamic heights of the dropdown
        var backdrop = document.createElement('div');
        backdrop.className = 'cs-backdrop';
        this.selEl.appendChild(backdrop);
    }

    /**
     * initialize the events
     */
    SelectFx.prototype._initEvents = function() {
        var self = this;

        // open/close select
        this.selPlaceholder.addEventListener('click', function() {
            self._toggleSelect();
        });

        // clicking the options
        this.selOpts.forEach(function(opt, idx) {
            opt.addEventListener('click', function() {
                self.current = idx;
                self._changeOption();
                // close select elem
                self._toggleSelect();
            });
        });

        // close the select element if the target it´s not the select element or one of its descendants..
        document.addEventListener('click', function(ev) {
            var target = ev.target;
            if (self._isOpen() && target !== self.selEl && !hasParent(target, self.selEl)) {
                self._toggleSelect();
            }
        });

        // keyboard navigation events
        this.selEl.addEventListener('keydown', function(ev) {
            var keyCode = ev.keyCode || ev.which;

            switch (keyCode) {
                // up key
                case 38:
                    ev.preventDefault();
                    self._navigateOpts('prev');
                    break;
                    // down key
                case 40:
                    ev.preventDefault();
                    self._navigateOpts('next');
                    break;
                    // space key
                case 32:
                    ev.preventDefault();
                    if (self._isOpen() && typeof self.preSelCurrent != 'undefined' && self.preSelCurrent !== -1) {
                        self._changeOption();
                    }
                    self._toggleSelect();
                    break;
                    // enter key
                case 13:
                    ev.preventDefault();
                    if (self._isOpen() && typeof self.preSelCurrent != 'undefined' && self.preSelCurrent !== -1) {
                        self._changeOption();
                        self._toggleSelect();
                    }
                    break;
                    // esc key
                case 27:
                    ev.preventDefault();
                    if (self._isOpen()) {
                        self._toggleSelect();
                    }
                    break;
            }
        });
    }

    /**
     * navigate with up/dpwn keys
     */
    SelectFx.prototype._navigateOpts = function(dir) {
        if (!this._isOpen()) {
            this._toggleSelect();
        }

        var tmpcurrent = typeof this.preSelCurrent != 'undefined' && this.preSelCurrent !== -1 ? this.preSelCurrent : this.current;

        if (dir === 'prev' && tmpcurrent > 0 || dir === 'next' && tmpcurrent < this.selOptsCount - 1) {
            // save pre selected current - if we click on option, or press enter, or press space this is going to be the index of the current option
            this.preSelCurrent = dir === 'next' ? tmpcurrent + 1 : tmpcurrent - 1;
            // remove focus class if any..
            this._removeFocus();
            // add class focus - track which option we are navigating
            classie.add(this.selOpts[this.preSelCurrent], 'cs-focus');
        }
    }

    /**
     * open/close select
     * when opened show the default placeholder if any
     */
    SelectFx.prototype._toggleSelect = function() {
        var backdrop = this.selEl.querySelector('.cs-backdrop');
        var container = document.querySelector(this.options.container);
        var mask = container.querySelector('.dropdown-mask');
        var csOptions = this.selEl.querySelector('.cs-options');
        var csPlaceholder = this.selEl.querySelector('.cs-placeholder');

        var csPlaceholderWidth = csPlaceholder.offsetWidth;
        var csPlaceholderHeight = csPlaceholder.offsetHeight;
        var csOptionsWidth = csOptions.scrollWidth;

        if (this._isOpen()) {
            if (this.current !== -1) {
                // update placeholder text
                this.selPlaceholder.textContent = this.selOpts[this.current].textContent;
            }

            var dummy = this.selEl.data;

            var parent = dummy.parentNode;
            //parent.appendChild(this.selEl);
            insertAfter(this.selEl, dummy);
            this.selEl.removeAttribute('style');

            parent.removeChild(dummy);

            // Hack for FF
            // http://stackoverflow.com/questions/12088819/css-transitions-on-new-elements
            var x = this.selEl.clientHeight;

            // reset backdrop
            backdrop.style.transform = backdrop.style.webkitTransform = backdrop.style.MozTransform = backdrop.style.msTransform = backdrop.style.OTransform = 'scale3d(1,1,1)';
            classie.remove(this.selEl, 'cs-active');

            mask.style.display = 'none';
            csOptions.style.overflowY = 'hidden';
            csOptions.style.width = 'auto';

            var parentFormGroup = closest(this.selEl, '.form-group');
            parentFormGroup && classie.removeClass(parentFormGroup, 'focused');

        } else {
            if (this.hasDefaultPlaceholder && this.options.stickyPlaceholder) {
                // everytime we open we wanna see the default placeholder text
                this.selPlaceholder.textContent = this.selectedOpt.textContent;
            }

            var dummy;
            if (this.selEl.parentNode.querySelector('.dropdown-placeholder')) {
                dummy = this.selEl.parentNode.querySelector('.dropdown-placeholder');
            } else {
                dummy = document.createElement('div');
                classie.add(dummy, 'dropdown-placeholder');
                //this.selEl.parentNode.appendChild(dummy);
                insertAfter(dummy, this.selEl);

            }


            dummy.style.height = csPlaceholderHeight + 'px';
            dummy.style.width = this.selEl.offsetWidth + 'px';

            this.selEl.data = dummy;



            this.selEl.style.position = 'absolute';
            var offsetselEl = offset(this.selEl);

            this.selEl.style.left = offsetselEl.left + 'px';
            this.selEl.style.top = offsetselEl.top + 'px';

            container.appendChild(this.selEl);

            // decide backdrop's scale factor depending on the content height
            var contentHeight = csOptions.offsetHeight;
            var originalHeight = csPlaceholder.offsetHeight;

            var contentWidth = csOptions.offsetWidth;
            var originalWidth = csPlaceholder.offsetWidth;

            var scaleV = contentHeight / originalHeight;
            var scaleH = (contentWidth > originalWidth) ? contentWidth / originalWidth : 1.05;
            //backdrop.style.transform = backdrop.style.webkitTransform = backdrop.style.MozTransform = backdrop.style.msTransform = backdrop.style.OTransform = 'scale3d(' + scaleH + ', ' + scaleV + ', 1)';
            backdrop.style.transform = backdrop.style.webkitTransform = backdrop.style.MozTransform = backdrop.style.msTransform = backdrop.style.OTransform = 'scale3d(' + 1 + ', ' + scaleV + ', 1)';

            if (!mask) {
                mask = document.createElement('div');
                classie.add(mask, 'dropdown-mask');
                container.appendChild(mask);
            }

            mask.style.display = 'block';

            classie.add(this.selEl, 'cs-active');

            var resizedWidth = (csPlaceholderWidth < csOptionsWidth) ? csOptionsWidth : csPlaceholderWidth;

            this.selEl.style.width = resizedWidth + 'px';
            this.selEl.style.height = originalHeight + 'px';
            csOptions.style.width = '100%';

            setTimeout(function() {
                csOptions.style.overflowY = 'auto';
            }, 300);

        }
    }

    /**
     * change option - the new value is set
     */
    SelectFx.prototype._changeOption = function() {
        // if pre selected current (if we navigate with the keyboard)...
        if (typeof this.preSelCurrent != 'undefined' && this.preSelCurrent !== -1) {
            this.current = this.preSelCurrent;
            this.preSelCurrent = -1;
        }

        // current option
        var opt = this.selOpts[this.current];

        // update current selected value
        this.selPlaceholder.textContent = opt.textContent;

        // change native select element´s value
        this.el.value = opt.getAttribute('data-value');

        // remove class cs-selected from old selected option and add it to current selected option
        var oldOpt = this.selEl.querySelector('li.cs-selected');
        if (oldOpt) {
            classie.remove(oldOpt, 'cs-selected');
        }
        classie.add(opt, 'cs-selected');

        // if there´s a link defined
        if (opt.getAttribute('data-link')) {
            // open in new tab?
            if (this.options.newTab) {
                window.open(opt.getAttribute('data-link'), '_blank');
            } else {
                window.location = opt.getAttribute('data-link');
            }
        }

        // callback
        this.options.onChange(this.el);
    }

    /**
     * returns true if select element is opened
     */
    SelectFx.prototype._isOpen = function(opt) {
        return classie.has(this.selEl, 'cs-active');
    }

    /**
     * removes the focus class from the option
     */
    SelectFx.prototype._removeFocus = function(opt) {
        var focusEl = this.selEl.querySelector('li.cs-focus')
        if (focusEl) {
            classie.remove(focusEl, 'cs-focus');
        }
    }

    /**
     * add to global namespace
     */
    window.SelectFx = SelectFx;

})(window);
/* ============================================================
 * Pages Chat
 * ============================================================ */

(function($) {
  'use strict';
  //To Open Chat When Clicked
  $('[data-chat-input]').on('keypress',function(e){
    if(e.which == 13) {
       var el = $(this).attr('data-chat-conversation');
       $(el).append('<div class="message clearfix">'+
        '<div class="chat-bubble from-me">'+$(this).val()+
        '</div></div>');
       $(this).val('');
    }
  });

})(window.jQuery);
/* ============================================================
 * Pages Circular Progress
 * ============================================================ */

(function($) {
    'use strict';
    // CIRCULAR PROGRESS CLASS DEFINITION
    // ======================

    var Progress = function(element, options) {
        this.$element = $(element);
        this.options = $.extend(true, {}, $.fn.circularProgress.defaults, options);


        // start adding to to DOM
        this.$container = $('<div class="progress-circle"></div>');

        this.$element.attr('data-color') && this.$container.addClass('progress-circle-' + this.$element.attr('data-color'));
        this.$element.attr('data-thick') && this.$container.addClass('progress-circle-thick');

        this.$pie = $('<div class="pie"></div>');

        this.$pie.$left = $('<div class="left-side half-circle"></div>');
        this.$pie.$right = $('<div class="right-side half-circle"></div>');

        this.$pie.append(this.$pie.$left).append(this.$pie.$right);

        this.$container.append(this.$pie).append('<div class="shadow"></div>');

        this.$element.after(this.$container);
        // end DOM adding

        this.val = this.$element.val();
        var deg = perc2deg(this.val);


        if (this.val <= 50) {
            this.$pie.$right.css('transform', 'rotate(' + deg + 'deg)');
        } else {
            this.$pie.css('clip', 'rect(auto, auto, auto, auto)');
            this.$pie.$right.css('transform', 'rotate(180deg)');
            this.$pie.$left.css('transform', 'rotate(' + deg + 'deg)');
        }

    }
    Progress.VERSION = "1.0.0";

    Progress.prototype.value = function(val) {
        if (typeof val == 'undefined') return;

        var deg = perc2deg(val);

        this.$pie.removeAttr('style');

        this.$pie.$right.removeAttr('style');
        this.$pie.$left.removeAttr('style');

        if (val <= 50) {
            this.$pie.$right.css('transform', 'rotate(' + deg + 'deg)');
        } else {
            this.$pie.css('clip', 'rect(auto, auto, auto, auto)');
            this.$pie.$right.css('transform', 'rotate(180deg)');
            this.$pie.$left.css('transform', 'rotate(' + deg + 'deg)');
        }

    }

    // CIRCULAR PROGRESS PLUGIN DEFINITION
    // =======================
    function Plugin(option) {
        return this.filter(':input').each(function() {
            var $this = $(this);
            var data = $this.data('pg.circularProgress');
            var options = typeof option == 'object' && option;

            if (!data) $this.data('pg.circularProgress', (data = new Progress(this, options)));
            if (typeof option == 'string') data[option]();
            else if (options.hasOwnProperty('value')) data.value(options.value);
        })
    }

    var old = $.fn.circularProgress

    $.fn.circularProgress = Plugin
    $.fn.circularProgress.Constructor = Progress


    $.fn.circularProgress.defaults = {
        value: 0
    }

    // CIRCULAR PROGRESS NO CONFLICT
    // ====================

    $.fn.circularProgress.noConflict = function() {
        $.fn.circularProgress = old;
        return this;
    }

    // CIRCULAR PROGRESS DATA API
    //===================

    $(window).on('load', function() {
        $('[data-pages-progress="circle"]').each(function() {
            var $progress = $(this)
            $progress.circularProgress($progress.data())
        })
    })

    function perc2deg(p) {
        return parseInt(p / 100 * 360);
    }

    // TODO: Add API to change size, stroke width, color

})(window.jQuery);

/* ============================================================
 * Pages Notifications
 * ============================================================ */

(function($) {

    'use strict';

    var Notification = function(container, options) {

        var self = this;

        // Element collection
        self.container = $(container); // 'body' recommended
        self.notification = $('<div class="pgn push-on-sidebar-open"></div>');
        self.options = $.extend(true, {}, $.fn.pgNotification.defaults, options);

        if (!self.container.find('.pgn-wrapper[data-position=' + this.options.position + ']').length) {
            self.wrapper = $('<div class="pgn-wrapper" data-position="' + this.options.position + '"></div>');
            self.container.append(self.wrapper);
        } else {
            self.wrapper = $('.pgn-wrapper[data-position=' + this.options.position + ']');
        }

        self.alert = $('<div class="alert"></div>');
        self.alert.addClass('alert-' + self.options.type);

        if (self.options.style == 'bar') {
            new BarNotification();
        } else if (self.options.style == 'flip') {
            new FlipNotification();
        } else if (self.options.style == 'circle') {
            new CircleNotification();
        } else if (self.options.style == 'simple') {
            new SimpleNotification();
        } else { // default = 'simple'
            new SimpleNotification();
        }

        // Notification styles
        function SimpleNotification() {

            self.notification.addClass('pgn-simple');

            self.alert.append(self.options.message);
            if (self.options.showClose) {
                var close = $('<button type="button" class="close" data-dismiss="alert"></button>')
                    .append('<span aria-hidden="true">&times;</span>')
                    .append('<span class="sr-only">Close</span>');

                self.alert.prepend(close);
            }

        }

        function BarNotification() {

            self.notification.addClass('pgn-bar');

            self.alert.append('<span>' + self.options.message + '</span>');
            self.alert.addClass('alert-' + self.options.type);


            if (self.options.showClose) {
                var close = $('<button type="button" class="close" data-dismiss="alert"></button>')
                    .append('<span aria-hidden="true">&times;</span>')
                    .append('<span class="sr-only">Close</span>');

                self.alert.prepend(close);
            }

        }

        function CircleNotification() {

            self.notification.addClass('pgn-circle');

            var table = '<div>';
            if (self.options.thumbnail) {
                table += '<div class="pgn-thumbnail"><div>' + self.options.thumbnail + '</div></div>';
            }

            table += '<div class="pgn-message"><div>';

            if (self.options.title) {
                table += '<p class="bold">' + self.options.title + '</p>';
            }
            table += '<p>' + self.options.message + '</p></div></div>';
            table += '</div>';

            if (self.options.showClose) {
                table += '<button type="button" class="close" data-dismiss="alert">';
                table += '<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>';
                table += '</button>';
            }


            self.alert.append(table);
            self.alert.after('<div class="clearfix"></div>');

        }

        function FlipNotification() {

            self.notification.addClass('pgn-flip');
            self.alert.append("<span>" + self.options.message + "</span>");
            if (self.options.showClose) {
                var close = $('<button type="button" class="close" data-dismiss="alert"></button>')
                    .append('<span aria-hidden="true">&times;</span>')
                    .append('<span class="sr-only">Close</span>');

                self.alert.prepend(close);
            }

        }

        self.notification.append(self.alert);

        // bind to Bootstrap closed event for alerts 
        self.alert.on('closed.bs.alert', function() {
            self.notification.remove();
            self.options.onClosed();
            // refresh layout after removal
        });

        return this; // enable chaining
    };

    Notification.VERSION = "1.0.0";
    
    Notification.prototype.show = function() {

        // TODO: add fadeOut animation on show as option
        this.wrapper.prepend(this.notification);

        this.options.onShown();

        if (this.options.timeout != 0) {
            var _this = this;
            // settimeout removes scope. use .bind(this)
            setTimeout(function() {
                this.notification.fadeOut("slow", function() {
                    $(this).remove();
                    _this.options.onClosed();
                });
            }.bind(this), this.options.timeout);
        }

    };

    $.fn.pgNotification = function(options) {
        return new Notification(this, options);
    };

    $.fn.pgNotification.defaults = {
        style: 'simple',
        message: null,
        position: 'top-right',
        type: 'info',
        showClose: true,
        timeout: 4000,
        onShown: function() {},
        onClosed: function() {}
    }
})(window.jQuery);
/* ============================================================
 * Pages Portlet
 * ============================================================ */

(function($) {
    'use strict';
    // PORTLET CLASS DEFINITION
    // ======================

    var Portlet = function(element, options) {
        this.$element = $(element);
        this.options = $.extend(true, {}, $.fn.portlet.defaults, options);
        this.$loader = null;
        this.$body = this.$element.find('.panel-body');
    }
    Portlet.VERSION = "1.0.0";
    // Button actions
    Portlet.prototype.collapse = function() {
        var icon = this.$element.find(this.options.collapseButton + ' > i');
        var heading = this.$element.find('.panel-heading');

        this.$body.stop().slideToggle("fast");

        if (this.$element.hasClass('panel-collapsed')) {
            this.$element.removeClass('panel-collapsed');
            icon.removeClass().addClass('pg-arrow_maximize');
            $.isFunction(this.options.onExpand) && this.options.onExpand(this);
            return
        }
        this.$element.addClass('panel-collapsed');
        icon.removeClass().addClass('pg-arrow_minimize');
        $.isFunction(this.options.onCollapse) && this.options.onCollapse(this);
    }

    Portlet.prototype.close = function() {
        this.$element.remove();
        $.isFunction(this.options.onClose) && this.options.onClose(this);
    }

    Portlet.prototype.maximize = function() {
        var icon = this.$element.find(this.options.maximizeButton + ' > i');

        if (this.$element.hasClass('panel-maximized')) {
            this.$element.removeClass('panel-maximized');
            icon.removeClass('pg-fullscreen_restore').addClass('pg-fullscreen');
            $.isFunction(this.options.onRestore) && this.options.onRestore(this);
        } else {
            this.$element.addClass('panel-maximized');
            icon.removeClass('pg-fullscreen').addClass('pg-fullscreen_restore');
            $.isFunction(this.options.onMaximize) && this.options.onMaximize(this);
        }
    }

    // Options
    Portlet.prototype.refresh = function(refresh) {
        var toggle = this.$element.find(this.options.refreshButton);

        if (refresh) {
            if (this.$loader && this.$loader.is(':visible')) return;
            if (!$.isFunction(this.options.onRefresh)) return; // onRefresh() not set
            this.$loader = $('<div class="portlet-progress"></div>');
            this.$loader.css({
                'background-color': 'rgba(' + this.options.overlayColor + ',' + this.options.overlayOpacity + ')'

            });

            var elem = '';
            if (this.options.progress == 'circle') {
                elem += '<div class="progress-circle-indeterminate progress-circle-' + this.options.progressColor + '"></div>';
            } else if (this.options.progress == 'bar') {

                elem += '<div class="progress progress-small">';
                elem += '    <div class="progress-bar-indeterminate progress-bar-' + this.options.progressColor + '"></div>';
                elem += '</div>';
            } else if (this.options.progress == 'circle-lg') {
                toggle.addClass('refreshing');
                var iconOld = toggle.find('> i').first();
                var iconNew;
                if (!toggle.find('[class$="-animated"]').length) {
                    iconNew = $('<i/>');
                    iconNew.css({
                        'position': 'absolute',
                        'top': iconOld.position().top,
                        'left': iconOld.position().left
                    });
                    iconNew.addClass('portlet-icon-refresh-lg-' + this.options.progressColor + '-animated');
                    toggle.append(iconNew);
                } else {
                    iconNew = toggle.find('[class$="-animated"]');
                }

                iconOld.addClass('fade');
                iconNew.addClass('active');


            } else {
                elem += '<div class="progress progress-small">';
                elem += '    <div class="progress-bar-indeterminate progress-bar-' + this.options.progressColor + '"></div>';
                elem += '</div>';
            }

            this.$loader.append(elem);
            this.$element.append(this.$loader);

            // Start Fix for FF: pre-loading animated to SVGs
            var _loader = this.$loader;
            setTimeout(function() {
                this.$loader.remove();
                this.$element.append(_loader);
            }.bind(this), 300);
            // End fix
            this.$loader.fadeIn();

            $.isFunction(this.options.onRefresh) && this.options.onRefresh(this);

        } else {
            var _this = this;
            this.$loader.fadeOut(function() {
                $(this).remove();
                if (_this.options.progress == 'circle-lg') {
                    var iconNew = toggle.find('.active');
                    var iconOld = toggle.find('.fade');
                    iconNew.removeClass('active');
                    iconOld.removeClass('fade');
                    toggle.removeClass('refreshing');

                }
                _this.options.refresh = false;
            });
        }
    }

    Portlet.prototype.error = function(error) {
        if (error) {
            var _this = this;
            this.$element.pgNotification({
                style: 'bar',
                message: error,
                position: 'top',
                timeout: 0,
                type: 'danger',
                onShown: function() {
                    _this.$loader.find('> div').fadeOut()
                },
                onClosed: function() {
                    _this.refresh(false)
                }
            }).show();
        }
    }

    // PORTLET PLUGIN DEFINITION
    // =======================

    function Plugin(option) {
        return this.each(function() {
            var $this = $(this);
            var data = $this.data('pg.portlet');
            var options = typeof option == 'object' && option;

            if (!data) $this.data('pg.portlet', (data = new Portlet(this, options)));
            if (typeof option == 'string') data[option]();
            else if (options.hasOwnProperty('refresh')) data.refresh(options.refresh);
            else if (options.hasOwnProperty('error')) data.error(options.error);
        })
    }

    var old = $.fn.portlet

    $.fn.portlet = Plugin
    $.fn.portlet.Constructor = Portlet


    $.fn.portlet.defaults = {
        progress: 'circle',
        progressColor: 'master',
        refresh: false,
        error: null,
        overlayColor: '255,255,255',
        overlayOpacity: 0.8,
        refreshButton: '[data-toggle="refresh"]',
        maximizeButton: '[data-toggle="maximize"]',
        collapseButton: '[data-toggle="collapse"]',
        closeButton: '[data-toggle="close"]'

        // onRefresh: function(portlet) {},
        // onCollapse: function(portlet) {},
        // onExpand: function(portlet) {},
        // onMaximize: function(portlet) {},
        // onRestore: function(portlet) {},
        // onClose: function(portlet) {}
    }

    // PORTLET NO CONFLICT
    // ====================

    $.fn.portlet.noConflict = function() {
        $.fn.portlet = old;
        return this;
    }

    // PORTLET DATA API
    //===================

    $(document).on('click.pg.portlet.data-api', '[data-toggle="collapse"]', function(e) {
        var $this = $(this);
        var $target = $this.closest('.panel');
        if ($this.is('a')) e.preventDefault();
        $target.data('pg.portlet') && $target.portlet('collapse');
    })

    $(document).on('click.pg.portlet.data-api', '[data-toggle="close"]', function(e) {
        var $this = $(this);
        var $target = $this.closest('.panel');
        if ($this.is('a')) e.preventDefault();
        $target.data('pg.portlet') && $target.portlet('close');
    })

    $(document).on('click.pg.portlet.data-api', '[data-toggle="refresh"]', function(e) {
        var $this = $(this);
        var $target = $this.closest('.panel');
        if ($this.is('a')) e.preventDefault();
        $target.data('pg.portlet') && $target.portlet({
            refresh: true
        })
    })

    $(document).on('click.pg.portlet.data-api', '[data-toggle="maximize"]', function(e) {
        var $this = $(this);
        var $target = $this.closest('.panel');
        if ($this.is('a')) e.preventDefault();
        $target.data('pg.portlet') && $target.portlet('maximize');
    })

    $(window).on('load', function() {
        $('[data-pages="portlet"]').each(function() {
            var $portlet = $(this)
            $portlet.portlet($portlet.data())
        })
    })

})(window.jQuery);

/* ============================================================
 * Pages Mobile View
 * ============================================================ */
(function($) {
    'use strict';

    var MobileView = function(element, options) {
        var self = this;
        self.options = $.extend(true, {}, $.fn.pgMobileViews.defaults, options);
        self.element = $(element);
        self.element.on('click', function(e) {
            e.preventDefault();
            var data = self.element.data();
            var el = $(data.viewPort);
            var toView = data.toggleView;
            if (data.toggleView != null) {
                el.children().last().children('.view').hide();
                $(data.toggleView).show();
            }
            else{
                 toView = el.last();
            }
            el.toggleClass(data.viewAnimation);
            self.options.onNavigate(toView, data.viewAnimation);
            return false;
        })
        return this; // enable chaining
    };
    $.fn.pgMobileViews = function(options) {
        return new MobileView(this, options);
    };

    $.fn.pgMobileViews.defaults = {
        //Returns Target View & Animation Type
        onNavigate: function(view, animation) {}
    }
    // MOBILE VIEW DATA API
    //===================

    $(window).on('load', function() {
        $('[data-navigate="view"]').each(function() {
            var $mobileView = $(this)
            $mobileView.pgMobileViews();
        })
    });
})(window.jQuery);
/* ============================================================
 * Pages Quickview Plugin
 * ============================================================ */

(function($) {
    'use strict';
    // QUICKVIEW CLASS DEFINITION
    // ======================

    var Quickview = function(element, options) {
        this.$element = $(element);
        this.options = $.extend(true, {}, $.fn.quickview.defaults, options);
        this.bezierEasing = [.05, .74, .27, .99];
        var _this = this;

        $(this.options.notes).on('click', '.list > ul > li', function(e) {
            var note = $(this).find('.note-preview');
            var note = $(this).find('.note-preview');
            $(_this.options.noteEditor).html(note.html());
            $(_this.options.notes).toggleClass('push');
        });
        $(this.options.notes).on('click', '.list > ul > li .checkbox', function(e) {
            e.stopPropagation();
        });
        $(this.options.notes).on('click', _this.options.backButton, function(e) {
            $(_this.options.notes).find('.toolbar > li > a').removeClass('active');
            $(_this.options.notes).toggleClass('push');
        });
        $(this.options.deleteNoteButton).click(function(e) {
            e.preventDefault();
            $(this).toggleClass('selected');
            $(_this.options.notes).find('.list > ul > li .checkbox').fadeToggle("fast");
            $(_this.options.deleteNoteConfirmButton).fadeToggle("fast").removeClass('hide');
        });
        $(this.options.newNoteButton).click(function(e) {
            e.preventDefault();
            $(_this.options.noteEditor).html('');
        });

        $(this.options.deleteNoteConfirmButton).click(function() {
            var checked = $(_this.options.notes).find('input[type=checkbox]:checked');
            checked.each(function() {
                $(this).parents('li').remove();
            });
        });
        $(this.options.notes).on('click', '.toolbar > li > a', function(e) {
            //e.preventDefault();
            var command = $(this).attr('data-action');
            document.execCommand(command, false, null);
            $(this).toggleClass('active');
        });

    }
    Quickview.VERSION = "1.0.0";

    // QUICKVIEW PLUGIN DEFINITION
    // =======================
    function Plugin(option) {
        return this.each(function() {
            var $this = $(this);
            var data = $this.data('pg.quickview');
            var options = typeof option == 'object' && option;

            if (!data) $this.data('pg.quickview', (data = new Quickview(this, options)));
            if (typeof option == 'string') data[option]();
        })
    }

    var old = $.fn.quickview

    $.fn.quickview = Plugin
    $.fn.quickview.Constructor = Quickview


    $.fn.quickview.defaults = {
        notes: '#note-views',
        alerts: '#alerts',
        chat: '#chat',
        notesList: '.list',
        noteEditor: '.quick-note-editor',
        deleteNoteButton: '.delete-note-link',
        deleteNoteConfirmButton: '.btn-remove-notes',
        newNoteButton: '.new-note-link',
        backButton: '.close-note-link'
    }

    // QUICKVIEW NO CONFLICT
    // ====================

    $.fn.quickview.noConflict = function() {
        $.fn.quickview = old;
        return this;
    }

    // QUICKVIEW DATA API
    //===================

    $(window).on('load', function() {

        $('[data-pages="quickview"]').each(function() {
            var $quickview = $(this)
            $quickview.quickview($quickview.data())
        })
    });


    $(document).on('click.pg.quickview.data-api touchstart', '[data-toggle="quickview"]', function(e) {
        var elem = $(this).attr('data-toggle-element');
        if (Modernizr.csstransitions) {
            $(elem).toggleClass('open');
        } else {
            var width = $(elem).width();
            if (!$(elem).hasClass('open-ie')) {
                $(elem).stop().animate({
                    right: -1 * width
                }, 400, $.bez([.05, .74, .27, .99]), function() {
                    $(elem).addClass('open-ie')
                });
            } else {
                $(elem).stop().animate({
                    right: 0
                }, 400, $.bez([.05, .74, .27, .99]), function() {
                    $(elem).removeClass('open-ie')
                });
            }
        }
        e.preventDefault();
    })

})(window.jQuery);
/* ============================================================
 * Pages Parallax Plugin
 * ============================================================ */

(function($) {
    'use strict';
    // PARALLAX CLASS DEFINITION
    // ======================

    var Parallax = function(element, options) {
        this.$element = $(element);
        this.options = $.extend(true, {}, $.fn.parallax.defaults, options);
        this.$coverPhoto = this.$element.find('.cover-photo');
        // TODO: rename .inner to .page-cover-content
        this.$content = this.$element.find('.inner');

        // if cover photo img is found make it a background-image
        if (this.$coverPhoto.find('> img').length) {
            var img = this.$coverPhoto.find('> img');
            this.$coverPhoto.css('background-image', 'url(' + img.attr('src') + ')');
            img.remove();
        }

    }
    Parallax.VERSION = "1.0.0";

    Parallax.prototype.animate = function() {

        var scrollPos;
        var pagecoverWidth = this.$element.height();
        //opactiy to text starts at 50% scroll length
        var opacityKeyFrame = pagecoverWidth * 50 / 100;
        var direction = 'translateX';

        scrollPos = $(window).scrollTop();
        direction = 'translateY';


        this.$coverPhoto.css({
            'transform': direction + '(' + scrollPos * this.options.speed.coverPhoto + 'px)'
        });

        this.$content.css({
            'transform': direction + '(' + scrollPos * this.options.speed.content + 'px)',
        });

        if (scrollPos > opacityKeyFrame) {
            this.$content.css({
                'opacity': 1 - scrollPos / 1200
            });
        } else {
            this.$content.css({
                'opacity': 1
            });
        }

    }

    // PARALLAX PLUGIN DEFINITION
    // =======================
    function Plugin(option) {
        return this.each(function() {
            var $this = $(this);
            var data = $this.data('pg.parallax');
            var options = typeof option == 'object' && option;

            if (!data) $this.data('pg.parallax', (data = new Parallax(this, options)));
            if (typeof option == 'string') data[option]();
        })
    }

    var old = $.fn.parallax

    $.fn.parallax = Plugin
    $.fn.parallax.Constructor = Parallax


    $.fn.parallax.defaults = {
        speed: {
            coverPhoto: 0.3,
            content: 0.17
        }
    }

    // PARALLAX NO CONFLICT
    // ====================
    
    $.fn.parallax.noConflict = function() {
        $.fn.parallax = old;
        return this;
    }

    // PARALLAX DATA API
    //===================

    $(window).on('load', function() {

        $('[data-pages="parallax"]').each(function() {
            var $parallax = $(this)
            $parallax.parallax($parallax.data())
        })
    });

    $(window).on('scroll', function() {
        // Disable parallax for Touch devices
        if (Modernizr.touch) {
            return;
        }
        $('[data-pages="parallax"]').parallax('animate');
    });

})(window.jQuery);
 /* ============================================================
  * Pages Sidebar
  * ============================================================ */

 (function($) {
    'use strict';
     // SIDEBAR CLASS DEFINITION
     // ======================

    var Sidebar = function(element, options) {
         this.$element = $(element);
         this.$body = $('body');
         this.options = $.extend(true, {}, $.fn.sidebar.defaults, options);

         this.bezierEasing = [.05, .74, .27, .99];
         this.cssAnimation = true;
         this.css3d = true;

         this.sideBarWidth = 280;
         this.sideBarWidthCondensed = 280 - 70;

         

         this.$sidebarMenu = this.$element.find('.sidebar-menu > ul');
         this.$pageContainer = $(this.options.pageContainer);
         

         if (!this.$sidebarMenu.length) return;

         // apply perfectScrollbar plugin only for desktops
         ($.Pages.getUserAgent() == 'desktop') && this.$sidebarMenu.scrollbar({
             ignoreOverlay: false,
             disableBodyScroll :(this.$element.data("disableBodyScroll") == true)? true : false
         });


         if (!Modernizr.csstransitions)
             this.cssAnimation = false;
         if (!Modernizr.csstransforms3d)
             this.css3d = false;

         // Bind events
         // Toggle sub menus
         // In Angular Binding is done using a pg-sidebar directive
         (typeof angular === 'undefined') && $(document).on('click', '.sidebar-menu a', function(e) {

             if ($(this).parent().children('.sub-menu') === false) {
                 return;
             }
             var el = $(this);
             var parent = $(this).parent().parent();
             var li = $(this).parent();
             var sub = $(this).parent().children('.sub-menu');

             if(li.hasClass("open active")){
                el.children('.arrow').removeClass("open active");
                sub.slideUp(200, function() {
                    li.removeClass("open active"); 
                });
                
             }else{
                parent.children('li.open').children('.sub-menu').slideUp(200);
                parent.children('li.open').children('a').children('.arrow').removeClass('open active');
                parent.children('li.open').removeClass("open active");
                el.children('.arrow').addClass("open active");
                sub.slideDown(200, function() {
                    li.addClass("open active");

                });
             }
             //e.preventDefault();
         });

         // Toggle sidebar
         $('.sidebar-slide-toggle').on('click touchend', function(e) {
             e.preventDefault();
             $(this).toggleClass('active');
             var el = $(this).attr('data-pages-toggle');
             if (el != null) {
                 $(el).toggleClass('show');
             }
         });

         var _this = this;

         function sidebarMouseEnter(e) {
            var _sideBarWidthCondensed = _this.$body.hasClass("rtl") ? -_this.sideBarWidthCondensed : _this.sideBarWidthCondensed;
           
             var menuOpenCSS = (this.css3d == true ? 'translate3d(' + _sideBarWidthCondensed + 'px, 0,0)' : 'translate(' + _sideBarWidthCondensed + 'px, 0)');

             if ($.Pages.isVisibleSm() || $.Pages.isVisibleXs()) {
                 return false
             }
             if ($('.close-sidebar').data('clicked')) {
                 return;
             }
             if (_this.$body.hasClass('menu-pin'))
                 return;
             if (_this.cssAnimation) {
                 _this.$element.css({
                     'transform': menuOpenCSS
                 });
                 _this.$body.addClass('sidebar-visible');
             } else {
                 _this.$element.stop().animate({
                     left: '0px'
                 }, 400, $.bez(_this.bezierEasing), function() {
                     _this.$body.addClass('sidebar-visible');
                 });
             }
         }

         function sidebarMouseLeave(e) {
            var menuClosedCSS = (_this.css3d == true ? 'translate3d(0, 0,0)' : 'translate(0, 0)');

             if ($.Pages.isVisibleSm() || $.Pages.isVisibleXs()) {
                 return false
             }
             if (typeof e != 'undefined') {
                 var target = $(e.target);
                 if (target.parent('.page-sidebar').length) {
                     return;
                 }
             }
             if (_this.$body.hasClass('menu-pin'))
                 return;

             if ($('.sidebar-overlay-slide').hasClass('show')) {
                 $('.sidebar-overlay-slide').removeClass('show')
                 $("[data-pages-toggle']").removeClass('active')

             }

             if (_this.cssAnimation) {
                 _this.$element.css({
                     'transform': menuClosedCSS
                 });
                 _this.$body.removeClass('sidebar-visible');
             } else {

                 _this.$element.stop().animate({
                     left: '-' + _this.sideBarWidthCondensed + 'px'
                 }, 400, $.bez(_this.bezierEasing), function() {

                     _this.$body.removeClass('sidebar-visible')
                     setTimeout(function() {
                         $('.close-sidebar').data({
                             clicked: false
                         });
                     }, 100);
                 });
             }
         }


         this.$element.bind('mouseenter mouseleave', sidebarMouseEnter);
         this.$pageContainer.bind('mouseover', sidebarMouseLeave);

     }


     // Toggle sidebar for mobile view   
     Sidebar.prototype.toggleSidebar = function(toggle) {
         var timer;
         var bodyColor = $('body').css('background-color');
         $('.page-container').css('background-color', bodyColor);
         if (this.$body.hasClass('sidebar-open')) {
             this.$body.removeClass('sidebar-open');
             timer = setTimeout(function() {
                 this.$element.removeClass('visible');
             }.bind(this), 400);
         } else {
             clearTimeout(timer);
             this.$element.addClass('visible');
             setTimeout(function() {
                 this.$body.addClass('sidebar-open');
             }.bind(this), 10);
             setTimeout(function(){
                // remove background color
                $('.page-container').css({'background-color': ''});
             },1000);

         }

     }

     Sidebar.prototype.togglePinSidebar = function(toggle) {
         if (toggle == 'hide') {
             this.$body.removeClass('menu-pin');
         } else if (toggle == 'show') {
             this.$body.addClass('menu-pin');
         } else {
             this.$body.toggleClass('menu-pin');
         }

     }


     // SIDEBAR PLUGIN DEFINITION
     // =======================
     function Plugin(option) {
         return this.each(function() {
             var $this = $(this);
             var data = $this.data('pg.sidebar');
             var options = typeof option == 'object' && option;

             if (!data) $this.data('pg.sidebar', (data = new Sidebar(this, options)));
             if (typeof option == 'string') data[option]();
         })
     }

     var old = $.fn.sidebar;

     $.fn.sidebar = Plugin;
     $.fn.sidebar.Constructor = Sidebar;


     $.fn.sidebar.defaults = {
         pageContainer: '.page-container'
     }

     // SIDEBAR PROGRESS NO CONFLICT
     // ====================

     $.fn.sidebar.noConflict = function() {
         $.fn.sidebar = old;
         return this;
     }

     // SIDEBAR PROGRESS DATA API
     //===================

     $(document).on('click.pg.sidebar.data-api', '[data-toggle-pin="sidebar"]', function(e) {
         e.preventDefault();
         var $this = $(this);
         var $target = $('[data-pages="sidebar"]');
         $target.data('pg.sidebar').togglePinSidebar();
         return false;
     })
     $(document).on('click.pg.sidebar.data-api touchstart', '[data-toggle="sidebar"]', function(e) {
         e.preventDefault();
         var $this = $(this);
         var $target = $('[data-pages="sidebar"]');
         $target.data('pg.sidebar').toggleSidebar();
         return false
     })

 })(window.jQuery);
/* ============================================================
 * Pages Search overlay
 * ============================================================ */

(function($) {

    'use strict';

    // SEARCH CLASS DEFINITION
    // ======================

    var Search = function(element, options) {
        this.$element = $(element);
        this.options = $.extend(true, {}, $.fn.search.defaults, options);
        this.init();
    }
    Search.VERSION = "1.0.0";

    Search.prototype.init = function() {
        var _this = this;
        this.pressedKeys = [];
        this.ignoredKeys = [];

        //Cache elements
        this.$searchField = this.$element.find(this.options.searchField);
        this.$closeButton = this.$element.find(this.options.closeButton);
        this.$suggestions = this.$element.find(this.options.suggestions);
        this.$brand = this.$element.find(this.options.brand);

        this.$searchField.on('keyup', function(e) {
            _this.$suggestions && _this.$suggestions.html($(this).val());
        });

        this.$searchField.on('keyup', function(e) {
            _this.options.onKeyEnter && _this.options.onKeyEnter(_this.$searchField.val());
            if (e.keyCode == 13) { //Enter pressed
                e.preventDefault();
                _this.options.onSearchSubmit && _this.options.onSearchSubmit(_this.$searchField.val());
            }
            if ($('body').hasClass('overlay-disabled')) {
                return 0;
            }

        });

        this.$closeButton.on('click', function() {
            _this.toggleOverlay('hide');
        });

        this.$element.on('click', function(e) {
            if ($(e.target).data('pages') == 'search') {
                _this.toggleOverlay('hide');
            }
        });

        $(document).on('keypress.pg.search', function(e) {
            _this.keypress(e);
        });

        $(document).on('keyup', function(e) {
            // Dismiss overlay on ESC is pressed
            if (_this.$element.is(':visible') && e.keyCode == 27) {
                _this.toggleOverlay('hide');
            }
        });

    }


    Search.prototype.keypress = function(e) {

        e = e || event; // to deal with IE
        var nodeName = e.target.nodeName;
        if ($('body').hasClass('overlay-disabled') ||
            $(e.target).hasClass('js-input') ||
            nodeName == 'INPUT' ||
            nodeName == 'TEXTAREA') {
            return;
        }

        if (e.which !== 0 && e.charCode !== 0 && !e.ctrlKey && !e.metaKey && !e.altKey && e.keyCode != 27) {
            this.toggleOverlay('show', String.fromCharCode(e.keyCode | e.charCode));
        }
    }


    Search.prototype.toggleOverlay = function(action, key) {
        var _this = this;
        if (action == 'show') {
            this.$element.removeClass("hide");
            this.$element.fadeIn("fast");
            if (!this.$searchField.is(':focus')) {
                this.$searchField.val(key);
                setTimeout(function() {
                    this.$searchField.focus();
                    var tmpStr = this.$searchField.val();
                    this.$searchField.val('');
                    this.$searchField.val(tmpStr);
                }.bind(this), 10);
            }

            this.$element.removeClass("closed");
            this.$brand.toggleClass('invisible');
            $(document).off('keypress.pg.search');
        } else {
            this.$element.fadeOut("fast").addClass("closed");
            this.$searchField.val('').blur();
            setTimeout(function() {
                if ((this.$element).is(':visible')) {
                    this.$brand.toggleClass('invisible');
                }
                $(document).on('keypress.pg.search', function(e) {
                    _this.keypress(e);
                });
            }.bind(this), 10);
        }
    };

    // SEARCH PLUGIN DEFINITION
    // =======================


    function Plugin(option) {
        return this.each(function() {
            var $this = $(this);
            var data = $this.data('pg.search');
            var options = typeof option == 'object' && option;

            if (!data) {
                $this.data('pg.search', (data = new Search(this, options)));

            }
            if (typeof option == 'string') data[option]();
        })
    }

    var old = $.fn.search

    $.fn.search = Plugin
    $.fn.search.Constructor = Search

    $.fn.search.defaults = {
        searchField: '[data-search="searchField"]',
        closeButton: '[data-search="closeButton"]',
        suggestions: '[data-search="suggestions"]',
        brand: '[data-search="brand"]'
    }

    // SEARCH NO CONFLICT
    // ====================

    $.fn.search.noConflict = function() {
        $.fn.search = old;
        return this;
    }

    $(document).on('click.pg.search.data-api', '[data-toggle="search"]', function(e) {
        var $this = $(this);
        var $target = $('[data-pages="search"]');
        if ($this.is('a')) e.preventDefault();
        $target.data('pg.search').toggleOverlay('show');
    })


})(window.jQuery);
(function($) {
    'use strict';
    // Initialize layouts and plugins
    (typeof angular === 'undefined') && $.Pages.init();
})(window.jQuery);
 $(document).ready(function() {
        // Initializes search overlay plugin.
        // Replace onSearchSubmit() and onKeyEnter() with 
        // your logic to perform a search and display results
        $('[data-pages="search"]').search({
            searchField: '#overlay-search',
            closeButton: '.overlay-close',
            suggestions: '#overlay-suggestions',
            brand: '.brand',
            onSearchSubmit: function(searchString) {
                console.log("Search for: " + searchString);
            },
            onKeyEnter: function(searchString) {
                console.log("Live search for: " + searchString);
                var searchField = $('#overlay-search');
                var searchResults = $('.search-results');
                clearTimeout($.data(this, 'timer'));
                searchResults.fadeOut("fast");
                var wait = setTimeout(function() {
                    searchResults.find('.result-name').each(function() {
                        if (searchField.val().length != 0) {
                            $(this).html(searchField.val());
                            searchResults.fadeIn("fast");
                        }
                    });
                }, 500);
                $(this).data('timer', wait);
            }
        });
    })
/*
 * Give default behaviours for window.console if browser doesn't
 */

if (typeof window.console === 'undefined') {
	window.console = {
		log: function () {
		},
		warn: function () {
		},
		error: function () {
		},
		trace: function () {
		}
	}
}

/*
 * AppException to manage errors

 try {
 throw new AppException("Test TRY");
 }
 catch (error) {
 panacea.exception(error);
 }
 */
AppException = function () {

	this.__proto__.__proto__ = Error.apply(null, arguments);

	var current_stack = this.stack || this.stacktrace || '';
	var current_stack_index = 0;

	current_stack = current_stack.split(/\n/);

	$.each(current_stack, function (i, value) {
		if (value.match(/AppException/g)) {
			current_stack_index = Number(i);
		}
	});

	if (current_stack.length > 1) {
		current_stack.splice(1, 1);
	}

	// Split to catch the line and the column of the error
	var current_stack_tmp = current_stack_index
		? current_stack[current_stack_index].split(/:/)
		: [""];

	/*
	 * Class arguments
	 */

	this.name = "AppException";

	this.stack = current_stack.join("\n");

	this.fileName = (current_stack_tmp !== null && current_stack_tmp.length > 1)
		? current_stack_tmp[1]
		: "N/A";

	this.lineNumber = (current_stack_tmp !== null && current_stack_tmp.length > 1)
		? current_stack_tmp[2]
		: "N/A";

	this.columnNumber = (current_stack_tmp !== null && current_stack_tmp.length > 1)
		? current_stack_tmp[3].replace(')', '')
		: "N/A";

	this.toString = function () {
		return this.name + ' : ' + this.fileName
			+ "\n Msg : \"" + this.message.toString() + "\" "
			+ "\n File name : " + (this.fileName === 'undefined' ? 'N/A' : this.fileName)
			+ "\n Line : " + (this.lineNumber === 'undefined' ? 'N/A' : this.lineNumber)
			+ "\n Column : " + (this.columnNumber === 'undefined' ? 'N/A' : this.columnNumber)
			+ "\n Stack:\n" + this.stack;
	};
};
// !AppException

/*
 * Panacea App
 */
(function ($, W, D) {

	_app = {
		environment: null,
		token: null
	};

	/**
	 *  Class initializer.
	 */
	_app.initialize = function () {

		_app.environment = $('meta[name="environment"]').attr('content');
		_app.token = $('meta[name="csrf-token"]').attr('content');

		/*
		 * Add default token for Ajax query to Laravel.
		 */

		$.ajaxSetup({headers: {'X-CSRF-TOKEN': _app.token}});

		/*
		 * Define debug mode for JS.
		 */

		switch (_app.environment) {
			case 'production':
			case 'staging': {
				window.debug = false;
				break;
			}
			case 'development':
			case 'local':
			default: {
				window.debug = true;
			}
		}

		_app.debug('app.js > initialize : success : End');
	};

	/**
	 *  Class setup.
	 */
	_app.setup = function () {
		_app.debug('app.js > setup : success : Start');
		_app.debug('app.js > setup : success : End');
	};

	/**
	 * Display debug in console.
	 *
	 * @param string
	 * @returns {*}
	 */
	_app.debug = function (string) {
		if (true === window.debug) {
			console.log(string);
		}
		return window.debug;
	};

	/**
	 * Display errors in console.
	 *
	 * @param string
	 * @returns {*}
	 */
	_app.error = function (string) {
		if (true === window.debug) {
			console.error(string);
		}
		return window.debug;
	};

	/**
	 * Display warnings in console.
	 *
	 * @param string
	 * @returns {*}
	 */
	_app.warning = function (string) {
		if (true === window.debug) {
			console.warn(string);
		}
		return window.debug;
	};

	/**
	 * Clear browser console.
	 *
	 * @returns {*}
	 * @seealso https://developers.google.com/chrome-developer-tools/docs/console?hl=fr
	 */
	_app.clear_console = function () {
		if (true === window.debug) {
			console.clear();
		}
		return window.debug;
	};

	/**
	 * Display errors from code exception in console.
	 *
	 * @param error
	 * @returns {*}
	 */
	_app.exception = function (error) {
		if (typeof(error) === 'object' && error instanceof AppException) {
			return _app.error(error.toString());
		}
		else if (typeof(error) === 'object' && error instanceof Error) {
			return _app.error(error.message + '\n' + error.stack);
		}
		return _app.error('app.js > _app.exception : error : No correct exception found!');
	};

	/**
	 * Strings library.
	 *
	 * @type {{slugify: _app.string.slugify, ucfirst: _app.string.ucfirst, jsprintf: _app.string.jsprintf}}
	 */
	_app.string = {

		/**
		 * Sluggify a string, delete all special char from a string.
		 *
		 * @param str
		 * @returns {*}
		 */
		slugify: function (str) {
			str = str.replace(/^\s+|\s+$/g, ''); // trim
			str = str.toLowerCase();
			// remove accents, swap ñ for n, etc
			var from = "ĺěščřžýťňďàáäâèéëêìíïîòóöôùůúüûñç·/_,:;";
			var to = "lescrzytndaaaaeeeeiiiioooouuuuunc------";
			for (var i = 0, l = from.length; i < l; i++) {
				str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
			}
			str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
				.replace(/\s+/g, '-') // collapse whitespace and replace by _
				.replace(/-+/g, '-'); // collapse dashes
			return str;
		},

		/**
		 * JS ucfirst, to capitalize first letter of string.
		 *
		 * @param str
		 * @returns {string}
		 * @seealso http://forwebonly.com/capitalize-the-first-letter-of-a-string-in-javascript-the-fast-way/
		 */
		ucfirst: function (str) {
			return str[0].toUpperCase() + str.substring(1);
		},

		/**
		 * A printf like function.
		 *
		 * cvepdb.string.jsprintf(' A %w1% %w2% :-)', ['%w1%', '%w2%'], ['super', 'function']);
		 * -> output : " A super function :-)"
		 *
		 * @param str The string to complete
		 * @param args Array containing keys to replace
		 * @param replaces Array containing keys to place in text
		 * @returns {string} Final string
		 */
		jsprintf: function (str, args, replaces) {
			$.each(args, function (index, value) {
				var regx = new RegExp('%' + value + '%', 'g');
				if (str.match(regx)) {
					str = str.replace(regx, replaces[index]);
				}
			});
			return str;
		}

	};

	/**
	 * Arrays library.
	 *
	 * @type {{in_array: _app.array.in_array}}
	 */
	_app.array = {

		/**
		 * Allow to know if a value is in array.
		 *
		 * @param array
		 * @param p_val
		 * @returns {boolean}
		 */
		in_array: function (array, p_val) {
			var l = array.length;
			for (var i = 0; i < l; ++i) {
				if (array[i] === p_val) {
					return true;
				}
			}
			return false;
		}

	};

	/**
	 * Ajax library.
	 *
	 * @type {{isAsync: boolean, sync: _app.ajax.sync, async: _app.ajax.async, switch: _app.ajax.switch}}
	 */
	_app.ajax = {
		/**
		 * Define is Ajax is currently async or sync, default true
		 */
		isAsync: true,
		/**
		 * Set Ajax as Synchronious
		 */
		sync: function () {
			_app.ajax.isAsync = false;
			$.ajaxSetup({async: _app.ajax.isAsync});
			_app.debug('app.js > _app.ajax.sync : success : Ajax : async -> sync');
		},
		/**
		 * Set Ajax as Asynchronious
		 */
		async: function () {
			_app.ajax.isAsync = true;
			$.ajaxSetup({async: _app.ajax.isAsync});
			_app.debug('app.js > _app.ajax.sync : success : Ajax : sync -> async');
		},
		/**
		 * Allow to switch between sync to async or async to sync
		 */
		switch: function () {
			if (_app.ajax.isAsync) {
				_app.ajax.sync();
			}
			else {
				_app.ajax.async();
			}
		}
	};

	/**
	 * Maths library.
	 *
	 * @type {{number: _app.maths.number, sum: _app.maths.sum, pourcentage: _app.maths.pourcentage, remise: _app.maths.remise}}
	 */
	_app.maths = {

		/**
		 *
		 * @param number
		 * @param params
		 * @returns {string}
		 */
		number: function (number, params) {
			return (Number(number.replace(',', '.'))).toFixed(2);

			if (typeof params === 'undefined') {
				params = {};
			}
		},

		/**
		 *
		 * @param numbers
		 * @param params
		 * @returns {number}
		 */
		sum: function (numbers, params) {

			var total = 0;

			$.each(numbers, function (i, number) {
				total = (
					_app.maths.number(number, params)
					+ _app.maths.number(total, params)
				).toFixed(2);
			});

			return total;
		},

		/**
		 * Percentage between n1 and n2.
		 *
		 * @param n1
		 * @param n2
		 * @returns {number}
		 */
		percentage: function (n1, n2) {
			return n1 * 100 / n2;
		}

	};

	/**
	 * Dates library.
	 */
	_app.dates = {

		/**
		 * Regex patterns for manipulated dates.
		 */
		rxDatePattern: {
			// Date pattern dd/mm/yyyy
			fr: /^(\d{1,2})(\/|-)(\d{1,2})(\/|-)(\d{4})$/,
			// Date pattern yyyy-mm-dd
			en: /^(\d{4})(\/|-)(\d{1,2})(\/|-)(\d{1,2})$/
		},

		/**
		 *
		 * @param d1
		 * @param d2
		 * @param caller
		 * @private
		 */
		_before_diff: function (d1, d2, caller) {
			if (d1 === null || typeof(d1) === 'undefined') {
				throw new CVEPDBException('app.js > _app.dates.' + caller + ' : error : ' + caller + ' d1 arg is null');
			}
			else if (!(d1 instanceof Date)) {
				throw new CVEPDBException(
					'app.js > _app.dates.' + caller + ' : error : ' + caller + ' d1 arg is not an instance of Date object'
					+ ' this is an instance of ' + getClassOf(d1)
				);
			}
			else if (d2 === null || typeof(d2) === 'undefined') {
				throw new CVEPDBException('app.js > _app.dates.' + caller + ' : error : ' + caller + ' d2 arg is null');
			}
			else if (!(d2 instanceof Date)) {
				throw new CVEPDBException(
					'app.js > _app.dates.' + caller + ' : error : ' + caller + ' d2 arg is not an instance of Date object'
					+ ' this is an instance of ' + getClassOf(d2)
				);
			}
			cvepdb.debug('app.js > _app.dates.' + caller + ' : success : d1 = ' + d1 + ' && d2 = ' + d2);
		},

		/**
		 * Two dates days diff.
		 *
		 * @param d1
		 * @param d2
		 * @returns {Number}
		 */
		diffInDays: function (d1, d2) {
			_app.dates._before_diff(d1, d2, 'diffInDays');
			var t2 = d2.getTime();
			var t1 = d1.getTime();
			return parseInt((t2 - t1) / (24 * 3600 * 1000));
		},

		/**
		 * Two dates weeks diff.
		 *
		 * @param d1
		 * @param d2
		 * @returns {Number}
		 */
		diffInWeeks: function (d1, d2) {
			_app.dates._before_diff(d1, d2, 'diffInWeeks');
			var t2 = d2.getTime();
			var t1 = d1.getTime();
			return parseInt((t2 - t1) / (24 * 3600 * 1000 * 7));
		},

		/**
		 * Two dates months diff.
		 *
		 * @param d1
		 * @param d2
		 * @returns {number}
		 */
		diffInMonths: function (d1, d2) {
			_app.dates._before_diff(d1, d2, 'diffInMonths');
			var d1Y = d1.getFullYear();
			var d2Y = d2.getFullYear();
			var d1M = d1.getMonth();
			var d2M = d2.getMonth();
			return ((d2M + 12 * d2Y) - (d1M + 12 * d1Y));
		},

		/**
		 * Two dates years diff.
		 *
		 * @param d1
		 * @param d2
		 * @returns {number}
		 */
		diffInYears: function (d1, d2) {
			_app.dates._before_diff(d1, d2, 'diffInYears');
			return (d2.getFullYear() - d1.getFullYear());
		},

		/**
		 * Convert string date (fr or en) to date object.
		 *
		 * @param date string Format 'dd/mm/yyyy' OR 'yyyy-mm-dd'
		 * @returns {*}
		 * @throws AppException
		 */
		getDateObject: function (date) {

			var date_obj = null;
			var current_date = date;
			var dateFRArray = current_date.match(_app.dates.rxDatePattern.fr);
			var dateENArray = current_date.match(_app.dates.rxDatePattern.en);

			if (
				typeof dateFRArray !== 'undefined'
				&& dateFRArray instanceof Array
				&& dateFRArray.length > 0
			) {
				current_date = dateFRArray[5] + '/' + dateFRArray[3] + '/' + dateFRArray[1];
				date_obj = new Date(current_date);
			}
			else if (
				typeof dateENArray !== 'undefined'
				&& dateENArray instanceof Array
				&& dateENArray.length > 0
			) {
				current_date = current_date.replace(new RegExp("-", "g"), '/');
				date_obj = new Date(current_date);
			}
			else {
				throw new AppException(
					'app.js > _app.dates.getDateObject : error : Invalid date format!'
				);
			}
			return date_obj;
		},

		/**
		 *
		 * @param date
		 * @returns {string}
		 */
		getDateObjectAsFRString: function (date) {
			var d = new Date(date || Date.now()),
				month = '' + (d.getMonth() + 1),
				day = '' + d.getDate(),
				year = d.getFullYear();

			if (month.length < 2) month = '0' + month;
			if (day.length < 2) day = '0' + day;

			return [day, month, year].join('/');
		},

		/**
		 *
		 * @param date
		 * @returns {string}
		 */
		getDateObjectAsENString: function (date) {
			var d = new Date(date || Date.now()),
				month = '' + (d.getMonth() + 1),
				day = '' + d.getDate(),
				year = d.getFullYear();

			if (month.length < 2) month = '0' + month;
			if (day.length < 2) day = '0' + day;

			return [year, month, day].join('-');
		}

	};

	/**
	 * Checks library.
	 *
	 * @type {{isInt: _app.checks.isInt, isValidId: _app.checks.isValidId}}
	 */
	_app.checks = {

		/**
		 * Check if a number is a valid integer.
		 *
		 * @param n
		 * @returns {boolean}
		 */
		isInt: function (n) {
			n = Number(n);
			return (typeof(n) === "number") && isFinite(n) && (n % 1 === 0);
		},

		/**
		 * Check if an ID is valid.
		 *
		 * @param id
		 * @returns {number}
		 */
		isValidId: function (id) {
			return (_app.checks.isInt(id) && (Number(id) > 0))
				? id
				: 0;
		},

		/**
		 * Base validation code to check SIREN and SIRET
		 *
		 * @param number
		 * @param size
		 * @returns {boolean}
		 *
		 * @seealso https://github.com/steevelefort/siret/blob/master/index.js
		 */
		baseValidationForSirenAndSiret: function (number, size) {

			if (isNaN(number) || number.length !== size) {
				return false;
			}

			var bal = 0;
			var total = 0;

			for (var i = size - 1; i >= 0; i--) {
				var step = (number.charCodeAt(i) - 48) * (bal + 1);
				total += (step > 9) ? step - 9 : step;
				bal = 1 - bal;
			}

			return (total % 10 === 0);
		},

		/**
		 * Check if an SIREN is valid.
		 *
		 * @param siren
		 * @returns {*}
		 */
		isValidSiren: function (siren) {
			return _app.checks.baseValidationForSirenAndSiret(siren, 9);
		},

		/**
		 * Check if an SIRET is valid.
		 *
		 * @param siren
		 * @returns {*}
		 */
		isValidSiret: function (siren) {
			return _app.checks.baseValidationForSirenAndSiret(siren, 14);
		}

	};

	/**
	 * Integrate App library to jQuery
	 */
	$.extend({app: _app});

	/**
	 * Execute when document ready
	 */
	$(D).ready(function () {
		_app.debug('app.js > document.ready : success : Start');
		_app.setup();
		_app.debug('app.js > document.ready : success : Trigger APP_READY Event');
		$(D).trigger('APP_READY');
		_app.debug('app.js > document.ready : success : End');
	});

	/**
	 * window.onload
	 */
	$(W).onload = _app.initialize();

	/**
	 * window.resize
	 */
	$(W).resize(function () {
	});

	/**
	 *
	 * @param href
	 */
	_app.redirect = function (href) {
		W.location = href;
	};

	/**
	 *
	 * @param arg
	 */
	_app.unbeforeunload = function (arg) {
		if (arg === null) {
			W.onbeforeunload = null;
		}
		else if (typeof(arg) === "function") {
			W.onbeforeunload = arg;
		}
		else if (typeof(arg) === 'string') {
			W.onbeforeunload = function () {
				return arg;
			};
		}
	};

	/**
	 * Methode to catch JS errors and allow to display it in console with description
	 * http://danlimerick.wordpress.com/2014/01/18/how-to-catch-javascript-errors-with-window-onerror-even-on-chrome-and-firefox/
	 *
	 * @param error_msg
	 * @param url
	 * @param line
	 * @param column
	 * @param error_obj
	 */
	W.onerror = function (error_msg, url, line, column, error_obj) {
		_app.error('app.js > W.onerror : error : ' + error_msg
			+ '\n on page: ' + url
			+ '\n on line: ' + line
			+ '\n on column: ' + column
			+ '\n on object: ' + error_obj
		);
	};

})(jQuery, window, document);

// Save Bellum Industria instance
var bellumindustria = $.app;
bellumindustria.debug('Bellum Industria JS App object running...');

window.setTimeout(function () {
	$(".alert").not('.alert-module').fadeTo(200, 0).slideUp(500, function () {
		$(this).remove();
	});
}, 8000);

if ('production' === bellumindustria.environment)
{
	const dimensions = {
		TRACKING_VERSION: 'dimension1',
		CLIENT_ID: 'dimension2',
		WINDOW_ID: 'dimension3',
		HIT_ID: 'dimension4',
		HIT_TIME: 'dimension5',
		HIT_TYPE: 'dimension6',
		USER_ID: 'dimension7',
		ROLE_ID: 'dimension8'
	};

	function uuid(a) {
		return a
			? (a ^ Math.random() * 16 >> a / 4).toString(16)
			: ([1e7] + -1e3 + -4e3 + -8e3 + -1e11).replace(/[018]/g, uuid);
	}

	(function (i, s, o, g, r, a, m) {
		i['GoogleAnalyticsObject'] = r;
		i[r] = i[r] || function () {
			(i[r].q = i[r].q || []).push(arguments)
		}, i[r].l = 1 * new Date();
		a = s.createElement(o),
			m = s.getElementsByTagName(o)[0];
		a.async = 1;
		a.src = g;
		m.parentNode.insertBefore(a, m)
	})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

	ga('create', 'UA-91882126-1', 'auto', 'production');
	ga('create', 'UA-91882126-3', 'auto', 'test');

	ga('production.set', 'transport', 'beacon');
	ga('test.set', 'transport', 'beacon');

	ga('production.set', dimensions.TRACKING_VERSION, BELLUMINDUSTRIA_VERSION);
	ga('test.set', dimensions.TRACKING_VERSION, BELLUMINDUSTRIA_VERSION);

	ga(function() {
		ga.getByName('production').set(dimensions.CLIENT_ID, ga.getByName('production').get('clientId'));
		ga.getByName('test').set(dimensions.CLIENT_ID, ga.getByName('test').get('clientId'));
	});

	ga('production.set', dimensions.WINDOW_ID, uuid());
	ga('test.set', dimensions.WINDOW_ID, uuid());

	ga(function() {
		var originalBuildHitTask = ga.getByName('production').get('buildHitTask');
		ga.getByName('production').set('buildHitTask', function(model) {
			model.set(dimensions.HIT_ID, uuid(), true);
			model.set(dimensions.HIT_TIME, String(+new Date), true);
			model.set(dimensions.HIT_TYPE, model.get('hitType'), true);
			originalBuildHitTask(model);
		});
		originalBuildHitTask = ga.getByName('test').get('buildHitTask');
		ga.getByName('test').set('buildHitTask', function(model) {
			model.set(dimensions.HIT_ID, uuid(), true);
			model.set(dimensions.HIT_TIME, String(+new Date), true);
			model.set(dimensions.HIT_TYPE, model.get('hitType'), true);
			originalBuildHitTask(model);
		});
	});

	ga('production.set', dimensions.USER_ID, BELLUMINDUSTRIA_USER_ID);
	ga('test.set', dimensions.USER_ID, BELLUMINDUSTRIA_USER_ID);

	ga('production.set', dimensions.ROLE_ID, BELLUMINDUSTRIA_USER_ROLE);
	ga('test.set', dimensions.ROLE_ID, BELLUMINDUSTRIA_USER_ROLE);

	function trackError(error, fieldsObj) {
		if (typeof(fieldsObj) === 'undefined') {
			fieldsObj = {};
		}
		ga('production.send', 'event', Object.assign({
			eventCategory: 'Script',
			eventAction: 'error',
			eventLabel: (error && error.stack) || '(not set)',
			nonInteraction: true
		}, fieldsObj));
		ga('test.send', 'event', Object.assign({
			eventCategory: 'Script',
			eventAction: 'error',
			eventLabel: (error && error.stack) || '(not set)',
			nonInteraction: true
		}, fieldsObj));
	}
	function trackErrors() {
		const loadErrorEvents = window.__e && window.__e.q || [];
		const fieldsObj = {eventAction: 'uncaught error'};
		// Replay any stored load error events.
		for (i = 0; i < loadErrorEvents.length; i++) {
			trackError(loadErrorEvents[i].error, fieldsObj);
		}
		// Add a new listener to track event immediately.
		window.addEventListener('error', function(event) {
			trackError(event.error, fieldsObj);
		});
	}
	trackErrors();

	function sendNavigationTimingMetrics() {

		const metrics = {
			RESPONSE_END_TIME: 'metric1',
			DOM_LOAD_TIME: 'metric2',
			WINDOW_LOAD_TIME: 'metric3'
		};

		// Only track performance in supporting browsers.
		if (!(window.performance && window.performance.timing)) {
			return;
		}

		// If the window hasn't loaded, run this function after the `load` event.
		if (document.readyState !== 'complete') {
			window.addEventListener('load', sendNavigationTimingMetrics);
			return;
		}

		var nt = performance.timing;
		var navStart = nt.navigationStart;
		var responseEnd = Math.round(nt.responseEnd - navStart);
		var domLoaded = Math.round(nt.domContentLoadedEventStart - navStart);
		var windowLoaded = Math.round(nt.loadEventStart - navStart);

		// In some edge cases browsers return very obviously incorrect NT values,
		// e.g. 0, negative, or future times. This validates values before sending.
		function allValuesAreValid(values) {
			return values.every(function(value) {
				return value > 0 && value < 1e6;
			});
		}

		if (allValuesAreValid([responseEnd, domLoaded, windowLoaded])) {

			var data = {
				eventCategory: 'Navigation Timing',
				eventAction: 'track',
				nonInteraction: true
			};

			data[metrics.RESPONSE_END_TIME] = responseEnd;
			data[metrics.DOM_LOAD_TIME] = domLoaded;
			data[metrics.WINDOW_LOAD_TIME] = windowLoaded;

			ga('production.send', 'event', data);
			ga('test.send', 'event', data);
		}
	}
	sendNavigationTimingMetrics();

	ga('production.send', 'pageview');
	ga('test.send', 'pageview');
}
