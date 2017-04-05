<?php if($_SESSION["sessionUser"] != 'Guest'){ ?>
	<script>
		function addComment() {
			if(document.getElementById("input").value == "")
			{
				return;
			}
			var comment = document.getElementById("input").value;
			//This regular expression removes html tags from the user input
			comment = comment.replace(/<(?:.|\n)*?>/gm, '');
			var name = document.getElementById("displayName").innerHTML;
			var d = new Date();
			var date = (d.getMonth() + 1)+ "/" + d.getDate();
			document.getElementById("comments").innerHTML += "\"" + comment +"\" - <strong>" + name + "</strong> on " + date +"<br/><br/>";
			document.getElementById("input").value = "";
		}
	</script>

	<div class="comment-box rounded">
	
		<div class="title-box">
			<h4>Comments</h4>
		</div>
		
		<div class="comment-section">
			<p id="comments"></p>
		</div>
		
		<form class="form-inline" role="form">
		
			<div class="form-group">
				<input id="input" class="form-control" type="text" placeholder="Your Comments" />
			</div>
			
			<div class="form-group">
				<input type="button" value="Add Comment" onclick="addComment()" />
			</div>
			
		</form>
	</div>
<?php }else { ?>
	<br/>
	<p style="text-align: center"> <small>[You must log in to leave a comment] </small></p>
<?php } ?>
