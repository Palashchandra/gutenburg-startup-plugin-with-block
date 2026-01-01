( function( blocks, element, components, blockEditor ) {
    var el = element.createElement;
    var registerBlockType = blocks.registerBlockType;
    var InspectorControls = blockEditor.InspectorControls;
    var MediaUpload = blockEditor.MediaUpload;
    var PanelBody = components.PanelBody;
    var TextControl = components.TextControl;
    var TextareaControl = components.TextareaControl;
    var Button = components.Button;
    var RangeControl = components.RangeControl;

    registerBlockType( 'pctheme/testimonial', {
        title: 'Testimonial Slider',
        icon: 'format-quote',
        category: 'pctheme',
        
        attributes: {
            testimonials: {
                type: 'array',
                default: [
                    {
                        name: 'John Doe',
                        role: 'CEO, Company',
                        content: 'This is an amazing product! It has completely transformed the way we work.',
                        image: '',
                        rating: 5
                    }
                ]
            }
        },
        
        edit: function( props ) {
            var testimonials = props.attributes.testimonials;
            
            function updateTestimonial( index, key, value ) {
                var newTestimonials = testimonials.slice();
                newTestimonials[index][key] = value;
                props.setAttributes({ testimonials: newTestimonials });
            }
            
            function addTestimonial() {
                var newTestimonials = testimonials.slice();
                newTestimonials.push({
                    name: 'New Person',
                    role: 'Position',
                    content: 'Testimonial content here...',
                    image: '',
                    rating: 5
                });
                props.setAttributes({ testimonials: newTestimonials });
            }
            
            function removeTestimonial( index ) {
                var newTestimonials = testimonials.filter(function(_, i) { return i !== index; });
                props.setAttributes({ testimonials: newTestimonials });
            }
            
            var inspectorControls = el( InspectorControls, {},
                el( PanelBody, { title: 'Testimonials' },
                    testimonials.map(function( testimonial, index ) {
                        return el( 'div', { 
                            key: index, 
                            style: { marginBottom: '20px', padding: '15px', border: '1px solid #ddd', borderRadius: '8px' } 
                        },
                            el( 'h4', { style: { marginBottom: '10px' } }, 'Testimonial ' + (index + 1) ),
                            el( MediaUpload, {
                                onSelect: function(media) { updateTestimonial(index, 'image', media.url); },
                                allowedTypes: ['image'],
                                value: testimonial.image,
                                render: function(obj) {
                                    return el( 'div', { style: { marginBottom: '10px' } },
                                        testimonial.image && el( 'img', { src: testimonial.image, style: { maxWidth: '100px', marginBottom: '10px', borderRadius: '50%' } } ),
                                        el( Button, { onClick: obj.open, isPrimary: true },
                                            testimonial.image ? 'Change Image' : 'Select Image'
                                        ),
                                        testimonial.image && el( Button, {
                                            onClick: function() { updateTestimonial(index, 'image', ''); },
                                            isDestructive: true,
                                            style: { marginLeft: '10px' }
                                        }, 'Remove' )
                                    );
                                }
                            }),
                            el( TextControl, {
                                label: 'Name',
                                value: testimonial.name,
                                onChange: function(value) { updateTestimonial(index, 'name', value); }
                            }),
                            el( TextControl, {
                                label: 'Role/Position',
                                value: testimonial.role,
                                onChange: function(value) { updateTestimonial(index, 'role', value); }
                            }),
                            el( TextareaControl, {
                                label: 'Testimonial',
                                value: testimonial.content,
                                onChange: function(value) { updateTestimonial(index, 'content', value); }
                            }),
                            el( RangeControl, {
                                label: 'Rating',
                                value: testimonial.rating,
                                onChange: function(value) { updateTestimonial(index, 'rating', value); },
                                min: 1,
                                max: 5
                            }),
                            el( Button, {
                                isDestructive: true,
                                onClick: function() { removeTestimonial(index); }
                            }, 'Remove Testimonial' )
                        );
                    }),
                    el( Button, {
                        isPrimary: true,
                        onClick: addTestimonial
                    }, 'Add Testimonial' )
                )
            );
            
            var testimonialPreview = el( 'div', { className: 'py-16 px-4 bg-gray-50' },
                el( 'div', { className: 'container mx-auto' },
                    el( 'div', { className: 'space-y-8' },
                        testimonials.map(function( testimonial, index ) {
                            return el( 'div', { key: index, className: 'bg-white rounded-lg shadow-xl p-8 max-w-3xl mx-auto' },
                                el( 'div', { className: 'flex items-center mb-6' },
                                    testimonial.image ? 
                                        el( 'img', { src: testimonial.image, className: 'w-16 h-16 rounded-full mr-4 object-cover' } ) :
                                        el( 'div', { className: 'w-16 h-16 rounded-full bg-blue-500 flex items-center justify-center text-white text-2xl font-bold mr-4' },
                                            testimonial.name.charAt(0)
                                        ),
                                    el( 'div', {},
                                        el( 'h4', { className: 'font-bold text-xl' }, testimonial.name ),
                                        el( 'p', { className: 'text-gray-600' }, testimonial.role ),
                                        el( 'div', { className: 'flex mt-1' },
                                            Array(5).fill(0).map(function(_, i) {
                                                return el( 'span', { 
                                                    key: i, 
                                                    className: i < testimonial.rating ? 'text-yellow-400' : 'text-gray-300'
                                                }, '★' );
                                            })
                                        )
                                    )
                                ),
                                el( 'p', { className: 'text-gray-700 text-lg italic' },
                                    '"' + testimonial.content + '"'
                                )
                            );
                        })
                    )
                )
            );
            
            return el( 'div', {},
                inspectorControls,
                testimonialPreview
            );
        },
        
        save: function() {
            return null;
        }
    } );
} )( window.wp.blocks, window.wp.element, window.wp.components, window.wp.blockEditor );