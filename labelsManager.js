var labelsManager = angular.module('labelsManager', []);

labelsManager.controller('LabelCtrl', function LabelCtrl($scope, $http){

    $scope.configs = {
        "api_url":"",
        "private_token":"",
    }

    $scope.projects = {
        options: [],
        selected: {}
    };

    $scope.projectsToExport = {
        options: [],
        selected: {}
    };

    $scope.labels = [];

    $http.get('Router.php/config').then(function(response) {
        $scope.configs.api_url = response.data.api_url;
        $scope.configs.private_token = response.data.private_token;
    });

    $scope.searchProjects = function(configs){
        $http.get('Router.php/projects').then(function(response) {
            $scope.projects.options = response.data;
            $scope.projectsToExport.options = response.data;
        });
    }

    $scope.searchLabels = function(configs){
        $http.get('Router.php/project/'+$scope.projects.selected.id+'/labels').then(function(response) {
            $scope.labels = response.data;
            for(var i=0; i < $scope.labels.length; i++) {
                $scope.labels[i].checked = true;
            }
        });
    }

    $scope.export = function(configs){
        var data = $.param({
            'labels':$scope.labels
        });

        var config = {
            headers : {
                'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
            }
        }

        $http.post('Router.php/project/'+$scope.projectsToExport.selected.id+'/labels', data, config).then(function(response) {
            if(response.data.message) {
                alert(response.data.message);
            }else{
                alert(response.data);
            }
        });
    }

});