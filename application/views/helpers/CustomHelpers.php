<?php

class CustomHelpers
{

  /**
   *
   * ----------------------------------------------
   * Create a Title from a route
   * ----------------------------------------------
   * Take this    [ /online-brochure ]
   * Turn into    [ Online Brochure  ]
   *
   * @static
   * @param $route
   * @return string
   *
   */
  public static function makeTitleFromRoute($route)
  {
    return ucwords(str_replace('-', ' ', $route));
  }

  /**
   *
   * ----------------------------------------------
   * Create a route from a Title
   * ----------------------------------------------
   * Take this    [ Online Brochure   ]
   * Turn into    [ /online-brochure  ]
   *
   * @static
   * @param $title
   * @param $id
   * @return string
   */
  public static function makeRouteFromTitle($title, $id)
  {
    return '/online-brochure/' . $id . '/' . ucwords(str_replace(' ', '-', $title));
  }


  /**
   * ----------------------------------------------
   * Set the Page Title
   * ----------------------------------------------
   *
   * Helper to generate a dynamic page title based on the route.
   *
   * eg. /about
   *  -> About + Default.
   *
   * @static
   * @param $route
   * @return string
   */
  public static function setTitle($route)
  {

    $defaultTitle = SITE_NAME;
    if ($route) {

      //check if its a route in 'dot' format (eg. home.about)
      //if it is, split the route into segments and use only the second piece to form the title.
      if (str_contains($route, '.')) {
        $segments = explode('.', $route);
        $currentPage = $segments[1];
      }

      $page = self::makeTitleFromRoute($currentPage);

      return ($page !== 'Index') ? $title = $page . ' - ' . $defaultTitle : $defaultTitle;

    } else
      return $defaultTitle;
  }

  /**
   * -----------------------------------
   * Make Permalink from a Title.
   * -----------------------------------
   *
   * Take this   [ Fence Panels ]
   * Return this [ /prefix/12/fence-panels ]
   *  Where :
   *    '/prefix'      = The controlling route.
   *    '/12'          = The ID of the element in the DB
   *    'fence-panels' = the Page/Product Title

   * This removes the need to perform any CRUD actions for Permalinks.
   *
   * @param null $prefix
   * @param $id
   * @param $title
   * @return string*
   *
   * //TODO Check for characters that would screw up the route. Such as / & \
   */
  public static function makePermalink($id, $title, $prefix = null)
  {

    $defaultPrefix = ($prefix) ? $prefix : '/online-brochure';

    $title = trim($title);

    $searches = array(
      ' ', //spaces
      '/', //forward slashes
      '\'', //single quote
      '(',
      ')'
    );
    $replacements = array(

      '-',
      '',
      '',
      '',

    );

    $title = str_replace($searches, $replacements, $title);

    return $defaultPrefix . '/' . $id . '/' . $title;

  }//makePermalink()


  /**
   *
   * ----------------------------------------------
   * isDev() - Check if we are in a Dev Env.
   * ----------------------------------------------
   *
   * Helper to determine which ENV we are working in.
   * Used for loading different resources in each ENV.
   *
   * Allow a quick override with a ? get variable in the URL
   * ['site.local?env=prod']
   *
   * @return bool
   *
   */
  public static function isDev(){
    if (isset($_GET['env']))
       return false;
    return str_contains($_SERVER['SERVER_NAME'], DEV_URL);
  }//isDev()

}