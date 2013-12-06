<?php
 
class VendorsController extends BaseController {

   protected $layout = "layouts.main";

   public function getDashboard() {
      $this->layout->content = View::make('users.dashboard');  
   }

}


?>
