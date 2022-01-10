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



<?php var_dump($data) ?>



<footer>

</footer>

<?= $this->end() ?>


<?= $this->start('script') ?>
<script>
    // alert('This is warking!')
</script>

<script src="<?= js('main') ?>"></script>
<?= $this->end() ?>