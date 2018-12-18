<div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE-->
                    <!--div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <!div class="rs-select2--light rs-select2--md">
                                <select class="js-select2" name="property">
                                    <option selected="selected">All Properties</option>
                                    <option value="">Option 1</option>
                                    <option value="">Option 2</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                            <div class="rs-select2--light rs-select2--sm">
                                <select class="js-select2" name="time">
                                    <option selected="selected">Today</option>
                                    <option value="">3 Days</option>
                                    <option value="">1 Week</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                            <button class="au-btn-filter">
                                <i class="zmdi zmdi-filter-list"></i>filters</button>
                        </div-->
                        <div class="table-data__tool-right">
                            <button id="addbutton" class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#addModal">
                                <i class="zmdi zmdi-plus"></i>add</button>
                            <!--div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                <select class="js-select2" name="type">
                                    <option selected="selected">Export</option>
                                    <option value="">Option 1</option>
                                    <option value="">Option 2</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div-->
                        </div>
                    </div>
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Full name</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <!-- modal medium -->
                    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="mediumModalLabel">New user</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="add-form" method="post" role="form">
                                        <div class="form-group">
                                            <label for="name" class="control-label mb-1">Full name</label>
                                            <input id="name" name="name" minlength="3" maxlength="50" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="username" class="control-label mb-1">Username</label>
                                            <input id="username" name="username" minlength="3" maxlength="64" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="control-label mb-1">Password</label>
                                            <input id="password" name="password" type="password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="access" class="control-label mb-1">Access level</label>
                                            <select id="access" class="form-control">
                                                <option value="3">Operator</option>
                                                <option value="2">Manager</option>
                                                <option value="1">Admin</option>
                                            </select>
                                        </div>
                                    </form>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button id="add-btn" class="btn btn-primary">Confirm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end modal medium -->
                <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">New category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="name" class="control-label mb-1">Full name</label>
                                    <input id="name" name="name" minlength="3" maxlength="50" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                                </div>
                                <div class="form-group">
                                    <label for="username" class="control-label mb-1">Username</label>
                                    <input id="username" name="username" minlength="3" maxlength="50" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                                </div>
                                <div class="form-group">
                                    <label for="password" class="control-label mb-1">Password</label>
                                    <input id="password" name="password" type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="access" class="control-label mb-1">Access level</label>
                                    <select id="access" class="form-control">
                                        <option value="3">Operator</option>
                                        <option value="2">Manager</option>
                                        <option value="1">Admin</option>
                                    </select>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button id="update-btn" class="btn btn-primary">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- end modal medium -->
                    <!-- END DATA TABLE-->
                </div>
            </div>

        </div>

<script type="text/javascript">
    $(document).ready(function () {
        $(".chosen-select").chosen({width: "100%",search_contains:true,});
        var pid;
        var myTable = $('.table').DataTable({
            "paging": true,
            "order": [[ 0, "desc" ]],
            dom: 'Bfrtip',
            buttons: [
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],
            "ajax": {
                url : "<?php echo site_url("user/get_users") ?>",
                type: "POST",
                "contentType": 'application/json; charset=utf-8',
                'data': function (data) { return data = JSON.stringify(data); }
            }
        });

        $(".modal-content").on("click","#add-btn", function(event) {
            event.preventDefault();
            var name = $("#addModal #name").val();
            var un = $("#addModal #username").val();
            var pw = $("#addModal #password").val();
            var ac = $("#addModal #access").val();
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('user/add')?>",
                dataType: "JSON",
                data: {
                    fullname: name,
                    username: un,
                    password: pw,
                    access: ac
                },
                success: function(data) {
                    $(".loading").css('visibility', 'hidden');
                    if (data != "false")
                    {
                        $("#name").val("");
                        $("#description").val("");
                        $("#addModal").modal('hide');
                        myTable.ajax.reload();
                    }
                }, error: function (XMLHttpRequest, textStatus, errorThrown) {
                    $(".loading").css('visibility', 'hidden');
                    alert("Error: " + errorThrown);
                }
            });
            return false;
            });

        $(".modal-content").on("click","#update-btn", function(event) {
            event.preventDefault();
            var name = $("#editModal #name").val();
            var un = $("#editModal #username").val();
            var pw = $("#editModal #password").val();
            var ac = $("#editModal #access").val();
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('user/update')?>",
                dataType: "JSON",
                data: {
                    id: pid,
                    fullname: name,
                    username: un,
                    password: pw,
                    access: ac
                },
                success: function(data) {
                    $(".loading").css('visibility', 'hidden');
                    if (data == "true") {
                        $("#editModal #name").val("");
                        $("#editModal #username").val("");
                        $("#editModal #password").val("");
                        $("#editModal").modal('hide');
                        myTable.ajax.reload();
                        pid=0;
                    }

                }, error: function (XMLHttpRequest, textStatus, errorThrown) {
                    $(".loading").css('visibility', 'hidden');
                    alert("Error: " + errorThrown);
                }
            });
            return false;
        });

        $(".table").on("click",'.editItem', function() {
            pid = $(this).data('uid');
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('user/get_user')?>",
                dataType : "JSON",
                data : {id:pid},
                success: function(data){
                    if(data!="false"){
                        $("#editModal #username").val(data.username);
                        $("#editModal #name").val(data.fullname);
                        $("#editModal #password").val(data.password);
                        $("#editModal #access option[value="+data.access+"]").attr("selected", true);
                        $("#editModal").modal('show');
                    }
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    $(".loading").css('visibility','hidden');
                    alert("Status: " + textStatus); alert("Error: " + errorThrown);
                }
            });
            return false;
        });

        $(".table").on("click",'.removeItem', function() {
            var id = $(this).data('uid');
            if(confirm('Do yoy want to remove userid: '+ id + " ?")){
                $.ajax({
                    type : "POST",
                    url  : "<?php echo site_url('user/remove')?>",
                    dataType : "JSON",
                    data : {id:id},
                    success: function(data){
                        myTable.row($(this).parents("tr")).remove().draw();
                        myTable.ajax.reload();
                    }
                });
            } else {

            }

            return false;
        });

    });
</script>