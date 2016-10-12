<?php
class ControllerModuleInstagram extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('module/instagram');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('extension/module');


		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			
			if (!isset($this->request->get['module_id'])) {
				$this->model_extension_module->addModule('instagram', $this->request->post);
			} else {
				$this->model_extension_module->editModule($this->request->get['module_id'], $this->request->post);
			}

			$this->cache->delete('product');

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'));
		}

		$data['heading_title'] = $this->language->get('heading_title');
		
		$data['text_edit'] = $this->language->get('text_edit');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		
		$data['entry_limit'] = $this->language->get('entry_limit');
		$data['entry_image'] = $this->language->get('entry_image');
		$data['entry_width'] = $this->language->get('entry_width');
		$data['entry_height'] = $this->language->get('entry_height');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_resolution'] = $this->language->get('entry_resolution');
		$data['entry_name'] = $this->language->get('entry_name');		
		$data['entry_likes'] = $this->language->get('entry_likes');
		$data['entry_comments'] = $this->language->get('entry_comments');	
		$data['entry_username'] = $this->language->get('entry_username');	
	

		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');
		$data['button_module_add'] = $this->language->get('button_module_add');
		$data['button_remove'] = $this->language->get('button_remove');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->error['image'])) {
			$data['error_image'] = $this->error['image'];
		} else {
			$data['error_image'] = array();
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_module'),
			'href' => $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('module/instagram', 'token=' . $this->session->data['token'], 'SSL')
		);


		if (!isset($this->request->get['module_id'])) {
			$data['action'] = $this->url->link('module/instagram', 'token=' . $this->session->data['token'], 'SSL');
		} else {
			$data['action'] = $this->url->link('module/instagram', 'token=' . $this->session->data['token'] . '&module_id=' . $this->request->get['module_id'], 'SSL');
		}

		$data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');

		if (isset($this->request->get['module_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$module_info = $this->model_extension_module->getModule($this->request->get['module_id']);
		}

		
		if (isset($this->request->post['status'])) {
			$data['status'] = $this->request->post['status'];
		} elseif (!empty($module_info)) {
			$data['status'] = $module_info['status'];
		} else {
			$data['status'] = '';
		}
		
		if (isset($this->request->post['name'])) {
			$data['name'] = $this->request->post['name'];
		} elseif (!empty($module_info)) {
			$data['name'] = $module_info['name'];
		} else {
			$data['name'] = '';
		}		
		
		if (isset($this->request->post['limit'])) {
			$data['limit'] = $this->request->post['limit'];
		} elseif (!empty($module_info)) {
			$data['limit'] = $module_info['limit'];
		} else {
			$data['limit'] = 5;
		}
		
		if (isset($this->request->post['resolution'])) {
			$data['resolution'] = $this->request->post['resolution'];
		} elseif (!empty($module_info)) {
			$data['resolution'] = $module_info['resolution'];
		} else {
			$data['resolution'] = 'low_resolution';
		}				
		
		if (isset($this->request->post['username'])) {
			$data['username'] = $this->request->post['username'];
		} elseif (!empty($module_info)) {
			$data['username'] = $module_info['username'];
		} else {
			$data['username'] = '';
		}			

		if (isset($this->request->post['likes'])) {
			$data['likes'] = $this->request->post['likes'];
		} elseif (!empty($module_info)) {
			if(isset($module_info['likes'])) {
			$data['likes'] = $module_info['likes'];
			}else{
			$data['likes'] = '';	
			}
		} else {
			$data['likes'] = 1;
		}
		
		if (isset($this->request->post['comments'])) {
			$data['comments'] = $this->request->post['comments'];
		} elseif (!empty($module_info)) {
			if(isset($module_info['comments'])) {
				$data['comments'] = $module_info['comments'];
			}else{
				$data['comments'] = '';
			}
		} else {
			$data['comments'] = 1;
		}		
		
		
	
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('module/instagram.tpl', $data));
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'module/instagram')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (isset($this->request->post['instagram_module'])) {
			foreach ($this->request->post['instagram_module'] as $key => $value) {
				/*if (!$value['width'] || !$value['height']) {
					$this->error['image'][$key] = $this->language->get('error_image');
				}*/
			}
		}

		return !$this->error;
	}
}