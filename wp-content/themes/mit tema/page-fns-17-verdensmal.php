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

<template>
  <article id="liste">
    <img src="" alt="" />
    <h2 class="liste-titel"></h2>
    <p class="kortbeskrivelse"></p>
    <div class="placer-elementer">
    <p class="klassetrin"></p>
    <p class="fag"></p>
    </div>
    <button class="læs-mere-knap">Læs mere</button>
  </article>
</template>   



<main class="site-main">


<section>
<h1>FN's 17 verdensmål</h1>
<br>
<p>FN's 17 verdensmål for bæredygtig udvikling sætter kursen mod en bedre fremtid for både mennesker og planeten. Det gør de blandt andet ved at arbejde for at afskaffe fattigdom, reducere ulighed og passe bedre på miljøet. De 17 verdensmål er opstillet for hele jordens befolkning, og det er kun muligt at realisere dem, hvis alle gør en indsats – også i Danmark.

I Ungdomsbyen tilbyder vi kurser i FN's 17 verdensmål for elever og lærere.</p>

<h5>Kursus i verdensmål for elever</h5>

<p>
I Ungdomsbyen arbejder vi med målene i forhold til bæredygtig udvikling og globalt medborgerskab. Det er vores mål at klæde eleverne på til at blive verdensmestre i verdensmål. Vi lægger op til aktivt medborgerskab og stillingtagen, så eleverne får en bedre forståelse af, hvad verdensmålene betyder for dem og deres valg af handlinger.
</p>
<h5>Kursus i verdensmål for lærere</h5>
<p>
Ungdomsbyen udbyder kurser særligt tilpasset faglærere og det øvrige personale. Vi giver en grundlæggende forståelse for verdensmålene og ruster dig til at formidle budskabet om verdensmålene på en inddragende og lærerig måde.

Lærere har utrolig mange opgaver på deres bord i det dannelsesforløb, som finder sted i skolen. Målet med vores kursus er derfor at ruste dig, så du kan støtte dine elever i at navigere i en global verden. Uden at det opleves som en ekstra arbejdsopgave.
</p>
<br>
<h4><strong>Se relaterede kurser ▼</strong></h4>
</section>


<section class="elementcontainer"></section>
</main>

<script>

      let elementer;
      let categories;
      let filterElement = "48"
     
      const url = "https://skuret.eu/kea/ungdomsbyen/wp-json/wp/v2/kursus?per_page=100";
      const catUrl = "https://skuret.eu/kea/ungdomsbyen/wp-json/wp/v2/tema?per_page=100";


      async function getJson() {
        const data = await fetch(url);
        const catdata = await fetch(catUrl);
        elementer = await data.json();
        categories = await catdata.json();
        console.log(categories);
        visElementer();
      }



      function visElementer() {
        let temp = document.querySelector("template");
        let container = document.querySelector(".elementcontainer")
        container.innerHTML = "";
        elementer.forEach(element => {
          if ( filterElement == "uddanelsesvalg" || element.tema.includes(parseInt(filterElement))){
          let klon = temp.cloneNode(true).content;
          klon.querySelector("h2").innerHTML = element.title.rendered;
          klon.querySelector("img").src = element.loop_billede.guid;
          klon.querySelector(".kortbeskrivelse").innerHTML = element.kortbeskrivelse;
         klon.querySelector(".klassetrin").innerHTML = "👨‍👦‍👦: " + element.klassetrin;
          klon.querySelector(".fag").innerHTML = "📖: " + element.fag;
          klon.querySelector("article").addEventListener("click", () => { location.href = element.link; })
          container.appendChild(klon);
          }
          })
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