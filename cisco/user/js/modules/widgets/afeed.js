/**
 * Activity Feed Widget.
 * @module widgets/afeed
 * @author AdminBootstrap.com
 */

App.classes.ActivityFeed = function() {
  var o = {
    stats: {
      template: '<div class="st-afeed-stats__item">' +
                  '<div class="st-afeed-stats__info">' +
                    '<div class="st-afeed-stats__title"><%= title %></div>' +
                    '<div class="st-afeed-stats__value"><b><%= value %></b></div>' +
                  '</div>' +
                  '<div class="st-afeed-stats__chart">' +
                    '<div class="st-afeed-stats__sparks"></div>' +
                  '</div>' +
                '</div>',
      meta: {
        revenue: {
          title: "Revenue",
          type: "money"
        },
        items: {
          title: "Items Sold",
          type: "number"
        },
        users: {
          title: "New Users",
          type: "number"
        },
        mails: {
          title: "Mails Sent",
          type: "number"
        },
        comments: {
          title: "Comments",
          type: "number"
        }
      }
    },
    events: {
      template: '<div class="st-afeed-events__item">' +
                  '<div class="st-afeed-events__title"><%= title %></div>' +
                  '<div class="st-afeed-events__time"><small><%= date %></small></div>' +
                  '<div class="st-afeed-events__text">' +
                    '<p><%= text %></p>' +
                  '</div>' +
                '</div>'
    },
    feed: {
      template: '<div class="st-afeed-feed__item">' +
                  '<div class="st-afeed-feed__head">' +
                    '<div class="st-afeed-feed__ico">' +
                      '<div class="fa <%= icon %>"></div>' +
                    '</div>' +
                    '<div class="st-afeed-feed__title">' +
                      '<div class="st-afeed-feed__time"><%= date %></div>' +
                      '<div class="st-afeed-feed__ago"><small><%= passed %></small></div>' +
                    '</div>' +
                  '</div>' +
                  '<div class="st-afeed-feed__text">' +
                    '<p><%= text %></p>' +
                  '</div>' +
                '</div>',
      icons: {
        user: 'fa-user',
        mail: 'fa-envelope',
        transaction: 'fa-usd',
        system: 'fa-cog'
      }
    }
  }
  /**
   * @const {object} Constant css-selectors to link up with HTML markup.
   */
  var c = {
    CALENDAR: {
      EL: '#afeed-calendar',
      CONTAINER: '#afeed-calendar__cont'
    },
    STATS: {
      CONTAINER: '.st-afeed-stats',
      SPARKS: '.st-afeed-stats__sparks'
    },
    EVENTS: {
      CONTAINER: '.st-afeed-events__list',
      COUNTER: '.st-afeed-events__counter'
    },
    FEED: '.st-afeed-feed__list'
  };

  /**
   * @var {object} Module settings object.
   */
  var s = {
    $calendar: $(c.CALENDAR.EL),
    state: {
      date_from: 0,
      date_to: 0
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
      if (!s.$calendar.length) throw "ActivityFeed Widget: can't find calendar element '" + c.CALENDAR.EL + "'.";
    } catch(e) {
      console.warn(e);
      return false;
    }

    return true;
  }

  function initPlugins() {
    // Bootstrap DateRangePicker Plugin
    s.$calendar.daterangepicker(
      {
        "parentEl": c.CALENDAR.CONTAINER,
        "template": '<div class="daterangepicker daterangepicker-inline daterangepicker-alternative">' +
                        '<div class="calendar left">' +
                            '<div class="calendar-table"></div>' +
                        '</div>' +
                    '</div>',
        "alwaysShowCalendars": true,
        "startDate": moment().format('MM/DD/YYYY'),
        "endDate": moment().format('MM/DD/YYYY'),
        "opens": "center",
        "linkedCalendars": false,
        "autoApply": true
      }
    );
    s.$calendar.data('daterangepicker').show();
  }

  function initState() {
    // Initial Setup for widget state
    s.setDatesRange(
      moment().hour(0).minute(0).second(0).millisecond(0),
      moment().hour(23).minute(59).second(59).millisecond(999)
    )
  }

  function bindUIActions() {
    s.$calendar.on('apply.daterangepicker', function(e, picker) {
      updateDates(picker.startDate, picker.endDate);
    })
  }

  function updateDates(from, to) {
    $.extend(s.state, { date_from: from.valueOf(), date_to: to.valueOf() });
    s.updateData();
  }

  function renderStats(stats) {
    $(c.STATS.CONTAINER).html('');
    // jQuery.Sparkline options
    var sparkline = {
          type: "bar",
          height: 31,
          barColor: "#45BDDC",
          barWidth: 3,
          barSpacing: 1,
          chartRangeMin: 0
        },
        template = _.template(o.stats.template);

    _.mapObject(o.stats.meta, function(meta, key) {
      var item = {
            title: meta.title,
            value: App.utils.formatNumber(stats[key].value, 0, meta.type == 'money' ? '$' : '')
          },
          $el = $(template(item)).appendTo(c.STATS.CONTAINER);

      $el.find(c.STATS.SPARKS).sparkline(stats[key].chart, sparkline);
    })
  }

  function renderEvents(events) {
    $(c.EVENTS.CONTAINER).html('');
    $(c.EVENTS.COUNTER).text(events.length > 0 ? events.length : '');

    var template = _.template(o.events.template);

    events = _.sortBy(events, 'date');
    _.map(events, function(data) {
      var event = {
            title: data.title,
            text: data.text,
            date: ''
          },
          date = moment(App.utils.getLocalTimeFromUTCTime(data.date));
      // If Today
      if (date.isBetween(moment().hours(0).minutes(0).seconds(0).milliseconds(0), moment().hours(23).minutes(59).seconds(59).milliseconds(999))) {
        event.date += 'Today <b>' + date.format('HH:mm') + '</b>';
      } else {
        event.date += date.format('DD MMM') + ' <b>' + date.format('HH:mm') + '</b>';
      }
      // If Past
      if (date.isBefore(moment())) {
        event.date += ' - ' + date.fromNow();
      }
      // If Now
      if (date.isSame(moment())) {
        event.date += ' - right now';
      }
      // If Future
      if (date.isAfter(moment())) {
        event.date += ' - ' + moment().to(date, true) + ' left';
      }

      $(template(event)).appendTo(c.EVENTS.CONTAINER);
    })

    if (!events.length) $('<p class="text-center">No events yet.</p>').appendTo(c.EVENTS.CONTAINER);
  }

  function renderFeed(feed) {
    $(c.FEED).html('');

    var template = _.template(o.feed.template);

    feed = _.sortBy(feed, 'date').reverse();
    _.map(feed, function(data) {
      var item = {
            icon: o.feed.icons[data.type],
            text: data.text,
            date: '',
            passed: ''
          },
          date = moment(App.utils.getLocalTimeFromUTCTime(data.date));
      // Set Date
      if (date.isBetween(moment().hours(0).minutes(0).seconds(0).milliseconds(0), moment().hours(23).minutes(59).seconds(59).milliseconds(999))) {
        item.date += 'Today ' + date.format('HH:mm');
      } else {
        item.date += date.format('DD MMM') + ' ' + date.format('HH:mm');
      }
      // Set Passed time
      item.passed += date.fromNow();

      $(template(item)).appendTo(c.FEED);
    })

    if (!feed.length) $('<p class="text-center">Feed is empty.</p>').appendTo(c.FEED);
  }

  function renderData(data) {
    renderStats(data.stats);
    renderEvents(data.events);
    renderFeed(data.feed);
  }

  s.updateData = function() {
    var date_from = s.state.date_from,
        date_to = s.state.date_to,
        data = {},
        cache = s.cache[date_from.toString() + date_to.toString()];
    if (cache) {
      data = cache;
    } else {
      data = App.service.api.getActivityData(
        App.utils.getUTCTimeFromLocalTime(date_from),
        App.utils.getUTCTimeFromLocalTime(date_to)
      );

      s.cache[date_from.toString() + date_to.toString()] = data;
    }

    renderData(data);
  }

  s.setDatesRange = function(from, to) {
    var picker = s.$calendar.data('daterangepicker');
    picker.setStartDate(from);
    picker.setEndDate(to);
    picker.renderCalendar('left');
    updateDates(from, to);
  }

  function init() {
    if (validate()) {
      initPlugins();
      bindUIActions();
      initState();
    }
  };

  init();

  return s;
};