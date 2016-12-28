<html>
<head>
    <link rel="stylesheet" href="css/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/css/bootstrap-theme.min.css">
    <script type="application/javascript" src="js/jquery-3.1.1.min.js"></script>
    <script type="application/javascript" src="js/index.js"></script>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form name="formSearchProjects" method="post">
                    <div class="form-group">
                        <label for="privateToken">Private token</label>
                        <input type="password" class="form-control" id="privateToken">
                    </div>
                    <button type="submit" id="searchProjectsBtn" class="btn btn-default pull-right">Search projetcs</button>
                </form>
            </div>
        </div>

        <hr>

        <div class="row">
            <div id="projects" class="col-md-12">
                <form name="formSearchLabels" method="post">
                    <div class="form-group">
                        <label for="projects">Projects</label>
                        <select name="projects" id="projects" class="form-control">

                        </select>
                    </div>
                    <button type="submit" id="searchLabelsBtn" class="btn btn-default pull-right">Search labels</button>
                </form>
            </div>
        </div>

        <hr>

        <div class="row">
            <div id="labels" class="col-md-12">
                <form name="formLabels" method="post">
                    <div class="form-group">
                        <label>
                        <input type="checkbox" value="all"/> All
                        </label>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="exportTo">Export to</label>
                        <select name="exportTo" id="exportTo" class="form-control">

                        </select>
                    </div>
                    <button type="submit" id="exportBtn" class="btn btn-default pull-right">Export</button>
                </form>
            </div>
        </div>

    </div>
</body>
</html>