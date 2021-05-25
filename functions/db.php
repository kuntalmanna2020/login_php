<?php
$conn=mysqli_connect('localhost','root','','userdb');
//if(!$conn)
//{
//    echo "not connected";
//}

function escape($string)
{
    global $conn;
    return mysqli_real_escape_string($conn,$string);
}

function Query($query)
{
    global $conn;
    return mysqli_query($conn,$query);
}

function confirm($res)
{
    global $conn;
    if (!$res)
    {
        die('query failed'.mysqli_error($conn));
    }
}

function fetch_data($result)
{
//    global $conn;
    return mysqli_fetch_assoc($result);
}

function row_count($count)
{
//    global $conn;
    return mysqli_num_rows($count);
}



?>