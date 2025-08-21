 <?php
require 'connection.php';
if(isset($_POST["submit"])){
  $name = $_POST["name"];
  if($_FILES["image"]["error"] == 4){
    echo
    "<script> alert('Image Does Not Exist'); </script>"
    ;
  }
  else{
    $fileName = $_FILES["image"]["name"];
    $fileSize = $_FILES["image"]["size"];
    $tmpName = $_FILES["image"]["tmp_name"];

    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $fileName);
    $imageExtension = strtolower(end($imageExtension));
    if ( !in_array($imageExtension, $validImageExtension) ){
      echo
      "
      <script>
        alert('Invalid Image Extension');
      </script>
      ";
    }
    else if($fileSize > 1000000){
      echo
      "
      <script>
        alert('Image Size Is Too Large');
      </script>
      ";
    }
    else{
      $newImageName = uniqid();
      $newImageName .= '.' . $imageExtension;

      move_uploaded_file($tmpName, 'img/' . $newImageName);
      $query = "INSERT INTO tb_upload VALUES('', '$name', '$newImageName')";
      mysqli_query($conn, $query);
      echo
      "
      <script>
        alert('Successfully Added');
        document.location.href = 'data.php';
      </script>
      ";
    }
  }
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="index.css">
    <title>Nine27Pharmacy</title>
</head>
<body>
    <!-- navbar -->
    <nav>
        <div class="logo">
            <img src="./image/logop.png" alt="Logo" class="logo-img">
            <h2>Nine27Pharmacy</h2>
        </div>
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#medicine">Medicine</a></li>
            <li><a href="#Prescription">Prescription</a></li>
            <li><a href="#">Announcements</a></li>
            <li><a href="#">FAQs</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>
    <!-- end -->
    
    <!-- home page-->
    <div class="home" id="home">
        <div class="box1">
            <h1>Nine27 Pharmacy</h1>
            <p>Your health is our priority </p>
            <button class="btn1">Download APK</button>  
        </div>
        <div class="picture"></div>
    </div>
    <!-- end -->

    <!-- Medicine -->
    <div class="medicine" id="medicine">
        <div class="text">
            <h1>Medicine Information</h1>
            <div class="inp">
           <input type="search" placeholder="What do you want?" id="myinput"onfocus="this.placeholder=''" onblur="this.placeholder='What do you want?'" >
                <i class="fa fa-search"></i>
            </div>
        </div>
        <div class="cotainer">
            <div class="products">
                <img src="./image/down arrow.webp">
                <h4>arrow</h4>
                <h2>kupal</h2>
                <span>$ 10</span>
            </div>
            <div class="products">
                <img src="2.webp">
                <h4>bossing</h4>
                <h2>musta buhay</h2>
                <span>$ 20</span>
            </div>
            <div class="products">
                <img src="3.webp">
                <h4>qpal kaba</h4>
                <h2>kurakupal</h2>
                <span>$ 30</span>
            </div>
            <div class="products">
                <img src="4.webp">
                <h4>asan ang sabaw</h4>
                <h2>magkani</h2>
                <span>$ 10</span>
            </div>
            <div class="products">
                <img src="3.webp">
                <h4>hotdog</h4>
                <h2>main</h2>
                <span>$ 30</span>
            </div>
            <div class="products">
                <img src="4.webp">
                <h4>tabe mainit</h4>
                <h2>gagagaghah</h2>
                <span>$ 10</span>
            </div>
           
        </div>
    </div>
    <!-- end -->
     
    <!-- Prescription -->
     <div class="Prescription" id="Prescription">
            <div class="text2">
                <h1>Online Prescription Form</h1>
                <div class="faq">
                    <h1>Frequently Asked <br> Question</h1>
                </div>
            </div>
        <div class="container2">   
            <form class="inputs" action="" method="post" autocomplete="off" enctype="multipart/form-data">
                <div class="input">
                    <label for="name">Patient Name: : </label><br>
                        <input type="text" name="name" id = "name" required value=""> 
                </div>
                <div class="input">
                    <label for="name">Email Address: : </label><br>
                        <input type="text" name="name" id = "name" required value=""> 
                </div>
                <div class="btn0">
                    <div class="file-upload-wrapper">
                        <button class="file-upload-button">Upload File</button>
                        <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png">
                    </div>
                    <div class="btn">
                        <button type = "submit" name = "submit">Submit</button>
                    </div>
                </div>
            </form>
            <div class="faq1">

                
            </div>
        </div> 
    </div>

    
     <!-- end -->
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="web.js"></script>
</body>
</html>
