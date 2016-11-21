<div class="item-list-tabs no-ajax" id="subnav">
	<ul>
    <li><a href="/members/"><?php printf( __( 'All Members (%s)', 'buddypress' ), bp_get_total_member_count() ) ?></a></li>
		<?php if ( bp_is_my_profile() ) : ?>
			<?php bp_get_options_nav() ?>
		<?php endif; ?>

		<?php /* Not Working - So hide 
					
					<li id="members-order-select" class="last filter">

						<?php _e( 'Order By:', 'buddypress' ) ?>
						<select>
							<option value="active"><?php _e( 'Last Active', 'buddypress' ) ?></option>
							<option value="newest"><?php _e( 'Newest Registered', 'buddypress' ) ?></option>

							<?php if ( bp_is_active( 'xprofile' ) ) : ?>
								<option value="alphabetical"><?php _e( 'Alphabetical', 'buddypress' ) ?></option>
							<?php endif; ?>

							<?php do_action( 'bp_members_directory_order_options' ) ?>
						</select>
					</li>
					 End of this tab */ ?>
	</ul>
</div>

<?php if ( 'requests' == bp_current_action() ) : ?>
	<?php locate_template( array( 'members/single/friends/requests.php' ), true ) ?>

<?php else : ?>

	<?php do_action( 'bp_before_member_friends_content' ) ?>

	<div class="members friends">
		<?php locate_template( array( 'members/members-loop.php' ), true ) ?>
	</div>

	<?php do_action( 'bp_after_member_friends_content' ) ?>

<?php endif; ?>
