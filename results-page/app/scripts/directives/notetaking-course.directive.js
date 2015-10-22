angular.module("ResultsPageApp")

.directive("notetakingCourse", function($timeout) {
  return {
    restrict: "C",
    scope: {
      courseInfo: "="
    },
    link: function($scope, $element, $attrs) {

      $scope.showingSummary = true;

      $element.on("click", function toggleIsSummary(event) {
        event.preventDefault();
        $timeout(function() {
          $scope.showingSummary = !$scope.showingSummary;
        });
      });

    },
    templateUrl: "views/notetaking-course.html"
  };
});
