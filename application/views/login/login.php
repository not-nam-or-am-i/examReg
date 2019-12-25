<h1>login</h1>

<?php echo validation_errors(); ?>

<?php echo form_open('login'); ?>
  <div>
    <label>id</label>
    <input type="text" name="id" placeholder="Mã sinh viên">
  </div>
  <div>
    <label>password</label>
    <input type="text" name="password" placeholder="password"></textarea>
  </div>
  <button type="submit">Submit</button>
</form>