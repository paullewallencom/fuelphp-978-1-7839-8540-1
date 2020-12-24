define([
  'jquery-nos-appdesk'
], function($) {
    "use strict";
    return function(appDesk) {
        return {

            /**
             * Config variables
             */
            blognews : {
                namespace   : 'Nos\\BlogNews\\News',
                dir         : 'noviusos_news',
                icon_name   : 'news'
            }
        };
    };
});
