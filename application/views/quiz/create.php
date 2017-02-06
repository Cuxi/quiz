<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('quizs/create'); ?>

    <label for="pregunta">pregunta</label>
    <input type="input" name="pregunta" /><br />

    <label for="respuesta">respuesta</label>
    <textarea name="respuesta"></textarea><br />

    <input type="submit" name="submit" value="Create quiz item" />

</form>
