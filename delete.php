<?php
include('connection.php');
$u_id = $_GET['id'];

if (isset($_GET['confirm'])) {
    $query = mysqli_query($connection, "DELETE FROM user WHERE id = '$u_id'");
    if ($query == 1) {
        echo '<script>alert("User Delete Successfully");window.location.href="http://localhost/crud/show.php"</script>';
    } else {
        echo '<script>alert("User Delete Failed");window.location.href="http://localhost/crud/show.php"</script>';
    }
} else {
    echo '<script>
        if (confirm("Are you sure you want to delete this user?")) {
            window.location.href = "http://localhost/crud/delete.php?id=' . $u_id . '&confirm=1";
        } else {
            window.location.href = "http://localhost/crud/show.php";
        }
    </script>';
}
?>
