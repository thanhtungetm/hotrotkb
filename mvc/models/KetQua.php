<?php 
    class KetQua extends DB{
        public function insert($id,$data){
            foreach($data  as $key => $value){
                $query = "INSERT INTO `ketqua` (`id`, `mahp`, `nhom`) VALUES ('$id', '$key', '$value')";
                mysqli_query($this->con,  $query);
            }
        }

        public function delete($id){
                $query = "DELETE FROM ketqua WHERE id='$id'";
                mysqli_query($this->con,  $query);
        }

        public function find($id){
            $query = "SELECT mahp,nhom FROM `ketqua` WHERE id='$id'";
            $ketqua = mysqli_query($this->con,  $query);
            $result = [];
            while($row = mysqli_fetch_assoc($ketqua)){
                // var_dump($row);
                $result[] = $row;
            }
            
            return $result;
        }
    }