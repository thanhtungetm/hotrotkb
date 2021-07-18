<?php 
    class User extends DB{
        
        public function find($user){
            $query = "SELECT id,username,password FROM `user` WHERE username='$user'";
            $ketqua = mysqli_query($this->con,  $query);
            // var_dump($ketqua);
            $result = [];
            while($row = mysqli_fetch_assoc($ketqua)){
                // var_dump($row);
                $result[] = $row;
            }
            
            return $result;
        }
        public function getName($userID){
            $query = "SELECT hoten FROM `user` WHERE id='$userID'";
            $ketqua = mysqli_query($this->con,  $query);
            $result = [];
            while($row = mysqli_fetch_assoc($ketqua)){
                // var_dump($row);
                $result[] = $row;
            }
            
            return $result[0]['hoten'];
        }
    }
?>