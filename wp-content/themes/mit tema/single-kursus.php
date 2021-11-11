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


	<div class="splash">
      <img class="billede" src="" alt="" />
	  <h2 class="titel"></h2>
	  </div>

	  <h2 class="overskrift1"></h2>

	  <div class="single-infobox-grid">
      <img class="infobox1" src="" alt="" />
	  <img class="infobox2" src="" alt="" />
	  </div>

	  <p class="beskrivelse1"></p>

	  <p class="overskrift1"></p>
	  <div class="billede-grid">
	  <img class="billede2" src="" alt="" />
	  <img class="billede3" src="" alt="" />
	  </div>

      <div class="video-grid">
      <p class="beskrivelse2"></p>
	  <img class="video" src="" alt=""/>
	  </div>

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
  document.querySelector(".billede").src = element.billede.guid;
  document.querySelector(".overskrift1").innerHTML = element.overskrift1;
  document.querySelector(".infobox1").src = element.infobox1.guid;
  document.querySelector(".infobox2").src = element.infobox2.guid;
  document.querySelector(".beskrivelse1").innerHTML = element.beskrivelse1;
  document.querySelector(".overskrift1").innerHTML = element.overskrift1;
  document.querySelector(".billede2").src = element.billede2.guid;
  document.querySelector(".billede3").src = element.billede3.guid;
  document.querySelector(".beskrivelse2").innerHTML = element.beskrivelse2;
  document.querySelector(".video").innerHTML = element.video.guid;
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