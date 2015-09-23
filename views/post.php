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
				<div id = "date"> 
					<?php echo $post['postdate']; ?>
				</div>
				<div id = "author">
					<?php echo $post['authorlogin']; ?>
				</div>
				</p>
			</div>
		</div>
	<?php endforeach; ?>