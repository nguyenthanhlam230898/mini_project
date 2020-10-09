<?php
	/**
	 * 
	 */
	class MD_product extends DB
	{
		
		public function getAllData(){
			$sql = "SELECT * FROM product INNER JOIN category ON product.cat_id = category.cat_id ORDER BY prd_id DESC limit 3";
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
			$sql = "SELECT * FROM product WHERE prd_id = '$id'";
			$this->execute($sql);

			if ($this->num_rows()!=0) {
				$data = mysqli_fetch_array($this->result);
			}else{
				$data = 0;

			}
			return $data;
		}

		public function Update($prd_name,$prd_price,$prd_warranty,$prd_accessories,$prd_image,$prd_promotion,$cat_id,$prd_details ,$id){
			$sql = "UPDATE product SET  prd_name = '$prd_name', 
			prd_price = $prd_price, 
			prd_warranty = '$prd_warranty', 
			prd_accessories = '$prd_accessories',
			prd_promotion = '$prd_promotion',
			prd_image = '$prd_image',
			cat_id = $cat_id,
			prd_details = '$prd_details'
			WHERE prd_id = '$id'";

			$result = false;
			if(mysqli_query($this->conn,$sql)){
				$result = true;
			}
			return json_encode($result);
		}


		public function Insert($prd_name,$prd_price,$prd_warranty,$prd_accessories,$prd_image,$prd_promotion,$cat_id,$prd_details){
			$sql = "INSERT INTO product(prd_name,
			prd_price,
			prd_warranty,
			prd_accessories,
			prd_promotion,
			prd_image,
			cat_id,
			prd_details)
			VALUES ('$prd_name',
			'$prd_price',
			'$prd_warranty',
			'$prd_accessories',
			'$prd_promotion',
			'$prd_image',
			'$cat_id',
			'$prd_details')";

			$result = false;
			if(mysqli_query($this->conn,$sql)){
				$result = true;
			}
			return json_encode($result);
		}
		
		public function Delete($id){
			$sql = "DELETE FROM product WHERE prd_id = $id";
			$result = false;
			if(mysqli_query($this->conn,$sql)){
				$result = true;
			}
			return json_encode($result);
		}

	}

	?>