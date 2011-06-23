<?php
/**
* @file views-view-row-rss.tpl.php
* Default view template to display a item in an RSS feed.
*
* @ingroup views_templates
*/
?>
  <item>
    <title><![CDATA[ <?php print $title; ?> ]]></title>
    <link><?php print $link; ?></link>
    <description><![CDATA[ <?php $node = node_load($row->nid); print strip_tags($node->body[$node->language][0]['summary']); ?>]]></description>
    <?php print $item_elements; ?>
  </item>