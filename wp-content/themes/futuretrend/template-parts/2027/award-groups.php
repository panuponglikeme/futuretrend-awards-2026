<?php
/**
 * 2027 award groups: group tabs, category tabs and the winners of each category.
 * Behaviour lives in js/awards-2027.js (data-aw27-* attributes).
 *
 * @package futuretrend
 */

$groups     = ft_2027_award_groups();
$no_img     = get_template_directory_uri() . '/assets/images/no-img.jpg';
$first_group = true;
?>

<section class="aw27-awards" data-aw27-awards>
	<div class="aw27-groups" role="tablist">
		<?php foreach ( $groups as $key => $group ) : ?>
			<button type="button" class="aw27-group-btn<?php echo $first_group ? ' is-active' : ''; ?>" role="tab" aria-selected="<?php echo $first_group ? 'true' : 'false'; ?>" data-aw27-group="<?php echo esc_attr( $key ); ?>">
				<?php echo esc_html( $group['label'] ); ?>
			</button>
		<?php $first_group = false; endforeach; ?>
	</div>

	<?php
		$first_group = true;
		foreach ( $groups as $key => $group ) :
			$terms = ft_award_terms( $group['taxonomy'], 2027, $group['order'] );
	?>
	<div class="aw27-group" role="tabpanel" data-aw27-panel="<?php echo esc_attr( $key ); ?>"<?php echo $first_group ? '' : ' hidden'; ?>>
		<?php if ( $terms ) : ?>
			<div class="aw27-cats">
				<?php foreach ( $terms as $i => $term ) : ?>
					<button type="button" class="aw27-cat-btn<?php echo 0 === $i ? ' is-active' : ''; ?>" aria-selected="<?php echo 0 === $i ? 'true' : 'false'; ?>" data-aw27-cat="<?php echo esc_attr( $term->slug ); ?>">
						<span class="aw27-cat-name"><?php echo esc_html( $term->name ); ?></span>
						<span class="aw27-cat-num"><?php echo esc_html( get_field( $group['number'], $term ) ); ?></span>
					</button>
				<?php endforeach; ?>
			</div>

			<?php foreach ( $terms as $i => $term ) : ?>
				<div class="aw27-cat-panel" data-aw27-cat-panel="<?php echo esc_attr( $term->slug ); ?>"<?php echo 0 === $i ? '' : ' hidden'; ?>>
					<h3 class="aw27-cat-title"><?php echo esc_html( $term->name ); ?></h3>
					<div class="aw27-cat-desc"><?php echo term_description( $term ); ?></div>

					<?php
						$rows = get_field( $group['list'], $term );
						if ( $rows ) :
							foreach ( $rows as $row ) :
								$winners = $row[ $group['listing'] ];
					?>
						<div class="aw27-row">
							<?php if ( ! empty( $row[ $group['list_title'] ] ) ) : ?>
								<h4 class="aw27-row-title"><?php echo esc_html( $row[ $group['list_title'] ] ); ?></h4>
							<?php endif; ?>

							<?php if ( $winners ) : ?>
								<ul class="aw27-winners">
									<?php
										foreach ( $winners as $winner ) :
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
						</div>
					<?php endforeach; endif; ?>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
	<?php $first_group = false; endforeach; ?>
</section>
