<?php
/**
 * 2027 award groups on the Awards page, in two parts so the page can place them in different sections:
 * - tabs:   one button per award group
 * - panels: per group, its title, category tabs, and per category a card with the winners
 * Behaviour lives in js/awards-2027.js (data-aw27-* attributes inside [data-aw27-awards]).
 *
 * @package futuretrend
 *
 * @param array $args { part: 'tabs' | 'panels' }
 */

$part    = isset( $args['part'] ) ? $args['part'] : 'panels';
$groups  = ft_2027_award_groups_data();
$first   = array_key_first( $groups );
$no_img  = get_template_directory_uri() . '/assets/images/no-img.jpg';
$entries = get_field( 'awards_2027_entries_label' );

if ( 'tabs' === $part ) : ?>
	<div class="aw27-groups" role="tablist">
		<?php foreach ( $groups as $key => $group ) : ?>
			<button type="button" class="aw27-group-btn<?php echo $key === $first ? ' is-active' : ''; ?>" role="tab" aria-selected="<?php echo $key === $first ? 'true' : 'false'; ?>" data-aw27-group="<?php echo esc_attr( $key ); ?>">
				<?php echo esc_html( $group['title'] ); ?>
			</button>
		<?php endforeach; ?>
	</div>
	<?php
	return;
endif;

foreach ( $groups as $key => $group ) :
	$terms = array_values( $group['terms'] );
	?>
	<div class="aw27-group aw27-group--<?php echo esc_attr( $key ); ?>" role="tabpanel" data-aw27-panel="<?php echo esc_attr( $key ); ?>"<?php echo $key === $first ? '' : ' hidden'; ?>>
		<div class="aw27-group-head">
			<h2 class="aw27-group-title"><?php echo esc_html( $group['title'] ); ?></h2>
			<?php if ( $group['desc'] ) : ?>
				<p class="aw27-group-desc"><?php echo esc_html( $group['desc'] ); ?></p>
			<?php endif; ?>
		</div>

		<div class="aw27-cats" role="tablist">
			<?php foreach ( $terms as $i => $term ) : ?>
				<button type="button" class="aw27-cat-btn<?php echo 0 === $i ? ' is-active' : ''; ?>" role="tab" aria-selected="<?php echo 0 === $i ? 'true' : 'false'; ?>" data-aw27-cat="<?php echo esc_attr( $term->slug ); ?>">
					<?php echo esc_html( $term->name ); ?>
				</button>
			<?php endforeach; ?>
		</div>

		<?php
			foreach ( $terms as $i => $term ) :
				$rows    = (array) get_field( $group['list'], $term );
				$winners = 0;
				foreach ( $rows as $row ) {
					$winners += count( (array) $row[ $group['listing'] ] );
				}
		?>
			<div class="aw27-cat-panel" role="tabpanel" data-aw27-cat-panel="<?php echo esc_attr( $term->slug ); ?>"<?php echo 0 === $i ? '' : ' hidden'; ?>>
				<div class="aw27-card">
					<div class="aw27-card-head">
						<div class="aw27-card-heading">
							<h3 class="aw27-card-title"><?php echo esc_html( $term->name ); ?></h3>
							<p class="aw27-card-desc"><?php echo esc_html( wp_strip_all_tags( term_description( $term ) ) ); ?></p>
						</div>
						<div class="aw27-card-count">
							<span class="aw27-card-count-num"><?php echo esc_html( $winners ); ?></span>
							<?php if ( $entries ) : ?>
								<span class="aw27-card-count-label"><?php echo esc_html( $entries ); ?></span>
							<?php endif; ?>
						</div>
					</div>

					<?php foreach ( $rows as $row ) : ?>
						<?php if ( ! empty( $row[ $group['list_title'] ] ) ) : ?>
							<h4 class="aw27-row-title"><?php echo esc_html( $row[ $group['list_title'] ] ); ?></h4>
						<?php endif; ?>

						<?php if ( ! empty( $row[ $group['listing'] ] ) ) : ?>
							<ul class="aw27-winners">
								<?php
									foreach ( $row[ $group['listing'] ] as $winner ) :
										$winner_id = is_object( $winner ) ? $winner->ID : (int) $winner;
								?>
									<li class="aw27-winner">
										<figure class="aw27-winner-logo">
											<?php
												if ( has_post_thumbnail( $winner_id ) ) {
													echo get_the_post_thumbnail( $winner_id, 'full' );
												} else {
													echo '<img src="' . esc_url( $no_img ) . '" alt="" />';
												}
											?>
										</figure>
										<div class="aw27-winner-name"><?php echo esc_html( get_field( $group['name'], $winner_id ) ); ?></div>
									</li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
<?php endforeach; ?>
