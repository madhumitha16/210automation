App.service.dataMapper = function() {
  var s = {};

  s.getStartOfPeriod = function(timeLocal, period) {
    var date = new Date(timeLocal),
        start = 0;

    switch (period) {
      case 'hour':
        start = date.setMinutes(0, 0, 0);
        break;
      case 'day':
        start = date.setHours(0, 0, 0, 0);
        break;
      case 'week':
        var day = date.getDay(),
            diff = App.settings.firstWeekDay - day;
        if (diff > 0) {
          diff -= 7;
        }
        var firstDay = date.setDate(date.getDate() + diff);
        start = new Date(firstDay).setHours(0, 0, 0, 0);
        break;
      case 'month':
        var firstDay = date.setDate(1);
        start = new Date(firstDay).setHours(0, 0, 0, 0);
        break;
    }

    return start;
  }

  s.getEndOfPeriod = function(timeLocal, period) {
    var date = new Date(timeLocal),
        end = 0;

    switch (period) {
      case 'hour':
        end = date.setMinutes(59, 59, 999);
        break;
      case 'day':
        end = date.setHours(23, 59, 59, 999);
        break;
      case 'week':
        var day = date.getDay(),
            diff = App.settings.firstWeekDay - day;
        if (diff > 0) {
          diff -= 7;
        }
        var lastDay = date.setDate(date.getDate() + diff + 6);
        end = new Date(lastDay).setHours(23, 59, 59, 999);
        break;
      case 'month':
        var lastDay = date.setMonth(date.getMonth() + 1, 0);
        end = new Date(lastDay).setHours(23, 59, 59, 999);
        break;
    }

    return end;
  }

  s.getStartOfNextPeriod = function(timeLocal, period) {
    var date = new Date(timeLocal),
        next = 0;

    switch (period) {
      case 'hour':
        next = date.setMinutes(60, 0, 0);
        break;
      case 'day':
        next = date.setHours(24, 0, 0, 0);
        break;
      case 'week':
        var day = date.getDay(),
            diff = App.settings.firstWeekDay - day;
        if (diff > 0) {
          diff -= 7;
        }
        var nextFirstDay = date.setDate(date.getDate() + diff + 7);
        next = new Date(nextFirstDay).setHours(0, 0, 0, 0);
        break;
      case 'month':
        var nextFirstDay = date.setMonth(date.getMonth() + 1, 1);
        next = new Date(nextFirstDay).setHours(0, 0, 0, 0);
        break;
    }

    return next;
  }

  ;(function test() {
    var time = new Date(2017, 2, 27, 0),
        localTime = time.getTime();

    console.log('Period: "Hour", Time: "' + time + '"');
    console.log('   Start: ', new Date( s.getStartOfPeriod( localTime, 'hour' ) ) );
    console.log('   End: ', new Date( s.getEndOfPeriod( localTime, 'hour' ) ) );
    console.log('   Next: ', new Date( s.getStartOfNextPeriod( localTime, 'hour' ) ) );

    console.log('Period: "Day", Time: "' + time + '"');
    console.log('   Start: ', new Date( s.getStartOfPeriod( localTime, 'day' ) ) );
    console.log('   End: ', new Date( s.getEndOfPeriod( localTime, 'day' ) ) );
    console.log('   Next: ', new Date( s.getStartOfNextPeriod( localTime, 'day' ) ) );

    console.log('Period: "Week", Time: "' + time + '"');
    console.log('   Start: ', new Date( s.getStartOfPeriod( localTime, 'week' ) ) );
    console.log('   End: ', new Date( s.getEndOfPeriod( localTime, 'week' ) ) );
    console.log('   Next: ', new Date( s.getStartOfNextPeriod( localTime, 'week' ) ) );

    console.log('Period: "Month", Time: "' + time + '"');
    console.log('   Start: ', new Date( s.getStartOfPeriod( localTime, 'month' ) ) );
    console.log('   End: ', new Date( s.getEndOfPeriod( localTime, 'month' ) ) );
    console.log('   Next: ', new Date( s.getStartOfNextPeriod( localTime, 'month' ) ) );
  })

  s.createMap = function(startLocal, endLocal, period) {
    var index = {},
        start = s.getStartOfPeriod(startLocal, period),
        end = s.getEndOfPeriod(endLocal, period),
        current = start;

    while (current < end) {
      index[current] = {
        date: current
      }
      current = s.getStartOfNextPeriod(current, period);
    }

    return index;
  }

  return s;
}()