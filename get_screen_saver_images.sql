delimiter $
CREATE PROCEDURE `get_screen_saver_images`()
BEGIN
    -- Gets 100 random pictures from wp DB(provided that it has nggallery plugin installed)
    select
      `wp_ngg_gallery`.`gid` AS `gid`,
      `wp_ngg_gallery`.`name` AS `name`,
      `wp_ngg_gallery`.`slug` AS `slug`,
      `wp_ngg_gallery`.`path` AS `path`,
      `wp_ngg_gallery`.`title` AS `title`,
      `wp_ngg_gallery`.`galdesc` AS `galdesc`,
      `wp_ngg_gallery`.`pageid` AS `pageid`,
      `wp_ngg_gallery`.`previewpic` AS `previewpic`,
      `wp_ngg_gallery`.`author` AS `author`,
      `wp_ngg_pictures`.`pid` AS `pid`,
      `wp_ngg_pictures`.`image_slug` AS `image_slug`,
      `wp_ngg_pictures`.`post_id` AS `post_id`,
      `wp_ngg_pictures`.`galleryid` AS `galleryid`,
      `wp_ngg_pictures`.`filename` AS `filename`,
      `wp_ngg_pictures`.`description` AS `description`,
      `wp_ngg_pictures`.`alttext` AS `alttext`,
      --  Get only the date portion of the timestamp in the following format: Day name, month name, day of month,  year. e.g. Sunday October 25 2009
      DATE_FORMAT(`wp_ngg_pictures`.`imagedate`, '%W %M %d %Y') AS `imagedate`,
      `wp_ngg_pictures`.`sortorder` AS `sortorder`,
      `wp_ngg_pictures`.`meta_data` AS `meta_data`
  from
      `wp_ngg_gallery` join `wp_ngg_pictures` on `wp_ngg_gallery`.`gid` = `wp_ngg_pictures`.`galleryid`
  order by
      rand() limit 0,100;
END
$
delimiter ;