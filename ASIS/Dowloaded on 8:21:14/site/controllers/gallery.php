<?php
/**
* Simple Facebook Gallery Explorer Script
*
* author: Harman Goei
*
*/
	class Gallery extends CI_Controller {
		
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
			
			// if it isnt numeric (change if facebook starts including letters), then redirect the person, doing something wrong here
			if(!is_numeric($until) && $until != null) { 
				redirect("gallery");
			}
			// if the limit isnt numeric, then redirect the person, doing something wrong here
			if(!is_numeric($limit) && $limit !=null) { 
				redirect("gallery");
			}
			if(!($mode =="next" || $mode=="prev") && $mode !=null) { 
				redirect("gallery");
			}
			
		try { 
			// 1st we get the albums
			$resp = $this->facebook->call("get", "$fbPage/albums"); 
			if(isset($limit) && isset($until) && $mode == "next")
			$resp = $this->facebook->call("get", "$fbPage/albums?limit=".$limit."&until=".$until.""); 
			if(isset($limit) && isset($until) && $mode == "prev")
			$resp = $this->facebook->call("get", "$fbPage/albums?limit=".$limit."&since=".$until.""); 			
			if(count($resp->data) == 0 ) {
					$resp = $this->facebook->call("get", "$fbPage/albums"); 
				}

		}
		catch(Exception $e) { 
			$data["msg"] = "<h1>Photo Gallery</h1><hr/>";
			$data["msg"] .= "<div class='notice'>The gallery is down right now, just visit our <a href='http://www.facebook.com/$fbPage'>Facebook page instead!</a></div>";
			$data['page'] = 'msg';
			$this->load->view('main', $data);
			return;
		}
			if(isset($resp)) { 
				if(isset($resp->paging)) { 
					// then we see if there's any other albums after this set or before
					$prev = parse_url($resp->paging->previous);
					$next = parse_url($resp->paging->next);
					
					
					// parse the str cause we want it codeigniter style
					parse_str($next["query"], $next_param);
					parse_str($prev["query"], $prev_param);
				}
			}
			
			// cool, we parsed it, now lets go make a string
			if(isset($next_param["until"]))
			$data["next_url"] = $this->name . "/" . $next_param["limit"] . "/" . $next_param["until"] . "/next";
			
			if(isset($prev_param["since"]))
			$data["prev_url"] = $this->name . "/" . $prev_param["limit"] . "/" . $prev_param["since"] . "/prev";
			
			
	
			
			$albums = $resp->data;
			// cover photo image set up
			if(!empty($albums)):
				foreach($albums as $album) {
						try {
							//echo $album->cover_photo;
							if(isset($album->cover_photo))
							$resp = $this->facebook->call("get", $album->cover_photo);
						}
						catch(Exception $e) {
							/*
							break; // break out, since there isnt any album information going out to the user.
							//var_dump($e);
							$data["msg"] = "<h1>Photo Gallery</h1><hr/>";
							$data["msg"] .= "<div class='notice'>The gallery is down right now, just visit our <a href='http://www.facebook.com/$fbPage'>Facebook page instead!</a></div>";
							$data['page'] = 'msg';
							$this->load->view('includes/template', $data);
							die("The Facebook page is unable to power the gallery. Check back later.");
							*/
						}
							$album->cover_photo_info = $resp;
							//if(isset($resp->picture))
					
							if($resp->picture != null)
							$album->cover_photo_image = "<a href='/gallery/album/".$album->id."' alt=''><img src='".$resp->picture."'/></a>";
							else
							$album->cover_photo_image = "<a><img src='http://photos-b.ak.fbcdn.net/hphotos-ak-snc7/398017_301609529891739_191260047593355_941764_360764672_s.jpg' alt='No images in this album' title='No images in this album' /></a>";
						
				}
			endif;
			

			
			$data["albums"] = $albums;
			
			$data['page'] = 'gallery_view';
			$this->load->view('main', $data);
			
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