<?php
   
    if(isset($_POST['create_post']))
    {
       $post_title          = $_POST['post_title'];
       $post_category_id    = $_POST['post_category_id'];
      
       $post_status         = $_POST['post_status'];

       $post_image          = $_FILES['image']['name'];
       $post_image_tmp      = $_FILES['image']['tmp_name'];

       $post_tags           = $_POST['post_tags'];
       $post_content        = $_POST['post_content'];
       $post_date           = date('d-m-y');
       $post_comment_count  = 4;

       move_uploaded_file($post_image_tmp, "../images/$post_image");


?>