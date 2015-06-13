<div class="main-content_container">
    
    <?php 
    
        $info = new \pluralpet\Informacion();
        $data = $info->get();
    ?>
    
<?php echo htmlEncodeText($data['descripcion']);?>
</div>