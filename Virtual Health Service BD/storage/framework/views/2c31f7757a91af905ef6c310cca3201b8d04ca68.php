# Authenticating requests

<?php if(!$isAuthed): ?>
This API is not authenticated.
<?php else: ?>
<?php echo $authDescription; ?>


<?php echo $extraAuthInfo; ?>

<?php endif; ?>
<?php /**PATH E:\Porject_VHSBD\VHSBD\vendor\knuckleswtf\scribe\src/../resources/views//markdown/auth.blade.php ENDPATH**/ ?>