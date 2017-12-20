/**
 * Side Panel module.
 * @module layout/spanel
 * @author AdminBootstrap.com
 */

App.layout.SPanel = function() {

  /**
   * @const {object} Constant css-selectors to link up with HTML markup.
   */
  var c = {
    SPANEL: '.st-spanel',
    OPEN: '.st-spanel__open',
    CLOSE: '.st-spanel__close',
    TABS: '.st-spanel a[data-toggle="tab"]',
    OPEN_CLASS: 'open'
  };


  /**
   * @var {object} Module settings object.
   */
  var s = {
    widgets: {},
    $spanel: $(c.SPANEL),
    $open: $(c.OPEN),
    $close: $(c.CLOSE),
    $tabs: $(c.TABS),
    blur: true,
    open: false
  };

  function getStateFromClass() {
    return s.$spanel.is('.' + c.OPEN_CLASS);
  }

  function bindUIActions() {
    // Open SPanel
    s.$open.on('click', openSPanel);

    // Close SPanel
    s.$close.on('click', closeSPanel);
  }

  function openSPanel() {
    var $btn = $(this);

    if (!s.open) {
      s.$spanel.addClass(c.OPEN_CLASS);
      s.open = true;
    }

    if ($btn.data('tab')) {
      showTab($btn.data('tab'));
    }

    if (s.blur) {
      $(document).on('click', handleSPanelClick);
    }
  }

  function closeSPanel() {
    if (s.open) {
      s.$spanel.removeClass(c.OPEN_CLASS);
      s.open = false;
    }

    if (s.blur) {
      $(document).off('click', handleSPanelClick);
    }
  }

  function showTab(tab) {
    var $tab = s.$tabs.filter('[href = "' + tab + '"]');

    if ($tab.length) {
      $tab.tab('show');
    }
  }

  function handleSPanelClick(e) {
    // Check if the spanel is open,
    // and it was not a 'open panel' click,
    // and click was outside of spanel
    if (s.open && !$(e.target).closest(c.OPEN).length && !$.contains(s.$spanel[0], e.target)) {
      closeSPanel();
    }
  }

  return {
    $el: s.$spanel,

    widgets: s.widgets,

    isOpen: function() {
      return s.open;
    },

    init: function() {
      s.open = getStateFromClass();
      bindUIActions();

      // Init AppSettings Widget
      s.widgets.AppSettings = new App.classes.SettingsWidget('#app-settings', {
        controls: [
          {
            el: '#app-settings__site',
            type: 'switch'
          },
          {
            el: '#app-settings__notifications',
            type: 'switch'
          },
          {
            el: '#app-settings__debug',
            type: 'switch'
          },
          {
            el: '#app-settings__backuper',
            type: 'switch'
          },
          {
            el: '#app-settings__optimizer',
            type: 'switch'
          },
          {
            el: '#app-settings__reports',
            type: 'switch'
          }
        ]
      });

      // Init MailingSettings Widget
      s.widgets.MailingSettings = new App.classes.SettingsWidget('#mailing-settings', {
        controls: [
          {
            el: '#mailing-settings__send',
            type: 'switch'
          },
          {
            el: '#mailing-settings__driver',
            type: 'select2'
          },
          {
            el: '#mailing-settings__limit',
            type: 'slider'
          }
        ]
      });

      // Init Notifications Widget
      s.widgets.Notifications = new App.classes.NotificationsWidget('.st-spanel .st-notifications', {
        counters: '.st-notifications-count'
      });
    }
  }
}();

$(document).ready(function() {
  App.layout.SPanel.init();
});