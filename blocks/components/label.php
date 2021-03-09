<?php 
	// Create ACF field group
	$label = get_sub_field('label'); 

	// Add fields to ACF field group
	$square_color = $label['square_color'];
	$label_text = $label['text'];
	$header_tag = $label['header_tag'];
?>

<<?php echo $header_tag; ?> class="label <?php echo $square_color; ?>">
	<span class="span"><?php echo $label_text; ?></span>
</<?php echo $header_tag; ?>>