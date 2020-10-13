<?php
	/**
	 * 
	 */
	class MD_category extends DB
	{
		
		// Lấy tất cả dữ liệu của bảng category
		public function getAllData(){
			$sql = "SELECT * FROM category ORDER BY cat_id";
			$this->execute($sql);
			if($this->num_rows()==0){
				$data = 0;
			}else{
				while ($datas = $this->Data()) {
					$data[] = $datas;
				}
			}
			return $data;
		}
		public function getData($id){
			$sql = "SELECT * FROM category WHERE cat_id IN (SELECT cat_id FROM product WHERE prd_id = '$id')";
			$this->execute($sql);

			if ($this->num_rows($sql)!=0) {
				$data = mysqli_fetch_array($this->result);
			}else{
				$data = 0;

			}
			return $data;
		}
		public function getDataById($id){
			$sql = "SELECT * FROM category WHERE cat_id = '$id'";
			$this->execute($sql);

			if ($this->num_rows($sql) !=0) {
				$data = mysqli_fetch_array($this->result);
			}else{
				$data = 0;
			}

			return $data;
		}

		public function Update($cat_name,$id){
			$sql = "UPDATE category SET cat_name = '$cat_name' WHERE cat_id = '$id'";

			$result = false;
			if($this->execute($sql)){
				$result = true;
			}
			return $result;
			
		}

		public function Insert($cat_name){
			$sql = "INSERT INTO category(cat_name) VALUES ('$cat_name')";
			$result = false;
			if($this->execute($sql)){
				$result = true;
			}
			return $result;
		}

		public function checkInsert($cat_name){
			$sql = "SELECT cat_name FROM category WHERE cat_name = '$cat_name'";
			$this->execute($sql);
			return $this->num_rows($sql);
		}

		public function Delete($id){
			$sql = "SELECT * FROM product INNER JOIN category ON product.cat_id = category.cat_id WHERE category.cat_id = '$id'";
			$this->execute($sql);
			if ($this->num_rows($sql) == 0) {
				$sql = "DELETE FROM category WHERE cat_id = $id";
				$result = false;
				if(mysqli_query($this->conn,$sql)){
					$result = true;
				}
				return $result;
			}
		}

		
	}
	?>