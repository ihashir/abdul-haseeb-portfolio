<?php
include('cache/top_cache.php');
?>
<!DOCTYPE html>
<html style="overflow:hidden;" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="/icon.png">
    <title>My Works</title>
    <style>
      @font-face {
        font-family: "mightyspidey";
        src: url("../assets/fonts/mightyspidey.woff") format("woff");
        font-weight: 500;
        font-style: normal;
        font-display: swap;
      }
      @font-face {
        font-family: "Amazing Spider Man slant";
        src: url("../assets/fonts/AmazingSpiderManslant.woff") format("woff");
        font-weight: normal;
        font-style: normal;
        font-display: swap;
      }
      a {
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        text-decoration: none;
      }
      * {
        margin: 0;
        padding: 0;
      }
    
  #text_k{
  color: white;
    font-family: arial;
    font-weight:bold;text-decoration:none!important;
  }
      body {
        background-color: #e30522;
        height: 100vh;
      }
      /* .main {
        background: url(../assets/images/my_projects_bg.png) no-repeat;
        background-position: 60% 0;
        background-size: 300px;
        height: 100vh;
      } */
      #p1 {
        font-family: "mightyspidey";
        font-size: 40px;
        line-height: 43px;
        color: white;
        margin-right: 30px;
        padding-left: 8vw;
        padding-top: 35px;
        /* border: 1px solid black; */
        margin-right: 0;
      }
      .container {
        display: flex;
        flex-direction: column;
        /* padding-right: 30px; */
        /* padding-left: 30px; */
        /* padding-top: 35px; */
      }
      .upperDiv {
        display: flex;
      }

      .main_works_div {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
      }
      .project_main_div {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-direction: column;
        width: 350px;
        height: 270px;
        border-radius: 40px;
        background-color: #0a71fc;
        margin-bottom: 30px;
        text-align: center;
        padding-bottom: 30px;
        /* padding-top: 10px; */
        overflow: hidden;
        transition: all 0.3s;
        color: white;
        font-family: "Amazing Spider Man slant";
      }
      .project_main_div:hover {
        background-color: white;
        color: #0a71fc;
        /* width: 320px; */
      }

      .project_main_div p {
        font-family: "Amazing Spider Man slant";
        font-size: 30px;
        /* color: white; */
        padding-top: 20px;
        letter-spacing: 3px;
      }
      .projects_img {
        margin-top: 40px;
        width: 250px;
        height: 150px;
        border-radius: 40px;
        
        background-size: cover;
      }
      @media only screen and (max-width: 925px) {
        #p1 {
          font-size: 30px;
          padding-bottom: 30px;
        }
      }
      @media only screen and (max-width: 776px) {
        img {
          display: none;
        }
        #p1 {
          font-size: 22px;
          padding-bottom: 30px;
          line-height: 30px;
          text-align: center;
          padding-left: 0;
          text-shadow: 3px 3px black;
        }
        .upperDiv {
          align-items: center;
          flex-direction: column;
        }
        .project_main_div {
          width: 80%;
          max-width: 350px;
          height: 230px;
        }
        .projects_img {
          background-position: center;
        }
        .main {
          background: url("../assets/images/my_projects_bg.png") no-repeat fixed;

          background-position: center 0;
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
document.getElementsByTagName("html")[0].style.overflow = "auto";
},300)
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
        background: url('../assets/images/loader.webp') 50% 50% no-repeat;transition:0.5s all
      "
    ></div>

    <section class="main">
      <div class="container">
        <div class="upperDiv">
          <p id="p1">
            HERE ARE <br />MY<br />
            PREVIOUS<br />
            PROJECTS/<br />
            WORKS
          </p>
          <img
            height="360px"
            src="../assets/images/my_projects_bg.png"
            alt=""
          />
        </div>
        <div class="main_works_div">
        <?php

$servername = '';
$username =  '';
$password = '';
$database = '';

$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn){
  die('error occured');
}

$sql = "SELECT * FROM `projects` order by Id desc";
$result = mysqli_query($conn, $sql);
// $array = (array) $result;
// echo var_dump($result);
while($row = mysqli_fetch_assoc($result)){
    
    $title = $row['name'];
    $namenospace =  $row['namenospace'];
    // $desc = $row['description'];

    // $picname = $row['images'];
   
        $picname = $row['images'];
        // echo $picname;
        $picname = unserialize($picname);
        $picname = $picname[0];
        $ex = substr($picname,-4);
        $picname = str_replace($ex,'-500'.$ex,$picname);

   
    
echo  '<a class="project_main_div" href="/my-works/page?project='.$namenospace.'">
<p>'.$title.'</p>
<div  style="background-image: url(/assets/images/projects_images_500_width/'.$picname.');" class="projects_img"></div>
</a>';
}
?>


          

         
        </div>
      </div>
    </section>
    <script>document.querySelectorAll(".project_main_div").forEach(e=>{e.addEventListener("click",e=>{setTimeout(function(){document.getElementsByClassName("gradient")[0].style.opacity="1",document.getElementsByClassName("loading")[0].style.opacity="1",document.getElementsByClassName("gradient")[0].style.display="block",document.getElementsByClassName("loading")[0].style.display="block"},300),setTimeout(function(){document.getElementsByClassName("gradient")[0].style.display="none",document.getElementsByClassName("loading")[0].style.display="none"},3e3)})});</script>
  </body>
</html>
<?php
include('cache/bottom_cache.php');
?>
