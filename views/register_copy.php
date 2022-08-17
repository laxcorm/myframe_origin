<h1>Create Account</h1>

<!-- ?? ''  для  $model добавлено мной -->
<?php $form = \app\core\form\Form::begin('', "post") ?>

<?php echo $form->field($model, 'firstname') ?>
<?php echo $form->field($model, 'lastname') ?>
<?php echo $form->field($model, 'email') ?>
<?php echo $form->field($model, 'password') ?>
<?php echo $form->field($model, 'passwordConfirm') ?>
<button type="submit" class="btn btn-primary">Submit</button>

<?php  \app\core\form\Form::end() ?>


<!-- <form action="" method="post">
    <div class="form-group">
        <label>Firstname</label>
        <input type="text" name="firstname" value="<?php echo $model->firstname ?? '' ?>" class="form-control<?php echo $model->hasError('firstname') ? ' is-invalid' : '' ?>">
        <div class="invalid-feedback">
            <?php echo $model->getFirstError('firstname') ?>
        </div>
    </div>
    <div class="form-group">
        <label>Last name</label>
        <input type="text" name="lastname" value="<?php echo $model->lastname ?? '' ?>" class="form-control<?php echo $model->hasError('lastname') ? ' is-invalid' : '' ?>">
        <div class="invalid-feedback">
            <?php echo $model->getFirstError('lastname') ?>
        </div>
    </div>
    <div class="form-group">
        <label>E-mail</label>
        <input type="text" name="email" value="<?php echo $model->email ?? '' ?>" class="form-control<?php echo $model->hasError('email') ? ' is-invalid' : '' ?>">
        <div class="invalid-feedback">
            <?php echo $model->getFirstError('email') ?>
        </div>
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" value="<?php echo $model->password ?? '' ?>" class="form-control<?php echo $model->hasError('password') ? ' is-invalid' : '' ?>">
        <div class="invalid-feedback">
            <?php echo $model->getFirstError('password') ?>
        </div>
    </div>
    <div class="form-group">
        <label>Confirm password</label>
        <input type="password" name="passwordConfirm" value="<?php echo $model->passwordConfirm ?? '' ?>" class="form-control<?php echo $model->hasError('passwordConfirm') ? ' is-invalid' : '' ?>">
        <div class="invalid-feedback">
            <?php echo $model->getFirstError('passwordConfirm') ?>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form> -->


<!--  <div class="form-group">
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