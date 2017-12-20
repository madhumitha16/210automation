/**
 * Notifications Widget.
 * @module widgets/notifications
 * @param {string} container - Css-selector of Widget container
 * @param {object} options - Widget init options
 * @author AdminBootstrap.com
 */

App.classes.NotificationsWidget = function(container, options) {
  var options = options || {};

  /**
   * @const {object} Constant css-selectors to link up with HTML markup.
   */
  var c = {
    WIDGET: container,
    ITEM: '.st-notification',
    MARK: '.st-notification__mark',
    MARK_ALL: container + ' .st-notifications__all',
    NEW_CLASS: 'new',
    COUNTER: container + ' .st-notifications__count'
  };


  /**
   * @var {object} Module settings object.
   */
  var s = {
    $widget: $(c.WIDGET),
    $items: $(c.WIDGET).find(c.ITEM),
    $counters: $(c.COUNTER).add(options.counters),
    $allBtn: $(c.MARK_ALL),
    options: options
  };


  /**
   * @function Validate initial options
   *
   * @return {boolean} Result
   */
  function validate() {

    try {
      if (!s.$widget.length) throw "NotificationsWidget: can't find container '" + container + "'.";
    } catch(e) {
      console.warn(e);
      return false;
    }

    return true;
  }

  function bindUIActions() {
    // Bind new items click
    s.$widget.on('click', c.ITEM + '.' + c.NEW_CLASS, markItem);
    // Bind mark buttons
    $(document).on('click', container + ' ' + c.MARK, markItem);
    // Bind mark-all button
    s.$allBtn.on('click', markAll);
  }

  function markItem(e) {
    var $item = $(this).is(c.ITEM) ? $(this) : $(this).closest(c.ITEM);
    e.stopPropagation();
    if ($item.length) {
      $item.toggleClass(c.NEW_CLASS);
      updateCounters();
    }
  }

  function markAll() {
    s.$items.removeClass(c.NEW_CLASS);
    updateCounters();
  }

  function updateCounters() {
    var count = s.$items.filter('.new').length;
    if (count > 0) {
      s.$counters.text(count);
      s.$allBtn.show();
    } else {
      s.$counters.text('');
      $(c.COUNTER).text('no');
      s.$allBtn.hide();
    }
  }


  function init() {
    if (validate()) {
      bindUIActions();
      updateCounters();
    }
  };

  init();

  return {
    $el: s.$widget
  }
};