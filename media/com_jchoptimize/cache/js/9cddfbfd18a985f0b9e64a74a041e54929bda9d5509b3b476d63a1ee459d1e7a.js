
/***!  /templates/yootheme/js/theme.js?4.3.5  !***/

try{(function(o,e){"use strict";const c={computed:{section:()=>e.$('.tm-header ~ [class*="uk-section"], .tm-header ~ * > [class*="uk-section"]')},watch:{section(){this.$emit()}}},a={mixins:[c],async connected(){e.observeResize(this.$el,()=>this.$emit())},watch:{section(s,t){t&&this.$update()}},update:[{read(){return{height:this.$el.offsetHeight}},write({height:s}){const t=this.section&&!e.matches(this.section,"[tm-header-transparent-noplaceholder]")&&(e.$(".uk-grid,.uk-panel:not(.uk-container)",this.section)||e.$(".tm-main > *"));if(!s||!t){e.remove(this.placeholder);return}this.placeholder||(this.placeholder=e.$('<div class="tm-header-placeholder uk-margin-remove-adjacent">')),t.previousElementSibling!==this.placeholder&&e.before(t,this.placeholder),e.css(this.placeholder,{height:s})}}]},i={mixins:[c],update:{read(){return this.section&&e.hasAttr(this.$el,"tm-section-start")&&{start:this.section.offsetHeight<=e.toPx("100vh")?e.offset(this.section).bottom:e.offset(this.section).top+300}},events:["resize"]}};if(o.component("Header",a),o.mixin(i,"sticky"),e.isRtl){const s={created(){this.$props.pos=e.swap(this.$props.pos,"left","right")}};o.mixin(s,"drop"),o.mixin(s,"tooltip")}e.once(document,"uikit:init",()=>{const{$theme:{i18n:s={}}={}}=window;for(const t in s)o.mixin({i18n:s[t]},t)}),e.ready(()=>{const{$load:s=[],$theme:t={}}=window;function r(n,h){n.length&&n.shift()(h,()=>r(n,h))}r(s,t)})})(UIkit,UIkit.util);}catch(e){console.error('Error in file:/templates/yootheme/js/theme.js?4.3.5; Error:'+e.message);};

/***!  script declaration  !***/

try{document.addEventListener('DOMContentLoaded',function(){Array.prototype.slice.call(document.querySelectorAll('a span[id^="cloak"]')).forEach(function(span){span.innerText=span.textContent;});});}catch(e){console.error('Error in script declaration; Error:'+e.message);};

/***!  script declaration  !***/

try{document.getElementById('themeToggle').addEventListener('click',function(){const currentTheme=document.body.className;if(currentTheme==='light-theme'){document.body.className='dark-theme';}else{document.body.className='light-theme';}});}catch(e){console.error('Error in script declaration; Error:'+e.message);};

/***!  script declaration  !***/

try{window.yootheme||={};var $theme=yootheme.theme={"i18n":{"close":{"label":"Close"},"totop":{"label":"Back to top"},"marker":{"label":"Open"},"navbarToggleIcon":{"label":"Open menu"},"paginationPrevious":{"label":"Previous page"},"paginationNext":{"label":"Next page"},"searchIcon":{"toggle":"Open Search","submit":"Submit Search"},"slider":{"next":"Next slide","previous":"Previous slide","slideX":"Slide %s","slideLabel":"%s of %s"},"slideshow":{"next":"Next slide","previous":"Previous slide","slideX":"Slide %s","slideLabel":"%s of %s"},"lightboxPanel":{"next":"Next slide","previous":"Previous slide","slideLabel":"%s of %s","close":"Close"}}};}catch(e){console.error('Error in script declaration; Error:'+e.message);};

/***!  script declaration  !***/

try{document.currentScript.insertAdjacentHTML('afterend','<time datetime="'+new Date().toJSON()+'">'+new Intl.DateTimeFormat(document.documentElement.lang,{year:'numeric'}).format()+'</time>');}catch(e){console.error('Error in script declaration; Error:'+e.message);};

jchOptimizeDynamicScriptLoader.next()