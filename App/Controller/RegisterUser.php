<?php
namespace App\Controller;

use App\Model\User;
use League\Plates\Engine;
use PhpUtils\RandString;

class RegisterUser
{
    private $view;

    public function __construct($router)
    {
        $this->view = new Engine(__DIR__ . '/../../view', 'php');
        $this->view->addData(['router' => $router]);
        $this->router = $router;
        $this->user = new User();
    }

    /**
     * @return view
     */
    public function viewRegister()
    {
        echo $this->view->render('register');
    }

    /**
     * Create new user
     * @param array
     * @return string or bolean
     */
    public function createUser(array $data) : void
    {
        try {
            $name = $data['name'];
            $email = $data['email'];
            $password = md5($data['password']);
            $accept = $data['accept'];
            $birthDate = $data['birthDate'];
            $code = RandString::getRandString(10);

            $user = $this->user;
            $user->name_user = $name;
            $user->email_user = $email;
            $user->password_user = $password;
            $user->accept_user = $accept;
            $user->birth_date_user = $birthDate;
            $user->code_user = $code;
            $user->save();

            echo "true";
        } catch (\Exception $e) {
            echo $e;
        }
    }
}
