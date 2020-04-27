

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="cities.js"></script>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="intro">
      <h1 >covid-19 tracker</h1>
    <div class="in">
      <form method="post" > <br>
        Enter your state:
        <select onchange="print_city('state', this.selectedIndex);" id="sts" name ="stt" class="form-control" required></select><br><br><br>Enter your city:
<select id ="state" class="form-control" name="pinA" required></select>
<script language="javascript">print_state("sts");</script>
        <br><br><br>
        <input type="submit" name="sub_pin"  class="sub">
      </form>
    </div>
    <br><br><br>
    <?php
      $f=1;
      $str="";
      if (isset($_POST["sub_pin"])){
        $pinCode=$_POST["pinA"];
        $str=ucfirst($pinCode);
        $myfile = fopen("hotspot.txt", "r")or die("Unable to open file!");
        $full=strval(fread($myfile,filesize("hotspot.txt")));
        $str=strval($str);
        $str=trim($str);
        $f= strpos($full,$str);
        fclose($myfile);
    ?><div class="iframe">

          <iframe height="50%" width=50% src="https://maps.google.com/maps?q=<?php echo $pinCode; ?>&output=embed"></iframe>
    </div>
        <?php
      }
    ?>
    <?php
    if ($f!=0) {
      if ($str!="") {
      ?>
      <div class="redZ">
        <?php echo $str?> is a hotspot.Stay safe and follow the instructions at <a href="index.html">home</a>.
      </div>
      <?php
    }
  }
    else {
      if ($str!="") {
      ?>
      <div class="greenZ"> <?php
      echo strpos($full,$str);echo $str;?> is not a hotspot.Stay safe.
      </div>

      <?php
    }
    }
     ?>
     <br><br><br>

     </div>

     <a href="index.html"> <button type="button" name="button" class="fixedB">Back</button></a>
  </body>
</html>
