<?php
session_start();
include 'config.php';
$qnamed=$_SESSION['qname'];
?>
<!DOCTYPE html>
<html>
<!--image dimensions for card: 200px X 150px-->
<!--begin of head-->
<head lang="en">
    <meta charset="UTF-8">
    <meta name="author" content="Varun Bawa">
    <link href="css/materialize.min.css" rel="stylesheet">
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <link id="page_favicon" href="favicon.ico" rel="icon" type="image/x-icon">
    <title>Quiz Display</title>
    <style>
        .quiz_margin{
            margin: 35px 41px 7px 0px;
        }
        .content_margin{
            margin: 0px 0px 0px 11px;
        }
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
        }
    </style>
</head>
<!--end of Head-->

<!-- Begin Body -->
<body>
<!--Begin header-->
    <nav>
        <div class="nav-wrapper">
            <a href="#!" class="brand-logo">Quiz Created</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
            <ul class="right hide-on-med-and-down">
                <li class="active"><a href="index.html">Home</a></li>
                <li><a href="#login" class="modal-trigger">Login</a></li>
                <li><a href="register.html">Register</a></li>
				<li><a href="authtocreate.php">Create A Quiz</a></li>
                <li><a href="about.html">About</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li class="active"><a href="index.html">Home</a></li>
                <li><a href="login.html">Login</a></li>
                <li><a href="register.html">Register</a></li>
                <li><a href="about.html">About</a></li>
            </ul>
        </div>
    </nav>
    <!--end Header-->
<br><br>
<!--Quiz Database Display Block Start-->
<?php
$display = mysql_query("Select * from $qnamed");
$result = $display;
?>
<table class="striped">
        <thead>
          <tr>
              <th>Q.No</th>
              <th>Question</th>
              <th>Option1</th>
			  <th>Option2</th>
			  <th>Option3</th>
			  <th>Option4</th>
			  <th>Answer</th>
          </tr>
        </thead>
<?php 
	 while($row = mysql_fetch_array($result)) 
	 {
?>
         <tbody>
			<tr>
				<th><?php echo $row["q_no"]?></th>
				<th><?php echo $row["question"]?></th>
				<th><?php echo $row["option1"]?></th>
				<th><?php echo $row["option2"]?></th>
				<th><?php echo $row["option3"]?></th>
				<th><?php echo $row["option4"]?></th>
				<th><?php echo $row["answer"]?></th>
			</tr>
		</tbody>
<?php
     }
?>
</table>
<!--Quiz Database Display Block End-->


<!--Question Update Row Start-->
<form method="POST" action="update.php">
    <div class="row">
        <div class="input-field col s1">
          <input id="u_q_no" type="text" class="validate" name="u_q_no">
          <label for="u_q_no">Q No</label>
		</div>
	</div>
	<div class="row">
		<button class="btn waves-effect waves-light" type="submit" name="action">Needs to be Changed/Added
			<i></i>
		</button>
	</div>
</form>
<!--Question Update Row End-->

<!--Upload The Quiz-->
  <div class="row"><a href="upload.php">
	<button class="btn waves-effect waves-light" type="submit" name="action">No Changes, UPLOAD
    <i class="mdi-content-send right"></i>
	</button></a>
  </div>
  
<!--Begin Footer-->
<footer class="page-footer">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">UPES-CSI Student Chapter</h5>
                    <p class="grey-text text-lighten-4">Hello world the content goes in here in rows and columns</p>
                </div>
                <div class="col l4 s12" style="overflow: hidden;">
                    <h5 class="white-text">Connect with us</h5>

                    <a href="https://twitter.com/upescsi" class="twitter-follow-button" data-show-count="true" data-size="large">Follow @upescsi</a>


                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                Developed and Maintained by UPES-CSI Student Chapter  &copy; 2015-2016
                <a class="grey-text text-lighten-4 right" href="http://materializecss.com/" target="_blank">Developed using materializecss</a>
            </div>
        </div>
    </footer>
    <!--end Footer-->
</body>
<!--Begin of Script Section-->
    <script>

        //responsive initialization
        $(".button-collapse").sideNav();

        //Tooltip initialization
        $(document).ready(function(){
            $('.tooltipped').tooltip({delay: 50});
        });

        //Modal Initialization
        $(document).ready(function(){
            // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
            $('.modal-trigger').leanModal();
        });
    </script>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<!--End of Script Section-->
</html>