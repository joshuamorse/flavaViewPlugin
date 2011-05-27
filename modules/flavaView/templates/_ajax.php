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
    $('#<?php echo $element_name ?>').load('<?php echo $url ?>');

    <?php /*
    <?php if ($flava_view_type == 'component'): ?>
      var html = '<?php include_component($module_name, $view_name, $sf_data->getRaw('options')) ?>';
    <?php elseif ($flava_view_type == 'partial'): ?>
      var html = "<?php include_partial($module_name . '/' . $view_name, $sf_data->getRaw('options')) ?>";
    <?php endif ?>
    */ ?>
  });
</script>
