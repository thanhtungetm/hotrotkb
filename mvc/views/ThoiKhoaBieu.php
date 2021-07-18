<table class="table table-bordered" id="tkb">
    <thead>
        <tr style="background-color:#9dead6">
            <th style="text-align:center">#</th>
            <th style="text-align:center">Thứ 2</th>
            <th style="text-align:center">Thứ 3</th>
            <th style="text-align:center">Thứ 4</th>
            <th style="text-align:center">Thứ 5</th>
            <th style="text-align:center">Thứ 6</th>
            <th style="text-align:center">Thứ 7</th>
        </tr>
    </thead>
    <tbody>
        <?php 
                    $bangTkb = $data['tkb'];
                    if(!$data['ok']){
                        echo "<tr><th colspan=7>Không sắp được vui lòng xem lại!</th></tr>";
                    }else
                    for($i=1; $i<=9; $i++){
                        echo "<tr>";
                        for($j=1;$j<=7;$j++){
                            if($j==1){
                            echo "<th style='text-align:center;background-color:#9dead6'>".$i."</th>";
                            }else
                                if($data['ok']==false){
                                    echo "<td></td>";
                                }else{
                                    if(!empty($bangTkb[$i][$j])){
                                        echo "<td>".$bangTkb[$i][$j]."</td>";
                                    }else{
                                    
                                        echo "<td></td>";
                                }
                            }
                    
                        }
                        echo "</tr>";
                    } ?>

    </tbody>
</table>
<?php
if(!$data['ok']){
    echo "delete";
}
?>
