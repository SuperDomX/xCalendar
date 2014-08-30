<?php 
/**
 * @name Calendar 
 * @desc A calendar that tracks everything
 * @version v1.0.2
 * @author heylisten@xtiv.net
 * @icon Calender Month.png
 * @mini calendar
 * @price $20
 * @see cronos
 * @link calendar
 * @todo
 * @beta true
 */

	
	class xCalendar extends Xengine{
		
		public function autoRun()
		{
			if(isset($_POST['event'])){
				//$this->event('add');
			}
		}

		public function full()
		{
			return array(
				'events' => $this->getEvents()['data']
			);
		}

		public function getEvents(){
			$r['data']    = $this->q()->Select('*','CalendarEvents',array(
				'user_id'     =>  $_SESSION['user']['id']
			));
			
			$r['success'] = (!$this->q()->error);
			$r['error']   = $this->q()->error;

			return $r;
		}

		public function index($value='')
		{
			# code...
		}
		
		function event($action){
			$q = $this->q();
			$user_id = $_SESSION['user']['id'];
			$rec = $_POST['event'];
			switch($action){
				case('add'):
					$rec['user_id'] = $user_id; 
					$q->Insert('CalendarEvents',$rec);
				break;
				case('update'):
					$q->Update('CalendarEvents',$rec,array(
						'id' => $rec['id']
					));
				break;
				case('delete'):
					$q->Delete('CalendarEvents',$rec,array(
						'id' => $rec['id']
					));
				break;
			}
		}
	}


?>