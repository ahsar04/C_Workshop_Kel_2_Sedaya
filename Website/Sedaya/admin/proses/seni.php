<?php include"../syntax.php";
$proses=$_GET['proses'];
if($proses=='update'){
	$sn_id=$_POST["sn_id"];
	$nama=$_POST["nama"];
	$jk=$_POST['jk'];
	$tmp_lahir=$_POST['tmp_lahir'];
	$tgl_lahir=$_POST['tgl_lahir'];
	$telp=$_POST['telp'];
	$email=$_POST['email'];
	$alamat=$_POST['alamat'];
	$username=md5($_POST['username']);
	$pasword=md5($_POST['password']);
	// $status=2;
	if(isset($_FILES["foto"]) && $_FILES["foto"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filenameReplace = str_replace(' ', '_',$_FILES["foto"]["name"]);
        $filename = date('His').rand(1,999)."_".$filenameReplace;
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

                $q = $syntax->view_kon("mstr_user","sn_id='$sn_id'");
                $r = $q->fetch_array();
                $fotoawal=$r['foto'];
            	$file='../public/img/user/'.$fotoawal;
            	unlink($file);
                move_uploaded_file($_FILES["foto"]["tmp_name"], "../public/img/user/" . $filename);
				$cek_proses=$syntax->update("mstr_user","nama='$nama',jk='$jk',tmp_lahir='$tmp_lahir',tgl_lahir='$tgl_lahir',telp='$telp',email='$email',alamat='$alamat',username='$username',password='$pasword',foto='$foto'","sn_id='$sn_id'");
				if($cek_proses){
					header('location: ' .base_url('admin/index.php?page=user'));
				}else{
					echo "eror";
				}
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
                
		$cek_proses=$syntax->update("mstr_user","nama='$nama',jk='$jk',tmp_lahir='$tmp_lahir',tgl_lahir='$tgl_lahir',telp='$telp',email='$email',alamat='$alamat',username='$username',password='$pasword',status='$status'","sn_id='$sn_id'");
		if($cek_proses){
			header('location: ' .base_url('admin/index.php?page=user'));
		}else{
			echo "eror";
		}
    }
}elseif($proses=='delete'){
	$sn_id=$_GET['sn_id'];
	$q = $syntax->view_kon("seni","sn_id='$sn_id'");
    $r = $q->fetch_array();
    $foto=$r['foto'];
    $file="../public/img/seni/$foto";
    if(unlink($file)){
			$cek_proses=$syntax->delete("seni","sn_id='$sn_id'");
			if($cek_proses){
				header('location: ' .base_url('admin/index.php?page=post-active'));
			}else{
				echo "eror";
			}
	}else{
		$cek_proses=$syntax->delete("seni","sn_id='$sn_id'");
			if($cek_proses){
				header('location: ' .base_url('admin/index.php?page=post-active'));
			}else{
				echo "eror";
			}
	}
}elseif($proses=='insert'){
	$data=$syntax->view('mstr_user ORDER by sn_id desc limit 1');
	foreach ($data as $r){
		$get_id=$r['sn_id'];
	}
	$sn_id=$get_id + 1;
	$nama=$_POST["nama"];
	$jk=$_POST['jk'];
	$tmp_lahir=$_POST['tmp_lahir'];
	$tgl_lahir=$_POST['tgl_lahir'];
	$telp=$_POST['telp'];
	$email=$_POST['email'];
	$alamat=$_POST['alamat'];
	$username=md5($_POST['username']);
	$pasword=md5($_POST['password']);
	$status=2;
	if(isset($_FILES["foto"]) && $_FILES["foto"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filenameReplace = str_replace(' ', '_',$_FILES["foto"]["name"]);
        $filename = date('His').rand(1,999)."_".$filenameReplace;
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
				$cek_proses=$syntax->insert("mstr_user","sn_id,nama,jk,tmp_lahir,tgl_lahir,telp,email,alamat,username,password,status,foto",
				"'$sn_id','$nama','$jk','$tmp_lahir','$tgl_lahir','$telp','$email','$alamat','$username','$pasword','$status','$foto'");
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
}elseif ($proses=='konfirmasi') {
	if (isset($_POST['dec'])) {
		echo $sn_id=$_POST['sn_id'];
		$cek_proses=$syntax->update("seni","status='3'","sn_id='$sn_id'");
		if($cek_proses){
			header('location: ' .base_url('admin/index.php?page=post-pending'));
		}else{
			echo "eror";
		}
	}elseif (isset($_POST['acc'])) {
		echo $sn_id=$_POST['sn_id'];
		$cek_proses=$syntax->update("seni","status='1'","sn_id='$sn_id'");
		if($cek_proses){
			header('location: ' .base_url('admin/index.php?page=post-pending'));
		}else{
			echo "eror";
		}
	}else{
		echo "eror";
	}
}

?>