<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>
	<article id="kursus">
      <img class="pic" src="" alt="" />
      <h2></h2>
      <div class="container">
      <p class="beskrivelse"></p>
      <img class="info-box" src="" alt="" />
      </div>
      <p class="beskrivelse2"></p>
      
    </article>


   
<div class="tilbageknap"><a href="https://skuret.eu/kea/ungdomsbyen/kurser/" class="tilbage">← Tilbage</a></div>
<main id="site-content" role="main">

	
</main><!-- #site-content -->

<script>

let ret;

const url = "https://skuret.eu/kea/ungdomsbyen/wp-json/wp/v2/kursus/"+<?php echo get_the_ID() ?>;

async function getJson() {
  const data = await fetch(url);
  ret = await data.json();
  console.log(ret);
  visRetter();
}

function visRetter() {
  console.log(ret.billede.guid);
  document.querySelector("h2").innerHTML = ret.title.rendered;
  document.querySelector(".pic").src = ret.billede.guid;
  document.querySelector(".beskrivelse").innerHTML = ret.beskrivelse;
  document.querySelector(".beskrivelse2").innerHTML = ret.beskrivelse2;
  document.querySelector(".info-box").src = ret.infobox.guid;;
}

getJson();

</script>

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php
get_footer();
