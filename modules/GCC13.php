<?php

class GCC13 extends PatchBase {
	function __construct() {
		parent::__construct('Free Software Foundation', 'GNU Compiler Collection', 'https://gcc.gnu.org/');
		$this->patch->setBranch('13');
	}
	function check() : bool {
		if ($this->fetch('https://gcc.gnu.org/'))
			return $this->parse('/<span class="version"><a href="gcc-13\/">GCC ([\d\.]+)/');
		return false;
	}
}

?>
