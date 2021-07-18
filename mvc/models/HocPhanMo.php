<?php 
    class HocPhanMo extends DB{
        public function insert($data){
        
        }

        public function find($mahp){
            $query = "SELECT kyhieu FROM `hocphanmo` WHERE mahp='$mahp' GROUP by mahp, kyhieu";
            $ketqua = mysqli_query($this->con,  $query);
            $result = [];
            while($row = mysqli_fetch_array($ketqua)){
                $result[] = $row;
            }
            
            return $result;
        }
        public function danhSachNhom($mahp){
            $query = "SELECT kyhieu FROM `hocphanmo` WHERE mahp='$mahp' GROUP by mahp, kyhieu";
            $ketqua = mysqli_query($this->con,  $query);
            $result = [];
            while($row = mysqli_fetch_assoc($ketqua)){
                $result[] = $row;
            }
            
            return $result;
        }
        public function layTkbHP($mahp, $nhom){
            $query = "SELECT thu,tietbd,sotiet FROM `hocphanmo` WHERE mahp='$mahp' and kyhieu=$nhom";
            $ketqua = mysqli_query($this->con,  $query);
            $result = [];
            while($row = mysqli_fetch_assoc($ketqua)){
                $result[] = $row;
            }
            
            return $result;
        }
    }