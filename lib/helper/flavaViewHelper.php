<?php

/**
 * include_ajax_view 
 * 
 * @param mixed $type 
 * @param mixed $module_name 
 * @param mixed $view_name 
 * @param array $user_options 
 * @access public
 * @return void
 */
function include_ajax_view($flava_view_type, $module_name, $view_name, $user_options = array())
{
  sfContext::getInstance()->getConfiguration()->loadHelpers('Url');

  $options['module_name'] = $module_name;
  $options['view_name'] = $view_name;
  $options['flava_view_type'] = $flava_view_type;
  $options['element_name'] = get_element_name_for($module_name, $view_name);

  $options = array_merge($options, $user_options);
  $options['url'] = url_for('flava_ajax_view_show', $options);

  include_partial('flavaView/ajax', $options);
}

/**
 * get_element_name_for 
 * 
 * @param mixed $module_name 
 * @param mixed $view_name 
 * @access public
 * @return void
 */
function get_element_name_for($module_name, $view_name)
{
  return str_replace('_', '-', 'flava-view-' . $module_name . '-' . $view_name);
}

/**
 * include_view 
 * 
 * @access public
 * @return void
 */
function include_view()
{
}
