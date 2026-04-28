<?php get_header(); ?>

<div class="page-top">
  <div class="pb" style="background-image:url('https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=1600&q=80')">
    <div class="pbc">
      <div class="chip" style="color:var(--pk)">404 Error</div>
      <h1 style="font-size:clamp(2rem,6vw,3.8rem);color:#fff;font-weight:600;line-height:1.1;margin-top:.4rem">Page Not Found</h1>
      <p style="color:rgba(255,255,255,.65);max-width:440px;line-height:1.72;margin-top:.75rem;font-size:.92rem">The page you&#8217;re looking for doesn&#8217;t exist or has been moved.</p>
    </div>
  </div>
  <div class="stripe"></div>
</div>

<section style="background:var(--sur);text-align:center">
  <div class="wrap" style="max-width:600px">
    <div style="font-size:5rem;margin-bottom:1rem">🐄</div>
    <h2 class="st">Oops — Wrong Pasture</h2>
    <p class="sl" style="max-width:420px;margin:0 auto 2rem">Looks like this page has wandered off. Head back to the herd and explore what Mambilla Legacy Farms has to offer.</p>
    <div style="display:flex;flex-direction:column;gap:.75rem;max-width:300px;margin:0 auto">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="bp">← Return to Homepage</a>
      <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="bo">Start Investing →</a>
    </div>
  </div>
</section>

<?php get_footer(); ?>
