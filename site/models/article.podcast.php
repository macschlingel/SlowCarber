<?php

class ArticlePodcastPage extends Page {
	static private $podcastsPath = '/var/www/virtual/fourhour/files.slowcarber.de/podcast';
	static private $podcastsUri  = 'files.slowcarber.de/podcast';
	
	/**
	 * Checks if the page has podcast audio
	 *
	 * @return boolean
	 */
	public function hasAudio() {
		return !empty($this->audioFormats());
	}
	
	/**
	 * Returns all existing audio formats of the episode
	 *
	 * @return array
	 */
	public function audioFormats() {
		$baseAudioPath = $this->baseAudioPath();
		
		$formats = array();
		if(is_file($baseAudioPath . '.mp3')) $formats[] = 'mp3';
		if(is_file($baseAudioPath . '.m4a')) $formats[] = 'm4a';
		
		return $formats;
	}
	
	/**
	 * Returns the path to an audio file
	 *
	 * @param  string $format File extension
	 * @return string
	 */
	public function audioPath($format = 'mp3') {
		return $this->baseAudioPath() . '.' . $format;
	}
	
	/**
	 * Returns the URI (without protocol) to an audio file
	 *
	 * @param  string $format File extension
	 * @return string
	 */
	public function audioUri($format = 'mp3') {
		return $this->baseAudioUri() . '.' . $format;
	}
	
	/**
	 * Generates the episode number
	 *
	 * @return string
	 */
	private function episodeNumber() {
		// Get sorting number
		$num = (int)$this->num();
		
		// Pad number so that it is three digits long
		$paddedNum = str_pad($num, 3, '0', STR_PAD_LEFT);
		
		return $paddedNum;
	}
	
	/**
	 * Returns the base path of the podcast episode (without file extensions)
	 *
	 * @return string
	 */
	private function baseAudioPath() {
		return static::$podcastsPath . DS . $this->episodeNumber();
	}
	
	/**
	 * Returns the base URI of the podcast episode (without file extensions)
	 *
	 * @return string
	 */
	private function baseAudioUri() {
		return static::$podcastsUri . '/' . $this->episodeNumber();
	}
}
