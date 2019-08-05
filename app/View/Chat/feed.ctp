<body class="bodyfeed">
	<div>
		<form class="formfeed" action="feed" method="POST">
			<label><b>Name</b></label>
				<input class="inputfeed" required="required" type="text" name="name" value="<?php echo $this->Session->read('name')?>" readonly><br>
			<label><b>Message</b></label>
				<input class="inputfeed" required="required" type="text" name="message" value=""><br>
				<input style="font-size: 20px;" type="submit" value="POST">
			<span><a style="color: black" href="/cakephp/User/login/">Logout</a></span>
		</form>
	</div>
</body>

<table style="width:100%">
	<?php foreach($feeds as $feed): ?>
	<tr>
		<td class="tdfeed">
			<?php echo $feed['tFeed']['name']; 
			echo " : ";
			echo $feed['tFeed']['message'];?>	
		</td>
		<td class="tdfeed"><?php echo $feed['tFeed']['create_at'];?></td>
		<td class="tdfeed"><?php echo $feed['tFeed']['update_at'];?></td>
		<?php if($this->Session->read('name') == $feed['tFeed']['name']) { ?>
			<td class="tdfeed"><a href="/cakephp/Chat/delete/<?php echo $feed['tFeed']['id']; ?>">Delete</a></td>
			<td class="tdfeed"><a href="/cakephp/Chat/edit/<?php echo $feed['tFeed']['id']; ?>">Edit</a></td>
		<?php } ?>
	</tr>
	<?php endforeach ?>
</table>
