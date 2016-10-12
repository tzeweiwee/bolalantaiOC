<?php
/*
* Facebookpage Module
* Developed for OpenCart 2.x
* Author Gedielson Peixoto - http://www.gepeixoto.com.br
* @03/2015
* Under GPL license.
*/
class ControllerModuleFbpage extends Controller {
  private $error = array(); 

  public function index() {
    $this->load->language('module/fbpage');

		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('fbpage', $this->request->post);
			
			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('extension/module', 'token=' . $this->session->data['token'], true));
		}
    
    $texts = array(
      'heading_title',
      'text_module',
      'text_success',
      'text_edit',
      'text_yes',
      'text_no',
      'text_enable_messages',
      'text_enabled',
      'text_disabled',
      'entry_title',
      'entry_app_id',
      'entry_page_url',
      'entry_width',
      'entry_height',
      'entry_small_header',
      'entry_show_cover',
      'entry_show_faces',
      'entry_tabs',
      'entry_calltoaction',
      'entry_locale',
      'entry_status',
      'help_title',
      'help_app_id',
      'help_calltoaction',
      'help_locale',
      'button_save',
      'button_cancel'
    );
    
    foreach($texts as $text) {
      $data[$text] = $this->language->get($text);
    }
    
    if (isset($this->error['warning'])) {
      $data['error_warning'] = $this->error['warning'];
    } else {
      $data['error_warning'] = '';
    }

    if (isset($this->error['app_id'])) {
      $data['error_app_id'] = $this->error['app_id'];
    } else {
      $data['error_app_id'] = '';
    }
    
    if (isset($this->error['page_url'])) {
      $data['error_page_url'] = $this->error['page_url'];
    } else {
      $data['error_page_url'] = '';
    }
    
    if (isset($this->error['width'])) {
      $data['error_width'] = $this->error['width'];
    } else {
      $data['error_width'] = '';
    }
    
    if (isset($this->error['height'])) {
      $data['error_height'] = $this->error['height'];
    } else {
      $data['error_height'] = '';
    }
    
    $data['breadcrumbs'] = array();

    $data['breadcrumbs'][] = array(
      'text'      => $this->language->get('text_home'),
      'href'      => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
    );

    $data['breadcrumbs'][] = array(
      'text'      => $this->language->get('text_module'),
      'href'      => $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL')
    );

    $data['breadcrumbs'][] = array(
      'text'      => $this->language->get('heading_title'),
      'href'      => $this->url->link('module/fbpage', 'token=' . $this->session->data['token'], 'SSL')
    );
    
    $data['action'] = $this->url->link('module/fbpage', 'token=' . $this->session->data['token'], 'SSL');
    $data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');

    $lang = $this->config->get('config_language');
    $locale = ($lang == 'pt-br') ? 'pt_BR' : 'en_US';
    
    $datas = array(
      'fbpage_title'        => '',
      'fbpage_app_id'       => '',
      'fbpage_page_url'     => '',
      'fbpage_width'        => '260',
      'fbpage_height'       => '300',
      'fbpage_small_header' => 0,
      'fbpage_show_cover'   => 1,
      'fbpage_show_faces'   => 1,
      'fbpage_tabs'         => array('timeline'),
      'fbpage_calltoaction' => 1,
      'fbpage_locale'       => $locale,
      'fbpage_status'       => 0
    );
    
    foreach ($datas as $key => $value) {
      if (isset($this->request->post[$key])) {
        $data[$key] = $this->request->post[$key];
      } elseif ($this->config->get($key)) {
        $data[$key] = $this->config->get($key);
      } else $data[$key] = $value;
    }
    
    $data['tabs'] = array();
    
    $tabs = array('timeline', 'events', 'messages');
    
    foreach ($tabs as $tab) {
      $data['tabs'][] = array(
        'value' => $tab,
        'title' => $this->language->get('text_' . $tab),
        'help'  => $this->language->get('help_tab_' . $tab)
      );
    }
    
    $data['header'] = $this->load->controller('common/header');
    $data['column_left'] = $this->load->controller('common/column_left');
    $data['footer'] = $this->load->controller('common/footer');

    if (VERSION < '2.2.0.0') {
      $this->response->setOutput($this->load->view('module/fbpage.tpl', $data));
    } else {
      $this->response->setOutput($this->load->view('module/fbpage', $data));
    }
  }
  
  protected function validate() {
    if (!$this->user->hasPermission('modify', 'module/fbpage')) {
      $this->error['warning'] = $this->language->get('error_permission');
    }
    
    if (!$this->request->post['fbpage_app_id']) {
      $this->error['app_id'] = $this->language->get('error_app_id');
    }

    if (!$this->request->post['fbpage_page_url']) {
      $this->error['page_url'] = $this->language->get('error_page_url');
    }
    
    if ($this->request->post['fbpage_width'] < 180 || $this->request->post['fbpage_width'] > 500) {
      $this->error['width'] = $this->language->get('error_width');
    }
    
    if ($this->request->post['fbpage_height'] < 70) {
      $this->error['height'] = $this->language->get('error_height');
    }

    return !$this->error;
  }
}