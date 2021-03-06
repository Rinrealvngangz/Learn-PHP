
<?php include "includes/db.php"; ?>

<?php include "includes/header.php"; ?>

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

        <!-- /.Navigation -->

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
       
             <?php
                  $query = "SELECT * FROM posts";
                  $search_query = mysqli_query($connection,$query);
                  if(!$search_query){
                     die("ERROR query" . mysqli_error($connection));
                  }
              
                          while ($row = mysqli_fetch_assoc($search_query)) {
                            $post_id = $row['post_id'];
                           $post_title = $row['post_title'];
                           $post_author = $row['post_author'];
                           $post_date = $row['post_date'];
                           $post_image = $row['post_image'];
                           $post_content = substr($row['post_content'],0,100);
                ?>               
            
               
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>      
                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"> <?php  echo $post_title  ?> </a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
               
                <?php }  ?>
    
                 
                
            </div>

            <!-- Blog Sidebar Widgets Column -->
           <?php include "includes/slidebar.php"; ?>      
        </div>
        <!-- /.row -->

        <hr>

<?php include "includes/footer.php"; ?>