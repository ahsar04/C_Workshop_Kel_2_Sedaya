<?php include"../syntax.php";
$proses=$_GET['proses'];
if($proses=='insert'){
	$nama=$_POST["nama"];
	$email=$_POST["email"];
	$kritik_saran=$_POST["kritik_saran"];
	$cek_proses=$syntax->insert("feedback","nama, email, kritik_saran","'$nama', '$email', '$kritik_saran'");
	if($cek_proses){
        echo "<script>alert('Terima kasih atas kritik dan saran anda.')</script>";
        echo "<script>window.location.href='".base_url('')."'</script>";
	}else{
		echo "eror";
	}
}elseif($proses=='delete'){
	$id=$_GET["id"];
	$cek_proses=$syntax->delete("feedback","id=$id");
	if($cek_proses){
        echo "<script>window.location.href='".base_url('admin/index.php?page=feedback')."'</script>";
	}else{
		echo "eror";
	}
}