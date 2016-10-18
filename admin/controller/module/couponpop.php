<?php class ControllerModuleCouponPop extends Controller {
        private $error = array();

        public function index() {
                $this->load->language('module/couponpop');
                $this->document->setTitle($this->language->get('heading_title'));

                $this->load->model('setting/setting');

                if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
                        $this->model_setting_setting->editSetting('couponpop', $this->request->post);

                        $this->session->data['success'] = $this->language->get('text_success');

                       $this->response->redirect($this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'));
                }
				$data = array();
                $data['heading_title'] = $this->language->get('heading_title');
				$data['couponpop'] = html_entity_decode($this->config->get('couponpop'));
                $data['coupon_pop_code'] = $this->language->get('coupon_pop_code');
				$data['text_edit'] = 'Edit';
                $data['button_save'] = $this->language->get('button_save');
                $data['button_cancel'] = $this->language->get('button_cancel');
                $data['button_add_module'] = $this->language->get('button_add_module');
                $data['button_remove'] = $this->language->get('button_remove');
                $data['breadcrumbs'] = array();
                $data['breadcrumbs'][] = array(
                'text' => $this->language->get('text_home'),
                        'href' => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
                'separator' => false
                );
                $data['breadcrumbs'][] = array(
                'text' => $this->language->get('text_module'),
                        'href' => $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'),
                'separator' => ' :: '
                );

                $data['action'] = $this->url->link('module/couponpop', 'token=' . $this->session->data['token'], 'SSL');

                $data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');
				                if (isset($this->request->post['couponpop'])) {
                        $data['couponpop'] = $this->request->post['couponpop'];
                }

              
					$data['header'] = $this->load->controller('common/header');
					$data['column_left'] = $this->load->controller('common/column_left');
				$data['footer'] = $this->load->controller('common/footer');
				$this->response->setOutput($this->load->view('module/couponpop.tpl', $data));
         }
        }
?>
