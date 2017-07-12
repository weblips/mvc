<?php

class Message extends Model {

    public function save($data, $id = null) {
        if (!isset($data['name']) || !isset($data['email']) || !isset($data['messages']))
            return FALSE;
        $id = (int) $id;
        if ($id) {
            $res = $this->db->update('messages', array(
                        'name' => XSS($data['name']),
                        'email' => XSS($data['email']),
                        'messages' => XSS($data['messages'])
                    ))->where('id', $id)
                    ->exec();
        } else {
            $res = $this->db->insert('messages', array(
                        'name' => XSS($data['name']),
                        'email' => XSS($data['email']),
                        'messages' => XSS($data['messages'])
                    ));
        }
        
        return $res;
    }

}
