<?php

/** eSIM destination page used for the site's static front page. */
get_header();

$esim_products = function_exists('wc_get_products')
    ? wc_get_products(
        array(
            'status'  => 'publish',
            'limit'   => -1,
            'orderby' => 'date',
            'order'   => 'DESC',
        )
    )
    : array();

$esim_flags = array(
    'Argentina'       => '🇦🇷',
    'Australia'       => '🇦🇺',
    'Austria'         => '🇦🇹',
    'Belgium'         => '🇧🇪',
    'Brazil'          => '🇧🇷',
    'Canada'          => '🇨🇦',
    'Canton Fair'     => '🇨🇳',
    'Chile'           => '🇨🇱',
    'China 5G'        => '🇨🇳',
    'Czech Republic'  => '🇨🇿',
    'Denmark'         => '🇩🇰',
    'Egypt'           => '🇪🇬',
    'Finland'         => '🇫🇮',
    'France'          => '🇫🇷',
    'Ireland'         => '🇮🇪',
    'Japan'           => '🇯🇵',
    'Kenya'           => '🇰🇪',
    'Malaysia'        => '🇲🇾',
    'Mexico'          => '🇲🇽',
    'Morocco'         => '🇲🇦',
    'Netherlands'     => '🇳🇱',
    'New Zealand'     => '🇳🇿',
    'Nigeria'         => '🇳🇬',
    'Norway'          => '🇳🇴',
    'Europe'          => '🇪🇺',
    'Asia Pacific'    => '🌏',
    'New York'        => '🗽',
    'Tokyo'           => '🗼',
);

$esim_cards_count = 0;
$esim_popular_count = 0;
?>

<main class="esim-page">
    <div class="esim-container">
        <header class="esim-intro">
            <h1>Many eSIMs in one place, <strong>find yours</strong> here</h1>
            <p><a href="https://gigago.com/esim/" target="_blank" rel="noopener">Gigago eSIMs</a> are trusted by over 1,000,000 people worldwide</p>
        </header>

        <div class="esim-search-wrap">
            <label class="screen-reader-text" for="esim-country-search">Search destinations</label>
            <span class="esim-search-icon" aria-hidden="true"></span>
            <input id="esim-country-search" type="search" placeholder="Where are you travelling?" autocomplete="off">
        </div>

        <div class="esim-tabs" role="tablist" aria-label="Destination type">
            <button class="esim-tab is-active" type="button" role="tab" aria-selected="true" data-filter="popular">Popular</button>
            <button class="esim-tab" type="button" role="tab" aria-selected="false" data-filter="countries">Countries</button>
        </div>

        <section class="esim-grid" aria-live="polite">
            <?php foreach ($esim_products as $product) : ?>
                <?php
                if (! $product->is_visible()) {
                    continue;
                }

                $product_name = $product->get_name();
                $product_categories = array();
                $is_multi_country = false;
                $is_city = false;
                $is_country = false;

                foreach ($product->get_category_ids() as $category_id) {
                    $category = get_term($category_id, 'product_cat');
                    if (! $category || is_wp_error($category)) {
                        continue;
                    }

                    $category_slug = strtolower($category->slug);
                    $category_name = strtolower($category->name);

                    if (false !== strpos($category_slug, 'multi') || false !== strpos($category_name, 'multi')) {
                        $is_multi_country = true;
                    }
                    if (
                        false !== strpos($category_slug, 'city') ||
                        false !== strpos($category_slug, 'citi') ||
                        false !== strpos($category_name, 'city') ||
                        false !== strpos($category_name, 'citi')
                    ) {
                        $is_city = true;
                    }
                    if (false !== strpos($category_slug, 'countr') || false !== strpos($category_name, 'countr')) {
                        $is_country = true;
                    }
                }

                if ($is_multi_country) {
                    $product_categories[] = 'multi-country';
                }
                if ($is_city) {
                    $product_categories[] = 'cities';
                }
                if ($is_country || (! $is_multi_country && ! $is_city)) {
                    $product_categories[] = 'countries';
                }

                $product_categories = array_unique($product_categories);
                $price_html = $product->get_price_html();

                if ('' === $price_html) {
                    continue;
                }

                if ($esim_popular_count < 10) {
                    $product_categories[] = 'popular';
                    $esim_popular_count++;
                }

                if ($product->is_type('variable')) {
                    $minimum_price = (float) $product->get_variation_price('min', true);
                    $maximum_price = (float) $product->get_variation_price('max', true);

                    if ($minimum_price >= 1 && $maximum_price <= 10 && $maximum_price > $minimum_price) {
                        $price_html = sprintf(
                            /* translators: %s: minimum product price */
                            esc_html__('From %s', 'travelme'),
                            wc_price($minimum_price)
                        );
                    } elseif ($maximum_price <= $minimum_price) {
                        $price_html = sprintf(
                            /* translators: %s: product price */
                            esc_html__('From %s', 'travelme'),
                            $price_html
                        );
                    }
                } else {
                    $price_html = sprintf(
                        /* translators: %s: product price */
                        esc_html__('From %s', 'travelme'),
                        $price_html
                    );
                }

                $esim_cards_count++;
                ?>
                <a class="esim-card" href="<?php echo esc_url($product->get_permalink()); ?>" data-categories="<?php echo esc_attr(implode(' ', $product_categories)); ?>" data-name="<?php echo esc_attr(strtolower($product_name)); ?>">
                    <span class="esim-flag" aria-hidden="true"><?php echo esc_html(isset($esim_flags[$product_name]) ? $esim_flags[$product_name] : '🌐'); ?></span>
                    <div class="esim-card-copy">
                        <h2><?php echo esc_html($product_name); ?></h2>
                        <p><?php echo wp_kses_post($price_html); ?></p>
                    </div>
                </a>
            <?php endforeach; ?>
        </section>
        <p class="esim-empty" <?php echo $esim_cards_count ? 'hidden' : ''; ?>><?php esc_html_e('No destinations found. Try another search.', 'travelme'); ?></p>
    </div>
</main>

<?php get_footer(); ?>