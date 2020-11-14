(function($) {

    $.fn.extend({
        /**
         * Placeholder Plugin
         * Enables the placeholder functionality for all browsers that don't support that feature yet
         * The // if clause needs to be executed before the browser
         * 
         * @author Erik Frister <erik.frister@aoemedia.de>
         */
        aiPlaceholder: function() {

            // Check if browser natively supports placeholder
            var f = document.createElement('input'),
                supportsPh = !!('placeholder' in f);

            // browser supports placeholder natively, simply chain, do not execute
            if (supportsPh) return this;

            return this.each(function() {

                var $this = $(this);

                if ($this.val() == '' && $this.attr('placeholder') != '') {

                    $this
                        .val($this.attr('placeholder'))
                        .addClass('ai-placeholder');

                    $this.bind('focus', function() {
                        if ($this.val() == $this.attr('placeholder'))
                            $this.val('');

                        $this.removeClass('ai-placeholder');
                    });

                    $this.bind('blur', function() {
                        if ($this.val() == '') {
                            $this.val($this.attr('placeholder'));
                            $this.addClass('ai-placeholder');
                        }
                    });
                }


            });
        },
        /**
         * Mini Tab functionality
         * 
         * @author Roman Langolf
         */
        aiTabs: function() {

            var $tabs = $(this).find('a');
            var $panes = $(this).next('.panes').find('div');

            $tabs.bind('click', function() {

                if ($(this).hasClass('current')) {
                    return false;
                }

                $tabs.removeClass('current');
                $(this).addClass('current');

                var index = $tabs.index($(this));
                $panes.removeClass('current');
                $($panes[index]).addClass('current');

                return false;
            });

            return this; // maintain chainability
        },

        /**
         * Enables the persistent "close" functionality of the QuickStart Box
         * 
         * @author Roman Langolf 
         */
        aiQuickstartBox: function() {

            if ($.cookie("QuickstartBox") != 'closed') {

                var $close_button = $('<a></a>').addClass('box-close');
                $(this).find('h3').append($close_button);
                $close_button.click(function() {
                    $(this).closest('.ext-quickstart').animate({ height: 0, opacity: 0 }, 400, function() {
                        $(this).remove();
                        $.cookie("QuickstartBox", 'closed');
                    });

                });
            } else {
                $(this).remove();
            }

            return this; // maintain chainability
        },

        /**
         * Transforms realURL-ized select lists into dynamic select boxes
         * 
         * @author Erik Frister 
         */
        aiTransformSelect: function() {

            // closes all selectboxes
            function killAll() {
                $('.selectbox').trigger('close');
            }
            $(document).click(killAll);

            return this.each(function() {

                var $orig = $(this),
                    origClass = $orig.attr('class'),
                    sortClass = 'filter-sort' /* + origClass.replace(/select-list/g, "")*/ ,
                    $html = $('<div />', {
                        'class': 'selectbox ' + sortClass
                    }),
                    arrowMarkup = "<span class='arrow_btn'><span class='interior'><span class='arrow'></span></span></span>",
                    $dd = $("<ul class='items " + sortClass + "'></ul>"),
                    $firstItem;

                // Create selectbox
                $orig.children().each(function(index) {
                    var $origA = $(this).children('a');
                    var $a = ('<a href="' + $origA.attr('href') + '" class="text">' + $origA.text() + '</a>');
                    var $li = $('<li />').html($a);

                    $dd.append($li);

                    if (0 == index || $(this).hasClass('current')) {
                        $firstItem = $('<a href="' + $(this).children('a').attr('href') + '" class="display ' + sortClass + '"><span class="text">' + $origA.text() + '</span>' + arrowMarkup + '</a>');
                    }
                });

                $dd.hide();
                $html.append($firstItem).append($dd);
                $orig.replaceWith($html);

                // Add handlers
                $firstItem.bind('click', function() {

                    if (!$dd.data('aiOpen')) {
                        killAll();

                        $dd.css({
                                'position': 'absolute'
                            }).show()
                            .data('aiOpen', true);
                    } else {
                        $dd
                            .hide()
                            .data('aiOpen', false);
                    }

                    return false;
                });

                // Hover
                $dd.children().hover(function() {
                    $(this).addClass('hover');
                }, function() {
                    $(this).removeClass('hover');
                });

                // Closing the DD
                $html.bind('close', function() {
                    $dd.hide().data('aiOpen', false);
                });

            });

        },

        /**
         * Mini Tab functionality
         * 
         * @author Erik Frister 
         */
        aiCtTabs: function(options) {

            options = $.extend({
                tabs: 'a',
                panes: '.ct-panes',
                pane: '.ct-pane',
                preventNav: false,
                current: 'current'
            }, options);

            return this.each(function() {

                var o = options,
                    $this = $(this),
                    $tabs = $this.find(o.tabs),
                    $panes = $(o.panes).children(o.pane);

                if (!o.preventNav) {
                    // Add default event listener
                    $this.delegate(o.tabs, 'click', function() {

                        $this.children().removeClass(o.current);
                        $(this).closest('li').addClass(o.current);

                        $this.trigger('ai-navigate', [$(this).attr('href'), this]);
                        return false;
                    });

                }

                $this.bind('ai-navigate', function(e, href, item) {

                    var index = $tabs.index($(item));

                    $panes.removeClass('current');
                    $panes.eq(index).addClass('current');

                });

                try {
                    $(window.location.hash).click();
                } catch (e) {}

            });

            var $tabs = $(this).find('a');
            var $panes = $(this).next('.panes').find('div');

            $tabs.bind('click', function() {

                if ($(this).hasClass('current')) {
                    return false;
                }

                $tabs.removeClass('current');
                $(this).addClass('current');

                var index = $tabs.index($(this));
                $panes.removeClass('current');
                $($panes[index]).addClass('current');

                return false;
            });

            return this; // maintain chainability
        },

        /**
         * handles megamenu align if it's out of page width
         *
         * @author Roman Langolf 
         */
        aiMegamenu: function() {

            return this.each(function() {

                var $thisNav = $(this);
                setMegamenu();

                // check if fonts are loaded
                var wid = $('#nav').width(),
                    interval = 300,
                    times = 10,
                    currWid = wid,
                    counter = 0;

                var timer = setInterval(function() {
                    currWid = $('#nav').width();
                    if (currWid != wid) {
                        setMegamenu();
                    } else if (counter >= times - 1) {
                        clearInterval(timer);
                    }
                    counter++;
                }, interval);

                // set megamenu position
                function setMegamenu() {
                    var $navWrapper = $thisNav.closest('.hp-center'),
                        pageWidth = $navWrapper.width();

                    $navWrapper.css({ position: 'relative' });

                    $thisNav.children().each(function() {
                        var $thisMegaMenu = $(this).find('.megamenu'),
                            menuWidth = $thisMegaMenu.outerWidth(),
                            thisWidth = $(this).width();
                        if ($(this).position().left + menuWidth > pageWidth) {
                            $(this).hover(
                                function() {
                                    $thisMegaMenu.css({ marginTop: 0, marginLeft: -(menuWidth - thisWidth) })
                                },

                                function() {
                                    $thisMegaMenu.removeAttr('style');
                                }
                            );

                        } else {
                            $(this).hover(
                                function() {
                                    $thisMegaMenu.css({ margin: 'auto' });
                                },
                                function() {
                                    $thisMegaMenu.removeAttr('style');
                                }
                            );

                        }
                    });

                    $navWrapper.removeAttr('style');
                    clearInterval(timer);
                }

            });

        },

        /**
         * video tooltip function
         *
         * @author Roman Langolf
         */
        aiVideoTooltip: function() {

            return this.each(function() {
                $(this).children().hoverIntent({
                    over: function() {
                        $(this).find('.tooltip').show();
                    },
                    out: function() {
                        $(this).find('.tooltip').hide();
                    }
                });

            });


        }
    });

})(jQuery);




/*
     FILE ARCHIVED ON 18:17:43 Feb 01, 2013 AND RETRIEVED FROM THE
     INTERNET ARCHIVE ON 21:26:00 Oct 04, 2018.
     JAVASCRIPT APPENDED BY WAYBACK MACHINE, COPYRIGHT INTERNET ARCHIVE.

     ALL OTHER CONTENT MAY ALSO BE PROTECTED BY COPYRIGHT (17 U.S.C.
     SECTION 108(a)(3)).
*/
/*
playback timings (ms):
  LoadShardBlock: 60.153 (3)
  esindex: 0.007
  captures_list: 79.035
  CDXLines.iter: 12.91 (3)
  PetaboxLoader3.datanode: 81.971 (4)
  exclusion.robots: 0.179
  exclusion.robots.policy: 0.166
  RedisCDXSource: 1.728
  PetaboxLoader3.resolve: 42.181
  load_resource: 100.639
*/