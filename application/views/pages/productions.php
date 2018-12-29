<div class="main-content">
        <div class="container-fluid">
            <div class="row">

                    <div class="col-md-12">
                        <h3 style="text-align: center;">Productions</h3>
                            <div class="table-data__tool-right">

                            </div>
                    </div>
                <div class="col-md-12">
                        <div id="pro-tools" class="card">
                            <div class="card-header">
                                <strong class="card-title">Projects</strong>
                            </div>
                            <div class="card-body">
                                <div class="col-md-3">
                                        <label for="items" class="control-label mb-1">Project</label>
                                        <select data-placeholder="Choose a project..." class="chosen-select">
                                            <option value="0">---</option>
                                        </select>
                                </div>
                                <div class="col-md-3">
                                        <label for="items" class="control-label mb-1">Number of copy</label>
                                        <input id="number" name="number" min="1" max="1000000" type="number" class="form-control" aria-required="true" aria-invalid="false" value="1">
                                </div>
                                <div class="col-md-3">
                                        <label for="items" class="control-label mb-1" style="width:100%;height:24px;"></label>
                                        <button id="addproject" class="au-btn au-btn-icon au-btn--green au-btn--small" style="float: left;">
                                            <i class="zmdi zmdi-plus"></i>add</button>
                                </div>
                                <div class="col-md-2" style="float: left">
                                    <label for="items" class="control-label mb-1" style="width:100%;height:24px;"></label>
                                    <button id="calc-btn" class="btn btn-danger">
                                        <i class="fa fa-lightbulb-o"></i>&nbsp; Calc.</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="col-md-12">
                    <div id="list-projects" class="form-group">
                        <ul>

                        </ul>
                    </div>
                </div>
                    <!-- modal medium -->
                    <div class="modal fade" id="calcModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="mediumModalLabel">Calculation report</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="table-responsive m-b-40">
                                        <table id="shortages" class="table table-borderless table-data3">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Number</th>
                                                <th>status</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end modal medium -->

                </div>
            </div>

        </div>

</div>
<script type="text/javascript">
    $(document).ready(function () {
        var pid;
        var items = [];
        $("#calc-btn").prop("disabled",true);
        $("#addproject").prop("disabled",true);
        $(".chosen-select").chosen({width: "90%",search_contains:true,});

        function loadItems(){
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('project/get_projects')?>",
                dataType: "JSON",
                success: function(data) {
                    if (data != "false") {
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

        $("#calc-btn").click(function(event) {
            event.preventDefault();
            $("#calcModal table tbody").empty();
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('production/calculation')?>",
                dataType: "JSON",
                data: {
                    projects: items
                },
                success: function(data) {
                    $(".loading").css('visibility', 'hidden');
                    if (data != "false")
                    {
                        $.each(data,function(i,v){
                            $("#calcModal table tbody").append("<tr><td>"+v.id+"</td><td>"+ v.name +"</td><td>"+v.number+"</td><td class=\"denied\">shortage</td></tr>");
                        });
                        $("#calcModal").modal('show');
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


        $("#addproject").on("click", function(){

                items.push({id:$(".chosen-select").val(), name:$(".chosen-select option:selected").text(), number:$("#pro-tools #number").val()});
            $("#calc-btn").prop("disabled",false);
            console.log(JSON.stringify(items));
            generateList(items);
            return false;
        });

        $("#list-projects ul").on("click","#remove", function(){
            var i = $($(this).parent()).index();
            delete items[i];
            if (Object.keys(items).length==0){
                $("#calc-btn").prop("disabled",true);
            }
            $(this).parent().remove();
            items = items.filter(isNotNull);
            console.log(JSON.stringify(items));
        });

        function generateList(data){
            $("#list-projects ul").empty();

            $.each(data,function(i,v){
                var code = "<li><div><label class='item-value'>"+v.name+"</label></div><div>";

                    code+="<label>x" + v.number + "</label></div><a href='#' id='remove'>x</button></a></li>";

                $("#list-projects ul").append(code
                );
            });
        }

        $(".chosen-select").chosen().change( function() {
            if($(".chosen-select").val()==0){
                $("#addproject").prop('disabled',true);
            } else {
                $("#addproject").prop('disabled',false);
            }
        });

        function isNotNull(value) {
            return value != null;
        }

        $("#calcModal #shortages").tableExport({
            headers: true,
        footers: true,
        formats: ["xls"],
        fileName: "shortages",
        bootstrap: false,
        exportButtons: true,
        position: "bottom",
        ignoreRows: null,
        ignoreCols: null,
        trimWhitespace: true,
        RTL: false,
        sheetname: "shortages"

    });
    });
</script>