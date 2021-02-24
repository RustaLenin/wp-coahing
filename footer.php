<?php ?>

<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/index.js"></script>
<script type='text/javascript'>
    /* <![CDATA[ */
    window.rpcurl  = '<?php echo site_url() . '/api/json-rpc.php'; ?>';
    /* ]]> */
</script>
<?php if ( is_single() ) { ?>
    <script src="https://yastatic.net/share2/share.js"></script>
<?php } ?>

</body>
</html>
