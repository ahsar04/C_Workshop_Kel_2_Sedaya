 <?php
date_default_timezone_set('Asia/Jakarta');
	class syntax {
		public function __construct(){
			$host = "localhost";
			$user = "root";
			$pass = "";
			$db = "sedaya";
			$this->db = new mysqli($host,$user,$pass,$db); 
		}

		public function view($tabel){
			return $this->db->query("select * from $tabel");
		}
	
		public function view_kon($tabel, $kondisi){
			return $this->db->query("select * from $tabel where $kondisi");
		}
		
		public function insert($tabel, $kolom, $values){
			return $this->db->query("insert into $tabel($kolom) values($values)");
		}

		public function update($tabel, $value, $kondisi){
			return $this->db->query("update $tabel set $value where $kondisi");
		}

		public function delete($tabel, $kondisi){
			return $this->db->query("delete from $tabel where $kondisi");
		}
	}

	function base_url($url){
		$base_url = 'http://localhost/Sedaya/'.$url;
		return $base_url;
	}

	$syntax = new syntax();
?>