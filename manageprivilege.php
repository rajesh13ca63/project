<?php
    require 'dbinfo.php';

//if ($_POST['submit']) {
   //fetching the data from action table 
    $role = $_POST['rolename'];
    $sql = "SELECT id, name 
            FROM action";
    $result =  mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $actionInfo[] = $row;
    }

   
      
    //fetching the data from role_perm table  
    $query = "SELECT role_id, action_id, resource_id 
              FROM role_perm 
              WHERE id = $role";
    $result =  mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
    $role_perm = $row;
    }
      
    //fetching the data from roles table and collect it into user
    $sql = "SELECT role_name 
            FROM roles 
            WHERE id = $role";
    $role_name =  mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_assoc($role_name)) {
        $user = $row['role_name'];
    }
      
    $sql = "SELECT id, resource_name FROM resource";
    $result =  mysqli_query($conn,$sql);
    $resource = mysqli_fetch_assoc($result);

    while ($resource) {

    $outputTable .= '<table class="table" id="res"><td>'.($resource['resource_name']).'</td><td>';
    foreach ($actionInfo as $id) {
       //echo '<br/>----<pre>'; print_r($name); continue;
       $outputTable .='<input type = "checkbox" '.$role .', '. $resource["id"] .', 
                       '.$actionInfo["id"] .')" '. (isset($role_perm[$role.'-'.$resource["id"].
                        '-'.$actionInfo["id"]]) ? ' checked = "checked" ' : '').'/> 
                       '.$actionInfo['name'] ;
    }
        $outputTable .= '</td></tr></table>'; exit;
    } 
//}
?>
   