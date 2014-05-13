<?php
/**
* Simple Facebook Events Explorer Script
*
* author: Harman Goei
*
*/
	class Events extends CI_Controller {
		
		var $name;
		
		function __construct()
		{
			parent::__construct();
			
			$this->name = "gallery/index";
			// $this->load->add_package_path('/Users/elliot/github/codeigniter-facebook/application/');
			$this->load->library('facebook');
			$this->facebook->enable_debug(TRUE);
		}
		
		/**
		* Gallery Index. 
		* Displays all the albums
		*/
		function index($limit = null, $until = null, $mode = null)
		{
			$fbPage = $this->config->item('facebook_user_id');
			// USC ASIS
			$data["page"] = "events";
			$this->load->view("main", $data); 
		}
		
		
		/**
		* Album Index. 
		* Displays all the photos in the album

		*/
		function album($album = null, $limit = null, $until = null, $mode = null)
		{
			if(!is_numeric($album)) { 
				redirect("gallery");
			}
			// if it isnt numeric (change if facebook starts including letters), then redirect the person, doing something wrong here
			if(!is_numeric($until) && $until != null) { 
				redirect("gallery");
			}
		
		try {
			// 1st we get the albums
			$resp = $this->facebook->call("get", $album . "/photos"); 
			if(isset($limit) && isset($until) && $mode == "next")
			$resp = $this->facebook->call("get", "$album/photos?limit=".$limit."&offset=".$until.""); 
			if(isset($limit) && isset($until) && $mode == "prev")
			$resp = $this->facebook->call("get", "$album/photos?limit=".$limit."&offset=".$until.""); 
			
			// a little hack, but it stiill works
				if(count($resp->data) == 0 ) {
					$resp = $this->facebook->call("get",  $album . "/photos"); 
				}
			} // sometimes facebook is down, so just out a msg
			catch(Exception $e) { 
				$data["msg"] = "<h1>Photo Gallery</h1><hr/>";
				$data["msg"] .= "<div class='notice'>The gallery is down right now, just visit our <a href='http://www.facebook.com/$fbPage'>Facebook page instead!</a></div>";
				$data['page'] = 'msg';
				$this->load->view('main', $data);
			}
			
			// then we see if there's any other albums after this set or before
			if(isset($resp->paging->previous)) { 
				$prev = parse_url($resp->paging->previous);
				parse_str($prev["query"], $prev_param);
			}
			if(isset($resp->paging->next)) { 
				$next = parse_url($resp->paging->next);
				parse_str($next["query"], $next_param);
			}
			
			
			

			// cool, we parsed it, now lets go make a string
			if(isset($next_param["offset"]))
			$data["next_url"] = "gallery/album/$album" . "/" . $next_param["limit"] . "/" . $next_param["offset"] . "/next";
			
			if(isset($prev_param["offset"]))
			$data["prev_url"] = "gallery/album/$album" . "/" . $prev_param["limit"] . "/" . $prev_param["offset"] . "/prev";
			
			
	
			// create a thumbnail for each picture
			$photos = $resp->data;
			foreach($photos as $photo) {
				$images = $photo->images;
				$photo->pic = "<a href='".$images[0]->source."' class='fancybox-thumbs' data-fancybox-group=\"thumb\" alt='' title=''><img src='".$photo->picture."'/></a>";
			}
	
			
			// let's grab some info. sigh, another call. not bad though, then get the info out to the user
			$resp = $this->facebook->call("get", $album); 
			$data["info"] = $resp;
	
	
			// we're done with the photos, now let's get them out to the user
			$data["photos"] = $photos;
			$data['page'] = 'album_view';
			$this->load->view('main', $data);
			
		}
		
		
	
	}