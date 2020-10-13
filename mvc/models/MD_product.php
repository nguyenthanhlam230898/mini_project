<?php
	/**
	 * 
	 */
	class MD_product extends DB
	{
		
		// Lấy toàn bộ dữ liệu của bảng product
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

		// Lấy dữ liệu chi tiết của product 
		public function getData($id){
			$sql = "SELECT * FROM product WHERE prd_id = '$id'";
			$this->execute($sql);

			if ($this->num_rows()!=0) {
				$data = $this->Data();
			}else{
				$data = 0;

			}
			return $data;
		}

		//Update lại sản phẩm
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

			return $this->execute($sql);
		}

		// Thêm sản Phẩm
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

			
			return $this->execute($sql);
		}
		
		//Delete sản phẩm
		public function Delete($id){
			$sql = "DELETE FROM product WHERE prd_id = $id";
			
			return $this->execute($sql);
		}

	}

	?>