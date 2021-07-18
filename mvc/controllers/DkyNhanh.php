<?php
class DkyNhanh extends Controller{
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
    public function show(){
        $this->view('DkyNhanh', []);
    }

    public function getCode(){
        $dsLuu = $this->model("ketqua")->find($this->userID);
        if($dsLuu==[]){
            echo "Chưa có TKB nào được lưu";
        }else{
            $kq = "";
            foreach($dsLuu as $k => $v){
                $kq = $kq.$this->plusCode($v['mahp'],$v['nhom']);
            }
            echo $kq;
        }
    }
    public function plusCode($ma, $nhom){
        $nhom = (int)$nhom;
        if($nhom<10){
            $nhom = "0".$nhom;
        }
        $str = "$.ajax({type: 'POST',url: 'https://qldt.ctu.edu.vn/htql/dkmh/student/index.php?action=dky_mhoc',data:'txtMaMonHoc=".$ma."&hidMaNhom=".$nhom."&hidSoTinChi=1&cboHocKyMain=20213&txtTKB=1&hidMethod=regdetails&hdKey=',xhrFields: {withCredentials: true},});&#32;";
        return $str;
    }
}