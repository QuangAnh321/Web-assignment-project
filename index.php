<?php 
    include("Components/header.php"); 
    require("Database/config.php");

    // Query statement
    $query ="SELECT * FROM photos";

    // Get result
    $result = mysqli_query($conn, $query);

    // Fetch data
    $photos = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // var_dump($posts);

    // Free result
    mysqli_free_result($photos);

    // Close connection
    mysqli_close($conn);

?>
<title>HOME PAGE</title>
<link rel="stylesheet" href="Asset/css/style.css">

    <div class="content">
        <?php foreach($photos as $photo) : ?>
            <ul>
                <li>
                    <a href="singlePhoto.php?id=<?php echo $photo["photo_id"] ?>">
                        <img src="<?php echo $photo["photo_dir"]; ?>">
                    </a>
                </li>
            </ul>
        <?php endforeach; ?>
    </div>

<?php
    include "Components/footer.php"
?>
</body>
</html>
