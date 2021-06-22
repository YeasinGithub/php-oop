<?php include "../config/config.php"; ?>
<?php include "../lib/database.php"; ?>
<?php include "../helpers/format.php"; ?>

<?php $db = new Database();
 ?>

<?php include "../lib/Session.php"; 
	Session::checkSession();
?>

<?php 
		if(!isset($_GET['deleteId']) || $_GET['deleteId'] == NULL){
			echo "<script>window.location = 'postlist.php';</script>";
			//header("Location:catlist.php");
		}else{
			$postid = $_GET['deleteId'];

			$query = "select * from tbl_post where id='$postid'";
			$getData = $db->select($query);
			if($getData){
				while($delimg = $getData->fetch_assoc()){
					$delLink = $delimg['image'];
					unlink($delLink);
				}
			}

			$delquery = "delete from tbl_post where id = '$postid'";
			$delData = $db->delete($delquery);
			if($delData){
				echo "<script>alert('Data deleted Successfully');</script>";
				echo "<script>window.location = 'postlist.php';</script>";
			}else{
				echo "<script>alrt('Data not deleted');</script>";
				echo "<script>window.location = 'postlist.php';</script>";
			}
		}
	?>