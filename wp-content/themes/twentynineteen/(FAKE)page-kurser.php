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

<template>
  <article id="liste">
    
    <img src="" alt="" />
    <h2></h2>
    <!-- <p class="kategori"></p> -->
    <p class="klassetrin"></p>
    <p class="fag"></p>
    <p class="kortbeskrivelse"></p>
  </article>
</template>    

<main id="site-content" role="main">

<nav id="filtrering"></nav>

	<section class="retcontainer"></section>

</main><!-- #site-content -->


<script>

      let retter;
      let categories;
      let filterRet = "alle";
     
      const url = "https://skuret.eu/kea/ungdomsbyen/wp-json/wp/v2/kursus?per_page=100";
      const catUrl = "https://skuret.eu/kea/ungdomsbyen/wp-json/wp/v2/categories";


      async function getJson() {
        const data = await fetch(url);
        const catdata = await fetch(catUrl);
        retter = await data.json();
        categories = await catdata.json();
        console.log(categories);
        visRetter();
        opretknapper();
      }

      function opretknapper () {

        categories.forEach(cat => {
          document.querySelector("#filtrering").innerHTML += `<button class="filter" data-ret="${cat.id}">${cat.name}</button>`
        })

        addEventListenersToButtons () 
      }

      function  addEventListenersToButtons () {
        document.querySelectorAll("#filtrering button").forEach(elm => {
          elm.addEventListener("click", filtrering);
        })
      };

      
      function filtrering() {
        filterRet = this.dataset.ret;
        console.log(filterRet);

        visRetter();
      }


      function visRetter() {
        let temp = document.querySelector("template");
        let container = document.querySelector(".retcontainer")
        container.innerHTML = "";
        retter.forEach(ret => {
          if ( filterRet == "alle" || ret.categories.includes(parseInt(filterRet))){
          let klon = temp.cloneNode(true).content;
          klon.querySelector("h2").innerHTML = ret.title.rendered;
          klon.querySelector("img").src = ret.billede.guid;
          klon.querySelector(".kortbeskrivelse").innerHTML = ret.kortbeskrivelse;
          klon.querySelector(".klassetrin").innerHTML = ret.klassetrin;
          klon.querySelector(".fag").innerHTML = ret.fag;
          // klon.querySelector(".kategori").innerHTML = ret.kategori;
          klon.querySelector("article").addEventListener("click", () => { location.href = ret.link; })
          container.appendChild(klon);
          }
          })
        }

        getJson();


</script>

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php
get_footer();
