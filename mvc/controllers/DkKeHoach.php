<?php
class DkKeHoach extends Controller{
    private $userID;

    function __construct() {
        session_start();
        if(isset($_SESSION['id'])){
            $this->userID = $_SESSION['id'];
        }else{
            header("Location: ./login");
            die();
        }
        
    }

    public function Show(){

        if(isset($_POST['mahp'])){
            $this->timKiemHocPhan($_POST['mahp']);      //Tìm kiếm học phần
        }else
        if(isset($_POST['mahpThemKH'])){
            $this->themKehoach($_POST['mahpThemKH']);   //Thêm học phần vào kế hoạch
        }else
        if(isset($_POST['mahpXoaKH'])){
            $this->xoaKeHoach($_POST['mahpXoaKH']);     //Xóa học phần trong kế hoạch
        }else
        {
            $ktht = $this->model("KeHoach")->danhSachKeHoach($this->userID);
            $this->view("dkkehoach", ['kh'=>$ktht, 'id'=>$this->userID]);
        }
    }
    //Tìm kiếm học phần
    public function timKiemHocPhan($mahp){
        $ktht = $this->model("KeHoach")->danhSachKeHoach($this->userID);
        $kq = $this->model("HocPhan")->find($mahp);
        $this->view("dkkehoach", ['kq'=>$kq,'kh'=>$ktht, 'id'=>$this->userID]);
    }
    // Thêm học phần vào kế hoạch
    public function themKehoach($mahp){
        $this->model("KeHoach")->themKeHoach($this->userID, $mahp);
        $ktht = $this->model("KeHoach")->danhSachKeHoach($this->userID);
        $this->view("dkkehoach", ['kh'=>$ktht, 'id'=>$this->userID]);
    }
    //Xóa một học phần trong kế hoạch
    public function xoaKeHoach($mahp){
        $this->model("KeHoach")->xoaKeHoach($this->userID, $mahp);
        $ktht = $this->model("KeHoach")->danhSachKeHoach($this->userID);
        $this->view("dkkehoach", ['kh'=>$ktht, 'id'=>$this->userID]);
    }
}