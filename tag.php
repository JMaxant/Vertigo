<?php get_header(); ?>
	<section>
		<div class="container">
			<div class="row">
				<p class="lead">Liste des articles avec l'étiquette  <?php single_tag_title(); ?></p>
			</div>
		</div>
		<div class="container">
			<?php if(have_posts()): ?>
				<?php while(have_posts()):the_post(); ?>
					<?php get_template_part('content');?>
				<?php endwhile;?>
				<?php else: ?>
			<div class="row">
				<div class="col-xs-12">
					<p>Pas de résultat</p>
				</div>
			</div><!--row-->
		<?php endif; ?>
		</div><!--Container-->
	</section>
<?php get_footer();?>
</html>
