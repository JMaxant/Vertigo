<?php get_header(); ?>
	<section>
		<?php if(have_posts()): ?>
		<div class="container">
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
