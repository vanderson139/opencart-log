<?php
class ControllerModuleLog extends Controller {

    private $events = array(
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
    );

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
                $log_data['user_id'] = $this->session->data['api_id'];

                $this->model_module_log->addLog($log_data);
                break;
            }
        }
    }
}