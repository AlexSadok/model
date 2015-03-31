<?php
/**
 * Register the Elggblog class for the object/blog subtype
 */

if (get_subtype_id('object', 'blog')) {
	update_subtype('object', 'blog', 'Elggblog');
} else {
	add_subtype('object', 'blog', 'Elggblog');
}
