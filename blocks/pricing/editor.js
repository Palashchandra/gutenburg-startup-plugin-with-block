( function( blocks, element, components ) {
    var el = element.createElement;
    var registerBlockType = blocks.registerBlockType;
    var InspectorControls = wp.blockEditor.InspectorControls;
    var PanelBody = components.PanelBody;
    var TextControl = components.TextControl;
    var TextareaControl = components.TextareaControl;
    var Button = components.Button;
    var ToggleControl = components.ToggleControl;

    registerBlockType( 'pctheme/pricing', {
        title: 'Pricing Table',
        icon: 'money-alt',
        category: 'pctheme',
        
        attributes: {
            plans: {
                type: 'array',
                default: [
                    {
                        name: 'Basic',
                        price: '$29',
                        period: '/month',
                        features: ['Feature 1', 'Feature 2', 'Feature 3'],
                        buttonText: 'Get Started',
                        buttonUrl: '#',
                        featured: false
                    },
                    {
                        name: 'Pro',
                        price: '$59',
                        period: '/month',
                        features: ['All Basic features', 'Feature 4', 'Feature 5', 'Priority Support'],
                        buttonText: 'Get Started',
                        buttonUrl: '#',
                        featured: true
                    }
                ]
            }
        },
        
        edit: function( props ) {
            var plans = props.attributes.plans;
            
            function updatePlan( index, key, value ) {
                var newPlans = plans.slice();
                newPlans[index][key] = value;
                props.setAttributes({ plans: newPlans });
            }
            
            function updateFeatures( index, value ) {
                var newPlans = plans.slice();
                newPlans[index].features = value.split('\n').filter(function(f) { return f.trim(); });
                props.setAttributes({ plans: newPlans });
            }
            
            function addPlan() {
                var newPlans = plans.slice();
                newPlans.push({
                    name: 'New Plan',
                    price: '$49',
                    period: '/month',
                    features: ['Feature 1', 'Feature 2'],
                    buttonText: 'Get Started',
                    buttonUrl: '#',
                    featured: false
                });
                props.setAttributes({ plans: newPlans });
            }
            
            function removePlan( index ) {
                var newPlans = plans.filter(function(_, i) { return i !== index; });
                props.setAttributes({ plans: newPlans });
            }
            
            var inspectorControls = el( InspectorControls, {},
                el( PanelBody, { title: 'Pricing Plans' },
                    plans.map(function( plan, index ) {
                        return el( 'div', { 
                            key: index, 
                            style: { 
                                marginBottom: '20px', 
                                padding: '15px', 
                                border: '2px solid ' + (plan.featured ? '#3b82f6' : '#ddd'),
                                borderRadius: '8px'
                            } 
                        },
                            el( 'h4', { style: { marginBottom: '10px' } }, 'Plan ' + (index + 1) ),
                            el( TextControl, {
                                label: 'Plan Name',
                                value: plan.name,
                                onChange: function(value) { updatePlan(index, 'name', value); }
                            }),
                            el( TextControl, {
                                label: 'Price',
                                value: plan.price,
                                onChange: function(value) { updatePlan(index, 'price', value); }
                            }),
                            el( TextControl, {
                                label: 'Period',
                                value: plan.period,
                                onChange: function(value) { updatePlan(index, 'period', value); }
                            }),
                            el( TextareaControl, {
                                label: 'Features (one per line)',
                                value: plan.features.join('\n'),
                                onChange: function(value) { updateFeatures(index, value); }
                            }),
                            el( TextControl, {
                                label: 'Button Text',
                                value: plan.buttonText,
                                onChange: function(value) { updatePlan(index, 'buttonText', value); }
                            }),
                            el( TextControl, {
                                label: 'Button URL',
                                value: plan.buttonUrl,
                                onChange: function(value) { updatePlan(index, 'buttonUrl', value); }
                            }),
                            el( ToggleControl, {
                                label: 'Featured Plan',
                                checked: plan.featured,
                                onChange: function(value) { updatePlan(index, 'featured', value); }
                            }),
                            el( Button, {
                                isDestructive: true,
                                onClick: function() { removePlan(index); }
                            }, 'Remove Plan' )
                        );
                    }),
                    el( Button, {
                        isPrimary: true,
                        onClick: addPlan
                    }, 'Add Plan' )
                )
            );
            
            var pricingGrid = el( 'div', { className: 'py-16 px-4 bg-gray-50' },
                el( 'div', { className: 'container mx-auto' },
                    el( 'div', { className: 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8' },
                        plans.map(function( plan, index ) {
                            return el( 'div', { 
                                key: index, 
                                className: (plan.featured ? 'bg-blue-600 text-white transform scale-105' : 'bg-white text-gray-800') + ' rounded-lg shadow-xl p-8 relative'
                            },
                                plan.featured && el( 'div', { className: 'absolute top-0 right-0 bg-yellow-400 text-gray-900 px-4 py-1 text-sm font-bold rounded-bl-lg rounded-tr-lg' }, 'Popular' ),
                                el( 'h3', { className: 'text-2xl font-bold mb-4' }, plan.name ),
                                el( 'div', { className: 'mb-6' },
                                    el( 'span', { className: 'text-5xl font-bold' }, plan.price ),
                                    el( 'span', { className: 'text-xl' }, plan.period )
                                ),
                                el( 'ul', { className: 'mb-8 space-y-3' },
                                    plan.features.map(function(feature, i) {
                                        return el( 'li', { key: i, className: 'flex items-center' },
                                            el( 'span', { className: 'mr-2' }, '✓' ),
                                            feature
                                        );
                                    })
                                ),
                                el( 'span', { 
                                    className: 'block text-center ' + (plan.featured ? 'bg-white text-blue-600' : 'bg-blue-600 text-white') + ' px-8 py-3 rounded-lg font-semibold'
                                }, plan.buttonText )
                            );
                        })
                    )
                )
            );
            
            return el( 'div', {},
                inspectorControls,
                pricingGrid
            );
        },
        
        save: function() {
            return null;
        }
    } );
} )( window.wp.blocks, window.wp.element, window.wp.components );