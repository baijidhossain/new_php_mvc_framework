<?php


class UsersModel extends Model
{

    public function getUsers()
    {
        $customer_group_id = DEFAULT_REGISTRATION_GROUP;

        $data = $this->db->dataQuery("SELECT u.*, g.group_name FROM user AS u JOIN user_group_relation AS r ON r.user_id=u.id JOIN user_group as g on r.group_id = g.id WHERE r.group_id != ?", [$customer_group_id]);

        $pagination = Util::Pagination($data['item_count'], $data['page_number'], $data['item_limit']);

        return array_merge($data, $pagination);
    }

    public function setStatus($id, $status)
    {
        $row = $this->db->query("UPDATE user SET status = ? WHERE id = ?", $status, $id);

        return $row->affectedRows() > 0;
    }

    public function getUser($id)
    {
        $rows = $this->db->query("SELECT u.*, r.group_id FROM user AS u JOIN user_group_relation AS r ON r.user_id=u.id WHERE u.id = ?", $id);

        if ($rows->numRows() > 0) {
            return $rows->fetchArray();
        }

        return false;
    }

    public function getGroups()
    {
        $rows = $this->db->query("SELECT * FROM user_group WHERE id != 3");

        if ($rows->numRows() > 0) {
            return $rows->fetchAll();
        }

        return false;
    }

    public function update($data)
    {
        try {
            $this->db->beginTransaction();
            $this->db->query("DELETE FROM user_group_relation WHERE user_id = ?", $data['id']);
            $this->db->query("INSERT INTO user_group_relation (`user_id`, `group_id`, `created`) VALUES (?, ?, ?)", [$data['id'], $data['group_id'], TIMESTAMP]);
            $this->db->commit();

            return true;
        } catch (Exception $e) {
            $this->db->Rollback();

            return false;
        }
    }

    public function setPassword($user_id, $password)
    {
        $update = $this->db->query("UPDATE user SET password = ? WHERE id = ?", $password, $user_id);

        return $update->affectedRows() > 0;
    }

    public function getUserByEmail($email)
    {

        $email_search = $this->db->query("SELECT * FROM user WHERE email = ?", $email);
        if ($email_search->numRows() > 0) {

            return $email_search->fetchArray();
        }

        return false;
    }

    public function numberExists($num)
    {

        $number_search = $this->db->query("SELECT * FROM user WHERE phone = ?", $num);

        return $number_search->numRows() > 0;
    }

    public function AddUser($data)
    {
        $insert = $this->db->query("INSERT INTO `user`(`name`, `phone`, `email`, `password`, `status`, `created`) VALUES (?, ?, ?, ?, ?, ?)", [
            $data['name'],
            $data['phone'],
            $data['email'],
            $data['password'],
            $data['status'],
            TIMESTAMP
        ]);

        if ($insert) {

            $userid = $this->db->lastInsertID();
            $this->db->query('INSERT INTO user_group_relation (user_id,group_id,created) VALUES (?,?,?)', [$userid, $data['group_id'], TIMESTAMP]);

            return true;
        }

        return false;
    }
}
