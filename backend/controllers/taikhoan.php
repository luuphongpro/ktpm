<?php 
    include '../models/taikhoan.php';
    $taikhoan=new taikhoan;
    if (isset($_REQUEST['them'])) {
        // Kiểm tra xem 'dataJSON' có tồn tại trong $_POST không
        if (isset($_POST['dataJSON']) && !empty($_POST['dataJSON'])) {
            $data = json_decode($_POST['dataJSON']);
    
            // Kiểm tra $data đã được decode thành công
            if ($data !== null) {
                // Danh sách các trường bắt buộc
                $requiredFields = ['SDT', 'UserName', 'MatKhau', 'DiaChi'];
    
                // Duyệt qua các trường và kiểm tra
                foreach ($requiredFields as $field) {
                    if (!isset($data->$field) || empty($data->$field)) {
                        http_response_code(400); // Mã HTTP 400: Bad Request
                        echo json_encode([
                            'status' => 'error',
                            'message' => "Thiếu trường '$field'."
                        ]);
                        exit; // Dừng xử lý khi phát hiện lỗi
                    }
                }
    
                // Kiểm tra tài khoản
                $result = $taikhoan->timtk($data->SDT);
                if (mysqli_num_rows($result) == 0) {
                    $taikhoan->themtk($data);
                    http_response_code(201); // Mã HTTP 201: Created
                    echo json_encode([
                        'status' => 'success',
                        'message' => 'Tài khoản đã được tạo thành công.'
                    ]);
                } else {
                    http_response_code(409); // Mã HTTP 409: Conflict
                    echo json_encode([
                        'status' => 'error',
                        'message' => 'Tài khoản đã tồn tại.'
                    ]);
                }
            } else {
                http_response_code(400); // Mã HTTP 400: Bad Request
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Dữ liệu JSON không hợp lệ.'
                ]);
            }
        } else {
            http_response_code(400); // Mã HTTP 400: Bad Request
            echo json_encode([
                'status' => 'error',
                'message' => 'Dữ liệu đầu vào trống hoặc không tồn tại.'
            ]);
        }
    }
    
    
    else if(isset($_REQUEST['delete'])){
        $data=$_GET["SDT"];
        $result=$taikhoan->xoatk($data);
        if(mysqli_num_rows($result)>0){
            echo 1;
        }
        else echo 2;
    }
    else if(isset($_REQUEST['tim'])){
        $data=$_REQUEST['user1_register'];
        $status=$_REQUEST['status'];
        $result=$taikhoan->timtk($data);
        if(mysqli_num_rows($result)>0){
            $data=mysqli_fetch_assoc($result);
            $data['status']=$status;
            $data=json_encode($data);
            echo $data;
        }
    }
    else if (isset($_REQUEST['update'])) {
        // Kiểm tra xem 'dataJSON' có tồn tại trong $_POST không
        if (isset($_PUT['dataJSON']) && !empty($_PUT['dataJSON'])) {
            $data = json_decode($_POST['dataJSON']);
    
            // Kiểm tra $data đã được decode thành công
            if ($data !== null) {
                // Danh sách các trường bắt buộc
                $requiredFields = ['SDT', 'UserName', 'MatKhau', 'DiaChi'];
    
                // Duyệt qua các trường và kiểm tra
                foreach ($requiredFields as $field) {
                    if (!isset($data->$field) || empty($data->$field)) {
                        http_response_code(400); // Mã HTTP 400: Bad Request
                        echo json_encode([
                            'status' => 'error',
                            'message' => "Thiếu trường '$field'."
                        ]);
                        exit; // Dừng xử lý khi phát hiện lỗi
                    }
                }
    
                // Gọi phương thức update
                $result = $taikhoan->suatk($data);
    
                // Kiểm tra kết quả trả về từ `suatk`
                if ($result) {
                    http_response_code(200); // Mã HTTP 200: OK
                    echo json_encode([
                        'status' => 'success',
                        'message' => 'Cập nhật tài khoản thành công.'
                    ]);
                } else {
                    http_response_code(500); // Mã HTTP 500: Internal Server Error
                    echo json_encode([
                        'status' => 'error',
                        'message' => 'Lỗi khi cập nhật tài khoản.'
                    ]);
                }
            } else {
                http_response_code(400); // Mã HTTP 400: Bad Request
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Dữ liệu JSON không hợp lệ.'
                ]);
            }
        } else {
            http_response_code(400); // Mã HTTP 400: Bad Request
            echo json_encode([
                'status' => 'error',
                'message' => 'Dữ liệu đầu vào trống hoặc không tồn tại.'
            ]);
        }
    }
    
    else if (isset($_REQUEST['xoa'])) {
        // Kiểm tra xem trường 'SDT' có tồn tại và không rỗng
        if (isset($_REQUEST['SDT']) && !empty($_REQUEST['SDT'])) {
            $data = $_REQUEST['SDT'];
    
            // Gọi phương thức xoatk
            $result = $taikhoan->xoatk($data);
    
            // Kiểm tra kết quả trả về từ xoatk
            if ($result) {
                http_response_code(200); // Mã HTTP 200: OK
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Xóa tài khoản thành công.'
                ]);
            } else {
                http_response_code(500); // Mã HTTP 500: Internal Server Error
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Lỗi khi xóa tài khoản.'
                ]);
            }
        } else {
            http_response_code(400); // Mã HTTP 400: Bad Request
            echo json_encode([
                'status' => 'error',
                'message' => 'Trường SDT không được để trống.'
            ]);
        }
    }
    
    else if(isset($_REQUEST['suaquyen'])){
        $data=$_REQUEST['data'];
        $data=json_decode(json: $data);
        $result=$taikhoan->suaquyen($data);
        echo $result;
    }
    else if(isset($_REQUEST['get'])){
        $data=$_REQUEST['get'];
        if($data==""){
            $result=$taikhoan->dstaikhoan();
            $arraccount=array();
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    $arraccount[]=$row;
                }
            }
            echo json_encode($arraccount);
        }
        else {
            $result=$taikhoan->timtk($data);
            $arraccount=array();
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    $arraccount[]=$row;
                }
            }
            echo json_encode($arraccount);
        }
    }
?>