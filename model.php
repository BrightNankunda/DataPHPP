<?php 
    class Model {
        private $server ="localhost";
        private $username = "root";
        private $password;
        private $db = "credentials";
        private $conn; 

        public function __construct() {
            try {
                $this->conn = new mysqli($this->server, $this->username, $this->password, $this->db);
            } catch(Exception $e) {
                echo "Connection failed".$e->getMessage();
            }
        }
        public function insert() {
            if(isset($_POST['submit'])) {
                if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['address'])) {
                    if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['address'])) {
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $address = $_POST['address'];

                        $query = "INSERT INTO email_data (name, email, address) VALUES ('$name', '$email', '$address')";
                        if($sql = mysqli_query($this->conn, $query)) {
                            header("location: records.php?msg=Record Inserted");
                        } else {
                            header("location: index.php?msg=Email not inserted");
                        };
                    } else {
                        echo "<h1>Some Fields are Empty</h1>";
                    }
                }
            }
        }

        public function delete($id) {
            $query = "DELETE FROM email_data WHERE id = $id";
            if($sql = mysqli_query($this->conn, $query)) {
                header('location: records.php?msg=Record deleted');
            } else {
                header('location: records.php?msg=No such record');
            }
        }

        public function read($id) {
            $data = null;
            $query = "SELECT * FROM email_data WHERE id = $id";
            if($sql = mysqli_query($this->conn, $query)) {
                while($row = mysqli_fetch_assoc($sql)) {
                    $data = $row;
                }
            }
            return $data;
        }

        public function fetch() {
            $data = null;
            $query = "SELECT * FROM email_data";
            if($sql = mysqli_query($this->conn, $query)) {
                while($rows = mysqli_fetch_assoc($sql)) {
                    $data[] = $rows;
                }
            }
            return $data;
        }
        public function update($id) {
            $query = "SELECT * FROM email_data WHERE id=$id";
            if($sql = mysqli_query($this->conn, $query)) {
                while ($row = mysqli_fetch_assoc($sql)) {
                    $data = $row;
                }
                
            }
            return $data;
        }
        public function edit($data) {
            $query = "UPDATE email_data SET name='$data[name]', email='$data[email]', address='$data[address]' WHERE id=$data[id]";
            if($sql = mysqli_query($this->conn, $query)) {
                header('location: records.php?msg=Record Updated');
            }
        }
    }
?>