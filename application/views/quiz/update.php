<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('quizs/update'); ?>

    <label for="pregunta">pregunta</label>
    <input type="input" name="pregunta" /><br />

    <label for="respuesta">respuesta</label>
    <respuestaarea name="text"></textarea><br />

    <input type="submit" name="submit" value="Actualiza pregunta." />

</form>

