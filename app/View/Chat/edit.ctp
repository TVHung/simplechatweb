<body class="bodyedit">
	<form class="edit" action="/cakephp/Chat/edit/<?php echo $feeds['tFeed']['id']; ?>" method="POST">
		<label class="textregist">Name</label><input class="inputregist" type="text" name="name" value="<?php echo $feeds['tFeed']['name']; ?>" readonly><br>
		<label class="textregist">Message</label><input class="inputregist" type="text" name="message" value="<?php echo $feeds['tFeed']['message']; ?>"><br>
		<input id="buttonregist" style="font-size: 20px" type="submit" value="Submit">
	</form>
</body>