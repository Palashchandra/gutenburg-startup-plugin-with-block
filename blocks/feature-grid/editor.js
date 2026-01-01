( function( blocks, element, components ) {
    var el = element.createElement;
    var registerBlockType = blocks.registerBlockType;
    var InspectorControls = wp.blockEditor.InspectorControls;
    var PanelBody = components.PanelBody;
    var TextControl = components.TextControl;
    var TextareaControl = components.TextareaControl;
    var Button = components.Button;

    registerBlockType( 'pctheme/feature-grid', {
        title: 'Feature Grid',
        icon: 'grid-view',
        category: 'pctheme',
        
        attributes: {
            features: {
                type: 'array',
                default: [
                    { title: 'Fast Performance', description: 'Lightning fast loading speeds', icon: '⚡' },
                    { title: 'Responsive Design', description: 'Works on all devices', icon: '📱' },
                    { title: 'Easy to Use', description: 'Simple and intuitive interface', icon: '✨' }
                ]
            }
        },
        
        edit: function( props ) {
            var features = props.attributes.features;
            
            function updateFeature( index, key, value ) {
                var newFeatures = features.slice();
                newFeatures[index][key] = value;
                props.setAttributes({ features: newFeatures });
            }
            
            function addFeature() {
                var newFeatures = features.slice();
                newFeatures.push({ title: 'New Feature', description: 'Feature description', icon: '⭐' });
                props.setAttributes({ features: newFeatures });
            }
            
            function removeFeature( index ) {
                var newFeatures = features.filter(function(_, i) { return i !== index; });
                props.setAttributes({ features: newFeatures });
            }
            
            var inspectorControls = el( InspectorControls, {},
                el( PanelBody, { title: 'Features' },
                    features.map(function( feature, index ) {
                        return el( 'div', { key: index, style: { marginBottom: '20px', padding: '10px', border: '1px solid #ddd' } },
                            el( TextControl, {
                                label: 'Icon (Emoji)',
                                value: feature.icon,
                                onChange: function(value) { updateFeature(index, 'icon', value); }
                            }),
                            el( TextControl, {
                                label: 'Title',
                                value: feature.title,
                                onChange: function(value) { updateFeature(index, 'title', value); }
                            }),
                            el( TextareaControl, {
                                label: 'Description',
                                value: feature.description,
                                onChange: function(value) { updateFeature(index, 'description', value); }
                            }),
                            el( Button, {
                                isDestructive: true,
                                onClick: function() { removeFeature(index); }
                            }, 'Remove Feature' )
                        );
                    }),
                    el( Button, {
                        isPrimary: true,
                        onClick: addFeature
                    }, 'Add Feature' )
                )
            );
            
            var featuresGrid = el( 'div', { className: 'py-16 px-4 bg-gray-50' },
                el( 'div', { className: 'container mx-auto' },
                    el( 'div', { className: 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8' },
                        features.map(function( feature, index ) {
                            return el( 'div', { key: index, className: 'bg-white p-8 rounded-lg shadow-lg' },
                                el( 'div', { className: 'text-5xl mb-4' }, feature.icon ),
                                el( 'h3', { className: 'text-2xl font-bold mb-3 text-gray-800' }, feature.title ),
                                el( 'p', { className: 'text-gray-600' }, feature.description )
                            );
                        })
                    )
                )
            );
            
            return el( 'div', {},
                inspectorControls,
                featuresGrid
            );
        },
        
        save: function() {
            return null;
        }
    } );
} )( window.wp.blocks, window.wp.element, window.wp.components );