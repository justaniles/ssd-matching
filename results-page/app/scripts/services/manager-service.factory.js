angular.module("ResultsPageApp")

.factory("managerService", function($timeout) {

  var events = {};

  function on(e, fn) {
    if (!events.hasOwnProperty(e)) {
      events[e] = [];
    }
    events[e].push(fn);
  }

  function off(e, fn) {
    if (!events.hasOwnProperty(e)) {
      return;
    }
    var spliceLoc = events[e].indexOf(fn);
    if (spliceLoc !== -1) {
      events[e].splice(spliceLoc, 1);
    }
  }

  function trigger(e, newValue) {
    if (!events.hasOwnProperty(e)) {
      return;
    }
    for (var i = 0; i < events[e].length; i++) {
      events[e][i].call(this, newValue);
    }
  }

});
