<?php
/**  @var $this \app\core\View */

use app\core\form\Form;

/**  @var $model \app\models\ContactForm */
 
$this->title = 'Contact';
?>

<h1>Contact us</h1>
<?php $form = \app\core\form\Form::begin('', 'post') ?>
<?php echo $form->field($model, 'subject')?>
<?php echo $form->field($model, 'email')?>
<?php echo $form->field($model, 'body')?>
<button type="submit" class="btn btn-primary">Submit</button>
<?php \app\core\form\Form::end(); ?>

<!-- 6:12:02 удаляет html форму -->

<!-- <form action="" method="post">
    <div class="form-group">
        <label>Subject</label>
        <input type="text" name="subject" class="form-control">
    </div>
    <div class="form-group">
        <label>E-mail</label>
        <input type="text" name="email" class="form-control">
    </div>
    <div class="form-group">
        <label>Body</label>
        <textarea name="body" class="form-control"></textarea>
    </div> -->

   <!--  <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control">
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div> -->
    <!-- <button type="submit" class="btn btn-primary">Submit</button>
</form> -->