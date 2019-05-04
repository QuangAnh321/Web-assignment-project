<?php 
    include("Components/header.php"); 
    require("Database/config.php");

    // Get id
    $photo_id = mysqli_real_escape_string($conn, $_GET["id"]);

    // Query statement
    $getPhotoquery = "SELECT * FROM photos WHERE photo_id='".$photo_id."'";
    $getTagQuery = "SELECT tag_name FROM tags INNER JOIN tag_photo ON tags.tag_id = tag_photo.tag_id WHERE photo_id ='".$photo_id."'";
    $getPhotoAuthorQuery = "SELECT user_name from users INNER JOIN photos ON users.user_id = photos.user_id WHERE photo_id='".$photo_id."'";
    // Get result
    $getPhotoResult = mysqli_query($conn, $getPhotoquery);
    $getTagQueryResult = mysqli_query($conn, $getTagQuery);
    $getAuthorQueryResult = mysqli_query($conn, $getPhotoAuthorQuery);
    // Fetch data
    $photo = mysqli_fetch_assoc($getPhotoResult);
    $tags = mysqli_fetch_all($getTagQueryResult, MYSQLI_ASSOC);
    $author = mysqli_fetch_assoc($getAuthorQueryResult);
    // var_dump($posts);

    // Free result
    mysqli_free_result($photo);
    mysqli_free_result($tags);
    mysqli_free_result($author);

    // Close connection
    mysqli_close($conn);

?>
<title>Single Photo</title>
<link rel="stylesheet" href="Asset/css/style.css">

    <div class="contentSingle">
        <img src="<?php echo $photo["photo_dir"]; ?>">
        <br>
        <h3 style="display:inline"><?php echo $photo["photo_title"]; ?></h3>
        <br>
        <h4 style="display:inline">By <?php echo $author["user_name"]; ?></h4>
        <br>
        <p style="display:inline"><?php echo $photo["photo_description"]; ?></p>
        <br>
        <h5 style="display:inline">Tag: <?php foreach($tags as $tag):
                echo $tag["tag_name"].", ";
                endforeach; ?>
        </h5>
    </div>

<?php
    include "Components/footer.php"
?>
</body>
</html>
