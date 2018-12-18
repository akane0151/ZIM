<div class="main-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <h3 style="text-align: center;">Orders</h3>
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
                                <th>Number</th>
                                <th>Date</th>
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
                                    <h5 class="modal-title" id="mediumModalLabel">New Order</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="loading">
                                        <div class="loader">
                                        </div>
                                    </div>
                                    <form id="add-form" method="post" role="form">
                                        <div class="row">
                                            <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name" class="control-label mb-1">Item name</label>
                                            <select data-placeholder="Choose an Item..." class="chosen-select">
                                                <option value="0"></option>
                                            </select>
                                        </div>

                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Current stock</label>
                                                <div style="width: 100%">
                                                    <span id="stock" class="badge badge-primary">0</span>
                                                </div>


                                            </div>
                                            </div>
                                        </div>
                                    <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="number" class="control-label mb-1">Number</label>
                                            <input id="number" name="number" type="number" class="form-control" aria-required="true" aria-invalid="false" value="0">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date" class="control-label mb-1">Date</label>
                                            <input id="date" name="date" type="text" class="form-control" aria-required="true" aria-invalid="false" value="0">
                                        </div>
                                    </div>
                                    </div>

                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="descriptions" class="control-label mb-1">Descriptions</label>
                                                    <input id="descriptions" name="descriptions" type="text" class="form-control" aria-required="true" aria-invalid="false" value="0">
                                                </div>
                                            </div>
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
                                    <h5 class="modal-title" id="mediumModalLabel">Edit order</h5>
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
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name" class="control-label mb-1">Item name</label>
                                                    <select data-placeholder="Choose an Item..." class="chosen-select">
                                                        <option value="0"></option>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name" class="control-label mb-1">Current stock</label>
                                                    <div style="width: 100%">
                                                        <span id="stock" class="badge badge-primary">0</span>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="number" class="control-label mb-1">Number</label>
                                                    <input id="number" name="number" type="number" class="form-control" aria-required="true" aria-invalid="false" value="0">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="date" class="control-label mb-1">Date</label>
                                                    <input id="date" name="date" type="text" class="form-control" aria-required="true" aria-invalid="false" value="0">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="laststock" class="control-label mb-1">Last OnHand</label>
                                                    <input id="laststock" name="laststock" type="number" class="form-control" aria-required="true" aria-invalid="false" readonly="true" value="0">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="descriptions" class="control-label mb-1">Descriptions</label>
                                                    <input id="descriptions" name="descriptions" type="text" class="form-control" aria-required="true" aria-invalid="false" value="0">
                                                </div>
                                            </div>
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

</div>
<script type="text/javascript">
    $(document).ready(function () {
        //your code here
        $(".chosen-select").chosen({width: "100%",search_contains:true, allow_single_deselect: true});
        $(".chosen-select").val('');

        var today = new Date();
        var todayString = new Date(today.getFullYear() + "/" + (today.getMonth()+1) + "/" + today.getDate());
        $("#date").MdPersianDateTimePicker({
            selectedDate: todayString,
            targetTextSelector: '#date'
        });
        function loadItems(){
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('product/get_list')?>",
                dataType: "JSON",
                success: function(data) {
                    if (data != "false") {
                        //var opts = $.parseJSON(data);
                        var i;
                        for(i=0; i<data['data'].length ; i++){
                            $('.chosen-select').append('<option value="' + data['data'][i][0] + '">' + data['data'][i][1] +  " " + data['data'][i][3] + '</option>');
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
        $(".chosen-select").chosen().change( function(){
            var id = $(".chosen-select").val();
            if(id!=0){
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('product/get_stock')?>",
                    dataType: "JSON",
                    data:{id:id},
                    success: function(data) {
                        if (data != "false") {
                            $("#stock").html(data);
                        }
                    }, error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert("Status: " + textStatus);
                        alert("Error: " + errorThrown);
                    }
                });
            } else {
                $("#stock").html('0');
            }

        });

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
                url : "<?php echo site_url("output/get_outputs") ?>",
                type: "POST",
                "contentType": 'application/json; charset=utf-8',
                'data': function (data) { return data = JSON.stringify(data); }

            }
        });

        $(".modal-content").on("click","#add-btn", function(event) {
            event.preventDefault();
            var id = $(".chosen-select").val();
            var date = $("#date").val();
            var number = $("#number").val();
            var de = $("#descriptions").val();

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('output/add')?>",
                dataType: "JSON",
                data: {
                    pid: id,
                    number: number,
                    date: date,
                    descriptions: de
                },
                success: function(data) {
                    $(".loading").css('visibility', 'hidden');

                    if (data != "false") {
                        $("#date").val('');
                        $("#number").val('');
                        $("#descriptions").val('');
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
            var id = $("#editModal .chosen-select").val();
            var date = $("#editModal #date").val();
            var number = $("#editModal #number").val();
            var de = $("#editModal #descriptions").val();

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('output/update')?>",
                dataType: "JSON",
                data: {
                    id: pid,
                    pid: id,
                    number: number,
                    date: date,
                    descriptions: de
                },
                success: function(data) {
                    $(".loading").css('visibility', 'hidden');
                    if (data != "false") {
                        $("#editModal .chosen-select").val('');
                        $("#editModal #date").val('');
                        $("#editModal #number").val('');
                        $("#editModal #descriptions").val('');
                        $("#editModal").modal('show');
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
            pid = $(this).data('output_id');
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('output/get_output')?>",
                dataType : "JSON",
                data : {id:pid},
                success: function(data){
                    $("#editModal .chosen-select option[value="+data.pid+"]").attr("selected", true);
                    $("#editModal .chosen-select").trigger("chosen:updated");
                    $("#editModal #date").val(data.Date);
                    $("#editModal #number").val(data.Number);
                    $("#editModal #laststock").val(data.LastStock);
                    $("#editModal #descriptions").val(data.Descriptions);
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
            var id = $(this).data('output_id');

            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('output/remove')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    alert("Item ID:" + id + " removed!");
                    myTable.row($(this).parents("tr")).remove().draw();
                    myTable.ajax.reload();
                }
            });
            return false;
        });
    });


</script>