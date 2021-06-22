<?php include "inc/header.php"; ?>
<?php include "inc/slider.php"; ?>
		
<div class="content contemplete clear">
	<div class="mainContent templete clear">
	<!------pagination------->
		<?php 
			$per_page = 3;
			if(isset($_GET["page"])){
				$page = $_GET["page"];
			}else{
				$page = 1;
			}
			$start_form = ($page-1)*$per_page;
		?>
	<!------pagination------->
	<?php
		$query = "select * from tbl_post limit $start_form, $per_page";
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
	  <?php } ?><!--while loop close--->
	  
		<!------pagination-------->
		<?php 
			$query = "select * from tbl_post";
			$result = $db->select($query);
			$total_rows = mysqli_num_rows($result);
			$total_pages = ceil($total_rows/$per_page);
			
			echo "<span class='pagination'><a href='index.php?page=1'>".'First Page'."</a>";
			for($i=1; $i<=$total_pages; $i++){
				echo "<a href='index.php?page=".$i."'>".$i."</a>";
			}
			echo "<a href='index.php?page=$total_pages'>".'Last Page'."</a></span>"
		?>
		<!------end pagination-------->
		
	  <?php }else{ header("Location:404.php"); } ?><!---if close--->
	</div>
	<?php include "inc/sidebar.php"; ?>
</div>
<?php include "inc/footer.php"; ?>
	