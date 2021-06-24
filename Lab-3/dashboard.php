<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Page</title>
</head>
<body>
<form>
<table>
<td>Logged in as <?php echo $_COOKIE["userName"]
?> <br>
<img width="60" height="50" src="image.png">
<form action="upload.php" method="post" enctype="multipart/form-data">
<table>
<tr> <td><br>Profile Picture:<br></td>
<td><input type="file" name="fileToUpload" id="fileToUpload">
<br><input type="submit" value="Submit" name="submit"> </td>
</form>
<tr>
<td><a href="logout.php">Logout</a></td>
</tr>
</form> </table>
</form>
</body>
</html>

