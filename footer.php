
    <footer>
        <div class="container">
            <div class="logo">
                <a href="<?php echo get_home_url(); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" alt="<?php bloginfo('name'); ?>"></a>   
                </a>
            </div>
            <p class="copyright">
                &copy; <?php echo date('Y');?> — Play — Todos os direitos reservados.
            </p>
        </div>
    </footer>  
    

    <?php wp_footer(); ?>
</body>
</html>
