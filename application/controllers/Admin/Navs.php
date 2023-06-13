<?php

class Navs extends Controller
{


    public function Index()
    {


        if (isset($_POST['update'])) {
            // check required fields
            $required = ['id', 'nav_icon', 'nav_name', 'nav_path', 'parent_id', 'group_id'];

            $validated = Util::checkPostValues($required);

            if ($validated) {
                $update = $this->model->update($_POST['id'], $_POST['nav_name'], $_POST['nav_path'], $_POST['parent_id'], $_POST['nav_icon'], $_POST['group_id']);

                $update ? $this->setMessage('success', 'Navigations are updated') : $this->setMessage('error', 'Something went wrong');
            } else {
                $this->setMessage('error', 'Fill the form correctly');
            }
            
        } elseif (isset($_POST['store'])) {

            // check required fields
            $required  = ['nav_icon', 'nav_name', 'nav_path', 'parent_id', 'group_id'];
            $validated = Util::checkPostValues($required);

            if ($validated) {
                $insert = $this->model->insert($_POST['nav_name'], $_POST['nav_path'], $_POST['parent_id'], $_POST['nav_icon'], $_POST['group_id']);

                $insert ? $this->setMessage('success', 'Navigation created successfully') : $this->setMessage('error', 'Something went wrong');

                // create associative files
                if (!empty($_POST['caf'])) {

                    $URL_PART = explode('/', $_POST['nav_path']);

                    $app_section = '';

                    $section = json_decode(file_get_contents(APP_PATH . "config/section.json"), true);

                    if (in_array(strtolower($URL_PART[0]), $section)) {

                        $app_section = ucfirst($URL_PART[0]) . '/';

                        unset($URL_PART[0]);

                        $URL_PART = array_values($URL_PART);
                    }

                    $controller = ucfirst($URL_PART[0]);

                    $method = ucfirst($URL_PART[1]);

                    if (is_file(CONTROLLER_PATH . $app_section . $controller . '.php')) {

                        require_once(CONTROLLER_PATH . $app_section . $controller . '.php');

                        $rc = new ReflectionClass($controller);

                        if (!$rc->hasMethod($method)) {

                            $method_template = "\n\tpublic function " . $method . "(){\n\n\t\t\$this->data['page_title'] = '" . $_POST['nav_name'] . "';\n\n\t\t\$this->view = '" . strtolower($controller . '/' . $method) . "';\n\n\t\t\$this->response();\n\n\t}";

                            $existing_code = file_get_contents(CONTROLLER_PATH . $app_section . $controller . '.php');

                            $existing_code = rtrim(rtrim($existing_code, "?>"), '}');

                            if (file_put_contents(CONTROLLER_PATH . $app_section . $controller . '.php', $existing_code . $method_template . "\n\n}")) {

                                if (is_file(VIEW_PATH . '_blank.php')) {

                                    file_put_contents(VIEW_PATH . $app_section . strtolower($controller . '/' . $method)  . '.php', file_get_contents(VIEW_PATH . '_blank.php'));
                                } else {

                                    $this->setMessage('error', 'Unable to create view file, Template not found!');
                                }
                            } else {

                                $this->setMessage('error', 'Unable to create method');
                            }
                        }
                    } else {

                        $controller_template = "<?php\r\n\nclass " . $controller . " extends Controller\n{\n\n\tpublic function " . $method . "()\n\t{\n\t\t\$this->data['page_title'] = '" . $_POST['nav_name'] . "';\n\n\t\t\$this->view = '" . strtolower($controller . '/' . $method) . "';\n\n\t\t\$this->response();\n\n\t}\n}";

                        $model_template = "<?php\r\n\nclass " . $controller . "Model extends Model\n{\n\n\t/*Insert Code Here*/\n\n}";

                        if (file_put_contents(CONTROLLER_PATH . $app_section . $controller . '.php', $controller_template)) {

                            if (file_put_contents(MODEL_PATH . $app_section . $controller . '.php', $model_template)) {

                                if (is_file(VIEW_PATH . '_blank.php')) {

                                    $dir = VIEW_PATH . $app_section . strtolower($controller);

                                    if (!is_dir($dir) && !mkdir($dir) && !is_dir($dir)) {
                                        throw new \RuntimeException(sprintf('Directory "%s" was not created', $dir));
                                    }

                                    file_put_contents($dir . '/' . strtolower($method) . '.php', file_get_contents(VIEW_PATH . '_blank.php'));
                                } else {

                                    $this->setMessage('error', 'Unable to create view file, Template not found!');
                                }
                            } else {

                                $this->setMessage('error', 'Unable to create model file');
                            }
                        } else {

                            $this->setMessage('error', 'Unable create controller');
                        }
                    }
                }
            } else {
                $this->setMessage('error', 'Fill the form correctly');
            }
        }

        //-----------------------------------------------------------------------------------------------------------------------------------------------------------------------

        $db_navs     = $this->model->getNavs();
        $permissions = $this->model->getPermissions();
        $db_groups   = $this->model->getGroups();

        // get all groups
        $groups = array_combine(
            array_column($db_groups, 'id'),
            array_column($db_groups, 'group_name')
        );
        // insert group ids to navs array
        $navs = [];
        foreach ($db_navs as $db_nav) {
            $navs[$db_nav['id']] = $db_nav;
        }

        if ($permissions) {
            foreach ($permissions as $p) {
                $navs[$p['nav_id']]['group_id'][] = $p['group_id'];
            }
        }

        $this->data = [
            'view_type'  => 'view',
            'page_title' => 'Control Navigations',
            'groups'     => $groups,
            'navs'       => $navs,
        ];

        $this->view = 'Navs';

        $this->response();
    }

    public function Add()
    {
        $icons = require(VIEW_PATH . 'fontawesome6.php');

        $this->data = [
            'view_type'  => 'modal',
            'page_title' => 'Add New Navigation Item',
            'navParents' => $this->model->getParents(),
            'groups'     => $this->model->getGroups(),
            'icons'      => $icons,
        ];

        $this->view = 'Navs';

        $this->response();
    }

    public function UpdateNav()
    {

        if (!isset($_POST['id']) || empty($_POST['id']) || !isset($_POST['parent_id']) || empty($_POST['parent_id'])) {
            $this->setMessage('error', 'Empty ID or Parent ID');
        }

        $update = $this->model->setNavs($_POST['id'], $_POST['parent_id']);

        if ($update) {
            $this->setMessage('success', 'Navigation successfully updated');
        } else {
            $this->setMessage('error', 'Something went wrong');
        }
    }

    public function Edit($id = 0)
    {
        $icons       = require(VIEW_PATH . 'fontawesome6.php');
        $permissions = $this->model->getPermissions();
        $this->data  = [
            'view_type'  => 'modal',
            'page_title' => 'Update this item',
            'icons'      => (!empty($icons) ? $icons : false),
            'navinfo'    => $this->model->getInfo($id),
            'navParents' => $this->model->getParents(),
            'groups'     => $this->model->getGroups(),
        ];

        $this->data['navinfo']['group_id'] = [];

        // push group ids
        if ($permissions) {
            foreach ($permissions as $p) {
                if ($p['nav_id'] == $id) {
                    $this->data['navinfo']['group_id'][] = $p['group_id'];
                }
            }
        }

        $this->view = 'Navs';

        $this->response();
    }

    public function Delete()
    {

        $id = 0;

        if (isset($_POST['id']) && !empty(($_POST['id']))) {
            $id = $_POST['id'];
        }

        $delete = $this->model->delete($id);

        $delete ? $this->setMessage('success', 'Item delete successful') : $this->setMessage('error', 'Unfortunately item is not deleted');

        $this->redirect('/admin/navs');
    }
}
