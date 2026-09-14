<?php
/**
 * The template for displaying singular post-types.
 *
 * @package HelloElementor
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

while ( have_posts() ) :
	the_post();
	$ens_categories = get_the_category();
	$ens_category   = ! empty( $ens_categories ) ? $ens_categories[0]->name : 'Novedades';
	?>

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=arrow_back,calendar_month,label" />

<style>
  .eldorado-news-single,
  .eldorado-news-single *,
  .eldorado-news-single *::before,
  .eldorado-news-single *::after { box-sizing: border-box; }

  .eldorado-news-single {
    --ens-blue: var(--cde-blue, #1e3a5f);
    --ens-blue-dark: var(--cde-blue-dark, #152c4a);
    --ens-gold: var(--cde-gold, #c9a227);
    --ens-gold-light: var(--cde-gold-light, #d4b445);
    --ens-white: var(--cde-white, #fff);
    --ens-gray-50: var(--cde-gray-50, #f8f9fa);
    --ens-gray-100: var(--cde-gray-100, #f1f3f5);
    --ens-gray-200: var(--cde-gray-200, #e9ecef);
    --ens-gray-600: var(--cde-gray-600, #6c757d);
    --ens-shadow: var(--cde-shadow, 0 1px 3px rgba(0,0,0,.08), 0 4px 12px rgba(0,0,0,.04));
    --ens-shadow-lg: var(--cde-shadow-lg, 0 4px 20px rgba(0,0,0,.1), 0 8px 32px rgba(0,0,0,.06));
    width: 100%;
    max-width: 100%;
    overflow-x: clip;
    color: #374151;
    background: var(--ens-gray-50);
    font-family: 'Plus Jakarta Sans', sans-serif;
    line-height: 1.7;
    -webkit-font-smoothing: antialiased;
  }

  .eldorado-news-single a { color: var(--ens-blue); }
  .eldorado-news-single img { display: block; max-width: 100%; height: auto; }
  .eldorado-news-single__container {
    width: 100%;
    max-width: none;
    margin: 0 auto;
    padding-right: clamp(16px, 3vw, 40px);
    padding-left: clamp(16px, 3vw, 40px);
  }
  .eldorado-news-single :focus-visible {
    outline: 2px solid var(--ens-gold);
    outline-offset: 3px;
    border-radius: 4px;
  }
  .eldorado-news-single .material-symbols-outlined {
    font-variation-settings: 'FILL' 0, 'wght' 500, 'GRAD' 0, 'opsz' 20;
    line-height: 1;
    user-select: none;
    vertical-align: middle;
  }

  .eldorado-news-single__header {
    padding: clamp(46px, 7vw, 86px) 0 42px;
    border-top: 2px solid var(--ens-gold);
    border-bottom: 1px solid var(--ens-gray-200);
    background: var(--ens-white);
  }
  .eldorado-news-single__back {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 30px;
    color: var(--ens-blue);
    font-size: .78rem;
    font-weight: 700;
    letter-spacing: .08em;
    text-decoration: none;
    text-transform: uppercase;
    transition: color var(--cde-transition, .3s ease), transform var(--cde-transition, .3s ease);
  }
  .eldorado-news-single__back:hover { color: var(--ens-gold); transform: translateX(-3px); }
  .eldorado-news-single__back .material-symbols-outlined { font-size: 18px; }

  .eldorado-news-single__eyebrow {
    display: flex;
    align-items: center;
    gap: 12px;
    margin: 0 0 14px;
    color: var(--ens-gray-600);
    font-size: 12px;
    font-weight: 700;
    letter-spacing: .18em;
    text-transform: uppercase;
  }
  .eldorado-news-single__eyebrow::after {
    content: '';
    width: 90px;
    height: 1px;
    background: linear-gradient(90deg, var(--ens-gold), transparent);
  }
  .eldorado-news-single__category {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 5px 12px;
    border-radius: 999px;
    background: var(--ens-gold);
    color: #16233a;
    font-size: .7rem;
    font-weight: 800;
    letter-spacing: .08em;
  }
  .eldorado-news-single__category .material-symbols-outlined { font-size: 15px; }

  .eldorado-news-single__title {
    max-width: 1080px;
    margin: 16px 0 18px;
    color: var(--ens-blue);
    font-size: clamp(2rem, 4.8vw, 3.8rem);
    font-weight: 800;
    line-height: 1.08;
    letter-spacing: -1px;
  }
  .eldorado-news-single__date {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    color: var(--ens-gray-600);
    font-size: .85rem;
    font-weight: 600;
  }
  .eldorado-news-single__date .material-symbols-outlined { color: var(--ens-gold); font-size: 18px; }

  .eldorado-news-single__media {
    overflow: hidden;
    margin-top: 36px;
    border-radius: var(--cde-radius, 8px);
    background: var(--ens-gray-100);
    box-shadow: var(--ens-shadow-lg);
  }
  .eldorado-news-single__media img {
    width: 100%;
    max-height: 680px;
    object-fit: cover;
  }

  .eldorado-news-single__main { padding: 56px 0 88px; }
  .eldorado-news-single__article {
    width: 100%;
    padding: clamp(28px, 5vw, 58px);
    border: 1px solid var(--ens-gray-200);
    border-radius: var(--cde-radius, 8px);
    border-top: 3px solid var(--ens-gold);
    background: var(--ens-white);
    box-shadow: var(--ens-shadow);
  }
  .eldorado-news-single__content > *:first-child { margin-top: 0; }
  .eldorado-news-single__content > *:last-child { margin-bottom: 0; }
  .eldorado-news-single__content h2,
  .eldorado-news-single__content h3,
  .eldorado-news-single__content h4 {
    margin: 1.8em 0 .65em;
    color: var(--ens-blue);
    font-weight: 800;
    line-height: 1.2;
    letter-spacing: -.3px;
  }
  .eldorado-news-single__content h2 { font-size: clamp(1.55rem, 3vw, 2.3rem); }
  .eldorado-news-single__content h3 { font-size: clamp(1.25rem, 2.5vw, 1.7rem); }
  .eldorado-news-single__content p { margin: 0 0 1.25em; }
  .eldorado-news-single__content a {
    font-weight: 700;
    text-decoration: underline;
    text-decoration-color: rgba(201,162,39,.6);
    text-underline-offset: 3px;
  }
  .eldorado-news-single__content a:hover { color: var(--ens-gold); }
  .eldorado-news-single__content ul,
  .eldorado-news-single__content ol { margin: 0 0 1.35em; padding-left: 1.4em; }
  .eldorado-news-single__content li { margin-bottom: .45em; }
  .eldorado-news-single__content blockquote {
    margin: 2em 0;
    padding: 20px 24px;
    border-left: 4px solid var(--ens-gold);
    background: var(--ens-gray-50);
    color: var(--ens-blue);
    font-size: 1.08em;
    font-weight: 600;
  }
  .eldorado-news-single__content figure { margin: 2em 0; }
  .eldorado-news-single__content figure img { width: 100%; }
  .eldorado-news-single__content figcaption { padding-top: 8px; color: var(--ens-gray-600); font-size: .8rem; text-align: center; }
  .eldorado-news-single__content iframe { display: block; width: 100%; max-width: 100%; border: 0; }
  .eldorado-news-single__content table { display: block; width: 100%; max-width: 100%; margin: 1.5em 0; overflow-x: auto; border-collapse: collapse; }
  .eldorado-news-single__content th,
  .eldorado-news-single__content td { padding: 10px 12px; border: 1px solid var(--ens-gray-200); text-align: left; }
  .eldorado-news-single__content th { background: var(--ens-gray-50); color: var(--ens-blue); }
  .eldorado-news-single__content p,
  .eldorado-news-single__content li,
  .eldorado-news-single__content a { overflow-wrap: anywhere; }

  .eldorado-news-single__tags {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 8px;
    margin-top: 40px;
    padding-top: 24px;
    border-top: 1px solid var(--ens-gray-100);
  }
  .eldorado-news-single__tags-label { color: var(--ens-gray-600); font-size: .78rem; font-weight: 700; }
  .eldorado-news-single__tags a {
    padding: 5px 12px;
    border-radius: 999px;
    background: var(--ens-gray-100);
    color: var(--ens-blue);
    font-size: .75rem;
    font-weight: 700;
    text-decoration: none;
    transition: background var(--cde-transition, .3s ease), color var(--cde-transition, .3s ease);
  }
  .eldorado-news-single__tags a:hover { background: var(--ens-gold); color: #16233a; }
  .eldorado-news-single__comments { margin-top: 34px; }

  @media (max-width: 768px) {
    .eldorado-news-single__header { padding: 42px 0 32px; }
    .eldorado-news-single__title { letter-spacing: -.5px; }
    .eldorado-news-single__main { padding: 32px 0 64px; }
    .eldorado-news-single__article { padding: 26px 20px; }
  }
  @media (max-width: 480px) {
    .eldorado-news-single__eyebrow { letter-spacing: .12em; }
    .eldorado-news-single__eyebrow::after { width: 48px; }
    .eldorado-news-single__title { font-size: 1.9rem; }
    .eldorado-news-single__content blockquote { padding: 16px 18px; }
  }
</style>

<main id="content" <?php post_class( 'site-main eldorado-news-single' ); ?>>
  <header class="eldorado-news-single__header">
    <div class="eldorado-news-single__container">
      <a class="eldorado-news-single__back" href="<?php echo esc_url( home_url( '/novedades/' ) ); ?>">
        <span class="material-symbols-outlined" aria-hidden="true">arrow_back</span>
        Volver a novedades
      </a>
      <p class="eldorado-news-single__eyebrow">Prensa y comunicación</p>
      <span class="eldorado-news-single__category">
        <span class="material-symbols-outlined" aria-hidden="true">label</span>
        <?php echo esc_html( $ens_category ); ?>
      </span>
      <?php the_title( '<h1 class="eldorado-news-single__title">', '</h1>' ); ?>
      <time class="eldorado-news-single__date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
        <span class="material-symbols-outlined" aria-hidden="true">calendar_month</span>
        <?php echo esc_html( get_the_date( 'j \d\e F \d\e Y' ) ); ?>
      </time>

      <?php if ( has_post_thumbnail() ) : ?>
        <figure class="eldorado-news-single__media">
          <?php the_post_thumbnail( 'full', array( 'loading' => 'eager' ) ); ?>
        </figure>
      <?php endif; ?>
    </div>
  </header>

  <div class="eldorado-news-single__main">
    <div class="eldorado-news-single__container">
      <article class="eldorado-news-single__article">
        <div class="eldorado-news-single__content">
          <?php the_content(); ?>
          <?php wp_link_pages(); ?>
        </div>

        <?php if ( has_tag() ) : ?>
          <div class="eldorado-news-single__tags">
            <span class="eldorado-news-single__tags-label">Etiquetas:</span>
            <?php the_tags( '', '', '' ); ?>
          </div>
        <?php endif; ?>
      </article>

      <div class="eldorado-news-single__comments">
        <?php comments_template(); ?>
      </div>
    </div>
  </div>
</main>

<?php endwhile; ?>
