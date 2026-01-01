<?php
/**
 * Card Block Template
 */

$title = isset($attributes['title']) ? $attributes['title'] : 'Card Title';
$description = isset($attributes['description']) ? $attributes['description'] : 'Card description';
$button_text = isset($attributes['buttonText']) ? $attributes['buttonText'] : 'Learn More';
$button_url = isset($attributes['buttonUrl']) ? $attributes['buttonUrl'] : '#';
$image_url = isset($attributes['imageUrl']) ? $attributes['imageUrl'] : '';
?>

<div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
    <?php if (!empty($image_url)) : ?>
        <img src="<?php echo esc_url($image_url); ?>" 
             alt="<?php echo esc_attr($title); ?>" 
             class="w-full h-48 object-cover">
    <?php endif; ?>
    
    <div class="p-6">
        <h3 class="text-2xl font-bold mb-3 text-gray-800">
            <?php echo esc_html($title); ?>
        </h3>
        <p class="text-gray-600 mb-4">
            <?php echo esc_html($description); ?>
        </p>
        <?php if (!empty($button_text)) : ?>
            <a href="<?php echo esc_url($button_url); ?>" 
               class="inline-block bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition duration-300">
                <?php echo esc_html($button_text); ?>
            </a>
        <?php endif; ?>
    </div>
</div>