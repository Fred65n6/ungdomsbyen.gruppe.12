<?php
/**
 * The main template file.
 * @author  	 DeoThemes
 * @copyright  (c) Copyright by DeoThemes
 * @link       https://deothemes.com
 * @package 	 Nokke
 * @since 		 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

get_header();
?>

<div class="blog-section pb-56">

	<?php if ( ! is_home() && ! is_front_page() ) : ?>
		<?php get_template_part( 'template-parts/page-title/page-title' ); ?>
	<?php endif; ?>

	<?php nokke_primary_content_markup_top(); ?>

		<?php nokke_primary_content_top(); ?>

		<!-- blog content -->
		<div id="primary" class="content blog__content col-lg mb-32">

	
<main class="site-main">

	<article id="kursus">
      <img class="pic" src="" alt="" />
	  <h2 class="titel"> </h2>
      <div class="kursus-container">
      <p class="beskrivelse"></p>
      <img class="info-box" src="" alt="" />
      </div>
      <p class="beskrivelse2"></p>
	  <p class="beskrivelse3"></p>
	  <p class="beskrivelse4"></p>
	  <p class="beskrivelse5"></p>


	  <button class="book-knap">Book nu</button>

      
    </article>


   
<div class="tilbageknap"><a href="https://skuret.eu/kea/ungdomsbyen/kurser/" class="tilbage">← Tilbage</a></div>

</main>


<script>

let element;

const url = "https://skuret.eu/kea/ungdomsbyen/wp-json/wp/v2/kursus/"+<?php echo get_the_ID() ?>;

async function getJson() {
  const data = await fetch(url);
  element = await data.json();
  console.log(element);
  visElementer();
}

function visElementer() {
  console.log(element.billede.guid);
  document.querySelector(".titel").innerHTML = element.title.rendered;
  document.querySelector(".pic").src = element.billede.guid;
  document.querySelector(".beskrivelse").innerHTML = element.beskrivelse;
  document.querySelector(".beskrivelse2").innerHTML = element.beskrivelse2;
   document.querySelector(".beskrivelse2").innerHTML = element.beskrivelse3;
    document.querySelector(".beskrivelse2").innerHTML = element.beskrivelse4;
	 document.querySelector(".beskrivelse2").innerHTML = element.beskrivelse5;
  document.querySelector(".info-box").src = element.infobox.guid;;
}

getJson();

</script>
		</div> <!-- .blog__content -->

		<?php
			if ( nokke_is_active_sidebar( 'blog', 'blog', 'right-sidebar' ) ) {
				nokke_sidebar( 'nokke-blog-sidebar' );
			}
		?>

		<?php nokke_primary_content_bottom(); ?>

	<?php nokke_primary_content_markup_bottom(); ?>

</div> <!-- .blog-section -->

<?php get_footer(); ?>
<?php the_content(); ?>