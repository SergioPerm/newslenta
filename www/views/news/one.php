<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

<table border="1" width="800px">
    <tr>
        <th>Дата и время </th>
        <th>Новость </th>
    </tr>
<tr>
<td><?php echo $item->datetime;?></td>
<td><b><?php echo $item->title;?></b><br/><br/>
     <?php echo $item->content;?></td>
</tr>
</table>
<br/>
</body>
</html>