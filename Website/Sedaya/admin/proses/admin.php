<?php include"../syntax.php";
$proses=$_GET['proses'];
if($proses=='update'){
	$adm_id=$_POST["adm_id"];
	$nama=$_POST["nama"];
	$jk=$_POST['jk'];
	$tmp_lahir=$_POST['tmp_lahir'];
	$tgl_lahir=$_POST['tgl_lahir'];
	$telp=$_POST['telp'];
	$email=$_POST['email'];
	$alamat=$_POST['alamat'];
	$username=$_POST['username'];
	// $pasword=md5($_POST['password']);
	$status=$_POST['status'];
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

                $q = $syntax->view_kon("mstr_admin","adm_id='$adm_id'");
                $r = $q->fetch_array();
                $fotoawal=$r['foto'];
            	$file='../public/img/'.$fotoawal;
            	unlink($file);
                move_uploaded_file($_FILES["foto"]["tmp_name"], "../public/img/" . $filename);
				$cek_proses=$syntax->update("mstr_admin","nama='$nama',jk='$jk',tmp_lahir='$tmp_lahir',tgl_lahir='$tgl_lahir',telp='$telp',email='$email',alamat='$alamat',username='$username',foto='$foto',status='$status'","adm_id='$adm_id'");
				if($cek_proses){
					header('location: ' .base_url('admin/index.php?page=admin'));
				}else{
					echo "eror";
				}
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
                
		$cek_proses=$syntax->update("mstr_admin","nama='$nama',jk='$jk',tmp_lahir='$tmp_lahir',tgl_lahir='$tgl_lahir',telp='$telp',email='$email',alamat='$alamat',username='$username',status='$status'","adm_id='$adm_id'");
		if($cek_proses){
			header('location: ' .base_url('admin/index.php?page=admin'));
		}else{
			echo "eror";
		}
    }
}elseif($proses=='delete'){
	$adm_id=$_GET['adm_id'];
	if ($adm_id !='adm1') {
		$q = $syntax->view_kon("mstr_admin","adm_id='$adm_id'");
		$r = $q->fetch_array();
		$foto=$r['foto'];
		$file="../public/img/$foto";
		if(unlink($file)){
				$cek_proses=$syntax->delete("mstr_admin","adm_id='$adm_id'");
				if($cek_proses){
					header('location: ' .base_url('admin/index.php?page=admin'));
				}else{
					echo "eror";
				}
		}else{
			$cek_proses=$syntax->delete("mstr_admin","adm_id='$adm_id'");
			if($cek_proses){
				header('location: ' .base_url('admin/index.php?page=admin'));
			}else{
				echo "eror";
			}
		}
	}else{
		
  		echo "<script>alert('Admin Utama tidak dapat dihapus')</script>";
  		echo "<script>window.location.href='".base_url('admin/index.php?page=admin')."'</script>";
		// header('location: ' .base_url('admin/index.php?page=admin'));
	}
}elseif($proses=='insert'){
	$data=$syntax->view('mstr_admin ORDER by adm_id desc limit 1');
	foreach ($data as $r){
		$get_id=$r['adm_id'];
	}
	$adm_id=$get_id + 1;
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
            if(file_exists("../public/img/" . $filename)){
                echo $filename . " is already exists.";
            } else{
                move_uploaded_file($_FILES["foto"]["tmp_name"], "../public/img/" . $filename);
				$cek_proses=$syntax->insert("mstr_admin","adm_id,nama,jk,tmp_lahir,tgl_lahir,telp,email,alamat,username,password,status,foto",
				"'$adm_id','$nama','$jk','$tmp_lahir','$tgl_lahir','$telp','$email','$alamat','$username','$pasword','$status','$foto'");
				if($cek_proses){
					header('location: ' .base_url('admin/index.php?page=admin'));
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