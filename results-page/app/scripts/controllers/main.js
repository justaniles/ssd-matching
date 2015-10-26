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

    var courses = [{"crn":"12345","department":"CS","courseNumber":"4104","instructor":"Bill Bo","instructorEmail":"help@vt.edu","requesters":[{"firstName":"Dag","lastName":"Yeshiwas","email":"dag@vt.edu"},{"firstName":"Marissa","lastName":"Frederick","email":"fred@vt.edu"}],"notetakers":[{"firstName":"Cody","lastName":"Cahoon","email":"c@vt.edu"},{"firstName":"Heather","lastName":"Wise","email":"wise@vt.edu"}]},{"crn":"12346","department":"CS","courseNumber":"4114","instructor":"Pill Po","instructorEmail":"pill@vt.edu","requesters":[{"firstName":"Justin","lastName":"Niles","email":"n@vt.edu"}],"notetakers":[]},{"crn":"14445","department":"MATH","courseNumber":"1000","instructor":"Cat Po","instructorEmail":"cat@vt.edu","requesters":[],"notetakers":[{"firstName":"John","lastName":"Myhre","email":"j@vt.edu"}]},{"crn":"65432","department":"ECON","courseNumber":"1005","instructor":"Bat Po","instructorEmail":"bat@vt.edu","requesters":[{"firstName":"Michael","lastName":"Marchio","email":"mm@vt.edu"}],"notetakers":[]}];

    $scope.courses = courses;

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
