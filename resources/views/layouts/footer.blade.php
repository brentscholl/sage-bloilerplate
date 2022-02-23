<footer class="content-info">
    {{--  @php(dynamic_sidebar('sidebar-footer'))--}}
    <div class="copyright">
        Copyright © <?php echo date('Y'); ?> Company Name. All Rights Reserved. &bull; <a href="/privacy-policy/">Privacy Policy</a> &bull; <a href="/wp-login.php">Log in</a>
    </div>
    <div class="stealth">
        <a href="https://stealthmedia.com" title="Stealth Media Web Design">
            <img src="https://stealthmedia.com/wp-content/uploads/assets/STEALTH-logo.svg" class="footer-logo" alt="Stealth Media Saskatoon Web design">
        </a>
    </div>
</footer>
</div><!-- #app end -->

@php(do_action('get_footer'))
@php(wp_footer())
@stack('footer.scripts')
</body>
</html>
