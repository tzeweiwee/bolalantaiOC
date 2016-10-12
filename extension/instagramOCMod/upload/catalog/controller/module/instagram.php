<?php
class ControllerModuleInstagram extends Controller {
	public function index($setting) {

		$this->load->language('module/instagram');
		$this->load->model('tool/image');
		
		$this->document->addStyle('catalog/view/theme/default/stylesheet/instagram.css');
		
		$data['heading_title'] = $this->language->get('heading_title');
		$data['instagrams'] = array();

		$url = "https://www.instagram.com/".$setting['username']."/media/";
		//$url = "https://api.instagram.com/v1/users/1701571088/media" ;
		$ch = curl_init($url); 
		
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
		
		$json = curl_exec($ch); 
		curl_close($ch);
		$result = json_decode($json);

		$results = array_slice($result->items, 0, $setting['limit']);

		if ($results) {
			foreach ($results as $post) {
				if (isset($post->caption->text)) {
					$caption = $this->validatedate($post->caption->text);	
				}else{
					$caption = '';
				}
				/*if ($result['image']) {
					$image = $this->model_tool_image->resize($result['image'], $setting['width'], $setting['height']);
				} else {
					$image = $this->model_tool_image->resize('placeholder.png', $setting['width'], $setting['height']);
				}*/
				$comments=array();
				$likes = 0;

				if(isset($setting['comments'])==1) {
					$comments = $post->comments->data;	
				}
				if(isset($setting['likes'])==1) {
					$likes = $post->likes->count;	
				}	
				
				$user = $post->user;	

				$data['instagrams'][] = array(
					'thumb'       => $post->images->$setting['resolution']->url,
					'description' => $caption, 
					'href'        => $post->link,
					'date'		=> htmlentities(date("F j, Y", $post->created_time)),
					'comments' => $comments,
					'likes'	=> $likes,
					'user' => $user
				);
			}

			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/instagram.tpl')) {
				return $this->load->view($this->config->get('config_template') . '/template/module/instagram.tpl', $data);
			} else {
				return $this->load->view('default/template/module/instagram.tpl', $data);
			}
		}
	}
	
	public function validatedate($text) {
			if (date('y-m-d', strtotime($text)) == $text) {
				 return '';
			}else{
				return $text.'-';
				}
		}
}