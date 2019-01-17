
<div class="main-content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <h3 style="text-align: center;">Items</h3>
                    <!-- DATA TABLE-->
                    <!--div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="rs-select2--light rs-select2--md">
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
                        <table id="product-table" class="table table-borderless table-striped table-earning">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>ProductNumber</th>
                                <th>OnHand</th>
                                <th>Attribute</th>
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
                                    <h5 class="modal-title" id="mediumModalLabel">New item</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="loading">
                                        <div class="loader">
                                        </div>
                                    </div>
                                    <form id="addproduct-form" method="post" role="form">
                                        <div class="form-group">
                                            <label for="productname" class="control-label mb-1">Product name</label>
                                            <input id="productname" name="productname" minlength="3" maxlength="50" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="productnumber" class="control-label mb-1">Product number</label>
                                                    <input id="productnumber" name="productnumber" type="text" class="form-control" value="" data-val="true" data-val-required="Please enter the card expiration"
                                                           data-val-cc-exp="" placeholder=""
                                                           autocomplete="">
                                                    <!--span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span-->
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label for="startinginventory" class="control-label mb-1">Starting inventory</label>
                                                <div class="input-group">
                                                    <input id="startinginventory" name="startinginventory" type="number" class="form-control" value="0" data-val="true" data-val-required=""
                                                           data-val-cc-cvc="" autocomplete="off">

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col-6">
                                                <label for="minmum" class="control-label mb-1">Minimum Requirement</label>
                                                <div class="input-group">
                                                    <input id="minimum" name="minimum" type="number" class="form-control" value="" data-val="true" data-val-required=""
                                                           data-val-cc-cvc="" autocomplete="off">

                                                </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="form-group">
                                                <label for="description" class="control-label mb-1">Description</label>
                                                <input id="description" name="description" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                                            </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="category" class="control-label mb-1">category</label>
                                                    <div id="category" class="form-control"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                            <div class="form-group">
                                                <label for="att-type" class="control-label mb-1">Template</label>
                                                <select id="att-type" name="att-type" data-placeholder="Choose a template..." class="chosen-select">
                                                    <option value="0">Choose a template</option>
                                                </select>
                                            </div>
                                            </div>
                                        </div>
                                        <div id="attributes-container">
                                            <ul id="list">

                                            </ul>
                                        </div>

                                </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button id="addproduct-btn" class="btn btn-primary">Confirm</button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end modal medium -->
                    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="mediumModalLabel">Edit product</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="loading">
                                        <div class="loader">
                                        </div>
                                    </div>
                                    <form id="update-form" method="post" role="form">
                                        <div class="form-group">
                                            <label for="productname" class="control-label mb-1">Product name</label>
                                            <input id="productname" name="productname" minlength="3" maxlength="50" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="productnumber" class="control-label mb-1">Product number</label>
                                                    <input id="productnumber" name="productnumber" type="text" class="form-control" value="" data-val="true" data-val-required="Please enter the card expiration"
                                                           data-val-cc-exp="" placeholder=""
                                                           autocomplete="">
                                                    <!--span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span-->
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label for="startinginventory" class="control-label mb-1">Starting inventory</label>
                                                <div class="input-group">
                                                    <input id="startinginventory" name="startinginventory" type="number" class="form-control" value="" data-val="true" data-val-required=""
                                                           data-val-cc-cvc="" autocomplete="off">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="received" class="control-label mb-1">Received</label>
                                                    <input id="received" name="received" type="number" class="form-control" value="" readonly="true" data-val="true" data-val-required=""
                                                           data-val-cc-exp="" placeholder=""
                                                           autocomplete="">
                                                    <!--span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span-->
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label for="shipped" class="control-label mb-1">Shipped</label>
                                                <div class="input-group">
                                                    <input id="shipped" name="shipped" type="number" class="form-control" value="" readonly="true" data-val="true" data-val-required=""
                                                           data-val-cc-cvc="" autocomplete="off">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="onhand" class="control-label mb-1">OnHand</label>
                                                    <input id="onhand" name="onhand" type="number" class="form-control" value="" readonly="true" data-val="true" data-val-required=""
                                                           data-val-cc-exp="" placeholder=""
                                                           autocomplete="">
                                                    <!--span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span-->
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label for="minmum" class="control-label mb-1">Minimum Requirement</label>
                                                <div class="input-group">
                                                    <input id="minimum" name="minimum" type="number" class="form-control" value="" data-val="true" data-val-required=""
                                                           data-val-cc-cvc="" autocomplete="off">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="description" class="control-label mb-1">Description</label>
                                            <input id="description" name="description" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="category" class="control-label mb-1">category</label>
                                                <div id="category" class="form-control"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="att-type" class="control-label mb-1">Template</label>
                                                    <select id="att-type" name="att-type" data-placeholder="Choose a template..." class="chosen-select">
                                                        <option value="0">Choose a template</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="attributes-container">
                                            <ul id="list">

                                            </ul>
                                        </div>
                                    </form>
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
        //your code here
        var c1 = $('#addModal #category').jstree({
                'plugins': ["wholerow","search"],
                'core' : {
                    "multiple" : false,
                    'data' : {
                        "url" : "<?php echo site_url('category/get_tree')?>",
                        "dataType" : "json" // needed only if you do not supply JSON headers
                    }
                },
                'checkbox': {
                    three_state: false,
                    cascade: 'up'
                }
            }
        );
        var c2 = $('#editModal #category').jstree({
                'plugins': ["wholerow","search"],
                'core' : {
                    "multiple" : false,
                    'data' : {
                        "url" : "<?php echo site_url('category/get_tree')?>",
                        "dataType" : "json" // needed only if you do not supply JSON headers
                    }
                },
                'checkbox': {
                    three_state: false,
                    cascade: 'up'
                }
            }
        );

        //jstree selected node id
        var catid = 0;
        $('#category').on("changed.jstree", function (e, data) {
            catid = data.selected[0];
        });
        var attrs = [];
        $(".chosen-select").chosen({width: "100%",search_contains:true});
        function loadItems(){
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('template/get_templates')?>",
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
                url : "<?php echo site_url("product/get_products") ?>",
                type: "POST",
                "contentType": 'application/json; charset=utf-8',
                'data': function (data) { return data = JSON.stringify(data); }
            }
        });

        $("#addbutton").on('click',function(event){
            $('#addModal #attributes-container ul').empty();
            $("#addModal .chosen-select").val("0").trigger('chosen:updated');
            $("#addModal #category").jstree("deselect_all");
            //$("#addModal .chosen-select").trigger("chosen:updated");

        });
        $(".modal-content").on("click","#addproduct-btn", function(event) {
            event.preventDefault();
            var pname = $("#productname").val();
            var pnumber = $("#productnumber").val();
            var si = $("#startinginventory").val();
            //var re = $("#received").val();
            //var sh = $("#shipped").val();
            //var oh = $("#onhand").val();
            var min = $("#minimum").val();
            var de = $("#description").val();
            var tid = $(".chosen-select").val();
            var attrs = [];

            $('#addModal #attributes-container ul').children('li').each(function () {
                if($(this).children("input").attr('type')=='number'){
                    attrs.push({name:$(this).children(".attr-name").text(), value:$(this).children(".attr-value").val(), unit:$(this).children(".attr-unit").text()})
                } else if($(this).children("input").attr('type')=='checkbox'){
                    attrs.push({name:$(this).children(".attr-name").text(), value:$(this).children('input:checked').val()?true:false})
                } else {
                    attrs.push({name:$(this).children(".attr-name").text(), value:$(this).children(".attr-value").val()})
                }
            });
            console.log(JSON.stringify(attrs));
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('product/add')?>",
                dataType: "JSON",
                data: {
                    Name: pname,
                    ProductNumber: pnumber,
                    StartingInventory: si,
                    MinimumRequired: min,
                    Descriptions: de,
                    template_id: tid,
                    attributes: attrs,
                    catid: catid
                },
                success: function(data) {
                    $(".loading").css('visibility', 'hidden');
                    if (data == "true") {
                        $("#productname").val("");
                        $("#productnumber").val("");
                        $("#startinginventory").val("");
                        //$("#received").val("");
                        //$("#shipped").val("");
                        //$("#onhand").val("");
                        $("#minimum").val("");
                        $("#description").val("");
                        $("#addModal .chosen-select option[value='0']").attr("selected", true);
                        $("#addModal .chosen-select").trigger("chosen:updated");
                        $("#addModal").modal('hide');
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
            var name = $("#editModal #productname").val();
            var number = $("#editModal #productnumber").val();
            var si = $("#editModal #startinginventory").val();
            var re = $("#editModal #received").val();
            var sh = $("#editModal #shipped").val();
            var oh = $("#editModal #onhand").val();
            var min = $("#editModal #minimum").val();
            var de = $("#editModal #description").val();

            var tid = $("#editModal .chosen-select").val();
            var attrs = [];

            $('#editModal #attributes-container ul').children('li').each(function () {
                if($(this).children("input").attr('type')=='number'){
                    attrs.push({name:$(this).children(".attr-name").text(), value:$(this).children(".attr-value").val(), unit:$(this).children(".attr-unit").text()})
                } else if($(this).children("input").attr('type')=='checkbox'){
                    attrs.push({name:$(this).children(".attr-name").text(), value:$(this).children('input:checked').val()?true:false})
                } else {
                    attrs.push({name:$(this).children(".attr-name").text(), value:$(this).children(".attr-value").val()})
                }
            });
            console.log(JSON.stringify(attrs));

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('product/update')?>",
                dataType: "JSON",
                data: {
                    id: pid,
                    Name: name,
                    ProductNumber: number,
                    StartingInventory: si,
                    Received: re,
                    Shipped: sh,
                    OnHand: oh,
                    MinimumRequired: min,
                    Descriptions: de,
                    template_id: tid,
                    attrs: attrs,
                    catid: catid
                },
                success: function(data) {
                    $(".loading").css('visibility', 'hidden');
                    if (data == "true") {
                        $("#editModal #productname").val("");
                        $("#editModal #productnumber").val("");
                        $("#editModal #startinginventory").val("");
                        $("#editModal #received").val("");
                        $("#editModal #shipped").val("");
                        $("#editModal #onhand").val("");
                        $("#editModal #minimum").val("");
                        $("#editModal #description").val("");
                        $("#editModal").modal('hide');

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
            pid = $(this).data('product_id');
            $("#editModal #attributes-container ul").empty();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('product/get_product')?>",
                dataType : "JSON",
                data : {id:pid},
                success: function(data){
                    $("#editModal #productname").val(data.Name);
                    $("#editModal #productnumber").val(data.ProductNumber);
                    $("#editModal #startinginventory").val(data.StartingInventory);
                    $("#editModal #received").val(data.Received);
                    $("#editModal #shipped").val(data.Shipped);
                    $("#editModal #onhand").val(data.OnHand);
                    $("#editModal #minimum").val(data.MinimumRequired);
                    $("#editModal #description").val(data.Descriptions);
                    $("#editModal .chosen-select option[value="+data.template_id+"]").attr("selected", true);
                    $("#editModal .chosen-select").trigger("chosen:updated");
                    c2.jstree('select_node', data.category_id);
                    var attrs = JSON.parse(data.attributes);
                    $.each(attrs,function(i,v) {
                        if (v.hasOwnProperty('unit')) {
                            var code = '<li><label class="attr-name">' + v.name + '</label>' +
                                '<input class="attr-value form-control" type="number" value="' + v.value + '"/><label class="attr-unit">' + v.unit + '</label>' +
                                '</li>';
                            $("#editModal #attributes-container ul#list").append(code);
                        }
                        else if (v.value == "true" || v.value == "false") {
                            var code = v.value == 'true' ? '<li><label class="attr-name">' + v.name + '</label>' +
                                '<input class="attr-value form-control" type="checkbox" checked/>' +
                                '</li>' : '<li><label class="attr-name">' + v.name + '</label>' +
                                '<input class="attr-value form-control" type="checkbox"/>' +
                                '</li>';
                            $("#editModal #attributes-container ul#list").append(code);
                        }
                        else {
                            var code = '<li><label class="attr-name">' + v.name + '</label>' +
                                '<input class="attr-value form-control" type="text" value="'+v.value+'"/>' +
                                '</li>';
                            $("#editModal #attributes-container ul#list").append(code);
                        }

                    });
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
            var id = $(this).data('product_id');

            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('product/remove')?>",
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
        $("#addModal .chosen-select").chosen().change( function(){
            var id = $("#addModal .chosen-select").val();
            if(id!=0){
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('template/get_template')?>",
                    dataType: "JSON",
                    data:{id:id},
                    success: function(data) {
                        var attrs = JSON.parse(data.attributes);
                        $("#addModal #attributes-container ul").empty();
                        $.each(attrs,function(i,v){
                            switch(v.type){
                                case"number":
                                    var code = '<li><label class="attr-name">'+v.name+'</label>'+
                                        '<input class="attr-value form-control" type="number" value="0"/><label class="attr-unit">'+v.unit+'</label>'+
                                        '</li>';
                                    $("#addModal #attributes-container ul#list").append(code);
                                    break;
                                case "boolean":
                                    var code = '<li><label class="attr-name">'+v.name+'</label>'+
                                        '<input class="attr-value form-control" type="checkbox"/>'+
                                        '</li>';
                                    $("#addModal #attributes-container ul#list").append(code);
                                    break;
                                case "text":
                                    var code = '<li><label class="attr-name">'+v.name+'</label>'+
                                        '<input class="attr-value form-control" type="text" value=""/>'+
                                        '</li>';
                                    $("#addModal #attributes-container ul#list").append(code);
                                    break;
                            }
                            $("#addModal .chosen-select").trigger("chosen:updated");
                        });
                    }, error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert("Status: " + textStatus);
                        alert("Error: " + errorThrown);
                    }
                });
            } else {
                $("#attributes-container ul").empty();
            }

        });
        $("#editModal .chosen-select").chosen().change( function(){
            var id = $("#editModal .chosen-select").val();
            if(id!=0){
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('template/get_template')?>",
                    dataType: "JSON",
                    data:{id:id},
                    success: function(data) {
                        var attrs = JSON.parse(data.attributes);
                        $("#editModal #attributes-container ul").empty();
                        $.each(attrs,function(i,v){
                            switch(v.type){
                                case"number":
                                    var code = '<li><label class="attr-name">'+v.name+'</label>'+
                                        '<input class="attr-value form-control" type="number" value="0"/><label class="attr-unit">'+v.unit+'</label>'+
                                        '</li>';
                                    $("#editModal #attributes-container ul#list").append(code);
                                    break;
                                case "boolean":
                                    var code = '<li><label class="attr-name">'+v.name+'</label>'+
                                        '<input class="attr-value form-control" type="checkbox"/>'+
                                        '</li>';
                                    $("#editModal #attributes-container ul#list").append(code);
                                    break;
                                case "text":
                                    var code = '<li><label class="attr-name">'+v.name+'</label>'+
                                        '<input class="attr-value form-control" type="text" value=""/>'+
                                        '</li>';
                                    $("#editModal #attributes-container ul#list").append(code);
                                    break;
                            }
                            $("#editModal .chosen-select").trigger("chosen:updated");
                        });
                    }, error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert("Status: " + textStatus);
                        alert("Error: " + errorThrown);
                    }
                });
            } else {
                $("#attributes-container ul").empty();
            }

        });
    });



</script>