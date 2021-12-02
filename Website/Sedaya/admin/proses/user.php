<?php include"../syntax.php";
$proses=$_GET['proses'];
if($proses=='update'){
	$usr_id=$_POST["usr_id"];
	$nama=$_POST["nama"];
	$jk=$_POST['jk'];
	$tmp_lahir=$_POST['tmp_lahir'];
	$tgl_lahir=$_POST['tgl_lahir'];
	$telp=$_POST['telp'];
	$email=$_POST['email'];
	$alamat=$_POST['alamat'];
	$username=$_POST['username'];
	// $pasword=md5($_POST['password']);
	// $status=2;
	if(isset($_FILES["foto"]) && $_FILES["foto"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $usr_id."_".$_FILES["foto"]["name"];
        $filetype = $_FILES["foto"]["type"];
        $filesize = $_FILES["foto"]["size"];
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
            	$file='../public/img/user/'.$fotoawal;
            	unlink($file);
                move_uploaded_file($_FILES["foto"]["tmp_name"], "../public/img/user/" . $filename);
				$cek_proses=$syntax->update("mstr_user","nama='$nama',jk='$jk',tmp_lahir='$tmp_lahir',tgl_lahir='$tgl_lahir',telp='$telp',email='$email',alamat='$alamat',username='$username',foto='$foto'","usr_id='$usr_id'");
				if($cek_proses){
					header('location: ' .base_url('admin/index.php?page=user'));
				}else{
					echo "eror";
				}
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
                
		$cek_proses=$syntax->update("mstr_user","nama='$nama',jk='$jk',tmp_lahir='$tmp_lahir',tgl_lahir='$tgl_lahir',telp='$telp',email='$email',alamat='$alamat',username='$username',status='$status'","usr_id='$usr_id'");
		if($cek_proses){
			header('location: ' .base_url('admin/index.php?page=user'));
		}else{
			echo "eror";
		}
    }
}elseif($proses=='delete'){
	$usr_id=$_GET['usr_id'];
	$q = $syntax->view_kon("mstr_user","usr_id='$usr_id'");
    $r = $q->fetch_array();
    $foto=$r['foto'];
    $file="../public/img/user/$foto";
    if(unlink($file)){
			$cek_proses=$syntax->delete("mstr_user","usr_id='$usr_id'");
			if($cek_proses){
				header('location: ' .base_url('admin/index.php?page=user'));
			}else{
				echo "eror";
			}
	}else{
		$cek_proses=$syntax->delete("mstr_user","usr_id='$usr_id'");
		if($cek_proses){
			header('location: ' .base_url('admin/index.php?page=user'));
		}else{
			echo "eror";
		}
	}
}elseif($proses=='insert'){
	$data=$syntax->view('mstr_user ORDER by usr_id desc limit 1');
	foreach ($data as $r){
		$get_id=$r['usr_id'];
	}
	$id=substr($get_id,3);
	$usr_id="usr".$id + 1;
	$nama=$_POST["nama"];
	$jk=$_POST['jk'];
	$tmp_lahir=$_POST['tmp_lahir'];
	$tgl_lahir=$_POST['tgl_lahir'];
	$telp=$_POST['telp'];
	$email=$_POST['email'];
	$alamat=$_POST['alamat'];
	$username=$_POST['username'];
	$pasword=md5($_POST['password']);
	$status=2;
	if(isset($_FILES["foto"]) && $_FILES["foto"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $usr_id."_".$_FILES["foto"]["name"];
        $filetype = $_FILES["foto"]["type"];
        $filesize = $_FILES["foto"]["size"];
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
            if(file_exists("../public/img/user/" . $filename)){
                echo $filename . " is already exists.";
            } else{
                move_uploaded_file($_FILES["foto"]["tmp_name"], "../public/img/user/" . $filename);
				$cek_proses=$syntax->insert("mstr_user","usr_id,nama,jk,tmp_lahir,tgl_lahir,telp,email,alamat,username,password,status,foto",
				"'$usr_id','$nama','$jk','$tmp_lahir','$tgl_lahir','$telp','$email','$alamat','$username','$pasword','$status','$foto'");
				if($cek_proses){
					header('location: ' .base_url('admin/index.php?page=user'));
				}else{
					echo "eror";
				}
            } 
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
        echo "Error: " . $_FILES["foto"]["error"];
    }
}?>