'use strict';

/**
 * @ngdoc overview
 * @name resultsPageApp
 * @description
 * # resultsPageApp
 *
 * Main module of the application.
 */
angular.module('ResultsPageApp', ['ngRoute'])
  .config(function ($routeProvider) {
    $routeProvider
      .when('/', {
        templateUrl: 'views/main.html',
        controller: 'MainCtrl',
        controllerAs: 'main'
      })
      .otherwise({
        redirectTo: '/'
      });
  });
