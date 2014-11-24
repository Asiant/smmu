    <style type="text/css">
      .post {
        padding: 15px 0px;
        border-bottom: 1px dotted #ccc;
      }

      .widget h3 { display: block; background: #212121; color: #f1f1f1; text-transform: capitalize; border-radius: 5px; margin-bottom: 10px; text-align: center; padding: 5px 0px;}

      .feat-img img { padding: 5px; border: 1px solid #ccc;}

      .post:first-of-type { padding-top: 0px;}
      .widget ul { margin-left: 0px;}
      .widget ul li { list-style: none; font-size: 14px;}
      .widget ul li a { display: block; padding: 5px 0px; color: #888; border-top: 1px dotted #ccc;}
      .widget ul li a:hover { background: #fff; text-decoration: none; padding-left: 5px;}
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

    <div class="container">


        <div class="row">
          
          <div class="span8">
            
            

        <div class="post">
            <div class="row">
                <h3>Submit your Paper/ Abstract for review</h3>
                <form enctype="multipart/form-data" action="paper.php" method="POST">
		<input type="hidden" name="MAX_FILE_SIZE" value="100000" />
		Choose a file to upload: <input name="uploadedfile" type="file" /><br />
		Please provide a suitable title<textarea name="title" row ="1"></textarea>
		<input type="submit" value="Upload File" />
		</form>

           </div><!-- end post row -->

        </div><!-- end post -->

          </div><!-- end main area -->

          <aside class="span4">
            
            <div class="row">
              
              <div class="widget span4">
              <h3>Hi, <?php echo ' '. $user_data['F_name']; ?></h3>

              <p>
               Lorem ipsum incididunt labore proident sit laboris ex ullamco reprehenderit esse consequat deserunt proident Ut proident in velit minim cupidatat in reprehenderit nulla Ut qui dolor dolore sunt dolore aliqua Ut qui.  
              </p>
            </div><!-- end widget -->

            <div class="widget span4">
              <?php include 'widget/right_nav.php'; ?>
            </div><!-- end widget -->

            <div class="widget span4">
              <h3>Widget Title</h3>

              <p>
               <img src="http://lorempixel.com/550/325/nature/5" title="widget image" alt="an image was here" />
              </p>
            </div><!-- end widget -->

            </div><!-- end widget row -->

          </aside> <!-- end sidebar -->

        </div><!-- end row -->

 <hr>
    </div><!-- end container -->


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

 
