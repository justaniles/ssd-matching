angular.module("ResultsPageApp")

.directive("notetakingCourse", function() {
  return {
    restrict: "C",
    scope: true,
    link: function($scope, $element, $attrs) {

    },
    templateUrl: "views/notetaking-course.html"
  };
});
