<?php

class DataModel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function CheckUniversal($table, $col, $par) {
        $this->db->select('*');
        $this->db->from($table);
        for ($i = 0; $i < count($col); $i++) {
            $this->db->where($col[$i], $par[$i]);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }

    function GetData($select, $table, $col, $par, $order = null) {
        $this->db->select($select);
        $this->db->from($table);
        for ($i = 0; $i < count($col); $i++) {
            $this->db->where($col[$i], $par[$i]);
        }
        !$order ?: $this->db->order_by($order);
        $query = $this->db->get();
        return $query->result_array();
    }

    function GetDataJoin($select, $table, $table2, $join_param, $col = [], $par = null, $order = null) {
        $this->db->select($select);
        $this->db->from($table);
        $this->db->join($table2, "$table.$join_param = $table2.$join_param");
        if($col != null){
            for ($i = 0; $i < count($col); $i++) {
                $this->db->where($col[$i], $par[$i]);
            }
        }
        !$order ?: $this->db->order_by($order);
        $query = $this->db->get();
        return $query->result_array();
    }

    function GetData2($select, $table, $where, $join = null, $order = null, $group = null) {
        $this->db->select($select);
        $this->db->from($table);
        if ($join != null) {
            foreach ($join as $j) {
                $this->db->join($j['table'], $j['condition'], $j['type']);
            }
        }
        !$where ?: $this->db->where($where);
        !$order ?: $this->db->order_by($order);
        !$group ?: $this->db->group_by($group);
        $query = $this->db->get();
        return $query->result_array();
    }

    function GetDataJoinLeft($select, $table, $table2, $join_param, $col, $par) {
        $this->db->select($select);
        $this->db->from($table);
        $this->db->join($table2, "$table.$join_param = $table2.$join_param", 'left');
        for ($i = 0; $i < count($col); $i++) {
            $this->db->where($col[$i], $par[$i]);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    function InsertData($table, $data) {
        $this->db->db_debug = true;
        $this->db->insert($table, $data);
        return $this->db->error();
    }

    function UpdateData($table, $col, $par, $data) {
        $this->db->db_debug = false;
        for ($i = 0; $i < count($col); $i++) {
            $this->db->where($col[$i], $par[$i]);
        }
        $this->db->update($table, $data);
        return $this->db->error();
    }

    function DeleteData($table, $col, $par) {
        $this->db->db_debug = false;
        for ($i = 0; $i < count($col); $i++) {
            $this->db->where($col[$i], $par[$i]);
        }
        $this->db->delete($table);
        return $this->db->error();
    }

    function GetRowData($select, $table, $col, $par) {
        $this->db->select($select);
        $this->db->from($table);
        for ($i = 0; $i < count($col); $i++) {
            $this->db->where($col[$i], $par[$i]);
        }
        $query = $this->db->get();
        return $query->row_array();
    }

    function GetDataPagination($select, $table, $join, $url, $per_page, $where = NULL, $order = NULL, $group = NULL, $like = NULL) {

        $this->db->start_cache();

        !$where ?: $this->db->where($where);

        !$like ?: $this->db->like($like);

        !$order ?: $this->db->order_by($order);

        !$group ?: $this->db->group_by($group);

        if ($join != null) {
            foreach ($join as $j) {
                $this->db->join($j['table'], $j['condition'], $j['type']);
            }
        }

        $query = $this->db->select($select)->from($table)->get();

        $page_number = $this->paginationSetting($query, $url, $per_page);

        $this->db->limit($per_page, $page_number);
        $this->db->stop_cache();

        $result = $this->db->get()->result_array();

        $this->db->flush_cache();

        return $result;
    }

    function GetDataPagination2($select, $table, $join, $url, $per_page, $where = NULL, $order = NULL, $group = NULL, $like = NULL) {
        $page = $this->input->get('page');
        $this->SetQueryForPagination($select, $table, $where, $like, $order, $group, $join);
        $page_number = $this->paginationSetting($this->db->get(), $url, $per_page);
        $this->SetQueryForPagination($select, $table, $where, $like, $order, $group, $join);
        $this->db->limit($per_page, $page_number);
        return $this->db->get()->result_array();
    }

    function SetQueryForPagination($select, $table, $where, $like, $order, $group, $join) {
        $this->db->select($select);
        $this->db->from($table);
        !$where ?: $this->db->where($where);
        !$like ?: $this->db->like($like);
        !$order ?: $this->db->order_by($order);
        !$group ?: $this->db->group_by($group);
        foreach ($join as $j) {
            $this->db->join($j['table'], $j['condition'], $j['type']);
        }
    }

    private function paginationSetting($query, $url, $per_page) {
        $this->load->library('pagination');
        $total_rows = $query->num_rows();
        $config = array(
            'base_url' => base_url($url),
            'per_page' => $per_page,
            'total_rows' => $total_rows,
            'num_links' => 2,
            'full_tag_open' => '<ul class="pagination pagination-secondary">',
            'full_tag_close' => '</ul>',
            'cur_tag_open' => '<li class="page-item active"><a href class="page-link">',
            'cur_tag_close' => '</a></li>',
            'num_tag_open' => '<li class="page-item">',
            'num_tag_close' => '</li>',
            'prev_tag_open' => '<li class="page-item">',
            'prev_link' => 'Previous',
            'prev_tag_close' => '</li>',
            'next_tag_open' => '<li class="page-item">',
            'next_link' => 'Next',
            'next_tag_close' => '</li>',
            'last_tag_open' => '<li class="page-item">',
            'last_tag_close' => '</li>',
            'first_tag_open' => '<li class="page-item">',
            'first_tag_close' => '</li>',
            'first_link' => '‹‹ First',
            'last_link' => 'Last ››',
            'query_string_segment' => 'page',
            'page_query_string' => TRUE,
            'reuse_query_string' => TRUE,
            'use_page_numbers' => TRUE,
            'attributes' => array('class' => 'page-link')
        );
        $page_number = $this->input->get('page') == NULL ? 0 : ($this->input->get('page') - 1) * $config['per_page'];
        $this->pagination->initialize($config);
        return $page_number;
    }
    
    function GetDataGroup($select, $table, $where, $like, $order, $group, $join = null) {
        $this->db->select($select);
        $this->db->from($table);
        !$where ?: $this->db->where($where);
        !$like ?: $this->db->like($like);
        !$order ?: $this->db->order_by($order);
        !$group ?: $this->db->group_by($group);
        if ($join != null) {
            foreach ($join as $j) {
                $this->db->join($j['table'], $j['condition'], $j['type']);
            }
        }
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function GetTotalDataPagination($select, $table, $join, $url, $per_page, $where = NULL, $order = NULL, $group = NULL, $like = NULL) {

        !$where ?: $this->db->where($where);

        !$like ?: $this->db->like($like);

        !$order ?: $this->db->order_by($order);

        !$group ?: $this->db->group_by($group);

        if ($join != null) {
            foreach ($join as $j) {
                $this->db->join($j['table'], $j['condition'], $j['type']);
            }
        }

        $query = $this->db->select($select)->from($table)->get();

        return $query->num_rows();;
    }

    public function uploadFile($name, $folder, $limit_size, $type, $rename) {

        $config['upload_path'] = './upload/' . $folder;
        $config['allowed_types'] = $type;
        $config['max_size'] = (1024 * $limit_size);
        $config['file_name'] = $rename . '_' . sha1(date('Y-m-d H:i:s'));
        $config['overwrite'] = TRUE;

        $this->upload->initialize($config, TRUE);

        if (!$this->upload->do_upload($name)) {
            return NULL;
        } else {
            $a = $this->upload->data();
            $newname = $config['file_name'] . $a['file_ext'];
            
            return $newname;
        }
    }

}

?>