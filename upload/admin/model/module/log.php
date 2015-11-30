<?php
class ModelModuleLog extends Model {

    public function addLog($data) {

        return $this->db->query("INSERT INTO " . DB_PREFIX . "log SET event = '" . $this->db->escape($data['event']) . "', data = '" . $this->db->escape($data['data']) . "', user_id = '". (int)$data['user_id'] ."', date_added = NOW()");
    }

    public function getLogs($data = array()) {
        $sql = "SELECT * FROM " . DB_PREFIX . "log WHERE 1=1 ";

        if (!empty($data['filter_user_id'])) {
            $sql .= " AND user_id = '" . (int)$data['filter_user_id'] . "'";
        }

        if (!empty($data['filter_event'])) {
            $sql .= " AND event LIKE '%" . $this->db->escape($data['filter_event']) . "%'";
        }

        if (isset($data['filter_date_added']) && !is_null($data['filter_date_added'])) {
            $sql .= " AND DATE(date_added) = '" . $this->db->escape($data['filter_date_added']) . "'";
        }

        $sort_data = array(
            'event',
            'date_added'
        );

        if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
            $sql .= " ORDER BY " . $data['sort'];
        } else {
            $sql .= " ORDER BY event";
        }

        if (isset($data['order']) && ($data['order'] == 'DESC')) {
            $sql .= " DESC";
        } else {
            $sql .= " ASC";
        }

        if (isset($data['start']) || isset($data['limit'])) {
            if ($data['start'] < 0) {
                $data['start'] = 0;
            }

            if ($data['limit'] < 1) {
                $data['limit'] = 20;
            }

            $sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
        }

        $query = $this->db->query($sql);

        return $query->rows;
    }

    public function getTotalLogs($data = array()) {
        $sql = "SELECT COUNT(log_id) AS total FROM " . DB_PREFIX . "log WHERE 1=1 ";

        if (!empty($data['filter_user_id'])) {
            $sql .= " AND user_id = '" . (int)$data['filter_user_id'] . "'";
        }

        if (!empty($data['filter_event'])) {
            $sql .= " AND event LIKE '%" . $this->db->escape($data['filter_event']) . "%'";
        }

        if (isset($data['filter_date_added']) && !is_null($data['filter_date_added'])) {
            $sql .= " AND DATE(date_added) = '" . $this->db->escape($data['filter_date_added']) . "'";
        }

        $query = $this->db->query($sql);

        return $query->row['total'];
    }

    public function getActiveEvents() {
        $active_events = array();

        $query = $this->db->query("SELECT `trigger` FROM " . DB_PREFIX . "event WHERE `code` = 'log'");

        if($query->num_rows) {
            foreach($query->rows as $row) {
                $active_events[] = $row['trigger'];
            }
        }

        return $active_events;
    }

    public function clear() {
        return $this->db->query("TRUNCATE TABLE " . DB_PREFIX . "log");
    }
}
