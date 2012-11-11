<?php

class Gigs_Controller extends Base_Controller {

//  public $restful = true;

  public function action_index()
  {
    /**
     *
     * If it was an ajax request, we only want to return a JSON object.
     *
     */
    if (Request::ajax())
      return Response::eloquent(Gig::find(1));
    else
      return $this->servePage('gig.gigs', array('gig' => Gig::find(1)));
  }
//  public function post_index()
//  {
//
//  }
//
//  public function get_show()
//  {
//
//  }
//
//  public function get_edit()
//  {
//
//  }
//
//  public function get_new()
//  {
//
//  }
//
//  public function put_update()
//  {
//
//  }
//
//  public function delete_destroy()
//  {
//
//  }

}