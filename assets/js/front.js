/**
 * Global object containing all our options
 *
 * @var object wt_rdr_fe
 */
(function($){
    return {
        init: function(){
            $(document).ready( function() {
                $( wt_rdr_fe.selector )[ wt_rdr_fe.place ]( wt_rdr_fe.body );
            } );
        }
    }
})(jQuery).init();