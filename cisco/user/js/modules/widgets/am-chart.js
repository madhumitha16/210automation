/**
 * AmChart Widget.
 * @module widgets/am-chart
 * @param {string} container - chart container id
 * @param {object} options - Widget init options
 * @param {function} callback - Chart onInit callback
 * @author AdminBootstrap.com
 */

App.classes.AmChart = function(container, options, callback) {
  var o = options || {};

  /**
   * @const {object} Constant css-selectors to link up with HTML markup.
   */
  var c = {};


  /**
   * @var {object} Module settings object.
   */
  var s = {
    chart: null,
    onInit: callback
  };


  /**
   * @function Validate initial options
   *
   * @return {boolean} Result
   */
  function validate() {

    try {
      if (!$('#'+container).length) throw "AmChart: can't find chart container '" + container + "'.";
    } catch(e) {
      console.warn(e);
      return false;
    }

    return true;
  }

  // AmCharts Plugin Init
  function initChart() {

    // AmCharts default options
    var options = {
      "type": "serial",
      "theme": "light",
      "precision": 2,
      "marginRight": 0,
      "marginLeft": 0,
      "marginTop": 10,
      "mouseWheelZoomEnabled": false,
      "chartCursor": {
        "valueLineEnabled": true,
        "valueLineBalloonEnabled": true,
        "cursorAlpha": 0,
        "valueLineAlpha": 0.2
      },
      "categoryAxis": {
        "parseDates": true,
        "dashLength": 1,
        "minPeriod": "hh",
        "equalSpacing": true
      },
      "legend": {
        "enabled": true,
        "position": "top",
        "useGraphSettings": true,
        "markerLabelGap": 10,
        "spacing": 20,
        "markerSize": 12,
        "align": "center",
        "equalWidths": false
      },
      "chartScrollbar": {
        "enabled": false
      },
      "balloon": {
        "borderThickness": 1,
        "shadowAlpha": 0
      },
      "listeners": [
        {
          "event": "init",
          "method": function(e) {
            if (typeof s.onInit == 'function') {
              s.onInit();
            }
          }
        }
      ]
    };

    s.chart = AmCharts.makeChart(container, $.extend(true, options, o));
  }

  function init() {
    if (validate()) {
      initChart();
    }
  };

  init();

  s.setData = function(data) {
    if (data) {
      s.chart.dataProvider = data;
      s.chart.validateData();
    }
  }

  s.setOptions = function(options) {
    if (typeof options == 'object') {
      s.chart = $.extend(true, s.chart, options);
      s.chart.validateNow();
    }
  }

  return s;
};