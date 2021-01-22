<?php

class MRemoteNG extends PatchBase {
	function __construct() {
		parent::__construct('mRemoteNG Dev Team', 'mRemoteNG', 'https://mremoteng.org/download');
	}
	function check() : bool {
		if ($this->fetch('https://api.github.com/repos/mRemoteNG/mRemoteNG/releases/latest', true))
			return $this->parse_json('tag_name');
		return false;
	}
}

?>
