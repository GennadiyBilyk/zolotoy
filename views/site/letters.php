<?php


$this->title = 'Лог писем';
$this->params['breadcrumbs'][] = $this->title;
?>


<table class="table">
<?php foreach ($letters as $letter) { ?>


    <tr>
        <td><?php echo $letter->email; ?></td>
        <td><?php echo $letter->text; ?></td>
    </tr>




<?php } ?>
</table>
