<?php

class HomeModel extends Model
{
    public function getLogs($server_id)
    {
        return  $this->db->Query("SELECT log.*, user.name AS user_name FROM log LEFT JOIN user ON log.uid = user.id WHERE log.sid = ? ORDER BY log.id DESC LIMIT 10", $server_id)->fetchAll();
    }

}
