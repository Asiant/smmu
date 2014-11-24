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
              <div class="feat-img span2">
               <img src="http://lorempixel.com/350/325/sports/1" title="featured image" alt="an image was here" />
               </div><!-- end featured image -->

          <div class="details span6">
            <h2>Just a Nice Post!</h2>
            <p>
              Lorem ipsum pariatur velit pariatur dolore aliqua voluptate sed Duis dolor ea cillum qui anim consequat quis sunt ex eu culpa veniam nisi nulla non dolor esse sit aliquip irure in amet reprehenderit quis voluptate occaecat in enim Duis.Aliqua voluptate sed Duis dolor ea cillum qui anim consequat quis sunt ex eu culpa veniam nisi nulla non dolor esse sit aliquip irure in amet reprehenderit quis voluptate occaecat in enim Duis. 
            </p>
          </div> <!-- end details -->
          <a class="btn pull-right" href="#">Read More!</a>
          </div><!-- end post row -->

        </div><!-- end post -->

        <div class="post">
            <div class="row">
          <div class="feat-img span2">
              <img src="http://lorempixel.com/350/325/sports/3" title="featured image" alt="an image was here" />
          </div><!-- end featured image -->

          <div class="details span6">
            <h2>Just a Nice Post!</h2>
            <p>
              Lorem ipsum pariatur velit pariatur dolore aliqua voluptate sed Duis dolor ea cillum qui anim consequat quis sunt ex eu culpa veniam nisi nulla non dolor esse sit aliquip irure in amet reprehenderit quis voluptate occaecat in enim Duis.Aliqua voluptate sed Duis dolor ea cillum qui anim consequat quis sunt ex eu culpa veniam nisi nulla non dolor esse sit aliquip irure in amet reprehenderit quis voluptate occaecat in enim Duis. 
            </p>
          </div> <!-- end details -->
          <a class="btn pull-right" href="#">Read More!</a>
          </div><!-- end post row -->

        </div><!-- end post -->

        <div class="post">
            <div class="row">
          <div class="feat-img span2">
              <img src="http://lorempixel.com/350/325/sports/2" title="featured image" alt="an image was here" />
          </div><!-- end featured image -->

          <div class="details span6">
            <h2>Just a Nice Post!</h2>
            <p>
              Lorem ipsum pariatur velit pariatur dolore aliqua voluptate sed Duis dolor ea cillum qui anim consequat quis sunt ex eu culpa veniam nisi nulla non dolor esse sit aliquip irure in amet reprehenderit quis voluptate occaecat in enim Duis.Aliqua voluptate sed Duis dolor ea cillum qui anim consequat quis sunt ex eu culpa veniam nisi nulla non dolor esse sit aliquip irure in amet reprehenderit quis voluptate occaecat in enim Duis. 
            </p>
          </div> <!-- end details -->
          <a class="btn pull-right" href="#">Read More!</a>
          </div><!-- end post row -->

        </div><!-- end post -->

        <div class="post">
            <div class="row">
          <div class="feat-img span2">
              <img src="http://lorempixel.com/350/325/sports/3" title="featured image" alt="an image was here" />
          </div><!-- end featured image -->

          <div class="details span6">
            <h2>Just a Nice Post!</h2>
            <p>
              Lorem ipsum pariatur velit pariatur dolore aliqua voluptate sed Duis dolor ea cillum qui anim consequat quis sunt ex eu culpa veniam nisi nulla non dolor esse sit aliquip irure in amet reprehenderit quis voluptate occaecat in enim Duis.Aliqua voluptate sed Duis dolor ea cillum qui anim consequat quis sunt ex eu culpa veniam nisi nulla non dolor esse sit aliquip irure in amet reprehenderit quis voluptate occaecat in enim Duis. 
            </p>
          </div> <!-- end details -->
          <a class="btn pull-right" href="#">Read More!</a>
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
              <?php include'widget/right_nav.php';?>
            </div><!-- end widget -->

            <div class="widget span4">
              <h3>Recent</h3>

             
               <?php include 'widget/smallarticle.php';?>
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

 
