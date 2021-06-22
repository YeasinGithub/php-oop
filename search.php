<?php include "inc/header.php"; ?>
		
<?php 
	if(!isset($_GET['search']) || $_GET['search'] == NULL){
		header("Location: 404.php");
	} else{
		$search = $_GET['search'];
	}
?>

<div class="content contemplete clear">
	<div class="mainContent templete clear">
	
	<?php
		$query = "SELECT * FROM tbl_post WHERE title LIKE '%$search%' OR body LIKE '%$search%'";
		$post = $db->select($query);
		if($post){
			while($result=$post->fetch_assoc()){
	?>
	
	
	<div class="samePost clear">
		<h2><a href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></h2>
		<h4><?php echo $fm->formatDate($result['date']); ?>, By <a><?php echo $result['author']; ?></a></h4>
		<a href="#"><img src="admin/<?php echo $result['image']; ?>" alt="post image"></a>
		
		<?php echo $fm->textShorten($result['body']); ?>
		
		<div class="readMore clear">
			<a href="post.php?id=<?php echo $result['id']; ?>">read more</a>
		</div>
	  </div>
	
			<?php } }else{ ?>
					<p>Your search query not found</p>
					<?php 	} ?><!---if close--->
	
</div>
	<?php include "inc/sidebar.php"; ?>
</div>
<?php include "inc/footer.php"; ?>