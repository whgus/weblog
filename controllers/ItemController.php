<?php
    class ItemController extends Controller{
        public function indexAction(){ // /views/account/index.php
            $name = "";
            if(isset($_GET['name'])){
                $name = $_GET['name'];
            }

            $user = $this->_session->get('user');
            $followingUsers = $this->_connect_model->get('User')->getFollowingUser($user['id']);

            $index_view = $this->render(array(
                'user' => $user,
                'followingUsers' => $followingUsers,
            ));
            return $index_view;
        }
    }