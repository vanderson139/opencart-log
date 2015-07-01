<?php
class ModelModuleLog extends Model {

    public function addLog($data) {

        return $this->db->query("INSERT INTO " . DB_PREFIX . "log SET event = '" . $this->db->escape($data['event']) . "', data = '" . $this->db->escape($data['data']) . "', user_id = '". (int)$data['user_id'] ."', date_added = NOW()");
    }
}