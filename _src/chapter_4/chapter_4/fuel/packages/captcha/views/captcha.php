<div class="captcha_area">
    <div class="captcha_instruction">
        <?= $number_1 ?> + <?= $number_2 ?> ?
    </div>
    <div class="captcha_fields">
        <input type="hidden" name="captcha_id"
               value="<?= $captcha_answer->id ?>" />
        <input type="text" name="captcha_answer"
               value="" class="col-md-4 form-control" />
    </div>
</div>