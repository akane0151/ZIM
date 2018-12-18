<div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <strong>Account</strong>
                        </div>
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label for="oldpassword" class=" form-control-label">Old password</label>
                                <input type="password" id="oldpassword" placeholder="Enter your old password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="newpassword" class=" form-control-label">New password</label>
                                <input type="password" id="newpassword" placeholder="Enter your new password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="confirmpassword" class=" form-control-label">Confirm password</label>
                                <input type="password" id="confirmpassword" placeholder="Enter your new password again" class="form-control">
                            </div>
                            <button id="confirm-btn" type="submit" class="btn btn-lg btn-info btn-block">
                                Confirm
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>

            </div>
        </div>

</div>

<script type="text/javascript">
    $(document).ready(function () {


        $(".card").on("click","#confirm-btn", function(event) {
            event.preventDefault();
            $(".card #confirm-btn").html("...");
            var oldpw = $(".card #oldpassword").val();
            var newpw = $(".card #newpassword").val();
            var cpw = $(".card #confirmpassword").val();
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('user/change_password')?>",
                dataType: "JSON",
                data: {
                    oldpassword: oldpw,
                    newpassword: newpw,
                    confirmpassword: cpw
                },
                success: function(data) {
                    $(".loading").css('visibility', 'hidden');
                    if (data == "true")
                    {
                        $(".card #confirm-btn").html("Confirm");
                    } else {

                    }
                }, error: function (XMLHttpRequest, textStatus, errorThrown) {
                    $(".loading").css('visibility', 'hidden');
                    alert("Error: " + errorThrown);
                }
            });
            return false;
            });

    });
</script>