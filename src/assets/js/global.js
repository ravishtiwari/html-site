/*jshint immed: false */
var HTMLSITE = (function(global, window,  HTMLSITE) {
    'use strict';
    var $ = window.jQuery;

    var context = context || {};
    context.website = context.website || {};
    context.website.pageurl = window.location.href;
    context.website.host = window.location.host;
    context.website.path = window.location.pathname;
    context.website.url = window.location.protocol+'//'+context.website.host+
                        (window.location.port?':'+window.location.port:'')+context.website.path;
    //var HTMLSITE = HTMLSITE || {};
    HTMLSITE.context = context;
    HTMLSITE.AjaxUtil = (function() {
        var util = function () {
            window.console.log('R');

        };

        return {
            loadDocumentAsync: function(page, targetContainer, moveFocusToElement, announce) {
                util();
                window.console.log(page, targetContainer, moveFocusToElement, announce);
            }

        };
    })();
    window.console.log(global);
    window.console.log($);
    global.HTMLSITE = HTMLSITE;
}(this, window, HTMLSITE || { }));


(function(global, window, HTMLSITE){
    'use strict';
    var $ = window.jQuery;
    var console = window.console;
    console.log(global);
    console.log($);
    console.log(window);
    console.log(HTMLSITE);

    var loadingHtml = '<span ';
    /**
     * find the current selected tab and load it's content
     */
    if($('#featuresTabs').length) {
       var e =  $('#featuresTabs').find('li.active');
        if(e.length) {
            $(e.attr('href')).html(loadingHtml);
            HTMLSITE.AjaxUtil.loadDocumentAsync(e.attr('data-load-page'), $(e.attr('href')));
        }


    }

    $('li a.ajaxtab').click(function(e) {
        return e;

    });

})(this, window, HTMLSITE);