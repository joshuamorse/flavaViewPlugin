<?php
/**
 * Sets up an AJAX container for loading the requested component/partial. 
 */
?>

<?php /*
<?php if (sfConfig::get('app_flava_ajax_component_load_js')): ?>
  <?php include_javascripts() ?>
<?php endif ?>
*/?>

<?php /* The component/partial will be loaded into this element. */ ?>
<div id="<?php echo $element_name ?>" class="flava-ajax-view">
  <?php echo image_tag(sfConfig::get('app_flava_ajax_view_loading')) ?>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#<?php echo $element_name ?>').load('<?php echo $sf_data->getRaw('url') ?>');
  });
</script>
