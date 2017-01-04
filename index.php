<html ng-app="labelsManager">
<head>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="labelsManager.css">
    <script type="application/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
    <script type="application/javascript" src="node_modules/angular/angular.js"></script>
    <script type="application/javascript" src="labelsManager.js"></script>
</head>
<body>
    <div class="container" ng-controller="LabelCtrl">
        <div class="row">
            <div class="col-md-12">
                <form name="formSearchProjects" method="post">
                    <div class="form-group">
                        <label for="apiUrl">API URL</label>
                        <input type="url" class="form-control" id="apiUrl" ng-model="configs.api_url" required>
                    </div>
                    <div class="form-group">
                        <label for="privateToken">Private token</label>
                        <input type="password" class="form-control" id="privateToken" ng-model="configs.private_token" required>
                    </div>
                    <input type="submit" id="searchProjectsBtn" class="btn btn-default pull-right" ng-click="searchProjects(configs)" value="Search projetcs">
                </form>
            </div>
        </div>

        <hr>

        <div class="row">
            <div id="projects" class="col-md-12">
                <form name="formSearchLabels" method="post">
                    <div class="form-group">
                        <label for="projects">Projects</label>
                        <select name="projects" id="projects" class="form-control" ng-model="projects.selected" required
                                ng-options="option.name for option in projects.options track by option.id">
                        </select>
                    </div>
                    <button type="submit" id="searchLabelsBtn" class="btn btn-default pull-right" ng-click="searchLabels(configs)">Search labels</button>
                </form>
            </div>
        </div>

        <hr>

        <div class="row">
            <div id="labels" class="col-md-12">
                <form name="formLabels" method="post">
                    <div class="form-group">
                        <label for="all" style="width: 100%;">
                        <input type="checkbox" value="all" id="all" checked/> All
                        </label>
                        <label ng-repeat="label in labels" style="width: 100%;">
                            <input type="checkbox" value="{{label.id}}" ng-model="label.checked"/> {{label.name}}
                        </label>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="exportTo">Export to</label>
                        <select name="exportTo" id="exportTo" class="form-control" ng-model="projectsToExport.selected" required
                                ng-options="option.name for option in projectsToExport.options track by option.id">
                        </select>
                    </div>
                    <button type="submit" id="exportBtn" class="btn btn-default pull-right" ng-click="export(configs)">Export</button>
                </form>
            </div>
        </div>

    </div>
</body>
</html>