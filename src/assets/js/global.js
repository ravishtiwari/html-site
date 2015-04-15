/*jshint immed: false */
(function(global, window, $) {
    'use strict';
    //var $ = window.jQuery;

    var context = context || {};
    context.website = context.website || {};
    context.website.pageurl = window.location.href;
    context.website.host = window.location.host;
    context.website.path = window.location.pathname;
    context.website.url = window.location.protocol+'//'+context.website.host+
                        (window.location.port?':'+window.location.port:'')+ '/'+
                    context.website.path.split('/')[1]+'/';
    var HTMLSITE = HTMLSITE || {};
    HTMLSITE.context = context;
    HTMLSITE.AjaxUtil = (function() {
        var loadingHtml = document.createElement('span');
        loadingHtml.setAttribute('id', 'ajaxLoader');
        //'<span id="ajaxLoader">Please wait while your content is loaded</span>';
        loadingHtml.tabIndex = -1;
        loadingHtml.appendChild(document.createTextNode('Please wait while your content is loaded...'));
      
        var loader = function(targetContainer) {
            // $(targetContainer).html(loadingHtml);
            // $(targetContainer).find('#ajaxLoader').focus();
            $(targetContainer).find('div:first').replaceWith(loadingHtml);
            //document.getElementById(targetContainer.attr('id')).innerHTML = loadingHtml;
            loadingHtml.focus();
        };
        var removeLoader = function(targetContainer) {
            $(targetContainer).remove(loadingHtml);
            // $(targetContainer).find('#ajaxLoader').remove();

        };

        return {
            loadDocumentAsync: function(page, targetContainer, announce) {
                $(targetContainer).attr('aria-hidden',false);
                if(announce) {
                    window.setTimeout(loader(targetContainer),5000);
                }

                $.get(context.website.url+page, function(data){
                   if(announce) {
                       window.setTimeout(removeLoader(targetContainer),10000);
                   }

                   window.setTimeout(function(){
                       //$(targetContainer).html(data);
                       //window.console.log(data);
                       //$(targetContainer).focus();

                       var update = document.createElement('div');

                       update.setAttribute('id', targetContainer.attr('id')+'_update');
                       update.tabIndex = -1;
                       update.innerHTML = data;
                       window.console.log(targetContainer);
                       targetContainer.append(update);

                       window.setTimeout(update.focus(), 100);
                   },1000);

                });
            }

        };
    })();
    window.console.log('GLOBAL Declarations');
    global.HTMLSITE = HTMLSITE;
})(this, window,jQuery);

(function(global, window, $){
    'use strict';
    //var $ = window.jQuery;
    var HTMLSITE = global.HTMLSITE;
    var console = window.console;
    window.console.log('Ajax Declarations');
    console.log(HTMLSITE);

    if($('#featuresTabs').length) {
      var allTabs = jQuery.find('#featuresTabs > li');
      console.log(allTabs);
      /**
      * find the current selected tab and load it's content
      */
       var e =  $($('#featuresTabs').find('li.active > a:first')[0]);
        if(e.length) {
            console.log('loading default tab');
            HTMLSITE.AjaxUtil.loadDocumentAsync(
                e.attr('data-load-page'),
                $(e.attr('href')),
                true
            );
        }

        $('li a.ajaxtab').click(function() {
          console.log('loading tab');
          HTMLSITE.AjaxUtil.loadDocumentAsync(
              $(this).attr('data-load-page'),
              $($(this).attr('href')),
              true
          );
        });
    }

    

}(this, window, jQuery));