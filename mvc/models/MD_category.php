<?php
	/**
	 * 
	 */
	class MD_category extends DB
	{
		
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
			if(mysqli_query($this->conn,$sql)){
				$result = true;
			}
			return json_encode($result);
			
		}
		
	}
	?>