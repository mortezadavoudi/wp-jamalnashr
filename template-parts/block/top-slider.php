<?php global $jamal_admin; ?>
<div class="owl-carousel owl-theme slider" id="slider">
<?php
foreach ( $jamal_admin['opt-slides'] as $slide ) { ?>
    <div class="item slider"><a href="<?php echo $slide['url']; ?>"><img src="<?php echo $slide['image']; ?>" alt="اسلایدر جمال"></a></div>
    <?php
}
?>
</div>
