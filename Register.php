<?php 
    require_once('config.php');

    class Register
    {
        public $mysqli;
        function __construct()
        {
            $this->mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        }

        function register()
        {
            $user = $_POST['username'];
            $pass = $_POST['password'];
            $nama = $_POST['nama'];

            if(empty($user) || empty($pass) || empty($nama)){
                echo "<script>
                    alert('username, password, or name cannot be empty');
                </script>";
            }else{
                $get_user = "SELECT * FROM user WHERE username = '$user'";
                $result = $this->mysqli->query($get_user);
                $check_user = $result->num_rows();

                if($check_user == 1){
                    echo "<script>
                        alert('username sudah tersedia');
                    </script>";
                }else{
                    $pass = password_hash($pass, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO user (username, password, nama) 
                    VALUES('".$user."', '".$pass."', '".$nama."')";
                    $query = $this->mysqli->prepare($sql) or die($this->mysqli->error);
                    $query->execute();

                    if($query){
                        header("location:loginForm.php");
                    }else{
                        echo "<script>
                            alert('register failed');
                        </script>";
                    }
                }
            }
        }
    }
?>