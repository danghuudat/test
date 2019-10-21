<?php
include_once('../model/m_user.php');
class C_user{
    public function dangnhap($username,$password){
        $m_user=new M_user();
        $user=$m_user->dangnhap($username,$password);

        if($user==true){

            $_SESSION['user_name']=$user->name;
            $_SESSION['user_id']=$user->ID;
            $_SESSION['role']=$user->role;
            header('location:indexadmin.php');
            if(isset($_SESSION['user_error'])){
                unset($_SESSION['user_error']);
            }
        }
        else{
            $_SESSION['user_error']="Đăng nhập thất bại";
            header("localtion:dangnhap.php");
        }
    }
    public function doimatkhau($password,$id){
        $m_user= new M_user();
        $user=$m_user->doimatkhau($password,$id);

    }
}

?>