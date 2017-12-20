/**
 * Settings Widget.
 * @module widgets/settings
 * @param {string} container - Css-selector of Widget container
 * @param {object} options - Widget init options
 * @author AdminBootstrap.com
 */

App.classes.SettingsWidget = function(container, options) {

  /**
   * @const {object} Constant css-selectors to link up with HTML markup.
   */
  var c = {
    WIDGET: container,
    ITEM: container + ' .st-settings__item',
    EXPAND: container + ' .st-settings__expand',
    EXPANDED_CLASS: 'expanded',
    SUBROW: '.st-settings__sub',
    LOADER: container + ' .sp-settings__loader',
    UPDATING: 'st-settings--updating'
  };


  /**
   * @var {object} Module settings object.
   */
  var s = {
    $widget: $(c.WIDGET),
    $items: $(c.ITEM),
    $expand: $(c.EXPAND),
    options: options
  };


  /**
   * @function Validate initial options
   *
   * @return {boolean} Result
   */
  function validate() {

    try {
      if (!s.$widget.length) throw "SettingsWidget: can't find container '" + container + "'.";
    } catch(e) {
      console.warn(e);
      return false;
    }

    return true;
  }


  /**
   * @function Init widget controls with plugins and change handlers
   *
   * @todo Implement various slider types (double, etc.)
   */
  function initControls() {
    for(var i = 0; i < s.options.controls.length; i++) {
      var control = s.options.controls[i],
          $el = $(control.el);

      switch(control.type) {

        case 'switch':
          // Switchery Plugin
          $el.data('switch', new Switchery($el[0], {
            size: 'small'
          }));

          $el.on('change', function() {
            update($(this).attr('name'), $(this).prop('checked'));
          });
          break;

        case 'select2':
          // Select2 Plugin
          $el.select2({});

          $el.on('change', function() {
            update($(this).attr('name'), $(this).val());
          });
          break;

        case 'slider':
          // ionRangeSlider Plugin
          $el.ionRangeSlider({
            onChange: function(slider) {
              var $input = slider.input,
                  $label = $input.closest(c.ITEM).find('.settings-label'),
                  value = $input.val();

                if ($label.length) {
                  $label.text(value);
                }
            },
            onFinish: function(slider) {
              var $input = slider.input,
                  value = $input.val();

              update($input.attr('name'), value);
            }
          })
          break;
      }
    }
  }


  /**
   * @function Control update handler
   *
   * @param {string} name Control Name
   * @param  {mixed} value Control Valuen
   */
  function update(name, value) {
    //console.log('settings update: ' + name + ' = ' + value);

    s.$widget.addClass(c.UPDATING);
    setTimeout(function() {
      s.$widget.removeClass(c.UPDATING);
    }, 1000)

  }

  function bindUIActions() {
    // Bind item expanders
    s.$expand.on('click', expandItem);
  }

  function expandItem() {
    var $item = $(this).closest(c.ITEM),
        $sub = $item.find(c.SUBROW);
    if ($sub.length) {
      $sub.slideToggle(150);
      $item.toggleClass(c.EXPANDED_CLASS);
    }
  }


  function init() {
    if (validate()) {
      initControls();
      bindUIActions();
    }
  };

  init();

  return {
    $el: s.$widget
  }
};