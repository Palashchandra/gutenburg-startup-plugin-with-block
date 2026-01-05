<?php
/**
 * Pctheme Blocks Settings Page with Enhanced Typography
 */

// Register settings
function pctheme_blocks_register_settings() {
    // Color Settings
    register_setting('pctheme_blocks_settings', 'pctheme_primary_color');
    register_setting('pctheme_blocks_settings', 'pctheme_secondary_color');
    register_setting('pctheme_blocks_settings', 'pctheme_accent_color');
    register_setting('pctheme_blocks_settings', 'pctheme_text_color');
    register_setting('pctheme_blocks_settings', 'pctheme_heading_color');
    
    // Global Typography Settings
    register_setting('pctheme_blocks_settings', 'pctheme_heading_font');
    register_setting('pctheme_blocks_settings', 'pctheme_body_font');
    
    // H1 Typography
    register_setting('pctheme_blocks_settings', 'pctheme_h1_font_size');
    register_setting('pctheme_blocks_settings', 'pctheme_h1_font_weight');
    register_setting('pctheme_blocks_settings', 'pctheme_h1_line_height');
    register_setting('pctheme_blocks_settings', 'pctheme_h1_letter_spacing');
    
    // H2 Typography
    register_setting('pctheme_blocks_settings', 'pctheme_h2_font_size');
    register_setting('pctheme_blocks_settings', 'pctheme_h2_font_weight');
    register_setting('pctheme_blocks_settings', 'pctheme_h2_line_height');
    register_setting('pctheme_blocks_settings', 'pctheme_h2_letter_spacing');
    
    // H3 Typography
    register_setting('pctheme_blocks_settings', 'pctheme_h3_font_size');
    register_setting('pctheme_blocks_settings', 'pctheme_h3_font_weight');
    register_setting('pctheme_blocks_settings', 'pctheme_h3_line_height');
    register_setting('pctheme_blocks_settings', 'pctheme_h3_letter_spacing');
    
    // H4 Typography
    register_setting('pctheme_blocks_settings', 'pctheme_h4_font_size');
    register_setting('pctheme_blocks_settings', 'pctheme_h4_font_weight');
    register_setting('pctheme_blocks_settings', 'pctheme_h4_line_height');
    register_setting('pctheme_blocks_settings', 'pctheme_h4_letter_spacing');
    
    // H5 Typography
    register_setting('pctheme_blocks_settings', 'pctheme_h5_font_size');
    register_setting('pctheme_blocks_settings', 'pctheme_h5_font_weight');
    register_setting('pctheme_blocks_settings', 'pctheme_h5_line_height');
    register_setting('pctheme_blocks_settings', 'pctheme_h5_letter_spacing');
    
    // H6 Typography
    register_setting('pctheme_blocks_settings', 'pctheme_h6_font_size');
    register_setting('pctheme_blocks_settings', 'pctheme_h6_font_weight');
    register_setting('pctheme_blocks_settings', 'pctheme_h6_line_height');
    register_setting('pctheme_blocks_settings', 'pctheme_h6_letter_spacing');
    
    // Paragraph Typography
    register_setting('pctheme_blocks_settings', 'pctheme_p_font_size');
    register_setting('pctheme_blocks_settings', 'pctheme_p_font_weight');
    register_setting('pctheme_blocks_settings', 'pctheme_p_line_height');
    register_setting('pctheme_blocks_settings', 'pctheme_p_letter_spacing');
    
    // Spacing Settings
    register_setting('pctheme_blocks_settings', 'pctheme_block_spacing');
    register_setting('pctheme_blocks_settings', 'pctheme_border_radius');
}
add_action('admin_init', 'pctheme_blocks_register_settings');

// Add admin menu
function pctheme_blocks_add_menu() {
    add_menu_page(
        'Pctheme Blocks Settings',
        'Pctheme Blocks',
        'manage_options',
        'pctheme-blocks-settings',
        'pctheme_blocks_settings_page',
        'dashicons-admin-customizer',
        58
    );
}
add_action('admin_menu', 'pctheme_blocks_add_menu');

// Get default typography values
function pctheme_blocks_get_defaults() {
    return array(
        // Colors
        'primary_color' => '#3b82f6',
        'secondary_color' => '#8b5cf6',
        'accent_color' => '#10b981',
        'text_color' => '#374151',
        'heading_color' => '#1f2937',
        
        // Fonts
        'heading_font' => 'Inter',
        'body_font' => 'Inter',
        
        // H1
        'h1_font_size' => '48',
        'h1_font_weight' => '700',
        'h1_line_height' => '1.2',
        'h1_letter_spacing' => '-0.02',
        
        // H2
        'h2_font_size' => '40',
        'h2_font_weight' => '700',
        'h2_line_height' => '1.3',
        'h2_letter_spacing' => '-0.01',
        
        // H3
        'h3_font_size' => '32',
        'h3_font_weight' => '600',
        'h3_line_height' => '1.4',
        'h3_letter_spacing' => '0',
        
        // H4
        'h4_font_size' => '24',
        'h4_font_weight' => '600',
        'h4_line_height' => '1.5',
        'h4_letter_spacing' => '0',
        
        // H5
        'h5_font_size' => '20',
        'h5_font_weight' => '600',
        'h5_line_height' => '1.5',
        'h5_letter_spacing' => '0',
        
        // H6
        'h6_font_size' => '18',
        'h6_font_weight' => '600',
        'h6_line_height' => '1.5',
        'h6_letter_spacing' => '0',
        
        // Paragraph
        'p_font_size' => '16',
        'p_font_weight' => '400',
        'p_line_height' => '1.7',
        'p_letter_spacing' => '0',
        
        // Spacing
        'block_spacing' => '4',
        'border_radius' => '8',
    );
}

// Settings page HTML
function pctheme_blocks_settings_page() {
    $defaults = pctheme_blocks_get_defaults();
    
    // Get current values or defaults
    $primary_color = get_option('pctheme_primary_color', $defaults['primary_color']);
    $secondary_color = get_option('pctheme_secondary_color', $defaults['secondary_color']);
    $accent_color = get_option('pctheme_accent_color', $defaults['accent_color']);
    $text_color = get_option('pctheme_text_color', $defaults['text_color']);
    $heading_color = get_option('pctheme_heading_color', $defaults['heading_color']);
    
    $heading_font = get_option('pctheme_heading_font', $defaults['heading_font']);
    $body_font = get_option('pctheme_body_font', $defaults['body_font']);
    
    // H1-H6 values
    $headings = array('h1', 'h2', 'h3', 'h4', 'h5', 'h6');
    $heading_values = array();
    foreach ($headings as $h) {
        $heading_values[$h] = array(
            'font_size' => get_option("pctheme_{$h}_font_size", $defaults["{$h}_font_size"]),
            'font_weight' => get_option("pctheme_{$h}_font_weight", $defaults["{$h}_font_weight"]),
            'line_height' => get_option("pctheme_{$h}_line_height", $defaults["{$h}_line_height"]),
            'letter_spacing' => get_option("pctheme_{$h}_letter_spacing", $defaults["{$h}_letter_spacing"]),
        );
    }
    
    // Paragraph values
    $p_font_size = get_option('pctheme_p_font_size', $defaults['p_font_size']);
    $p_font_weight = get_option('pctheme_p_font_weight', $defaults['p_font_weight']);
    $p_line_height = get_option('pctheme_p_line_height', $defaults['p_line_height']);
    $p_letter_spacing = get_option('pctheme_p_letter_spacing', $defaults['p_letter_spacing']);
    
    $block_spacing = get_option('pctheme_block_spacing', $defaults['block_spacing']);
    $border_radius = get_option('pctheme_border_radius', $defaults['border_radius']);
    
    ?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        
        <?php if (isset($_GET['settings-updated'])) : ?>
            <div class="notice notice-success is-dismissible">
                <p><strong>Settings saved successfully!</strong></p>
            </div>
        <?php endif; ?>
        
        <form method="post" action="options.php">
            <?php settings_fields('pctheme_blocks_settings'); ?>
            
            <div style="max-width: 1400px;">
                
                <!-- Tabs -->
                <div class="nav-tab-wrapper" style="margin-top: 20px;">
                    <a href="#colors" class="nav-tab nav-tab-active" data-tab="colors">🎨 Colors</a>
                    <a href="#fonts" class="nav-tab" data-tab="fonts">✍️ Fonts</a>
                    <a href="#headings" class="nav-tab" data-tab="headings">📝 Headings</a>
                    <a href="#paragraph" class="nav-tab" data-tab="paragraph">📄 Paragraph</a>
                    <a href="#spacing" class="nav-tab" data-tab="spacing">📏 Spacing</a>
                    <a href="#preview" class="nav-tab" data-tab="preview">👀 Preview</a>
                </div>
                
                <!-- Colors Tab -->
                <div id="colors-tab" class="tab-content active">
                    <div class="postbox" style="margin-top: 20px;">
                        <div class="postbox-header">
                            <h2>🎨 Color Settings</h2>
                        </div>
                        <div class="inside">
                            <table class="form-table">
                                <tr>
                                    <th scope="row"><label for="pctheme_primary_color">Primary Color</label></th>
                                    <td>
                                        <input type="color" id="pctheme_primary_color" name="pctheme_primary_color" value="<?php echo esc_attr($primary_color); ?>" />
                                        <input type="text" value="<?php echo esc_attr($primary_color); ?>" readonly style="margin-left: 10px; width: 100px;" />
                                        <p class="description">Main brand color (buttons, links, accents)</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><label for="pctheme_secondary_color">Secondary Color</label></th>
                                    <td>
                                        <input type="color" id="pctheme_secondary_color" name="pctheme_secondary_color" value="<?php echo esc_attr($secondary_color); ?>" />
                                        <input type="text" value="<?php echo esc_attr($secondary_color); ?>" readonly style="margin-left: 10px; width: 100px;" />
                                        <p class="description">Secondary brand color</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><label for="pctheme_accent_color">Accent Color</label></th>
                                    <td>
                                        <input type="color" id="pctheme_accent_color" name="pctheme_accent_color" value="<?php echo esc_attr($accent_color); ?>" />
                                        <input type="text" value="<?php echo esc_attr($accent_color); ?>" readonly style="margin-left: 10px; width: 100px;" />
                                        <p class="description">Accent color (highlights, success states)</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><label for="pctheme_text_color">Text Color</label></th>
                                    <td>
                                        <input type="color" id="pctheme_text_color" name="pctheme_text_color" value="<?php echo esc_attr($text_color); ?>" />
                                        <input type="text" value="<?php echo esc_attr($text_color); ?>" readonly style="margin-left: 10px; width: 100px;" />
                                        <p class="description">Body text color</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><label for="pctheme_heading_color">Heading Color</label></th>
                                    <td>
                                        <input type="color" id="pctheme_heading_color" name="pctheme_heading_color" value="<?php echo esc_attr($heading_color); ?>" />
                                        <input type="text" value="<?php echo esc_attr($heading_color); ?>" readonly style="margin-left: 10px; width: 100px;" />
                                        <p class="description">Headings color</p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- Fonts Tab -->
                <div id="fonts-tab" class="tab-content">
                    <div class="postbox" style="margin-top: 20px;">
                        <div class="postbox-header">
                            <h2>✍️ Font Families</h2>
                        </div>
                        <div class="inside">
                            <table class="form-table">
                                <tr>
                                    <th scope="row"><label for="pctheme_heading_font">Heading Font</label></th>
                                    <td>
                                        <select id="pctheme_heading_font" name="pctheme_heading_font">
                                            <?php
                                            $fonts = array(
                                                'Inter' => 'Inter',
                                                'Roboto' => 'Roboto',
                                                'Poppins' => 'Poppins',
                                                'Montserrat' => 'Montserrat',
                                                'Open Sans' => 'Open Sans',
                                                'Lato' => 'Lato',
                                                'Raleway' => 'Raleway',
                                                'Playfair Display' => 'Playfair Display',
                                                'Merriweather' => 'Merriweather',
                                                'Nunito' => 'Nunito',
                                                'Work Sans' => 'Work Sans',
                                                'DM Sans' => 'DM Sans',
                                                'Quicksand' => 'Quicksand',
                                            );
                                            foreach ($fonts as $value => $label) {
                                                $selected = ($heading_font === $value) ? 'selected' : '';
                                                echo '<option value="' . esc_attr($value) . '" ' . $selected . '>' . esc_html($label) . '</option>';
                                            }
                                            ?>
                                        </select>
                                        <p class="description">Font family for all headings (H1-H6)</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><label for="pctheme_body_font">Body Font</label></th>
                                    <td>
                                        <select id="pctheme_body_font" name="pctheme_body_font">
                                            <?php
                                            foreach ($fonts as $value => $label) {
                                                $selected = ($body_font === $value) ? 'selected' : '';
                                                echo '<option value="' . esc_attr($value) . '" ' . $selected . '>' . esc_html($label) . '</option>';
                                            }
                                            ?>
                                        </select>
                                        <p class="description">Font family for body text and paragraphs</p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- Headings Tab -->
                <div id="headings-tab" class="tab-content">
                    <div class="postbox" style="margin-top: 20px;">
                        <div class="postbox-header">
                            <h2>📝 Heading Typography (H1-H6)</h2>
                        </div>
                        <div class="inside">
                            <?php foreach ($headings as $h) : 
                                $h_upper = strtoupper($h);
                            ?>
                            <div style="background: #f9fafb; padding: 20px; margin-bottom: 20px; border-radius: 8px;">
                                <h3 style="margin-top: 0;"><?php echo $h_upper; ?> Settings</h3>
                                <table class="form-table">
                                    <tr>
                                        <th scope="row"><label for="pctheme_<?php echo $h; ?>_font_size">Font Size</label></th>
                                        <td>
                                            <input type="number" id="pctheme_<?php echo $h; ?>_font_size" name="pctheme_<?php echo $h; ?>_font_size" value="<?php echo esc_attr($heading_values[$h]['font_size']); ?>" min="12" max="120" step="1" style="width: 80px;" />
                                            <span>px</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><label for="pctheme_<?php echo $h; ?>_font_weight">Font Weight</label></th>
                                        <td>
                                            <select id="pctheme_<?php echo $h; ?>_font_weight" name="pctheme_<?php echo $h; ?>_font_weight">
                                                <option value="300" <?php selected($heading_values[$h]['font_weight'], '300'); ?>>Light (300)</option>
                                                <option value="400" <?php selected($heading_values[$h]['font_weight'], '400'); ?>>Normal (400)</option>
                                                <option value="500" <?php selected($heading_values[$h]['font_weight'], '500'); ?>>Medium (500)</option>
                                                <option value="600" <?php selected($heading_values[$h]['font_weight'], '600'); ?>>Semi Bold (600)</option>
                                                <option value="700" <?php selected($heading_values[$h]['font_weight'], '700'); ?>>Bold (700)</option>
                                                <option value="800" <?php selected($heading_values[$h]['font_weight'], '800'); ?>>Extra Bold (800)</option>
                                                <option value="900" <?php selected($heading_values[$h]['font_weight'], '900'); ?>>Black (900)</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><label for="pctheme_<?php echo $h; ?>_line_height">Line Height</label></th>
                                        <td>
                                            <input type="number" id="pctheme_<?php echo $h; ?>_line_height" name="pctheme_<?php echo $h; ?>_line_height" value="<?php echo esc_attr($heading_values[$h]['line_height']); ?>" min="1" max="3" step="0.1" style="width: 80px;" />
                                            <span>(1.0 - 3.0)</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><label for="pctheme_<?php echo $h; ?>_letter_spacing">Letter Spacing</label></th>
                                        <td>
                                            <input type="number" id="pctheme_<?php echo $h; ?>_letter_spacing" name="pctheme_<?php echo $h; ?>_letter_spacing" value="<?php echo esc_attr($heading_values[$h]['letter_spacing']); ?>" min="-0.1" max="0.5" step="0.01" style="width: 80px;" />
                                            <span>em</span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                
                <!-- Paragraph Tab -->
                <div id="paragraph-tab" class="tab-content">
                    <div class="postbox" style="margin-top: 20px;">
                        <div class="postbox-header">
                            <h2>📄 Paragraph Typography</h2>
                        </div>
                        <div class="inside">
                            <table class="form-table">
                                <tr>
                                    <th scope="row"><label for="pctheme_p_font_size">Font Size</label></th>
                                    <td>
                                        <input type="number" id="pctheme_p_font_size" name="pctheme_p_font_size" value="<?php echo esc_attr($p_font_size); ?>" min="12" max="24" step="1" style="width: 80px;" />
                                        <span>px</span>
                                        <p class="description">Base font size for paragraph text (14-18px recommended)</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><label for="pctheme_p_font_weight">Font Weight</label></th>
                                    <td>
                                        <select id="pctheme_p_font_weight" name="pctheme_p_font_weight">
                                            <option value="300" <?php selected($p_font_weight, '300'); ?>>Light (300)</option>
                                            <option value="400" <?php selected($p_font_weight, '400'); ?>>Normal (400)</option>
                                            <option value="500" <?php selected($p_font_weight, '500'); ?>>Medium (500)</option>
                                            <option value="600" <?php selected($p_font_weight, '600'); ?>>Semi Bold (600)</option>
                                        </select>
                                        <p class="description">Font weight for body text (400 recommended)</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><label for="pctheme_p_line_height">Line Height</label></th>
                                    <td>
                                        <input type="number" id="pctheme_p_line_height" name="pctheme_p_line_height" value="<?php echo esc_attr($p_line_height); ?>" min="1" max="3" step="0.1" style="width: 80px;" />
                                        <span>(1.0 - 3.0)</span>
                                        <p class="description">Line height for paragraphs (1.5-1.8 recommended)</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><label for="pctheme_p_letter_spacing">Letter Spacing</label></th>
                                    <td>
                                        <input type="number" id="pctheme_p_letter_spacing" name="pctheme_p_letter_spacing" value="<?php echo esc_attr($p_letter_spacing); ?>" min="-0.1" max="0.5" step="0.01" style="width: 80px;" />
                                        <span>em</span>
                                        <p class="description">Letter spacing for paragraphs (0-0.05em recommended)</p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- Spacing Tab -->
                <div id="spacing-tab" class="tab-content">
                    <div class="postbox" style="margin-top: 20px;">
                        <div class="postbox-header">
                            <h2>📏 Spacing & Design</h2>
                        </div>
                        <div class="inside">
                            <table class="form-table">
                                <tr>
                                    <th scope="row"><label for="pctheme_block_spacing">Block Spacing</label></th>
                                    <td>
                                        <input type="number" id="pctheme_block_spacing" name="pctheme_block_spacing" value="<?php echo esc_attr($block_spacing); ?>" min="0" max="20" step="1" />
                                        <span>rem (1rem = 16px)</span>
                                        <p class="description">Vertical spacing between blocks</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><label for="pctheme_border_radius">Border Radius</label></th>
                                    <td>
                                        <input type="number" id="pctheme_border_radius" name="pctheme_border_radius" value="<?php echo esc_attr($border_radius); ?>" min="0" max="50" step="1" />
                                        <span>px</span>
                                        <p class="description">Border radius for cards, buttons, etc.</p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- Preview Tab -->
                <div id="preview-tab" class="tab-content">
                    <div class="postbox" style="margin-top: 20px;">
                        <div class="postbox-header">
                            <h2>👀 Live Preview</h2>
                        </div>
                        <div class="inside">
                            <div id="pctheme-preview" style="padding: 40px; background: #ffffff; border: 1px solid #e5e7eb; border-radius: 8px;">
                                <h1 style="margin-bottom: 15px;">H1 Heading Example</h1>
                                <h2 style="margin-bottom: 15px;">H2 Heading Example</h2>
                                <h3 style="margin-bottom: 15px;">H3 Heading Example</h3>
                                <h4 style="margin-bottom: 15px;">H4 Heading Example</h4>
                                <h5 style="margin-bottom: 15px;">H5 Heading Example</h5>
                                <h6 style="margin-bottom: 20px;">H6 Heading Example</h6>
                                <p style="margin-bottom: 15px;">This is an example paragraph to show how your typography settings will look on your website. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <p style="margin-bottom: 20px;">Another paragraph with more text to demonstrate line height and letter spacing. The quick brown fox jumps over the lazy dog.</p>
                                <button style="padding: 12px 24px; border: none; cursor: pointer; font-weight: 600;">Button Example</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <p style="margin-top: 20px;">
                    <?php submit_button('Save All Settings', 'primary large', 'submit', false); ?>
                    <button type="button" class="button button-secondary" onclick="if(confirm('Reset all settings to defaults?')) { window.location.href='<?php echo admin_url('admin.php?page=pctheme-blocks-settings&reset=true'); ?>'; }" style="margin-left: 10px;">Reset to Defaults</button>
                </p>
                
            </div>
        </form>
    </div>
    
    <style>
        .postbox {
            border: 1px solid #c3c4c7;
            background: #fff;
        }
        .postbox-header {
            padding: 15px;
            border-bottom: 1px solid #c3c4c7;
            background: #f9fafb;
        }
        .postbox-header h2 {
            margin: 0;
            font-size: 18px;
        }
        .postbox .inside {
            padding: 20px;
        }
        .form-table th {
            width: 250px;
        }
        input[type="color"] {
            width: 60px;
            height: 40px;
            border: 1px solid #c3c4c7;
            cursor: pointer;
        }
        .tab-content {
            display: none;
        }
        .tab-content.active {
            display: block;
        }
        .nav-tab {
            cursor: pointer;
        }
    </style>
    
    <script>
    jQuery(document).ready(function($) {
        // Tab switching
        $('.nav-tab').on('click', function(e) {
            e.preventDefault();
            var tab = $(this).data('tab');
            
            $('.nav-tab').removeClass('nav-tab-active');
            $(this).addClass('nav-tab-active');
            
            $('.tab-content').removeClass('active');
            $('#' + tab + '-tab').addClass('active');
        });
        
        // Live preview update
        function updatePreview() {
            const preview = $('#pctheme-preview');
            
            // Colors
            const primaryColor = $('#pctheme_primary_color').val();
            const textColor = $('#pctheme_text_color').val();
            const headingColor = $('#pctheme_heading_color').val();
            const borderRadius = $('#pctheme_border_radius').val();
            
            // Fonts
            const headingFont = $('#pctheme_heading_font').val();
            const bodyFont = $('#pctheme_body_font').val();
            
            // Apply button styles
            preview.find('button').css({
                'background-color': primaryColor,
                'color': '#ffffff',
                'border-radius': borderRadius + 'px',
                'font-family': bodyFont
            });
            
            // Apply paragraph styles
            const pSize = $('#pctheme_p_font_size').val();
            const pWeight = $('#pctheme_p_font_weight').val();
            const pLineHeight = $('#pctheme_p_line_height').val();
            const pLetterSpacing = $('#pctheme_p_letter_spacing').val();
            
            preview.find('p').css({
                'color': textColor,
                'font-family': bodyFont,
                'font-size': pSize + 'px',
                'font-weight': pWeight,
                'line-height': pLineHeight,
                'letter-spacing': pLetterSpacing + 'em'
            });
            
            // Apply heading styles (H1-H6)
            const headings = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'];
            headings.forEach(function(h) {
                const size = $('#pctheme_' + h + '_font_size').val();
                const weight = $('#pctheme_' + h + '_font_weight').val();
                const lineHeight = $('#pctheme_' + h + '_line_height').val();
                const letterSpacing = $('#pctheme_' + h + '_letter_spacing').val();
                
                preview.find(h).css({
                    'color': headingColor,
                    'font-family': headingFont,
                    'font-size': size + 'px',
                    'font-weight': weight,
                    'line-height': lineHeight,
                    'letter-spacing': letterSpacing + 'em'
                });
            });
        }
        
        // Add event listeners
        $('input, select').on('change input', updatePreview);
        
        // Initial preview
        updatePreview();
        
        // Update color text inputs
        $('input[type="color"]').on('input', function() {
            $(this).next('input[type="text"]').val($(this).val());
        });
    });
    </script>
    <?php
}

// Handle reset
function pctheme_blocks_handle_reset() {
    if (isset($_GET['reset']) && $_GET['reset'] === 'true' && current_user_can('manage_options')) {
        $options = array(
            'pctheme_primary_color', 'pctheme_secondary_color', 'pctheme_accent_color',
            'pctheme_text_color', 'pctheme_heading_color', 'pctheme_heading_font',
            'pctheme_body_font', 'pctheme_block_spacing', 'pctheme_border_radius',
            'pctheme_p_font_size', 'pctheme_p_font_weight', 'pctheme_p_line_height', 'pctheme_p_letter_spacing'
        );
        
        $headings = array('h1', 'h2', 'h3', 'h4', 'h5', 'h6');
        foreach ($headings as $h) {
            $options[] = "pctheme_{$h}_font_size";
            $options[] = "pctheme_{$h}_font_weight";
            $options[] = "pctheme_{$h}_line_height";
            $options[] = "pctheme_{$h}_letter_spacing";
        }
        
        foreach ($options as $option) {
            delete_option($option);
        }
        
        wp_redirect(admin_url('admin.php?page=pctheme-blocks-settings&settings-updated=true'));
        exit;
    }
}
add_action('admin_init', 'pctheme_blocks_handle_reset');