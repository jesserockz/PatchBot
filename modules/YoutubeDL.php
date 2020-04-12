<?php

class YoutubeDL extends PatchBase {
	function __construct() {
		parent::__construct('youtube-dl Authors', 'youtube-dl', 'https://yt-dl.org/');
	}
	function check() : bool {
		if ($this->fetch('https://api.github.com/repos/ytdl-org/youtube-dl/releases/latest', true))
			return $this->parse_json('tag_name');
		return false;
	}
}

?>
