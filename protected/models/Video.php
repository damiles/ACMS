<?php

class Video
{
	public $duration;
	public $title;
	public $description;
	public $viewCount;
	public $rating;
	public $link;
	public $swf;
	public $thumbnail;
	public $published;

	public function init($entry)
	{
		// get nodes in media: namespace for media information
		$media = $entry->children('http://search.yahoo.com/mrss/');

		// get video player URL
		$attrs = $media->group->player->attributes();
		$this->link = $attrs['url']; 

		$attrs = $media->group->content[0]->attributes();
		$this->swf= $attrs['url'];

		// get video thumbnail
		$attrs = $media->group->thumbnail[0]->attributes();
		$this->thumbnail = $attrs['url']; 

		// get <yt:duration> node for video length
		$yt = $media->children('http://gdata.youtube.com/schemas/2007');
		$attrs = $yt->duration->attributes();
		$this->duration = $attrs['seconds']; 

		// get <yt:stats> node for viewer statistics
		$yt = $entry->children('http://gdata.youtube.com/schemas/2007');
		$attrs = $yt->statistics->attributes();
		$this->viewCount = $attrs['viewCount']; 

		// get <gd:rating> node for video ratings
		$gd = $entry->children('http://schemas.google.com/g/2005'); 
		if ($gd->rating) {
			$attrs = $gd->rating->attributes();
			$this->rating = $attrs['average']; 
		} else {
			$this->rating = 0; 
		}

		$this->published=getDate(strtotime($entry->published));
		$this->title=$media->group->title;
		$this->description=$media->group->description;

	}
}
