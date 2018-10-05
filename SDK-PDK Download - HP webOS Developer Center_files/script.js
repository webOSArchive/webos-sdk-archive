/* Author: Erik Frister
   Author: Roman Langolf
*/

SITENAME = {
  common: {
    init: function() {

      // romeve no-js class
      $(document).find('html').removeClass('no-js').addClass('js');
      
      //additional background
      $('<div class="page-bg-ext"></div>').insertBefore($('#header'));
      if ($('#main').find('.page-title').length < 1){
        $('body').find('.page-bg-ext').css({top: 118});
      }

      // Placeholder
      $('#header_inner').find('.search-txt').aiPlaceholder();

      // handles megamenu align when content is loaded, to get the right size
      $('#header_inner').find('.hp-nav').aiMegamenu();
      
      // application-wide code
      //$('select').sb({fixedWidth: false});
      $('.select-list').aiTransformSelect();
      
      //sidebar tabs function
      $('#main').children('.col-aside').find('.sidebar-tabs').aiTabs();

      $('#main').find('.ext-fullvideolist').aiVideoTooltip();

      // Fancybox
      $('.fb-js').fancybox({
    	  padding: 0,
    	  titleShow: false,
    	  overlayColor: '#000',
    	  overlayOpacity: 0.3
      });
      
    },

    finalize: function() {
    	
    	var $showcase = $('#content').children('.format-header').children('.showcase-list');

    	$showcase
    		.aiCtTabs({
    			panes: $('#content').children('.default-content').children('.ct-panes'),
    			preventNav: false
    		});

    }
  },

  PageMain: {
    init: function() {
      // controller-wide code
        $('#main').children('.col-aside').children('.ext-quickstart').aiQuickstartBox();       

    }
  },

  PageHome: {
    init: function() {
      // controller-wide code
    }
  }

};

UTIL = {

  fire : function(func,funcname, args){

    var namespace = SITENAME;  // indicate your obj literal namespace here

    funcname = (funcname === undefined) ? 'init' : funcname;
    if (func !== '' && namespace[func] && typeof namespace[func][funcname] == 'function'){
      namespace[func][funcname](args);
    }

  },

  loadEvents : function(){

    var bodyId = document.body.id;
    var classes = document.body.className.split(/\s+/);

    // hit up common first.
    UTIL.fire('common');

    // do all the classes too.
    $.each(classes, function(i, classnm){
        UTIL.fire(classnm);
        UTIL.fire(classnm,bodyId);
    });

    UTIL.fire('common','finalize');

  }

};

(function($){

  $(document).ready(function(){

    UTIL.loadEvents();

  })

})(window.jQuery);
/*
     FILE ARCHIVED ON 18:16:52 Feb 01, 2013 AND RETRIEVED FROM THE
     INTERNET ARCHIVE ON 21:26:03 Oct 04, 2018.
     JAVASCRIPT APPENDED BY WAYBACK MACHINE, COPYRIGHT INTERNET ARCHIVE.

     ALL OTHER CONTENT MAY ALSO BE PROTECTED BY COPYRIGHT (17 U.S.C.
     SECTION 108(a)(3)).
*/
/*
playback timings (ms):
  LoadShardBlock: 29.369 (3)
  esindex: 0.007
  captures_list: 47.657
  CDXLines.iter: 13.45 (3)
  PetaboxLoader3.datanode: 31.679 (4)
  exclusion.robots: 0.213
  exclusion.robots.policy: 0.2
  RedisCDXSource: 0.774
  PetaboxLoader3.resolve: 1565.304
  load_resource: 1576.201
*/