<?php
require("../Database/config.php");
session_start();
$errors = array(); 
if(isset($_POST["addPhoto"]) && isset($_FILES['image'])){
      $name = mysqli_escape_string($_POST["name"]);
      $allTags = mysqli_escape_string($_POST["tag"]);
      $description = mysqli_escape_string($_POST["description"]);

      // Ger user id (dang loi)
      $getUserNameQuery = "SELECT user_id from users WHERE user_name =".$_SESSION['username'];
      $result = mysqli_query($conn,  $getUserNameQuery);
      $row = mysqli_fetch_assoc($result);
      $user_id = $row["user_id"];

      // File handling and insert photo in to db
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
        array_push($errors, "Extension not allowed");
      } else if ($file_size > 2097152) {
        array_push($errors, "File size must be lower than 2MB");
      } else {
         $path = "/var/www/html/Web-assignment/";
         $localPath = $path.$file_name;
         if (is_dir($path)) {
            @mkdir($path, 0777, true);
         }
         move_uploaded_file($file_tmp, $localPath);
         $insertPhotoQuery = "INSERT INTO photos(photo_title, photo_description, user_id, photo_dir) VALUES('$name', '$description', '$user_id', '$localPath')";
         $photo_id = mysqli_insert_id($conn);
            if (mysqli_query($conn, $insertPhotoQuery)) {               
                echo "success";
            } else {
                echo "failed";
                var_dump($user_id);
            }
      }

      // Tag handling
      $tagArray = explode(",", $allTags);
      // check if the tag already exists
      foreach($tagArray as $aTag) {
         $checkTagQuery = "SELECT * FROM tags WHERE 'tag_name'='.$aTag.' LIMIT 1";
         $tagResult = mysqli_query($conn, $checkTagQuery);
         if ($tagResult == 0) {
            $insertTagQuery = "INSERT INTO tags(tag_name) VALUES ('$aTag')";
            mysqli_query($conn, $$insertTagQuery);
            // get the last id inserted
            $tag_id = mysqli_insert_id($conn);
         } else {
            // if found, get it's id
            $tag = mysqli_fetch_assoc($checkTag);
            $tag_id = $tag[0]['id'];
         }
      }

      $insertTagPhotoQuery = "INSERT INTO tag_photo(photo_id, tag_id) VALUES ('.$photo_id.', '.$tag_id.')";
      mysqli_query($conn, $insertTagPhotoQuery);
      
   }
?>