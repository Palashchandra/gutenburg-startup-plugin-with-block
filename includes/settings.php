<?php
/**
 * Generate Custom CSS from Settings with Enhanced Typography
 */

function pctheme_blocks_generate_custom_css() {
    // Get color settings
    $primary_color = get_option('pctheme_primary_color', '#3b82f6');
    $secondary_color = get_option('pctheme_secondary_color', '#8b5cf6');
    $accent_color = get_option('pctheme_accent_color', '#10b981');
    $text_color = get_option('pctheme_text_color', '#374151');
    $heading_color = get_option('pctheme_heading_color', '#1f2937');
    
    // Get font families
    $heading_font = get_option('pctheme_heading_font', 'Inter');
    $body_font = get_option('pctheme_body_font', 'Inter');
    
    // Get paragraph settings
    $p_font_size = get_option('pctheme_p_font_size', '16');
    $p_font_weight = get_option('pctheme_p_font_weight', '400');
    $p_line_height = get_option('pctheme_p_line_height', '1.7');
    $p_letter_spacing = get_option('pctheme_p_letter_spacing', '0');
    
    // Get spacing settings
    $block_spacing = get_option('pctheme_block_spacing', '4');
    $border_radius = get_option('pctheme_border_radius', '8');
    
    // Get heading settings
    $headings = array('h1', 'h2', 'h3', 'h4', 'h5', 'h6');
    $heading_styles = array();
    
    $defaults = array(
        'h1' => array('size' => '48', 'weight' => '700', 'height' => '1.2', 'spacing' => '-0.02'),
        'h2' => array('size' => '40', 'weight' => '700', 'height' => '1.3', 'spacing' => '-0.01'),
        'h3' => array('size' => '32', 'weight' => '600', 'height' => '1.4', 'spacing' => '0'),
        'h4' => array('size' => '24', 'weight' => '600', 'height' => '1.5', 'spacing' => '0'),
        'h5' => array('size' => '20', 'weight' => '600', 'height' => '1.5', 'spacing' => '0'),
        'h6' => array('size' => '18', 'weight' => '600', 'height' => '1.5', 'spacing' => '0'),
    );
    
    foreach ($headings as $h) {
        $heading_styles[$h] = array(
            'size' => get_option("pctheme_{$h}_font_size", $defaults[$h]['size']),
            'weight' => get_option("pctheme_{$h}_font_weight", $defaults[$h]['weight']),
            'height' => get_option("pctheme_{$h}_line_height", $defaults[$h]['height']),
            'spacing' => get_option("pctheme_{$h}_letter_spacing", $defaults[$h]['spacing']),
        );
    }
    
    // Generate CSS
    $css = "
    /* Pctheme Blocks Custom Styles */
    :root {
        --pctheme-primary: {$primary_color};
        --pctheme-secondary: {$secondary_color};
        --pctheme-accent: {$accent_color};
        --pctheme-text: {$text_color};
        --pctheme-heading: {$heading_color};
        --pctheme-spacing: {$block_spacing}rem;
        --pctheme-radius: {$border_radius}px;
        --pctheme-heading-font: '{$heading_font}', sans-serif;
        --pctheme-body-font: '{$body_font}', sans-serif;
    }
    
    /* Body Typography */
    body {
        font-family: var(--pctheme-body-font);
        font-size: {$p_font_size}px;
        font-weight: {$p_font_weight};
        line-height: {$p_line_height};
        color: {$text_color};
    }
    
    /* Paragraph Typography */
    p,
    .wp-block-pctheme-hero p,
    .wp-block-pctheme-cta p,
    .wp-block-pctheme-feature-grid p,
    .wp-block-pctheme-card p,
    .wp-block-pctheme-pricing p,
    .wp-block-pctheme-testimonial p {
        font-family: var(--pctheme-body-font);
        font-size: {$p_font_size}px;
        font-weight: {$p_font_weight};
        line-height: {$p_line_height};
        letter-spacing: {$p_letter_spacing}em;
        color: {$text_color};
    }
    
    /* H1 Typography */
    h1,
    .wp-block-pctheme-hero h1,
    .editor-styles-wrapper h1 {
        font-family: var(--pctheme-heading-font);
        font-size: {$heading_styles['h1']['size']}px;
        font-weight: {$heading_styles['h1']['weight']};
        line-height: {$heading_styles['h1']['height']};
        letter-spacing: {$heading_styles['h1']['spacing']}em;
        color: {$heading_color};
    }
    
    /* H2 Typography */
    h2,
    .wp-block-pctheme-cta h2,
    .editor-styles-wrapper h2 {
        font-family: var(--pctheme-heading-font);
        font-size: {$heading_styles['h2']['size']}px;
        font-weight: {$heading_styles['h2']['weight']};
        line-height: {$heading_styles['h2']['height']};
        letter-spacing: {$heading_styles['h2']['spacing']}em;
        color: {$heading_color};
    }
    
    /* H3 Typography */
    h3,
    .wp-block-pctheme-feature-grid h3,
    .wp-block-pctheme-card h3,
    .wp-block-pctheme-pricing h3,
    .editor-styles-wrapper h3 {
        font-family: var(--pctheme-heading-font);
        font-size: {$heading_styles['h3']['size']}px;
        font-weight: {$heading_styles['h3']['weight']};
        line-height: {$heading_styles['h3']['height']};
        letter-spacing: {$heading_styles['h3']['spacing']}em;
        color: {$heading_color};
    }
    
    /* H4 Typography */
    h4,
    .wp-block-pctheme-testimonial h4,
    .editor-styles-wrapper h4 {
        font-family: var(--pctheme-heading-font);
        font-size: {$heading_styles['h4']['size']}px;
        font-weight: {$heading_styles['h4']['weight']};
        line-height: {$heading_styles['h4']['height']};
        letter-spacing: {$heading_styles['h4']['spacing']}em;
        color: {$heading_color};
    }
    
    /* H5 Typography */
    h5,
    .editor-styles-wrapper h5 {
        font-family: var(--pctheme-heading-font);
        font-size: {$heading_styles['h5']['size']}px;
        font-weight: {$heading_styles['h5']['weight']};
        line-height: {$heading_styles['h5']['height']};
        letter-spacing: {$heading_styles['h5']['spacing']}em;
        color: {$heading_color};
    }
    
    /* H6 Typography */
    h6,
    .editor-styles-wrapper h6 {
        font-family: var(--pctheme-heading-font);
        font-size: {$heading_styles['h6']['size']}px;
        font-weight: {$heading_styles['h6']['weight']};
        line-height: {$heading_styles['h6']['height']};
        letter-spacing: {$heading_styles['h6']['spacing']}em;
        color: {$heading_color};
    }
    
    /* Buttons */
    .wp-block-pctheme-hero a,
    .wp-block-pctheme-cta a,
    .wp-block-pctheme-card a,
    .wp-block-pctheme-pricing a,
    button {
        font-family: var(--pctheme-body-font);
        background-color: {$primary_color};
        border-radius: {$border_radius}px;
        font-weight: 600;
    }
    
    .wp-block-pctheme-hero a:hover,
    .wp-block-pctheme-cta a:hover,
    .wp-block-pctheme-card a:hover,
    .wp-block-pctheme-pricing a:hover {
        background-color: {$primary_color}dd;
    }
    
    /* Cards */
    .wp-block-pctheme-card,
    .wp-block-pctheme-feature-grid > div > div > div,
    .wp-block-pctheme-pricing > div > div > div,
    .wp-block-pctheme-testimonial .swiper-slide > div {
        border-radius: {$border_radius}px;
    }
    
    /* Block Spacing */
    .wp-block-pctheme-hero,
    .wp-block-pctheme-feature-grid,
    .wp-block-pctheme-card,
    .wp-block-pctheme-pricing,
    .wp-block-pctheme-testimonial,
    .wp-block-pctheme-cta {
        margin-bottom: var(--pctheme-spacing);
    }
    
    /* Accent Colors */
    .wp-block-pctheme-feature-grid svg {
        color: {$accent_color};
    }
    
    .wp-block-pctheme-pricing .popular-badge {
        background-color: {$accent_color};
    }
    
    /* Secondary Colors for gradients */
    .wp-block-pctheme-hero[data-bg='blue'],
    .bg-gradient-to-r.from-blue-500 {
        background: linear-gradient(to right, {$primary_color}, {$secondary_color});
    }
    
    /* Responsive Typography */
    @media (max-width: 768px) {
        h1,
        .wp-block-pctheme-hero h1 {
            font-size: calc({$heading_styles['h1']['size']}px * 0.7);
        }
        
        h2,
        .wp-block-pctheme-cta h2 {
            font-size: calc({$heading_styles['h2']['size']}px * 0.75);
        }
        
        h3 {
            font-size: calc({$heading_styles['h3']['size']}px * 0.8);
        }
        
        h4 {
            font-size: calc({$heading_styles['h4']['size']}px * 0.85);
        }
        
        p {
            font-size: calc({$p_font_size}px * 0.95);
        }
    }
    
    @media (max-width: 480px) {
        h1,
        .wp-block-pctheme-hero h1 {
            font-size: calc({$heading_styles['h1']['size']}px * 0.6);
        }
        
        h2,
        .wp-block-pctheme-cta h2 {
            font-size: calc({$heading_styles['h2']['size']}px * 0.65);
        }
    }
    ";
    
    return $css;
}

// Enqueue custom CSS on frontend
function pctheme_blocks_enqueue_custom_css() {
    $custom_css = pctheme_blocks_generate_custom_css();
    wp_add_inline_style('wp-block-library', $custom_css);
}
add_action('wp_enqueue_scripts', 'pctheme_blocks_enqueue_custom_css');

// Enqueue custom CSS in editor
function pctheme_blocks_enqueue_editor_custom_css() {
    $custom_css = pctheme_blocks_generate_custom_css();
    wp_add_inline_style('wp-edit-blocks', $custom_css);
}
add_action('enqueue_block_editor_assets', 'pctheme_blocks_enqueue_editor_custom_css');

// Load Google Fonts
function pctheme_blocks_load_fonts() {
    $heading_font = get_option('pctheme_heading_font', 'Inter');
    $body_font = get_option('pctheme_body_font', 'Inter');
    
    $fonts = array();
    if ($heading_font) $fonts[] = $heading_font . ':300,400,500,600,700,800,900';
    if ($body_font && $body_font !== $heading_font) $fonts[] = $body_font . ':300,400,500,600,700';
    
    if (!empty($fonts)) {
        $fonts_url = 'https://fonts.googleapis.com/css2?family=' . implode('&family=', array_map('urlencode', $fonts)) . '&display=swap';
        wp_enqueue_style('pctheme-blocks-fonts', $fonts_url, array(), null);
    }
}
add_action('wp_enqueue_scripts', 'pctheme_blocks_load_fonts');
add_action('enqueue_block_editor_assets', 'pctheme_blocks_load_fonts');