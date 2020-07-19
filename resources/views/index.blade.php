<!doctype html>
<html lang="en" ng-app="taskRecords">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1,
            shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
            crossorigin="anonymous">

        <title>Task Management</title>
    </head>
    <body>
        <div class="container" ng-controller="tasksController">
            <header>
                <h2>Tasks Information</h2>
            </header>
            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th><button id="btn-add" class="btn btn-primary
                                    btn-xs"
                                    ng-click="toggle('add', 0)">Add New task</button></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="task in tasks">
                          <td>@{{task.id}}</td>
                          <td>@{{task.name}}</td>
                          <td>@{{task.title}}</td>
                          <td>@{{task.content}}</td>
                          <td>
                            <button class="btn btn-default btn-xs
                                btn-detail"
                                ng-click="view(task.id)">Show</button>
                              <button class="btn btn-default btn-xs
                                  btn-detail"
                                  ng-click="toggle('edit', task.id)">Edit</button>
                              <button class="btn btn-danger btn-xs btn-delete"
                                  ng-click="confirmDelete(task.id)">Delete</button>
                          </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1"
                role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">@{{form_title}}</h5>
                            <button type="button" class="close"
                                data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form name="frmcustomers" class="form-horizontal"
                                novalidate="">

                                <div class="form-group error">
                                    <label for="inputEmail3" class="col-sm-12
                                        control-label">Name</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control
                                            has-error" id="name" name="name"
                                            placeholder="Name"
                                            value="[[name]]"
                                            ng-model="task.name"
                                            ng-required="true">
                                        <span class="help-inline"
                                            ng-show="frmcustomers.name.$invalid
                                            &amp;&amp; frmcustomers.name.$touched">Name
                                            field is required</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-12
                                        control-label">Title</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control"
                                            id="title" name="title"
                                            placeholder="Title"
                                            value="[[title]]"
                                            ng-model="task.title"
                                            ng-required="true">
                                        <span class="help-inline"
                                            ng-show="frmcustomers.title.$invalid
                                            &amp;&amp; frmcustomers.title.$touched">Valid
                                            Title field is required</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-12
                                        control-label">Content</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control"
                                            id="content"
                                            name="content"
                                            placeholder="Content"
                                            value="[[content]]"
                                            ng-model="task.content"
                                            ng-required="true">
                                        <span class="help-inline"
                                            ng-show="frmcustomers.content.$invalid
                                            &amp;&amp;
                                            frmcustomers.content.$touched">Content
                                             field is required</span>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary"
                                id="btn-save" ng-click="save(modalstate, id)"
                                ng-disabled="frmcustomers.$invalid">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="viewModal" tabindex="-1"
                role="dialog" aria-labelledby="viewModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="viewModalLabel">@{{view_title}}</h5>
                            <button type="button" class="close"
                                data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form name="" class="form-horizontal"
                                novalidate="">

                                <div class="form-group error">
                                    <label for="inputEmail3" class="col-sm-12
                                        control-label">Name</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control
                                            has-error" id="name" name="name"
                                            placeholder="Name"
                                            value="[[name]]"
                                            ng-model="task.name"
                                            ng-required="true">
                                        <span class="help-inline"
                                            ng-show="frmcustomers.name.$invalid
                                            &amp;&amp; frmcustomers.name.$touched">Name
                                            field is required</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-12
                                        control-label">Title</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control"
                                            id="title" name="title"
                                            placeholder="Title"
                                            value="[[title]]"
                                            ng-model="task.title"
                                            ng-required="true">
                                        <span class="help-inline"
                                            ng-show="frmcustomers.title.$invalid
                                            &amp;&amp; frmcustomers.title.$touched">Valid
                                            Title field is required</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-12
                                        control-label">Content</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control"
                                            id="content"
                                            name="content"
                                            placeholder="Content"
                                            value="[[content]]"
                                            ng-model="task.content"
                                            ng-required="true">
                                        <span class="help-inline"
                                            ng-show="frmcustomers.content.$invalid
                                            &amp;&amp;
                                            frmcustomers.content.$touched">Content
                                             field is required</span>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
        <script
            src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>

        <!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->
        <script
            src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular.min.js"></script>
        <script
            src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular-animate.min.js"></script>
        <script
            src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular-route.min.js"></script>
        <!-- AngularJS Application Scripts -->
        <script src="<?= asset('app/app.js') ?>"></script>
        <script src="<?= asset('app/controllers/tasks.js') ?>"></script>
    </body>
</html>
