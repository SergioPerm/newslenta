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
    <?php foreach ($items as $item) : ?>
        <tr>
            <td><?php echo $item->datetime;?><br/><b><a href="<?php echo 'http://newslenta/?ctrl=News&act=One&id=' . $item->id;?>">Ссылка</a></b></br>
            <a href="">Изм</a></td>
            <td><b><?php echo $item->title;?></b><br/><br/>
                <?php echo $item->content;?></td>
        </tr>
    <?php endforeach; ?>
</table>
<br/>


</body>
</html>