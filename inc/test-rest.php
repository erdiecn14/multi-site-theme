<?php

lyst_log("this is loaded");

class Knock_Scheduler_Route extends WP_REST_Controller{
    public function register_routes() {

            register_rest_route( 'caprop-test', '/tour-availablity',
                array( 
                  array(
                    'methods' => 'WP_REST_Server::READABLE',
                    'callback' => array($this, 'test_test' ),
                  ),
                )
             );
    } 
    

  public function test_test(){
      lyst_log("this is a test");
      return new WP_REST_Response("this is a test", 200);
  }
} // end class

function lyst_enable_knock_api() {
  $scheduler_route_control = new Knock_Scheduler_Route();
  $scheduler_route_control->register_routes();
}


add_action('rest_api_init', 'lyst_enable_knock_api');