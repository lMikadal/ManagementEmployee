<?php

class Modal {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "project_management_employee";
    private $conn;

    public function __construct(){

        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
          
    }

    public function insert(){

        if (isset($_POST['submit'])){
            if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['tel'])){
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $position = $_POST['position'];
                $tel = $_POST['tel'];

                $query = "INSERT INTO employee (firstname, lastname, tel, position) VALUES ('$fname', '$lname', '$tel', '$position')";
                $sql = $this->conn->exec($query);

                if ($sql){
                    echo "
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>Information successfully</strong> 
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    ";
                }else{
                    echo "
                        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                            <strong>Information have empty!</strong> 
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    ";
                }
            }
        }
    }

    public function addposition(){

        if (isset($_POST['submit'])){
            if (!empty($_POST['position'])){
                $position = $_POST['position'];

                $query = "INSERT INTO position (position) VALUES ('$position')";
                $sql = $this->conn->exec($query);

                if ($sql){
                    echo "
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>add position successfully</strong> 
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    ";
                }else{
                    echo "
                        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                            <strong>position have empty!</strong> 
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    ";
                }
            }
        }
    }
    
    public function fetch(){
        $data = null;

        $query = "SELECT * FROM employee";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $data = $stmt->fetchAll();

        return $data;
    }
    
    public function fetchposition(){
        $data = null;

        $query = "SELECT * FROM position";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $data = $stmt->fetchAll();

        return $data;
    }

    public function view($id){
        $data = null;

        $query = "SELECT employee.id, employee.firstname, employee.lastname, employee.tel, position.id, position.position FROM employee LEFT JOIN position ON employee.position = position.id WHERE employee.id = '$id';";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $data = $stmt->fetch();

        return $data;
    }

    public function edit($id){
        $data = null;

        $query = "SELECT employee.id, employee.firstname, employee.lastname, employee.tel, position.position FROM employee LEFT JOIN position ON employee.position = position.id WHERE employee.id = '$id';";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $data = $stmt->fetch();

        return $data;
    }
    public function update($data){

        $query = "UPDATE employee SET firstname='$data[fname]', lastname='$data[lname]', tel='$data[tel]', position='$data[position]' WHERE id='$data[id]'";
        $stmt = $this->conn->exec($query);

        if ($stmt){
            echo "
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>UPDATE successfully</strong> 
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                
            "; 
        }else{
            echo "
                <div class='alert alert-danager alert-dismissible fade show' role='alert'>
                    <strong>failed UPDATE</strong> 
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
            "; 
        }
    }

    public function del($id){

        $query = "DELETE FROM employee WHERE id = '$id'";
        $stmt = $this->conn->exec($query);

        if ($stmt){
            echo "
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>DELETE successfully</strong> 
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
            "; 
        }else{
            echo "
                <div class='alert alert-danager alert-dismissible fade show' role='alert'>
                    <strong>failed DELETE</strong> 
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
            ";
        }
    }
}


?>