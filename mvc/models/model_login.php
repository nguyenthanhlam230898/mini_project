<?php 
    class model_login extends DB{
       
        // function checkLogin($username,$password){
        //     $query = "SELECT * FROM users WHERE username = '".$this->$username."' AND password='".$this->$password."' ";
        // }


        public function login($username, $password){
            $sql = "SELECT * FROM user WHERE user_mail='$username' AND user_pass='$password' ";
            $this->execute($sql);

            if ($this->num_rows()!=0) {
                $data = mysqli_fetch_array($this->result);
            }else{
                $data = 0;

            }
            return $data;
            // return mysqli_query($this->conn,$sql);
        }

        public function register($id,$username, $password,$gmail, $location,$phone){
            // $password = md5($password);
            $req = "INSERT INTO `user`(`user_id`, `username`, `password`, `gmail`, `location`, `phone`) 
                    VALUES ('$id','$username','$password','$gmail','$location','$phone')";   
            
            if(mysqli_query($this->conn,$req)){
                $result = ok;
            }else{
                $result = fail;
            }
            return $result;           
        }
      
    }
?>