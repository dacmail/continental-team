<?php namespace flow\social;
if ( ! defined( 'WPINC' ) ) die;
/**
 * Social-Streams core
 *
 * @package   FlowFlow
 * @author    Looks Awesome <email@looks-awesome.com>

 * @link      http://looks-awesome.com
 * @copyright Looks Awesome
 */
interface LAFeedWithComments {
	public function getComments($mediaId);
}