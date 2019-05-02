<?php include("Components/header.php"); ?>
<title>HOME PAGE</title>
<link rel="stylesheet" href="Asset/css/style.css">

<?php if (isset($_SESSION['success'])) : ?>
    <div class="success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>  
    <div class="content">
        <ul>
            <li>
                <a><img src="Asset/image/avatar"></a>
                <a><img src="Asset/image/bg.png"></a>
            </li>
            <li>
                <a><img src="Asset/image/bg.png"></a>
                <a><img src="Asset/image/avatar"></a>
            </li>
            <li>
                <a><img src="Asset/image/avatar"></a>
                <a><img src="Asset/image/bg.png"></a>
            </li>
            <li>
                <a><img src="Asset/image/bg.png"></a>
                <a><img src="Asset/image/avatar"></a>
            </li>
        </ul>
    </div>

<?php
    include "Components/footer.php"
?>
</body>
</html>
