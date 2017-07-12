<?php

/**
 * Description of Page
 *
 * @author uasynzheryanua
 */
class Page extends Model {

    public function getList($only_visible = false) {
        if ($only_visible)
            $arr = $this->db->table('pages')
                    ->where('is_published', 1)
                    ->orderBy('id', 'ASC')
                    //->orderBy('alias', 'DESC')
                    ->get()
                    ->toArray();
        else
            $arr = $this->db->table('pages')
                    ->get()
                    ->toArray();
        return $arr;
    }

    public function getByAlias($alias) {
        $alias = $this->db->table('pages')
                ->where('alias', $alias)
                ->limit(1)
                ->get()
                ->toArray();
        return isset($alias[0]) ? $alias[0] : null ;
    }

}
