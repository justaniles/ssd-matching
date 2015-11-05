angular.module("ResultsPageApp")

.directive("notetakingCourse", function($timeout, managerService) {
  return {
    restrict: "C",
    scope: {
      courseInfo: "="
    },
    link: function($scope, $element, $attrs) {

      $scope.showingSummary = true;

      $scope.assignmentToggle = function assignmentToggle(requester) {
        console.log(JSON.stringify(requester));
      }

      $scope.toggleIsSummary = function toggleIsSummary(event) {
        $timeout(function() {
          $scope.showingSummary = !$scope.showingSummary;
        });
      };

      /**
       * [closeAll listener]
       *
       * Listen for closeAll event (probably triggered by user clicking
       * background) so that this course will close and show summary.
       *
       * @param  {Boolean} closeValue - Should this be showing summary?
       */
      managerService.on("closeAll", function(closeValue) {
        if (closeValue !== true) {
          return;
        }
        $scope.showingSummary = true;
      });

    },
    templateUrl: "views/notetaking-course.html"
  };
});
