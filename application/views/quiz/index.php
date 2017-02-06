<h2><?php echo $title; ?></h2>

<?php foreach ($quiz as $quiz_item): ?>

        <h3><?php echo $quiz_item['titulo']; ?></h3>
        <div class="main">
                <?php echo $quiz_item['respuesta']; ?>
        </div>
        <p><a href="<?php echo site_url('quiz/'.$quiz_item['pregunta']); ?>">View article</a></p>

<?php endforeach; ?>

