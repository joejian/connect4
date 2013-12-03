<!DOCTYPE html>

<html>
	<head>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="<?= base_url() ?>/js/jquery.timers.js"></script>
	<script src="<?= base_url() ?>/js/connect4.js"></script>
	<link href="<?php echo base_url();?>css/connect4.css" rel="stylesheet" type="text/css" />
	<script>

		var otherUser = "<?= $otherUser->login ?>";
		var user = "<?= $user->login ?>";
		var status = "<?= $status ?>";
		
		var turn;
		var pastrow = 1;
		
		var redPlayer = "<?= $otherUser->login ?>";
		var blackPlayer = "<?= $user->login ?>";
		var whosFirst = "<?= $otherUser->login ?>";
		
		$(function(){
			$('body').everyTime(500,function(){
					if (status == 'waiting') {
						$.getJSON('<?= base_url() ?>arcade/checkInvitation',function(data, text, jqXHR){
								if (data && data.status=='rejected') {
									alert("Sorry, your invitation to play was declined!");
									window.location.href = '<?= base_url() ?>arcade/index';
								}
								if (data && data.status=='accepted') {
									status = 'playing';
									$('#status').html('Playing ' + otherUser);
									var burl = "<?= base_url() ?>board/postBoard";
									$.post(burl, { 'player': user, 'row': '-1' });
									redPlayer = "<?= $user->login ?>";
									blackPlayer = "<?= $otherUser->login ?>";
									whosFirst = "<?= $user->login ?>";
									document.formo.texter.value = redPlayer + "'s turn.";
								}
								
						});
					}
					var url = "<?= base_url() ?>board/getMsg";
					$.getJSON(url, function (data,text,jqXHR){
						if (data && data.status=='success') {
							var conversation = $('[name=conversation]').val();
							var msg = data.message;
							if (msg.length > 0)
								$('[name=conversation]').val(conversation + "\n" + otherUser + ": " + msg);
						}
					});
					
					$.getJSON('<?= base_url() ?>board/getBoard', function (data, text, jqXHR){
						if (data && data.status=='success'){
							var board = data.board;
							//$('[name=conversation]').val(board);
							//alert(board);
							//var conversation = $('[name=conversation]').val();
							//$('[name=conversation]').val(conversation + "\n" +  "Client: " + board);
							turn = board[1];
							test(parseInt(board[0]), board[1]);
						} else {
						//$('[name=conversation]').val("dog");
							//alert("bad");
						}
						
						//if (data && data.status
					});
			});

			$('form').submit(function(){
				var arguments = $(this).serialize();
				var url = "<?= base_url() ?>board/postMsg";
				$.post(url,arguments, function (data,textStatus,jqXHR){
						var conversation = $('[name=conversation]').val();
						var msg = $('[name=msg]').val();
						$('[name=conversation]').val(conversation + "\n" + user + ": " + msg);
						});
				return false;

				});
				
		});
		
		function test(r, p) {
		    if (r != -1 && p == user) {
			updateIt(r);
			var burl = "<?= base_url() ?>board/postBoard";
			$.post(burl, { 'player': user, 'row': '-1' });
		    }

		}
		
		function postRow(r) {
		    while(pastrow == 0) {}
			var burl = "<?= base_url() ?>board/postBoard";
			$.post(burl, { 'player': otherUser, 'row': r });
		}
		
		redSpot.src = "<?= base_url() ?>assets/fillred.gif";
		blackSpot.src = "<?= base_url() ?>assets/fillblack.gif";
		emptySpot.src = "<?= base_url() ?>assets/fillempty.gif";
		emptyChecker.src = "<?= base_url() ?>assets/clearness.gif";
		redChecker.src = "<?= base_url() ?>assets/redchecker.gif";
		blackChecker.src = "<?= base_url() ?>assets/blackchecker.gif";
		
		
		function postWinner(c) {
		    var s;
		    if (c == 'red') {
			s = 2;
		    } else {
			s = 3;
		    }
		    var surl = "<?= base_url() ?>board/postStatus";
		    $.post(surl, { 'status' : s });
		}
		
	</script>

	
	</head> 
	
<body OnLoad="newMatchUp()">  
	<h1>Game Area</h1>

	<div>
	Hello <?= $user->fullName() ?>  <?= anchor('account/logout','(Logout)') ?>  
	</div>
	
	<div id='status'> 
	<?php 
		if ($status == "playing")
			echo "Playing " . $otherUser->login;
		else
			echo "Waiting on " . $otherUser->login;
	?>
	</div>
	
<?php 
	
	echo form_textarea('conversation');
	
	echo form_open();
	echo form_input('msg');
	echo form_submit('Send','Send');
	echo form_close();
	
?>

<br>
<form name="formo">
Turn: <table cellspacing="1" cellpadding="1" border="1">
<input type="text" name="texter" size="20"></td>
<tr>
<td><a href="javascript:void dropIt(0)" onMouseOver="placeTop(0); setMsg(''); return true" onMouseOut="unPlaceTop(0)"><img border="0" src="clearness.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(1)" onMouseOver="placeTop(1); setMsg(''); return true" onMouseOut="unPlaceTop(1)"><img border="0" src="clearness.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(2)" onMouseOver="placeTop(2); setMsg(''); return true" onMouseOut="unPlaceTop(2)"><img border="0" src="clearness.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(3)" onMouseOver="placeTop(3); setMsg(''); return true" onMouseOut="unPlaceTop(3)"><img border="0" src="clearness.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(4)" onMouseOver="placeTop(4); setMsg(''); return true" onMouseOut="unPlaceTop(4)"><img border="0" src="clearness.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(5)" onMouseOver="placeTop(5); setMsg(''); return true" onMouseOut="unPlaceTop(5)"><img border="0" src="clearness.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(6)" onMouseOver="placeTop(6); setMsg(''); return true" onMouseOut="unPlaceTop(6)"><img border="0" src="clearness.gif" hei ght="50" width="50"></a></td>
</tr>
<tr>
<td><a href="javascript:void dropIt(0)" onMouseOver="placeTop(0); setMsg(''); return true" onMouseOut="unPlaceTop(0)"><img border="0" src="fillempty.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(1)" onMouseOver="placeTop(1); setMsg(''); return true" onMouseOut="unPlaceTop(1)"><img border="0" src="fillempty.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(2)" onMouseOver="placeTop(2); setMsg(''); return true" onMouseOut="unPlaceTop(2)"><img border="0" src="fillempty.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(3)" onMouseOver="placeTop(3); setMsg(''); return true" onMouseOut="unPlaceTop(3)"><img border="0" src="fillempty.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(4)" onMouseOver="placeTop(4); setMsg(''); return true" onMouseOut="unPlaceTop(4)"><img border="0" src="fillempty.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(5)" onMouseOver="placeTop(5); setMsg(''); return true" onMouseOut="unPlaceTop(5)"><img border="0" src="fillempty.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(6)" onMouseOver="placeTop(6); setMsg(''); return true" onMouseOut="unPlaceTop(6)"><img border="0" src="fillempty.gif" height="50" width="50"></a></td>
</tr>
<tr>
<td><a href="javascript:void dropIt(0)" onMouseOver="placeTop(0); setMsg(''); return true" onMouseOut="unPlaceTop(0)"><img border="0" src="fillempty.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(1)" onMouseOver="placeTop(1); setMsg(''); return true" onMouseOut="unPlaceTop(1)"><img border="0" src="fillempty.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(2)" onMouseOver="placeTop(2); setMsg(''); return true" onMouseOut="unPlaceTop(2)"><img border="0" src="fillempty.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(3)" onMouseOver="placeTop(3); setMsg(''); return true" onMouseOut="unPlaceTop(3)"><img border="0" src="fillempty.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(4)" onMouseOver="placeTop(4); setMsg(''); return true" onMouseOut="unPlaceTop(4)"><img border="0" src="fillempty.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(5)" onMouseOver="placeTop(5); setMsg(''); return true" onMouseOut="unPlaceTop(5)"><img border="0" src="fillempty.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(6)" onMouseOver="placeTop(6); setMsg(''); return true" onMouseOut="unPlaceTop(6)"><img border="0" src="fillempty.gif" height="50" width="50"></a></td>
</tr>
<tr>
<td><a href="javascript:void dropIt(0)" onMouseOver="placeTop(0); setMsg(''); return true" onMouseOut="unPlaceTop(0)"><img border="0" src="fillempty.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(1)" onMouseOver="placeTop(1); setMsg(''); return true" onMouseOut="unPlaceTop(1)"><img border="0" src="fillempty.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(2)" onMouseOver="placeTop(2); setMsg(''); return true" onMouseOut="unPlaceTop(2)"><img border="0" src="fillempty.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(3)" onMouseOver="placeTop(3); setMsg(''); return true" onMouseOut="unPlaceTop(3)"><img border="0" src="fillempty.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(4)" onMouseOver="placeTop(4); setMsg(''); return true" onMouseOut="unPlaceTop(4)"><img border="0" src="fillempty.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(5)" onMouseOver="placeTop(5); setMsg(''); return true" onMouseOut="unPlaceTop(5)"><img border="0" src="fillempty.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(6)" onMouseOver="placeTop(6); setMsg(''); return true" onMouseOut="unPlaceTop(6)"><img border="0" src="fillempty.gif" height="50" width="50"></a></td>
</tr>
<tr>
<td><a href="javascript:void dropIt(0)" onMouseOver="placeTop(0); setMsg(''); return true" onMouseOut="unPlaceTop(0)"><img border="0" src="fillempty.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(1)" onMouseOver="placeTop(1); setMsg(''); return true" onMouseOut="unPlaceTop(1)"><img border="0" src="fillempty.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(2)" onMouseOver="placeTop(2); setMsg(''); return true" onMouseOut="unPlaceTop(2)"><img border="0" src="fillempty.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(3)" onMouseOver="placeTop(3); setMsg(''); return true" onMouseOut="unPlaceTop(3)"><img border="0" src="fillempty.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(4)" onMouseOver="placeTop(4); setMsg(''); return true" onMouseOut="unPlaceTop(4)"><img border="0" src="fillempty.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(5)" onMouseOver="placeTop(5); setMsg(''); return true" onMouseOut="unPlaceTop(5)"><img border="0" src="fillempty.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(6)" onMouseOver="placeTop(6); setMsg(''); return true" onMouseOut="unPlaceTop(6)"><img border="0" src="fillempty.gif" height="50" width="50"></a></td>

</tr>
<tr>
<td><a href="javascript:void dropIt(0)" onMouseOver="placeTop(0); setMsg(''); return true" onMouseOut="unPlaceTop(0)"><img border="0" src="fillempty.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(1)" onMouseOver="placeTop(1); setMsg(''); return true" onMouseOut="unPlaceTop(1)"><img border="0" src="fillempty.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(2)" onMouseOver="placeTop(2); setMsg(''); return true" onMouseOut="unPlaceTop(2)"><img border="0" src="fillempty.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(3)" onMouseOver="placeTop(3); setMsg(''); return true" onMouseOut="unPlaceTop(3)"><img border="0" src="fillempty.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(4)" onMouseOver="placeTop(4); setMsg(''); return true" onMouseOut="unPlaceTop(4)"><img border="0" src="fillempty.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(5)" onMouseOver="placeTop(5); setMsg(''); return true" onMouseOut="unPlaceTop(5)"><img border="0" src="fillempty.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(6)" onMouseOver="placeTop(6); setMsg(''); return true" onMouseOut="unPlaceTop(6)"><img border="0" src="fillempty.gif" height="50" width="50"></a></td>
</tr>
<tr>
<td><a href="javascript:void dropIt(0)" onMouseOver="placeTop(0); setMsg(''); return true" onMouseOut="unPlaceTop(0)"><img border="0" src="fillempty.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(1)" onMouseOver="placeTop(1); setMsg(''); return true" onMouseOut="unPlaceTop(1)"><img border="0" src="fillempty.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(2)" onMouseOver="placeTop(2); setMsg(''); return true" onMouseOut="unPlaceTop(2)"><img border="0" src="fillempty.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(3)" onMouseOver="placeTop(3); setMsg(''); return true" onMouseOut="unPlaceTop(3)"><img border="0" src="fillempty.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(4)" onMouseOver="placeTop(4); setMsg(''); return true" onMouseOut="unPlaceTop(4)"><img border="0" src="fillempty.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(5)" onMouseOver="placeTop(5); setMsg(''); return true" onMouseOut="unPlaceTop(5)"><img border="0" src="fillempty.gif" height="50" width="50"></a></td>
<td><a href="javascript:void dropIt(6)" onMouseOver="placeTop(6); setMsg(''); return true" onMouseOut="unPlaceTop(6)"><img border="0" src="fillempty.gif" height="50" width="50"></a></td>
</tr>
</table>
</form>
	
	
</body>

</html>

