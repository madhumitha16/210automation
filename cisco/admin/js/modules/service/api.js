App.service.api = function() {

  return {

    getUsersByDates: function(from, to) {
      var result = [];
      for(var i = 0; i < 200; i++) {
        result.push({
          date: faker.random.number({ min: from, max: to }),
          name: faker.name.findName(),
          username: faker.internet.userName(),
          status: faker.random.boolean()
        })
      }
      return result;
    },

    getSales: function(from, to) {
      var result = [];
      for(var i = 0; i < 200; i++) {
        result.push({
          date: faker.random.number({ min: from, max: to }),
          product: faker.commerce.productName(),
          price: +faker.commerce.price(10, 200, 0),
          status: faker.random.boolean()
        })
      }
      return result;
    },

    getActivityData: function(from, to) {
      var day = 1000 * 60 * 60 * 24,
          days = Math.ceil((to - from) / day);

      function fakeNumsArray(length, min, max) {
        var array = [];
        for(var i = 0; i < length; i++) {
          array.push(faker.random.number({ min: min, max: max }))
        }
        return array;
      }

      function fakeEventsArray() {
        var array = [];
        for(var i = 0; i < days; i++) {
          array.push({
            date: faker.random.number({ min: from + (i * day), max: (from + ((i + 1) * day)) - 1 }),
            title: 'Team Meeting',
            text: faker.lorem.words(10)
          });
          array.push({
            date: faker.random.number({ min: from + (i * day), max: (from + ((i + 1) * day)) - 1 }),
            title: 'Business Lunch',
            text: faker.lorem.words(10)
          });
          array.push({
            date: faker.random.number({ min: from + (i * day), max: (from + ((i + 1) * day)) - 1 }),
            title: 'Workout',
            text: faker.lorem.words(10)
          });
        }
        return array;
      }

      function fakeFeedArray() {
        to = Math.min(to, App.utils.getUTCTimeFromLocalTime(moment().valueOf()));
        var array = [],
            passed_days = Math.ceil((to - from) / day);

        for(var i = 0; i < (passed_days * 5); i++) {
          array.push({
            date: faker.random.number({ min: from, max: to }),
            type: faker.random.arrayElement(['system', 'user', 'mail', 'transaction']),
            text: faker.lorem.words(7)
          });
        }
        return array;
      }

      return {
        stats: {
          revenue: {
            value: days * faker.random.number({ min: 800, max: 1200 }),
            chart: fakeNumsArray(20, 800, 1200)
          },
          items: {
            value: days * faker.random.number({ min: 50, max: 200 }),
            chart: fakeNumsArray(20, 50, 200)
          },
          users: {
            value: days * faker.random.number({ min: 10, max: 50 }),
            chart: fakeNumsArray(20, 10, 50)
          },
          mails: {
            value: days * faker.random.number({ min: 500, max: 1500 }),
            chart: fakeNumsArray(20, 500, 1500)
          },
          comments: {
            value: days * faker.random.number({ min: 200, max: 800 }),
            chart: fakeNumsArray(20, 200, 800)
          }
        },
        events: fakeEventsArray(),
        feed: fakeFeedArray()
      }
    }

  };
}()