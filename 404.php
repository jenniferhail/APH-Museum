<?php get_header(); ?>

<section class="block basic-content style-1 center-align">
	<div class="wrapper">
		<!-- If style-1, use the label -->
		<div class="row">
			<div v-for="index in 1" :key="index">
				<div class="col">
					<h1 class="title">
						<span class="h1 black none-derline line">If you don’t get lost once in a while, you’re doing it wrong.</span>
					</h1>
					<p>Thanks for exploring our website, but you’ve reached a dead end. How about you start again from the homepage?</p>
					<div class="buttons">
						<a href="http://aph-museum.com" class="btn">Let's go home</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
