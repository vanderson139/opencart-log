<?php
class ControllerModuleLog extends Controller {

    private $events = array(
        'pre.admin.product.add',
        'post.admin.product.add',
        'pre.admin.product.edit',
        'post.admin.product.edit',
        'pre.admin.product.delete',
        'post.admin.product.delete',
        'pre.admin.attribute.add',
        'post.admin.attribute.add',
        'pre.admin.attribute.edit',
        'post.admin.attribute.edit',
        'pre.admin.attribute.delete',
        'post.admin.attribute.delete',
        'pre.admin.attribute_group.add',
        'post.admin.attribute_group.add',
        'pre.admin.attribute_group.edit',
        'post.admin.attribute_group.edit',
        'pre.admin.attribute_group.delete',
        'post.admin.attribute_group.delete',
        'pre.admin.category.add',
        'post.admin.category.add',
        'pre.admin.category.edit',
        'post.admin.category.edit',
        'pre.admin.category.delete',
        'post.admin.category.delete',
        'pre.admin.option.add',
        'post.admin.option.add',
        'pre.admin.option.edit',
        'post.admin.option.edit',
        'pre.admin.option.delete',
        'post.admin.option.delete',
        'pre.admin.download.add',
        'post.admin.download.add',
        'pre.admin.download.edit',
        'post.admin.download.edit',
        'pre.admin.download.delete',
        'post.admin.download.delete',
        'pre.admin.information.add',
        'post.admin.information.add',
        'pre.admin.information.edit',
        'post.admin.information.edit',
        'pre.admin.information.delete',
        'post.admin.information.delete',
        'pre.admin.banner.add',
        'post.admin.banner.add',
        'pre.admin.banner.edit',
        'post.admin.banner.edit',
        'pre.admin.banner.delete',
        'post.admin.banner.delete',
        'pre.admin.layout.add',
        'post.admin.layout.add',
        'pre.admin.layout.edit',
        'post.admin.layout.edit',
        'pre.admin.layout.delete',
        'post.admin.layout.delete',
        'pre.admin.filter.add',
        'post.admin.filter.add',
        'pre.admin.filter.edit',
        'post.admin.filter.edit',
        'pre.admin.filter.delete',
        'post.admin.filter.delete',
        'pre.admin.manufacturer.add',
        'post.admin.manufacturer.add',
        'pre.admin.manufacturer.edit',
        'post.admin.manufacturer.edit',
        'pre.admin.manufacturer.delete',
        'post.admin.manufacturer.delete',
        'pre.admin.recurring.add',
        'post.admin.recurring.add',
        'pre.admin.recurring.edit',
        'post.admin.recurring.edit',
        'pre.admin.recurring.delete',
        'post.admin.recurring.delete',
        'pre.admin.review.add',
        'post.admin.review.add',
        'pre.admin.review.edit',
        'post.admin.review.edit',
        'pre.admin.review.delete',
        'post.admin.review.delete',
        'pre.admin.marketing.add',
        'post.admin.marketing.add',
        'pre.admin.marketing.edit',
        'post.admin.marketing.edit',
        'pre.admin.marketing.delete',
        'post.admin.marketing.delete',
        'pre.admin.coupon.add',
        'post.admin.coupon.add',
        'pre.admin.coupon.edit',
        'post.admin.coupon.edit',
        'pre.admin.coupon.delete',
        'post.admin.coupon.delete',
        'pre.admin.store.add',
        'post.admin.store.add',
        'pre.admin.store.edit',
        'post.admin.store.edit',
        'pre.admin.store.delete',
        'post.admin.store.delete',
        'pre.admin.backup',
        'post.admin.backup',
        'pre.admin.affiliate.add',
        'post.admin.affiliate.add',
        'pre.admin.affiliate.edit',
        'post.admin.affiliate.edit',
        'pre.admin.affiliate.delete',
        'post.admin.affiliate.delete',
        'pre.admin.affiliate.approve',
        'post.admin.affiliate.approve',
        'pre.admin.affiliate.transaction.add',
        'post.admin.affiliate.transaction.add',
        'pre.admin.affiliate.transaction.delete',
        'post.admin.affiliate.transaction.delete',
        'pre.customer.logout',
        'post.customer.logout',
        'pre.customer.login',
        'post.customer.login',
        'pre.customer.add',
        'post.customer.add',
        'pre.customer.edit',
        'post.customer.edit',
        'pre.customer.password.edit',
        'post.customer.password.edit',
        'pre.customer.newsletter.edit',
        'pre.customer.newsletter.edit',
        'pre.customer.add.address',
        'post.customer.add.address',
        'pre.customer.edit.address',
        'post.customer.edit.address',
        'pre.customer.delete.address',
        'post.customer.delete.address',
        'pre.return.add',
        'post.return.add',
        'pre.review.add',
        'post.review.add',
        'pre.affiliate.add',
        'post.affiliate.add',
        'pre.affiliate.edit',
        'post.affiliate.edit',
        'pre.affiliate.payment.edit',
        'post.affiliate.payment.edit',
        'pre.affiliate.password.edit',
        'post.affiliate.password.edit',
        'pre.affiliate.transaction.add',
        'post.affiliate.transaction.add',
        'pre.order.add',
        'post.order.add',
        'pre.order.edit',
        'post.order.edit',
        'pre.order.delete',
        'post.order.delete',
        'pre.order.history.add',
        'post.order.history.add',

        'pre.admin.ia_artist.add',
        'post.admin.ia_artist.add',
        'pre.admin.ia_artist.edit',
        'post.admin.ia_artist.edit',
        'pre.admin.ia_artist.delete',
        'post.admin.ia_artist.delete',
        'pre.admin.ia_event.add',
        'post.admin.ia_event.add',
        'pre.admin.ia_event.edit',
        'post.admin.ia_event.edit',
        'pre.admin.ia_event.delete',
        'post.admin.ia_event.delete',
        'pre.admin.ia_company.add',
        'post.admin.ia_company.add',
        'pre.admin.ia_company.edit',
        'post.admin.ia_company.edit',
        'pre.admin.ia_company.delete',
        'post.admin.ia_company.delete',
        'pre.admin.ia_ticket.add',
        'post.admin.ia_ticket.add',
        'pre.admin.ia_ticket.edit',
        'post.admin.ia_ticket.edit',
        'pre.admin.ia_ticket.delete',
        'post.admin.ia_ticket.delete',
        'pre.admin.ia_ticket.type.add',
        'post.admin.ia_ticket.type.add',
        'pre.admin.ia_ticket.type.edit',
        'post.admin.ia_ticket.type.edit',
        'pre.admin.ia_ticket.type.delete',
        'post.admin.ia_ticket.type.delete',
    );

	public function index() {
		$this->load->language('module/log');

        $this->document->setTitle($this->language->get('heading_title'));
        $this->document->addStyle('view/javascript/jquery/json-viewer/jquery.json-viewer.css');
        $this->document->addScript('view/javascript/jquery/json-viewer/jquery.json-viewer.js');

		$this->load->model('module/log');

		$this->getList();
	}

    protected function getList() {
        if (isset($this->request->get['filter_event'])) {
            $filter_event = $this->request->get['filter_event'];
        } else {
            $filter_event = null;
        }

        if (isset($this->request->get['filter_user_id'])) {
            $filter_user_id = $this->request->get['filter_user_id'];
        } else {
            $filter_user_id = null;
        }

        if (isset($this->request->get['filter_date_added'])) {
            $filter_date_added = $this->request->get['filter_date_added'];
        } else {
            $filter_date_added = null;
        }

        if (isset($this->request->get['sort'])) {
            $sort = $this->request->get['sort'];
        } else {
            $sort = 'date_added';
        }

        if (isset($this->request->get['order'])) {
            $order = $this->request->get['order'];
        } else {
            $order = 'DESC';
        }

        if (isset($this->request->get['page'])) {
            $page = $this->request->get['page'];
        } else {
            $page = 1;
        }

        $url = '';

        if (isset($this->request->get['filter_event'])) {
            $url .= '&filter_event=' . urlencode(html_entity_decode($this->request->get['filter_event'], ENT_QUOTES, 'UTF-8'));
        }

        if (isset($this->request->get['filter_date_added'])) {
            $url .= '&filter_date_added=' . urlencode(html_entity_decode($this->request->get['filter_date_added'], ENT_QUOTES, 'UTF-8'));
        }

        if (isset($this->request->get['filter_user_id'])) {
            $url .= '&filter_user_id=' . $this->request->get['filter_user_id'];
        }

        if (isset($this->request->get['sort'])) {
            $url .= '&sort=' . $this->request->get['sort'];
        }

        if (isset($this->request->get['order'])) {
            $url .= '&order=' . $this->request->get['order'];
        }

        if (isset($this->request->get['page'])) {
            $url .= '&page=' . $this->request->get['page'];
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
            'href' => $this->url->link('module/log', 'token=' . $this->session->data['token'] . $url, 'SSL')
        );

        $data['logs'] = array();

        $filter_data = array(
            'filter_event'	  => $filter_event,
            'filter_user_id'	  => $filter_user_id,
            'filter_date_added'	  => $filter_date_added,
            'sort'            => $sort,
            'order'           => $order,
            'start'           => ($page - 1) * $this->config->get('config_limit_admin'),
            'limit'           => $this->config->get('config_limit_admin')
        );

        $logs_total = $this->model_module_log->getTotalLogs($filter_data);

        $results = $this->model_module_log->getLogs($filter_data);

        $this->load->model('user/user');

        $data['users'] = $this->model_user_user->getUsers();

        foreach ($results as $result) {
            $data['logs'][] = array(
                'log_id' => $result['logt_id'],
                'event'       => $result['event'],
                'data'       => $result['data'],
                'user'       => $this->model_user_user->getUser($result['user_id']),
                'date_added'       => $result['date_added'],
            );
        }

        $data['heading_title'] = $this->language->get('heading_title');

        $data['text_list'] = $this->language->get('text_list');
        $data['text_no_results'] = $this->language->get('text_no_results');

        $data['column_event'] = $this->language->get('column_event');
        $data['column_user'] = $this->language->get('column_user');
        $data['column_date_added'] = $this->language->get('column_date_added');
        $data['column_action'] = $this->language->get('column_action');

        $data['entry_event'] = $this->language->get('entry_event');
        $data['entry_user'] = $this->language->get('entry_user');
        $data['entry_date_added'] = $this->language->get('entry_date_added');

        $data['button_filter'] = $this->language->get('button_filter');

        $data['token'] = $this->session->data['token'];

        $url = '';

        if (isset($this->request->get['filter_event'])) {
            $url .= '&filter_event=' . urlencode(html_entity_decode($this->request->get['filter_event'], ENT_QUOTES, 'UTF-8'));
        }

        if (isset($this->request->get['filter_user_id'])) {
            $url .= '&filter_user_id=' . $this->request->get['filter_user_id'];
        }

        if (isset($this->request->get['filter_date_added'])) {
            $url .= '&filter_date_added=' . urlencode(html_entity_decode($this->request->get['filter_date_added'], ENT_QUOTES, 'UTF-8'));
        }

        if ($order == 'ASC') {
            $url .= '&order=DESC';
        } else {
            $url .= '&order=ASC';
        }

        if (isset($this->request->get['page'])) {
            $url .= '&page=' . $this->request->get['page'];
        }

        $data['sort_event'] = $this->url->link('module/log', 'token=' . $this->session->data['token'] . '&sort=event' . $url, 'SSL');
        $data['sort_date_added'] = $this->url->link('module/log', 'token=' . $this->session->data['token'] . '&sort=date_added' . $url, 'SSL');

        $url = '';

        if (isset($this->request->get['filter_event'])) {
            $url .= '&filter_event=' . urlencode(html_entity_decode($this->request->get['filter_event'], ENT_QUOTES, 'UTF-8'));
        }

        if (isset($this->request->get['filter_date_added'])) {
            $url .= '&filter_date_added=' . urlencode(html_entity_decode($this->request->get['filter_date_added'], ENT_QUOTES, 'UTF-8'));
        }

        if (isset($this->request->get['filter_user_id'])) {
            $url .= '&filter_user_id=' . $this->request->get['filter_user_id'];
        }

        if (isset($this->request->get['sort'])) {
            $url .= '&sort=' . $this->request->get['sort'];
        }

        if (isset($this->request->get['order'])) {
            $url .= '&order=' . $this->request->get['order'];
        }

        $pagination = new Pagination();
        $pagination->total = $logs_total;
        $pagination->page = $page;
        $pagination->limit = $this->config->get('config_limit_admin');
        $pagination->url = $this->url->link('module/log', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');

        $data['pagination'] = $pagination->render();

        $data['results'] = sprintf($this->language->get('text_pagination'), ($logs_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($logs_total - $this->config->get('config_limit_admin'))) ? $logs_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $logs_total, ceil($logs_total / $this->config->get('config_limit_admin')));

        $data['filter_event'] = $filter_event;
        $data['filter_user_id'] = $filter_user_id;
        $data['filter_date_added'] = $filter_date_added;

        $data['sort'] = $sort;
        $data['order'] = $order;

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('module/log_list.tpl', $data));
    }

    public function __call($method, $args) {
        $method = str_replace('_', '.', $method);

        foreach($this->events as $event) {

            $event = str_replace('_','.',$event);

            if($method == $event) {
                $this->load->model('module/log');

                $event_arr = explode('.', $event);
                $event_desc = '';

                foreach($event_arr as $arr) {
                    $event_desc .= ucfirst($arr) . ' ';
                }

                $log_data['event'] = trim($event_desc);
                $log_data['data'] = json_encode($args);
                $log_data['user_id'] = $this->user->getId();

                $this->model_module_log->addLog($log_data);

                break;
            }
        }
    }

    public function install() {

        $this->db->query('DROP TABLE IF EXISTS '. DB_PREFIX .'log');

        $query = "CREATE TABLE " . DB_PREFIX . "log (
              log_id int(11) NOT NULL AUTO_INCREMENT,
              user_id int(11) NOT NULL,
              event varchar(255) NOT NULL,
              data longtext NOT NULL,
              date_added datetime NOT NULL,
              PRIMARY KEY (log_id),
              KEY user_id (user_id),
              KEY event (event)
            ) ENGINE=MyISAM DEFAULT CHARSET=utf8";

        $this->db->query($query);

        $this->load->model('extension/event');

        foreach($this->events as $event) {
            $this->model_extension_event->addEvent('log', $event, 'module/log/' . str_replace('.', '_', $event));
        }
    }

    public function uninstall() {

        $this->db->query('DROP TABLE IF EXISTS ' . DB_PREFIX . 'log');

        $this->load->model('extension/event');

        $this->model_extension_event->deleteEvent('log');
    }
}