<fb:login-button perms="email"></fb:login-button>

<h1>Registrar</h1>

<?php echo $form->renderFormTag(url_for('register/index'), array('name' => 'signup_form')); ?>
  <table>
    <?php echo $form;?>
  </table>

  <input type="submit" name="register" value="Registrar" />
 </form>
