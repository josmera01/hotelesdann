// $Id: language_switcher.js,v 1.2 2011/01/28 00:13:54 goodman Exp $
(function ($) {

/**
 * Implementation of Drupal.behaviors for dashboard.
 */
Drupal.behaviors.langauges_switcher = {
  attach: function (context, settings) {
    // @todo: add default display
    Drupal.behaviors.langauges_switcher.blockOverrideDefaults();
    Drupal.behaviors.langauges_switcher.wrapLangs();
    Drupal.behaviors.langauges_switcher.resizePanels();
  },

  /**
   * Desc
   */
  blockOverrideDefaults: function () {
    // Defaults
    $('#block-locale-language a.language-link').addClass('on');

    // Toggle the link
    $('#block-locale-language a.language-link').toggle( // off
      function(event) {
        $(this).removeClass('off');
        $(this).removeClass('on');
        $(this).addClass('off');

        var language = Drupal.behaviors.langauges_switcher.getLangFromCss(this);
        if (language != '') {
          var selector = "div." + language;
          $(selector).removeClass('visible');
          $(selector).addClass('hidden');

          Drupal.behaviors.langauges_switcher.resizePanels();
        }

        event.preventDefault();
      },
      function(event) { // on
        $(this).removeClass('off');
        $(this).removeClass('on');
        $(this).addClass('on');

        var language = Drupal.behaviors.langauges_switcher.getLangFromCss(this);
        if (language != '') {
          var selector = "div." + language;
          $(selector).removeClass('hidden');
          $(selector).addClass('visible');

          Drupal.behaviors.langauges_switcher.resizePanels();
        }

        event.preventDefault();
      }
    );
  },

  /**
   * Desc
   */
  wrapLangs: function () {
    for (var i in Drupal.settings.languages) {
      var lang = Drupal.settings.languages[i];
      var class = '.node.' + lang;
      $(class).wrapAll("<div class='" + lang + " language visible'></div>");
    }
  },

  /**
   * Desc
   */
  resizePanels: function () {
    var parent_width = $("div.language").parent().width();
    var panels_count = $("div.language.visible").length;
    var panel_size = (parent_width / panels_count) - 20;

    $(".language").css('width', panel_size + 'px');
    $(".language").css('float', 'left');
    $(".language").css('margin', '0 10px');
  },

  /**
   * Desc
   */
  getLangFromCss: function (obj) {
    var languages = Drupal.settings.languages;
    languages = oc(languages);

    var parent_css = $(obj).parent().attr('class');
    parent_css = parent_css.split(" ");

    var language = '';

    for (var i in parent_css) {
      if (parent_css[i] in languages) {
        language = parent_css[i];
      }
    }

    return language;
  }
};

// object converter: convert array into object
function oc(a) {
  var o = {};
  for(var i=0;i<a.length;i++)
  {
    o[a[i]]='';
  }
  return o;
}

})(jQuery);