<?php
  if(isset($_GET['p_id']))
    {
       $the_get_post_id =$_GET['p_id'];
      $query = "SELECT * FROM posts WHERE post_id = $the_get_post_id";
       $select_post_by_id = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_post_by_id)) {
                         $post_id = $row['post_id'];
                           $post_title = $row['post_title'];
                           $post_author = $row['post_author'];
                            $post_category_id = $row['post_category_id'];
                           $post_date = $row['post_date'];
                           $post_image = $row['post_image'];
                            $post_content = $row['post_content'];
                             $post_status = $row['post_status'];
                           $post_comment_count = $row['post_comment_count']; 
                            $post_tags = $row['post_tags'];  
}
}
  
    if (isset($_POST['update_post'])) 
    {
       $post_title          =  $_POST['post_title'];
        $post_author        = $_POST['post_author'];
       $post_category_id    = $_POST['post_category'];
       $post_status         =  $_POST['post_status'];
       $post_image          =  $_FILES['image']['name'];
       $post_image_tmp      =  $_FILES['image']['tmp_name'];
       $post_tags           =  $_POST['post_tags'];
       $post_content        =  $_POST['post_content'];
       move_uploaded_file($post_image_tmp, "../images/$post_image");

       if(empty($post_image))
       {
            $query = "SELECT * FROM posts WHERE post_id = $the_get_post_id";
            $select_image = mysqli_query($connection, $query);

            while($row = mysqli_fetch_array($select_image))
            {
                $post_image = $row['post_image'];
            }
       }


       $query = "UPDATE posts SET post_category_id = $post_category_id, post_title = '$post_title', 
                post_author = '$post_author', post_date = now(), post_image = '$post_image', 
                post_content = '$post_content', post_tags = '$post_tags', 
                post_comment_count = $post_comment_count, post_status = '$post_status' 
                WHERE post_id = $the_get_post_id";

        $result = mysqli_query($connection, $query);

        confirmQuery($result);

    }


  ?>

 
  
       <form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input value="<?php echo $post_title; ?>" type="text" name="post_title" class="form-control">
    </div>
       <div class="form-group">  
      <select id="post_category" name="post_category">
          <?php
             $query = "SELECT * FROM categories";
                    $select_all_categoies_query = mysqli_query($connection,$query);
                      confirmQuery($select_all_categoies_query);
                    while ($row = mysqli_fetch_assoc($select_all_categoies_query)) {

                           $cat_title = $row['cat_title'];
                            $cat_id = $row['cat_id'];
                           echo "<option value='{$cat_id}'>{$cat_title}</option>";
                         }

         ?>       
      </select>
    </div>

       <div class="form-group">   
          <label for="post_title">Post Author</label>
        <input value="<?php echo $post_author; ?>" type="text" name="post_author" class="form-control">
    </div>
      <div class="form-group">
          <label for="post_title">Post Status</label>
        <input value="<?php echo $post_status; ?>" type="text" name="post_status" class="form-control">
    </div>
      <div class="form-group">
          <img width="100" src="../images/<?php echo $post_image;?>">
           <input type="file" name="image" class="form-control">
    </div>
      <div class="form-group">
         <label for="post_title">Post Tags</label>
        <input value="<?php echo $post_tags; ?>" type="text" name="post_tags" class="form-control">
    </div>
      <div class="form-group">
         <label for="post_title">Post Content</label>
        <input value="<?php echo $post_content; ?>" type="text" name="post_content" class="form-control">
     </div>
      <div class="form-group">
        <input type="submit" value="Publish Post" name="update_post" class="btn btn-primary">
    </div>
    </form>


