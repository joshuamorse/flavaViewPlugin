<?php

/**
 * flavaViewActions 
 * 
 * @uses sfActions
 * @package 
 * @version $id$
 * @author Joshua Morse <dashvibe@gmail.com> 
 */
class flavaViewActions extends sfActions
{
  public function executeShow(sfWebRequest $request)
  {
    $this->forward404Unless($flava_view_type = $request->getParameter('flava_view_type'), 'No "type" param was found');
    $this->forward404Unless(
      in_array($flava_view_type, array('component', 'partial')),
      '"type" param must be either "component" or "partial". "' . $flava_view_type . '" was passed.
    ');

    // Are we currently allowing direct access to URLs?
    if (!sfConfig::get('app_flava_view_allow_direct_access'))
    {
      // Has a param been set to allow access for this request?
      if (!$request->getParameter('allow_direct_access'))
      {
        if (!$request->getReferer())
        {
          $this->forward404Unless($request->getReferer(), 'Direct access is not allowed.');
        }
      }
    }

    $this->flava_view_type = $flava_view_type;
    $this->module_name = $request->getParameter('module_name');
    $this->params = $request->getGetParameters();
    $this->view_name = $request->getParameter('view_name');
  }
}
