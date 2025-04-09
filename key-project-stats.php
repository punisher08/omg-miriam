<?php
/**
 * MV Key Project Stats Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'kpstats-' . $block['id'];
if (!empty($block['anchor'])) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'quinbrook-featurepanels';
if (!empty($block['className'])) {
	$className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
	$className .= ' align' . $block['align'];
}

$style = '';
$section_bg = get_field('kp_stats_bg');

if ($section_bg) {
	$style = "background-image: url(" . $section_bg . ");
                     background-repeat: no-repeat;
                     background-size: cover;
                     background-attachment: fixed;
                     background-position: center bottom;
                     transform: translate(0, 0)";
}

$intro = get_field('kp_stats_title');
$cta_button_text = get_field('kp_stats_button_text');
$cta_button_link = get_field('kp_stats_button_link');

?>
<section id="<?php echo esc_attr($id); ?>" class="kpstats-panels" style="<?php echo $style; ?>">
	<div class="container">
		<div class="row row-kps-title wow fadeInUp">
			<div class="col-12 text-center col-title">
				<h3><?php echo $intro; ?></h3>
			</div>
		</div>
		<div class="row row-kps-panels">
			<?php
			while (have_rows('kp_stats_panels')): the_row();

			?>

				<div class="kps-panels--stat wow fadeInUp">
					<div class="kps-icon"><img src="<?php the_sub_field('image'); ?>" alt="kps-icon"></div>
					<div class="kps-info">
						<div class="h3">
							<?php the_sub_field('number_prefix'); ?><span class="stat-number" data-n="<?php the_sub_field('animate_number'); ?>">0</span><?php the_sub_field('number_suffix'); ?>
						</div>
						<div class="btm"><?php echo get_sub_field('bottom'); ?></div>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
		<div class="row row-kps-cta wow fadeInUp">
			<a href="<?php echo $cta_button_link ? esc_url($cta_button_link) : '#'; ?>"
				class="btn mx-auto"><?php echo $cta_button_text; ?></a>
		</div>
	</div>

</section>
