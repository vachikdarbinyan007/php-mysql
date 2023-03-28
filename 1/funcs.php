<?php
    $con=mysqli_connect("localhost","root","","mysqli_db1");
    function evaluate($a,$b,$c,$d){
        $errors=array(
            "desc"=>"",
            "title"=>"",
            "img"=>"",
            "price"=>"");
        if(empty($a)){
            $errors["title"]="<p>Title is empty</p>";
        }else{
            // echo $_POST["email"];
            // $email=$_POST["email"];
            // if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            //     $errors["email"]="Email must be valide Email";
            // }
        };
        if(empty($b)){
         $errors["img"]="<p>File is empty</p>";
        }else{
            // echo $_POST["title"];
        //      $title=$_POST["title"];
        //     if(!preg_match('/^[a-zA-Z\s]+$/',$title)){
        //     $errors["title"]="Title must be valide Title";
        // }  
        };
        if(empty($c)){
            $errors["desc"]="<p>Desc is empty, please try again!</p>";
        }else{
            //  $ing=$_POST["ing"];
            // if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/',$ing)){
            // $errors["ing"]="Ing must be valide Ing";
        // };
        };
        if(empty($d)){
            $errors["price"]="<p>Price is empty</p>";
        }else{
            //  $ing=$_POST["ing"];
            // if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/',$ing)){
            // $errors["ing"]="Ing must be valide Ing";
        // };
        };
        return $errors;
};
?>