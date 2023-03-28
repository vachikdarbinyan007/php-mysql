<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login and Registration</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/style.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
    <?php include("header.php"); ?>
    <div class="container">
        <div class="row">
            <div class="col s12 l6">
                <h3>Login</h3>
                <form action="login.php" method="post">
                <div class="input-field">
                    <input type="text" name="name" id="benutzer_name_input"/>
                    <label for="benutzer_name_input">Name</label>
                </div>
                <div class="input-field">
                    <input type="text" name="password" id="password_input"/>
                    <label for="password_input">Password</label>
                </div>
                <label>
                <input type="checkbox" id="cookie_checkbox" name="cookie_checkbox"/>
                <span>Remember me</span>
                </label>
                <div class="input-field">
                    <input type="submit" name="log_submit" id="login_sbm" class="btn indigo"/>
                </div>
                </form>
            </div>
            <div class="col s12 l6">
                <h3>Registration</h3>
                <form action="reg.php" method="post">
                <div class="input-field">
                    <input type="text" name="name" id="benutzer_name_reg_input"/>
                    <label for="benutzer_name_reg_input">Name</label>
                </div>
                <div class="input-field">
                    <input type="text" name="password" id="password_reg_input"/>
                    <label for="password_reg_input">Password</label>
                </div>
                <div class="input-field">
                    <input type="email" name="email" id="email_reg_input"/>
                    <label for="email_reg_input">Email</label>
                </div>
                <div class="input-field">
                    <input type="submit" name="reg_submit" id="reg_sbm" class="btn indigo"/>
                </div>
                </form>
            </div>
        </div>
    </div>
    <?php include("footer.php"); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>