<div class="main-content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <h3 style="text-align: center;">Projects</h3>
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
                                    <h5 class="modal-title" id="mediumModalLabel">New project</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="add-form" method="post" role="form">
                                        <div class="form-group">
                                            <label for="name" class="control-label mb-1">Project name</label>
                                            <input id="name" name="name" minlength="3" maxlength="50" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                                        </div>

                                        <div class="form-group">
                                            <label for="description" class="control-label mb-1">Description</label>
                                            <input id="description" name="description" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                                        </div>
                                        <div id="items-action" class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="items" class="control-label mb-1">Project items:</label>
                                                    <select data-placeholder="Choose an Item..." class="chosen-select">
                                                        <option value="0"></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="number" class="control-label mb-1" style="width: 100%;float:left;margin-right: 5px;">Number:</label>
                                                    <input id="number" name="number" style="width:100px;float:left;margin-right: 5px;" type="number" class="input-sm form-control-sm form-control" aria-required="true" aria-invalid="false" value="0">
                                            </form>
                                                        <button id="item-add" style="float:left;margin-right: 5px;" class="btn btn-warning btn-sm">Add</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="list-items" class="form-group">
                                            <ul>

                                            </ul>
                                        </div>
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
                                    <h5 class="modal-title" id="mediumModalLabel">Edit project</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="add-form" method="post" role="form">
                                        <div class="form-group">
                                            <label for="name" class="control-label mb-1">Project name</label>
                                            <input id="name" name="name" minlength="3" maxlength="50" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                                        </div>

                                        <div class="form-group">
                                            <label for="description" class="control-label mb-1">Description</label>
                                            <input id="description" name="description" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                                        </div>
                                        <div id="items-action" class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="items" class="control-label mb-1">Project items:</label>
                                                    <select data-placeholder="Choose an Item..." class="chosen-select">
                                                        <option value="0"></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="number" class="control-label mb-1" style="width: 100%;float:left;margin-right: 5px;">Number:</label>
                                                    <input id="number" name="number" style="width:100px;float:left;margin-right: 5px;" type="number" class="input-sm form-control-sm form-control" aria-required="true" aria-invalid="false" value="0">
                                    </form>
                                    <button id="item-add" style="float:left;margin-right: 5px;" class="btn btn-warning btn-sm">Add</button>
                                </div>
                            </div>
                        </div>
                        <div id="list-items" class="form-group">
                            <ul>

                            </ul>
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

</div>
<script type="text/javascript">
    $(document).ready(function () {
        var items = [];
        $(".chosen-select").chosen({width: "90%",search_contains:true,});
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
                url : "<?php echo site_url("project/get_projects") ?>",
                type: "POST",
                "contentType": 'application/json; charset=utf-8',
                'data': function (data) { return data = JSON.stringify(data); }
            }
        });
        function loadItems(){
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('product/get_products')?>",
                dataType: "JSON",
                success: function(data) {
                    if (data != "false") {
                        //var opts = $.parseJSON(data);
                        var i;
                        for(i=0; i<data['data'].length ; i++){
                            $('.chosen-select').append('<option value="' + data['data'][i][0] + '">' + data['data'][i][1] + '</option>');
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
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('project/add')?>",
                dataType: "JSON",
                data: {
                    name: name,
                    descriptions: de,
                    items: items
                },
                success: function(data) {
                    $(".loading").css('visibility', 'hidden');
                    if (data != "false")
                    {
                        $("#name").val("");
                        $("#description").val("");
                        $("#addModal").modal('hide');
                        items=[];
                        generateList(items);
                        myTable.ajax.reload();
                    }
                    else if (typeof data === 'string')
                    {

                    }
                    else
                    {

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

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('project/update')?>",
                dataType: "JSON",
                data: {
                    id: pid,
                    name: name,
                    descriptions: de,
                    items: items
                },
                success: function(data) {
                    $(".loading").css('visibility', 'hidden');
                    if (data == "true") {
                        $("#editModal #name").val("");
                        $("#editModal #description").val("");
                        $("#editModal").modal('hide');
                        items=[];
                        generateList(items);
                        myTable.ajax.reload();
                        pid=0;
                    }
                    else if (typeof data === 'string') {
                    }
                    else {
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
            pid = $(this).data('project_id');
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('project/get_project')?>",
                dataType : "JSON",
                data : {id:pid},
                success: function(data){
                    $("#editModal #name").val(data.name);

                    $("#editModal #description").val(data.descriptions);
                    items = JSON.parse(data.items);
                    generateList(items);
                    $("#editModal").modal('show');
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    $(".loading").css('visibility','hidden');
                    alert("Status: " + textStatus); alert("Error: " + errorThrown);
                }
            });
            return false;
        });

        $(".table").on("click",'.removeItem', function() {
            var id = $(this).data('project_id');
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('project/remove')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    alert("Item ID:" + id + "removed!");
                    myTable.row($(this).parents("tr")).remove().draw();
                    myTable.ajax.reload();
                }
            });
            return false;
        });

        //list items

        $("#addModal #item-add").on("click", function(){
            if($("#addModal .chosen-select").val()!='0'){
                items.push({id:$("#addModal .chosen-select").val(), name:$("#addModal .chosen-select option:selected").text(), number:$("#addModal #number").val()});
                console.log(JSON.stringify(items));
                generateList(items);
            } else
            {
                alert("Select an item");
            }
            return false;
        });
        $("#editModal #item-add").on("click", function(){
            if($("#editModal .chosen-select").val()!='0'){
                items.push({id:$("#editModal .chosen-select").val(), name:$("#editModal .chosen-select option:selected").text(), number:$("#editModal #number").val()});
                console.log(JSON.stringify(items));
                generateList(items);
            } else
            {
                alert("Select an item");
            }
            return false;
        });
        $("#addModal #list-items ul").on("click","#remove", function(){
            var i = $($(this).parent()).index();
            delete items[i];
            $(this).parent().remove();
            items = items.filter(isNotNull);
            console.log(JSON.stringify(items));
        });
        $("#editModal #list-items ul").on("click","#remove", function(){
            var i = $($(this).parent()).index();
            delete items[i];
            $(this).parent().remove();
            items = items.filter(isNotNull);
            console.log(JSON.stringify(items));
        });

        function generateList(data){
            $("#addModal #list-items ul").empty();
            $("#editModal #list-items ul").empty();

            $.each(data,function(i,v){
                $("#addModal #list-items ul").append(
                    "<li><div><label class='item-value'>"+v.name+"</label>"+
                    "</div><div>"+
                    "<label>number:</label><input class='number-value' type='number' value='"+v.number+"' />"+
                    "</div><a href='#' id='remove'>X</button></a></li>"
                );
            });
            $.each(data,function(i,v){
                $("#editModal #list-items ul").append(
                    "<li><div><label class='item-value'>"+v.name+"</label>"+
                    "</div><div>"+
                    "<label>number:</label><input class='number-value' type='number' value='"+v.number+"' />"+
                    "</div><a href='#' id='remove'>X</button></a></li>"
                );
            });
        }

        function isNotNull(value) {
            return value != null;
        }
    });
</script>