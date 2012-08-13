$('html').addClass('js');
$(function() {
    // Select section by location.hash
    // Example: http://www.clansuite.com/#page-news
    var match = 0;
    var hash_substr = window.location.hash.substr(1);
    if (hash_substr != '') {
        $('#content div.accordion').each(function(i) {
            if (hash_substr == $(this).attr('id')) {
                match = i;
            }
        });
    }
    $('#content .accordion:not(' + (match != 0 ? ':eq(' + match + ')' : ':first') + ')').hide();

    // Hoveranimations
    $('#sidebar a.menu_button').hover(function() {
        $(this).stop().animate({ width: '100px', paddingLeft: '35px' }, 225);
    }, function() {
        if (!$(this).is('.selected')) {
            $(this).stop().animate({ width: '100px', paddingLeft: '12px' }, 225);
        }
    });

    // Intercept clicks to the Menu on the right side (classes #sidebar > #menu)
    $('#menu a.menu_button').click(function() {
        $(this).addClass('selected');
        $('#sidebar a.menu_button:not(:eq(' + $('#sidebar a.menu_button').index(this) + '))').animate({ width: '100px', paddingLeft: '12px' }, 225).removeClass('selected');
        var hash = this.hash;
        // If the selected section isn't currently displayed, activate it
        if (!$('#content .accordion' + hash).is(':visible')) {
            $('#content .accordion:visible').animate({ height: 'hide', opacity: 'hide' }, 'fast');
            $('#content .accordion' + hash).animate({ height: 'show', opacity: 'show' }, 'slow');
        }
        return false;
    }).filter(':eq(' + match + ')').click();

    // Intercept clicks to the Menu "Topnavigation" (classes #headbar > #headmenu)
    $('#headmenu a').click(function() {
        // directly trigger all links without hash
        if (this.href.indexOf("#") == -1) { $('#headmenu a').index(this).click(); }
        var hash = this.hash;
        // If the selected section isn't currently displayed, activate it
        if (!$('#content .accordion' + hash).is(':visible')) {
             // deactivate the active link on the sidebar menu
             $('#sidebar a.menu_button:not(:eq(' + $('#sidebar a.menu_button').index(this) + '))').animate({ width: '100px', paddingLeft: '12px' }, 225).removeClass('selected');
             // activate the same link, as clicked in the topnavigation by its hash
             $('#sidebar a.menu_button[href=' + hash + ']').animate({ width: '100px', paddingLeft: '35px' }, 225).addClass('selected');

            // display accordion content
            $('#content .accordion:visible').animate({ height: 'hide', opacity: 'hide' }, 'fast');
            $('#content .accordion' + hash).animate({ height: 'show', opacity: 'show' }, 'slow');
        }
        return false;
    }).filter(':eq(' + match + ')').click();

    <!-- Widget Countdown - the countdown is synced with Trac -->
    $.ajax({
        url: 'http://clansuite.com/website/trac-rpc/trac.php',
        type: 'get',
        dataType: 'json',
        complete: function (result, status) {
            var milestone = $.parseJSON(result.responseText);
            var dueDate = new Date(milestone.due);
            /* callback function to sync countdown with the server time */
            serverTime = function() { return new Date(milestone.now); }
            /* is this milestone late? */
            if(milestone.late == 0) {
                /* milstone IS NOT late. display a countdown, "until" the milestone due date is reached. */
                $('#widget-countdown').countdown({until: dueDate , compact: true, format: 'wdHMs', serverSync: serverTime, timezone: +1 }).before('<div>due in</div>');
            } else {
                /* milstone IS late. display a countup, "since" the milestones due date. */
                $('#widget-countdown').countdown({since: dueDate , compact: true, format: 'wdHMs', serverSync: serverTime, timezone: +1 }).after('<div>late</div>');
            }
            /* print current milestone name */
            $('#current-milestone').append(milestone.current_milestone);
        }
    });

    <!-- Widget Twitter Profile - async -->
    jQuery(document).ready(function($) {
        $.getScript('http://widgets.twimg.com/j/2/widget.js', function() {
            var oTweet = new TWTR.Widget({
              id: 'widget-twitter', version: 2, type: 'profile', rpp: 3, interval: 20000, width: 200, height: 200,
              theme: {
                  shell:  { background: '#DDDDDD', color: '#444444' },
                  tweets: { background: '#f0f0f0', color: '#333333', links: '#0066CC' }
                },
              features: {
                  scrollbar: false, loop: true, live: false, hashtags: true, timestamp: true, avatars: false, behavior: 'all'
                }
            }).render().setUser('clansuite').start();
        });
    });

    <!-- Browser Update Notifier - async -->
    var $buoop = {};
    $buoop.ol = window.onload;
    window.onload=function()
    {
        try {if ($buoop.ol) $buoop.ol();}catch (e) {}
        var e = document.createElement("script");
        e.setAttribute("type", "text/javascript");
        e.setAttribute("src", "http://browser-update.org/update.js");
        document.body.appendChild(e);
    }
});