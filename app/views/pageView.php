<?= $this->setSiteTile('Index') ?>

<?= $this->start('head') ?>
<style>
    body {
        background-color: #dff;
    }
</style>
<?= $this->end() ?>

<?= $this->start('body') ?>

<h2>MVC Framework</h2>

<?php

foreach ($data as $persons) {
    foreach($persons as $key=>$value){
        PrintData("{$key} = {$value} ");
    }
 }

?>


<h2>Page View</h2>

<footer>

</footer>

<?= $this->end() ?>


<?= $this->start('script') ?>
<script>
    // alert('This is warking!')
</script>
<?= $this->end() ?>






