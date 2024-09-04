<?php
if(isset($_POST['update'])){ 
    include('connection.php');
    
    $title = $_POST['title'];
    $about  = $_POST['about'];
    $image     = $_POST['image'];
    $price  = $_POST['price']; 

    $sql = "UPDATE movies SET title='$title', about='$about', image='$image', price='$price'
            WHERE title ='$title'"; // Assuming fname is the column to match for updating

    $result = mysqli_query($conn, $sql);

    // If successfully updated.
    if($result){     
        echo "<script type='text/javascript'>alert(' ".$title.", Movie details are successfully updated');window.location.href = 'adminpage.html';</script>";

      
        echo "<BR>";
    }
} else {
    echo "ERROR";
}
?>
