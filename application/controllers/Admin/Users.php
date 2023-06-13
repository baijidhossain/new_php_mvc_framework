<?php


class Users extends Controller
{

    public function Index()
    {

        $this->data['page_title'] = 'List of Users';
        $this->data['users']      = $this->model->getUsers();

        $this->view = 'users/index';

        $this->response();
    }

    public function Add()
    {

        if ($this->request->method === 'POST' && $this->request->verified) {

            $this->addUser();
            $this->redirect();
        }

        $this->data['groups']     = $this->model->getGroups();
        $this->data['page_title'] = 'Add New User';
        $this->data['action']     = 'add';
        $this->view               = 'users/modal';

        $this->response();
    }

    public function ChangeStatus($id, $status)
    {

        if (!$id || !isset($status)) {
            $this->setMessage('error', 'Invalid ID or Status');
        } else {
            if ($this->model->setStatus($id, $status)) {
                $this->setMessage('success', 'User status updated successfully');
            } else {
                $this->setMessage('error', 'Something went wrong');
            }
        }

        $this->redirect("/admin/users/");
    }

    public function Edit($id = NULL)
    {

        if ($this->request->method === 'POST' && $this->request->verified) {

            $this->updateUser();
            $this->redirect();
        }

        if (!$id) {
            $this->setMessage('error', 'Invalid User ID');
            $this->redirect();
        }

        $this->data['user']        = $this->model->getUser($id);
        $this->data['groups']      = $this->model->getGroups();

        $this->data['action'] = 'edit';

        $this->view = 'users/modal';

        $this->response();
    }

    private function updateUser()
    {

        $validated = Util::checkPostValues(['id', 'group_id']);

        if (!$validated) {

            $this->setMessage('error', 'Fill the form Correctly');

            return false;
        }

        $data = [
            'id' => $_POST['id'],
            'group_id' => $_POST['group_id']
        ];

        // update group
        if ($this->model->update($data)) {
            $this->setMessage('success', 'User updated successfully');
        } else {
            $this->setMessage('error', 'Something went wrong');
        }

        // update password if provided
        if (isset($_POST['password']) && !empty($_POST['password'])) {

            if (strlen($_POST['password']) < 8 || strlen($_POST['password']) > 20) {

                $this->setMessage('error', 'Password must be between 8 and 20 characters');

                return false;
            }

            if ($this->model->setPassword($_POST['id'], password_hash(trim($_POST['password']), PASSWORD_DEFAULT))) {

                $this->setMessage('success', 'Password changed successfully');

                return false;
            }

            $this->setMessage('error', 'Unknown error occurred.');
        }
    }

    /*
	 * Private Methods
	 */

    private function validateNumber($num)
    {
        $num    = ltrim($num, "+88");
        $number = '88' . ltrim($num, "88");

        $ext = ["88017", "88013", "88016", "88015", "88018", "88019", "88014"];
        if (is_numeric($number) && strlen($number) == 13) {
            if (in_array(substr($number, 0, 5), $ext)) {
                return $number;
            }

            return false;
        }

        return false;
    }

    private function addUser()
    {

        $validated = Util::checkPostValues(['name', 'email', 'phone', 'status', 'group_id', 'password']);

        //Verify Name
        if (strlen($_POST['name']) < 5) {
            $this->setMessage('error', 'Name must be at least 5 characters');

            return false;
        }

        //Verify Email
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

            $this->setMessage('error', 'Please enter a valid email');

            return false;
        }

        if ($this->model->getUserByEmail($_POST['email'])) {

            $this->setMessage('error', 'Email already registered');

            return false;
        }

        //Verify password
        if (strlen($_POST['password']) < 8 || strlen($_POST['password']) > 20) {

            $this->setMessage('error', 'Password must be between 8 and 20 characters');

            return false;
        }

        //Verify Mobile Number Format
        $checked_number = $this->validateNumber($_POST['phone']);

        if (!$checked_number) {

            $this->setMessage('error', 'Please enter a valid mobile number');

            return false;
        }

        $_POST['phone'] = $checked_number;

        if ($this->model->numberExists($checked_number)) {

            $this->setMessage('error', 'Mobile number already exists');

            return false;
        }

        $data = [
            'name'      => trim($_POST['name']),
            'email'     => trim($_POST['email']),
            'phone'     => $_POST['phone'],
            'status'    => !empty($_POST['status']) ? 1 : 0,
            'group_id'  => $_POST['group_id'],
            'password'  => password_hash(trim($_POST['password']), PASSWORD_DEFAULT),
        ];

        $insert = $this->model->AddUser($data);

        if ($insert) {
            $this->setMessage('success', 'User added successfully');
        } else {
            $this->setMessage('error', 'Could not add user');
        }

        return $insert;
    }
}
