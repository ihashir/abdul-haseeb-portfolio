<?php
ini_set('memory_limit','512M');
$servername = '';
$username =  '';
$password = '';
$database = '';

$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn){
  die('error occured');
}



if($_SERVER['REQUEST_METHOD'] == 'POST'){
  
    foreach($_FILES['file']['name'] as $key=>$val){
        
               $file_real_name= $val;
        $file=$_FILES['file']['tmp_name'][$key];
// list($width,$height)=getimagesize($file);
//     $nwidth= 768;
//     $nheight=432;
//     $newimage=imagecreatetruecolor($nwidth,$nheight);
    if($_FILES['file']['type'][$key]=='image/jpeg'){
        $source=imagecreatefromjpeg($file);
        // imagecopyresized($newimage,$source,0,0,0,0,$nwidth,$nheight,$width,$height);
        $rn = rand(100000,999999);
        $file_name=$rn . '.jpg';
        $imgResized = imagescale($source , 1200);

        imagejpeg($imgResized,'./images/projects_images/'.$file_name );
        
 
  $imgResized = imagescale($source , 500);
  imagejpeg($imgResized, './images/projects_images_500_width/'.$rn . '-500.jpg');
        }
else if($_FILES['file']['type'][$key]=='image/png'){
        $source=imagecreatefrompng($file);
        // imagecopyresized($newimage,$source,0,0,0,0,$nwidth,$nheight,$width,$height);
        $rn = rand(100000,999999);
        $file_name=$rn . '.png';
        $imgResized = imagescale($source , 1200);
  imagejpeg($imgResized, './images/projects_images/'.$file_name);
         $imgResized = imagescale($source , 500);
  imagejpeg($imgResized, './images/projects_images_500_width/'.$rn . '-500.png');
        }
        
       

$file_names[] = $file_name;
}

$picname = serialize($file_names);
        
        
  
  
  $title = $_POST['title'];
  $title = strip_tags($title, "<i>");
//   $hidden = $_POST['hidden'];
$namenospace = $title;
$namenospace = strip_tags($namenospace);
$namenospace = str_replace(" ", "", $namenospace);
$namenospace = strtolower($namenospace);

  
  $desc = $_POST['desc'];
  $desc = strip_tags($desc, "<b>, <a>, <u>, <i>, <br>, <strong>");
//   $dnlink = $_POST['dnlink'];
//   $cat = $_POST['select'];
//   $datee = date("Y-m-d")."T".date("h:i:s")."+00:00";



  
  

  
  
  
  mysqli_set_charset($conn, 'utf8mb4');


  $sql = "INSERT INTO `projects` (`name`,`namenospace`, `images`, `description`) VALUES ('$title','$namenospace', '$picname', '$desc')";

  $result = mysqli_query($conn, $sql);
  echo var_dump($result);
  echo "Project uploaded successfuly";
  
  try{
 unlink("../my-works/cached-index.html");
}
catch(Exception $e){
echo "error somewhere huhhh contect 672";
}
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   
    <title>Upload</title>
</head>

<body>
  
    <h2 class="text-center mt-2">Upload Project </h2>

    <div class="container">
        <form action="?" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Project Title</label>
                <input type="text" name="title" class="form-control" id="title" aria-describedby="title">
                <small id="title" class="form-text text-muted">Note : The title will automatically converted to
                    uppercase !</small>
            </div>
            <div class="form-group">
                <label for="desc">Project description</label>
                <textarea class="form-control" id="desc" name="desc"></textarea>
            </div>
           
            
                <div class="form-group">
                    <label for="fileToUpload">Mod Image (ONLY 5 IMAGES CAN BE UPLOAD)</label>
                    <input type="file" name="file[]" id="fileToUpload" class="form-control-file" multiple>
                    <small id="title" class="form-text text-muted">Note : You can upload multiple images here (MAX 5 IMAGES)</small>
                </div>
            

            <input onclick="chngDesc()" type="submit" value="Upload" name="upload" class="btn btn-primary mt-3">
        </form>
    </div>



    <script>
    function chngDesc(){
    var title = document.getElementById("title")
newTitle = title.value.toUpperCase().replaceAll("K", "<i id='text_k'>K</i>")
newTitle = newTitle.replaceAll("'","\\'")
document.getElementById("title").value = newTitle

var desc = document.getElementById("desc")
newDesc = desc.value.replaceAll("'","\\'")

document.getElementById("desc").value = newDesc

    }
    </script>

</body>

</html>
