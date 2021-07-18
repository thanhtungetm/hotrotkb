const hk ="";

let maMH = "";
let nhom ="";
let soTC ="";

let formData = "txtMaMonHoc=TC002&hidMaNhom=04&hidSoTinChi=1&cboHocKyMain=20213&txtTKB=1&hidMethod=regdetails&hdKey=";

let formData = "txtMaMonHoc=ML019&hidMaNhom=20&hidSoTinChi=2&cboHocKyMain=20213&txtTKB=1&hidMethod=regdetails&hdKey=";
$.ajax(
    { 
      type: "POST",
      url: "https://qldt.ctu.edu.vn/htql/dkmh/student/index.php?action=dky_mhoc",
      data: "txtMaMonHoc=TC002&hidMaNhom=04&hidSoTinChi=1&cboHocKyMain=20213&txtTKB=1&hidMethod=regdetails&hdKey=",
      xhrFields: {
           withCredentials: true
      },
    }
);
$.ajax(
    { 
      type: "POST",
      url: "https://qldt.ctu.edu.vn/htql/dkmh/student/index.php?action=dky_mhoc",
      data: "txtMaMonHoc=ML019&hidMaNhom=23&hidSoTinChi=2&cboHocKyMain=20213&txtTKB=1&hidMethod=regdetails&hdKey=",
      xhrFields: {
           withCredentials: true
      },
    }
);
// $.ajax(
//     { 
//       type: "POST",
//       url: "https://qldt.ctu.edu.vn/htql/dkmh/student/index.php?action=dky_mhoc",
//       data: formData,
//       xhrFields: {
//            withCredentials: true
//       },
//     }
// );
// //Xoa hoc phan da dang ky
// let dataDel = "txtMaMonHoc=%7EML019&hidMaNhom=%7E20&hidSoTinChi=%7E2&cboHocKyMain=20213&txtTKB=&hidMethod=delct&hdKey=";
// $.ajax(
//     { 
//       type: "POST",
//       url: "https://qldt.ctu.edu.vn/htql/dkmh/student/index.php?action=dky_mhoc",
//       data: dataDel,
//       xhrFields: {
//            withCredentials: true
//       },
//     }
// );