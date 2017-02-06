<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('quizs/delete'); ?>

    <label for="pregunta">pregunta</label>
    <input type="input" name="pregunta" /><br />

    <input type="submit" name="submit" value="Borra pregunta." />

</form>

