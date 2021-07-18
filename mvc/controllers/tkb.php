<?php
    class TKB extends Controller{
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
            $ds = [];
            $ktht = $this->model("KeHoach")->danhSachKeHoach($this->userID);
            foreach($ktht as $key => $value){
                $ds[$key] = $value;
                $ds[$key]['dsNhom'] = $this->model("HocPhanMo")->danhSachNhom($value['mahp']);
            }
            $this->view("tkb",['id'=>$this->userID, 'ds'=>$ds]);
        }

        public function GetTkb(){

            if(isset($_POST['dsNhom'])&&isset($_POST['dsHP'])){
                $dsNhom = $_POST['dsNhom'];
                $dsHP = $_POST['dsHP'];
                // var_dump($dsNhom);
                $ok = true;
                $bangTkb[9][7] = [  ];      //Mảng 2 chiểu lưu TKB
    
    
                //Lặp qua danh sách các nhóm cố định
                foreach($dsHP as $key => $value){
                    // echo $value;
                    if($dsNhom[$key] != 'Auto'){
                        $layTkbHP = $this->model("HocPhanMo")->layTkbHP($value,$dsNhom[$key]);
                        // var_dump($layTkbHP);
                        foreach($layTkbHP as $k => $val){
                            $bd = (int)$val['tietbd'];
                            $sotiet = (int)$val['sotiet'];
                            $thu = (int)$val['thu'];
    
                            for($i=$bd; $i<$bd+$sotiet; $i++){
                                if(empty($bangTkb[$i][$thu])){
                                    $bangTkb[$i][$thu] = $value;
                                }else{
                                    $ok = false;
                                    // $this->view("ThoiKhoaBieu",['tkb'=>$bangTkb, 'ok'=>$ok]);
                                    // exit();
                                }
                                
                            }
                        }
                    }
                    
                }
    
                $dsAuto=[];
                if($ok){
                    foreach($dsHP as $key => $value){
                        if($dsNhom[$key] == 'Auto'){
                            $dsAuto[$value] = $this->model("HocPhanMo")->danhSachNhom($value);
                        } 
                    }
                }
    
                
                if($dsAuto!=[]){
                    $dsKQ=[];
                    $dem = 0;
                    while($dem<=100){
                        $okAuto = true;
                        $bangTkbNew = $bangTkb;
        
                        foreach($dsAuto as $key=>$value){
                            $keyAuto = array_rand($value);
                            if($this->ktAuto($key, $value[$keyAuto]['kyhieu'],$bangTkbNew)){
                                $dsKQ[$key] = $value[$keyAuto]['kyhieu'];
                            }else{
                                $dem++;
                                $okAuto = false;
                                break;
                            }
                        }
        
                        if($okAuto){
                            $bangTkb = $bangTkbNew;
                            echo json_encode($dsKQ);
                            echo "ok";
                            break;
                        }
                    }
        
                    if($dem>=100){
                        $ok = false;
                    }
                }
    
                $this->view("ThoiKhoaBieu",['tkb'=>$bangTkb, 'ok'=>$ok]);
            }
            
        }

        public function luuTkb(){
            // echo "<pre>";
            // var_dump($_POST['dsKQ']);
            // echo "</pre>";
            $dsSave = $_POST['dsKQ'];
            $dsLuu = $this->model("ketqua")->find($this->userID);
            if(empty($dsLuu)){
                $this->model("ketqua")->insert($this->userID, $dsSave);
                echo "<div class='alert alert-success' role='alert' style=\"margin-top:5px\">";
                echo "Đã lưu thành công!";
                echo "</div>";
            }else{
                $this->model("ketqua")->delete($this->userID);
                $this->model("ketqua")->insert($this->userID, $dsSave);
                echo "<div class='alert alert-warning' role='alert' style=\"margin-top:5px\">";
                echo "Đã cập nhật!";
                echo "</div>";
            }
            
        }

        public function loadTkb(){
            // session_start();
            // echo $_SESSION['id'];
            // $this->userID = $_SESSION['id'];
            $dsLuu = $this->model("ketqua")->find($this->userID);

            $dsKQ = [];
            foreach($dsLuu as $key => $value){
                $dsKQ[$value['mahp']] = $value['nhom'];
            }

            echo json_encode($dsKQ);
            echo "ok";

            $bangTkb[9][7] = [  ];
            foreach($dsLuu as $key => $value){
                    $layTkbHP = $this->model("HocPhanMo")->layTkbHP($value['mahp'],$value['nhom']);
                    foreach($layTkbHP as $k => $val){
                        $bd = (int)$val['tietbd'];
                        $sotiet = (int)$val['sotiet'];
                        $thu = (int)$val['thu'];

                        for($i=$bd; $i<$bd+$sotiet; $i++){
                            $bangTkb[$i][$thu] = $value['mahp'];
                        }
                    }
                
            }
            $this->view("ThoiKhoaBieu",['tkb'=>$bangTkb, 'ok'=>true]);

        }

        public function ktAuto($mahp, $key, &$bangTkb){
            $layTkbHP = $this->model("HocPhanMo")->layTkbHP($mahp,$key);
            // var_dump($layTkbHP);
            foreach($layTkbHP as $k => $val){
                $bd = (int)$val['tietbd'];
                $sotiet = (int)$val['sotiet'];
                $thu = (int)$val['thu'];

                for($i=$bd; $i<$bd+$sotiet; $i++){
                    if(empty($bangTkb[$i][$thu])){
                        $bangTkb[$i][$thu] = $mahp;
                    }else{
                        return false;
                    }
                    
                }
            }
            return true;
        }
    }

?>