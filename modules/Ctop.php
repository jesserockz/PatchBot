<?php

class Ctop extends PatchBase {
	function __construct() {
		parent::__construct('Bradley Cicenas', 'ctop', 'https://ctop.sh/');
	}
	function check() : bool {
		if ($this->fetch_json('https://api.github.com/repos/bcicen/ctop/releases/latest'))
			return $this->parse_json('tag_name');
		return false;
	}
}

?>
