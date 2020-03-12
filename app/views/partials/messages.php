<?php if ($msg->hasMessages()): ?>
    <div class="py-4">
        <?php $msg->display(); ?>
    </div>
<?php endif; ?>
