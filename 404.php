<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package website
 */

get_header();
?>

<section class="missing-page">
	<div class="missing-page-container">
    <div class="missing-page-title">
      <h1>Oups, cette page n'existe pas</h1>
    </div>
    <div class="missing-page-text">
      <p>Il semble que vous soyez tombé sur une impasse.
      Pas de panique, retournez à la <a href="/">page d’accueil</a> ou explorez notre menu pour trouver ce que vous cherchez.</p>
    </div>
  </div>
</section>

<?php
get_footer();
