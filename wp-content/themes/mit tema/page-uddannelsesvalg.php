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
<h1>Uddannelsesvalg</h1>
<br>
<p>
Oplever jeres elever, at de har et reelt uddannelsesvalg? Kender de erhvervsuddannelsernes muligheder i dag. Gør lærere og forældre?

Ungdomsbyen tilbyder brobygning indenfor byggeri og handel samt social- og sundhedsområdet.
</p>
<h5>I Ungdomsbyen er vi brobyggere</h5>
<p>
Send kommunens lærere og elever på brobygningsforløb med Ungdomsbyen. Vi koordinerer alt, der vedr. skolen, kommunen, erhvervsuddannelserne og det lokale erhvervsliv.

Tilbuddet inkluderer fagligt rollespil, undervisninger, leje af værksted eller learning lab på erhvervsskolerne, praktikplads på en privat eller offentlig arbejdsplads samt oplæg på skolens forældre- og lærermøder.

Send lærere og elever trygt afsted med Ungdomsbyens pædagogiske konsulenter, der sammen med fagfolk fra hovedområderne undervisere eleverne på skift.

Målet er at gøre skolens fag til virkelighed med forløb, der dækker erhvervsuddannelsernes hovedområder. På den måde giver vi eleverne et uddannelsesoverblik, tæt kendskab til arbejdsmarkedet og bedre føling med egne evner, ønsker og kompetencer.
  </p><br>
<h4><strong>Se relaterede kurser ▼</strong></h4>
</section>

<section class="elementcontainer"></section>
</main>

<script>

      let elementer;
      let categories;
      let filterElement = "52"
     
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
          klon.querySelector("img").src =element.loop_billede.guid;
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
