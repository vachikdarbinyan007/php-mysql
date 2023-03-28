<?php
require("config/con1.php");
$sql="SELECT name FROM doctors";
$ardyunq=mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bjsihk</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<style>
    body{
        height: 100vh;
    }
    #menu{
        position: absolute;
        left: 90%;
        top: 100%;
    }
    @media screen and (max-width: 900px) {
        #menu {
        top:120%;
        }
    }
</style>
<body class="grey lighten-2 valign-wrapper">
    <a id="menu" href="admin_login.php"><i class="material-icons">menu</i></a>
    <div class="container">
        <h4>Welcome to ...</h4>
       <div class="row white">
        <div class="col s12 m4 l4">
            <h4>Login</h4>
            <h5 id="start" class="green-text"></h5>
                <div class="input-field">
                    <input type="text" name="name" id="l_name"/>
                    <label for="name">Name</label>
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
        <div class="col s12 m6 l6 offset-l2 offset-m2">
            <h4>Registration</h4>
                <div class="input-field">
                    <input type="text" name="name" id="nam"/>
                    <label for="name">Name</label>
                    <span class="red-text" id="name_error_span"></span>
                </div>
                <div class="input-field">
                    <input type="password" name="password" id="pasword"/>
                    <label for="pasword">Password</label>
                    <span class="red-text" id="password_error_span"></span>
                </div>
                <div class="input-field">
                    <input type="text" name="illnes" id="illnes" />
                    <label for="illnes">Illnes</label>
                    <span class="red-text" id="illnes_error_span"></span>
                </div>
                <div class="input-field">
                    <span>Your doctor</span>
                    <select name="select" id="select" style="display:block;">
                        <option value=""  disabled selected></option> 
                        <?php
                            while($row=mysqli_fetch_assoc($ardyunq)){
                                echo "<option value=.".$row["doctor_id"].">".$row["name"]."</option>";
                            }
                        ?>
                    </select>
                    <span class="red-text" id="select_error_span"></span> 
                </div>
                <div class="input-field">
                    <button class="btn" name="submit" id="reg_sbm">Registration</button>
                </div>
        </div>
       </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<script>
        reg_sbm.onclick=function(){
            let req;
            let data='name='+nam.value+'&illnes='+illnes.value+'&password='+pasword.value+'&doctor='+select.value;
            console.log(data)
            req = new XMLHttpRequest();
            req.open("post","reg_user.php",true);
            req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            req.send(data);
            req.onreadystatechange = go;
       
        function go(){
        if(req.readyState == 4 && req.status == 200){
           if(req.responseText=="tre"){
                let secounds=3;
                start.innerText="We registred you please login in "+secounds;
            setTimeout(function(){
                secounds--;
                start.innerText="We registred you please login in "+secounds;
            },500)
            setTimeout(function(){
                window.location="index.php";
            },3000)
           }else{
            let obj = JSON.parse(req.responseText);
            console.log(obj)
            name_error_span.innerText=obj["name"];
            password_error_span.innerText=obj["password"];
            illnes_error_span.innerText=obj["illnes"];
            select_error_span.innerText=obj["doctor_id"];
           }
        }
        }
        }


        log_sbm.onclick=function(){
            let req;
            let data='name='+l_name.value+'&password='+l_password.value;
            console.log(data)
            req = new XMLHttpRequest();
            req.open("post","login_user.php",true);
            req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            req.send(data);
            req.onreadystatechange = go2;
       
        function go2(){
        if(req.readyState == 4 && req.status == 200){
           if(req.responseText=="tre"){
              window.location="account.php";
           }else if(req.responseText=="fls"){
              alert("No such login found");
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