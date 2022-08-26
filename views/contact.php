<?php

?>
<h1>contact us </h1>


<div class="form-group col-4 mx-4">
    <form action="/contact" method="post">
        <div class="mb-3">
            <label for="subject" class="form-label">Subject</label>
            <input type="text" name="subject" class="form-control
             <?= errors()->hasError('subject') ? 'is-invalid' : '' ?>
            " id="subject" value="<?=old("subject")?>" placeholder="subject">
            <?php if (errors()->hasError('subject')): ?>
                <span class="invalid-feedback ">

                    <?php echo errors()->getFirstError('subject') ?>
                </span>
            <?php endif; ?>
        </div>
        <div class="mb-3  text-right ">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name="email"
                   class="form-control
                   <?=errors()->hasError('email') ? 'is-invalid' : '' ?>"
                   id="email"  value="<?=old("email")?>" placeholder="name@example.com">
            <?php if (errors()->hasError('email')): ?>
                <span class="invalid-feedback ">

                    <?php echo errors()->getFirstError('email') ?>
                </span>
            <?php endif; ?>

        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Example textarea</label>
            <textarea class="form-control
            <?= errors()->hasError('description') ? 'is-invalid' : '' ?>
                    " name="description" id="description" rows="3"><?=old("description")?></textarea>
            <?php if (errors()->hasError('description')): ?>
                <span class="invalid-feedback ">
                    <?php echo errors()->getFirstError('description') ?>
                </span>
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary mt-2">submit</button>
    </form>
</div>