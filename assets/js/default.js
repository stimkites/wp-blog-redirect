/**
 * Global object from script localization
 *
 * @var object wt_rdr
 */
(function($){
    var fetch = function(){
            block();
            $.ajax({
                url     : 	ajaxurl,
                data:	{
                    action  :   wt_rdr.action,
                    nonce   :   wt_rdr.nonce,
                    do      :   arguments[0],
                    data    :   arguments[1]
                },
                type    : 'post',
                dataType: 'json',
                timeout : 0,
                success : arguments[2] ? arguments[2] : null,
                complete: arguments[3] ? arguments[3] : unblock,
                error   : arguments[4] ? arguments[4] : function( a, b, error ){ if( error ) alert( error ); }
            });
        },
        block = function(){
            $('form[name=mainform]').block({
                message: '',
                overlayCSS: {
                    background: '#fff',
                    opacity: '.3'
                }
            });
        },
        unblock = function(){
            $('form[name=mainform]').unblock();
        },
        init_selectors = function(){
            $('.rule .select2-new')
                .removeClass('select2-new')
                .select2({width: '100%'});
            $('.rule .select2-new-blogs')
                .removeClass('select2-new-blogs')
                .select2({
                    tags: true,
                    width: '100%'
                });
        },
        init_dnd_list = function(){
            $('.dnd-list').sortable({
                items: 'tr',
                cursor: 'dragging',
                axis: 'y',
                handle: 'td.dnd-list-handle',
                scrollSensitivity: 50,
                forcePlaceholderSize: true,
                helper: 'clone',
                opacity: 0.65
            });
        },
        add_rule = function(){
            var t = $(this).parents('table').first();
            t.find('tbody').append(
                '<tr class="rule">' + t.find('.tpl').first().html() + '</tr>'
            );
            t.find( '.no-rules' ).hide();
            reassign_remove();
            init_selectors();
        },
        delete_rule = function(){
            var t = $(this).parents('tbody').first();
            $(this).parents('tr').first().remove();
            if( !t.find('.rule').length )
                t.find( '.no-rules' ).show();
        },
        reassign_remove = function(){
            $('.remove-button').off().click( delete_rule );
        },
        assign_events = function(){
            $( '.add-rule').off().click( add_rule );
            $( '.lng-selector-for .render-example').off().change( render_example );
            $( '.select2-forms').off().change( render_example ).select2({width: '100%'});
            $( '#save-options').off().on( 'click', save_options );
            $( '.go-render-example' ).off().click( render_example );
        },
        get_options = function(){
            var opts = [];
            $( 'form[name=mainform] .option' ).each( function(){
                if( $(this).prop( 'checked' ) || -1 === [ 'checkbox', 'radio' ].indexOf( $( this ).attr( 'type' ) ) )
                    opts.push( { name: this.name, value: $( this ).val() } );
            } );
            return opts;
        },
        render_example = function(){
            fetch( 'get_lang_selector', get_options(), function( data ){
                if( data.error )
                    return alert( data.error );
                $( '#lng-selector-example' ).html( data.result );
            } );
        },
        render_rules = function(){
            var o = wt_rdr.rules;
            var i;
            if( 'undefined' !== typeof o.country )
                for( i = 0; i < o.country.length; i++ )
                    if( null !== o.blog && 'undefined' !== o.blog[ i ] )
                        render_rule( 'global-rules', 'country', o.country[i], 'blog', o.blog[ i ] );
            if( 'undefined' !== typeof o.lang_country )
                for( i = 0; i < o.lang_country.length; i++ )
                    if( null !== o.lang_blog && 'undefined' !== o.lang_blog[ i ] )
                        render_rule( 'lang-rules',
                                     'lang_country', o.lang_country[ i ],
                                     'lang_blog', o.lang_blog[ i ] );
        },
        render_rule = function(){
            var t = $( '#' + arguments[0] ).find( 'tbody' );
            if( 'undefined' === typeof t || !t.length ) return;
            t.append(
                '<tr class="rule">' + t.find('.tpl').first().html() + '</tr>'
            );
            t.find( '.no-rules' ).hide();
            reassign_remove();
            init_selectors();
            var new_rule = t.find( 'tr.rule:last-child' );
            new_rule.find( 'select[name=' + arguments[ 1 ] + '\\[\\]]' ).val( arguments[ 2 ] ).trigger( 'change' );
            if ( new_rule.find( 'select[name=' + arguments[ 3 ] + '\\[\\]] option[value="' + arguments[ 4 ] + '"]').length ) {
                new_rule.find( 'select[name=' + arguments[ 3 ] + '\\[\\]]' ).val( arguments[ 4 ] ).trigger( 'change' );
            } else {
                var newOption = new Option( arguments[ 4 ], arguments[ 4 ], true, true );
                new_rule.find( 'select[name=' + arguments[ 3 ] + '\\[\\]]' ).append( newOption ).trigger('change');
            }
        },
        save_options = function(){
            fetch( 'save_options', get_options(), function( data ){
                if( data.error )
                    return alert( data.error );
                else {
                    render_example();
                    $('#save-options').addClass('success');
                }
            } );
        };
    return {
        init : function(){
            $(document).ready(function(){
                assign_events();
                render_rules();
                render_example();
                init_dnd_list();
            });
        }
    }
})(jQuery).init();