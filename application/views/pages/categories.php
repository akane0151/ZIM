<div class="main-content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <h3 style="text-align: center;">Categories</h3>
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
                                <th>Name</th>
                                <th>Descriptions</th>
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
                                    <h5 class="modal-title" id="mediumModalLabel">New category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="add-form" method="post" role="form">
                                        <div class="form-group">
                                            <label for="name" class="control-label mb-1">Name</label>
                                            <input id="name" name="name" minlength="3" maxlength="50" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="items" class="control-label mb-1">Prent category</label>
                                            <select data-placeholder="Choose an category..." class="chosen-select">
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="description" class="control-label mb-1">Description</label>
                                            <input id="description" name="description" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
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
                                        <label for="name" class="control-label mb-1">Name</label>
                                        <input id="name" name="name" minlength="3" maxlength="50" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="items" class="control-label mb-1">Prent category</label>
                                        <select data-placeholder="Choose a category..." class="chosen-select">
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="description" class="control-label mb-1">Description</label>
                                        <input id="description" name="description" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
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
                url : "<?php echo site_url("category/get_categories") ?>",
                type: "POST",
                "contentType": 'application/json; charset=utf-8',
                'data': function (data) { return data = JSON.stringify(data); }
            }
        });
        function loadItems(){
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('category/get_categories')?>",
                dataType: "JSON",
                success: function(data) {
                    if (data != "false") {
                        $(".chosen-select").empty();
                        $('.chosen-select').append('<option value="0">---</option>');

                        var i;
                        for(i=0; i<data['data'].length ; i++){
                            $('#addModal .chosen-select').append('<option value="' + data['data'][i][0] + '">' + data['data'][i][1] + '</option>');
                        }
                        $(".chosen-select").trigger("chosen:updated");

                    }
                }, error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert("Status: " + textStatus);
                    alert("Error: " + errorThrown);
                }
            });
        }

        loadItems();

        $(".modal-content").on("click","#add-btn", function(event) {
            event.preventDefault();
            var name = $("#name").val();
            var de = $("#description").val();
            var parid = $("#addModal .chosen-select").val();
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('category/add')?>",
                dataType: "JSON",
                data: {
                    name: name,
                    descriptions: de,
                    parent_id: parid
                },
                success: function(data) {
                    $(".loading").css('visibility', 'hidden');
                    if (data != "false")
                    {
                        $("#name").val("");
                        $("#description").val("");
                        $("#addModal").modal('hide');
                        myTable.ajax.reload();
                        loadItems();
                    }
                }, error: function (XMLHttpRequest, textStatus, errorThrown) {
                    $(".loading").css('visibility', 'hidden');
                    alert("Status: " + textStatus);
                    alert("Error: " + errorThrown);
                }
            });
            return false;
            });

        $(".modal-content").on("click","#update-btn", function(event) {
            event.preventDefault();
            var name = $("#editModal #name").val();
            var de = $("#editModal #description").val();
            var parid = $("#editModal .chosen-select").val();
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('category/update')?>",
                dataType: "JSON",
                data: {
                    id: pid,
                    name: name,
                    descriptions: de,
                    parent_id: parid
                },
                success: function(data) {
                    $(".loading").css('visibility', 'hidden');
                    if (data == "true") {
                        $("#editModal #name").val("");
                        $("#editModal #description").val("");
                        $("#editModal").modal('hide');
                        myTable.ajax.reload();
                        loadItems();
                        pid=0;
                    }

                }, error: function (XMLHttpRequest, textStatus, errorThrown) {
                    $(".loading").css('visibility', 'hidden');
                    alert("Status: " + textStatus);
                    alert("Error: " + errorThrown);
                }
            });
            return false;
        });

        $(".table").on("click",'.editItem', function() {
            pid = $(this).data('cat_id');
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('category/get_category')?>",
                dataType : "JSON",
                data : {id:pid},
                success: function(data){
                    if(data!="false"){
                        $("#editModal #name").val(data.name);

                        $("#editModal #description").val(data.descriptions);
                        $("#editModal .chosen-select option[value="+data.parent_id+"]").attr("selected", true);
                        $("#editModal .chosen-select").trigger("chosen:updated");
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
            var id = $(this).data('cat_id');
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('category/remove')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    alert("Item ID:" + id + "removed!");
                    myTable.row($(this).parents("tr")).remove().draw();
                    myTable.ajax.reload();
                    loadItems();
                }
            });
            return false;
        });

    });
</script>