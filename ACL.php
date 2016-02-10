 <?php
 require 'dbinfo.php';
class ACL {

        //This is the metho to show the roles 
        public function viewRoles() {
            $query = "SELECT role_name 
                      FROM roles";
            $result = mysqli_query($conn,$query);
            $rol = array();

            while ($row = mysqli_fetch_array($result)) {
                $rol[] = $row['role_name'];
            }

            if ($rol) {
                return $rol;
            }
            return false;
            }
        
        //This is the method to adding roles in roles table in database
        public function addRole($role) {
            $query = "INSERT INTO roles 
                      VALUES('$role')";
            $result = mysqli_query($conn,$query);
            if ($result) {
                return true;
            }
            return false;
        }
        
        //This is the method to deleting roles from roles table 
        public function deleteRole($role) {
            require 'dbinfo.php';
            $query = "DELETE FROM roles 
                      WHERE role_name = '$role'";
            $result = mysqli_query($conn, $query);
            if ($result) {
                return true;
            }
            return false;
        }
       
       //This is the method to show the view operation 
        public function viewOperation() {
            require 'dbinfo.php';
            $query = "SELECT action 
                      FROM action";
            $result = mysqli_query($conn, $query);
            $op = array();
            while ($row = mysqli_fetch_array($result)) {
                $op[] = $row['action'];
            }

            if ($op) {
                return $op;
            }
            return false;
        }
        
        //This is the method to adding operation in to the action table
        public function addOperation($action) {
            require 'dbinfo.php';
            $query = "INSERT INTO action(action) 
                      VALUES('$action')";
            $result = mysqli_query($conn, $query);
            if ($result) {
                return true;
            }
            return false;
        }
        
        //This is the metho to delteing operation from action table 
        public function deleteOperation($action) {
            require 'dbinfo.php';
            $query = "DELETE 
                      FROM action 
                      WHERE action = '$action'";
            $result = mysqli_query($conn,$query);
            if ($result) {
                return true;
            }
            return false;
        }
       
        //This is the method to show resources 
        public function viewResource() {
            require 'dbinfo.php';
            $query = "SELECT name FROM resources";
            $result = mysqli_query($conn,$query);
            $rec = array();
            while ($row = mysqli_fetch_array($result)) {
                $rec[] = $row['name'];
            }

            if ($rec) {
                return $rec;
            }
            return false;
        }
       
        //addResource method is used to add the resource in the database
        public function addResource($name) {
            require 'dbinfo.php';
            $query = "INSERT INTO resources(name) 
                      VALUES('$name')";
            $result = mysqli_query($conn,$query);
            if ($result) {
                return true;
            }
            return false;
        }
        
       //deleteResource method is used to delete the resource from the database 
        public function deleteResource($name) {
            require 'dbinfo.php';
            $query = "DELETE 
                      FROM resources 
                      WHERE name = '$name'";
            $result = mysqli_query($conn,$query);
            if ($result) {
                return true;
            }
            return false;
        }   
    }
?>

