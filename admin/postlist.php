<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="2%">No</th>
							<th width="5%">Cat</th>
							<th width="17%">Title</th>
							<th width="20%">Body</th>
							<th width="10%">Image</th>
							<th width="10%">Author</th>
							<th width="5%">Tags</th>
							<th width="20%">Date</th>
							<th width="10%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$query = "SELECT tbl_post.*, tbl_category.name FROM tbl_post INNER JOIN tbl_category ON tbl_post.cat = tbl_category.id ORDER By tbl_post.title DESC";
							$post = $db->select($query);
							if($post){
									$i=0;
								while($result = $post->fetch_assoc())
								{
									$i++;
								
						 ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['cat']; ?></td>
							<td>
								<a href="editpost.php?editId=<?php echo $result['id']; ?>">
								<?php echo $result['title']; ?></a>
							</td>
							<td><?php echo $fm->textShorten($result['body'],50); ?></td>
							<td><img src="<?php echo $result['image']; ?>" height="40px" width="60px"></td>
							<td><?php echo $result['author']; ?></td>
							<td><?php echo $result['tags']; ?></td>
							<td><?php echo $fm->textShorten($result['date']); ?></td>
							<td>
								<a href="editpost.php?editId=<?php echo $result['id']; ?>">Edit</a>
									|
								<a onclick="return confirm('Are you sure to Delete?');"  href="deletepost.php?deleteId=<?php echo $result['id']; ?>">Delete</a>
							</td>
						</tr>
						<?php } } ?>
					</tbody>
				</table>
	
               </div>
            </div>
        </div>
        
		
	<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
    </script>
 <?php include 'inc/footer.php'; ?>
