<?php

class OSP extends PatchBase {
	function __construct() {
		parent::__construct('Deamos', 'Open Streaming Platform', 'https://openstreamingplatform.com/');
	}
	function check() : bool {
		if ($this->fetch('https://gitlab.com/api/v4/projects/Deamos%2Fflask-nginx-rtmp-manager/releases', true))
			return $this->parse_json('tag_name');
		return false;
	}
}

?>
