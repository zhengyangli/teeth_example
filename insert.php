<?php
$con=mysqli_connect("localhost","zhengyang","123456","mysql");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
//insert
$sql="INSERT INTO 3d_annotations (x_coordinate, y_coordinate, z_coordinate, text_x, text_y, text_z, modelURL, author, label)
VALUES
('$_POST[x_coordinate]','$_POST[y_coordinate]','$_POST[z_coordinate]',
    '$_POST[text_x]','$_POST[text_y]','$_POST[text_z]',
        '$_POST[modelURL]','$_POST[author]','$_POST[label]')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error());
  }
echo "1 record added";
//display
$result = mysqli_query($con,"SELECT x_coordinate, y_coordinate, z_coordinate, text_x, text_y, text_z, modelURL, author, label FROM 3d_annotations");

echo "<table border='1'>
<tr>
<th>x_coordinate</th>
<th>y_coordinate</th>
<th>z_coordinate</th>
<th>text_x</th>
<th>text_y</th>
<th>text_z</th>
<th>modelURL</th>
<th>author</th>
<th>label</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['x_coordinate'] . "</td>";
  echo "<td>" . $row['y_coordinate'] . "</td>";
  echo "<td>" . $row['z_coordinate'] . "</td>";
  echo "<td>" . $row['text_x'] . "</td>";
  echo "<td>" . $row['text_y'] . "</td>";
  echo "<td>" . $row['text_z'] . "</td>";
  echo "<td>" . $row['modelURL'] . "</td>"; 
  echo "<td>" . $row['author'] . "</td>";
  echo "<td>" . $row['label'] . "</td>";
  echo "</tr>";
  }
echo "</table>";
mysqli_close($con);
echo "<br>";
?>

<a href="javascript:window.close();">close window>></a>