<?php 
    require_once "config.php";

    class Login{
        public $mysqli;
        function __construct(){
            $this->mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        }

        session_start();

        $this->check_login();

        function check_login()
        {
            if(isset($_POST['login']))
            {
                $username = $_POST['username'];
                $password = $_POST['password'];

                if(empty($user) || empty($pass)){
                    echo "<script>
                        alert('username or password cannot be empty');
                    </script>";
                }else{
                    $sql = "SELECT FROM user WHERE username = '$user'";
                    $result = $this->mysqli->query($sql);
                    $check_user = $result->num_rows();

                    if($check_user == 1){
                        $row = $result->fetch_row();
                        if(password_verify($pass, $row[1])){
                            $_SESSION['username'] = $user;
                            header("location:home.php");
                        }else{
                            echo "<script>
                                alert('username or password is invalid');
                            </script>";
                        }
                    }else{
                        echo "<script>
                            alert('username tidak terdaftar');
                        </script>";
                    }
                }
        }
    }
}
?>