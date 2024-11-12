<?php 
/**
 * Renders The Stacker section (A repeater with columns)
 */

$anchor = str_replace(' ','-',strtolower(get_sub_field('anchor_id')));
$background_color = get_sub_field('background_color');
$the_stacker = get_sub_field('the_stacker');
?>

<section class="the-stacker mobile:section-pad desk:section-pad <?php echo $background_color ?>" <?php if ($anchor) echo "id=$anchor" ?>>
	<div class="uw-width md-cols-gt-2">
	<?php if($the_stacker) : 
		foreach($the_stacker as $column) :
			?>
		<div class="stacker-column">
			<?php echo $column['stacker_column'] ?>
		</div>
		<?php endforeach; ?>
		<?php endif; ?>
	</div>
</section>