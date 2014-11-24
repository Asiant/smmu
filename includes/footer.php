<footer id="footer" style="background-color: rgba(0,0,0,0.05);">
<table><tr><td><img class="manipal" src="img/mu.png"></td><td>
        <p class="pull-right"><a href="#top">Back to top</a></p>
        <div class="links">
          <a href="#" class="blog">Blog</a>
          <a href="https://www.facebook.com/SocietyOfMathematicsManipalUniversity">Facebook</a>
        </div>
        Made by <a href="#" class="rohan" >Rohan Kumar</a>. Contact him <a href="mailto:rohankmr.kumar@gmail.com">Inbox Him</a>.<br/>
        Powered by <a href="#" class="bootstrap">Bootstrap</a>.Web fonts from <a href="http://www.google.com/webfonts">Google</a>. </p></td></tr></table>
      </footer>

<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootswatch.js"></script>
<script src="js/bootbox.min.js"></script>
    <script>
        $(document).on("click", ".rohan", function(e) {
            bootbox.alert("I'm Rohan Kumar, a student of MIT,Manipal and a freelance web developer", function() {
                console.log("Alert Callback");
            });
        });
       $(document).on("click", ".brand", function(e) {
            bootbox.alert("Welcome to Society of Mathematics, Manipal University.", function() {
                console.log("Alert Callback");
            });
        });
       $(document).on("click", ".blog", function(e) {
            bootbox.alert("Coming up soon :)", function() {
                console.log("Alert Callback");
            });
        });
       $(document).on("click", ".bootstrap", function(e) {
            bootbox.alert("Bootstrap is a web framework by Twitter.", function() {
                console.log("Alert Callback");
            });
        });
       $(document).on("click", ".manipal", function(e) {
            bootbox.alert("Society Of Mathematics is officially sponsered by Manipal.", function() {
                console.log("Alert Callback");
            });
        });
       $(document).on("click", ".gallery", function(e) {
            bootbox.alert("Coming Soon", function() {
                console.log("Alert Callback");
            });
        });
       $(document).on("click", ".learn", function(e) {
            bootbox.alert("Check out the FB page linked in the footer", function() {
                console.log("Alert Callback");
            });
        });

    </script>
