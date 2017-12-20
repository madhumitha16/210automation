/**
 * Detailed Chart Widget.
 * The Widget with customizable chart and dataTable.
 * @module widgets/detailed-chart
 * @param {object} options - Widget init options
 * @author AdminBootstrap.com
 */

App.classes.DetailedChart = function(options) {
  var o = options || {};

  /**
   * @const {object} Constant css-selectors to link up with HTML markup.
   */
  var c = {
    CHART: 'dc-chart',
    SETTINGS: {
      GROUP:     'input[name="dc-set-group"]',
      LEGEND:    '#dc-set-legend',
      SCROLLBAR: '#dc-set-scrollbar',
      TABLES:    '#dc-set-tables'
    },
    RANGE: '#dc-range',
    TABLES: {
      CONTAINER: '#dc-tables',
      SALES: {
        TABLE: '#dc-table-sales',
        PAGINATION: '#dc-table-sales-p'
      },
      USERS: {
        TABLE: '#dc-table-users',
        PAGINATION: '#dc-table-users-p'
      }
    }
  };

  /**
   * @var {object} Module settings object.
   */
  var s = {
    widgets: {},
    settings: {
      $group_by:    $(c.SETTINGS.GROUP),
      $legend:      $(c.SETTINGS.LEGEND),
      $scrollbar:   $(c.SETTINGS.SCROLLBAR),
      $tables:      $(c.SETTINGS.TABLES)
    },
    $range: $(c.RANGE),
    state: {
      date_from: 0,
      date_to: 0,
      group_by: 'day',
      legend: false,
      scrollbar: false,
      tables: true
    },
    cache: {}
  };


  /**
   * @function Validate initial options
   *
   * @return {boolean} Result
   */
  function validate() {

    try {
      //if (!o.chart || !$('#' + o.chart.el).length) throw "DetailedChart: can't find chart element '#" + c.CHART + "'.";
    } catch(e) {
      console.warn(e);
      return false;
    }

    return true;
  }

  function initPlugins() {
    // Bootstrap DateRangePicker Plugin
    s.$range.daterangepicker({
      "ranges": {
        'Today': [moment(), moment()],
        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month': [moment().startOf('month'), moment().endOf('month')],
        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      "locale": {
        "firstDay": App.settings.firstWeekDay
      },
      "alwaysShowCalendars": true,
      "startDate": moment().format('MM/DD/YYYY'),
      "endDate": moment().format('MM/DD/YYYY'),
      "opens": "left",
      "linkedCalendars": false
    },
    function(start, end, label) {
      s.$range.find('span').html(start.format('MMM D YYYY') + ' - ' + end.format('MMM D YYYY'));
      s.state.date_from = start.valueOf();
      s.state.date_to = end.valueOf();
      s.updateData();
    });

    $(c.TABLES.CONTAINER + ' .nav-tabs').tabdrop()
  }

  function initWidgets() {
    // AmChart options
    var options = {
      "valueAxes": [
        {
          "id": "s",
          "position": "left",
          "autoGridCount": false,
          "labelFunction": function(value) {
            return "$" + Math.round(value);
          },
          "minMaxMultiplier": 1
        },
        {
          "id": "u",
          "gridAlpha": 0,
          "position": "right",
          "autoGridCount": false,
          "minMaxMultiplier": 1
        }
      ],
      "categoryField": "date",
      "graphs": [
        {
          "id": "g2",
          "valueAxis": "s",
          "lineColor": "#62cf73",
          "fillColors": "#62cf73",
          "fillAlphas": 1,
          "type": "column",
          "title": "Sales",
          "valueField": "sales",
          "clustered": false,
          "columnWidth": 0.3,
          "legendValueText": "$[[value]]"
        },
        {
          "id": "g3",
          "valueAxis": "u",
          "bullet": "round",
          "bulletBorderAlpha": 1,
          "bulletColor": "#FFFFFF",
          "bulletSize": 5,
          "hideBulletsCount": 150,
          "lineThickness": 2,
          "lineColor": "#20acd4",
          "type": "smoothedLine",
          "title": "Users",
          "useLineColorForBulletBorder": true,
          "valueField": "users"
        }
      ],
      "legend": {
        enabled: false
      }
    };

    // Init AmChart Widget
    s.widgets.am = new App.classes.AmChart(c.CHART, options, initSettings);

    // Sales DataTable Init
    s.widgets.salesTable = new App.classes.TableWidget({
      table: c.TABLES.SALES.TABLE,
      pagination: c.TABLES.SALES.PAGINATION,
      dataTable: {
        'dom': 'tp',
        "pageLength": 5,
        'columns': [
            {
              data: "product",
              className: "text-nowrap"
            },
            {
              data: "price",
              className: "text-right",
              render: function(data, type, row) {
                return type === "display" ?
                  App.utils.formatNumber(data, 2, '$') :
                  data;
              }
            },
            {
              data: "date",
              className: "text-nowrap",
              render: function(data, type, row) {
                return type === "display" ?
                  moment.utc(+data).format('D MMM YYYY HH:mm') :
                  data;
              }
            },
            {
              data: "status",
              render: function(data, type, row) {
                if (!type === "display") {
                  return data;
                }

                return data ?
                  '<span class="label label-success">Completed</span>' :
                  '<span class="label label-default">In Process</span>';
              }
            },
            {
              data: "",
              render: function(data, type, row) {
                if (!type === "display") {
                  return "";
                }
                return '<a class="btn btn-default btn-xs">View</a>';
              }
            }
        ],
        'columnDefs': [
          { 'orderable': false, 'targets': [4] }
        ],
        'order': [[2, 'desc']]
      }
    });

    // Sales DataTable Init
    s.widgets.usersTable = new App.classes.TableWidget({
      table: c.TABLES.USERS.TABLE,
      pagination: c.TABLES.USERS.PAGINATION,
      dataTable: {
        'dom': 'tp',
        "pageLength": 5,
        'columns': [
            {
              data: "name",
              className: "text-nowrap"
            },
            {
              data: "username",
              className: "text-nowrap"
            },
            {
              data: "date",
              className: "text-nowrap",
              render: function(data, type, row) {
                return type === "display" ?
                  moment.utc(+data).format('D MMM YYYY HH:mm') :
                  data;
              }
            },
            {
              data: "status",
              render: function(data, type, row) {
                if (!type === "display") {
                  return data;
                }

                return data ?
                  '<span class="label label-success">Active</span>' :
                  '<span class="label label-danger">Disabled</span>';
              }
            },
            {
              data: "",
              render: function(data, type, row) {
                if (!type === "display") {
                  return "";
                }
                return '<a class="btn btn-default btn-xs" href="app-profile.html">View</a>';
              }
            }
        ],
        'columnDefs': [
          //{ 'orderable': false, 'targets': [4] }
        ],
        'order': [[2, 'desc']]
      }
    });
  }

  function initSettings() {
    // Initial Setup for widget settings
    s.settings.$group_by.filter('[value="day"]').prop('checked', true);
    s.settings.$legend.prop('checked', s.widgets.am.chart.legend && s.widgets.am.chart.legend.enabled);
    s.settings.$scrollbar.prop('checked', s.widgets.am.chart.chartScrollbar && s.widgets.am.chart.chartScrollbar.enabled);
    s.settings.$tables.prop('checked', true);
  }

  function initState() {
    // Initial Setup for widget state
    s.state.group_by = s.settings.$group_by.filter(':checked').val();
    s.state.legend = s.settings.$legend.prop('checked');
    s.state.scrollbar = s.settings.$scrollbar.prop('checked');
    s.state.tables = s.settings.$tables.prop('checked');

    s.setDatesRange(
      moment().subtract(14, 'days').hour(0).minute(0).second(0).millisecond(0),
      moment().hour(23).minute(59).second(59).millisecond(999)
    )
  }

  function bindUIActions() {
    // Show/Hide Chart Legend
    s.settings.$legend.on('change', function() {
      s.state.legend = $(this).prop('checked');
      s.widgets.am.setOptions({
        legend: {
          enabled: s.state.legend
        }
      })
    })
    // Show/Hide Chart Scrollbar
    s.settings.$scrollbar.on('change', function() {
      s.state.scrollbar = $(this).prop('checked');
      s.widgets.am.setOptions({
        chartScrollbar: {
          enabled: s.state.scrollbar
        }
      })
    })
    // Change GroupBy Period
    s.settings.$group_by.on('change', function() {
      s.state.group_by = $(this).val();
      s.updateData();
    })
    // Hide/Show Tables
    s.settings.$tables.on('change', function() {
      s.state.tables = $(this).prop('checked');
      if (s.state.tables) {
        $(c.TABLES.CONTAINER).removeClass('hide');
      } else {
        $(c.TABLES.CONTAINER).addClass('hide');
      }
    })
  }

  function updateChartData(data) {
    s.widgets.am.setData(data);
  }

  function updateTablesData(data) {
    // Sales Table
    s.widgets.salesTable.dataTable
      .clear()
      .rows.add(data.sales)
      .draw();

    // Users Table
    s.widgets.usersTable.dataTable
      .clear()
      .rows.add(data.users)
      .draw();
  }

  s.updateData = function() {
    var group_by = s.state.group_by,
        date_from = s.state.date_from,
        date_to = s.state.date_to,
        data = {
          raw: {
            users: [],
            sales: []
          },
          grouped: []
        },
        cache = s.cache[date_from.toString() + date_to.toString()];
    if (cache) {
      data.raw = cache.raw;
    } else {
      data.raw.users = App.service.api.getUsersByDates(
        App.utils.getUTCTimeFromLocalTime(date_from),
        App.utils.getUTCTimeFromLocalTime(date_to)
      );
      data.raw.sales = App.service.api.getSales(
        App.utils.getUTCTimeFromLocalTime(date_from),
        App.utils.getUTCTimeFromLocalTime(date_to)
      );
      s.cache[date_from.toString() + date_to.toString()] = cache = {
        raw: {
          users: data.raw.users,
          sales: data.raw.sales
        },
        grouped: {}
      };
    }

    updateTablesData(data.raw);

    if (cache.grouped[group_by]) {
      data.grouped = cache.grouped[group_by];
    } else {
      var map = App.service.dataMapper.createMap(date_from, date_to, group_by);

      _.chain(data.raw.users)
        .groupBy(function(user) {
          return App.service.dataMapper.getStartOfPeriod(App.utils.getLocalTimeFromUTCTime(user.date), group_by)
        })
        .map(function(users, date) {
          map[date]['users'] = users.length;
        })

      _.chain(data.raw.sales)
        .groupBy(function(sale) {
          return App.service.dataMapper.getStartOfPeriod(App.utils.getLocalTimeFromUTCTime(sale.date), group_by)
        })
        .map(function(sales, date) {
          map[date]['sales'] = _.reduce(sales, function(sum, sale) {
            return sum + sale.price;
          }, 0);
        })

      _.mapObject(map, function(entry, date) {
        if (!entry['users']) {
          entry['users'] = 0;
        }
        if (!entry['sales']) {
          entry['sales'] = 0;
        }
        data.grouped.push(entry);
      })

      s.cache[date_from.toString() + date_to.toString()].grouped[group_by] = data.grouped;
    }

    updateChartData(data.grouped);
  }

  s.setDatesRange = function(from, to) {
    var picker = s.$range.data('daterangepicker');
    picker.setStartDate(from);
    picker.setEndDate(to);
    picker.callback(from, to);
  }

  function init() {
    if (validate()) {
      initPlugins();
      initWidgets();
      bindUIActions();
      initState();
    }
  };

  init();

  return s;
};