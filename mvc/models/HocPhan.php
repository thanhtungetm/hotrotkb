<?php 
    class HocPhan extends DB{
        public function insert($data){
        
        }

        public function find($mahp){
            $query = "SELECT tenhp,mahp FROM `hocphan` WHERE mahp='$mahp'";
            $ketqua = mysqli_query($this->con,  $query);
            $result = [];
            while($row = mysqli_fetch_assoc($ketqua)){
                // var_dump($row);
                $result[] = $row;
            }
            
            return $result;
        }
    }