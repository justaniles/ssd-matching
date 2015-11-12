angular.module("ResultsPageApp")

.directive("notetakingCourse", function($timeout, $http, managerService) {
  return {
    restrict: "C",
    scope: {
      courseInfo: "="
    },
    link: function($scope, $element, $attrs) {

      $scope.showingSummary = true;

      $scope.assignmentToggle = function assignmentToggle(student, isNotetaker) {
        console.log(JSON.stringify(student));
        var data = {
          firstname: student.firstName,
          lastname: student.lastName,
          email: student.email,
          department: $scope.courseInfo.department,
          coursenumber: $scope.courseInfo.courseNumber,
          crn: $scope.courseInfo.crn,
          instructor: $scope.courseInfo.instructor,
          instructoremail: $scope.courseInfo.instructorEmail,
          isnotetaker: isNotetaker,
          isassigned: student.isAssigned
        };
        $http({
          method: "GET",
          url: "http://localhost/assign.php",
          params: data
        }).then(
          function success(response) {

          },
          function failure(response) {

          }
        );
      };

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
