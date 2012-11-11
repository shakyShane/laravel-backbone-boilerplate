<?php

class Base_Controller extends Controller {


  public $layout = 'layouts.main';

  public function __construct()
  {
    //Scripts
//    Asset::add('jquery', 'js/jquery.js');
//    Asset::add('bootstrap-js', 'js/bootstrap.min.js');
//    Asset::add('custom-js', 'js/custom.js');
////    Asset::add('custom-js', 'js/slider.js');
//
//    //Styles
//    Asset::add('custom-css', 'css/custom.css');

    parent::__construct();
  }

  /**
   * ----------------------------------------------
   * Serve the page!
   * ----------------------------------------------
   *
   * Every controller action will call this.
   * ¬ Used to determine if a request was made via Ajax.
   * ¬ Handles any extra data that needs to be passed to the views.
   *
   * @param $route
   * @param null $extraViewData
   * @return mixed
   */
  public function servePage($route, $extraViewData = null)
  {

    if (Request::ajax())
      $this->layout = 'layouts.ajax';
    else
      $this->layout = 'layouts.main';

    $viewData = $this->setPageData($route);

    /**
     * Handle any extra data that needs to be passed to the view.
     * If it's an Array, just merge it.
     * If it's an object, make it accessible via it's class name.
     */
    if (null !== $extraViewData) {
      if (is_array($extraViewData)) {
        $viewData = array_merge($extraViewData, $viewData);
      }
      if (is_object($extraViewData)) {
        $className = strtolower(get_class($extraViewData));
        $viewData[$className] = $extraViewData;
      }
    }

    //_TODO We should only send the relevant data to the layout, not ALL the view data.
    return View::make($this->layout, $viewData)->nest('content', $route, $viewData);
  }

  /**
   * ----------------------------------------------
   * Set the Page meta
   * ----------------------------------------------
   *
   * Things that change per different View like the Title and the ActiveNav indicator.
   * The returned array is binded to the view and is accessible view the array key specified below.
   *
   * @param $route - Defined in each controller action to specify which route was requested. _TODO - Can this be automated?
   * @return array - This array is passed to the Layout & the View
   */
  public function setPageData($route)
  {

    // Sort out the Title and Other attributes specific to each page.
    $title = CustomHelpers::setTitle($route);

    $viewData = array();
    $viewData['title'] = $title;

    //add the last part of the current Route.
    //check if its a route in 'dot' format (eg. home.about)
    //if it is, split the route into segments and use only the second piece to form the title.
    if (str_contains($route, '.')) {
      $segments = explode('.', $route);
      $currentPage = $segments[1];
    }
    $viewData['activeNav'] = $currentPage;

    // If it's an ajax request, set a flag so that we don't send the layout along with the page.

    $viewData['isAjax'] = (Request::ajax()) ? true : false;

    return $viewData;
  }

	/**
	 * Catch-all method for requests that can't be matched.
	 *
	 * @param  string    $method
	 * @param  array     $parameters
	 * @return Response
	 */
	public function __call($method, $parameters)
	{
		return Response::error('404');
	}

}