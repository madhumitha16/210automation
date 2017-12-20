/**
 * Overview page module.
 * @module pages/overview
 * @author AdminBootstrap.com
 */

App.page.overview = function() {

  /**
   * @const {object} Constant css-selectors to link up with HTML markup.
   */
  var c = {}

  /**
   * @var {object} Module settings object.
   */
  var s = {
    widgets: {}
  };

  function initWidgets() {
    // DetailedChart Widget
    s.widgets.dc = new App.classes.DetailedChart();
    // Activity Feed Widget
    s.widgets.afeed = new App.classes.ActivityFeed();
  }

  function initPlugins() {
    // widsbar horizontal scroll
    //$('.st-widsbar__cont').scrollbar({ disableBodyScroll: true, duration: 50 });
    // Init jQuery.Sparkline Charts
    $('.sparkline').sparkline('html', { enableTagOptions: true });
    $(document.getElementById('resize-iframe').contentWindow).on('resize', function() {
      $('.sparkline').sparkline('html', { enableTagOptions: true });
    })
  }

  function bindUIActions() {
    $(window).on('resize', function() {
      $('.sparkline').sparkline('html', { enableTagOptions: true });
    })
  }

  function init() {
    initPlugins();
    initWidgets();
    bindUIActions();
  }

  init();

  return s;

}();