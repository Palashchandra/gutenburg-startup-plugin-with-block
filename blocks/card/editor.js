( function( blocks, element, components, blockEditor ) {
    var el = element.createElement;
    var registerBlockType = blocks.registerBlockType;
    var InspectorControls = blockEditor.InspectorControls;
    var MediaUpload = blockEditor.MediaUpload;
    var PanelBody = components.PanelBody;
    var TextControl = components.TextControl;
    var TextareaControl = components.TextareaControl;
    var Button = components.Button;

    registerBlockType( 'pctheme/card', {
        title: 'Card',
        icon: 'admin-page',
        category: 'pctheme',
        
        attributes: {
            title: {
                type: 'string',
                default: 'Card Title'
            },
            description: {
                type: 'string',
                default: 'This is a card description with some text content'
            },
            buttonText: {
                type: 'string',
                default: 'Learn More'
            },
            buttonUrl: {
                type: 'string',
                default: '#'
            },
            imageUrl: {
                type: 'string',
                default: ''
            }
        },
        
        edit: function( props ) {
            var attrs = props.attributes;
            
            var inspectorControls = el( InspectorControls, {},
                el( PanelBody, { title: 'Card Settings' },
                    el( MediaUpload, {
                        onSelect: function(media) { props.setAttributes({ imageUrl: media.url }); },
                        allowedTypes: ['image'],
                        value: attrs.imageUrl,
                        render: function(obj) {
                            return el( 'div', {},
                                attrs.imageUrl && el( 'img', { src: attrs.imageUrl, style: { maxWidth: '100%', marginBottom: '10px' } } ),
                                el( Button, { onClick: obj.open, isPrimary: true },
                                    attrs.imageUrl ? 'Change Image' : 'Select Image'
                                ),
                                attrs.imageUrl && el( Button, {
                                    onClick: function() { props.setAttributes({ imageUrl: '' }); },
                                    isDestructive: true,
                                    style: { marginLeft: '10px' }
                                }, 'Remove Image' )
                            );
                        }
                    }),
                    el( TextControl, {
                        label: 'Title',
                        value: attrs.title,
                        onChange: function(value) { props.setAttributes({ title: value }); }
                    }),
                    el( TextareaControl, {
                        label: 'Description',
                        value: attrs.description,
                        onChange: function(value) { props.setAttributes({ description: value }); }
                    }),
                    el( TextControl, {
                        label: 'Button Text',
                        value: attrs.buttonText,
                        onChange: function(value) { props.setAttributes({ buttonText: value }); }
                    }),
                    el( TextControl, {
                        label: 'Button URL',
                        value: attrs.buttonUrl,
                        onChange: function(value) { props.setAttributes({ buttonUrl: value }); }
                    })
                )
            );
            
            var card = el( 'div', { className: 'bg-white rounded-lg shadow-lg overflow-hidden' },
                attrs.imageUrl && el( 'img', { src: attrs.imageUrl, alt: attrs.title, className: 'w-full h-48 object-cover' } ),
                el( 'div', { className: 'p-6' },
                    el( 'h3', { className: 'text-2xl font-bold mb-3 text-gray-800' }, attrs.title ),
                    el( 'p', { className: 'text-gray-600 mb-4' }, attrs.description ),
                    attrs.buttonText && el( 'span', { className: 'inline-block bg-blue-600 text-white px-6 py-2 rounded' }, attrs.buttonText )
                )
            );
            
            return el( 'div', {},
                inspectorControls,
                card
            );
        },
        
        save: function() {
            return null;
        }
    } );
} )( window.wp.blocks, window.wp.element, window.wp.components, window.wp.blockEditor );