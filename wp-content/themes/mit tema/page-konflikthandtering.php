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
<h1>Konflikthåndtering</h1>
<br>
<p>
Hvordan håndterer dine elever konflikter i og udenfor undervisningen? Ungdomsbyens konflikthåndteringskurser styrker lærerens bevidsthed og klassens fællesskab med øgede relationskompetencer.

Ungdomsbyen tilbyder en række konflikthåndteringskurser. De har alle til formål at give elever og lærere grundlæggende redskaber til at forbedre samarbejdet i klassen og håndtere spændinger og konflikter konstruktivt.

Eleverne vil gennem praktiske ud-på-gulvet-øvelser lære at forholde sig til konflikttrappen, egne reaktionsmønstre, og fordelene ved aktiv lytning og hensigtsmæssig sprogbrug.
Vi har særligt fokus på, hvordan eleverne udtrykker følelser og behov i en konflikt uden at træde over både egne og andres grænser.

Kurset fokuserer på temaer, der er aktuelle i klassen. Metoderne i brug kan overføres til mange temaer fx: sociale medier, grænser, forskellighed, utryghed, sprogbrug og gruppedynamikker.
</p>
<h3>Lærerkursus i konflikthåndtering
</h3>
<p>
Forud for Ungdomsbyens kursus til eleverne, har vi udviklet et særligt kursus for lærere og pædagoger i uddannelsesverdenen, der følger med i prisen.
Her klæder vi de voksne på til at være rollemodeller i konfliktsituationer.

På lærerkurset introducerer vi til de øvelser, som eleverne afprøver på deres kursusdag. Herved  skabes et fundament for og et fælles sprog omkring konflikthåndtering i forhold til de unge. Målet er at skabe opmærksomhed omkring lærers, pædagogers og elevers relationskompetencer. Samtidigt fokuseres på at skabe rum for refleksion over egne mønstre og udfordringer med konflikter på arbejdet.

Vi supplerer dagen med idéer, øvelser og inspiration til det videre arbejde med konflikthåndtering og elevgruppens trivsel. Endelig er der god mulighed for at dele sine udfordringer og erfaringer med fagfæller.

Vi har erfaring med at undervise elever både i almene klasser, specialklasser og på ungdomsuddannelserne. Programmet bliver tilpasset alle elevgruppers særlige behov og niveau.
  </p> <br>
<h4><strong>Se relaterede kurser ▼</strong></h4>
</section>

<section class="elementcontainer"></section>
</main>

<script>

      let elementer;
      let categories;
      let filterElement = "47"
     
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
          klon.querySelector("img").src = element.billede.guid;
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