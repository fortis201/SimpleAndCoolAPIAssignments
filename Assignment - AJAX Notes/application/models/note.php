<?php
class Note extends CI_Model {
	function show() {
		return $this->db->query("SELECT * FROM notes")->result_array();
	}

	function update($post) {
		return $this->db->query("UPDATE notes SET description=? WHERE id=?", $post);
	}

	function create($post) {
		return $this->db->query("INSERT INTO notes(title) VALUES (?)", $post);
	}

	function destroy($id) {
		return $this->db->query("DELETE FROM notes WHERE id=?", $id);
	}


}