const { __ } = wp.i18n; // Import __() from wp.i18n
const { registerBlockType } = wp.blocks; // Import registerBlockType() from wp.blocks
import Edit from './ps-users-list-edit';
 
registerBlockType( 'plugin-starter/users-list', {
    title: __( 'Users List', 'plugin-starter' ), // Block title.
    description: __('Basic user listing table. Get data from API and show case here.', 'plugin-starter'),
    icon: 'smiley',
    category: 'widgets',
    attributes: {
        id: {type: Boolean, default: true},
        fname: {type: Boolean, default: true},
        lname: {type: Boolean, default: true},
        email: {type: Boolean, default: true},
        date: {type: Boolean, default: true},
    },
    keywords: [
    ],
    supports: {
        align: true
    },
    edit: Edit,
    save() { return null }
} );