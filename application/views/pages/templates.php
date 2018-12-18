<div class="main-content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <h3 style="text-align: center;">Templates</h3>
                        <div class="table-data__tool-right">
                            <button id="addbutton" class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#addModal">
                                <i class="zmdi zmdi-plus"></i>add</button>

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
                                    <h5 class="modal-title" id="mediumModalLabel">New template</h5>
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
                                            <label for="description" class="control-label mb-1">Descriptions</label>
                                            <input id="description" name="description" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                                        </div>
                                        <div id="items-action" class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="attr" class="control-label mb-1">attribute name</label>
                                                    <input id="attr" name="attr" type="text" class="form-control" value="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="type" class="control-label mb-1" style="width: 100%;float:left;margin-right: 5px;">Type</label>
                                                    <select id="type" style="width:100px;float:left;margin-right: 5px;" class="form-control">
                                                        <option value="1">text</option>
                                                        <option value="2">number</option>
                                                        <option value="3">boolean</option>
                                                    </select>
                                            </form>
                                                <button id="item-add" style="float:left;margin-right: 5px;" class="btn btn-warning btn-sm">Add</button>
                                    <input id="unit" class="form-control"  style="float:left;width:120px;margin-right: 5px;" placeholder="kg,mA,..."/>

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
                                    <h5 class="modal-title" id="mediumModalLabel">Edit template</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="update-form" method="post" role="form">
                                        <div class="form-group">
                                            <label for="name" class="control-label mb-1">Name</label>
                                            <input id="name" name="name" minlength="3" maxlength="50" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                                        </div>

                                        <div class="form-group">
                                            <label for="description" class="control-label mb-1">Descriptions</label>
                                            <input id="description" name="description" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                                        </div>
                                        <div id="items-action" class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="attr" class="control-label mb-1">attribute name</label>
                                                    <input id="attr" name="attr" type="text" class="form-control" value="">

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="type" class="control-label mb-1" style="width: 100%;float:left;margin-right: 5px;">Type</label>
                                                    <select id="type" style="width:100px;float:left;margin-right: 5px;" class="form-control">
                                                        <option value="1">text</option>
                                                        <option value="2">number</option>
                                                        <option value="3">boolean</option>
                                                    </select>
                                    </form>
                                    <button id="item-add" style="float:left;margin-right: 5px;" class="btn btn-warning btn-sm">Add</button>

                                        <input id="unit" class="form-control"  style="float:left;margin-right: 5px;" placeholder="Attribute unit"/>

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
        var pid;
        var attrs = [];
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
                url : "<?php echo site_url("template/get_templates") ?>",
                type: "POST",
                "contentType": 'application/json; charset=utf-8',
                'data': function (data) { return data = JSON.stringify(data); }
            }
        });

        $("#addbutton").on('click',function(event){
           attrs = [];
           generateList(attrs);
        });
        $(".modal-content").on("click","#add-btn", function(event) {
            event.preventDefault();
            var name = $("#name").val();
            var de = $("#description").val();
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('template/add')?>",
                dataType: "JSON",
                data: {
                    name: name,
                    descriptions: de,
                    attributes: attrs
                },
                success: function(data) {
                    $(".loading").css('visibility', 'hidden');
                    if (data == "true") {
                        $("#name").val("");
                        $("#description").val("");
                        $("#addModal").modal('hide');
                        attrs = [];
                        generateList(attrs);
                        myTable.ajax.reload();
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

        $(".modal-content").on("click","#update-btn", function(event) {
            event.preventDefault();
            var name = $("#editModal #name").val();
            var de = $("#editModal #description").val();

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('template/update')?>",
                dataType: "JSON",
                data: {
                    id: pid,
                    name: name,
                    descriptions: de,
                    attributes: attrs
                },
                success: function(data) {
                    $(".loading").css('visibility', 'hidden');
                    if (data == "true") {
                        $("#editModal #name").val("");
                        $("#editModal #description").val("");
                        $("#editModal").modal('hide');
                        attrs = [];
                        generateList(attrs);
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
            pid = $(this).data('template_id');
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('template/get_template')?>",
                dataType : "JSON",
                data : {id:pid},
                success: function(data){
                    $("#editModal #name").val(data.name);

                    $("#editModal #description").val(data.descriptions);
                    attrs = JSON.parse(data.attributes);
                    generateList(attrs);
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
            var id = $(this).data('template_id');
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('template/remove')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    alert("template ID:" + id + "removed!");
                    myTable.row($(this).parents("tr")).remove().draw();
                    myTable.ajax.reload();
                }
            });
            return false;
        });

        //list items
        $("#type").on("change", function() {
            if (this.value == 2){
                $("#unit").show();
            } else {
                $("#unit").hide();
            }
        });

        $("#item-add").on("click", function(){
            if($("#type").val()==2){
                attrs.push({name:$("#attr").val(), type:$("#type option:selected").text(), unit:$("#unit").val()});
            }
            else
            {
                attrs.push({name:$("#attr").val(), type:$("#type option:selected").text()});
            }
            console.log(JSON.stringify(attrs));
            generateList(attrs);
            return false;
        });

        $("#editModal #item-add").on("click", function(){
            if($("#type").val()==2){
                attrs.push({name:$("#attr").val(), type:$("#type option:selected").text(), unit:$("#unit").val()});
            }
            else
            {
                attrs.push({name:$("#attr").val(), type:$("#type option:selected").text()});
            }
            console.log(JSON.stringify(attrs));
            generateList(attrs);
            return false;
        });

        $("#addModal #list-items ul").on("click","#remove", function(){
            var i = $($(this).parent()).index();
            delete attrs[i];
            $(this).parent().remove();
            attrs = attrs.filter(isNotNull);
            console.log(JSON.stringify(attrs));
        });
        $("#editModal #list-items ul").on("click","#remove", function(){
            var i = $($(this).parent()).index();
            delete attrs[i];
            $(this).parent().remove();
            attrs = attrs.filter(isNotNull);
            console.log(JSON.stringify(attrs));
        });
        function generateList(data){
            $("#list-items ul").empty();

            $.each(data,function(i,v){
                var code = "<li><div><label class='item-value'>"+v.name+"</label></div><div>";
                if(v.hasOwnProperty('unit')){
                    code += "<label>type: " + v.type + " - Unit: "+ v.unit + "</label></div><a href='#' id='remove'>X</button></a></li>";
                } else {
                    code+="<label>type: " + v.type + "</label></div><a href='#' id='remove'>X</button></a></li>";
                }
                $("#list-items ul").append(code
                    /*"<li><div><label class='item-value'>"+v.name+"</label>"+
                    "</div><div>"+
                    "<label>type: " + v.type + "</label>"+
                    "</div><a href='#' id='remove'>X</button></a></li>"*/
                );
            });
        }

        function isNotNull(value) {
            return value != null;
        }
    });
</script>