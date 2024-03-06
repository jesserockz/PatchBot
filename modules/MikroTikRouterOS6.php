<?php

class MikroTikRouterOS6 extends PatchBase {
	function __construct() {
		parent::__construct('MikroTik', 'RouterOS', 'https://mikrotik.com/download');
		$this->patch->setBranch('v6 Stable');
	}
	function check() : bool {
		if ($this->fetch('https://mikrotik.com/download')) {
			$this->str_crop('id="routeros6"', '</thead>');
			return $this->parse('/<th>([\d\.]+) Stable<\/th>/');
		}
		return false;
	}
}

?>
