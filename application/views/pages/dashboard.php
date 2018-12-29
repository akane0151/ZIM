<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">overview</h2>
                        <!--button class="au-btn au-btn-icon au-btn--blue">
                            <i class="zmdi zmdi-plus"></i>add item</button-->
                    </div>
                </div>
            </div>
            <div class="row">

                <div id="dash-projects" class="col-md-6 col-lg-4">
                    <!-- TOP CAMPAIGN-->
                    <div class="top-campaign">
                        <h3 class="title-3 m-b-30">Projects</h3>
                        <div class="table-responsive">
                            <table class="table table-top-campaign">
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END TOP CAMPAIGN-->
                </div>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('dashboard/get_projects')?>",
            dataType: "JSON",
            success: function(data) {
                if (data != "false") {
                    var i;
                    for(i=0; i<data['data'].length ; i++){
                        $('#dash-projects table tbody').append('<tr><td>'+ data['data'][i][0] + '</td><td>' + data['data'][i][1] + ' copy</td></tr>');
                    }
                }
            }, error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert("Status: " + textStatus);
                alert("Error: " + errorThrown);
            }
        });

    });
</script>
</div>