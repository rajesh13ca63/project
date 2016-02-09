<?php
class ACL {

        var $perms = array();        //Array : Stores the permissions for the user
        var $user_id = 0;            //Integer : Stores the ID of the current user
        var $userRoles = array();    //Array : Stores the roles of the current user
         
    function __constructor($user_id = '') {
        if ($user_id != '')
        {
            $this->user_id = floatval($user_id);
        } else {
            $this->user_id = floatval($_SESSION['user_id']);
        }
        $this->userRoles = $this->getUserRoles('ids');
        $this->buildACL();
    }

    function ACL($user_id = '') {
            $this->__constructor($userID);
    }

    // geting user roles
    function getUserRoles() {
        $sql = "SELECT * 
                FROM user_roles 
                WHERE user_id = " . floatval($this->user_id) . " ORDER BY `addDate` ASC";
        $data = mysqli_query($conn,$sql);
        $resp = array();

        while($row = mysqli_fetch_array($data)) {
            $resp[] = $row['role_id'];
        }
        return $resp;
    } 

    function getAllRoles($format='ids') {
        $format = strtolower($format);
        $sql = "SELECT * 
                FROM roles 
                ORDER BY role_name ASC";
        $data = mysqli_query($conn,$sql);
        $resp = array();

        while($row = mysqli_fetch_array($data)) {
            if ($format == 'full') {
                $resp[] = array("ID" => $row['ID'],"Name" => $row['role_name']);
            } else {
                $resp[] = $row['ID'];
            }
        }
        return $resp;
    }

    function buildACL() {
        //first, get the rules for the user's role
        if (count($this->user_roles) > 0)
        {
            $this->perms = array_merge($this->perms,$this->getRolePerms($this->userRoles));
        }
        //then, get the individual user permissions
        $this->perms = array_merge($this->perms,$this->getUserPerms($this->user_id));
    }

    function getPermKeyFromID($permID) {
        $sql = "SELECT perm_id 
                FROM permissions 
                WHERE perm_id = " . floatval($permID) . " LIMIT 1";
        $data = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($data);
        return $row[0];
    }

    function getPermNameFromID($permID) {
        $sql = "SELECT perm_name 
                FROM permissions 
                WHERE perm_id = " . floatval($permID) . " LIMIT 1";
        $data = mysqli_query($sql);
        $row = mysqli_fetch_array($data);
        return $row[0];
    }

    function getRoleNameFromID($roleID) {
        $sql = "SELECT role_name 
                FROM roles 
                WHERE role_id = " . floatval($roleID) . " LIMIT 1";
        $data = mysqli_query($strSQL);
        $row = mysqli_fetch_array($data);
        return $row[0];
    }

    function getUsername($userID) {
        $sql = "SELECT username 
                FROM users 
                WHERE user_id = " . floatval($userID) . " LIMIT 1";
        $data = mysqli_query($sql);
        $row = mysqli_fetch_array($data);
        return $row[0];
    }

    function getRolePerms($role) {
        if (is_array($role)) {
            $roleSQL = "SELECT * 
                        FROM role_perms
                        WHERE role_id 
                        IN (" . implode(",",$role) . ") ORDER BY `ID` ASC";
        } else {
            $sql = "SELECT * 
                    FROM role_perms 
                    WHERE role_id = " . floatval($role) . " ORDER BY `ID` ASC";
        }

        $data = mysqli_query($sql);
        $perms = array();
        while($row = mysqli_fetch_assoc($data)) {
            $pK = strtolower($this->getPermKeyFromID($row['permID']));
            if ($pK == '') { 
                continue;
            }
            if ($row['value'] === '1') {
                $hP = true;
            } else {
                $hP = false;
            }
            $perms[$pK] = array('perm' => $pK,'inheritted' => true,'value' => $hP,'Name' => $this->getPermNameFromID($row['permID']),'ID' => $row['permID']);
        }
        return $perms;
    }
     
    function getUserPerms($userID) {
        $strSQL = "SELECT * 
                   FROM  user_perms
                   WHERE user_id = " . floatval($userID) . " 
                   ORDER BY addDate ASC";

        $data = mysql_query($strSQL);
        $perms = array();
        while($row = mysql_fetch_assoc($data))
        {
            $pK = strtolower($this->getPermKeyFromID($row['permID']));
            if ($pK == '') { continue; }
            if ($row['value'] == '1') {
                $hP = true;
            } else {
                $hP = false;
            }
            $perms[$pK] = array('perm' => $pK,'inheritted' => false,'value' => $hP,'Name' => $this->getPermNameFromID($row['permID']),'ID' => $row['permID']);
        }
        return $perms;
    }
    function getAllPerms($format='ids') {
        $format = strtolower($format);
        $sql = "SELECT * 
                FROM permissions 
                ORDER BY permName ASC";
        $data = mysqli_query($sql);
        $resp = array();
        while($row = mysqli_fetch_assoc($data))
        {
            if ($format == 'full')
            {
                $resp[$row['permKey']] = array('ID' => $row['ID'], 'Name' => $row['permName'], 'Key' => $row['permKey']);
            } else {
                $resp[] = $row['perm_id'];
            }
        }
        return $resp;
    }

    function userHasRole($roleID) {
            foreach($this->userRoles as $k => $v)
            {
                if (floatval($v) === floatval($roleID))
                {
                    return true;
                }
            }
            return false;
    }
         
    function hasPermission($permKey) {
            $permKey = strtolower($permKey);
            if (array_key_exists($permKey,$this->perms))
            {
                if ($this->perms[$permKey]['value'] === '1' || $this->perms[$permKey]['value'] === true)
                {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
    }
}
?>