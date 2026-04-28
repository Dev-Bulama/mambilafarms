<?php get_header(); ?>

<div class="page-top">
  <div style="padding:5rem 1.25rem;text-align:center">
    <div class="wrap">
      <div class="chip" style="justify-content:center">Latest Posts</div>
      <h1 class="st">From the <em>Farm</em></h1>
      <p class="sl" style="max-width:480px;margin:0 auto 2.5rem">News, updates and insights from Mambilla Legacy Farms.</p>

      <?php if ( have_posts() ) : ?>
        <div class="g3">
          <?php while ( have_posts() ) : the_post(); ?>
          <div class="card" style="padding:1.5rem;text-align:left">
            <?php if ( has_post_thumbnail() ) : ?>
              <div style="border-radius:12px;overflow:hidden;margin-bottom:1rem;aspect-ratio:16/9">
                <?php the_post_thumbnail( 'medium', array( 'style' => 'width:100%;height:100%;object-fit:cover' ) ); ?>
              </div>
            <?php endif; ?>
            <h2 style="font-size:1.2rem;margin-bottom:.5rem"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p class="sl" style="font-size:.85rem;margin-bottom:1rem"><?php the_excerpt(); ?></p>
            <a href="<?php the_permalink(); ?>" class="bo" style="width:auto;display:inline-flex">Read More →</a>
          </div>
          <?php endwhile; ?>
        </div>

        <div style="margin-top:2.5rem">
          <?php the_posts_pagination( array(
              'prev_text' => '← Previous',
              'next_text' => 'Next →',
          ) ); ?>
        </div>

      <?php else : ?>
        <div style="background:#fff;border-radius:16px;padding:3rem;box-shadow:0 2px 18px rgba(255,84,135,.07)">
          <p class="sl">No posts found. <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color:var(--pk)">Return home →</a></p>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>
