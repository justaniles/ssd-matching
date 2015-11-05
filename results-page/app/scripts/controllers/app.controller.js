angular.module("ResultsPageApp")

.controller("AppController", function($scope, managerService) {

  $scope.closeAllCourses = function() {
    managerService.trigger("closeAll", true);
  };

});
