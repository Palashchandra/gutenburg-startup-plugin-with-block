<?php
/**
 * Feature Grid Block Template
 */

$features = isset($attributes['features']) ? $attributes['features'] : array();
?>

<div class="py-16 px-4 bg-gray-50">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($features as $feature) : ?>
                <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                    <div class="text-5xl mb-4">
                        <?php echo esc_html($feature['icon']); ?>
                    </div>
                    <h3 class="text-2xl font-bold mb-3 text-gray-800">
                        <?php echo esc_html($feature['title']); ?>
                    </h3>
                    <p class="text-gray-600">
                        <?php echo esc_html($feature['description']); ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>