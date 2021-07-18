<?php
    class TraCuu extends Controller{
        public function Show(){                
            $hp = [];
            if(isset($_POST['mahp'])){
                $timhp = $_POST['mahp'];
                $ketqua = $this->model('HocPhan')->find($timhp);
                $hp = $ketqua;
            }
            $this->view('tracuu/tracuu', ['hp'=>$hp]);
        }
    }