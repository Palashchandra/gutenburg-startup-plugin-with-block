<?php
/**
 * Hero Block Template
 */

$title = isset($attributes['title']) ? $attributes['title'] : 'Welcome to Our Website';
$description = isset($attributes['description']) ? $attributes['description'] : 'Create amazing experiences';
$button_text = isset($attributes['buttonText']) ? $attributes['buttonText'] : 'Get Started';
$button_url = isset($attributes['buttonUrl']) ? $attributes['buttonUrl'] : '#';
$bg_color = isset($attributes['backgroundColor']) ? $attributes['backgroundColor'] : 'blue';

$bg_classes = array(
    'blue' => 'bg-gradient-to-r from-blue-500 to-blue-700',
    'purple' => 'bg-gradient-to-r from-purple-500 to-purple-700',
    'green' => 'bg-gradient-to-r from-green-500 to-green-700',
    'red' => 'bg-gradient-to-r from-red-500 to-red-700',
);

$bg_class = isset($bg_classes[$bg_color]) ? $bg_classes[$bg_color] : $bg_classes['blue'];
?>

<div class="<?php echo esc_attr($bg_class); ?> py-20 px-4">
    <div class="container mx-auto text-center text-white">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6">
            <?php echo esc_html($title); ?>
        </h1>
        <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto">
            <?php echo esc_html($description); ?>
        </p>
        <?php if (!empty($button_text)) : ?>
            <a href="<?php echo esc_url($button_url); ?>" 
               class="inline-block bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition duration-300">
                <?php echo esc_html($button_text); ?>
            </a>
        <?php endif; ?>
    </div>
</div>