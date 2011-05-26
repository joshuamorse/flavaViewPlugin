<?php
/**
 * Includes a component or partial dependent upon type. 
 */
?>

<?php if ($flava_view_type == 'component'): ?>
  <?php include_component($module_name, $view_name, $params) ?>
<?php else: ?>
  <?php include_partial($module_name . '/' . $view_name, $params) ?>
<?php endif ?>
