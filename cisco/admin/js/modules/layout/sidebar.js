/**
 * Sidebar module.
 * @module layout/sidebar
 * @author AdminBootstrap.com
 */

App.layout.Sidebar = function() {

  /**
   * @const {object} Constant css-selectors to link up with HTML markup.
   */
  var c = {
    SIDEBAR: '.st-sidebar',
    WRAPPER: 'body',
    TOGGLE: '.st-sidebar__toggle',
    ITEMS: '.st-sidebar__nav > ul > li',
    NESTED: '.st-sidebar__nested',
    POPUP: '.st-sidebar__popup',
    MODES: {
      COLLAPSIBLE: 'sidebar-collapsible',
      OFFCANVAS: 'sidebar-offcanvas',
    },
    OPEN: 'sidebar-open'
  };


  /**
   * @var {object} Module settings object.
   */
  var s = {
    $sidebar: $(c.SIDEBAR),
    $wrapper: $(c.WRAPPER),
    $toggle: $(c.TOGGLE),
    $items: $(c.ITEMS),
    $nested: $(c.NESTED),
    $popup: $(c.POPUP),
    state: {
      mode: {
        COLLAPSIBLE: false,
        OFFCANVAS: false
      },
      open: true
    }
  };

  function getModeFromWrapperClass() {
    for (var mode in c.MODES) {
      if (s.$wrapper.is('.' + c.MODES[mode])) {
        s.state.mode[mode] = true;
      }
    }

    return s.state.mode;
  }

  function getOpenStateFromWrapperClass() {
    return s.$wrapper.is('.' + c.OPEN);
  }

  function bindUIActions() {

    // Sidebar Toggle-Buttons Click
    s.$toggle.on('click', toggleSidebar);

    // Sidebar Item Click
    s.$items.on('click', 'a', function() {
      // only if sidebar is open
      if (s.state.open) {
        return handleItemClick.call(this);
      }
    });

    // Popup Item Click
    s.$sidebar.on('click', c.POPUP + ' a', handleItemClick);

    // Collapsed Sidebar Item Hover
    $('.' + c.MODES.COLLAPSIBLE + ' ' + c.ITEMS).on('mouseover', handleItemHover);

    // Sidebar Mouse Leave
    $('.' + c.MODES.COLLAPSIBLE + ' ' + c.SIDEBAR).on('mouseleave', handleSidebarLeave);

    // Auto-Collapse Sidebar
    $(window).on('resize', function(e) {
      if ($(this).width() <= 1024) {
        closeSidebar();
      }
    })
  }

  /**
   * @function Open/Close Sidebar
   */
  function toggleSidebar() {
    if (s.state.open) {
      closeSidebar();
    } else {
      openSidebar();
    }
  }

  function openSidebar() {
    s.$wrapper.addClass(c.OPEN);
    s.state.open = true;
    if (s.state.mode.COLLAPSIBLE) {
      s.$items.not('.active').removeClass('open');
    }

    $(document).on('click', blurClick);
  }

  function closeSidebar() {
    s.$wrapper.removeClass(c.OPEN);
    s.state.open = false;
    if (s.state.mode.COLLAPSIBLE) {
      s.$items.find('li.open:not(.active)').removeClass('open');
      s.$items.addClass('open');
      s.$nested.attr('style', '');
    }

    $(document).off('click', blurClick);
  }

  function blurClick(e) {
    // Close Sidebar on outside click
    if (s.state.open && !$(e.target).closest(c.TOGGLE).length && !$.contains(s.$sidebar[0], e.target)) {
      closeSidebar();
    }
  }

  function handleItemClick() {
    var $item = $(this).parent(),
        $nested = $item.find(c.NESTED).first();

      if ($item.length && $nested.length) {
        $item.toggleClass('open');
        $nested.slideToggle(150, setPopupPosition);

        return false;
      }

  }

  function handleItemHover() {
    var $item = $(this);

    if (!s.state.open) {
      s.$items.removeClass('hover');
      $item.addClass('hover');

      s.$popup.html('<ul><li class="open active">' + $item.html() + '</li></ul>');
      s.$popup.data('item', $item);

      setPopupPosition();
    }
  }

  function handleSidebarLeave() {
    if (!s.state.open) {
      s.$items.removeClass('hover');
    }
  }

  /**
   * @function Set top and bottom positions for hover-popup element
   * in COLLAPSIBLE mode and closed state
   */
  function setPopupPosition() {
    if (s.state.mode.COLLAPSIBLE && !s.state.open) {
      var $item = s.$popup.data('item'),
          space = s.$popup.parent().height(),
          position = {
            current: {
              top: s.$popup.position().top,
              bottom: space - (s.$popup.position().top + s.$popup.height())
            },
            new: {
              top: $item.position().top,
              bottom: space - ($item.position().top + s.$popup.height())
            }
          };

      // ensure proper css-transition
      if (position.new.bottom > 0) {
        s.$popup.css({ top: position.current.top + 'px', bottom: 'auto' });

        setTimeout(function() {
          s.$popup.css({ top: position.new.top + 'px' });
        }, 0);
      } else {
        s.$popup.css({ top: 'auto', bottom: position.current.bottom + 'px' });

        setTimeout(function() {
          s.$popup.css({ bottom: 0 });
        }, 0);
      }
    }
  }

  return {
    $el: s.$sidebar,

    getMode: function() {
      return s.state.mode;
    },

    isOpen: function() {
      return s.state.open;
    },

    init: function() {
      s.state.mode = getModeFromWrapperClass();
      s.state.open = getOpenStateFromWrapperClass();

      bindUIActions();

      if (s.state.mode.COLLAPSIBLE && !s.state.open) {
        s.$items.addClass('open');
      }

      $(window).resize();
    }
  }
}();

$(document).ready(function() {
  App.layout.Sidebar.init();
})