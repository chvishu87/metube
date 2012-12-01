<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w or not-that-critical projects, which makes them feel not participating in the teamwork.3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	session_start();
	include_once "function.php";
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Media browse</title>
	<link rel="stylesheet" type="text/css" href="css/default.css" />
	<script type="text/javascript" src="js/jquery-latest.pack.js"></script>
	<script type="text/javascript">
		function saveDownload(id)
		{
			$.post("media_download_process.php",
		{
   	  id: id,
		},
			-Blason	function(message) 
    { }
 			);
		} 
	</script>
</head>

<body>
	<div style="position:relative;height:50px;">
		<div style="float:left">
			<p style="size:100%;position:relativie;font-size:30px;font-family:times;"><b>MeTube</b></p>
		</div>
		<div style="float:right;height:100%;">
			<p>Welcome <?php echo $_SESSION['username'];?></p>
			<a href='index.php'  style="color:#FF9900;">Logout</a>
			<a href='media_upload.php'  style="color:#FF9900;">Upload File</a>
		</div>
	</div>
	<div id='upload_result'>
		<?php 
			if(isset($_REQUEST['result']) && $_REQUEST['result']!=0)
			{
				echo upload_error($_REQUEST['result']);
			}
		?>
	</div>
	
	<br/><br/>
	<?php
		$query = "SELECT * from VIDEO"; 
		$result = mysql_query( $query );
		if (!$result)
			{
	   		die ("Could not query the media table in the database: <br />". mysql_error());
			}
	?>
	<div style="width:100%;"> 
		<div style="width:700px;position:relative;background:#333333"></div>
  	<div style="background:#999999;color:#FFFFFF;width:500px;position:relative;" align="center">
		<p>Videos</p>
		</br>
		<table cellpadding="0" cellspacing="0">
			<?php
				while ($result_row = mysql_fetch_row($result))
				{ 
			?>
			<div style="padding:5px 0px 5px 0px;border-top-style:solid;border-width:1px;">
				<a href="media.php?id=<?php echo $result_row[0]?>"><img src="images.jpg"></a></br>
				<p style="margin:5px 0px 5px 0px;"><?php echo $result_row[1];?></p>
				<p style="margin:5px 0px 5px 0px;"><a href="download.php?file=<?php echo $result_row[2].$result_row[1];?>">Download</a></p>
			</div>
				
   	 <?php
				}
			?>
		</table>
		</div>	
		<br /><br />
		<?php
			$user = $_SESSION['username'];
			$query = "SELECT Playlistname FROM PLAYLISTS WHERE Userp='$user'"; 
			$result = mysql_query( $query );
			if (!$result)
			{
				die ("Could not query the media table in the database: <br />". mysql_error());
			}
		?>
    
		<div style="background:#339900;color:#FFFFFF; width:200px;">
			<p>Playlists</p>
			<table width="100%" cellpadding="0" cellspacing="0">
				<?php
					while ($result_row = mysql_fetch_row($result))
					{ 
				?>
 				<tr valign="top">			
					<td>
						<?php 
							echo $result_row[0];
						?>
					</td>
     		 	<td>
     				<a href="media.php?id=<?php echo $result_row[0];?>" target="_blank"><?php echo $result_row[1];?></a> 
      		</td>
      		<td>
       			<a href="download.php?file=<?php echo $result_row[2].$result_row[1] ;?>">Download</a>
      		</td>
				</tr>
  	  	<?php
					}
				?>
			</table>
		</div>	
	</div>
</body>

</html>
