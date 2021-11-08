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

<div class="kursus-billede">

</div>

<div id="kursus-text">
<h1>Book kurser</h1>
<p>Se vores store udvalg af forskellige kurser her, og gå ind og læs nærmere om hvert kursus.</p>
</div>

<div id="dropdown" class="dropdown">
  <button class="dropbtn" class="filter">Målgruppe ▼</button>
  <div class="dropdown-content">
  <nav id="filtrering">
  </nav>
  </div>
</div>

<div id="dropdown" class="dropdown">
  <button class="dropbtn" class="filter2">Temaer ▼</button>
  <div class="dropdown-content">
  <nav id="filtrering2">
  </nav>
  </div>
</div>

<section class="elementcontainer"></section>

</main>

</div>
<script>

      let elementer;
      let categories;
      let temaer;
      let filterElement = "alle";
     
      const url = "https://skuret.eu/kea/ungdomsbyen/wp-json/wp/v2/kursus?per_page=100";
      const catUrl = "https://skuret.eu/kea/ungdomsbyen/wp-json/wp/v2/categories?per_page=100";
      const temUrl = "https://skuret.eu/kea/ungdomsbyen/wp-json/wp/v2/tema?per_page=100";


      async function getJson() {
        const data = await fetch(url);
        const catdata = await fetch(catUrl);
        const temdata = await fetch(temUrl);
        elementer = await data.json();
        categories = await catdata.json();
        temaer = await temdata.json();
        console.log(categories);
        console.log(temaer);
        visElementer();
        opretknapper();
      }

      function opretknapper () {

        categories.forEach(cat => {
          document.querySelector("#filtrering").innerHTML += `<button class="filter" data-element="${cat.id}">${cat.name}</button>`
        })

        temaer.forEach(tem => {
          document.querySelector("#filtrering2").innerHTML += `<button class="filter2" data-element="${tem.id}">${tem.name}</button>`
        })

        addEventListenersToButtons () 
      }

      function  addEventListenersToButtons () {
        document.querySelectorAll("#filtrering button, #filtrering2 button").forEach(elm => {
          elm.addEventListener("click", filtrering);
        })

        // document.querySelectorAll("#filtrering2 button").forEach(elm => {
        //   elm.addEventListener("click", filtrering);
        // })
      };

      
      function filtrering() {
        filterElement = this.dataset.element;
        console.log(filterElement);

        visElementer();
      }

      // function filtrering2() {
      //   filterElement2 = this.dataset.element;
      //   console.log(filterElement2);

      //   visElementer();
      // }


      function visElementer() {
        let temp = document.querySelector("template");
        let container = document.querySelector(".elementcontainer");
        container.innerHTML = "";
        elementer.forEach(element => {
        if ( filterElement == "alle" || element.categories.includes(parseInt(filterElement))){
          let klon = temp.cloneNode(true).content;
          klon.querySelector("h2").innerHTML = element.title.rendered;
          klon.querySelector("img").src = element.billede.guid;
          klon.querySelector(".kortbeskrivelse").innerHTML = element.kortbeskrivelse;
          klon.querySelector(".klassetrin").innerHTML = "👨‍👦‍👦: " + element.klassetrin;
          klon.querySelector(".fag").innerHTML = "📖: " + element.fag;
          klon.querySelector(".læs-mere-knap").addEventListener("click", () => { location.href = element.link; })
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
