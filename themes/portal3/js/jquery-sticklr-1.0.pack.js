// /*
// * Sticklr v1.0
// * Sticky Side Panel CSS + jQuery Plugin
// *
// * Copyright 2011 amatyr4n
// * http://codecanyon.net/user/amatyr4n
// *
// * licensed under Envato licenses
// * http://wiki.envato.com/support/legal-terms/licensing-terms/
// */
// 
//eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('(5($){$.1k.3=5(b){8 C={m:\'1g\',o:\'F\',x:\'l\'},c={w:5(H){d 4.v(5(){8 $3=$(4);8 7=$.1q({},C,H);6(!$3.E(\'3\'))$3.q(\'3\');6(7.x==\'9\')$3.q(\'3-9\');6(7.o==\'Y\')7.o=\'12 1s\';$3.q(\'3-W\').j(\'f\',(($(k).g()-$3.g())/2)).B(\'a[Z="#"]\').G(\'F\',5(e){e.11()}).1b().K(\'S\').K(\'a\').G(7.o,5(){6($(4).T().E(\'3-p\'))d J;c.n();$(4).17(\'<u 16="3-U"></u>\').T().v(5(){$(4).j({\'h-l\':\'r\',\'h-9\':\'r\',\'y\':0,\'f\':0}).14();8 A=$(4).g()+$(4).15().f;8 t=$(k).g()+$(k).1a();8 D=0;6(A>t){D=I($(4).j(\'f\'),10)-(A-t)}$(4).j({\'f\':D}).L({\'h-l\':\'O\',\'h-9\':\'O\',\'y\':1.0},M)}).q(\'3-p\');d J});6($.19.18||7.m!=C.m){V(8 i=2;i<10;i++){8 s=X+i+(I(7.m,10)*(i-2));8 z=\'P\';6(7.x==\'9\'){z=s;s=\'P\'}$3.B(\'S\').B(\'1D:1v-1u(\'+i+\')\').j({\'l\':s,\'9\':z,\'1r\':7.m})}}})},n:5(){$(\'.3-p\').L({\'h-l\':\'r\',\'h-9\':\'r\',\'y\':0},M,5(){$(4).1B(\'3-p\').n()});$(\'u.3-U\').1A()}};$(k).1y(5(){$(\'.3\').v(5(){$(4).j(\'f\',($(k).g()/2-$(4).g()/2))})});$(1p).F(5(e){6($(e.1f).1d().E(\'3\'))d;c.n()});6(c[b]&&b.1i()!=\'w\'){d c[b].R(4,1j.1o.1n.1m(Q,1))}N 6(1t b===\'1z\'||!b){d c.w.R(4,Q)}N{$.1x(\'1w "\'+b+\'" 1l 1e 1h 1c 13\')}}})(1C);',62,102,'|||sticklr|this|function|if|props|var|right||method|methods|return||top|height|margin||css|window|left|colWidth|hide|showOn|active|addClass|50px|newLeft|windowHeight|span|each|init|stickTo|opacity|newRight|totalHeight|find|defaults|newTop|hasClass|click|bind|opts|parseInt|false|children|animate|200|else|20px|auto|arguments|apply|li|siblings|arrow|for|js|23|hover|href||preventDefault|mouseenter|Sticklr|show|offset|class|append|msie|browser|scrollTop|end|in|parents|not|target|180px|exist|toLowerCase|Array|fn|does|call|slice|prototype|document|extend|width|mouseleave|typeof|child|nth|Method|error|resize|object|remove|removeClass|jQuery|ul'.split('|'),0,{}))
//
 /*
  * Sticklr v1.0
  * Sticky Side Panel CSS + jQuery Plugin
  *
  * Copyright 2011 amatyr4n
  * http://codecanyon.net/user/amatyr4n
  *
  * licensed under Envato licenses
  * http://wiki.envato.com/support/legal-terms/licensing-terms/
  */
 (function($) {
     $.fn.sticklr = function(method) {
         var defaults = {
                 colWidth: '180px',
                 showOn: 'click',
                 stickTo: 'left'
             },
             methods = {
                 init: function(opts) {
                     return this.each(function() {
                         var $sticklr = $(this);
                         var props = $.extend({}, defaults, opts);
                         if (!$sticklr.hasClass('sticklr')) $sticklr.addClass('sticklr');
                         if (props.stickTo == 'right') $sticklr.addClass('sticklr-right');
                         if (props.showOn == 'hover') props.showOn = 'mouseenter mouseleave';
                         $sticklr.addClass('sticklr-js').css('top', (($(window).height() - $sticklr.height()) / 2)).find('a[href="#"]').bind('click', function(e) {
                             e.preventDefault()
                         }).end().children('li').children('a').bind(props.showOn, function() {
                             if ($(this).siblings().hasClass('sticklr-active')) return false;
                             methods.hide();
                             $(this).append('<span class="sticklr-arrow"></span>').siblings().each(function() {
                                 $(this).css({
                                     'margin-left': '50px',
                                     'margin-right': '50px',
                                     'opacity': 0,
                                     'top': 0
                                 }).show();
                                 var totalHeight = $(this).height() + $(this).offset().top;
                                 var windowHeight = $(window).height() + $(window).scrollTop();
                                 var newTop = 0;
                                 if (totalHeight > windowHeight) {
                                     newTop = parseInt($(this).css('top'), 10) - (totalHeight - windowHeight)
                                 }
                                 $(this).css({
                                     'top': newTop
                                 }).animate({
                                     'margin-left': '20px',
                                     'margin-right': '20px',
                                     'opacity': 1.0
                                 }, 200)
                             }).addClass('sticklr-active');
                             return false
                         });
                         if (props.colWidth != defaults.colWidth) {
                             for (var i = 2; i < 10; i++) {
                                 var newLeft = 23 + i + (parseInt(props.colWidth, 10) * (i - 2));
                                 var newRight = 'auto';
                                 if (props.stickTo == 'right') {
                                     newRight = newLeft;
                                     newLeft = 'auto'
                                 }
                                 $sticklr.find('li').find('ul:nth-child(' + i + ')').css({
                                     'left': newLeft,
                                     'right': newRight,
                                     'width': props.colWidth
                                 })
                             }
                         }
                     })
                 },
                 hide: function() {
                     $('.sticklr-active').animate({
                         'margin-left': '50px',
                         'margin-right': '50px',
                         'opacity': 0
                     }, 200, function() {
                         $(this).removeClass('sticklr-active').hide()
                     });
                     $('span.sticklr-arrow').remove()
                 }
             };
         $(window).resize(function() {
             $('.sticklr').each(function() {
                 $(this).css('top', ($(window).height() / 2 - $(this).height() / 2))
             })
         });
         $(document).click(function(e) {
             if ($(e.target).parents().hasClass('sticklr')) return;
             methods.hide()
         });
         if (methods[method] && method.toLowerCase() != 'init') {
             return methods[method].apply(this, Array.prototype.slice.call(arguments, 1))
         } else if (typeof method === 'object' || !method) {
             return methods.init.apply(this, arguments)
         } else {
             $.error('Method "' + method + '" does not exist in Sticklr')
         }
     }
 })(jQuery);