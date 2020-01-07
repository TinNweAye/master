<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class RingController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('BookingModel');	
	public $components = array('Session');
/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function index() {
		$this->layout ='carbooking';
		 $this->render('index');

	}
			
	public function ringcheck(){
		
		
		    $this->request->onlyAllow('ajax');
			$this->autoRender = false;
			$layout = '';
			$a=$this->Session->read('USER_ID');
			date_default_timezone_set("Asia/Rangoon");
			$curtimemin=date('i');
			$curtimehr=date('H')*60+$curtimemin;
			$todaydate=date("Y-m-d")." "."00:00:00";
			$curtime=date('H:i');
			
		$ring=$this->BookingModel->noti($a,$todaydate,$curtimehr,$curtime);
		if($ring){
			 	//echo '1';
				return json_encode($ring);
			 } else {
			 	echo '0';
			 }
	   }
}
