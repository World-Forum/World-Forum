<aside>
  <?php $children = get_pages('child_of='.get_post_top_ancestor_id()); ?>
  <?php if( count( $children ) != 0 ) { ?>
    <ul id="sidebar-ancestor-nav" class="no-padding-start">
        <?php wp_list_pages( array('title_li'=>'','include'=>get_post_top_ancestor_id()) ); ?>
      <?php wp_list_pages( array('title_li'=>'','depth'=>1,'child_of'=>get_post_top_ancestor_id()) ); ?>
    </ul>
    <?php } ?>
  </aside>
