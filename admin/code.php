<?php  
include('authentication.php');

if(isset($_POST['post-delete-btn'])){
    $post_id = $_POST['post-delete-btn'];

    $check_img_query = "SELECT * FROM posts WHERE id='$post_id' LIMIT 1";
    $img_res = mysqli_query($con, $check_img_query);
    $res_data = mysqli_fetch_array($img_res);
    $img = $res_data = ['image'];

    $query = "DELETE FROM posts WHERE id='$post_id' LIMIT 1";
    $query_run = mysqli_query($con, $query);

    if($query_run){
        if(file_exists('uploads/'.$img)){
            unlink("uploads/".$img);
        }

        $_SESSION['message'] = " Post Deleted Successfully";
        header('Location: post-view.php');
        exit(0);
    }
    else {
        $_SESSION['message'] = "Something went wrong";
        header('Location: post-view.php');
        exit(0);
    }

}



if(isset($_POST['post_update'])) {
    $post_id = $_POST['post_id'];

    $category_id = $_POST['category_id'];
    // $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $string = preg_replace('/[^A-Za-z0-9\-]/', '-',$_POST['slug']); //remove spiceal characters
    $final_string = preg_replace('/-+/','-',$string);
    $slug = $string;

    $small_desc = $_POST['small_desc'];
    $description = $_POST['description'];

    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keyword = $_POST['meta_keyword'];

    $image = $_FILES['image']['name'];
    $old_filename = $POST['old_image'];


    $update_filename = '';
    if($image != NULL){
        //rename this image
        $image_extension = pathinfo($image, PATHINFO_EXTENSION);
        $filename = time().'.'.$image_extension;

        $update_filename = $filename;
    }
    else{
        $update_filename = $old_filename;
    }

    $status = $_POST['status'] == true ? '1' : '0';

    $query = " UPDATE posts SET category_id='$category_id',name='$name', slug ='$slug',small_desc='$small_desc',description='$description',image='$update_filename'
    , meta_title='$meta_title', meta_description='$meta_description',meta_keyword='$meta_keyword', status='$status' WHERE id='$post_id' ";

    $query_run = mysqli_query($con, $query);
    if($query_run){

        if($image != NULL){ 
            if(file_exists('uploads/'.$update_filename)){
                unlink("uploads/".$update_filename);
            }
             move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/'.$update_filename);
        }

        $_SESSION['message'] = " Post Updated Successfully";
        header('Location: post-edit.php?id='.$post_id);
        exit(0);
    }
    else {
        $_SESSION['message'] = "Something went wrong";
        header('Location: post-edit.php?id='.$post_id);
        exit(0);
    }

}

if(isset($_POST['post_add'])){
    $category_id = $_POST['category_id'];
    $user_id=$_POST['user_id'];

    $name = $_POST['name'];
    $string = preg_replace('/[^A-Za-z0-9\-]/', '-',$_POST['slug']); //remove spiceal characters
    $final_string = preg_replace('/-+/','-',$string);
    $slug = $string;

    $small_desc = $_POST['small_desc'];
    $description = $_POST['description'];

    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keyword = $_POST['meta_keyword'];

    $image = $_FILES['image']['name'];
    //rename this image with time 
    $image_extension = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_extension;

    $status = $_POST['status'] == true ? '1' : '0';

    $query = "INSERT INTO posts (category_id,user_id,name,slug,small_desc,description,image,meta_title,meta_description,meta_keyword,status) VALUES 
    ('$category_id','$user_id','$name', '$slug','$small_desc','$description','$filename','$meta_title','$meta_description','$meta_keyword', '$status')";

    $query_run = mysqli_query($con, $query);

    if($query_run){
        move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/'.$filename);
        $_SESSION['message'] = " Post Created Successfully";
        header('Location: post-add.php');
        exit(0);
    }
    else {
        $_SESSION['message'] = "Something went wrong";
        header('Location: post-add.php');
        exit(0);
    }

}








if(isset($_POST['category_update'])) {
    $category_id = $_POST['category_id'];

    $name = $_POST['name'];
    
    $string = preg_replace('/[^A-Za-z0-9\-]/', '-',$_POST['slug']); //remove spiceal characters
    $final_string = preg_replace('/-+/','-',$string);
    $slug = $string;

    $small_desc = $_POST['small_desc'];
    $description = $_POST['description'];


    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keyword = $_POST['meta_keyword'];

    $image = $_FILES['image']['name'];
    $old_filename = $POST['old_image'];


    $update_filename = '';
    if($image != NULL){
        //rename this image
        $image_extension = pathinfo($image, PATHINFO_EXTENSION);
        $filename = time().'.'.$image_extension;

        $update_filename = $filename;
    }
    else{
        $update_filename = $old_filename;
    }

    $status = $_POST['status'] == true ? '1' : '0';

    $query = " UPDATE categories SET name='$name', slug ='$slug', small_desc='$small_desc',description='$description',image='$update_filename',meta_title='$meta_title', meta_description='$meta_description', meta_keyword='$meta_keyword', status='$status' 
    WHERE id='$category_id' ";

    $query_run = mysqli_query($con, $query);
    if($query_run){
        if($image != NULL){ 
            if(file_exists('uploads/'.$update_filename)){
                unlink("uploads/".$update_filename);
            }
             move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/'.$update_filename);
        }
        $_SESSION['message'] = " Category Updated Successfully";
        header('Location: category-edit.php?id='.$category_id);
        exit(0);
    }
    else {
        $_SESSION['message'] = "Something went wrong";
        header('Location: category-edit.php?id='.$category_id);
        exit(0);
    }

}


if(isset($_POST['category_add'])){
    $name = $_POST['name'];
    
    $string = preg_replace('/[^A-Za-z0-9\-]/', '-',$_POST['slug']); //remove spiceal characters
    $final_string = preg_replace('/-+/','-',$string);
    $slug = $string;

    $small_desc = $_POST['small_desc'];
    $description = $_POST['description'];

    $image = $_FILES['image']['name'];
    //rename this image with time 
    $image_extension = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_extension;

    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keyword = $_POST['meta_keyword'];

    $status = $_POST['status'] == true ? '1' : '0';

    $query = "INSERT INTO categories (name,slug,small_desc,description,image,meta_title,meta_description,meta_keyword,status) VALUES ('$name', '$slug','$small_desc','$description','$filename','$meta_title', '$meta_description', '$meta_keyword','$status')";

    $query_run = mysqli_query($con, $query);

    if($query_run){
        move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/'.$filename);
        $_SESSION['message'] = " Category Added Successfully";
        header("Location: category-add.php");
        exit(0);
    }
    else {
        $_SESSION['message'] = "Something went wrong";
        header("Location: category-add.php");
        exit(0);
    }

}



if(isset($_POST['user_delete'])){

    $user_id = $_POST['user_delete'];

    $query = "DELETE FROM admin WHERE id='$user_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run){
        $_SESSION['message'] = "Admin / User deleted successfully";
        header("Location: view-register.php");
        exit(0);
    }
    else{
        $_SESSION['message'] = "Something went wrong";
        header("Location: view-register.php");
        exit(0);
    }

    
}

if(isset($_POST['add_user'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role_as = $_POST['role_as'];
    $status = $_POST['status'] == true ? '1' : '0';

    $query = "INSERT INTO admin (name,email,password,role_as,status) VALUES ('$name','$email','$password', '$role_as', '$status')";
    $query_run = mysqli_query($con, $query);

    if($query_run){
        $_SESSION['message'] = "Admin / User added successfully";
        header("Location: view-register.php");
        exit(0);
    }
    else {
        $_SESSION['message'] = "Something went wrong";
        header("Location: view-register.php");
        exit(0);
    }

}





if(isset($_POST['update_user'])){
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role_as = $_POST['role_as'];
    $status = $_POST['status'] == true ? '1' : '0';

    $query = "UPDATE admin SET name='$name', email='$email', password='$password', role_as='$role_as', status='$status' WHERE id='$user_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run){
        $_SESSION['message'] = "User updated successfully";
        header('Location: view-register.php');
        exit(0);
    }

}


?>