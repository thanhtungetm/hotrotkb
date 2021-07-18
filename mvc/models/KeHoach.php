<?php
class KeHoach extends DB{

    public function danhSachKeHoach($userID){
        $query = "SELECT kehoach.mahp,hocphan.tenhp FROM kehoach, hocphan WHERE kehoach.mahp=hocphan.mahp and kehoach.id='$userID'";
        $ketqua = mysqli_query($this->con,  $query);
            $result = [];
            while($row = mysqli_fetch_assoc($ketqua)){
                // var_dump($row);
                $result[] = $row;
            }
            
            return $result;
    }
    //Thêm môt học phần vào kế hoạch
    public function themKeHoach($userID, $mahp){
        $query = "INSERT INTO `kehoach` (`id`, `mahp`) VALUES ('$userID', '$mahp')";
        mysqli_query($this->con, $query);
    }
    //Xóa một học phần trong kế hoạch
    public function xoaKeHoach($userID, $mahp){
        $query = "DELETE FROM `kehoach` WHERE id='$userID' and mahp='$mahp'";
        mysqli_query($this->con, $query);
    }
}