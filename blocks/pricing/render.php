<?php
$plans = isset($attributes['plans']) ? $attributes['plans'] : array();
?>

<div class="py-16 px-4 bg-gray-50">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($plans as $plan) : ?>
                <div class="<?php echo $plan['featured'] ? 'bg-blue-600 text-white transform scale-105' : 'bg-white text-gray-800'; ?> rounded-lg shadow-xl p-8 relative">
                    <?php if ($plan['featured']) : ?>
                        <div class="absolute top-0 right-0 bg-yellow-400 text-gray-900 px-4 py-1 text-sm font-bold rounded-bl-lg rounded-tr-lg">
                            Popular
                        </div>
                    <?php endif; ?>
                    
                    <h3 class="text-2xl font-bold mb-4"><?php echo esc_html($plan['name']); ?></h3>
                    
                    <div class="mb-6">
                        <span class="text-5xl font-bold"><?php echo esc_html($plan['price']); ?></span>
                        <span class="text-xl"><?php echo esc_html($plan['period']); ?></span>
                    </div>
                    
                    <ul class="mb-8 space-y-3">
                        <?php foreach ($plan['features'] as $feature) : ?>
                            <li class="flex items-center">
                                <?php echo esc_html($feature); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    
                    <a href="<?php echo esc_url($plan['buttonUrl']); ?>" 
                       class="block text-center <?php echo $plan['featured'] ? 'bg-white text-blue-600 hover:bg-gray-100' : 'bg-blue-600 text-white hover:bg-blue-700'; ?> px-8 py-3 rounded-lg font-semibold transition duration-300">
                        <?php echo esc_html($plan['buttonText']); ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>