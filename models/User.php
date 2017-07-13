<?php

/**
 * Description of User
 *
 * @author uasynzheryanua
 */
class User extends Model {

    public function getByLogin($login) {
        $login = $this->db->table('users')
                ->where('email', XSS($login))
                ->limit(1)
                ->get()
                ->toArray();
        return isset($login[0]) ? $login[0] : false;
    }
}
