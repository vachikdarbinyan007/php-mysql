<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Admin Login</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="black">
    <h3 class="white-text">Login to admin Panel</h3>
    <div class="row">
        <div class="col s12 l6 white">
            <img src="https://windowsthemepack.com/themepack/_cool_themes/doctor-theme/14.jpg" alt="" class="responsive-img">
        </div>
        <div class="col s12 l6 white ">
        <div class="input-field">
                    <input type="text" name="name" id="l_name"/>
                    <label for="l_name">Name</label>
                    <span id="name_error_span_l" class="red-text"></span>
                </div>
                <div class="input-field">
                    <input type="password" name="password" id="l_password"/>
                    <label for="l_password">Password</label>
                    <span id="password_error_span_l" class="red-text"></span>
                </div>
                <div class="input-field">
                    <button class="btn" name="submit" id="log_sbm">Login</button>
                </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        log_sbm.onclick=function(){
            let req;
            let data='name='+l_name.value+'&password='+l_password.value;
            console.log(data)
            req = new XMLHttpRequest();
            req.open("post","login_admin.php",true);
            req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            req.send(data);
            req.onreadystatechange = go3;
       
        function go3(){
        if(req.readyState == 4 && req.status == 200){
           if(req.responseText=="true"){
              window.location="adminpanel.php";
           }else if(req.responseText=="false"){
              alert("No such login found!");
           }
           else{
            let obj = JSON.parse(req.responseText);
            name_error_span_l.innerText=obj["name"];
            password_error_span_l.innerText=obj["password"];
           }
        }
        }
        }
    </script>
</body>
</html>