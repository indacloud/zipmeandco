<?php
 // Footer
?>

  </article>
  <footer id="main-foot">
    <div class="container">
      <div class="row">
        <div class="col col-md-6 col-sm-12 text-center">
          <ul id="footer-social">
            <?php
            foreach (get_social_links() as $key => $link) {
              echo "<li class='social-item'>";
              echo "<a href='$link->url' title='$link->title' target='_blank'><i class='fa $link->icon_square'></i></a>";
              echo "</li>";
            }
             ?>
          </ul>
        </div>
        <div class="col col-md-6 col-sm-12">
          <?php echo zmc_language_selector_footer(); ?>
          <div class="copyright text-center">
            <span>&copy; <?php echo date('Y'); ?> ZipmeAndCo </span>
          </div>
        </div>
      </div>
    </div>
  </footer>
<?php wp_footer(); ?>
</body>
</html>