angular.module("ResultsPageApp")

.service("managerService", function($timeout) {

  var events = {};

  this.on = function on(e, fn) {
    if (!events.hasOwnProperty(e)) {
      events[e] = [];
    }
    events[e].push(fn);
  }

  this.off = function off(e, fn) {
    if (!events.hasOwnProperty(e)) {
      return;
    }
    var spliceLoc = events[e].indexOf(fn);
    if (spliceLoc !== -1) {
      events[e].splice(spliceLoc, 1);
    }
  }

  this.trigger = function trigger(e, newValue) {
    if (!events.hasOwnProperty(e)) {
      return;
    }
    $timeout(function(internalVal) {
      for (var i = 0; i < events[e].length; i++) {
        events[e][i].call(this, internalVal);
      }
    }.bind(this, newValue));
  }

});
