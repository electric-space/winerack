jQuery(document).ready(function($) {
    
    // adds offset to scroll to function (adds data attr for uikit)
    //scrollOffset();
    
    $( window ).resize(function() {
        //scrollOffset();    
    });
    
    
    function scrollOffset(){
        var headerheight = $('.site-header').outerHeight();
    
        $('.header-nav li a, #menu-main-navigation li a').attr('data-uk-smooth-scroll', "{offset: "+headerheight+"}" );    
    }
    
    
    
    $( "ol:first" ).addClass( "first");
    
    
    
    // add class to checkbox
    
    $("input[name='number-bedrooms[]").addClass('uk-checkbox');
    
    
    
});


/**
 * Font loader
 */

/*
WebFont.load({
    google: {
        families: ['Josefin Sans:700,400', 'Playfair Display']
    }    
});
*/


WebFontConfig = {
      typekit: { id: 'nbw2nax' },
      google: { families: ['Josefin Sans:700,600,400', 'Playfair Display']}
   };

   (function(d) {
      var wf = d.createElement('script'), s = d.scripts[0];
      wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
      wf.async = true;
      s.parentNode.insertBefore(wf, s);
   })(document);



/**
 * This allows for offset from anchor link.
 * For a single page site.
 */

// set timeout onDomReady
$(function() {
  // Only set the timer if you have a hash
  if(window.location.hash) {
    setTimeout(delayedFragmentTargetOffset, 100);
  }
});


// add scroll offset to fragment target (if there is one)
function delayedFragmentTargetOffset(){
    var offset = $(':target').offset(),
    headerheight = $('.site-header').outerHeight(true) -2;
    
    if(offset){
        var scrollto = offset.top - headerheight; // minus fixed header height
        $('html, body').animate({scrollTop:scrollto}, 0);
    }
}