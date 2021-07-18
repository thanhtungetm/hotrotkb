$(document).ready(()=>{
    
    

    
});
function thayDoiNhom(value, mahp){
    // console.log(value,mahp);
    // mahp = '#' + mahp;
    if(value=="No"){
        $('#'+mahp).parent().prop("hidden",true);
    }else{
        $('#'+mahp).parent().prop("hidden",false);
        document.getElementById(mahp).innerHTML = value;
    }
    
}

function sapTKB() { 
    // e.preventDefault();
    var ds = $(".dsNhom option:selected").toArray();
    var hp = $(".dsHP");
    var dsNhom =[];
    var dsHP =[];
    for(var i=0; i<ds.length; i++){
        if(ds[i].text !="No"){
            dsNhom.push(ds[i].text);
            dsHP.push(hp[i].innerHTML);
        }
        
    }
    // console.log(dsNhom);
    // console.log(dsHP);

    $.ajax({
        type: "POST",
        data: {dsHP:dsHP, dsNhom:dsNhom},
        url: "./tkb/gettkb",
        success: function(msg){
            // console.log(msg);
            if(msg==""){
                $('#tkb').html("<p>Không có học phần nào được chọn!</p>");
            }else{
                if(msg.indexOf("delete")!=-1){
                    
                    $('#luuTkb').prop('disabled',true);
                    $('#tkb').html(msg.substring(0,msg.indexOf("delete")));
                }else{
                    if(msg.indexOf("ok")!=-1){
                        dsKQ = JSON.parse(msg.substring(0,msg.indexOf("ok")));
                    
                        // console.log(dsKQ);
                        for (const [key, value] of Object.entries(dsKQ)) {
                            document.getElementById(key).innerHTML = value;
                          }
                        $('#tkb').html(msg.substring(msg.indexOf("ok")+2,msg.length));
                        $('#luuTkb').removeAttr('disabled');

                        // console.log("b");
                    }else{
                        // console.log("a");
                        $('#tkb').html(msg);
                        $('#luuTkb').removeAttr('disabled');
                        // $('#luuTkb').addAttr('disabled');
                    }
                }
                
            }   
        }
    });

}

function luuTKB(){
    var ds = $(".dsKQ");
   
    var dsKQ = new Object();

    for(var i=0; i<ds.length; i++){
        if(ds[i].innerHTML!='No'){
            dsKQ[ds[i].getAttribute('id')] = ds[i].innerHTML;
        }
        
    }
    console.log(dsKQ);
    $.ajax({
        type: "POST",
        data: {dsKQ:dsKQ},
        url: "./tkb/luuTkb",
        success: function(msg){
            $('#ketqua').html(msg);
        }
    });
}

function loadTKB(){
    $.ajax({
        type: "POST",
        url: "./tkb/loadTkb",
        success: function(msg){
            var dsKQ = JSON.parse(msg.substring(0,msg.indexOf("ok")));
                    
            // console.log(dsKQ);
            for (const [key, value] of Object.entries(dsKQ)) {
                document.getElementById(key).innerHTML = value;
              }
            $('#tkb').html(msg.substring(msg.indexOf("ok")+2,msg.length));
        }
    });
}
