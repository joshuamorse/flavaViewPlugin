<?php

/**
 * EXPERIMENTAL ajax functionality.
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
  $options['url'] = url_for('flava_view_show', $options);

  //$options['options'] = $options;
  //var_dump($options); die;

  include_partial('flavaView/ajax', $options);
}

/**
 * Includes a component or partial dependent on a few things:
 *  - By default, if a component exists, it will be included.
 *  - By default, if no component exists, a partial will be included.
 *  - A type (component or partial) can be specified in $view_options. 
 * 
 * @param mixed $module_name 
 * @param mixed $view_name 
 * @param array $user_options 
 * @param array $view_options 
 * @access public
 * @return void
 */
function include_view($module_name, $view_name, $user_options = array(), $view_options = array())
{
  if (isset($view_options['type']))
  {
    if ($view_options['type'] == 'component')
    {
      include_component($module_name, $view_name, $user_options);
    }
    else
    {
      include_partial($module_name . '/' . $view_name, $user_options);
    }
  }
  else
  {
    if (component_exists($module_name, $view_name))
    {
      include_component($module_name, $view_name, $user_options);
    }
    else
    {
      include_partial($module_name . '/' . $view_name, $user_options);
    }
  }
}

/**
 * Check is a component exists.
 * 
 * @param mixed $module_name 
 * @param mixed $view_name 
 * @access public
 * @return void
 */
function component_exists($module_name, $view_name)
{
  try
  {
    get_component($module_name, $view_name);
  }
  catch(Exception $e)
  {
    return;
  }

  return true;
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
