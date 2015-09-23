	<?php foreach ($posts as $post) : ?>
		<div class = "posts">
			<div class = "posttitle">
				<p><?php echo $post['title']; ?></p>
			</div>
			<div class = "posttextpreview">
				<p><?php echo $post['textpreview']; ?></p>
			</div>
			<div class = "postsignature">
				<p>
					<?php echo $post['postdate']; ?>&nbsp;<?php echo $post['authorlogin']; ?> 
				</p>
			</div>
		</div>
	<?php endforeach; ?>