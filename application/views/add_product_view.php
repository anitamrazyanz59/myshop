<div class="form_div">
    <?php echo '<div class=error>'.validation_errors().'</div>'; ?>
    <?php echo form_open('form'); ?>
        <p> Product name <input type="text" value="<?php echo $this->input->post('product_name', true)?>" name="product_name"></p>
        <p> Product price <input type="text" value="<?php echo $this->input->post('product_price', true)?>" name="product_price"></p>
        <p>Product description</p> <textarea name="product_description"> <?php echo $this->input->post('product_description', true)?> </textarea>
        <p><input type="submit" value="Add product" name="add_product"></p>
    </form>
</div>