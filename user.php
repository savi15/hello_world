<?php

class User {

    public function __construct() {
        global $img_path;
    }

    function login() {

        if (isset($_POST["login"])) {
            $ll = "select * from firstphp where emailid='" . $_POST["uname"] . "' and pswd='" . $_POST["lp"] . "'";

            $result = mysql_query($ll);
            $info = mysql_fetch_array($result);
            $_SESSION["emailid"] = $info["emailid"];
            $rowcount = mysql_num_rows($result);
            if ($rowcount > 0) {
                return $info;
            } else {
                echo 'PLEASE LOGIN  if you have a loginid otherwise Sign Up first.....';
                return FALSE;
            }
        }
    }

    public function signup() {
        if (isset($_POST["submit"])) {
            $ss = "select * from firstphp where emailid='" . $_POST["emailid"] . "' ";
            $result = mysql_query($ss);
            if ($result) {
                $rowcount = mysql_num_rows($result);
                if ($rowcount === 0) {
                    unset($_POST['submit']);
                    unset($_POST['cnfrm_pswd']);

                    $this->insertion('firstphp', $_POST);
                    return TRUE;
                } else {
                    return FALSE;
                }
            }
        }
    }

    function insertion($val, $data) {
        $query = "insert into " . $val . " SET ";
        foreach ($data as $key => $value) {
            $query.= $key . "='" . $value . "',";
        }
        // $query=$query." path='".$_SESSION['path']."'";
        $query = trim($query, ',');
        mysql_query($query);
    }

    function pic_upload() {

        $filename = $_FILES["pic"]["name"];
        $filetype = $_FILES["pic"]["type"];
        $filesize = $_FILES["pic"]["size"] / 1000;
        $ext = explode("/", $filetype);

        $temp = $_FILES["pic"]["tmp_name"];
        if (!($ext[1] === "png" || $ext[1] === "jpg" || $ext[1] === "jpeg")) {
            return FALSE;
        } else {
            $t = "/opt/lampp/htdocs/projects/upload/";
            $t = $t . basename($filename);
            if (move_uploaded_file($_FILES["pic"]["tmp_name"], $t)) {
                $m = IMAGE_URL . $filename;
                $x = "UPDATE `firstphp` SET `path`= '$m' WHERE emailid='" . $_SESSION["emailid"] . " '";
                mysql_query($x);
                return IMAGE_URL . $filename;
            } else {
                return FALSE;
            }
        }
    }

    public function people() {
        $i = 0;
        $query = "select fname, lname, path from `firstphp` where emailid !='" . $_SESSION["emailid"] . " '";
        $result = mysql_query($query);
        while ($data = mysql_fetch_row($result)) {
            $final_data[$i] = $data;
            $i++;
        }
        return $final_data;
    }

    public function friends() {
        $query = "select * from Request where (user1='" . $_SESSION["emailid"] . " ' OR user2='" . $_SESSION["emailid"] . " ') AND (status='friends' )";
        $result = mysql_query($query);
        $i = 0;
       
        while ($data = mysql_fetch_row($result)) {
            $final_data[$i] = $data;
            $i++;
        }
        return $final_data;
    }
public function extract($friends){
    foreach($friends as $ss=>$j){
    $query="select fname,lname,path from `firstphp` where emailid='".$j."'";
    $result = mysql_query($query);
    $i = 0;
       
        while ($data = mysql_fetch_row($result)) {
            $final[$i] = $data;
            $i++;
        }
        return $final[0];
    }
}}


?>