<?php
require_once("../admin/syntax.php");
	header('Content-Type: aplication/json');
	$get_id=substr("$_SERVER[REQUEST_URI]",23);
	$usr_id=$get_id;

		if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filenameReplace = str_replace(' ', '_',$_FILES["image"]["name"]);
        $filename = date('His').rand(1,999)."_".$filenameReplace;
        $filetype = $_FILES["image"]["type"];
        $filesize = $_FILES["image"]["size"];
		$foto=$filename;
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it

                $q = $syntax->view_kon("mstr_user","usr_id='$usr_id'");
                $r = $q->fetch_array();
                $fotoawal=$r['foto'];
            	$file='../admin/public/img/user/'.$fotoawal;
            	unlink($file);
                move_uploaded_file($_FILES["image"]["tmp_name"], "../admin/public/img/user/" . $filename);
				$cek_proses=$syntax->update("mstr_user", "foto='$foto'", "usr_id='$usr_id'");		
				if($cek_proses){
					$cek_login = $syntax->view_kon("mstr_user","usr_id='$usr_id'");
					// $num = mysqli_num_rows($cek_login);
					$row = $cek_login->fetch_array();
						echo json_encode(array('code'=>'200',
							'message'=>'Berhasil',
							'data'=>$row
       				 ));
				}else{
					http_response_code(404);
					echo json_encode(array( 
						'ok'=>false,
						'error_code'=>404,
						'Description'=>'Gagal'
					));
				}
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    }

?>