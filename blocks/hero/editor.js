( function( blocks, element, components, blockEditor ) {
    var el = element.createElement;
    var registerBlockType = blocks.registerBlockType;
    var InspectorControls = blockEditor.InspectorControls;
    var PanelBody = components.PanelBody;
    var TextControl = components.TextControl;
    var TextareaControl = components.TextareaControl;
    var SelectControl = components.SelectControl;

    registerBlockType( 'pctheme/hero', {
        title: 'Hero Section',
        icon: 'cover-image',
        category: 'pctheme',
        
        attributes: {
            title: {
                type: 'string',
                default: 'Welcome to Our Website'
            },
            description: {
                type: 'string',
                default: 'Create amazing experiences with Tailwind CSS'
            },
            buttonText: {
                type: 'string',
                default: 'Get Started'
            },
            buttonUrl: {
                type: 'string',
                default: '#'
            },
            backgroundColor: {
                type: 'string',
                default: 'blue'
            }
        },
        
        edit: function( props ) {
            var attrs = props.attributes;
            
            var bgClasses = {
                blue: 'bg-gradient-to-r from-blue-500 to-blue-700',
                purple: 'bg-gradient-to-r from-purple-500 to-purple-700',
                green: 'bg-gradient-to-r from-green-500 to-green-700',
                red: 'bg-gradient-to-r from-red-500 to-red-700'
            };
            
            var inspectorControls = el( InspectorControls, {},
                el( PanelBody, { title: 'Hero Settings' },
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
                    }),
                    el( SelectControl, {
                        label: 'Background Color',
                        value: attrs.backgroundColor,
                        options: [
                            { label: 'Blue', value: 'blue' },
                            { label: 'Purple', value: 'purple' },
                            { label: 'Green', value: 'green' },
                            { label: 'Red', value: 'red' }
                        ],
                        onChange: function(value) { props.setAttributes({ backgroundColor: value }); }
                    })
                )
            );
            
            var hero = el( 'div', { className: bgClasses[attrs.backgroundColor] + ' py-20 px-4' },
                el( 'div', { className: 'container mx-auto text-center text-white' },
                    el( 'h1', { className: 'text-4xl md:text-5xl lg:text-6xl font-bold mb-6' }, attrs.title ),
                    el( 'p', { className: 'text-xl md:text-2xl mb-8 max-w-3xl mx-auto' }, attrs.description ),
                    attrs.buttonText && el( 'span', { className: 'inline-block bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold' }, attrs.buttonText )
                )
            );
            
            return el( 'div', {},
                inspectorControls,
                hero
            );
        },
        
        save: function() {
            return null;
        }
    } );
} )( window.wp.blocks, window.wp.element, window.wp.components, window.wp.blockEditor );