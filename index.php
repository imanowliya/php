<?php

// echo "iman" . "<br>";

// class users
// {
//     public $name = "iman";
//     public $family = "owliya";
//     public $username;
//     public $password;

//     public function save()
//     {
//         var_dump($this->username, $this->password);
//         echo " saved in database!";
//     }
// }

// $person = new users();


// $person->username = "itsiman";
// $person->password = "iman1234";


// var_dump($person);
// echo "<br>";

// var_dump("username is:  " . $person->username);
// echo "<br>";
// var_dump("password is:  " . $person->password);

// $person->save();
// var_dump($person->save());
// echo "<br>";






// class user
// {

//     public $name = "iman";
//     public $family = "owliya";
//     public $username = "itsiman";
//     public $password = "123456";

//     public function save()
//     {
//         var_dump($this->name, $this->family);
//         echo "saved in database!";
//     }
// }

// $person = new user();

// // $person->username = "itsiman";
// // $person->password = "123456";



// $person->save();



class User
{

    public $id;
    public $name;
    public $username;
    public $email;
    public $is_admin;
    public $is_active;

    public $users = [
        [
            "id" => 1,
            "name" => "iman",
            "username" => "itsiman",
            "email" => "iman.owliya@gmail.com",
            "is_admin" => true,
            "is_active" => true,
        ],
        [
            "id" => 2,
            "name" => "ali",
            "username" => "soltani",
            "email" => "ali.soltani@gmail.com",
            "is_admin" => false,
            "is_active" => true,
        ],
        [
            "id" => 3,
            "name" => "amir",
            "username" => "rahimi",
            "email" => "amirrahimi@gmail.com",
            "is_admin" => false,
            "is_active" => false,
        ],
    ];

    // public function __construct(public $id = null, public $name = null, public $username = null, public $email = null, public $is_admin = null, public $is_active = null){}

    public function __construct($id = null, $name = null, $username = null, $email = null, $is_admin = null, $is_active = null)
    {
        // $this->id = $id;
        // $this->name = $name;
        // $this->username = $username;
        // $this->email = $email;
        // $this->is_admin = $is_admin;
        // $this->is_active = $is_active;
    }

    // متد هست این که دنبال کاربر میگرده
    public function find($user_id)
    {

        $user = $this->findUserById($user_id);

        $user = array_shift($user);

        if (! is_null($user)) {
            $this->setUserToObject($user);
        }



        return $user;
    }

    public function save()
    {

        $last_user = end($this->users);

        $user = [
            "id" => $last_user ? $last_user["id"] + 1 : 1,
            "name" => $this->name,
            "username" => $this->username,
            "email" => $this->email,
            "is_admin" => $this->is_admin,
            "is_active" => $this->is_active,
        ];

        array_push($this->users, $user);
        return true;
    }

    public function isAdmin()
    {
        return $this->is_admin === true;
    }

    public function isActive()
    {
        return $this->is_active === true;
    }

    public function findUserById($user_id)
    {
        return array_filter($this->users, function ($user) use ($user_id) {
            return $user["id"] == $user_id;
        });
    }

    public function setUserToObject($user)
    {
        foreach ($user as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }
}

$user = new User(1, "amin", "king", "amin.king@gamil.com", false, true);


$user->find(3);
// var_dump($user->find(2));


// $user->name = "reza";
// $user->username = "rahimi";
// $user->email = "amirrahimi@gmail.com";
// $user->is_admin = false;
// $user->is_active = true;

// $user->save();

var_dump($user);
