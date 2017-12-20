 /**
  * The main module that does some global initialization.
  * @module app
  * @author AdminBootstrap.com
  */

window.App = function() {

  /**
   * @function Initializes plugins that may be needed on any page.
   */
  function initPlugins() {

    // jQuery Scrollbar (on every scrollable element)
    $('.scrollbar').each(function() {
      $(this).scrollbar({ disableBodyScroll: true, duration: 150 });
    })

    // Highlight.js (source code highlighting)
    $('pre code').each(function(i, block) {
      hljs.highlightBlock(block);
    });

    // Bootstrap Tooltips
    $('[data-toggle="tooltip"]').tooltip()

    // Bootstrap Popovers
    $('[data-toggle="popover"]').popover()

    // Select2
    $(".select2-box").each(function() {
      $(this).select2({});
    });

    // ion.rangeSlider
    $('.slider').each(function() {
      $(this).ionRangeSlider({})
    });

    // Clipboard.js for copying stuff
    if (typeof Clipboard == "function") {
      new Clipboard('.st-clip');
    }

    // Fix buttons state inside Tab
    // and perform subtitle change if it specified
    $(document).on('show.bs.tab', 'a[data-toggle="tab"]', function (e) {
      var $tab = $(e.target);

      // Check if tab-toggle is a Button
      if ($tab.hasClass('btn')) {
        $tab.siblings('.btn').removeClass('active');
        $tab.addClass('active');
      }
      // Check is there a subtitle
      var $subtitle = $($tab.closest('.nav-tabs, .nav-pills').data('subtitle'));
      if ($subtitle.length) {
        $subtitle.text($tab.text());
      }
    })

    $('.st-panel__tabs .nav-tabs').tabdrop();

    // Add the "container" option to the Bootstrap 'dropdown-menu'.
    // It allows to show a dropdown regardless its parent 'overfow: hidden' property.
    // usage: <a class="dropdown-toggle" data-toggle="dropdown" data-container="body">
    $(document).on('shown.bs.dropdown', function(e) {
      var $parent = $(e.target),
          $dropdown = $parent.find('.dropdown-menu'),
          $container = $($(e.relatedTarget).data('container')),
          // Cloning original dropdown in order to place it in the new container
          $clone = $dropdown.clone();

      if ($container.length) {
        // Place the Clone and set original position
        $container.append($clone.css({
          left: $dropdown.offset().left,
          right: 'auto',
          top: $dropdown.offset().top,
          display: 'block'
        }));
        // Hide original dropdown
        $dropdown.css('display', 'none');

        // Bind 'hide' event on original parent to remove the Clone later
        $parent.on('hide.bs.dropdown', hideDropdownClone)

        function hideDropdownClone(e) {
          // Remove Clone, unbind Hide event and restore Original
          $clone.detach();
          $parent.removeClass('open').off('hide.bs.dropdown', hideDropdownClone);
          $dropdown.removeAttr('style');
        }
      }
    })


    // Add "Refresh" Panel Tool.
    // Shows fake loading spiner just for demo purpouse.
    $.fn.panel.Constructor.prototype.refresh = function(_relatedTarget) {
      var $panel = this.$element;

      $panel.addClass('st-panel--refresh');
      $panel.find('[data-tool="refresh"] i.fa').addClass('fa-spin');

      setTimeout(function() {
        $panel.removeClass('st-panel--refresh');
        $panel.find('[data-tool="refresh"] i.fa').removeClass('fa-spin');
      }, 2000);
    }

    // Add "Source" Panel Tool.
    // Copy HTML code of a panel into special modal-dialog and show it.
    $.fn.panel.Constructor.prototype.source = function(tool) {
      var root = $(tool).data('source-root'),
          $element = $(root).length ? $(root) : this.$element,
          title = $element.find('.st-panel-title span').text() + ' Source',
          $modal = $('#source-modal');

      var $source = $element.clone();
      // Exclude specified DOM-elements
      $source.find($(tool).data('source-exclude')).html('').text('...');

      // Clear code from various plugins
      $source.find('[style]').removeAttr('style');
      $source.find('[aria-expanded]').removeAttr('aria-expanded');
      $source.find('img').attr('src', '');
      $source.find('.select2-container').remove();
      $source.find('.select2-hidden-accessible').removeClass('select2-hidden-accessible');
      $source.find('.irs').remove();
      $source.find('.irs-hidden-input').removeClass('irs-hidden-input');

      var code = $source[0].outerHTML;
      // Prettify and Highlight code
      $modal.find('#source-code').text(vkbeautify.xml(code, 2));
      hljs.highlightBlock($('#source-code')[0]);

      // Set Title
      $modal.find('.modal-title').text(title);

      $modal.modal('show');
    }
  }

  return {
    classes: {},
    layout: {},
    page: {},
    service: {},
    settings: {
      firstWeekDay: 1
    },
    utils: {
      getUTCTimeFromLocalTime: function(time) {
        var date = new Date(time);
        return Date.UTC(date.getFullYear(), date.getMonth(), date.getDate(), date.getHours(), date.getMinutes(), date.getSeconds(), date.getMilliseconds());
      },
      getLocalTimeFromUTCTime: function(time) {
        var offset = new Date().getTimezoneOffset() * 60 * 1000;
        return new Date(time).getTime() + offset;
      },
      formatNumber: function(num, c, cur, d, t) {
        var c = isNaN(c = Math.abs(c)) ? 2 : c,
            cur = cur == undefined ? "" : cur,
            d = d == undefined ? "." : d,
            t = t == undefined ? "," : t,
            s = num < 0 ? "-" : "",
            i = String(parseInt(num = Math.abs(Number(num) || 0).toFixed(c))),
            j = (j = i.length) > 3 ? j % 3 : 0;
         return s + cur + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(num - i).toFixed(c).slice(2) : "");
       }
    },
    init: function() {
      initPlugins();
    }
  }
}();

$(document).ready(function() {
  App.init();
})