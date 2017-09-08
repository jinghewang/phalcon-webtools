<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class RiderUserController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for riderUser
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'RiderUserModel', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "id";

        $rp_rider_user = RiderUserModel::find($parameters);
        if (count($rp_rider_user) == 0) {
            $this->flash->notice("The search did not find any riderUser");

            $this->dispatcher->forward([
                "controller" => "riderUser",
                "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $rp_rider_user,
            'limit'=> 10,
            'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displays the creation form
     */
    public function newAction()
    {

    }

    /**
     * Edits a rp_rider_user
     *
     * @param string $id
     */
    public function editAction($id)
    {
        if (!$this->request->isPost()) {

            $rp_rider_user = RiderUserModel::findFirstByid($id);
            if (!$rp_rider_user) {
                $this->flash->error("rp_rider_user was not found");

                $this->dispatcher->forward([
                    'controller' => "riderUser",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->id = $rp_rider_user->id;

            $this->tag->setDefault("id", $rp_rider_user->id);
            $this->tag->setDefault("mobile", $rp_rider_user->mobile);
            $this->tag->setDefault("name", $rp_rider_user->name);
            $this->tag->setDefault("rider_company_id", $rp_rider_user->rider_company_id);
            $this->tag->setDefault("rider_site_id", $rp_rider_user->rider_site_id);
            $this->tag->setDefault("idcard_img", $rp_rider_user->idcard_img);
            $this->tag->setDefault("health_img", $rp_rider_user->health_img);
            $this->tag->setDefault("status", $rp_rider_user->status);
            $this->tag->setDefault("is_delete", $rp_rider_user->is_delete);
            $this->tag->setDefault("create_time", $rp_rider_user->create_time);
            $this->tag->setDefault("longitude", $rp_rider_user->longitude);
            $this->tag->setDefault("latitude", $rp_rider_user->latitude);
            $this->tag->setDefault("update_time", $rp_rider_user->update_time);
            $this->tag->setDefault("password", $rp_rider_user->password);
            
        }
    }

    /**
     * Creates a new rp_rider_user
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "riderUser",
                'action' => 'index'
            ]);

            return;
        }

        $rp_rider_user = new RiderUserModel();
        $rp_rider_user->id = $this->request->getPost("id");
        $rp_rider_user->mobile = $this->request->getPost("mobile");
        $rp_rider_user->name = $this->request->getPost("name");
        $rp_rider_user->rider_company_id = $this->request->getPost("rider_company_id");
        $rp_rider_user->rider_site_id = $this->request->getPost("rider_site_id");
        $rp_rider_user->idcard_img = $this->request->getPost("idcard_img");
        $rp_rider_user->health_img = $this->request->getPost("health_img");
        $rp_rider_user->status = $this->request->getPost("status");
        $rp_rider_user->is_delete = $this->request->getPost("is_delete");
        $rp_rider_user->create_time = $this->request->getPost("create_time");
        $rp_rider_user->longitude = $this->request->getPost("longitude");
        $rp_rider_user->latitude = $this->request->getPost("latitude");
        $rp_rider_user->update_time = $this->request->getPost("update_time");
        $rp_rider_user->password = $this->request->getPost("password");
        

        if (!$rp_rider_user->save()) {
            foreach ($rp_rider_user->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "riderUser",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("rp_rider_user was created successfully");

        $this->dispatcher->forward([
            'controller' => "riderUser",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a rp_rider_user edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "riderUser",
                'action' => 'index'
            ]);

            return;
        }

        $id = $this->request->getPost("id");
        $rp_rider_user = RiderUserModel::findFirstByid($id);

        if (!$rp_rider_user) {
            $this->flash->error("rp_rider_user does not exist " . $id);

            $this->dispatcher->forward([
                'controller' => "riderUser",
                'action' => 'index'
            ]);

            return;
        }

        $rp_rider_user->id = $this->request->getPost("id");
        $rp_rider_user->mobile = $this->request->getPost("mobile");
        $rp_rider_user->name = $this->request->getPost("name");
        $rp_rider_user->rider_company_id = $this->request->getPost("rider_company_id");
        $rp_rider_user->rider_site_id = $this->request->getPost("rider_site_id");
        $rp_rider_user->idcard_img = $this->request->getPost("idcard_img");
        $rp_rider_user->health_img = $this->request->getPost("health_img");
        $rp_rider_user->status = $this->request->getPost("status");
        $rp_rider_user->is_delete = $this->request->getPost("is_delete");
        $rp_rider_user->create_time = $this->request->getPost("create_time");
        $rp_rider_user->longitude = $this->request->getPost("longitude");
        $rp_rider_user->latitude = $this->request->getPost("latitude");
        $rp_rider_user->update_time = $this->request->getPost("update_time");
        $rp_rider_user->password = $this->request->getPost("password");
        

        if (!$rp_rider_user->save()) {

            foreach ($rp_rider_user->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "riderUser",
                'action' => 'edit',
                'params' => [$rp_rider_user->id]
            ]);

            return;
        }

        $this->flash->success("rp_rider_user was updated successfully");

        $this->dispatcher->forward([
            'controller' => "riderUser",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a rp_rider_user
     *
     * @param string $id
     */
    public function deleteAction($id)
    {
        $rp_rider_user = RiderUserModel::findFirstByid($id);
        if (!$rp_rider_user) {
            $this->flash->error("rp_rider_user was not found");

            $this->dispatcher->forward([
                'controller' => "riderUser",
                'action' => 'index'
            ]);

            return;
        }

        if (!$rp_rider_user->delete()) {

            foreach ($rp_rider_user->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "riderUser",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("rp_rider_user was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "riderUser",
            'action' => "index"
        ]);
    }

}
