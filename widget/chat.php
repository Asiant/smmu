<?php $_SESSION['user']=(isset($_GET['user'])=== true) ? (int)$_GET['user'] : 0; ?>
<style>
.chat .message{
	border: 3px solid #ooo;
	width: 250px;
	height: 210px;
	padding: 10px;
	overflow-y: scroll;
}
.chat .entry{
	width: 260px;
	height: 40px;
	padding: 5px;
	margin-top: 5px;
	font: 1em Arial;
}

.chat .message a{
color: slategrey;
}
.chat .message p{
margin: 5px 0;
}
</style>
<div class="chat">

	<textarea class="entry" placeholder="Type here and hit return. Use Shift + Return for a new line"></textarea>
</div>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="../js/chat.js"></script>
