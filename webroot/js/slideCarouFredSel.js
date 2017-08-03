$(function() {

    //	Basic carousel, no options
    //$('#foo0').carouFredSel();

    //	Basic carousel + timer
//    $('#foo1').carouFredSel({
//        auto: {
//            pauseOnHover: 'resume',
//            onPauseStart: function( percentage, duration ) {
//                $(this).trigger( 'configuration', ['width', function( value ) { 
//                    $('#timer1').stop().animate({
//                        width: value
//                    }, {
//                        duration: duration,
//                        easing: 'linear'
//                    });
//                }]);
//            },
//            onPauseEnd: function( percentage, duration ) {
//                $('#timer1').stop().width( 0 );
//            },
//            onPausePause: function( percentage, duration ) {
//                $('#timer1').stop();
//            }
//        }
//    });

    //	Scrolled by user interaction
    $('#foo2').carouFredSel({
        prev: '#prev2',
        next: '#next2',
        pagination: "#pager2",        
        scroll: 1,
        width: 1000,
        auto: {
            pauseOnHover: 'resume',
            onPauseStart: function( percentage, duration ) {
                $(this).trigger( 'configuration', ['width', function( value ) { 
                    $('#timer1').stop().animate({
                        width: value
                    }, {
                        duration: duration,
                        easing: 'linear'
                    });
                }]);
            },
            onPauseEnd: function( percentage, duration ) {
                $('#timer1').stop().width( 0 );
            },
            onPausePause: function( percentage, duration ) {
                $('#timer1').stop();
            }
        }
    });

    //	Variable number of visible items with variable sizes
//    $('#foo3').carouFredSel({
//        width: 360,
//        height: 'auto',
//        prev: '#prev3',
//        next: '#next3',
//        auto: false
//    });
//
//    //	Fluid layout example 1, resizing the items
//    $('#foo4').carouFredSel({
//        responsive: true,
//        width: '100%',
//        scroll: 2,
//        items: {
//            width: 400,
//            //	height: '30%',	//	optionally resize item-height
//            visible: {
//                min: 2,
//                max: 6
//            }
//        }
//    });
//
//    //	Fuild layout example 2, centering the items
//    $('#foo5').carouFredSel({
//        width: '100%',
//        scroll: 2
//    });

});