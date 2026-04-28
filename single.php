<?php get_header(); ?>

<div class="page-top">

  <?php while ( have_posts() ) : the_post(); ?>

  <!-- PAGE BANNER -->
  <div class="pb" style="<?php if ( has_post_thumbnail() ) echo 'background-image:url(' . esc_url( get_the_post_thumbnail_url( null, 'full' ) ) . ');'; else echo 'background-image:url(https://images.unsplash.com/photo-1416879595882-3373a0480b5b?w=1600&q=80);'; ?>">
    <div class="pbc">
      <div class="chip" style="color:var(--pk)"><?php the_category( ', ' ); ?></div>
      <h1 style="font-size:clamp(1.8rem,5vw,3.2rem);color:#fff;font-weight:600;line-height:1.15;margin-top:.4rem"><?php the_title(); ?></h1>
      <p style="color:rgba(255,255,255,.65);margin-top:.75rem;font-size:.88rem">
        <?php echo esc_html( get_the_date() ); ?> &middot; <?php the_author(); ?>
      </p>
    </div>
  </div>
  <div class="stripe"></div>

  <!-- POST CONTENT -->
  <section style="background:var(--sur)">
    <div class="wrap" style="max-width:820px">
      <div class="entry-content" style="line-height:1.85;font-size:.95rem;color:var(--t1)">
        <?php the_content(); ?>
      </div>

      <?php if ( comments_open() || get_comments_number() ) : ?>
        <div style="margin-top:3rem">
          <?php comments_template(); ?>
        </div>
      <?php endif; ?>
    </div>
  </section>

  <?php endwhile; ?>

</div>

<?php get_footer(); ?>
