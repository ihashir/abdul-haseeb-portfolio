<?php


$servername = '';
$username =  '';
$password = '';
$database = '';
 
$conn = mysqli_connect($servername, $username, $password, $database);
$namenospace = $_GET['project'];
mysqli_set_charset($conn, 'utf8mb4');
$sql = "SELECT * FROM `projects` WHERE `namenospace` = '$namenospace'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$desc = $row['description'];
$picname = $row['images'];
$picname =unserialize($picname);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo strip_tags($name);?></title>
    <link rel="icon" href="/icon.png">
    <style>
      @font-face {
        font-family: "Amazing Spider Man slant";
        src: url("../../assets/fonts/AmazingSpiderManslant.woff") format("woff");
        font-weight: normal;
        font-style: normal;
        font-display: swap;
      }
      * {
        margin: 0;
        padding: 0;
      }
      body {
        background-color: black;
      }
      .main {
        
        background: url("../../assets/images/project_page2.jpg") no-repeat fixed;
        background-size: contain;
        background-position: right 0;
        
      }
      a {
      font-weight: bold;
    color: #46adff;
    text-decoration: none;
    
      }
      a:hover{
      text-decoration:underline;
      }
      #text_k{
  color: white;
    font-family: arial;
    font-weight:bold;text-decoration:none!important;
  }
      .container {
        display: flex;
        flex-direction: column;
        color: white;
        align-items: center;
        
        /* justify-content: center; */
        text-align: center;
        /* height: 100%; */
        /* padding-top: 70px; */
      }
      .p0 {
        font-size: 52px;
        font-family: "Amazing Spider Man slant";
        font-weight: lighter;
        letter-spacing: 5px;
        margin-top: 70px;
        
      }
      .picsContainer {
        display: flex;
        width: 100%;
        /* height: 250px; */
        justify-content: space-around;
        flex-wrap: wrap;
        margin-bottom: 40px;
        align-items: center;
      }
      img {
        margin-top: 60px;
        border-radius:40px;
        max-width:300px;
      }
      /* .project_pics:hover {
        width: 500px;
      } */
      .p1 {
        font-size: 25px;
        letter-spacing: 2px;
        font-family: Arial, Helvetica, sans-serif;
        width: 90%;
        padding-bottom: 20px;
        word-break: break-word;
      }
      @media only screen and (max-width: 993px) {
        .p0 {
          margin-top: 40px;
          font-size: 40px;
        }
        .project_pics {
          width: 380px;
          height: 210px;
        }
        .p1 {
          font-size: 20px;
          line-height: 30px;
        }
      }
      @media only screen and (max-width: 780px) {
        .main {
          background: url("../../assets/images/project_page.jpg") no-repeat
            right center fixed;
          background-size: contain;
        }
        .picsContainer {
          align-items: center;
          flex-direction: column;
        }
       img {
        width:85%!important;
        
      }
        .p0 {
          font-size: 30px;
          margin-top: 45px;
        }
        .p1 {
          font-size: 18px;

          /* text-justify: inherit; */
        }
        .loading {
          background-size: 65px !important;
        }
      }
    </style>
  </head>
  <body>
     <script>
        window.onload = function() {
  document.getElementsByClassName("gradient")[0].style.opacity = "0";
document.getElementsByClassName("loading")[0].style.opacity = "0";

setTimeout(function(){
document.getElementsByClassName("gradient")[0].style.display = "none";
document.getElementsByClassName("loading")[0].style.display = "none";
},500)
};
    </script>
    <div
      class="gradient"
      style="
        background-image: radial-gradient(#d10000, #680000);
        display: block;
        position: fixed;
        z-index: 1000;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        overflow: hidden;transition:0.5s all
      "
    ></div>

    <div
      class="loading"
      style="
        display: block;
        position: fixed;
        z-index: 1000;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        overflow: hidden;
        background: url('../../assets/images/loader.webp') 50% 50% no-repeat; transition:0.5s all
      "
    ></div>
    <section class="main">
      <div class="container">
        <p class="p0">
          <?php
          echo $name;
          ?>
        </p>
        <div class="picsContainer">
            <?php
            
            foreach ($picname as $pic) {
                $pic =  str_replace("_d.webp",".jpg",$pic);
                echo '<img src="/assets/images/projects_images/'.$pic.'" width="300px"></img>';
              }
            
            ?>
          
        
        </div>
        <p class="p1">
        <?php
          echo $desc;
          ?>
        </p>
      </div>
    </section>
  </body>
</html>

