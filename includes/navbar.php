<style>
/* CUSTOMIZE THE CAROUSEL
    -------------------------------------------------- */
    /* Carousel base class */
    .carousel {
      margin-bottom: 60px;
    }
    .carousel .container {
      position: relative;
      z-index: 9;
    }
    .carousel-control {
      height: 80px;
      margin-top: 0;
      font-size: 120px;
      text-shadow: 0 1px 1px rgba(0,0,0,.4);
      background-color: transparent;
      border: 0;
      z-index: 10;
    }
    .carousel .item {
      height: 500px;
    }
    .carousel img {
      position: absolute;
      top: 0;
      left: 0;
      min-width: 100%;
      height: 500px;
    }
    .carousel-caption {
      background-color: transparent;
      position: static;
      max-width: 550px;
      padding: 0 20px;
      margin-top: 200px;
    }
    .carousel-caption h1,
    .carousel-caption .lead {
      margin: 0;
      line-height: 1.25;
      color: #fff;
      text-shadow: 0 1px 1px rgba(0,0,0,.4);
    }
    .carousel-caption .btn {
      margin-top: 10px;
    }
    #featurette-divider {
       margin:80px;
       border-color:black;  /* Space out the Bootstrap  more */
    }
</style>


<style>#img{ opacity:0.60;} #txt{background-color: rgba(0,0,0,0.1);</style> 

<div class="navbar">
   <div class="navbar-inner">
     <div class="container">
       <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </a>
       <a  class="brand" href="index.php" rel="tooltip" title="Welcome to Society Of Mathematics">Welcome</a>
       <div class="nav-collapse collapse" id="main-menu">
        <ul class="nav" id="main-menu-left">
          <li><a href="#">News</a></li>
          <li><a id="swatch-link" href="#">Gallery</a></li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Events <b class="caret"></b></a>
            <ul class="dropdown-menu" id="swatch-menu">
              <li><a href="../default">Events Page</a></li>
              <li class="divider"></li>
              <li><a href="#">Event1</a></li>
              <li><a href="#">Event2</a></li>
             <li class="divider"></li>
              <li><a href="#">Event3</a></li>
              <li><a href="#">Event4</a></li>
            </ul>
          </li>  
          <li class="dropdown" id="preview-menu">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Announcements <b class="caret"></b></a>
            <ul class="dropdown-menu">
               <li><a target="_blank" href="#">Announcement1</a></li>
               <li><a target="_blank" href="#">Announcement2</a></li>
              <li class="divider"></li>
               <li><a target="_blank" href="#">Announcement3</a></li>
               <li><a target="_blank" href="#">Announcement4</a></li>
            </ul>
          </li>
        </ul>
        <ul class="nav pull-right" id="main-menu-right">
          <li><a rel="tooltip"  title="Become a member" href="signup.php" >Membership </a></li>
          <li class="dropdown">

          <?php 
		        if(logged_in()==true)
            {echo '<a rel=\"tooltip\"  title=\"\" href=\"index.php\" > '. $user_data['username'].'</a>'; } else {include'widget/login.php';}?>
        </a>
        </ul>
       </div>
     </div>
   </div>
 </div>
