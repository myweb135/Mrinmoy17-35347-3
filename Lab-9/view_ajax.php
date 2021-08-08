<?php
	include '../lib/db_connect.php';
	$sql = "SELECT * FROM user_info";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
?>	
		<tr>
			<td><?=$row['ID'];?></td>
			<td><?=$row['Name'];?></td>
			<td><?=$row['Email'];?></td>
			<td><?=$row['Username'];?></td>
			<td><?=$row['Gender'];?></td>
			<td><?=$row['Current_Institution'];?></td>
			<td><?=$row['Department'];?></td>
			<td><?=$row['DOB'];?></td>
            <td><a class="btn btn-outline-light" href="delete.php?id=<?=$row['ID'];?>">Delete</a></td>
		</tr>
<?php	
	}
	}
	else {
		echo "0 results";
	}
	mysqli_close($conn);
?>