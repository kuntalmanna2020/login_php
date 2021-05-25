<?php
//require_once('functions/db.php');
//require_once('functions/config.php');
//echo "hello"

function clean($str)
{
    return htmlentities($str);
}

function redirect($location)
{
    return header("location:{$location}");

}

function set_messege($msg)
{
    if (!empty($msg))
    {
        $_SESSION['Messege']=$msg;

    }
    else
    {
        $msg="";
    }
}


function disp_msg()
{
//    echo $_SESSION['Message'];
//    unset($_SESSION['Message']);

    if (isset($_SESSION['Messege']))
    {
        echo $_SESSION['Messege'];
        unset($_SESSION['Messege']);
    }
}


function send_mail($email,$sub,$msg,$header)
{
    return mail($email,$sub,$msg,$header);

}




function token_generator()
{
   $token=$_SESSION['token']=md5(uniqid(mt_rand(),true));
   return $token;

}


function Error_validation($error)
{
    return '<div class="alert alert-danger">'.$error.'</div>';
}


function user_validation()
{
    if ($_SERVER['REQUEST_METHOD']=='POST')
    {
//        echo 'working file';
        $firstName=clean($_POST['firstname']);
        $lastName=clean($_POST['lastname']);
        $username=clean($_POST['username']);
        $email=clean($_POST['email']);
        $password=clean($_POST['pass']);
        $confirm=clean($_POST['cpass']);

//        echo $firstName,$lastName,$username,$email,$password,$confirm;

        $errors=[];
        $max=20;
        $min=03;
        if (strlen($firstName)<$min)
        {
            $errors[]="first name is not less than {$min} charecter";

        }
        if (strlen($firstName)>$max)
        {
            $errors[]="first name is not more than {$max} charecter";


        }
        if (strlen($lastName)<$min)
        {
            $errors[]="last name is not less than {$min} charecter";

        }
        if (strlen($lastName)>$max)
        {
            $errors[]="last name is not more than {$max} charecter";


        }
        if (!preg_match('/^[a-zA-Z,0-9]*$/',$username))
        {
            $errors[]="Username cannot be acceptable by charecter";

        }
        if (email_exist($email))
        {
            $errors[]="Email is already exists";
        }
        if (user_exist($username))
        {
            $errors[]="UserName is already registered";
        }
        if ($password != $confirm)
        {
            $errors[]="Password not matched";

        }
        if (!empty($errors))
        {
            foreach ($errors as $error)
            {
//                echo '<div class="alert alert-danger">'.$error.'</div>';
                echo Error_validation($error);
            }
        }
        else
        {
            if (user_registration($firstName,$lastName,$username,$email,$password))
            {
                set_messege("<p class='bg-success text-center lead'>You have successfully registered your account</p>");
                redirect('home.php');
            }
            else
            {
                set_messege("<p class='bg-danger text-center lead'>Your Account not Registered please try again</p>");
                redirect('home.php'); 
            }
        }



    }

}

function email_exist($email)
{
    $sql="SELECT * FROM users where Email='$email'";
    $result=Query($sql);
    if (fetch_data($result))
    {
        return true;
    }
    else
    {
        return  false;
    }

}

function user_exist($user)
{
    $sql="SELECT * FROM users where  UserName='$user'";
    $result=Query($sql);
    if (fetch_data($result))
    {
        return true;
    }
    else
    {
        return  false;
    }

}


function user_registration($Fname,$LName,$Uname,$Email,$pass)
{
    $firstname=escape($Fname);
    $lastname=escape($LName);
    $username=escape($Uname);
    $email=escape($Email);
    $pass=escape($pass);

    if (email_exist($email))
    {
        return true;
    }
    else if(user_exist($username))
    {
        return  true;
    }
    else
    {
        $password=md5($pass);
        $validation_code=md5($username);
        $sql="INSERT INTO users(FirstName,LastName,UserName,Email,Password,Validation_Code,Active) values('$firstname','$lastname','$username','$email','$password','$validation_code','0')";
        $res=Query($sql);
        confirm($res);
        $subject="active your account";
        $msg="Please click the link below to activate http://localhost/php/form-validation/activate.php?Email=$email&Code=$validation_code";
        // http://form-validation/activate.php/?Email=$email&Code=$validation_code
        $header="From No-Reply admin@onlineittuts.com";
        send_mail($email,$subject,$msg,$header);
        return  true;

    }

}


function activation()
{
    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        $Email = $_GET['Email'];
        $Code = $_GET['Code'];
        $sql = "SELECT * FROM users where Email='.$Email.'AND Validation_Code='$Code'";
        $result = Query($sql);
        confirm($result);
        if (fetch_data($result)) {
            $sqlquery = "UPDATE users set Active='1',Validation_Code='0' where Email='$Email' AND Validation_Code='$Code'";
            $result2 = Query($sqlquery);
            confirm($result2);
            set_messege("<p class='bg-success text-center lead'>Your Account Successfully Registered</p>");
            # code...
            redirect('login.php');
        } else {
            echo "<p class='bg-danger text-center lead'>Your Account not Activated</p>";


        }


        # code...
    }
}



    function login_validate()
    {
        if ($_SERVER['REQUEST_METHOD']=='POST')
        {
            $UserEmail=clean($_POST['umail']);
            $UserPass=clean($_POST['upass']);

            if (empty($UserEmail))
            {
                $errors[]='Please enter your email';
            }

            if (empty($UserPass))
            {
                $errors[]='Please enter your password';
            }
            if (!empty($errors))
            {
                foreach ($errors as $error)
                {
                    echo Error_validation($error);
                }
            }
            else
            {
                if (user_login($UserEmail,$UserPass))
                {
                    redirect('admin.php');

                }
                else
                {
                    echo  Error_validation('please enter correct email or password');
                }
            }


        }

    }

function user_login($Umail,$Upass)
{
    $query="SELECT * FROM users where Email='$Umail' and Active='1'";
    $result=Query($query);
    if ($row=fetch_data($result))
    {
        $db_pass=$row['Password'];
        if (md5($Upass)==$db_pass)
        {
            return true;
        }
        else
        {

            
            return false;
        }

    }
}



?>