    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="<?php echo base_url(); ?>assets/images/icon/logo.png" alt="ZIM">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input id="username" class="au-input au-input--full" type="text" name="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input id="password" class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div>
                                <!--div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Remember Me
                                    </label>
                                    <label>
                                        <a href="#">Forgotten Password?</a>
                                    </label>
                                </div-->
                                <div id="error" class="form-group">
                                    <label style="color:darkred!important;"></label>
                                </div>
                                <!--div class="social-login-content">
                                    <div class="social-button">
                                        <button class="au-btn au-btn--block au-btn--blue m-b-20">sign in with facebook</button>
                                        <button class="au-btn au-btn--block au-btn--blue2">sign in with twitter</button>
                                    </div>
                                </div-->
                            </form>
                            <button id="login-btn" class="au-btn au-btn--block au-btn--green m-b-20">sign in</button>
                            <!--div class="register-link">
                                <p>
                                    Don't you have account?
                                    <a href="#">Sign Up Here</a>
                                </p>
                            </div-->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        $(document).ready(function(){
            $(".login-form").on("click",'#login-btn', function() {
                var un = $('#username').val();
                var pw = $('#password').val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo site_url('user/login')?>",
                    dataType : "JSON",
                    data : {username:un, password: pw},
                    success: function(data){
                        if(data == "true")
                        {
                            $("#error label").html("");
                            window.location.replace("<?php echo site_url('product')?>");
                        }
                        else
                        {
                            $("#error label").html("username and password are not valid!");
                        }
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        $(".loading").css('visibility','hidden');
                        alert("Status: " + textStatus); alert("Error: " + errorThrown);
                    }
                });
                return false;
            });
            $('input').keypress(function (e) {
                if (e.which == 13) {//enter pressed
                    $(".login-form #login-btn").click();
                    return false;
                }
            });
        });
    </script>