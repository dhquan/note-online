<?php

// Include database, session, general info
require_once 'core/init.php';
// Include header
require_once 'includes/header.php';

// LAYOUT
if($user){
	if(isset($_GET['ac'])){
	$ac = $_GET['ac'];
	if($ac=='create-note'){
		require 'templates/create-note.php';
	}else if($ac=='edit-note'){
		if(isset($_GET['id'])){
			if($_GET['id']!=''){
			$id_note = $_GET['id'];
			$sql = "SELECT * FROM notes WHERE id_note='$id_note' AND user_id='$data_user[id_user]'";

			if($db->num_rows($sql)){
				require "templates/edit_note.php";
			}
			else{
				echo '
				<div class="container">
					<div class="alert alert-danger">
						Note này không tồn tại hoặc không thuộc quyền sở hữu của bạn.
					</div>
				</div>
				';
			}
		}else{
			header("location:index.php");
		}
	}else{
			header("location:index.php");
		}

	}
	else if ($ac == 'change_password')
    {
        // Include template form đổi mật khẩu
        require_once 'templates/change-pass-form.php';
    }
   }else{
   	require_once 'templates/list-note.php';
   }
}else {
	require "templates/signin-up.php";
}

// Include footer
require_once 'includes/footer.php';

?>