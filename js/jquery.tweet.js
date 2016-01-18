
(function ($) {

	$.fn.tweet = function (o) {
		var s = {
			list: null,                             // [string]   optional name of list belonging to username
			avatar_size: null,                      // [integer]  height and width of avatar if displayed (48px max)
			intro_text: null,                       // [string]   do you want text BEFORE your your tweets?
			outro_text: null,                       // [string]   do you want text AFTER your tweets?
			join_text: null,                        // [string]   optional text in between date and tweet, try setting to "auto"
			auto_join_text_default: null,           // [string]   auto text for non verb: "i said" bullocks
			auto_join_text_ed: null,                // [string]   auto text for past tense: "i" surfed
			auto_join_text_ing: null,               // [string]   auto tense for present tense: "i was" surfing
			auto_join_text_reply: null,             // [string]   auto tense for replies: "i replied to" @someone "with"
			auto_join_text_url: null,               // [string]   auto tense for urls: "i was looking at" http:...
			loading_text: null,                     // [string]   optional loading text, displayed while tweets load
			query: null                             // [string]   optional search query
		};

		if(o) { $.extend(s, o); }

    $.fn.extend({
      linkUrl: function () {
        var returning = [], regexp = /((ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?)/gi;
        this.each(function() {
          returning.push(this.replace(regexp,"<a href=\"$1\" target=\"_blank\">$1</a>"));
        });
        return $(returning);
      },
      linkUser: function () {
        var returning = [], regexp = /[\@]+([A-Za-z0-9-_]+)/gi;
        this.each(function() {
          returning.push(this.replace(regexp,"<a href=\"http://twitter.com/$1\" target=\"_blank\">@$1</a>"));
        });
        return $(returning);
      },
      linkHash: function () {
        var returning = [], regexp = / [\#]+([A-Za-z0-9-_]+)/gi;
        this.each(function() {
          returning.push(this.replace(regexp, ' <a href="http://search.twitter.com/search?q=&tag=$1&lang=all&from='+s.username.join("%2BOR%2B")+'" target=\"_blank\">#$1</a>'));
        });
        return $(returning);
      },
      capAwesome: function () {
        var returning = [];
        this.each(function() {
          returning.push(this.replace(/\b(awesome)\b/gi, '<span class="awesome">$1</span>'));
        });
        return $(returning);
      },
      capEpic: function () {
        var returning = [];
        this.each(function () {
          returning.push(this.replace(/\b(epic)\b/gi, '<span class="epic">$1</span>'));
        });
        return $(returning);
      },
      makeHeart: function () {
        var returning = [];
        this.each(function() {
          returning.push(this.replace(/(&lt;)+[3]/gi, "<tt class='heart'>&#x2665;</tt>"));
        });
        return $(returning);
      }
    });

    function relative_time (time_value) {
    	
      if($.browser.msie) {
      	time_value = time_value.replace(/^\w+ (\w+) (\d+) ([\d:]+) \+0000 (\d+)$/, "$1 $2 $4 $3 UTC");
      }
    	
      var parsed_date = Date.parse(time_value),
          relative_to = new Date(),
          delta = parseInt((relative_to.getTime() - parsed_date) / 1000, 10),
          pluralize = function (singular, n) {
            return '' + n + ' ' + singular + (n == 1 ? '' : 's');
          };
      if(delta < 60) {
      return 'less than a minute ago';
      } else if(delta < (45*60)) {
      return 'about ' + pluralize("minute", parseInt(delta / 60, 10)) + ' ago';
      } else if(delta < (24*60*60)) {
      return 'about ' + pluralize("hour", parseInt(delta / 3600, 10)) + ' ago';
      } else {
      return 'about ' + pluralize("day", parseInt(delta / 86400, 10)) + ' ago';
      }
    }

    function build_url () {
      var proto = ('https:' == document.location.protocol ? 'https:' : 'http:');
      if (s.list) {
        return proto+"//api.twitter.com/1/"+s.username[0]+"/lists/"+s.list+"/statuses.json?per_page="+s.count+"&callback=?";
      } else if (s.query == null && s.username.length == 1) {
        return proto+'//twitter.com/status/user_timeline/'+s.username[0]+'.json?count='+s.count+'&callback=?';
      } else {
        var query = (s.query || 'from:'+s.username.join('%20OR%20from:'));
        return proto+'//search.twitter.com/search.json?&q='+query+'&rpp='+s.count+'&callback=?';
      }
    }

    return this.each(function () {
      var list = $('<ul class="tweet_list">').appendTo(this),
          intro = '<p class="tweet_intro">'+s.intro_text+'</p>',
          outro = '<p class="tweet_outro">'+s.outro_text+'</p>',
          loading = $('<p class="loading">'+s.loading_text+'</p>');

      if(typeof(s.username) == "string") {
        s.username = [s.username];
      }

      if (s.loading_text) { $(this).append(loading); }
      $.getJSON(build_url(), function (data) {
        if (s.loading_text) { loading.remove(); }
        if (s.intro_text) { list.before(intro); }
        $.each((data.results || data), function(i,item) {
          // auto join text based on verb tense and content
          if (s.join_text == "auto") {
            if (item.text.match(/^(@([A-Za-z0-9-_]+)) .*/i)) {
              var join_text = s.auto_join_text_reply;
            } else if (item.text.match(/(^\w+:\/\/[A-Za-z0-9-_]+\.[A-Za-z0-9-_:%&\?\/.=]+) .*/i)) {
              var join_text = s.auto_join_text_url;
            } else if (item.text.match(/^((\w+ed)|just) .*/im)) {
              var join_text = s.auto_join_text_ed;
            } else if (item.text.match(/^(\w*ing) .*/i)) {
              var join_text = s.auto_join_text_ing;
            } else {
              var join_text = s.auto_join_text_default;
            }
          } else {
            var join_text = s.join_text;
          }

          var from_user = item.from_user || item.user.screen_name;
          var profile_image_url = item.profile_image_url || item.user.profile_image_url;
          var join_template = '<span class="tweet_join"> '+join_text+' </span>';
          var join = ((s.join_text) ? join_template : ' ');
          var avatar_template = '<a class="tweet_avatar" href="http://twitter.com/'+from_user+'"><img src="'+profile_image_url+'" height="'+s.avatar_size+'" width="'+s.avatar_size+'" alt="'+from_user+'\'s avatar" title="'+from_user+'\'s avatar" border="0"/></a>';
          var avatar = (s.avatar_size ? avatar_template : '');
          var date = '<span class="date">'+relative_time(item.created_at)+'</span>';
          var text = '<p class="tweet_text">' +$([item.text]).linkUrl().linkUser().linkHash()[0]+ '</p>';

          // until we create a template option, arrange the items below to alter a tweet's display.
          list.append('<li>' + avatar + join + text + date + '</li>');

          list.children('li:first').addClass('tweet_first');
          list.children('li:odd').addClass('tweet_even');
          list.children('li:even').addClass('tweet_odd');
        });
        if (s.outro_text) list.after(outro);
      });

    });
  };
})(jQuery);