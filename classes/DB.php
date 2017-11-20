<?php 
class DB{
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "inote";

	public $conn;

		//Hàm kết nối
	function connect(){
		$this->conn = mysqli_connect($this->host,$this->user,$this->password,$this->database) or die("Thoi xong");
	}

		//Hàm đóng kết nối
	function close(){
		if($this->conn){
			mysqli_close($this->conn);
		}
	}

		//Ham truy van
	function query($sql){
		if($this->conn){
			mysqli_query($this->conn,$sql);
		}
	}

		//Ham dem dong
	function num_rows($sql){
		if($this->conn){
			$query = mysqli_query($this->conn,$sql);
			$row = mysqli_num_rows($query);
			return $row;
		}
	}

		//Ham lay du lieu
	function fetch_assoc($sql,$type){
		if ($this->conn) {
			$query = mysqli_query($this->conn,$sql);
			if($type==0){
				while($row = mysqli_fetch_assoc($query)){
					$data[] = $row;
				}
				return $data;
			}
			else if ($type==1) {
				$data = mysqli_fetch_assoc($query);
				return $data;
			}
		}
	}

	public function real_escape_string($string) {
        // Nếu đã kết nối
		if ($this->conn)
		{
            // Xử lý chuỗi dữ liệu truy vấn
			$string = mysqli_real_escape_string($this->conn, $string);
		}
        // Ngược lại chưa kết nối
		else
		{
			$string = $string;
		}
		return $string;
	}
	
    // Hàm lấy ID vừa insert
	public function insert_id() {
        // Nếu đã kết nối
		if ($this->cn)
		{
            // Lấy ID vừa insert
			return mysqli_insert_id($this->cn);
		}
	}

}
?>