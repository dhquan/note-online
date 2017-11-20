<?php 
require "core/init.php";
if(!$user){
    header("location:index.php");
}
else{
    if(isset($_POST['submit'])){
        $old_pass = isset($_POST['old_pass'])?$_POST['old_pass']:''; 
        $old_pass = md5($old_pass);
        $new_pass = md5(isset($_POST['new_pass'])?$_POST['new_pass']:''); 
        $re_new_pass = isset($_POST['re_new_pass'])?$_POST['re_new_pass']:''; 
        if($old_pass==$data_user['password']){
            $sql = "UPDATE users SET password = '$new_pass' WHERE id_user = '$data_user[id_user]'";
            $db->query($sql);
        }

    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-primary">Đổi mật khẩu</h3>
            <form method="POST"  id="formChangePass" action="#">
                <div class="form-group">
                    <label for="user_signin">Mật khẩu cũ</label>
                    <input type="password" class="form-control" id="old_pass" name="old_pass">
                </div>
                <div class="form-group">
                    <label for="user_signin">Mật khẩu mới</label>
                    <input type="password" class="form-control" id="new_pass" name="new_pass">
                </div>
                <div class="form-group">
                    <label for="user_signin">Nhập lại mật khẩu mới</label>
                    <input type="password" class="form-control" id="re_new_pass" name="re_new_pass">
                </div>
                <a href="index.php" class="btn btn-default">
                    <span class="glyphicon glyphicon-arrow-left"></span> Trở về
                </a>
                <button class="btn btn-primary" id="submit_change_pass"
                name="submit">
                <span class="glyphicon glyphicon-ok"></span> Thay đổi
            </button>
            <br><br>
            <div class="alert alert-danger hidden"></div>
        </form>
    </div>
</div>
</div>