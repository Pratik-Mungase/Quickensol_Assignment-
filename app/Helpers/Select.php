<?php

namespace App\Helpers;

class Select
{
    public function select(string $table = '', array $condition = [])
    {
        if (empty($table))
            return 'Table Name is Empty Provide';
        return $this->_getData($table, $condition);
    }
    /** Protected function to actually Query the Database */
    private function _getData($table, array $params)
    {
        # Get the required Libraries, Models, Views, etc.
        $db = \Config\Database::connect();

        $query = $db->table($table);
        if (!empty($params['where']))
            $query->where($params['where']);
        if (!empty($params['orWhere']))
            $query->orWhere($params['orWhere']);
        if (!empty($params['where_in']))
            foreach ($params['where_in'] as $where => $value)
                $query->whereIn($where, $value);
        $query->orderBy((empty($params['order_by']) ? 'id ASC' : $params['order_by']));
        $query->groupBy((empty($params['group_by']) ? 'id' : $params['group_by']));
        # Query and Get the Data
        $query = $query->get()->getResultArray();
        return $query;
    }
}
