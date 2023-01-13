<?php

declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController; //use is used to include the class.
use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\Mailer\Mailer;
use Cake\Mailer\TransportFactory;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $users = $this->paginate($this->Users);  // user is model

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        $fileName2 = $user['file'];
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $productImage = $this->request->getData("file");
            $fileName = $productImage->getClientFilename();
            if ($fileName == '') {
                $fileName = $fileName2;
            }
            $data["file"] = $fileName;
            $user = $this->Users->patchEntity($user, $data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }


        return $this->redirect(['action' => 'index']);
    }
    //login funtin
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect(['controller' => 'users']);
            }
            //not login
            $this->Flash->error('Please enter your correct login credentials');
        }
    }
    //logout function
    public function logout()
    {
        $this->Flash->success('You are Loged out');
        return $this->redirect($this->Auth->logout());
    }

    //registration funtion
    public function register()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $productImage = $this->request->getData("file");
            $fileName = $productImage->getClientFilename();
            $data["file"] = $fileName;
            $user = $this->Users->patchEntity($user, $data);
            if ($this->Users->save($user)) {
                $this->Flash->success('You are Registered and you can login now');
                return $this->redirect(['action' => 'login']);
            } else {
                $this->Flash->error('Something went wrong');
            }
        }
        $this->set(compact('user'));
        $this->set('_serialzie', ['user']);
    }

    public function beforeFilter($event)
    {
        $this->Auth->allow(['register']);
        $this->Auth->allow(['forgot']);
        $this->Auth->allow(['reset']);
        $this->Auth->allow(['getotp']);
        $this->Auth->allow(['logout']);
    }
    public function forgot()
    {
        // $this->viewBuilder()->setLayout('mydefault');
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $email = $this->request->getData('email');
            $user->email = $email;
            $result = $this->Users->checkemail($email);
            if ($result) {
                $token = rand(10000, 99999);
                $result = $this->Users->insertToken($email, $token);

                $mailer = new Mailer('default');
                $mailer->setTransport('gmail'); //your email configuration name
                $mailer->setFrom(['akshatsood1234@gmail.com' => 'Code The Pixel']);
                $mailer->setTo($email);
                $mailer->setEmailFormat('html');
                $mailer->setSubject('O.T.P');
                $mailer->deliver("$token is your one time password for dragon layer");

                $this->Flash->success(__('Reset email send successfully.'));

                return $this->redirect(['action' => 'getotp']);
            }
            $this->Flash->error(__('Please enter valid credential..'));
        }
        $this->set(compact('user'));
    }
    public function getotp()
    {

        // $this->viewBuilder()->setLayout('mydefault');
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {

            $token = $this->request->getData('token');
            $result = $this->Users->checktokenexist($token);

            if ($result) {
                $session = $this->getRequest()->getSession(); //get session
                $session->write('token', $token); //write name value to session
                return $this->redirect(['action' => 'reset']);
            }
            $this->Flash->error(__('Please enter valid password'));
            // } else {
            //     return $this->redirect(['action' => 'login']);
        }
        $this->set(compact('user'));
    }
    public function reset()
    {
        $session = $this->request->getSession(); //read session data
        if ($session->read('token') != null) {
        } else {
            $this->redirect(['action' => 'login']);
        }
        $token = $session->read('token');
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $password = $this->request->getData('password');
            $result = preg_match('(^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]*).{8,}$)', $password);
            $confirm_password = $this->request->getData('confirm_password');
            if ($result == 1 && $password == $confirm_password) {
                $res = $this->Users->resetPassword($token, $password);
                if ($res) {
                    $session->destroy();
                    $this->Flash->success(__('Password updated successfully.'));
                    return $this->redirect(['action' => 'login']);
                }
            }
            $this->Flash->error(__('Please enter valid password'));
        }
        $this->set(compact('user'));
    }

    public $paginate = [
        'limit' => 4
    ];
}
