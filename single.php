<?php get_header(); ?>
	<div class="container">
		<div class="jumbotron">
			<h1>COUCOU</h1>
		</div>
	</div>
	<section>
		<?php if(have_posts()): ?>
		<div class="container">
			<?php while(have_posts()):the_post();
                         $date=sprintf('<time class="entry-date" datetime="%1$s">%2$s</time>', esc_attr(get_the_date('c')), esc_html(get_the_date())
                    );?>
			<div class="row">
				<div class="col-xs-12">
					<h1><?php the_title();?></h1>
                         <p>Publié le <?php echo $date;?>, dans la catégorie <?php the_category(', ');?></p>
					<?php the_content();?>
				</div>
			</div><!--row-->
			<?php endwhile;?>
               <div class="row">
                    <div class="col-xs12">
                         <nav>
                              <ul class="vertigo-pager">
                                   <li class="pull-left"><?php previous_post_link();?></li>
                                   <li class="pull-right"><?php next_post_link();?></li>
                              </ul>
                         </nav>
                    </div>
               </div><!--row-->

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
