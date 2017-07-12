<?php

/**
 * Description of Page
 *
 * @author uasynzheryanua
 */
class Page extends Model {

	public function getList($only_visible = false) {
		if ($only_visible) {
			$arr = $this->db->table('pages')
			            ->where('is_published', 1)
			            ->orderBy('id', 'ASC')
			//->orderBy('alias', 'DESC')
			->get()
			->toArray();
		} else {

			$arr = $this->db->table('pages')
			            ->get()
			            ->toArray();
		}

		return $arr;
	}

	public function getByAlias($alias) {
		$alias = $this->db->table('pages')
		              ->where('alias', $alias)
		              ->limit(1)
		              ->get()
		              ->toArray();
		return isset($alias[0])?$alias[0]:null;
	}

	public function getById($id) {
		$id         = (int) $id;
		$fild_pages = $this->db->table('pages')
		                   ->where('id', $id)
		                   ->limit(1)
		                   ->get()
		                   ->toArray();
		return isset($fild_pages[0])?$fild_pages[0]:null;
	}

	public function save($data, $id = null) {
		if (!isset($data['alias']) || !isset($data['title']) || !isset($data['content'])) {
			return FALSE;
		}

		$is_published = isset($data['is_published'])?1:0;
		if ($id) {
			$res = $this->db->update('pages', array(
					'alias'        => XSS($data['alias']),
					'title'        => XSS($data['title']),
					'content'      => XSS($data['content']),
					'is_published' => $is_published,
				))->where('id', $id)
			   ->exec();
		} else {
			$res = $this->db->insert('pages', array(
					'alias'        => XSS($data['alias']),
					'title'        => XSS($data['title']),
					'content'      => XSS($data['content']),
					'is_published' => $is_published,
				));
		}

		return $res;
	}

	public function delete($id) {
		$id  = (int) $id;
		$res = $this->db->delete('pages')->where('id', $id)->exec();
		return $res;
	}

}
