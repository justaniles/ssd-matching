'use strict';

/**
 * @ngdoc function
 * @name resultsPageApp.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the resultsPageApp
 */
angular.module('ResultsPageApp')
  .controller('MainCtrl', function ($scope) {

    var firstNames = ["John", "Jim", "Joe", "Ruth",
      "Timothy", "Daniel", "Andrew", "Sally"];
    var lastNames = ["Smith", "Skinkle", "Wright", "Fernandez",
      "Madder", "Minten", "Mortin", "McCreary"];
    var courses = [
      generateCourse("MATH", 1096, 43956),
      generateCourse("CS", 3425, 65737),
      generateCourse("GEO", 1123, 80934),
      generateCourse("MUS", 3434, 63463),
      generateCourse("SBIO", 3256, 84683)
    ];

    $scope.courses = courses;
    $scope.requesters = generateRequesters(10);
    $scope.notetakers = generateNotetakers(5);

    function generateRequesters(count) {
      var requesters = [];
      for (var i = 0; i < count; i++) {
        var genFirstName = randomElement(firstNames),
            genLastName = randomElement(lastNames);
        // choose random course to add to
        randomElement($scope.courses).requesters.push({
          name: genFirstName + " " + genLastName,
          email: genFirstName.toLowerCase() + genLastName.toLowerCase() + "@vt.edu"
        });
        // requesters.push({
        //   name: genFirstName + " " + genLastName,
        //   email: genFirstName.toLowerCase() + genLastName.toLowerCase() + "@vt.edu",
        //   courses: randomElement(courses, 1)
        // });
      }
      return requesters;
    }
    function generateNotetakers(count) {
      var notetaker = [];
      for (var i = 0; i < count; i++) {
        var genFirstName = randomElement(firstNames),
            genLastName = randomElement(lastNames);
        // choose random course to add to
        randomElement($scope.courses).notetakers.push({
          name: genFirstName + " " + genLastName,
          email: genFirstName.toLowerCase() + genLastName.toLowerCase() + "@vt.edu"
        });
        // requesters.push({
        //   name: genFirstName + " " + genLastName,
        //   email: genFirstName.toLowerCase() + genLastName.toLowerCase() + "@vt.edu",
        //   courses: randomElement(courses, 1)
        // });
      }
      return notetaker;
    }
    function generateCourse(subject, courseNumber, crn) {
      return {
        subject: subject,
        courseNumber: courseNumber,
        crn: crn,
        instructor: {
          name: "Joe",
          email: "Shmoe"
        },
        requesters: [],
        notetakers: []
      };
    }
    function randomElement(array, count) {
      if (typeof count === "undefined" || count === 0) {
        return array[Math.floor(Math.random() * array.length)];
      }
      var elems = [];
      for (var j = 0; j < count; j++) {
        elems.push(array[Math.floor(Math.random() * array.length)]);
      }
      return elems;
    }
  });
