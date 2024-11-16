/*
 *  Copyright (c) 2020 Netzum Sorglos Software GmbH
 */
(function(w,d) {'use strict';function microalertLib() {var getRootElement=function() {return d.getElementsByTagName('body')[0];};var getDiv=function(cls) {var div=d.createElement('div');if(cls) {div.className+=' '+cls;} return div;};var wrap=function(el) {var wrapper=getDiv('microalert');wrapper.appendChild(el);return wrapper;};var getBtn=function(s,cls,fn) {var btn=d.createElement('button');btn.className='btn-'+(cls?cls:'default');btn.textContent=s;if(fn) {if(typeof(btn.addEventListener)!='undefined') {btn.addEventListener('click',fn);} else {btn.onclick=fn;}} return btn;};var microalert={'alert':function(s) {var p=d.createElement('p');p.textContent=s;var div=getDiv('alert');var cont=wrap(div);div.className+=' off';var btn=getBtn('OK','ok',function() {div.className+=' off';window.setTimeout(function() {cont.parentNode.removeChild(cont);},500);});div.appendChild(p);div.appendChild(btn);(getRootElement()).appendChild(cont);window.setTimeout(function() {div.className=div.className.replace(/\boff\b/,'');btn.focus();},500);},'confirm':function(s,sBtnYes,sBtnNo,fn) {var p=d.createElement('p');p.textContent=s;var div=getDiv('confirm');var cont=wrap(div);div.className+=' off';div.appendChild(p);var choices=getDiv('choices');var fnPrepare=function() {div.className+=' off';window.setTimeout(function() {cont.parentNode.removeChild(cont);},500);};var btnYes=getBtn(sBtnYes,'yes',function() {fnPrepare();if(typeof fn=='function') {fn(true);}});var btnNo=getBtn(sBtnNo,'no',function() {fnPrepare();if(typeof fn=='function') {fn(false);}});choices.appendChild(btnYes);choices.appendChild(btnNo);div.appendChild(choices);(getRootElement()).appendChild(cont);btnYes.focus();window.setTimeout(function() {div.className=div.className.replace(/\boff\b/,'');},500);}};return microalert;};if(typeof(w.microalert)=='undefined') {w.microalert=microalertLib();}})(window,document);
