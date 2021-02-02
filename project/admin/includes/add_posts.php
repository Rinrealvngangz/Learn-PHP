<?php
   
    if(isset($_POST['create_post']))
    {
       $post_title          = $_POST['post_title'];
       $post_category_id    = $_POST['post_category'];
        $post_author       = $_POST['post_author'];
       $post_status         = $_POST['post_status'];

       $post_image          = $_FILES['image']['name'];
       $post_image_tmp      = $_FILES['image']['tmp_name'];

       $post_tags           = $_POST['post_tags'];
       $post_content        = $_POST['post_content'];
       $post_date           = date('d-m-y');
       $post_comment_count  = 4;

       move_uploaded_file($post_image_tmp, "../images/$post_image");


       $query = "INSERT INTO posts(post_category_id, post_title,post_author , post_date, post_image, 
                    post_content, post_tags, post_comment_count ,post_status) VALUES($post_category_id, 
                    '$post_title', 
                    '$post_author', now(), '$post_image', '$post_content', '$post_tags', '$post_comment_count',
                    '$post_status')";

        $result = mysqli_query($connection, $query);

        confirmQuery($result);
    }
?>
       <form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" name="post_title" class="form-control">
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
        <input type="text" name="post_author" class="form-control">
    </div>
      <div class="form-group">
          <label for="post_title">Post Status</label>
        <input type="text" name="post_status" class="form-control">
    </div>
      <div class="form-group">
          <label for="post_title">Post Image</label>
        <input type="file" name="image" class="form-control">
    </div>
      <div class="form-group">
         <label for="post_title">Post Tags</label>
        <input type="text" name="post_tags" class="form-control">
    </div>
      <div class="form-group">
         <label for="post_title">Post Content</label>
        <input type="text" name="post_content" class="form-control">
     </div>
      <div class="form-group">
        <input type="submit" value="Publish Post" name="create_post" class="btn btn-primary">
    </div>
    </form>


