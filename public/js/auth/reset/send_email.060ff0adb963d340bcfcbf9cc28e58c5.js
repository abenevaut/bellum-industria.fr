void 0===window.console&&(window.console={log:function(){},warn:function(){},error:function(){},trace:function(){}}),AppException=function(){this.__proto__.__proto__=Error.apply(null,arguments);var e=this.stack||this.stacktrace||"",t=0;e=e.split(/\n/),$.each(e,function(e,i){i.match(/AppException/g)&&(t=Number(e))}),e.length>1&&e.splice(1,1);var i=t?e[t].split(/:/):[""];this.name="AppException",this.stack=e.join("\n"),this.fileName=null!==i&&i.length>1?i[1]:"N/A",this.lineNumber=null!==i&&i.length>1?i[2]:"N/A",this.columnNumber=null!==i&&i.length>1?i[3].replace(")",""):"N/A",this.toString=function(){return this.name+" : "+this.fileName+'\n Msg : "'+this.message.toString()+'" \n File name : '+("undefined"===this.fileName?"N/A":this.fileName)+"\n Line : "+("undefined"===this.lineNumber?"N/A":this.lineNumber)+"\n Column : "+("undefined"===this.columnNumber?"N/A":this.columnNumber)+"\n Stack:\n"+this.stack}},function(e,t,i){_app={environment:null,token:null},_app.initialize=function(){switch(_app.environment=e('meta[name="environment"]').attr("content"),_app.token=e('meta[name="csrf-token"]').attr("content"),e.ajaxSetup({headers:{"X-CSRF-TOKEN":_app.token}}),_app.environment){case"production":case"staging":window.debug=!1;break;case"development":case"local":default:window.debug=!0}_app.debug("app.js > initialize : success : End")},_app.setup=function(){_app.debug("app.js > setup : success : Start"),_app.debug("app.js > setup : success : End")},_app.debug=function(e){return window.debug,window.debug},_app.error=function(e){return window.debug,window.debug},_app.warning=function(e){return window.debug,window.debug},_app.clear_console=function(){return window.debug,window.debug},_app.exception=function(e){return"object"==typeof e&&e instanceof AppException?_app.error(e.toString()):"object"==typeof e&&e instanceof Error?_app.error(e.message+"\n"+e.stack):_app.error("app.js > _app.exception : error : No correct exception found!")},_app.string={slugify:function(e){e=e.replace(/^\s+|\s+$/g,""),e=e.toLowerCase();for(var t="ĺěščřžýťňďàáäâèéëêìíïîòóöôùůúüûñç·/_,:;",i="lescrzytndaaaaeeeeiiiioooouuuuunc------",n=0,r=t.length;n<r;n++)e=e.replace(new RegExp(t.charAt(n),"g"),i.charAt(n));return e=e.replace(/[^a-z0-9 -]/g,"").replace(/\s+/g,"-").replace(/-+/g,"-")},ucfirst:function(e){return e[0].toUpperCase()+e.substring(1)},jsprintf:function(t,i,n){return e.each(i,function(e,i){var r=new RegExp("%"+i+"%","g");t.match(r)&&(t=t.replace(r,n[e]))}),t}},_app.array={in_array:function(e,t){for(var i=e.length,n=0;n<i;++n)if(e[n]===t)return!0;return!1}},_app.ajax={isAsync:!0,sync:function(){_app.ajax.isAsync=!1,e.ajaxSetup({async:_app.ajax.isAsync}),_app.debug("app.js > _app.ajax.sync : success : Ajax : async -> sync")},async:function(){_app.ajax.isAsync=!0,e.ajaxSetup({async:_app.ajax.isAsync}),_app.debug("app.js > _app.ajax.sync : success : Ajax : sync -> async")},switch:function(){_app.ajax.isAsync?_app.ajax.sync():_app.ajax.async()}},_app.maths={number:function(e,t){return Number(e.replace(",",".")).toFixed(2)},sum:function(t,i){var n=0;return e.each(t,function(e,t){n=(_app.maths.number(t,i)+_app.maths.number(n,i)).toFixed(2)}),n},percentage:function(e,t){return 100*e/t}},_app.dates={rxDatePattern:{fr:/^(\d{1,2})(\/|-)(\d{1,2})(\/|-)(\d{4})$/,en:/^(\d{4})(\/|-)(\d{1,2})(\/|-)(\d{1,2})$/},_before_diff:function(e,t,i){if(null===e||void 0===e)throw new CVEPDBException("app.js > _app.dates."+i+" : error : "+i+" d1 arg is null");if(!(e instanceof Date))throw new CVEPDBException("app.js > _app.dates."+i+" : error : "+i+" d1 arg is not an instance of Date object this is an instance of "+getClassOf(e));if(null===t||void 0===t)throw new CVEPDBException("app.js > _app.dates."+i+" : error : "+i+" d2 arg is null");if(!(t instanceof Date))throw new CVEPDBException("app.js > _app.dates."+i+" : error : "+i+" d2 arg is not an instance of Date object this is an instance of "+getClassOf(t));cvepdb.debug("app.js > _app.dates."+i+" : success : d1 = "+e+" && d2 = "+t)},diffInDays:function(e,t){_app.dates._before_diff(e,t,"diffInDays");var i=t.getTime(),n=e.getTime();return parseInt((i-n)/864e5)},diffInWeeks:function(e,t){_app.dates._before_diff(e,t,"diffInWeeks");var i=t.getTime(),n=e.getTime();return parseInt((i-n)/6048e5)},diffInMonths:function(e,t){_app.dates._before_diff(e,t,"diffInMonths");var i=e.getFullYear(),n=t.getFullYear(),r=e.getMonth();return t.getMonth()+12*n-(r+12*i)},diffInYears:function(e,t){return _app.dates._before_diff(e,t,"diffInYears"),t.getFullYear()-e.getFullYear()},getDateObject:function(e){var t=null,i=e,n=i.match(_app.dates.rxDatePattern.fr),r=i.match(_app.dates.rxDatePattern.en);if(void 0!==n&&n instanceof Array&&n.length>0)i=n[5]+"/"+n[3]+"/"+n[1],t=new Date(i);else{if(!(void 0!==r&&r instanceof Array&&r.length>0))throw new AppException("app.js > _app.dates.getDateObject : error : Invalid date format!");i=i.replace(new RegExp("-","g"),"/"),t=new Date(i)}return t},getDateObjectAsFRString:function(e){var t=new Date(e||Date.now()),i=""+(t.getMonth()+1),n=""+t.getDate(),r=t.getFullYear();return i.length<2&&(i="0"+i),n.length<2&&(n="0"+n),[n,i,r].join("/")},getDateObjectAsENString:function(e){var t=new Date(e||Date.now()),i=""+(t.getMonth()+1),n=""+t.getDate(),r=t.getFullYear();return i.length<2&&(i="0"+i),n.length<2&&(n="0"+n),[r,i,n].join("-")}},_app.checks={isInt:function(e){return"number"==typeof(e=Number(e))&&isFinite(e)&&e%1==0},isValidId:function(e){return _app.checks.isInt(e)&&Number(e)>0?e:0},baseValidationForSirenAndSiret:function(e,t){if(isNaN(e)||e.length!==t)return!1;for(var i=0,n=0,r=t-1;r>=0;r--){var a=(e.charCodeAt(r)-48)*(i+1);n+=a>9?a-9:a,i=1-i}return n%10==0},isValidSiren:function(e){return _app.checks.baseValidationForSirenAndSiret(e,9)},isValidSiret:function(e){return _app.checks.baseValidationForSirenAndSiret(e,14)}},e.extend({app:_app}),e(i).ready(function(){_app.debug("app.js > document.ready : success : Start"),_app.setup(),_app.debug("app.js > document.ready : success : Trigger APP_READY Event"),e(i).trigger("APP_READY"),_app.debug("app.js > document.ready : success : End")}),e(t).onload=_app.initialize(),e(t).resize(function(){}),_app.redirect=function(e){t.location=e},_app.unbeforeunload=function(e){null===e?t.onbeforeunload=null:"function"==typeof e?t.onbeforeunload=e:"string"==typeof e&&(t.onbeforeunload=function(){return e})},t.onerror=function(e,t,i,n,r){_app.error("app.js > W.onerror : error : "+e+"\n on page: "+t+"\n on line: "+i+"\n on column: "+n+"\n on object: "+r)}}(jQuery,window,document);var bellumindustria=$.app;bellumindustria.debug("Bellum Industria JS App object running..."),window.setTimeout(function(){$(".alert").not(".alert-module").fadeTo(200,0).slideUp(500,function(){$(this).remove()})},8e3),function(e){"function"==typeof define&&define.amd?define(["jquery"],e):e(jQuery)}(function(e){e.extend(e.fn,{validate:function(t){if(!this.length)return void(t&&t.debug&&window.console);var i=e.data(this[0],"validator");return i||(this.attr("novalidate","novalidate"),i=new e.validator(t,this[0]),e.data(this[0],"validator",i),i.settings.onsubmit&&(this.validateDelegate(":submit","click",function(t){i.settings.submitHandler&&(i.submitButton=t.target),e(t.target).hasClass("cancel")&&(i.cancelSubmit=!0),void 0!==e(t.target).attr("formnovalidate")&&(i.cancelSubmit=!0)}),this.submit(function(t){function n(){var n;return!i.settings.submitHandler||(i.submitButton&&(n=e("<input type='hidden'/>").attr("name",i.submitButton.name).val(e(i.submitButton).val()).appendTo(i.currentForm)),i.settings.submitHandler.call(i,i.currentForm,t),i.submitButton&&n.remove(),!1)}return i.settings.debug&&t.preventDefault(),i.cancelSubmit?(i.cancelSubmit=!1,n()):i.form()?i.pendingRequest?(i.formSubmitted=!0,!1):n():(i.focusInvalid(),!1)})),i)},valid:function(){var t,i;return e(this[0]).is("form")?t=this.validate().form():(t=!0,i=e(this[0].form).validate(),this.each(function(){t=i.element(this)&&t})),t},removeAttrs:function(t){var i={},n=this;return e.each(t.split(/\s/),function(e,t){i[t]=n.attr(t),n.removeAttr(t)}),i},rules:function(t,i){var n,r,a,s,o,u,l=this[0];if(t)switch(n=e.data(l.form,"validator").settings,r=n.rules,a=e.validator.staticRules(l),t){case"add":e.extend(a,e.validator.normalizeRule(i)),delete a.messages,r[l.name]=a,i.messages&&(n.messages[l.name]=e.extend(n.messages[l.name],i.messages));break;case"remove":return i?(u={},e.each(i.split(/\s/),function(t,i){u[i]=a[i],delete a[i],"required"===i&&e(l).removeAttr("aria-required")}),u):(delete r[l.name],a)}return s=e.validator.normalizeRules(e.extend({},e.validator.classRules(l),e.validator.attributeRules(l),e.validator.dataRules(l),e.validator.staticRules(l)),l),s.required&&(o=s.required,delete s.required,s=e.extend({required:o},s),e(l).attr("aria-required","true")),s.remote&&(o=s.remote,delete s.remote,s=e.extend(s,{remote:o})),s}}),e.extend(e.expr[":"],{blank:function(t){return!e.trim(""+e(t).val())},filled:function(t){return!!e.trim(""+e(t).val())},unchecked:function(t){return!e(t).prop("checked")}}),e.validator=function(t,i){this.settings=e.extend(!0,{},e.validator.defaults,t),this.currentForm=i,this.init()},e.validator.format=function(t,i){return 1===arguments.length?function(){var i=e.makeArray(arguments);return i.unshift(t),e.validator.format.apply(this,i)}:(arguments.length>2&&i.constructor!==Array&&(i=e.makeArray(arguments).slice(1)),i.constructor!==Array&&(i=[i]),e.each(i,function(e,i){t=t.replace(new RegExp("\\{"+e+"\\}","g"),function(){return i})}),t)},e.extend(e.validator,{defaults:{messages:{},groups:{},rules:{},errorClass:"error",validClass:"valid",errorElement:"label",focusInvalid:!0,errorContainer:e([]),errorLabelContainer:e([]),onsubmit:!0,ignore:":hidden",ignoreTitle:!1,onfocusin:function(e){this.lastActive=e,this.settings.focusCleanup&&!this.blockFocusCleanup&&(this.settings.unhighlight&&this.settings.unhighlight.call(this,e,this.settings.errorClass,this.settings.validClass),this.hideThese(this.errorsFor(e)))},onfocusout:function(e){this.checkable(e)||!(e.name in this.submitted)&&this.optional(e)||this.element(e)},onkeyup:function(e,t){9===t.which&&""===this.elementValue(e)||(e.name in this.submitted||e===this.lastElement)&&this.element(e)},onclick:function(e){e.name in this.submitted?this.element(e):e.parentNode.name in this.submitted&&this.element(e.parentNode)},highlight:function(t,i,n){"radio"===t.type?this.findByName(t.name).addClass(i).removeClass(n):e(t).addClass(i).removeClass(n)},unhighlight:function(t,i,n){"radio"===t.type?this.findByName(t.name).removeClass(i).addClass(n):e(t).removeClass(i).addClass(n)}},setDefaults:function(t){e.extend(e.validator.defaults,t)},messages:{required:"This field is required.",remote:"Please fix this field.",email:"Please enter a valid email address.",url:"Please enter a valid URL.",date:"Please enter a valid date.",dateISO:"Please enter a valid date ( ISO ).",number:"Please enter a valid number.",digits:"Please enter only digits.",creditcard:"Please enter a valid credit card number.",equalTo:"Please enter the same value again.",maxlength:e.validator.format("Please enter no more than {0} characters."),minlength:e.validator.format("Please enter at least {0} characters."),rangelength:e.validator.format("Please enter a value between {0} and {1} characters long."),range:e.validator.format("Please enter a value between {0} and {1}."),max:e.validator.format("Please enter a value less than or equal to {0}."),min:e.validator.format("Please enter a value greater than or equal to {0}.")},autoCreateRanges:!1,prototype:{init:function(){function t(t){var i=e.data(this[0].form,"validator"),n="on"+t.type.replace(/^validate/,""),r=i.settings;r[n]&&!this.is(r.ignore)&&r[n].call(i,this[0],t)}this.labelContainer=e(this.settings.errorLabelContainer),this.errorContext=this.labelContainer.length&&this.labelContainer||e(this.currentForm),this.containers=e(this.settings.errorContainer).add(this.settings.errorLabelContainer),this.submitted={},this.valueCache={},this.pendingRequest=0,this.pending={},this.invalid={},this.reset();var i,n=this.groups={};e.each(this.settings.groups,function(t,i){"string"==typeof i&&(i=i.split(/\s/)),e.each(i,function(e,i){n[i]=t})}),i=this.settings.rules,e.each(i,function(t,n){i[t]=e.validator.normalizeRule(n)}),e(this.currentForm).validateDelegate(":text, [type='password'], [type='file'], select, textarea, [type='number'], [type='search'] ,[type='tel'], [type='url'], [type='email'], [type='datetime'], [type='date'], [type='month'], [type='week'], [type='time'], [type='datetime-local'], [type='range'], [type='color'], [type='radio'], [type='checkbox']","focusin focusout keyup",t).validateDelegate("select, option, [type='radio'], [type='checkbox']","click",t),this.settings.invalidHandler&&e(this.currentForm).bind("invalid-form.validate",this.settings.invalidHandler),e(this.currentForm).find("[required], [data-rule-required], .required").attr("aria-required","true")},form:function(){return this.checkForm(),e.extend(this.submitted,this.errorMap),this.invalid=e.extend({},this.errorMap),this.valid()||e(this.currentForm).triggerHandler("invalid-form",[this]),this.showErrors(),this.valid()},checkForm:function(){this.prepareForm();for(var e=0,t=this.currentElements=this.elements();t[e];e++)this.check(t[e]);return this.valid()},element:function(t){var i=this.clean(t),n=this.validationTargetFor(i),r=!0;return this.lastElement=n,void 0===n?delete this.invalid[i.name]:(this.prepareElement(n),this.currentElements=e(n),r=!1!==this.check(n),r?delete this.invalid[n.name]:this.invalid[n.name]=!0),e(t).attr("aria-invalid",!r),this.numberOfInvalids()||(this.toHide=this.toHide.add(this.containers)),this.showErrors(),r},showErrors:function(t){if(t){e.extend(this.errorMap,t),this.errorList=[];for(var i in t)this.errorList.push({message:t[i],element:this.findByName(i)[0]});this.successList=e.grep(this.successList,function(e){return!(e.name in t)})}this.settings.showErrors?this.settings.showErrors.call(this,this.errorMap,this.errorList):this.defaultShowErrors()},resetForm:function(){e.fn.resetForm&&e(this.currentForm).resetForm(),this.submitted={},this.lastElement=null,this.prepareForm(),this.hideErrors(),this.elements().removeClass(this.settings.errorClass).removeData("previousValue").removeAttr("aria-invalid")},numberOfInvalids:function(){return this.objectLength(this.invalid)},objectLength:function(e){var t,i=0;for(t in e)i++;return i},hideErrors:function(){this.hideThese(this.toHide)},hideThese:function(e){e.not(this.containers).text(""),this.addWrapper(e).hide()},valid:function(){return 0===this.size()},size:function(){return this.errorList.length},focusInvalid:function(){if(this.settings.focusInvalid)try{e(this.findLastActive()||this.errorList.length&&this.errorList[0].element||[]).filter(":visible").focus().trigger("focusin")}catch(e){}},findLastActive:function(){var t=this.lastActive;return t&&1===e.grep(this.errorList,function(e){return e.element.name===t.name}).length&&t},elements:function(){var t=this,i={};return e(this.currentForm).find("input, select, textarea").not(":submit, :reset, :image, [disabled]").not(this.settings.ignore).filter(function(){return!this.name&&t.settings.debug&&window.console,!(this.name in i||!t.objectLength(e(this).rules()))&&(i[this.name]=!0,!0)})},clean:function(t){return e(t)[0]},errors:function(){var t=this.settings.errorClass.split(" ").join(".");return e(this.settings.errorElement+"."+t,this.errorContext)},reset:function(){this.successList=[],this.errorList=[],this.errorMap={},this.toShow=e([]),this.toHide=e([]),this.currentElements=e([])},prepareForm:function(){this.reset(),this.toHide=this.errors().add(this.containers)},prepareElement:function(e){this.reset(),this.toHide=this.errorsFor(e)},elementValue:function(t){var i,n=e(t),r=t.type;return"radio"===r||"checkbox"===r?e("input[name='"+t.name+"']:checked").val():"number"===r&&void 0!==t.validity?!t.validity.badInput&&n.val():(i=n.val(),"string"==typeof i?i.replace(/\r/g,""):i)},check:function(t){t=this.validationTargetFor(this.clean(t));var i,n,r,a=e(t).rules(),s=e.map(a,function(e,t){return t}).length,o=!1,u=this.elementValue(t);for(n in a){r={method:n,parameters:a[n]};try{if("dependency-mismatch"===(i=e.validator.methods[n].call(this,u,t,r.parameters))&&1===s){o=!0;continue}if(o=!1,"pending"===i)return void(this.toHide=this.toHide.not(this.errorsFor(t)));if(!i)return this.formatAndAdd(t,r),!1}catch(e){throw this.settings.debug&&window.console,e}}if(!o)return this.objectLength(a)&&this.successList.push(t),!0},customDataMessage:function(t,i){return e(t).data("msg"+i.charAt(0).toUpperCase()+i.substring(1).toLowerCase())||e(t).data("msg")},customMessage:function(e,t){var i=this.settings.messages[e];return i&&(i.constructor===String?i:i[t])},findDefined:function(){for(var e=0;e<arguments.length;e++)if(void 0!==arguments[e])return arguments[e]},defaultMessage:function(t,i){return this.findDefined(this.customMessage(t.name,i),this.customDataMessage(t,i),!this.settings.ignoreTitle&&t.title||void 0,e.validator.messages[i],"<strong>Warning: No message defined for "+t.name+"</strong>")},formatAndAdd:function(t,i){var n=this.defaultMessage(t,i.method),r=/\$?\{(\d+)\}/g;"function"==typeof n?n=n.call(this,i.parameters,t):r.test(n)&&(n=e.validator.format(n.replace(r,"{$1}"),i.parameters)),this.errorList.push({message:n,element:t,method:i.method}),this.errorMap[t.name]=n,this.submitted[t.name]=n},addWrapper:function(e){return this.settings.wrapper&&(e=e.add(e.parent(this.settings.wrapper))),e},defaultShowErrors:function(){var e,t,i;for(e=0;this.errorList[e];e++)i=this.errorList[e],this.settings.highlight&&this.settings.highlight.call(this,i.element,this.settings.errorClass,this.settings.validClass),this.showLabel(i.element,i.message);if(this.errorList.length&&(this.toShow=this.toShow.add(this.containers)),this.settings.success)for(e=0;this.successList[e];e++)this.showLabel(this.successList[e]);if(this.settings.unhighlight)for(e=0,t=this.validElements();t[e];e++)this.settings.unhighlight.call(this,t[e],this.settings.errorClass,this.settings.validClass);this.toHide=this.toHide.not(this.toShow),this.hideErrors(),this.addWrapper(this.toShow).show()},validElements:function(){return this.currentElements.not(this.invalidElements())},invalidElements:function(){return e(this.errorList).map(function(){return this.element})},showLabel:function(t,i){var n,r,a,s=this.errorsFor(t),o=this.idOrName(t),u=e(t).attr("aria-describedby");s.length?(s.removeClass(this.settings.validClass).addClass(this.settings.errorClass),s.html(i)):(s=e("<"+this.settings.errorElement+">").attr("id",o+"-error").addClass(this.settings.errorClass).html(i||""),n=s,this.settings.wrapper&&(n=s.hide().show().wrap("<"+this.settings.wrapper+"/>").parent()),this.labelContainer.length?this.labelContainer.append(n):this.settings.errorPlacement?this.settings.errorPlacement(n,e(t)):n.insertAfter(t),s.is("label")?s.attr("for",o):0===s.parents("label[for='"+o+"']").length&&(a=s.attr("id"),u?u.match(new RegExp("\b"+a+"\b"))||(u+=" "+a):u=a,e(t).attr("aria-describedby",u),(r=this.groups[t.name])&&e.each(this.groups,function(t,i){i===r&&e("[name='"+t+"']",this.currentForm).attr("aria-describedby",s.attr("id"))}))),!i&&this.settings.success&&(s.text(""),"string"==typeof this.settings.success?s.addClass(this.settings.success):this.settings.success(s,t)),this.toShow=this.toShow.add(s)},errorsFor:function(t){var i=this.idOrName(t),n=e(t).attr("aria-describedby"),r="label[for='"+i+"'], label[for='"+i+"'] *";return n&&(r=r+", #"+n.replace(/\s+/g,", #")),this.errors().filter(r)},idOrName:function(e){return this.groups[e.name]||(this.checkable(e)?e.name:e.id||e.name)},validationTargetFor:function(e){return this.checkable(e)&&(e=this.findByName(e.name).not(this.settings.ignore)[0]),e},checkable:function(e){return/radio|checkbox/i.test(e.type)},findByName:function(t){return e(this.currentForm).find("[name='"+t+"']")},getLength:function(t,i){switch(i.nodeName.toLowerCase()){case"select":return e("option:selected",i).length;case"input":if(this.checkable(i))return this.findByName(i.name).filter(":checked").length}return t.length},depend:function(e,t){return!this.dependTypes[typeof e]||this.dependTypes[typeof e](e,t)},dependTypes:{boolean:function(e){return e},string:function(t,i){return!!e(t,i.form).length},function:function(e,t){return e(t)}},optional:function(t){var i=this.elementValue(t);return!e.validator.methods.required.call(this,i,t)&&"dependency-mismatch"},startRequest:function(e){this.pending[e.name]||(this.pendingRequest++,this.pending[e.name]=!0)},stopRequest:function(t,i){this.pendingRequest--,this.pendingRequest<0&&(this.pendingRequest=0),delete this.pending[t.name],i&&0===this.pendingRequest&&this.formSubmitted&&this.form()?(e(this.currentForm).submit(),this.formSubmitted=!1):!i&&0===this.pendingRequest&&this.formSubmitted&&(e(this.currentForm).triggerHandler("invalid-form",[this]),this.formSubmitted=!1)},previousValue:function(t){return e.data(t,"previousValue")||e.data(t,"previousValue",{old:null,valid:!0,message:this.defaultMessage(t,"remote")})}},classRuleSettings:{required:{required:!0},email:{email:!0},url:{url:!0},date:{date:!0},dateISO:{dateISO:!0},number:{number:!0},digits:{digits:!0},creditcard:{creditcard:!0}},addClassRules:function(t,i){t.constructor===String?this.classRuleSettings[t]=i:e.extend(this.classRuleSettings,t)},classRules:function(t){var i={},n=e(t).attr("class");return n&&e.each(n.split(" "),function(){this in e.validator.classRuleSettings&&e.extend(i,e.validator.classRuleSettings[this])}),i},attributeRules:function(t){var i,n,r={},a=e(t),s=t.getAttribute("type");for(i in e.validator.methods)"required"===i?(n=t.getAttribute(i),""===n&&(n=!0),n=!!n):n=a.attr(i),/min|max/.test(i)&&(null===s||/number|range|text/.test(s))&&(n=Number(n)),n||0===n?r[i]=n:s===i&&"range"!==s&&(r[i]=!0);return r.maxlength&&/-1|2147483647|524288/.test(r.maxlength)&&delete r.maxlength,r},dataRules:function(t){var i,n,r={},a=e(t);for(i in e.validator.methods)void 0!==(n=a.data("rule"+i.charAt(0).toUpperCase()+i.substring(1).toLowerCase()))&&(r[i]=n);return r},staticRules:function(t){var i={},n=e.data(t.form,"validator");return n.settings.rules&&(i=e.validator.normalizeRule(n.settings.rules[t.name])||{}),i},normalizeRules:function(t,i){return e.each(t,function(n,r){if(!1===r)return void delete t[n];if(r.param||r.depends){var a=!0;switch(typeof r.depends){case"string":a=!!e(r.depends,i.form).length;break;case"function":a=r.depends.call(i,i)}a?t[n]=void 0===r.param||r.param:delete t[n]}}),e.each(t,function(n,r){t[n]=e.isFunction(r)?r(i):r}),e.each(["minlength","maxlength"],function(){t[this]&&(t[this]=Number(t[this]))}),e.each(["rangelength","range"],function(){var i;t[this]&&(e.isArray(t[this])?t[this]=[Number(t[this][0]),Number(t[this][1])]:"string"==typeof t[this]&&(i=t[this].replace(/[\[\]]/g,"").split(/[\s,]+/),t[this]=[Number(i[0]),Number(i[1])]))}),e.validator.autoCreateRanges&&(t.min&&t.max&&(t.range=[t.min,t.max],delete t.min,delete t.max),t.minlength&&t.maxlength&&(t.rangelength=[t.minlength,t.maxlength],delete t.minlength,delete t.maxlength)),t},normalizeRule:function(t){if("string"==typeof t){var i={};e.each(t.split(/\s/),function(){i[this]=!0}),t=i}return t},addMethod:function(t,i,n){e.validator.methods[t]=i,e.validator.messages[t]=void 0!==n?n:e.validator.messages[t],i.length<3&&e.validator.addClassRules(t,e.validator.normalizeRule(t))},methods:{required:function(t,i,n){if(!this.depend(n,i))return"dependency-mismatch";if("select"===i.nodeName.toLowerCase()){var r=e(i).val();return r&&r.length>0}return this.checkable(i)?this.getLength(t,i)>0:e.trim(t).length>0},email:function(e,t){return this.optional(t)||/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/.test(e)},url:function(e,t){return this.optional(t)||/^(https?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(e)},date:function(e,t){return this.optional(t)||!/Invalid|NaN/.test(new Date(e).toString())},dateISO:function(e,t){return this.optional(t)||/^\d{4}[\/\-](0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])$/.test(e)},number:function(e,t){return this.optional(t)||/^-?(?:\d+|\d{1,3}(?:,\d{3})+)?(?:\.\d+)?$/.test(e)},digits:function(e,t){return this.optional(t)||/^\d+$/.test(e)},creditcard:function(e,t){if(this.optional(t))return"dependency-mismatch";if(/[^0-9 \-]+/.test(e))return!1;var i,n,r=0,a=0,s=!1;if(e=e.replace(/\D/g,""),e.length<13||e.length>19)return!1;for(i=e.length-1;i>=0;i--)n=e.charAt(i),a=parseInt(n,10),s&&(a*=2)>9&&(a-=9),r+=a,s=!s;return r%10==0},minlength:function(t,i,n){var r=e.isArray(t)?t.length:this.getLength(e.trim(t),i);return this.optional(i)||r>=n},maxlength:function(t,i,n){var r=e.isArray(t)?t.length:this.getLength(e.trim(t),i);return this.optional(i)||r<=n},rangelength:function(t,i,n){var r=e.isArray(t)?t.length:this.getLength(e.trim(t),i);return this.optional(i)||r>=n[0]&&r<=n[1]},min:function(e,t,i){return this.optional(t)||e>=i},max:function(e,t,i){return this.optional(t)||e<=i},range:function(e,t,i){return this.optional(t)||e>=i[0]&&e<=i[1]},equalTo:function(t,i,n){var r=e(n);return this.settings.onfocusout&&r.unbind(".validate-equalTo").bind("blur.validate-equalTo",function(){e(i).valid()}),t===r.val()},remote:function(t,i,n){if(this.optional(i))return"dependency-mismatch";var r,a,s=this.previousValue(i);return this.settings.messages[i.name]||(this.settings.messages[i.name]={}),s.originalMessage=this.settings.messages[i.name].remote,this.settings.messages[i.name].remote=s.message,n="string"==typeof n&&{url:n}||n,s.old===t?s.valid:(s.old=t,r=this,this.startRequest(i),a={},a[i.name]=t,e.ajax(e.extend(!0,{url:n,mode:"abort",port:"validate"+i.name,dataType:"json",data:a,context:r.currentForm,success:function(n){var a,o,u,l=!0===n||"true"===n;r.settings.messages[i.name].remote=s.originalMessage,l?(u=r.formSubmitted,r.prepareElement(i),r.formSubmitted=u,r.successList.push(i),delete r.invalid[i.name],r.showErrors()):(a={},o=n||r.defaultMessage(i,"remote"),a[i.name]=s.message=e.isFunction(o)?o(t):o,r.invalid[i.name]=!0,r.showErrors(a)),s.valid=l,r.stopRequest(i,l)}},n)),"pending")}}}),e.format=function(){throw"$.format has been deprecated. Please use $.validator.format instead."};var t,i={};e.ajaxPrefilter?e.ajaxPrefilter(function(e,t,n){var r=e.port;"abort"===e.mode&&(i[r]&&i[r].abort(),i[r]=n)}):(t=e.ajax,e.ajax=function(n){var r=("mode"in n?n:e.ajaxSettings).mode,a=("port"in n?n:e.ajaxSettings).port;return"abort"===r?(i[a]&&i[a].abort(),i[a]=t.apply(this,arguments),i[a]):t.apply(this,arguments)}),e.extend(e.fn,{validateDelegate:function(t,i,n){return this.bind(i,function(i){var r=e(i.target);if(r.is(t))return n.apply(r,arguments)})}})}),$.extend($.validator.messages,{required:"Ce champ est obligatoire.",remote:"Veuillez corriger ce champ.",email:"Veuillez fournir une adresse électronique valide.",url:"Veuillez fournir une adresse URL valide.",date:"Veuillez fournir une date valide.",dateISO:"Veuillez fournir une date valide (ISO).",number:"Veuillez fournir un numéro valide.",digits:"Veuillez fournir seulement des chiffres.",creditcard:"Veuillez fournir un numéro de carte de crédit valide.",equalTo:"Veuillez fournir encore la même valeur.",extension:"Veuillez fournir une valeur avec une extension valide.",maxlength:$.validator.format("Veuillez fournir au plus {0} caractères."),minlength:$.validator.format("Veuillez fournir au moins {0} caractères."),rangelength:$.validator.format("Veuillez fournir une valeur qui contient entre {0} et {1} caractères."),range:$.validator.format("Veuillez fournir une valeur entre {0} et {1}."),max:$.validator.format("Veuillez fournir une valeur inférieure ou égale à {0}."),min:$.validator.format("Veuillez fournir une valeur supérieure ou égale à {0}."),maxWords:$.validator.format("Veuillez fournir au plus {0} mots."),minWords:$.validator.format("Veuillez fournir au moins {0} mots."),rangeWords:$.validator.format("Veuillez fournir entre {0} et {1} mots."),letterswithbasicpunc:"Veuillez fournir seulement des lettres et des signes de ponctuation.",alphanumeric:"Veuillez fournir seulement des lettres, nombres, espaces et soulignages.",lettersonly:"Veuillez fournir seulement des lettres.",nowhitespace:"Veuillez ne pas inscrire d'espaces blancs.",ziprange:"Veuillez fournir un code postal entre 902xx-xxxx et 905-xx-xxxx.",integer:"Veuillez fournir un nombre non décimal qui est positif ou négatif.",vinUS:"Veuillez fournir un numéro d'identification du véhicule (VIN).",dateITA:"Veuillez fournir une date valide.",time:"Veuillez fournir une heure valide entre 00:00 et 23:59.",phoneUS:"Veuillez fournir un numéro de téléphone valide.",phoneUK:"Veuillez fournir un numéro de téléphone valide.",mobileUK:"Veuillez fournir un numéro de téléphone mobile valide.",strippedminlength:$.validator.format("Veuillez fournir au moins {0} caractères."),email2:"Veuillez fournir une adresse électronique valide.",url2:"Veuillez fournir une adresse URL valide.",creditcardtypes:"Veuillez fournir un numéro de carte de crédit valide.",ipv4:"Veuillez fournir une adresse IP v4 valide.",ipv6:"Veuillez fournir une adresse IP v6 valide.",require_from_group:"Veuillez fournir au moins {0} de ces champs.",nifES:"Veuillez fournir un numéro NIF valide.",nieES:"Veuillez fournir un numéro NIE valide.",cifES:"Veuillez fournir un numéro CIF valide.",postalCodeCA:"Veuillez fournir un code postal valide."}),function(e,t,i){_form_validation={},_form_validation={new_validator:function(t,i,n){return t.validate({rules:i,messages:n,errorElement:"span",errorClass:"help-block",ignore:[':textarea:hidden.not(".form-control")'],errorPlacement:function(t,i){e(i).hasClass("select2-hidden-accessible")?t.insertAfter(i.next()):e(i).hasClass("ui-spinner-input")?t.insertAfter(e(i).closest("span.ui-spinner").after()):e(i).is("textarea")?t.insertAfter(i.next()):"hidden"!==e(i).attr("type")&&t.insertAfter(i);var n=e(i).closest(".form-group");n.removeClass("has-success"),n.addClass("has-error")},highlight:function(t){var i=e(t).closest(".form-group");i.removeClass("has-success"),i.addClass("has-error")},unhighlight:function(t){var i=e(t).closest(".form-group");i.removeClass("has-error"),i.addClass("has-success")},success:function(e){var t=e.closest(".form-group");t.removeClass("has-error"),t.addClass("has-success")}})},ruleBasedOnPromise:function(t,i,n,r,a){var s=t.previousValue(n,"remote");t.settings.messages[n.name]||(t.settings.messages[n.name]={}),s.originalMessage=s.originalMessage||t.settings.messages[n.name].remote,t.settings.messages[n.name].remote=s.message;var o=e.param({data:i});return s.old===o?s.valid:(s.old=o,t.startRequest(n),r.then(function(e){t.settings.messages[n.name].remote=s.originalMessage,e?(submitted=t.formSubmitted,t.resetInternals(),t.toHide=t.errorsFor(n),t.formSubmitted=submitted,
t.successList.push(n),t.invalid[n.name]=!1,t.showErrors()):(errors={},message=t.defaultMessage(n,{method:"remote",parameters:i}),errors[n.name]=s.message=a,t.invalid[n.name]=!0,t.showErrors(errors)),s.valid=e,t.stopRequest(n,e)}),"pending")}},e.extend({form_validation:_form_validation})}(jQuery,document,window),bellumindustria.form_validation=$.form_validation,$.validator.addMethod("price",function(e,t){return this.optional(t)||/^(\d+|(\d+,\d{1,2}|\d+.\d{1,2}))$/.test(e)},"Veuillez fournir un prix valide."),$.validator.addMethod("duration",function(e,t){return this.optional(t)||/^(\d+|(\d+,\d{1,2}|\d+.\d{1,2}))$/.test(e)},"Veuillez fournir une durée valide."),$.validator.addMethod("frenchDate",function(e,t){var i,n=e.match(/([0-9]+)/gi);return n?(i=n[1]+"/"+n[0]+"/"+n[2],this.optional(t)||!/Invalid|NaN/.test(new Date(i))):this.optional(t)||!1},"La date doit être au format : jj/mm/aaaa"),$.validator.addMethod("filesize",function(e,t,i){return this.optional(t)||t.files[0].size<=1024*i*1024},"La taille du fichier doit être inférieure à  {0} MB"),$.validator.addMethod("siret",function(e,t){return this.optional(t)||bellumindustria.checks.isValidSiret(e)},"Veuillez renseigner un SIRET valide."),function(e,t,i){"use strict";var n={};n={setup:function(){n.validation.init()}},n.validation={validator:null,form:null,init:function(){n.validation.form=e("#form-register"),n.validation.validator=bellumindustria.form_validation.new_validator(n.validation.form,{email:{required:!0,email:!0,maxlength:255}},{})}},e(document).bind("APP_READY",function(){n.setup()})}(window.jQuery,window,document);