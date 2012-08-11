<?php
    $data['title']=$title;
    $this->load->view('header/full_width_header',$data);
?>

<body id="top">
 <div class="wrapper row1">
  <div id="header" class="clear">
    <div class="fl_left">
      
      <h1>Course Management System</h1>
      <p>Admin site</p>

    </div>
  </div>
</div>

 <!-- ####################################################################################################### -->
<div class="wrapper row2">
  <div id="topnav">
    <ul>
      <li><a class="active" href="index.html">Login</a></li>
    </ul>
    <div  class="clear"></div>
  </div>
</div>

 <!-- ####################################################################################################### -->
<div class="wrapper row4">
  <div id="container" class="clear">
   <!-- ####################################################################################################### -->

   <p>Login form is going to be in here.</p>
   
   <!-- ####################################################################################################### -->
    <div class="clear"></div>
  </div>
</div>
 
 <!-- ####################################################################################################### -->
<div class="wrapper row5">
  <div id="footer" class="clear">
    <!-- ####################################################################################################### -->
    <div class="foot_contact">
      <h2>BUET</h2>
      <address>
      Palashi<br />
      Dhaka<br />
      1200
      </address>
      <ul>
        <li><strong>Tel:</strong> 01729192319</li>
        
        <li class="last"><strong>Email:</strong> <a href="#">siddhartha047@gmail.com</a></li>
      </ul>
    </div>

    <div class="footbox">
      <h2>Student Site</h2>
      <ul>
        <li><a href="#">Student Home</a></li>
        <li class="last"><a href="#">Student search</a></li>
      </ul>
    </div>
    
    <div class="footbox last">
      <h2>Teacher Site</h2>
      <ul>
        <li><a href="#">Teacher Home</a></li>
        <li class="last"><a href="#">Teacher search</a></li>
      </ul>
    </div>
    <!-- ####################################################################################################### -->
  </div>
</div>
</body>

<?php $this->load->view('footer/footer');?>