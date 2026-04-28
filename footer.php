<footer class="site-footer">
  <div class="wrap">
    <div class="footer-grid">

      <!-- About Column -->
      <div>
        <div class="ftl" style="margin-bottom:.25rem">Mambilla Legacy Farms</div>
        <div style="font-size:.68rem;color:var(--pk);font-weight:600;letter-spacing:.06em;text-transform:uppercase;margin-bottom:.9rem">
          A SAB Foundation Initiative &middot; &hellip;Touching Lives
        </div>
        <p style="font-size:.82rem;line-height:1.8;color:rgba(255,255,255,.38);max-width:240px;margin-bottom:1rem">
          Transforming Nigeria&#8217;s livestock sector from the cool highlands of the Mambilla Plateau, Taraba State.
        </p>
        <div style="font-size:.72rem;color:rgba(255,255,255,.22);line-height:1.8">
          Promoter: SAB Foundation<br/>
          Technical: Farm Alert Ltd<br/>
          BD Partner: Successory Nigeria Ltd
        </div>
      </div>

      <!-- Navigate Column -->
      <div>
        <h5>Navigate</h5>
        <?php
        if ( has_nav_menu( 'footer-navigate' ) ) {
            wp_nav_menu( array(
                'theme_location' => 'footer-navigate',
                'walker'         => new Mambila_Flat_Walker(),
                'items_wrap'     => '%3$s',
                'container'      => false,
                'fallback_cb'    => false,
            ) );
        } else {
            ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
            <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About Us</a>
            <a href="<?php echo esc_url( home_url( '/whatwedo/' ) ); ?>">What We Do</a>
            <a href="<?php echo esc_url( home_url( '/tiers/' ) ); ?>">Investment Tiers</a>
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact &amp; Invest</a>
            <?php
        }
        ?>
      </div>

      <!-- Invest Column -->
      <div>
        <h5>Invest</h5>
        <?php
        if ( has_nav_menu( 'footer-invest' ) ) {
            wp_nav_menu( array(
                'theme_location' => 'footer-invest',
                'walker'         => new Mambila_Flat_Walker(),
                'items_wrap'     => '%3$s',
                'container'      => false,
                'fallback_cb'    => false,
            ) );
        } else {
            $tiers_url = esc_url( home_url( '/tiers/' ) );
            ?>
            <a href="<?php echo $tiers_url; ?>">Starter &ndash; &#8358;10M</a>
            <a href="<?php echo $tiers_url; ?>">Bronze &ndash; &#8358;20M</a>
            <a href="<?php echo $tiers_url; ?>">Silver &ndash; &#8358;50M</a>
            <a href="<?php echo $tiers_url; ?>">Gold &ndash; &#8358;100M</a>
            <a href="<?php echo $tiers_url; ?>">Platinum &ndash; &#8358;200M</a>
            <a href="<?php echo $tiers_url; ?>">Diamond &ndash; &#8358;1B+</a>
            <?php
        }
        ?>
      </div>

      <!-- Contact Column -->
      <div>
        <h5>Contact</h5>
        <?php if ( is_active_sidebar( 'footer-widget-area' ) ) : ?>
          <?php dynamic_sidebar( 'footer-widget-area' ); ?>
        <?php else : ?>
        <div style="font-size:.82rem;color:rgba(255,255,255,.38);line-height:2">
          &#128231; invest@legacyfarms.ng<br/>
          &#127760; www.legacyfarms.ng<br/>
          &#128205; Mambilla Plateau,<br/>
          &nbsp;&nbsp;Taraba State, Nigeria
        </div>
        <?php endif; ?>
      </div>

    </div>

    <div style="height:1px;background:rgba(255,84,135,.12);margin-bottom:1.25rem"></div>

    <div style="display:flex;flex-wrap:wrap;justify-content:space-between;gap:.75rem">
      <span style="font-size:.73rem;color:rgba(255,255,255,.22)">
        &copy; <?php echo date( 'Y' ); ?> Mambilla Legacy Farms &middot; SAB Foundation &middot; All rights reserved
      </span>
      <span style="font-size:.7rem;color:rgba(255,255,255,.15)">1M Cattle &middot; 50K+ Jobs &middot; &#8358;4&ndash;5T GDP</span>
    </div>

  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
