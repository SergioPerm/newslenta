<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <style>
        .radius {
            background: #fff; /* Цвет фона */
            border-radius: 5px;
        }
        .textlabel {
            border: 3px solid lightskyblue; /* Параметры рамки */
            padding: 2px; /* Поля вокруг текста */
            margin-bottom: 2px; /* Отступ снизу */
        }
    </style>
</head>
<body>

<table border="1" width="800px" class="radius">
    <tr>
        <th>Дата и время </th>
        <th>Новость </th>
    </tr>
    <?php foreach ($items as $item) : ?>
        <tr>
            <td><?php echo $item->datetime;?></td>
            <td><b><?php echo $item->title;?></b><br/><br/>
                <?php echo $item->content;?></td>
        </tr>
    <?php endforeach; ?>
</table>
<br/>


</body>
</html>