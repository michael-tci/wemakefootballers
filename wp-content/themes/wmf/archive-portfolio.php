<?php
/**
 * Template Name: Portfolio Archive
 **/
?>

<?php
// prepare for the loop
$post_type = 'portfolio';
  $query = new WP_Query( array(
    'post_type' => 'portfolio',
    'posts_per_page' => -1,
   'orderby' => 'date',
   'order' => 'ASC',
    'tax_query' => array(
    array(
       'taxonomy' => 'portfolio_category',
        'field' => 'slug',
        'terms' => 'portfolio'
    )
),
) );
?>
    <?php // run the loop ?>
    <?php if ( $query->have_posts() ) : ?>
      <?php while ( $query->have_posts() ) : $query->the_post(); ?>
      <div class="col-md-4 col-sm-4 col-xs-16">

       <div class="list-academy">
      
        <div class="academics">
          
        <?php 
        $custom_fields = get_post_custom(post_id);
        $my_custom_field = $custom_fields['portfolio_link'];
        $holiday_camp_link = $custom_fields['holiday_camp_link'];
        if ( has_post_thumbnail() ) {
        if(is_front_page()){ 
          if(isset($my_custom_field)) 
        {
        foreach ( $my_custom_field as $value ) { ?>
          <a href="<?php echo $value;?>"><?php the_post_thumbnail();
         ?></a><?php  }
             }
           }
         }
        ?>
        </div>
      
      

        <h4 class="academics_title">
        
        
         <?php 
   if(is_front_page()){ ?>
   
      <?php if(isset($my_custom_field)) 
        {
        foreach ( $my_custom_field as $value ) { ?>
        <a href="<?php echo $value;?>" title=""><?php the_title(); ?></a>
    <?php  } 
      }
      else
      { ?>
         <a href="" title=""><?php the_title(); ?></a>
    <?php   
      }
    ?>
    
<?php  }

else
{ ?>

  <?php if(isset($holiday_camp_link)) 
        {
        foreach ( $holiday_camp_link as $values ) { ?>
        <a href="<?php echo $values;?>" title=""><?php the_title(); ?></a>
    <?php  } 
      }
      else
      { ?>
         <a href="" title=""><?php the_title(); ?></a>
    <?php   
      }
    ?>

<?php }
 ?>


        
        
        </h4>

      </div>
      </div>
      <?php endwhile; ?>
<?php endif; ?>
