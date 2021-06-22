<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
	<?php 
		if(!isset($_GET['editId']) || $_GET['editId'] == NULL){
			echo "<script>window.location = 'postlist.php';</script>";
			//header("Location:catlist.php");
		}else{
			$postid = $_GET['editId'];
		}
	?>

<div class="grid_10">
<div class="box round first grid">
	<h2>Edit Post Form</h2>
<?php 
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$title = mysqli_real_escape_string($db->link, $_POST['title']);
	$cat = mysqli_real_escape_string($db->link, $_POST['cat']);
	$body = mysqli_real_escape_string($db->link, $_POST['body']);
	$tags = mysqli_real_escape_string($db->link, $_POST['tags']);
	$author = mysqli_real_escape_string($db->link, $_POST['author']);

	/******* image ***********/
		$permited  = array('jpg', 'jpeg', 'png', 'gif');
	    $file_name = $_FILES['image']['name'];
	    $file_size = $_FILES['image']['size'];
	    $file_temp = $_FILES['image']['tmp_name'];

	    $div = explode('.', $file_name);
	    $file_ext = strtolower(end($div));
	    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "upload/".$unique_image;
    /******** end image **********/
		
if($title == "" || $cat == "" || $body == "" || $tags == "" || $author == ""){
	  echo "<span class='error'>Field must not be empty!</span>";
	}else{
	if(!empty($file_name)){

	if ($file_size >1048567){
		echo "<span class='error'>Image Size should be less then 1MB!</span>";
    
	} elseif (in_array($file_ext, $permited) === false) {
	echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
    
	} else{
		
		move_uploaded_file($file_temp, $uploaded_image);
		$query ="UPDATE tbl_post
				SET 
				cat = '$cat',
				title = '$title',
				body = '$body',
				image = '$uploaded_image',
				author = '$author',
				tags = '$tags'
				WHERE id='$postid'
		";

		$updated_row = $db->update($query);
		if ($updated_row) {
		 echo "<span class='success'>Post Updated Successfully.
		 </span>";
		}else {
		 echo "<span class='error'>post Not Not Updated!</span>";
			}
		}
}else{
	$query ="UPDATE tbl_post
				SET 
				cat = '$cat',
				title = '$title',
				body = '$body',
				author = '$author',
				tags = '$tags'
				WHERE id='$postid'
		";

		$updated_row = $db->update($query);
		if ($updated_row) {
		 echo "<span class='success'>Post Updated Successfully.
		 </span>";
		}else {
		 echo "<span class='error'>post Not Not Updated!</span>";
			}
	}

  }
}
?>
<!-- End of PHP -->


<!-- html site start -->
<!-- Start add post form -->
	<div class="block"> 
	<?php 
			$query = "select * from tbl_post where id='$postid' order by id desc";
			$getpost = $db->select($query);
			while($resultPost = $getpost->fetch_assoc()){	
		?>

	 <form action="" method="post" enctype="multipart/form-data">
		<table class="form">
			<tr>
				<td>
					<label>Title</label>
				</td>
				<td>
					<input type="text" name="title" value="<?php echo $resultPost['title'] ?>" class="medium" />
				</td>
			</tr>
		 
			<tr>
				<td>
					<label>Category</label>
				</td>
				<td>
					<select id="select" name="cat">
						<option>Select Category</option>
						<?php 
							$query = "select * from tbl_category";
							$category = $db->select($query);
							while($result=$category->fetch_assoc()){ ?>
							<option <?php
								if($resultPost['cat'] == $result['id']) { ?>
									selected="selected"
							<?php } ?>

							 value="<?php echo $result['id']; ?>">
								<?php echo $result['name']; ?>
							</option>
							<?php } ?>
					</select>
				</td>
			</tr>
	   
			<tr>
				<td>
					<label>Upload Image</label>
				</td>
				<td>
					<img src="<?php echo $resultPost['image']; ?>" width="80" height="60">
					<input type="file" name="image" />
				</td>
			</tr>
			<tr>
				<td style="vertical-align: top; padding-top: 9px;">
					<label>Content</label>
				</td>
				<td>
					<textarea class="tinymce" name="body">
						 <?php echo $resultPost['body']; ?>
					</textarea>
				</td>
			</tr>
			<tr>
				<td>
					<label>Tags</label>
				</td>
				<td>
					<input type="text" name="tags" value="<?php echo $resultPost['tags'] ?>" class="medium" />
				</td>
			</tr>
			<tr>
				<td>
					<label>Author</label>
				</td>
				<td>
					<input type="text" name="author" value="<?php echo $resultPost['author'] ?>" class="medium" />
				</td>
			</tr>
			
			<tr>
				<td></td>
				<td>
					<input type="submit" name="submit" Value="Save" />
				</td>
			</tr>
		</table>
		</form>
	<?php } ?>
	</div>
</div>
</div>
		
<!----load tinyMCE------->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function () {
		setupTinyMCE();
		setDatePicker('date-picker');
		$('input[type="checkbox"]').fancybutton();
		$('input[type="radio"]').fancybutton();
	});
</script>
<!----load tinyMCE------->
        
	<?php include 'inc/footer.php'; ?>




