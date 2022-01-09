<?php
$students = [
    ['name' => 'tanvir', 'id' => 'cse014'],
    ['name' => 'sobuj', 'id' => 'cse015'],
    ['name' => 'somir', 'id' => 'cse016']
];



?>

<?= $this->setSiteTile('Index') ?>

<?= $this->start('head') ?>
<style>
    body {
        background-color: #dff;
    }

    table,
    th,
    td {
        width: 50%;
        border: 1px solid black;
        text-align: center;
        margin: 5px;
        padding: 2px;
    }
</style>
<?= $this->end() ?>

<?= $this->start('body') ?>
<h2>Page View</h2>

<h2>MVC Framework</h2>
<ul>
    <?php foreach ($data as $key => $value) : ?>
        <li><?= $value->id ?></li>
    <?php endforeach; ?>
</ul>

<table class="student-table">
    <tr>
        <th>Name</th>
        <th>ID</th>

    </tr>

    <?php foreach ($students as $key => $value) : ?>
        <tr>
            <td><?= $value['name'] ?> </td>
            <td><?= $value['id'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>





<?= $this->end() ?>


<?= $this->start('script') ?>
<script>
    // alert('This is warking!')
</script>
<?= $this->end() ?>