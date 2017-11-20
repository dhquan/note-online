<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3 class="text-primary">Danh sách các note</h3>
			<div class="list-group">
				<?php 
				$sql_get_list_note = "SELECT * FROM notes WHERE user_id = '$data_user[id_user]'";
				if($db->num_rows($sql_get_list_note)){
					$data = $db->fetch_assoc($sql_get_list_note,0);
					foreach ($data as $key => $value) {
						$date_created = $value['date_created'];
						$day_created = substr($date_created, 8, 2); // Ngày tạo
                            $month_created = substr($date_created, 5, 2); // Tháng tạo
                            $year_created = substr($date_created, 0, 4); // Năm tạo
                            $hour_created = substr($date_created, 11, 2); // Giờ tạo
                            $min_created = substr($date_created, 14, 2); // Phút tạo
                            echo '
                            <a href="index.php?ac=edit-note&&id='.$value['id_note'].'" class="list-group-item ">
                                <h4 class="list-group-item-heading">'.$value['title'].'</h4>
                                <p class="list-group-item-text">'.$value['body'].'</p>
                                <small> Tạo ngày
                                    '.$day_created.' tháng
                                    '.$month_created.' năm
                                    '.$year_created.' lúc
                                    '.$hour_created.':'.$min_created.'
                                </small>
                             </a>         
                        ';
                    }                                               
                }
                // Ngược lại không có
                else
                {
                    // Hiển thị thông báo
                    echo '
                        <div class="alert alert-info">Hiện tại bạn chưa có note nào.</div>
                    ';
                
					}
				

				?>
			</div>
		</div>
	</div>	

</div>